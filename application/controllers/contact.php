<?php defined('BASEPATH') OR exit('No direct script access allowed');

class contact extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->Security_model->is_logged();
		
		$this->load->model("contact_model", "dm");
	}
	
	public final function render($method, $data = array())
	{
		$this->load->view('dashboard/'.$this->router->class.'/'.$method, $data);
	}
	
	public function index($pagina = 1, $busca = false)
	{
		$data['list']		= $this->dm->lista($pagina, $busca);
		
		if($busca){
			$data['paginacao']	= pagination($pagina, $this->dm->total($busca), $this->router->class.'/index', $busca);
		}else{
			$data['paginacao']	= pagination($pagina, $this->dm->total(), $this->router->class.'/index');
		}
		
		if(base64_decode($busca, true)){
			
			$busca = base64_decode($busca);
			parse_str($busca, $busca);
			$busca = array_map('trim', $busca);
			
			$data['search']['id']			= @$busca['id'];
			$data['search']['name']			= @$busca['name'];
			$data['search']['description']	= @$busca['description'];
			$data['search']['status_id']	= @$busca['status_id'];
		}
		
		$this->render($this->router->method, $data);
	}
	
	public function view($id = false)
	{
		$data['row']	= $this->dm->getAll(array('id' => $id));
		
		$this->render($this->router->method, $data);
	}
	
	public function delete($id)
	{
		if($this->dm->change_status($id, '0')){
			$this->session->set_userdata('mensagem', array('mensagem' => 'Mensagem apagada com sucesso', 'retorno' => true));
		}else{
			$this->session->set_userdata('mensagem', array('mensagem' => 'Erro ao apagada mensagem', 'retorno' => false));
		}
		
		redirect($this->router->class);
	}
}