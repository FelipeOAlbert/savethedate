<?php defined('BASEPATH') OR exit('No direct script access allowed');

class plan extends CI_Controller {
	
	private $validation = array(
		array(
			'field'	=> 'name',
			'label'	=> 'Nome',
			'rules' => 'trim|required',
		),
	);
	
	function __construct()
	{
		parent::__construct();
		$this->security_model->is_logged();
		
		$this->load->model("plan_model", "dm");
	}
	
	public final function render($method, $data = array())
	{
		$this->load->view('dashboard/'.$this->router->class.'/'.$method, $data);
	}
	
	public function index($pagina = 1, $busca = false)
	{
		$data['list']		= $this->dm->lista($pagina, $busca);
		
		if($busca){
			$data['paginacao']	= pagination($pagina, $this->dm->total($busca), 'user/index', $busca);
		}else{
			$data['paginacao']	= pagination($pagina, $this->dm->total(), 'user/index');
		}
		
		if(base64_decode($busca, true)){
			
			$busca = base64_decode($busca);
			parse_str($busca, $busca);
			$busca = array_map('trim', $busca);
			
			$data['search']['id']			= @$busca['id'];
			$data['search']['name']			= @$busca['name'];
			$data['search']['value']		= @$busca['value'];
			$data['search']['status_id']	= @$busca['status_id'];
		}
		
		$this->render($this->router->method, $data);
	}

	public function create()
	{
		$this->form_validation->set_rules($this->validation);
		
		if($_POST && $this->form_validation->run() === TRUE){
			
			if($this->dm->save()){
				$this->session->set_userdata('mensagem', array('mensagem' => 'Plano Salvo com sucesso', 'retorno' => true));
			}else{
				$this->session->set_userdata('mensagem', array('mensagem' => 'Erro ao salvar Plano', 'retorno' => false));
			}
			
			redirect($this->router->class);
		}
		
		$this->render($this->router->method);
	}
	
	public function update($id)
	{
		$data['row']	= $this->dm->getAll(array('id' => $id));
		
		$this->form_validation->set_rules($this->validation);
		
		if($_POST && $this->form_validation->run() === TRUE){
			
			if($this->dm->save($id)){
				$this->session->set_userdata('mensagem', array('mensagem' => 'Plano editado com sucesso', 'retorno' => true));
			}else{
				$this->session->set_userdata('mensagem', array('mensagem' => 'Erro ao editar Plano', 'retorno' => false));
			}
			
			redirect($this->router->class);
		}
		
		$this->render($this->router->method, $data);
	}
	
	public function delete($id)
	{
		if($this->dm->change_status($id, '0')){
			$this->session->set_userdata('mensagem', array('mensagem' => 'Plano inativado com sucesso', 'retorno' => true));
		}else{
			$this->session->set_userdata('mensagem', array('mensagem' => 'Erro ao inativar Plano', 'retorno' => false));
		}
		
		redirect($this->router->class);
	}
	
	public function active($id)
	{
		if($this->dm->change_status($id, '1')){
			$this->session->set_userdata('mensagem', array('mensagem' => 'Plano ativado com sucesso', 'retorno' => true));
		}else{
			$this->session->set_userdata('mensagem', array('mensagem' => 'Erro ao ativar plano', 'retorno' => false));
		}
		
		redirect($this->router->class);
	}
}