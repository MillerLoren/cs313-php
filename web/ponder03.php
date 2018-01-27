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
          <div class="itemInfo">
            <p>As a man or woman stranded naked, freezing and starving on the shores of a mysterious island called ARK, you must hunt, harvest resources, craft items, grow crops, research technologies, and build shelters to withstand the elements.</p>
          </div>
          <button class="shopItemButton">Add To Cart</button>
        </div>
        <div class="shopItem">
          <img src="Images/Overwatch.jpg" />
          <div class="itemInfo">
            <p>In a time of global crisis, an international task force of heroes banded together to restore peace to a war-torn world: OVERWATCH. It ended the crisis and helped to maintain peace in the decades that followed, inspiring an era of exploration, innovation, and discovery.</p>
          </div>
          <button class="shopItemButton">Add To Cart</button>
        </div>
        <div class="shopItem">
          <img src="Images/rocketleague.jpeg" />
          <div class="itemInfo">
            <p>A futuristic Sports-Action game, Rocket League®, equips players with booster-rigged vehicles that can be crashed into balls for incredible goals or epic saves across multiple, highly-detailed arenas.</p>
          </div>
          <button class="shopItemButton">Add To Cart</button>
        </div>
      </div>
    </div>
<?php require($DOCUMENT_ROOT . "Includes/footer.php");?>