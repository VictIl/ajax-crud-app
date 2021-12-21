<?php
include('views/temp_header.php');?>
<?php
/*setcookie("login", "", time()-3600);*/
$errors_pl=[];
if (isset($_POST['done'])) {


    setcookie("errors_name",'none');setcookie("errors_genre",'none');setcookie("errors_artist",'none');
    $b=0;
    if (!isset($_POST['model1']) || !trim($_POST['model1'])) {
        $errors_pl['model1'] = 'Error song';$b=1;
        setcookie("errors_name",$errors_pl['model1']);
    }
    if (!isset($_POST['status2']) || !is_numeric($_POST['status2'])) {
        $errors_pl['status2'] = 'Error genre';$b=1;
         setcookie("errors_genre",$errors_pl['status2']);
    }
    if (!isset($_POST['artistv']) || !trim($_POST['artistv']) ) {
        $errors_pl['artistv'] = 'Error artist';$b=1;
        setcookie("errors_artist",$errors_pl['artistv']);
    }
    
      
    $table_nam="table".$_SESSION['user_email'];
    if($_COOKIE['table_playlist_status']=='private'){$pl_access=1;}else if($_COOKIE['table_playlist_status']=='public'){$pl_access=0;}
    if(isset($_COOKIE['table_playlist_password']))
    {$pl_psswd=$_COOKIE['table_playlist_password'];}
    else{$pl_psswd=1;}

    if(!isset($pl_access)){echo"Try again later ()access";}

if(isset($pl_psswd)){}
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "userimg/".$filename;

    if ( $b==0) {

        $sql="INSERT INTO `".$table_nam."` (`user_pl_id`, `user_pl_access`, `user_pl_password`, `user_pl_name`, `user_pl_song`, `user_pl_artist`, `user_pl_album`, `user_pl_genre`, `user_pl_img`) VALUES (NULL, '".$pl_access."','".$pl_psswd."', '".$_COOKIE['table_playlist_name']."', '".$_POST['model1']."', '".$_POST['artistv']."', '".$_POST['pl_album']."', '".$_POST['status2']."', '". $filename ."')";

        if ($this->db->query($sql)) {
             move_uploaded_file($tempname, $folder);
            Header("Location: temp_cont");            /*-------*/
            exit;
        } else {


            $errors_pl['error'] = 'Error add to DB: '. $this->db->Error();
            echo"Something's wrong ,my bad(";                                            /*<-----------*/
            //var_dump($errors_pl);

        }
    }
}
?>

<?php
if (isset($errors_pl)) {
  /*  echo '<pre>';
    var_dump($errors_pl);
    echo '</pre>';*/
}

?>
<?php

