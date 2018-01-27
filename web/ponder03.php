<?php require($DOCUMENT_ROOT . "Includes/header.php");?>
  <meta name="description" content="Come pick any item you want then checkout!">
  <title>Shopping Cart</title>
</head>
<body>
<?php require($DOCUMENT_ROOT . "Includes/nav.php");?>
    <div id="content">
      <div id="grid">
        <div class="shopItem">
          <img src="Images/ark.png" />
          <br />
          <div class="itemInfo">
            <p>Price: $59.99</p>
            <p>Quantity: </p> <form><input type="number" /></form>
          </div>
          <button class="shopItemButton">Add To Cart</button>
        </div>
        <div class="shopItem">
          <img src="Images/Overwatch.jpg" />
          <div class="itemInfo">
            <p>Price: $59.99</p>
            <p>Quantity: </p> <form><input type="number" /></form>
          </div>
          <button class="shopItemButton">Add To Cart</button>
        </div>
        <div class="shopItem">
          <img src="Images/rocketleague.jpeg" />
          <div class="itemInfo">
            <p>Price: $59.99</p>
            <p>Quantity: </p> <form><input type="number" /></form>
          </div>
          <button class="shopItemButton">Add To Cart</button>
        </div>
      </div>
    </div>
<?php require($DOCUMENT_ROOT . "Includes/footer.php");?>