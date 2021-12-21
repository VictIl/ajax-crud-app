<?php
include('views/user_header.php');
//session_start();
if(isset($_SESSION['loged'])){
   Header("Location: user_cont");
}

$errors = [];
if (isset($_POST['register'])) {
    $a=0;
    

    if (!isset($_POST['uname']) || !trim($_POST['uname'])) {
        $errors['uname'] = 'Field is empty';
        $a=1;
    } else if (!preg_match('/^[A-Z]?[a-z-]+[a-z]+$/', $_POST['uname'])) {
        $errors['uname'] = 'Invalid name';
        $a=1;
    }

    if (!isset($_POST['email']) || !trim($_POST['email'])) {
        $errors['email'] = 'Field is empty';
        $a=1;
    }else if (!preg_match('/^[a-z0-9]{1}[a-z0-9-\.]+@[a-z0-9-]+\.[a-z]{2,4}$/', $_POST['email'])) {
        $errors['email'] = 'Invalid email';
        $a=1;
    }
    if (!isset($_POST['login']) || !trim($_POST['login'])) {
        $errors['login'] = 'Field is empty';
        $a=1;
    } else if (!preg_match('/^[a-z0-9]+[a-z0-9-_\.]+[a-z0-9]+$/', $_POST['login'])) {
        $errors['login'] = 'Invalid login';
        $a=1;
    }
    if (!isset($_POST['psw']) || !trim($_POST['psw'])) {
        $errors['password'] = 'Field is empty';
        $a=1;
    } else if (!preg_match('/^[a-z0-9]+[a-z0-9-_\.]+[a-z0-9]+$/', $_POST['psw'])) {
        $errors['password'] = 'Invalid login';
        $a=1;
    }

     if (!isset($_POST['remember']) || !trim($_POST['remember'])) {
        $errors['remember'] = 'Has to be checked';
        $a=1;
    }
    if($a==0){
             echo(333333333333);
         $check_query ="SELECT * FROM `users` WHERE email='" . $_POST['email'] . "' LIMIT 1";
         $result = $this->db->query($check_query);
         $user = mysqli_fetch_assoc($result);
         if(isset($user)){

               Header("Location: login");
                exit;
         }else{  

                 $passw=password_hash($_POST['psw'], PASSWORD_DEFAULT);
                 $in="INSERT INTO `users` (`id`, `login`, `password`, `hash`, `name`, `email`, `table_name`) VALUES (NULL,'" . $_POST['login'] . "','" . $passw . "','','" . $_POST['uname'] . "', '" . $_POST['email'] . "', '')";
                 if ($this->db->query($in)) {
                    
                    $fck="SELECT * FROM `users` WHERE `email`= '".$_POST['email']."'";
                    $rows = $this->db->queryRows($fck);

                    foreach($rows as $r){

                     $_SESSION['id']=$r['id'];
                     $_SESSION['user_table']=$r['table_name']; 
                    }
                    if(isset($_SESSION['time']))unset($_SESSION['time']);
                    $_SESSION['user_name']=$_POST['uname'];
                    $_SESSION['user_login']=$_POST['login'];
                    $_SESSION['user_email']=$_POST['email'];
                    $_SESSION['loged']=1;

                    /*setcookie("login",$_POST['login']);
                    setcookie("password",$_POST['psw']);
                    setcookie("name",$_POST['uname']);
                    setcookie("email",$_POST['email']);
                    $_SESSION['loged']=1;*/
                    Header("Location: user_page");
                    exit;
                 } else {
                    $errors['error'] = 'Error add to DB: '. $this->db->Error();
                 }
         }
    }
}
?>
<form id=signupf action="user_page" method="post">
  <div class="imgcontainer">
   <h3>Sign up</h3>
  </div>

  <div class="signupcontainer">
    <div><label  for="uname"><b>Name</b></label>
        <input id=inm type="text" placeholder="enter name" name="uname"/>
        <span id='unameError' class="error">
               <?php   if (isset($errors['uname'])) {	echo $errors['uname'];}?>
        </span>
    </div><div>
        <label for="email"><b>Email</b></label>
        <input id=ieml  type="text" placeholder="enter email" name="email" />
        <span id=emailError class="error">
                 <?php   if (isset($errors['email'])) {	echo $errors['email'];}?>
        </span>
    </div><div>
        <label for="login"><b>Username</b></label>
        <input id=ilgn  type="text" placeholder="enter login" name="login" />
        <span id=loginError class="error">
              <?php   if (isset($errors['login'])) {	echo $errors['login'];}?>
        </span>
    </div><div>

        <label for="psw"><b>Password</b></label>
        <input id=ipsw type="password" placeholder="enter password" name="psw" />
        <span id=passwordError class="error">
               <?php   if (isset($errors['password'])) {	echo $errors['password'];}?>
        </span>

     </div><div>
        
          <input id=check type="checkbox" checked="checked" value=remember name="remember" checked>
          <label >I agree to site policy</label>
          <span id=checkError class="error">
              <?php    if (isset($errors['remember'])) {	echo $errors['remember'];}?>
          </span>
    </div>
  </div>
  <div  id=la>
   <a href='login'>Already have an account?</a></div><div>
  <button id=mainb name='register' type="submit">Ready</button>

  </div>
</form>

<?php

include('views/footer.php');
