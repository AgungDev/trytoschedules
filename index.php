<?php 
require_once 'f5m/setup.php';

use fun5i\manager\Setup;

$redirectPages = "manager";

$setup = new Setup();
$setup->loginAction($redirectPages);
if ($setup->auth()){
    header("Location: ".$redirectPages);
}
//var_dump($setup->getToken());

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Try to schedule</title>
</head>
<body>
    <!-- <div class="spinner spinner-grow" role="status">
        <span class="visually-hidden">Loading...</span>
    </div> -->
    <?php 
    $setup->loginPages();
    ?>
</body>
</html>