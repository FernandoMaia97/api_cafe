<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Cafe extends REST_Controller 
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Cafe_Model', 'cm');
    }

    public function tipos_get($id=NULL)
    {

       // se nao existir o id, lista todos
        if ($id === NULL) {
            // Dados vindos da model/banco
            $tipos = $this->cm->listar();
            // verifica se existem cafes
            if ($tipos) {
                // Set the response and exit
                $this->response($tipos, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            } else {
                //mensagem de erro retornada
                $message = [
                    'status' => FALSE,
                    'message' => 'Nenhum tipo de café encontrado!'
                ];
                // Set the response and exit
                $this->response($message, REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            
            }

        } else {
            // Verifica se o id é válido para pesquisa.
            if (!is_numeric($id) || $id <= 0) {
                //mensagem de erro retornada
                $message = [
                    'status' => FALSE,
                    'message' => 'Parametro de forma incorreta!'
                ];
                // nao é valido.
                $this->response($message, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
           
            } else {

                $id = (int) $id;
                //busca o id no banco
                $tipo = $this->cm->pesquisar($id);
                //se existe o id, retorna os dados
                if (!empty($tipo)) {
                    
                    $this->set_response($tipo, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
                
                } else {
                    //mensagem de erro, caso nao exista o id
                    $message = [
                        'status' => FALSE,
                        'message' => 'Tipo de café não encontrado!'
                    ];

                    $this->set_response($message, REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code

                }

            }

        }

    }

    public function tipos_post()
    {
        //recebe as variaveis via post
        $nome = $this->input->post('nome');
        $descricao = $this->input->post('descricao');

        //verifica se houve conteudo nas variaveis
        if(!empty($nome) && !empty($descricao)) {

            $verificacao = $this->cm->pesquisa_nome($nome);
            //verificacao de nome ja cadastrado
            if (!$verificacao || empty($verificacao)) {
                
                $id = $this->cm->cadastrar($nome, $descricao);
                //se houve cadastro, envia mensagem e codigo de sucesso
                if($id){
                    //mensagem de sucesso retornada
                    $message = [
                        'id' => $id,
                        'nome' => $nome,
                        'descricao' => $descricao,
                        'message' => 'Tipo de café cadastrado com sucesso!'
                    ];
                
                    $this->set_response($message, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response 
                
                } else {
                    //caso haja falha no cadastro, retorna mensagem de erro
                    $message = [
                        'status' => false,
                        'message' => "Houve problemas com sua requisição!"
                    ];
                    
                    $this->set_response($message, REST_Controller::HTTP_BAD_REQUEST);
                
                }
            } else {
                //caso haja nome ja cadastrado, envia mensagem de erro
                $message = [
                    'status' => false,
                    'message' => "Tipo de café já cadastrado!"
                ];

                $this->set_response($message, REST_Controller::HTTP_BAD_REQUEST);

            }

        } else {
            //caso nao haja nome ou descricao, envia mensagem de erro
            $message = [
                'status' => false,
                'message' => "Voce precisa enviar o tipo do cafe e sua descrição!"
            ];

            $this->set_response($message, REST_Controller::HTTP_BAD_REQUEST);

        }

    }

}
