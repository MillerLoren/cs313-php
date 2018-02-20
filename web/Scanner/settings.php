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
      <?php echo $_SESSION['sess_user']; ?><a href="signout.php">Logout</a>
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
  <form action="" method="POST">
      <table id="table" class="settingsTable">
        <tr><td>Allow editing of contacts?</td><td><label class="switch"><input type="checkbox" name="allowEdits" <?php if($row['settings_edit']){echo "checked";};?>><span class="slider round"></span></label></td></tr>
        <tr><td>Show your information on contacts page.</td><td><label class="switch"><input type="checkbox" name="showInfo" <?php if($row['settings_showInfo']){echo "checked";};?>><span class="slider round"></span></label></td></tr>
        <tr><td></td><td><label class="switch"><input type="checkbox"><span class="slider round"></span></label></td></tr>
        <tr><td></td><td><label class="switch"><input type="checkbox"><span class="slider round"></span></label></td></tr>
      </table>
      <input style="background-color:red;color:black;" type="submit" name="delete" value="Delete Account"/>
 </form>
</div>
<?php require($DOCUMENT_ROOT . "Includes/footer.php");?>