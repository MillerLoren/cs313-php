<?php require($DOCUMENT_ROOT . "Includes/header.php");?>
  <meta name="description" content="View your cart!">
  <title>View Cart</title>
</head>
<body>
<?php require($DOCUMENT_ROOT . "Includes/nav.php");?>
<?php 

 // starting the session
 session_start();
 
 if($_SERVER['REQUEST_METHOD']=='POST')
 {
  $viewCart = $_POST['viewCart'];
  $_SESSION['viewCart']= $viewCart;
 } 
?> 
<strong><?php echo $_SESSION['viewCart'];?></strong>
<strong><?php echo $_REQUEST['viewCart'];?></strong>
<?php unset($_SESSION['viewCart']);?>
<?php require($DOCUMENT_ROOT . "Includes/footer.php");?>