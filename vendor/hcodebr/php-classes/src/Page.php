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

    public function  __construct($opts = array(), $tpl_dir = "/views/"){

        $this->options = array_merge($this->defaults, $opts);

        $config = array(
            "tpl_dir"       => $_SERVER["DOCUMENT_ROOT"].$tpl_dir,
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
//        $this->tpl = new Tpl();

        foreach ($data as $key => $value){
            $this->tpl->assign($key, $value);
        }

    }

    //Corpo da pagina
    public function setTpl($name, $data = array(), $returnHTML = false){

        $this->setData($data);
        $this->tpl = new Tpl();

        return  $this->tpl->draw($name,$returnHTML);

    }

    public function __destruct(){
//        $this->tpl = new Tpl;

        $this->tpl->draw("footer");
    }
}

?>