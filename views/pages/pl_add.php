<?php
session_start();
//$errors_pl = [];
?>
<?php
$errors_pl2=[];
if($_COOKIE['errors_name']!="none")$errors_pl2["model1"]=$_COOKIE['errors_name'];                      //fix        <------
if($_COOKIE['errors_artist']!="none")$errors_pl2["artistv"]=$_COOKIE['errors_artist'];

?>
 <div id=here> <?php if(isset($errors_pl["model1"])){/*echo $errors_pl['model1'];*/}else{/*echo(9);*/}?></div>
<form method="POST"  id="form" enctype="multipart/form-data">

  <div>  <div>Song: <input type="text" name="model1"  /></div>

    <div id='pl_passwordError' class="error">
     <?php

				if (isset($errors_pl2["model1"])) {	echo $errors_pl2["model1"];}
                ?></div></div>
    <div><div>Artist: <input type="text" name="artistv"  /></div>
    <span id='pl_passwordError' class="error">
     <?php
				if (isset($errors_pl2['artistv'])) {	echo $errors_pl2['artistv'];}?></span>
                </div>
    <div id=gh><p>For easier navigating,please specify the following:</p>
         <div><label for="status2">Genre:</label>
        <select name="status2">
            <?php $statuses = $this->db->queryRows('SELECT * FROM `genre`'); ?>
            <?php if ($statuses) {
                foreach($statuses as $status){ ?>
                    <option <?=(isset($_REQUEST['status2']) && $status['g_id'] == $_REQUEST['status2'])?'selected':'';?> value="<?=$status['g_id'];?>"><?=$status['g_genre'];?></option>
                <?php }} ?>
        </select></div>
         <div>Album: <input type="text" name="pl_album"  /></div>
         <div>Image: <input id="files"  type="file" name="uploadfile" value="" /></div>
    </div>

    <button type="submit " id=donr  name="done">Done</button>
</form>

