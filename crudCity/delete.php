<?php
require('../City.php');
require_once('../Country.php');
$view = 'editCity';
$city = City::find($_GET['id']);
$city->delete();
header("Location:./read.php");
