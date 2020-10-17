<?php
require('../City.php');
require('../Country.php');
$view = 'editCity';
$city = City::find($_GET['id']);
$countries = Country::findAll();
if (isset($_POST['name'])) {
    $city = City::find($_POST['id']);
    $city->populate($_POST);
    //$user = new User($_POST);
    $city->save();
    header("Location:./read.php");
}
require('../tpl/index.phtml');
