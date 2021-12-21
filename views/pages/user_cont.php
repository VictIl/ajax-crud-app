<?php
include('views/user_naming_header.php');
//session_start();

if(!isset($_SESSION['loged'])){
    Header("Location: user_page");
    exit;
}

$_SESSION['time']=time();

if(($_SESSION['loged']==1)){
    //var_dump($_SESSION);
   //echo session_id();
}
?>

  <?php 
  if(isset( $_SESSION['user_table']) && !empty($_SESSION['user_table']) ){
        Header("Location: temp_cont");
                exit;
  } else{
      ?>
    <h2 id=hw >Welcome, <?php echo $_SESSION['user_login'];?></h2>
    <p>Time to create your own playlist</p><?php
       
        $pl_error=[];
        if (isset($_POST['create'])) {
            $b=0;
            if (!isset($_POST['pl_name']) || !trim($_POST['pl_name'])) {
                $pl_error['pl_name'] = 'Name error';$b=1;
            }
            if (isset($_POST['pl_status']) && $_POST['pl_status']=='public') {$b=0;}
            if (isset($_POST['pl_status']) && $_POST['pl_status']=='private') {
                    if (!isset($_POST['pl_password']) || !trim($_POST['pl_password'])) {
                    $pl_error['pl_password'] = 'Please enter the password';$b=1;
                     } else if (!preg_match('/^[a-z0-9]+[a-z0-9-_\.]+[a-z0-9]+$/', $_POST['pl_password'])) {
                    $pl_error['pl_password'] = 'Invalid password';
                    $b=1;}else if(strlen($_POST['pl_password'])<6){
                         $pl_error['pl_password'] = 'Short password';$b=1;
                    }

            }


            if ($b==0) {
                $pl_pasw=password_hash($_POST['pl_password'], PASSWORD_DEFAULT);
                setcookie("table_playlist_password", $pl_pasw);
                setcookie("table_playlist_status",$_POST['pl_status']);
                setcookie("table_playlist_name",$_POST['pl_name']);
                Header("Location: temp_cont");
                exit;
            }

        }

?>
<form id=signupf method="POST" action='user_cont'>
        <div id=kl><div>Name : <input id=inm type="text" name="pl_name" value=<?php if(isset($_POST['pl_name']))echo $_POST['pl_name'];?>></div>
     <span id='pl_nameError' class="error">
         <?php
				    if (isset($pl_error['pl_name'])) {	echo $pl_error['pl_name'];}?></span>

        <div>Access:
            <select id=ieml name="pl_status">
                 <option name="public_pl" value="public" selected>"Public"</option>
                 <option name="private_pl" value="private">"private"</option>
            </select>
        </div>
    
   
        <div>Password: <input id=ipsw type="text" name="pl_password" value="<?php if(isset($_POST['pl_password']))echo $_POST['pl_password'];?>"/></div>
         <span id='pl_passwordError' class="error">
         <?php
				    if (isset($pl_error['pl_password'])) {	echo $pl_error['pl_password'];}?></span>
     </div><div>
    <button id=mainb name="create">Create</button></div>
</form>
<a id=la href='logout'>logout</a>
<?php

 }

  ?>

<?php

include('views/footer.php');
