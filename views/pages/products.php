<?php
include('views/products_header.php');
?>
<h2>Music always changes.<br>
    Your taste doesn't have to.</h2>
    <h1>Join our cult</h1>
<form id=tableform>
    <div>Name: <input type="text" name="model" value="<?=(isset($_REQUEST['model']))?htmlspecialchars($_REQUEST['model']):''?>" /></div>
    <div>Rating:
        <select name="status">
            <option value=""></option>
            <?php $statuses = $this->db->queryRows('SELECT * FROM `rating`'); ?>
            <?php if ($statuses) {
                foreach($statuses as $status){ ?>
                <option <?=(isset($_REQUEST['status']) && $status['rating_id'] == $_REQUEST['status'])?'selected':'';?> value="<?=$status['rating_id'];?>"><?=$status['rated'];?></option>
            <?php }} ?>
        </select>
    </div>
    <button id=apply>Apply</button>
</form>
<?php
$_POST['email']="one@df.ki";
 $fck="SELECT * FROM `users` WHERE `email`='".$_POST['email']."'";

$rows = $this->db->queryRows($fck);
foreach($rows as $r){
$fd=$r['id'];
$sa=$r['table_name']; //

}

$filter = [];
$params = [];
if (!empty($_REQUEST['model'])) {

    $filter[] = "`main`.`song` LIKE '".$_REQUEST['model']."%' ";
    $params['model'] = $_REQUEST['model'];
}
if (!empty($_REQUEST['status']) /*&& is_numeric($_REQUEST['status'])*/) {

    $filter[] = "`rating`.`rating_id`='".$_REQUEST['status']."' ";

    $params['status'] = $_REQUEST['status'];
}
$where = '';
if ($filter) {
    $where = ' WHERE ' . implode(' AND ', $filter);


}


$page = 1;;
if (isset($_REQUEST['page']) && is_numeric($_REQUEST['page']) && $_REQUEST['page']>=1) {
    $page=$_REQUEST['page'];
}
$limit = 3;
$rowscount = 0;

$c = $this->db->queryOne("SELECT COUNT(*) as 'count' FROM `main`  INNER JOIN `genre` ON `main`.`genre`=`genre`.`g_id` INNER JOIN `review` ON `main`.`review`=`review`.`review_id` INNER JOIN `rating` ON `review`.`rating`=`rating`.`rating_id`". $where);              //
if ($c) {
    $rowscount = $c['count'];
}

$pag = new Pagination([
    'rows' => $rowscount,
    'limit' => $limit,
    'limitPages' => 3,
    'page' => $page,
    'params' => $params
]);



//$sql = "SELECT `main`.*, `genre`.`g_genre`, `rating`.`rated` FROM `main` INNER JOIN `genre` ON `main`.`genre`=`genre`.`g_id`INNER JOIN `review` ON `main`.`review`=`review`.`review_id` INNER JOIN `rating` ON `review`.`rating`=`rating`.`rating_id` ".$where;
$sql = "SELECT `main`.*, `genre`.`g_genre`, `rating`.`rated` FROM `main` INNER JOIN `genre` ON `main`.`genre`=`genre`.`g_id`INNER JOIN `review` ON `main`.`review`=`review`.`review_id` INNER JOIN `rating` ON `review`.`rating`=`rating`.`rating_id` ".$where;

$sql.="  ORDER BY `main`.`id`";
$sql .= " LIMIT " . $pag->GetFirstRow() . ", ". $pag->GetLimit();

$rows = $this->db->queryRows($sql);

if ($rows === false) {
    echo 'Error select';
} else{
    $i = $pag->GetFirstRow();
    ?>
    <!--<a href="/registr/products/add">Добавить</a>-->
    <table id=maintable width="80%" ><tr><!--<th>id</th>--><th>Song</th><th>Artist</th><th>Genre</th><th>Album</th><th>Rated</th></tr>
        <?php
        foreach($rows as $row) {
            ?>
            <tr>

                <!--<td><?=$row['id']?></td>-->
                <td><?php echo $row['song'];?></td>
                <td><?php echo $row['artist'];?></td>
                <td><?php echo $row['g_genre'];?></td>

                <?php if(!isset($row['album'])|| empty($row['album'])){
                 echo "<td>" . $row['song'] . "</td>";
                }
                else{
                echo "<td>" . $row['album'] . "</td>";
               }?>
                <td id=tdr><?php echo $row['rated'];?></td>
            </tr>
            <?php
            $i++;
        }
        ?>
    </table>
    <?php
    echo '<div class="pagination">'.$pag->show().'</div>';
}


    ?>

    <?php


include('views/footer.php');
