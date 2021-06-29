<?php
require '../vendor/autoload.php';


//if($_SERVER["REQUEST_URI"] == "/module-two/public/index.php"){
//    require '../app/controllers/homepage.php';
//}

//exit();

use League\Plates\Engine;

$templates = new Engine('../app/views');

//echo $templates->render('homepage', ['name'=>'Tolebi']);
echo $templates->render('about', ['name'=>'Tolebi']);