//questionable check
if(!isset( $_SESSION['user_table']) || empty($_SESSION['user_table']) || $_SESSION['user_table']=='0' ){

    //var_dump($_SESSION);
    $table_nam="table".$_SESSION['user_email'];
    $pl_nam=$_COOKIE['table_playlist_name'];
   // echo $pl_nam;
    if ($_COOKIE['table_playlist_status']=='private'){
    $pl_st=1;
    }else{$pl_st=0;}
   // echo $pl_st;
    if($pl_st==1){
    $hasp=$_COOKIE['table_playlist_password'];
    //echo $hasp;
    $c=password_verify("vbh6bm",$hasp);
   // echo $c;
    }
//$d="CREATE TABLE `match`.`". $r."`njjnb";
    $creat="CREATE TABLE `match`.`". $table_nam . "` ( `user_pl_id` INT NOT NULL AUTO_INCREMENT , `user_pl_access` BOOLEAN NOT NULL , `user_pl_password` VARCHAR(300) NOT NULL DEFAULT '1' , `user_pl_name` VARCHAR(200) NOT NULL , `user_pl_song` VARCHAR(200) NOT NULL , `user_pl_artist` VARCHAR(200) NOT NULL , `user_pl_album` VARCHAR(200) NULL , `user_pl_genre` INT NOT NULL , `user_pl_img` VARCHAR(300) NOT NULL DEFAULT 'default_music.jpg' , PRIMARY KEY (`user_pl_id`)) ENGINE=InnoDB";
   // $cr = $this->db->queryOne($creat);
    if ($this->db->query($creat)) {
            $sqla = "ALTER TABLE `match`.`". $table_nam . "` DROP INDEX `user_pl_genre`, ADD INDEX `user_pl_genre` (`user_pl_genre`) USING BTREE";
            if(!($this->db->query($sqla))){
                 $errors['error'] = 'Error first alter to DB: '. $this->db->Error();
                 var_dump($errors);
            }
            $user_constraint=$_SESSION['user_email']."_genre_key";
            $sqlatwo = "ALTER TABLE `". $table_nam . "` ADD CONSTRAINT `". $user_constraint . "` FOREIGN KEY (`user_pl_genre`) REFERENCES `genre`(`g_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;";
            if(!($this->db->query($sqlatwo))){
                 $errors['error'] = 'Error second alter to DB: '. $this->db->Error();
                 var_dump($errors);
            }

            $sqlv = "UPDATE `users` SET `table_name` ='".$table_nam."' WHERE `users`.`email`='".$_SESSION['user_email']."'";
             if($this->db->query($sqlv)){
                $_SESSION['user_table']=$table_nam;
                Header("Location: temp_cont");
                exit;
                echo "Playlist created";
             }else{
             // send location to error page
                $errors['error'] = 'Error add to DB: '. $this->db->Error();
                var_dump($errors);
            }


        } else {
        echo 9;
            $errors['error'] = 'Error add to DB: '. $this->db->Error();
            var_dump($errors);
        }
}else{
$tNm= $_SESSION['user_table'];
$empcheck = $this->db->queryOne("SELECT COUNT(*) as 'count' FROM `". $tNm . "`");

if($empcheck['count']=="0"){
 Header("Location: first_pl_add");     
 exit;
}else{

//make private access  playlists not show up VERIFy here

?>

<form id=tableform>
    <div>Name: <input type="text" name="model" value="<?=(isset($_REQUEST['model']))?htmlspecialchars($_REQUEST['model']):''?>" /></div>
    <div>Genre:
        <select name="status">
            <option value=""></option>
            <?php $statuses = $this->db->queryRows('SELECT * FROM `genre`'); ?>
            <?php if ($statuses) {
                foreach($statuses as $status){ ?>
                <option <?=(isset($_REQUEST['status']) && $status['g_id'] == $_REQUEST['status'])?'selected':'';?> value="<?=$status['g_id'];?>"><?=$status['g_genre'];?></option>
            <?php }} ?>
        </select>
    </div>
    <button id=apply>Apply</button>
</form>

<?php
$filter = [];
$params = [];
$table_name="table".$_SESSION['user_email'];
if (!empty($_REQUEST['model'])) {
    echo '<div>Model: '.$_REQUEST['model'].'</div>';
    $filter[] = "`".$table_name."`.`user_pl_song` LIKE '".$_REQUEST['model']."%' ";
    $params['model'] = $_REQUEST['model'];
}
if (!empty($_REQUEST['status']) /*&& is_numeric($_REQUEST['status'])*/) {
    echo '<div>Status: '.$_REQUEST['status'].'</div>';
    $filter[] = "`genre`.`g_id`='".$_REQUEST['status']."' ";
     //$filter[] = "`".$table_name."`.`user_pl_genre`='".$_REQUEST['status']."' ";

    $params['status'] = $_REQUEST['status'];
}
$where = '';
if ($filter) {
    $where = ' WHERE ' . implode(' AND ', $filter);


   /* echo '<pre>';
    echo $where;
    echo '</pre>';*/

}

$page = 1;;
if (isset($_REQUEST['page']) && is_numeric($_REQUEST['page']) && $_REQUEST['page']>=1) {
    $page=$_REQUEST['page'];
}
$limit = 3;
$rowscount = 0;


$c = $this->db->queryOne("SELECT COUNT(*) as 'count' FROM `".$table_name."` INNER JOIN `genre` ON `".$table_name."`.`user_pl_genre`=`genre`.`g_id`". $where);

if ($c) {
    $rowscount = $c['count'];
}

$pag = new Pagination([
    'rows' => $rowscount,
    'limit' => $limit,
    'limitPages' => 5,
    'page' => $page,
    'params' => $params
]);



//$sql = "SELECT `main`.*, `genre`.`g_genre`, `rating`.`rated` FROM `main` INNER JOIN `genre` ON `main`.`genre`=`genre`.`g_id`INNER JOIN `review` ON `main`.`review`=`review`.`review_id` INNER JOIN `rating` ON `review`.`rating`=`rating`.`rating_id` ".$where;
$sql = "SELECT `".$table_name."`.*, `genre`.`g_genre`  FROM `".$table_name."` INNER JOIN `genre` ON `".$table_name."`.`user_pl_genre`=`genre`.`g_id`".$where;

$sql.="  ORDER BY `".$table_name."`.`user_pl_id`";
$sql .= " LIMIT " . $pag->GetFirstRow() . ", ". $pag->GetLimit();

$rows = $this->db->queryRows($sql);

if ($rows === false) {
    echo 'Error select';
} else{

    if($rowscount==0){
    ?> <div> No matches found</div><?php
    }else{

    $i = $pag->GetFirstRow();
    ?>
    <div id=tableName> 
        <?php $c=0; 
        foreach($rows as $row) {
            if(!isset($cn)){echo $row['user_pl_name'];$cn=1;}
        }?>
    </div>
    <div id=userTab>
    <table width="100%" >
        <?php
        foreach($rows as $row) {
            ?>
            <tr>
                <?php if(!isset($row['user_pl_img'])|| empty($row['user_pl_img'])){
                        echo "<td  id=imt><img id=img src='userimg/default_music.jpg'></td>";
                    }else{
                echo "<td><img src='userimg/".$row['user_pl_img']."' width='100' height='120'></td>";
                }?>
                <td><?php echo $row['user_pl_song'];?></td>
                <td><?php echo $row['user_pl_artist'];?></td>
                <td><?php echo $row['g_genre'];?></td>

                <?php if(!isset($row['user_pl_album'])|| empty($row['user_pl_album'])){
                    echo "<td>" . $row['user_pl_song'] . "</td>";
                }
                else{
                echo "<td>" . $row['user_pl_album'] . "</td>";
                }?>

            </tr>
            <?php
            $i++;
        }
        ?>
    </table></div>
      <div id=hidden ><div id=nameErrr></div><div id=nameErrr></div><div id=nameErrr></div></div>           <!--<-f-->
        <button id="us_add" onclick="<?php if(isset($errors_pl) && !empty($errors_pl)){ echo"add(1)";}else{echo"add(1)";}?>" type="button">Add</button>
        <div id="add_div"></div>

    <?php
    echo '<div id=pg class="pagination">'.$pag->show().'</div>';

    }
   }
  }
}
?>
<a id=al href='logout'>logout</a>
</div>
</article>