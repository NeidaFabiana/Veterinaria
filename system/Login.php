<?php

/**
 * Classe Login utilizada para implementar e gerenciar o sistema de autenticação
 * criando e manipulano Sessões ou Cookies.
 *
 * @author Gill
 */
class Login {
    
    /**
     *
     * @var type boolean
     */
    private $logged;
    
    /**
     *
     * @var type Usuario
     */
    private $user;
    
    /**
     *
     * @var type Model
     */
    private $model;
    
    public function __construct() {
//        $this->model = new UsuarioDAO();
        
    }
    
    /**
     * 
     * @param Usuario $user
     * @return boolean Retorna um booleano, verdadeiro para usuario logado
     * Recebe um obj user como parametro e verifica se esta cadastrado no banco
     * deve consulatar atraves do model se o login do usuario existe e se existir
     * comparar se a senha do obj user é igual a cadastrada no banco. 
     * Retorna true se o usuario esta devidamente cadastrado e false se nao for
     * possivel autenticar
     */
    public function verifyLogin(Usuario $user) {
		
		
        return true;
    }
    
    /**
     * Criar a sessão com os dados do usuário autenticado, deve usar o próprio
     * atributo $this->user da classe Login.
     */
    public function createSession() {
        
    }
    /**
     * @param number $validade Tempo de validade dos cookies
     * Criar os cookies com a validade passado como parametro $validade. Usar
     * prório objeto $this->user para criar os cookies.
     */
    public function createCookies($validade) {
        
    }
    /**
     * @return Array Retorna os dados a sessão PHP com os dados do usuário
     */
    public function getSession() {
        
    }
    /**
     * @return Usuario retorna os dados do usuário salvos nos Cookies
     */
    public function getCookie() {
        
    }
    
    /**
     * @return Usuario retorna o objeto Usuario com os dados do usuário logado.
     */
    public function getLoggeduser() {
        
    }
    
    /**
     * @return Boolean Retorna verdadeiro se o usuário estiver logado e falso se
     * não existir sessão ou cookie.
     */
    public function isLogged() {
        
    }
    
    /**
     * Destroi as sessẽos e os cookies criados
     */
    public function logout() {
        
    }
}
