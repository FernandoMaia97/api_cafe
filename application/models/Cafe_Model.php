<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cafe_Model extends CI_Model 
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        //  carregar a biblioteca de db
        $this->load->database();
    }

    public function listar()
    {
        //busca no banco todos ordenados pelo nome
        $query = $this->db->order_by("nome")->get("tipo");        
        //retorno do dados em forma de array
        return $query->result_array();
    }

    public function pesquisar($id)
    {
        // busca no banco um id especifico
        $query = $this->db->where("id", $id)->get("tipo");
        //retorno do dados em forma de array
        return $query->result_array();
    }

    public function pesquisa_nome($nome)
    {
        // busca no banco um nome/tipo especifico
        $query = $this->db->where("nome", $nome)->get("tipo");
        //retorno do dados em forma de array
        return $query->result_array();
    }

    public function cadastrar($nome, $descricao)
    {
        // monta um array com o nome da coluna na tabela e os dados dos parametros passado
        $data = array(
            'nome' => $nome,
            'descricao' => $descricao
        );
        
        //verifica se a insercao foi concluida corretamente
        if($this->db->insert("tipo", $data, true)){
            //retorna o id inserido
            return $this->db->insert_id();
        } else {
            //retorna false em caso de erro na insercao
            return false;
        }
    
    }

}
