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

$app->get('/', function() {

    $page = new Page();
    $page->setTpl('index');

});

?>
