<?php require "Scanner/dbconnect.php";
$db = get_db();
?>
<?php require($DOCUMENT_ROOT . "Includes/header.php");?>
  <meta name="description" content="Please login to view your leads.">
  <title>Leads Scanner - Login</title>
</head>
<body>
<?php require($DOCUMENT_ROOT . "Includes/nav.php");?>
<div id="content">
  <p>Test information: <br/>Username = test_user1, Password = password1<br/> Username = test_user2, Password = password2</p>
  <form action="" method="POST">  
    Username: <input type="text" name="user"><br />  
    Password: <input type="password" name="pass"><br />   
<?php  
if(isset($_POST["submit"]))
{  
  if(!empty($_POST['user']) && !empty($_POST['pass'])) 
  {  
      $user=$_POST['user'];  
      $pass=$_POST['pass'];  
    
      $statement = $db->prepare("SELECT login_name, user_name, user_id, password FROM public.users WHERE login_name='".$user."' AND password='".$pass."'");
      $statement->execute();

      while ($row = $statement->fetch(PDO::FETCH_ASSOC))
      {
        $dbusername=$row['login_name'];
        $dbpassword=$row['password'];
        $dbsessionid=$row['user_id'];
      }

      if($user == $dbusername && $pass == $dbpassword)  
      {  
        session_start();  
        $_SESSION['sess_user']=$dbsessionid;  
      
        header("Location: /Scanner/home.php");
      } else {  
      echo "Invalid username or password!";  
      }   
  } else {  
      echo "All fields are required!";  
  }  
}
?>   
  <input type="submit" value="Login" name="submit" />  
 </form>  
</div>
<?php require($DOCUMENT_ROOT . "Includes/footer.php");?>