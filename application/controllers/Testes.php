<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'third_party'.DIRECTORY_SEPARATOR.'Unirest.php';
class Testes extends CI_Controller {
	
	public function __construct()
	{
			parent::__construct();
			$this->load->library('unit_test');
			$this->load->helper('url');
	}

	public function cadastro()
	{
		$headers = array('Accept' => 'application/json');
		$data = array('nome' => 'teste unitario', 'descricao' => 'testando');

		$body = Unirest\Request\Body::form($data);

		$response = Unirest\Request::post(base_url('cafe/tipos'), $headers, $body);
		 
		$test = $response->code;
		$expected_result = 201;
		$test_name = 'Cadastro - Na primeira vez deve retornar status 201 e na segunda vez 400';
		$str_template = 'ITEM | DESCRIÇÃO'.PHP_EOL.'{rows}{item} = {result}'.PHP_EOL.'{/rows}';
		$this->unit->set_template($str_template);
		echo $this->unit->run($test, $expected_result, $test_name);
		if(isset($response->body->message)) print_r($response->body->message);
	}

	public function cadastro_vazio()
	{
		$headers = array('Accept' => 'application/json');
		$data = array();

		$body = Unirest\Request\Body::form($data);

		$response = Unirest\Request::post(base_url('cafe/tipos'), $headers, $body);
		
		$test = $response->code;
		$expected_result = 400;
		$test_name = 'Cadastro Vazio - Nao pode retornar status 201';
		$str_template = 'ITEM | DESCRIÇÃO'.PHP_EOL.'{rows}{item} = {result}'.PHP_EOL.'{/rows}';
		$this->unit->set_template($str_template);
		echo $this->unit->run($test, $expected_result, $test_name);
		if(isset($response->body->message)) print_r($response->body->message);
	}

	public function listar()
	{
		$headers = array('Accept' => 'application/json');
		$data = array();

		$body = Unirest\Request\Body::form($data);

		$response = Unirest\Request::get(base_url('cafe/tipos'), $headers, $body);
		
		$test = $response->code;
		$expected_result = 200;
		$test_name = 'Listar - Deve retornar status 200';
		$str_template = 'ITEM | DESCRIÇÃO'.PHP_EOL.'{rows}{item} = {result}'.PHP_EOL.'{/rows}';
		$this->unit->set_template($str_template);
		echo $this->unit->run($test, $expected_result, $test_name);
		if(isset($response->body->message)) print_r($response->body->message);
	}

	public function pesquisar()
	{
		$headers = array('Accept' => 'application/json');
		$data = array();

		$body = Unirest\Request\Body::form($data);

		$response = Unirest\Request::get(base_url('cafe/tipos/1'), $headers, $body);
		
		$test = $response->code;
		$expected_result = 200;
		$test_name = 'Pesquisar - Deve retornar status 200';
		$str_template = 'ITEM | DESCRIÇÃO'.PHP_EOL.'{rows}{item} = {result}'.PHP_EOL.'{/rows}';
		$this->unit->set_template($str_template);
		echo $this->unit->run($test, $expected_result, $test_name);
		if(isset($response->body->message)) print_r($response->body->message);
	}
	public function pesquisar_nome()
	{
		$headers = array('Accept' => 'application/json');
		$data = array();

		$body = Unirest\Request\Body::form($data);

		$response = Unirest\Request::get(base_url('cafe/tipos/Mocha'), $headers, $body);
		
		$test = $response->code;
		$expected_result = 400;
		$test_name = 'Pesquisar - Deve retornar status 400, porque so é permitida pesquisa por id';
		$str_template = 'ITEM | DESCRIÇÃO'.PHP_EOL.'{rows}{item} = {result}'.PHP_EOL.'{/rows}';
		$this->unit->set_template($str_template);
		echo $this->unit->run($test, $expected_result, $test_name);
		if(isset($response->body->message)) print_r($response->body->message);
	}
}