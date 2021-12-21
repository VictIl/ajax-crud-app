<?php
$mysqli = new mysqli("localhost", "root", "password", "match");
if($mysqli->connect_error) {
  exit('Could not connect');
}
?>
<div id=vertical_one></div>
<div id=vertical_two></div>
<div id=vertical_three></div>
<div id=vertical_four></div>
<div id=vertical_five></div>

<?php
 function queryRows($sql) {
        $r = mysqli_query(mysqli_connect("localhost", "root", "password", "match"), $sql);
        if (!$r)return false;
        $rows = [];
        while ($row = mysqli_fetch_assoc($r)) {
            $rows[] = $row;
        }
        return $rows;
    }

$sql="SELECT `test`.* FROM `test` ";

$rows = queryRows($sql);

if ($rows === false) {
    echo 'Error select';
}else{
    ?>

    <div class="animation1" id="tablem">
    <div>
    <div>
        <?php
        foreach($rows as $row) {
            ?>
            <div id="img"/>

                 <img src=<?php echo '"img/'.$row['pic'].'"'; ?>>
            </div>
            <?php

        }?>
        </div>
        </div>
    </div>

     <div class="animation2" id="tablem">
    <div>
    <div>
        <?php
        $sql="SELECT `test`.* FROM `test` ORDER BY `id` DESC";                     /* <--------*/
        
        $rows = queryRows($sql);

        if ($rows === false) {
            echo 'Error select';
        }else{


        foreach($rows as $row) {
            ?>
            <div id="img"/>

                 <img src=<?php echo '"img/'.$row['pic'].'"'; ?>>
            </div>
            <?php

        }
        ?></div>
        </div>
    </div>
    
    <?php
    }
    }?>
