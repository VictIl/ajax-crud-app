<?php
$errors = [];
if (isset($_POST['add'])) {
    if (!isset($_POST['model']) || !trim($_POST['model'])) {
        $errors['model'] = 'Error model';
    }
    if (!isset($_POST['status']) || !is_numeric($_POST['status'])) {
        $errors['status'] = 'Error status';
    }
    if (!isset($_POST['artistv']) || is_numeric($_POST['artistv'])) {
        $errors['artistv'] = 'Error artist';
    }

    if (!$errors) {
        $sql = "INSERT INTO `main` (
                          song,artist,genre,album,review) VALUES('" . $_POST['model'] . "','" . $_POST['artistv'] . "','" . $_POST['status'] . "','',NULL)";


        if ($this->db->query($sql)) {

            Header("Location: /registr/products");
            exit;
        } else {
            $errors['error'] = 'Error add to DB: '. $this->db->Error();
        }

    }
}
?>

<?php include('views/header.php');  ?>
<?php
if ($errors) {
    echo '<pre>';
    var_dump($errors);
    echo '</pre>';
}


?>
<form method="POST">

    <div>song: <input type="text" name="model"  /></div>
    <div>artist: <input type="text" name="artistv"  /></div>

    <div>Статус:
        <select name="status">
            <?php $statuses = $this->db->queryRows('SELECT * FROM `genre`'); ?>
            <?php if ($statuses) {
                foreach($statuses as $status){ ?>
                    <option <?=(isset($_REQUEST['status']) && $status['g_id'] == $_REQUEST['status'])?'selected':'';?> value="<?=$status['g_id'];?>"><?=$status['g_genre'];?></option>
                <?php }} ?>
        </select>
    </div>
    <div>review: <input type="text" name="reviewv"  /></div>
    <button name="add">Добавить</button>
</form>
<?php include('views/footer.php'); ?>
