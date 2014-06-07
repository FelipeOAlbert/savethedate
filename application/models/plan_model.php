<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class plan_model extends CI_Model{

	var $tablename = "plan";

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

	function save($id = false)
	{
		$data = array(
			'name'			=> $this->input->post('name', FALSE),
			'description'	=> $this->input->post('description', FALSE),
			'value'			=> comma_period($this->input->post('value', FALSE)),
		);
		
		if(intval($id) > 0){
			
			$data['updated_in']	= date('Y-m-d H:i:s');
			
			if($this->db->where(array('id' => $id))->update($this->tablename, $data)){
				return true;
			}
		}else{
			
			$data['created_in']	= date('Y-m-d H:i:s');
			$data['hash']		= random_string('unique');
			
			if($this->db->insert($this->tablename, $data)){
				return true;
			}
		}
		
        return FALSE;
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