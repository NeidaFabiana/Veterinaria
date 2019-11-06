<?php
class Admin extends Controller{

    public function __construct() {
        parent::__construct();
     
			 $this->view->setTemplate('admin');
    }

 public function index() {
        
	    $this->model = new NoticiasDAO();
		
		
		
        $this->view->load("header");
        $this->view->load("nav");
        $this->view->load("index",$data);
        $this->view->load("footer");
    }
	
	 public function login() {
        /*
         * Mostrar a pagina de autenticacao
         * Com formulario de login (login, senha, []manter conectado->cookie)
         * Receber os dados de login, senha e manter conectado
         * Montar o objeto Usuario com login e senha
         * login->verifyLogin(user)
         * TRUE:
         *      criar a sessao e ou o cookie (para manter conectado)
         * FALSE:
         *      redireciona para página de login
         */
        echo "Implementar LOGIN";
        return true;
    }
    
    public function logout() {
        //destruir sessoes e cookies
        //$login->logout()
        //$this->view->location("Admin")//Home
        echo "Implementar LOGOUT";
        return true;
    }
	
	
}
