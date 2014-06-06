<?php defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {
	
	private $validation = array(
		array(
			'field'	=> 'name',
			'label'	=> 'Nome',
			'rules' => 'trim|required',
		),
		array(
			'field'	=> 'email',
			'label'	=> 'Email',
			'rules' => 'trim|required|valid_email|is_unique[user.email]',
		),
		array(
			'field'	=> 'password',
			'label'	=> 'Senha',
			'rules' => 'trim|required|matches[confirm_password]',
		),
		array(
			'field'	=> 'confirm_password',
			'label'	=> 'Confirmar Senha',
			'rules' => 'trim|required',
		)
	);
	
	function __construct()
	{
		parent::__construct();
		$this->security_model->is_logged();
		
		$this->load->model("user_model", "dm");
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
			
			//printr($busca);
			
			$busca = base64_decode($busca);
			parse_str($busca, $busca);
			$busca = array_map('trim', $busca);
			
			$data['search']['id']			= @$busca['id'];
			$data['search']['name']			= @$busca['name'];
			$data['search']['email']		= @$busca['email'];
			$data['search']['status_id']	= @$busca['status_id'];
		}
		
		$this->render($this->router->method, $data);
	}

	public function create()
	{
		$this->form_validation->set_rules($this->validation);
		
		if($_POST && $this->form_validation->run() === TRUE){
			
			if($this->dm->save_user()){
				$this->session->set_userdata('mensagem', array('mensagem' => 'Usuário Salvo com sucesso', 'retorno' => true));
			}else{
				$this->session->set_userdata('mensagem', array('mensagem' => 'Erro ao salvar usuário', 'retorno' => false));
			}
			
			redirect($this->router->class);
		}
		
		$this->render($this->router->method);
	}
	
	public function update($id)
	{
		$data['row']	= $this->dm->getAll(array('id' => $id));
		
		# verificando se o email e diferente do que o user ja tem...
		if($data['row']['email'] == $this->input->post('email')){
			$this->validation[1]['rules'] = 'trim|required|valid_email';
		}
		
		# verificando se a senha foi alterada
		if(empty($_POST['password']) and empty($_POST['confirm_password'])){
			unset($this->validation[2]);
			unset($this->validation[3]);
		}
		
		$this->form_validation->set_rules($this->validation);
		
		if($_POST && $this->form_validation->run() === TRUE){
			
			if($this->dm->save_user($id)){
				$this->session->set_userdata('mensagem', array('mensagem' => 'Usuário editado com sucesso', 'retorno' => true));
			}else{
				$this->session->set_userdata('mensagem', array('mensagem' => 'Erro ao editar usuário', 'retorno' => false));
			}
			
			redirect($this->router->class);
		}
		
		$this->render($this->router->method, $data);
	}
	
	public function delete($id)
	{
		if($this->dm->change_status($id, '0')){
			$this->session->set_userdata('mensagem', array('mensagem' => 'Usuário inativado com sucesso', 'retorno' => true));
		}else{
			$this->session->set_userdata('mensagem', array('mensagem' => 'Erro ao inativar usuário', 'retorno' => false));
		}
		
		redirect($this->router->class);
	}
	
	public function active($id)
	{
		if($this->dm->change_status($id, '1')){
			$this->session->set_userdata('mensagem', array('mensagem' => 'Usuário ativado com sucesso', 'retorno' => true));
		}else{
			$this->session->set_userdata('mensagem', array('mensagem' => 'Erro ao ativar usuário', 'retorno' => false));
		}
		
		redirect($this->router->class);
	}
}