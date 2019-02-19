<?php
/**
 * Created by PhpStorm.
 * User: Hamilton
 * Date: 09/02/2019
 * Time: 19:37
 */
?>

<?php

use \Hcode\Model\User;

    function formatPrice($vlprice){

        return number_format($vlprice, 2, ",",".");
    }

    function checkLogin($inadmin = true){

        return User::checkLogin($inadmin);
    }

    function getUserName(){

        $user = User::getFromSession();

        var_dump($user->getValues());
        exit;

        return $user->getdesperson();
    }



?>
