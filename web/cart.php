<?php require($DOCUMENT_ROOT . "Includes/header.php");?>
  <meta name="description" content="View your cart!">
  <title>View Cart</title>
</head>
<body>
<?php require($DOCUMENT_ROOT . "Includes/nav.php");?>
<?php 

 // starting the session
 session_start();
 
 
?> 
<strong><?php echo $_SESSION['viewCart'];?></strong>
<strong><?php echo $_REQUEST['viewCart'];?></strong>
<script>
  var cart = <?php echo $_SESSION['viewCart'];?>;
  console.log("Cart", cart);
  var parsed = JSON.parse(cart);
  console.log("Parsed", parsed);
</script>
<?php unset($_SESSION['viewCart']);?>
<?php require($DOCUMENT_ROOT . "Includes/footer.php");?>