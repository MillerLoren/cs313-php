<?php require($DOCUMENT_ROOT . "Includes/header.php");?>
  <meta name="description" content="Please login to view your leads.">
  <title>Leads Scanner - Login</title>
</head>
<body>
<?php require($DOCUMENT_ROOT . "Includes/nav.php");?>
    <div id="content">
        <h2>Please scan QR code or Bar Code</h2>
        <div id="camera">
            <form action="" method="post" enctype="multipart/form-data">  
                <input type="file" name="uploadedfile" accept="image/*" capture="camera" />  
                <input type="submit" value="Upload">  
            </form>
        </div>
    </div>
<?php require($DOCUMENT_ROOT . "Includes/footer.php");?>