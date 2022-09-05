<?php 
require_once '../f5m/setup.php';

use fun5i\manager\Setup;

$setup = new Setup();
$setup->logout();
header("Location: ../");