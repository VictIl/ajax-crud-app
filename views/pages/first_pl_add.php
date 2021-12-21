<?php
include('views/firstadd_header.php');
?><div id=why><div id=one><img id=gm src="css/re.jpg"/></div>
<div id=two><img id =gmm src="css/re.jpg"/></div>
<div id=three><img id=gmmm  src="css/re.jpg"/></div></div><?php
$errors_pl = [];
if (isset($_POST['done'])) {
    $b=0;
    if (!isset($_POST['model']) || !trim($_POST['model'])) {
        $errors_pl['model'] = 'Error song';$b=1;
    }
    if (!isset($_POST['status']) || !is_numeric($_POST['status'])) {
        $errors_pl['status'] = 'Error genre';$b=1;
    }
    if (!isset($_POST['artistv']) || !trim($_POST['artistv']) ) {
        $errors_pl['artistv'] = 'Error artist';$b=1;
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

        $sql="INSERT INTO `".$table_nam."` (`user_pl_id`, `user_pl_access`, `user_pl_password`, `user_pl_name`, `user_pl_song`, `user_pl_artist`, `user_pl_album`, `user_pl_genre`, `user_pl_img`) VALUES (NULL, '".$pl_access."','".$pl_psswd."', '".$_COOKIE['table_playlist_name']."', '".$_POST['model']."', '".$_POST['artistv']."', '".$_POST['pl_album']."', '".$_POST['status']."', '". $filename ."')";

        if ($this->db->query($sql)) {
             move_uploaded_file($tempname, $folder);
            Header("Location: temp_cont");
            exit;
        } else {


            $errors_pl['error'] = 'Error add to DB: '. $this->db->Error();
        }
    }
}
?>

<?php
if ($errors_pl) {
    echo '<pre>';
    var_dump($errors_pl);
    echo '</pre>';
}


?>
<div id=tx><h3>Looks like your playlist is empty</h3><h4>Add the first song to get started</h4></div>
<form id=form method="POST" enctype="multipart/form-data">
    <div>
        <label for=model>Song: </label><input type="text" name="model" />
        <span id='pl_passwordError' class="error">
            <?php  if (isset($errors_pl['model'])) {	echo $errors_pl['model'];}?>
        </span>
    </div>  <div>
        <label for=artistv>Artist: </label><input type="text" name="artistv"  />
        <span id='pl_passwordError' class="error">
             <?php if (isset($errors_pl['artistv'])) {	echo $errors_pl['artistv'];}?>
        </span>
    </div>  
    <div id=last><div>For easier navigating,please specify the following:</div>
        <div>
            <label for=status>Genre:</label>
            <select name="status">
                <?php $statuses = $this->db->queryRows('SELECT * FROM `genre`'); ?>
                <?php if ($statuses) {
                    foreach($statuses as $status){ ?>
                        <option <?=(isset($_REQUEST['status']) && $status['g_id'] == $_REQUEST['status'])?'selected':'';?> value="<?=$status['g_id'];?>"><?=$status['g_genre'];?></option>
                    <?php }} ?>
            </select>
        </div>
        <div>
            <label for=pl_album>Album: </label><input type="text" name="pl_album"  />
        </div><div>
             <label for=uploadfile>Image: </label><input id="files"  type="file" name="uploadfile" value="" />
        </div>
    </div>
 

        <button id=mainb name="done">Done</button>

   
</form>

        <a id=a href='logout'>logout</a>
        
<?php include('views/footer.php'); ?>
