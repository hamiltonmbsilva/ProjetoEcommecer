<?php
/**
 * Created by PhpStorm.
 * User: Hamilton
 * Date: 09/02/2019
 * Time: 19:37
 */


use \Hcode\Model\User;
use \Hcode\Model\Cart;

    function formatPrice($vlprice){

        return number_format($vlprice, 2, ",",".");
    }

    function checkLogin($inadmin = true){

        return User::checkLogin($inadmin);
    }

    function getUserName(){

        $user = User::getFromSession();

        return $user->getdesperson();
    }

    function formatDate($date)
    {
        return date('d/m/Y', strtotime($date));
    }

    function getCartNrQtd()
    {
        $cart = Cart::getFromSession();
        $totals = $cart->getProductsTotals();
        return $totals['nrqtd'];
    }

    function getCartVlSubTotal()
    {
        $cart = Cart::getFromSession();
        $totals = $cart->getProductsTotals();
        return formatPrice($totals['vlprice']);
    }

?>
