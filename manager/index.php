<?php 
require_once '../f5m/setup.php';

use fun5i\manager\Setup;

$setup = new Setup();
if (!$setup->auth()){
    header("Location: ../");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../assets/css/fontaw.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/index.css">
    <title>Try to schedule</title>
</head>
<body>
    <div class="spinner spinner-grow" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
    <a href="logout.php">logout</a>
    <?php 
    echo "manager</br>";
    var_dump($setup->hostName());

    ?>
</body>
<script src="../assets/javascript/jquery.3.6.0.js"></script>
</html>