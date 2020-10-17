<?php
require('../City.php');
require_once('../Country.php');
$view = 'editCity';
$countries = Country::findAll();
if (isset($_POST['name'])) {

    $city = new City($_POST);
    $city->save();
}


require('../tpl/index.phtml');
