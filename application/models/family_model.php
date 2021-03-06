<?php 

class family_model extends CI_Model
{
	
	public $tbl_family= 'tbl_family';
	 

	function __construct(){
		parent::__construct();

	}
	
	
	function get_paged_list()
	{
		$will_id = $this->session->userdata['is_userlogged_in']['will_id'];

		$this->db->select('tbl_family.id,tbl_family.name as name,tbl_family.relationship,tbl_family.dob, tbl_family.marital_status, tbl_family.status,admin_relations.rel_id,admin_relations.name as rel');
		$this->db->from('tbl_family');
		$this->db->join('admin_relations','admin_relations.rel_id=tbl_family.relationship','left');
		$this->db->where('will_id',$will_id);
		$this->db->order_by('id','asc');
		$query = $this->db->get();

		return $query;
	}

	function get_relation()
	{
		$this->db->order_by('rel_id','asc');
		return $this->db->select(['rel_id','name'])
						->get('admin_relations');
	}

	function save($family){	
		$family['will_id'] = $this->session->userdata['is_userlogged_in']['will_id'] ;
		
		$this->db->insert($this->tbl_family, $family);
		return $this->db->insert_id();
	}

	public function get_by_id($id){
		$will_id = $this->session->userdata['is_userlogged_in']['will_id'] ;
		$this->db->where('will_id', $will_id);
		return $this->db->get($this->tbl_family);
	}

	public function update($id,$family){

		$this->db->where('id', $id);
		$this->db->update($this->tbl_family, $family);
	}

	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete($this->tbl_family);
	}
}

?>