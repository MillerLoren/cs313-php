<?php require($DOCUMENT_ROOT . "Includes/header.php");?>
  <meta name="description" content="Come pick any item you want then checkout!">
  <title>Shopping Cart</title>
</head>
<body>
<?php require($DOCUMENT_ROOT . "Includes/nav.php");?>
<?php 

 // starting the session
 session_start();
 
 if (isset($_POST['Submit'])) { 
  $_SESSION['viewCart'] = $_POST['viewCart'];
  }
?> 
<form id="cartForm" action="cart.php" method="POST">
  <input name="viewCart" id="viewCart" type="hidden" value="<?php echo $_REQUEST['viewCart'] ?>" />
  <input type="submit" name="Submit" value="View Cart" />
</form>
    <div id="content">
      <div id="grid">
        <div id="1" class="shopItem">
          <div class="shopImage"><img src="Images/ark.png" /></div>
          <div class="itemInfo">
            <p>Price: $39.99<br />
            Quantity: <input class="quantity" type="number" value="1" /></p>
          </div>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <input name="viewCart" id="viewCart1" type="hidden" value="<?php echo $_POST['viewCart'] ?>" />
            <input type="submit" name="Submit" class="shopItemButton" value="Add To Cart" onclick="addToCart(1)"/>
          <form>
        </div>
        <div id="2" class="shopItem">
          <div class="shopImage"><img src="Images/Overwatch.jpg" /></div>
          <div class="itemInfo">
            <p>Price: $59.99<br />
            Quantity: <input class="quantity" type="number" value="1" /></p>
          </div>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <input name="viewCart" id="viewCart2" type="hidden" value="<?php echo $_POST['viewCart'] ?>" />
            <input type="submit" name="Submit" class="shopItemButton" value="Add To Cart" onclick="addToCart(2)"/>
          </form>
        </div>
        <div id="3" class="shopItem">
          <div class="shopImage"><img src="Images/rocketleague.jpeg" /></div>
          <div class="itemInfo">
            <p>Price: $29.99<br />
            Quantity: <input class="quantity" type="number" value="1" /></p>
          </div>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <input name="viewCart" id="viewCart3" type="hidden" value="<?php echo $_POST['viewCart'] ?>" />
            <input type="submit" name="Submit" class="shopItemButton" value="Add To Cart" onclick="addToCart(3)"/>
          </form>
        </div>
      </div>
    </div>
<?php require($DOCUMENT_ROOT . "Includes/footer.php");?>