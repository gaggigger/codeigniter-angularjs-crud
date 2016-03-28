<?php defined('BASEPATH') OR exit('No direct script access allowed');

class People extends CI_Model {

	/* ------- Parent Construct -------- */

	public function __construct()
	{
		parent::__construct();
	}

	/* ------- Read Whole Data ------- */

	public function readAll()
	{
		$this->db->select('*')->from('people')->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	/* -------- Create Data --------- */

	public function create($data)
	{
		$this->db->insert('people', $data);
		return $this->db->insert_id();
	}

	/*------ Read Chosen Data --------*/

	function read($id){
		$this->db->select('*')->from('people')->where('id', $id);
		$query = $this->db->get();
		return $query->first_row('array');
	}

	/* ------- Update Data ---------- */

	function update($id, $data){
		$this->db->where('id', $id);
		$this->db->update('people',$data);
	}

	/* -------- Delete Data --------- */

	public function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('people');
	}

	/* --------- End --------- */

}