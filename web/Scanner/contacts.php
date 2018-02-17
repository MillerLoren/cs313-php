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
  <meta name="description" content="These are all of the contacts for this user.">
  <title>Leads Scanner - Contacts</title>
</head>
<body>
<?php require($DOCUMENT_ROOT . "Includes/nav.php");
?>
    <div id="content">
    <table>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Company</th>
      <th>Job Title</th>
    </tr>
    <?php
      $id=$_SESSION['sess_user'];
    
      $statement = $db->prepare("SELECT * FROM public.leads WHERE user_id='".$id."'");
      $statement->execute();

      while ($row = $statement->fetch(PDO::FETCH_ASSOC))
      {
        echo '<tr><td>'.$row['name'].'</td><td>' . $row['Email'] . '</td><td>' . $row['Phone'] . '</td><td>' . $row['Company'] . '</td><td>' . $row['Job_Title'] . '</td></tr>';
      }
    ?>   
    </table>
    </div>
<?php require($DOCUMENT_ROOT . "Includes/footer.php");?>