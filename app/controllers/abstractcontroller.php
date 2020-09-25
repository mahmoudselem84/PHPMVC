<?php


namespace PHPMVC\CONTROLLERS;


class abstractController
{
protected $_controller;
protected $_action;
protected $_params;

public function notFoundAction ()
{
    $this->_view();
}
public function setController($controller){
    $this->_controller=$controller;
}
    public function setAction($action){
        $this->_action=$action;
    }
    public function setParams($params){
        $this->_params=$params;
    }
    protected function _view(){
    echo VIEWS_PATH.$this->_controller.DS.$this->_action;
    }
}