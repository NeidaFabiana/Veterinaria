<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controller
 *
 * @author Professor
 */
class Controller {

    protected $config;
    private $query;

    /**
     * @var View
     */
    protected $view;

    /**
     *
     * @var Model;
     */
    protected $model;

    public function __construct() {
        include 'config.php';
        $this->config = $config;
        $this->view = new View();
    }

    public function route($query = null) {
        $class = null;

        $this->query = $query;
        if ($this->query) {

            $this->query = explode('/', $this->query);
			
            $class_name = $this->query[0];

            if (count($this->query) > 1) {

                $method = $this->query[1];
            } else {

                $method = null;
            }
            $param = (count($this->query) > 2) ? $this->query[2] : null;
            if (class_exists($class_name)) {
				
                $class = new $class_name;
				
				//var_dump($class);die;

                if ($class instanceof Controller) {
					//var_dump($class, "aquui");die;
					
                    if (method_exists($class, $method)) {
                        if ($param) {
                            $class->$method($param);
                        } else {
                            $class->$method();
                        }
                    } else {
                        if (method_exists($class, 'index')) {
                            $class->index();
                        } else {
                            $this->view->index();
                        }
                    }
                }
            }
        }
		//var_dump($class);
        if (!$class) {
            $class = new $this->config->defaultClass;
			
			//var_dump("olar", $class);
            $class->index();			
        }
    }
    
    public function reload(){
        header('Location: '.$_SERVER['HTTP_REFERER']);
    }
}