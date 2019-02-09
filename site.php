<?php
/**
 * Created by PhpStorm.
 * User: Hamilton
 * Date: 05/02/2019
 * Time: 14:46
 */
?>
<?php

use \Hcode\Page;
use \Hcode\Model\Product;

$app->get('/', function() {

    $products = Product::listAll();
    $page = new Page();
    $page->setTpl('index',[
        'products'=>Product::checkList($products)
    ]);

});



?>
