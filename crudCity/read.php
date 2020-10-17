<?php

require('../config.php');
require('../City.php');
$view = 'city';
$cities = City::findAll();

require('../tpl/index.phtml');
