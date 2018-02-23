<?php require "dbconnect.php";
$db = get_db();
?>
<?php 
    session_start();
    if($_SESSION['sess_user'] === NULL){
        header("Location: ../scanner.php");
    }
?>
<?php require($DOCUMENT_ROOT . "Includes/header.php");?>
  <meta name="description" content="Want to create a new account?">
  <title>Leads Scanner - Register</title>
</head>
<body>
<?php require($DOCUMENT_ROOT . "Includes/nav.php");?>
<div id="content">
      
      <?php      
        $id=$_SESSION['sess_user'];
        $mainQuery = "SELECT * FROM public.users WHERE id='$id' LIMIT 1";
        $main = $db->prepare($mainQuery);
        $main->execute();
        $row=$main->fetch();
        
        if(isset($_POST["delete"]))
        {  
            $sql = "DELETE FROM public.leads WHERE user_id='$id'";
            $sql2 = "DELETE FROM public.users WHERE id='$id'";
            $result = $db->prepare($sql);
            $result->execute();
            $result2 = $db->prepare($sql2);
            $result2->execute();

            $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        session_destroy();
        header("Location: ../scanner.php");
        }
      ?>
  <form id="settingsForm" action="" method="POST">
    <a class="logout" href="signout.php">Logout</a> OR <input style="background-color:red;color:black;display:inline-block" type="submit" name="delete" value="Delete Account"/>
 </form>
</div>
<?php require($DOCUMENT_ROOT . "Includes/footer.php");?>