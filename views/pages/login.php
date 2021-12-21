<?php
include('views/userlogin_header.php');
//session_start();
if(isset($_SESSION['loged'])){
    Header("Location: user_cont");
}
$errors=[];
if (isset($_POST['in'])) {
    $a=0;
//login and password length error ,ask for password again when registrating
    if (!isset($_POST['email']) || !trim($_POST['email'])) {
        $errors['email'] = 'Field is empty';
        $a=1;
    }else if (!preg_match('/^[a-z0-9]{1}[a-z0-9-\.]+@[a-z0-9-]+\.[a-z]{2,4}$/', $_POST['email'])) {
        $errors['email'] = 'Invalid email';
        $a=1;
    }
    if (!isset($_POST['psw']) || !trim($_POST['psw'])) {
        $errors['password'] = 'Field is empty';
        $a=1;
    } else if (!preg_match('/^[a-z0-9]+[a-z0-9-_\.]+[a-z0-9]+$/', $_POST['psw'])) {
        $errors['password'] = 'Invalid password';
        $a=1;
    }

     if($a==0){
     $check_query ="SELECT * FROM `users` WHERE `email`='" . $_POST['email'] . "' LIMIT 1";
     $result = $this->db->query($check_query);
     $user = mysqli_fetch_assoc($result);
     if(isset($user)){
          if (password_verify($_POST['psw'], $user['password'])) {

                    $fck="SELECT * FROM `users` WHERE `email`= '".$_POST['email']."'";
                    $rows = $this->db->queryRows($fck);

                    foreach($rows as $r){

                         $_SESSION['id']=$r['id'];
                         $_SESSION['user_table']=$r['table_name']; 
                         $_SESSION['user_login']=$r['login'];
                         $_SESSION['user_name']=$r['name'];
                         $_SESSION['user_table']=$r['table_name'];
                    }

                    $_SESSION['loged']=1;
                    $_SESSION['user_email']=$_POST['email'];

                     Header("Location: user_cont");
                     exit;
          }else{echo " <script>alert('Password is incorrect');</script>  "; }
     }
     if(!isset($user) || empty($user)){  
   
        Header("Location: user_page");
        exit;
        }
     }
}
?>
<form  id=signupf  action="login" method="post">
  <div class="imgcontainer">
   <h3>Log in</h3>
  </div>

  <div class="container">
  <div>
    <label for="email"><b>Email</b></label>
    <input id=ieml  type="text" placeholder="Enter Username" name="email" >
     <span id=loginError class="error"><?php
				if (isset($errors['login'])) {	echo $errors['login'];}?></span>
                </div><div>

    <label for="psw"><b>Password</b></label>
    <input id=ipsw type="password" placeholder="Enter Password" name="psw" >
     <span id=passwordError class="error"><?php
				if (isset($errors['password'])) {	echo $errors['password'];}?></span>

</div><div  id=la>
   <a href='user_page'>Back to sign in</a></div><div>
    <button  id=mainb name='in' type="submit">Ready</button></div>

  </div>
</form>
<?php
include('views/footer.php');
