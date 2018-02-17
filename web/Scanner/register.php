<?php require "dbconnect.php";
$db = get_db();
?>
<?php require($DOCUMENT_ROOT . "Includes/header.php");?>
  <meta name="description" content="Want to create a new account?">
  <title>Leads Scanner - Register</title>
</head>
<body>
<?php require($DOCUMENT_ROOT . "Includes/nav.php");?>
<div id="content">
  <p>Enter your information here you wish to login with.</p>
  <form action="" method="POST">  
    <label>Username:</label><input type="text" name="user"/><br /> 
    <label>Name:</label><input type="text" name="name"/><br />  
    <label>Password:</label><input type="password" name="pass"/><br />   
<?php  
function gen(){
    $db2 = get_db();
    $num = rand(100000,999999);
    $check = $db2->prepare("SELECT id FROM public.users WHERE id='".$num."'");
    $check->execute();
    $row = $check->rowCount();
    if($row >= 1){
        gen();
    }
    return $num;
}
if(isset($_POST["submit"]))
{  
  if(!empty($_POST['user']) && !empty($_POST['pass']) && !empty($_POST['name'])) 
  {  
    $user=$_POST['user'];
    $name=$_POST['name'];  
    $pass=$_POST['pass'];  
    $newID = gen();
    $statement = $db->prepare("SELECT * FROM public.users WHERE login_name='".$user."'");
    $statement->execute();
    $numrows=$statement->rowCount(); 
    if($numrows == 0){
        $sql = "INSERT INTO public.users(login_name,user_name,password,id) VALUES('$user','$name','$pass', '$newID')";
        $insert = $db->prepare($sql);
        $insert->execute();
        if($insert) {
            echo "Account Successfully Created."; 
            session_start();  
            $_SESSION['sess_user']=$newid;  
          
            header("Location: home.php"); 
        }else {  
            echo "Failure!";
        }
    }else{
        echo "That username already exists! Please try again.";
    }
    }else{
        echo "All fields are required.";
    }
}
?>   
  <input type="submit" value="Register" name="submit" />  
 </form>  
</div>
<?php require($DOCUMENT_ROOT . "Includes/footer.php");?>