<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class contact_model extends CI_Model{

	var $tablename = "contact";

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
			'name'		=> $this->input->post('nome', FALSE),
			'email'		=> $this->input->post('queroveragora', FALSE),
			'subject'	=> $this->input->post('assunto', FALSE),
			'phone'		=> $this->input->post('telefone', FALSE),
			'city'		=> $this->input->post('cidade', FALSE),
			'message'	=> $this->input->post('contato_mensagem', FALSE),
			'status_id'	=> 1
		);
		
		if(intval($id) > 0){
			
			$data['updated_in']	= date('Y-m-d H:i:s');
			
			if($this->db->where(array('id' => $id))->update($this->tablename, $data)){
				return true;
			}
		}else{
			
			$data['created_in']	= date('Y-m-d H:i:s');
			
			if($this->db->insert($this->tablename, $data)){
				
				$this->sendMail($data);
				
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
				$this->db->like('email' , $where['email']);
			}
			
			if(!empty($where['phone'])){
				$this->db->like('phone' , $where['phone']);
			}
			
			if(!empty($where['city'])){
				$this->db->like('city' , $where['city']);
			}
			
			if(!empty($where['subject'])){
				$this->db->like('subject', $where['subject']);
			}
			
			if(!empty($where['message'])){
				$this->db->like('message', $where['message']);
			}
			
			if(!empty($where['status_id'])){
				$this->db->where('status_id', $where['status_id']);
			}
		}
		
		$this->db->select('*');
        $this->db->from($this->tablename);
		$this->db->where('status_id', 1);
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
				$this->db->like('email' , $where['email']);
			}
			
			if(!empty($where['phone'])){
				$this->db->like('phone' , $where['phone']);
			}
			
			if(!empty($where['city'])){
				$this->db->like('city' , $where['city']);
			}
			
			if(!empty($where['subject'])){
				$this->db->like('subject', $where['subject']);
			}
			
			if(!empty($where['message'])){
				$this->db->like('message', $where['message']);
			}
			
			if(!empty($where['status_id'])){
				$this->db->where('status_id', $where['status_id']);
			}
		}
		
 		$this->db->select('*');
        $this->db->from($this->tablename);
		$this->db->where('status_id', 1);
		
		return $this->db->get()->num_rows();
	}
	
	public final function change_status($id, $post)
	{
		return $this->db->where(array('id' => $id))->update($this->tablename, array('status_id' => $post, 'updated_in' => date('Y-m-d H:i:s')));
	}
	
	public final function sendMail($data)
	{
		$mensagem = '<html><head></head><body>
				Nome:       ' . $data['name'] . ' <br />
				E-mail:     ' . $data['queroveragora'] . ' <br />
				Telefone:     ' . $data['phone'] . ' <br />
				Cidade:     ' . $data['city'] . ' <br />
				Assunto:     ' . $data['subject'] . ' <br />
				Mensagem:   ' . $data['message'] . ' <br />
				</body></html>';
		
		$config['smtp_host']    = "localhost";
		$config['smtp_port']    = 587;
		$config['protocol']     = "smtp";
		$config['smtp_user']    = "contato@carmaniacs.com.br";
		$config['smtp_pass']    = "carmania";
		$config['charset']      = "utf-8";
		$config['mailtype']     = "html";
		$config['newline']      = "\r\n";
		$config['wordwrap']     = true;
		
		$this->email->initialize($config);
		
		$this->email->clear();
		$this->email->from('noreply@carmaniacs.com.br');
		$this->email->to(EMAIL_CONTATO);
		$this->email->reply_to($data['email']);
		$this->email->subject('Contato a partir do Site Carmaniacs - '.$data['subject']);
		$this->email->message($mensagem);	
		
		if($this->email->send()){
			return true;
		}
		
		return false;
	}
}