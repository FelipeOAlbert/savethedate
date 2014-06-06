<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class user_model extends CI_Model{

	var $tablename = "user";

	public final function __construct()
	{
		parent::__construct();
	}

	/*
	 * Genéricas
	*/
	function getAll( $where=false, $content=false){

		if($content==false)
			$this->db->select('*');
		else
			$this->db->select($content);

		$this->db->from($this->tablename);

		if($where!=false)
			$this->db->where($where);

		$query = $this->db->get();

		if($query->num_rows() > 0)
			return $query->row_array();
		else
			return false;
	}

	public final function save_profile()
	{
		$data = array(
			'name' 				=> $this->input->post('name', FALSE),
			'email' 			=> $this->input->post('email', FALSE),
			'updated_in'		=> date('Y-m-d H:i:s')
		);
		
		if(!empty($_POST['password'])){
			$data['password']	= md5($this->input->post('password', FALSE));
		}
		
		if($this->db->where(array('id' => $this->session->userdata('user_id')))->update('user', $data)){
			return true;
		}
		
		return false;
	}

	function save_user($id = false)
	{
		$data = array(
			'name' 				=> $this->input->post('name', FALSE),
			'email' 			=> $this->input->post('email', FALSE),
			'status_id' 		=> 1
		);
		
		if(!empty($_POST['password'])){
			$data['password']	= md5($this->input->post('password', FALSE));
		}
		
		if(intval($id) > 0){
			
			$data['updated_in']	= date('Y-m-d H:i:s');
			
			if($this->db->where(array('id' => $id))->update($this->tablename, $data)){
				return true;
			}
		}else{
			
			$data['created_in']	= date('Y-m-d H:i:s');
			
			if($this->db->insert($this->tablename, $data)){
				return true;
			}
		}
		
        return FALSE;
	}
	
	function save(){
		//Pega POST
		$data = $this->input->post();

		//Valida
			//Email válido e não dulicado
			//Senha e confirmação identicas

		$email = $data['email'];
		$password = md5($data['password']);

		//Salva na tabela de user

        $data = array(	'email'	=>$email,
        				'password'	=>$password,
        				'status' 	=> 1);

        $query = $this->db->insert($this->tablename, $data);

        if ($this->db->affected_rows() > 0)
                return TRUE;

        return FALSE;
	}

	function login()
	{
		$login    = $this->input->post("login", false);
		$password = $this->input->post("password", false);
		
		if( $login==false || $password==false )
			return false;
		
		$this->db->select('*');
		$this->db->from($this->tablename);
		
		$this->db->where( array('email' => $login,'status_id' => 1) );
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0){
			$pass = $query->result_array();
			
			if( $pass[0]['password'] == md5($password) ){
				
				$this->session->set_userdata("user_id", $pass[0]['id']);
				
				return true;
			}
		}
		
		return false;
	}
	
	function lista($pagina, $where = array())
	{
		if($where){
			$where = base64_decode($where);
			
			parse_str($where, $where);
			
			if(!empty($where['id'])){
				$this->db->where('id', $where['id']);
			}
			
			if(!empty($where['name'])){
				$this->db->like('name' , $where['name']);
			}
			
			if(!empty($where['email'])){
				$this->db->like('email', $where['email']);
			}
			
			if(!empty($where['status_id'])){
				
				$where['status_id'] = ($where['status_id'] == 2) ? 0 : $where['status_id'];
				
				$this->db->where('status_id', $where['status_id']);
			}
		}
		
		$this->db->select('*');
        $this->db->from($this->tablename);
		$this->db->order_by('status_id', 'desc');
		$this->db->order_by('id', 'desc');
		
		$inicio = ($pagina*10)-10;
        $this->db->limit(10,$inicio);
		
        $query = $this->db->get();
		
		return $query->result_array();
	}

	function total($where = array())
	{
		if($where){
			$where = base64_decode($where);
			
			parse_str($where, $where);
			
			if(!empty($where['id'])){
				$this->db->where('id', $where['id']);
			}
			
			if(!empty($where['name'])){
				$this->db->like('name' , $where['name']);
			}
			
			if(!empty($where['email'])){
				$this->db->like('email', $where['email']);
			}
			
			if(!empty($where['status_id'])){
				$this->db->where('status_id', $where['status_id']);
			}
		}
		
 		$this->db->select('*');
        $this->db->from($this->tablename);
		
		return $this->db->get()->num_rows();
	}
	
	public final function change_status($id, $post)
	{
		return $this->db->where(array('id' => $id))->update($this->tablename, array('status_id' => $post, 'updated_in' => date('Y-m-d H:i:s')));
	}
}