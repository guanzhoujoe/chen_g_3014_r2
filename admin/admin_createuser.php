<?php
  ini_set('display_errors', 1);
  error_reporting(E_ALL);

	require_once('phpscripts/config.php');

	//confirm_logged_in();
  if(isset($_POST['submit'])) {
    $fname = trim($_POST['fname']);
    $username = trim($_POST['username']);
    //$password = trim($_POST['password']);;
    $password=md5(rand(0,1000));
    $email = trim($_POST['email']);
    $user1v1 = $_POST['user1v1'];
    $to=$email;
    $subject='Signup Information';
    $message='username='.$username.'
              password='.$password.'
              email='.$email.'
              thankyou for singup here is the link:
                http://localhost:8888/MMED_3014_18_A/admin/admin_login.php';


    $header='thankyou for signup';
    mail($to,$subject,$message,$header);



    if(empty($user1v1)) {
      $message = "Please select a user level.";
    }else{
      $result = createUser($fname, $username, $password, $email, $user1v1);
      $message = $result;
    }
  }
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome to your admin panel</title>
<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<h1>welcome Company name to your admin page</h1>
  <?php if(!empty($message)){echo $message;}?>
  <form action="admin_createuser.php" method="post">
    <label>First name:</label>
    <input type="text" name="fname" value="<?php if(!empty($fname)){echo $fname;}?>"><br><br>
    <label>Username:</label>
    <input type="text" name="username" value="<?php if(!empty($username)){echo $username;}?>"><br><br>
    <label>Password:</label>
    <input type="text" name="password" value="<?php if(!empty($password)){echo $password;}?>"><br><br>
    <label>Email:</label>
    <input type="text" name="email" value="<?php if(!empty($email)){echo $email;}?>"><br><br>
    <label>User Level:</label>
    <select name="user1v1">
      <option value="">Please select a user level</option>
      <option value="2">Web Admin</option>
      <option value="1">Web Master</option>
    </select><br><br>
    <input type="submit" name="submit" value="Create User">
  </form>
</body>
</html>
