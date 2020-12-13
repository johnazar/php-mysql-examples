<?php
//to do
namespace app\controllers;
use app\models\Player;
use app\Router;

class PlayerController{
    public function index(Router $router){
        echo $router->renderView('product/index');
    }

    public function create(){
        echo $router->renderView('product/create');
    }

    public function update(){
        echo $router->renderView('product/update');
    }

    public function delete(){
        echo $router->renderView('product/index');
    }


}