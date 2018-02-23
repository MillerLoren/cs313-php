<?php 
    session_start();
    if($_SESSION['sess_user'] === NULL){
        header("Location: ../scanner.php");
    }else{
        header("Location: contacts.php");
    }
?>
<?php require($DOCUMENT_ROOT . "Includes/header.php");?>
  <meta name="description" content="Please login to view your leads.">
  <title>Leads Scanner - Login</title>
</head>
<body>
<?php require($DOCUMENT_ROOT . "Includes/nav.php");?>
    <div id="content">
        
    </div>
<?php require($DOCUMENT_ROOT . "Includes/footer.php");?>