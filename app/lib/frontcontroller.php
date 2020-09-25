<?php
namespace PHPMVC\LIB;

class Frontcontroller{
    private $_controller='index';
    private $_action ='default';
    private $_params =array();
    public function __construct(){
        $this->_parseUrl();
    }
  private function _parseUrl(){
      $url=trim(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH),DS);
      if(!empty($url)){
      $url=explode(DS,$url,3);
      $url_count=count($url);
      switch ($url_count){
          case 0 :
              break;
          case 1 :
              $this->_controller=$url[0];
              break;
          case 2 :
              $this->_controller=$url[0];
              $this->_action=$url[1];
              break;
          default:
              list($this->_controller,$this->_action,$this->_params)=$url;
              $this->_params=explode(DS,$this->_params);
              break;
      }}
  }
  public function dispatch(){
        $controllerClassName='PHPMVC\CONTROLLERS\\'.ucfirst($this->_controller).'Controller';
        $actionName=$this->_action.'Action';
        if(!class_exists($controllerClassName)){
            $controllerClassName='PHPMVC\CONTROLLERS\NoFoundController';
        }
        $controller=new $controllerClassName();
        if(!method_exists($controller,$actionName)){
            $actionName='notFoundAction';
            $this->_action=$actionName;
        }
        $controller->setController($this->_controller);
      $controller->setAction($this->_action);
      $controller->setParams($this->_params);
    $controller->$actionName();
    }
}