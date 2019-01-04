<?php
/**
 * Created by PhpStorm.
 * User: Hamilton
 * Date: 04/01/2019
 * Time: 14:44
 */

namespace Hcode;

use Rain\Tpl;

class Page{

    private $tpl;
    private $options = [];
    private $defaults = [
        "data"=>[]
    ];

    public function  _contruct($opts = array()){

        $this->options = array_merge($this->defaults, $opts);

        $config = array(
            "tpl_dir"       => $_SERVER["DOCUMENT_ROOT"]."/views/",
            "cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
            "debug"         => false
        );

        Tpl::configure( $config );

        $this->tpl = new Tpl;

        $this->setData($this->options["data"]);

        //Desenhar o template na tela
        $this->tpl->draw("header");

    }

    private function setData($data = array()){

        foreach ($data as $key => $value){
            $this->tpl->assign($key, $value);
        }

    }

    //Corpo da pagina
    public function setTpl($name, $data = array(), $returnHTML = false){

        $this->setData($data);


        return $this->tpl->draw($name, $returnHTML);

    }

    public function  _destruct(){

        $this->tpl->draw("footer");
    }
}

?>