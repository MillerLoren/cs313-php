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
      <form id="modifyContacts" action="" method="POST">
        <img src="../../Images/add.png" class="add"/>
        <table id="contactsTable">
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Company</th>
            <th>Job Title</th>
            <th>Edit/Delete</th>
          </tr>
          <?php
            function debug_to_console( $data ) {
              $output = $data;
              if ( is_array( $output ) )
                $output = implode( ',', $output);
        
              echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
            }
            $id=$_SESSION['sess_user'];
          
            $statement = $db->prepare("SELECT * FROM public.leads WHERE user_id='".$id."'");
            $statement->execute();
            $countRow = 1;
            while ($row = $statement->fetch(PDO::FETCH_ASSOC))
            {
              echo '<tr><td>'.$row['num'].'</td><td>'.$row['name'].'</td><td>'. $row['email'] . '</td><td>' . $row['phone'] . '</td><td>' . $row['company'] . '</td><td>' . $row['title'] . '</td><td><img class="edit" src="../../Images/edit.png" />/<input type="submit" name="delete" class="trash"/></td></tr>';
              $countRow = $countRow + 1;
            }
          ?>
        </table>
        <?php
          if(isset($_POST["update"]))
          {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $company = $_POST['company'];
            $title = $_POST['title'];
            $temp = $_POST['num'];
            $num = (int)$temp;
            $temp2 = $_POST['isNew'];
            $isNew = (bool)$temp2;
            debug_to_console('Updating');
            $sql="UPDATE public.leads SET name='".$name."', email='".$email."', phone='".$phone."', company='".$company."', title='".$title."', user_id='".$id."', num='".$num."' WHERE user_id='".$id."' AND num='".$num."'";
            $update = $db->prepare($sql);
            debug_to_console('Updating: Prepared');
            $update->execute();
            debug_to_console("Update Updated");
            //header("Location: contacts.php");
            }
            if(isset($_POST["add"])){
              $name = $_POST['name'];
              $email = $_POST['email'];
              $phone = $_POST['phone'];
              $company = $_POST['company'];
              $title = $_POST['title'];
              $temp = $_POST['num'];
              $num = (int)$temp;
              $temp2 = $_POST['isNew'];
              $isNew = (bool)$temp2;
              debug_to_console('isNew' . $isNew);
              debug_to_console('Insert');
              $firstSql = "INSERT INTO public.leads(name, user_id, num, phone, email, company, title) VALUES ('$name', '$id', '$num', '$phone', '$email', '$company', '$title')";
              $insert = $db->prepare($firstSql);
              $insert->execute();
              debug_to_console("Insert Updated");
              //header("Location: contacts.php");
            }
          if(isset($_POST["delete"]))
          {   
            debug_to_console('Deleting ' . $id);
            $temp = $_POST['num'];
            $num = (int)$temp;
            debug_to_console('Num ' . $num);
            $sql2 = "DELETE FROM public.leads WHERE user_id='$id' AND num=$num";
            $delete = $db->prepare($sql);
            debug_to_console('Delete Prepared');
            $delete->execute();
            debug_to_console('Delete Execute');
            header("Location: contacts.php");
          }
        ?>
      </form>
    </div>
<?php require($DOCUMENT_ROOT . "Includes/footer.php");?>