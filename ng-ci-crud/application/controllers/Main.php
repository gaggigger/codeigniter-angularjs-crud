<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	/* ---------------------------------------------------------------------------------------------------------------------- */

	public function __construct()
	{
		parent::__construct();
		// load security helper for xss filtering
		$this->load->helper("security");
		// load model for people
		$this->load->model("people");
	}

	/* ---------------------------------------------------------------------------------------------------------------------- */

	public function index()
	{
		// load view
		$this->load->view("site/main");
	}

	/* ---------------------------------------------------------------------------------------------------------------------- */

	public function readAll()
	{
		// read whole data
		$people = $this->people->readAll();
		print_r(json_encode($people));
	}

	/* ---------------------------------------------------------------------------------------------------------------------- */

	public function read()
	{
		// get data
		$id = $this->input->get('id');
		// clean data (xss filtering)
		$id = $this->security->xss_clean($id);
		// send data to model
		$read = $this->people->read($id);
		print_r(json_encode($read));
	}

	/* ---------------------------------------------------------------------------------------------------------------------- */

	public function create()
	{
		// get data
		$data = array(
			'name'=> $this->input->get('name'),
			'city'=> $this->input->get('city'),
			'country'=> $this->input->get('country'),
			'image'=> $this->input->get('image')
		);
		// clean data (xss filtering)
		$data = $this->security->xss_clean($data);
		// send data to model
		$this->people->create($data);
	}

	/* ---------------------------------------------------------------------------------------------------------------------- */

	public function update()
	{
		// get data
		$id = $this->input->get('id');

		$data = array(
			'name'=> $this->input->get('name'),
			'city'=> $this->input->get('city'),
			'country'=> $this->input->get('country'),
			'image'=> $this->input->get('image')
		);
		// clean data (xss filtering)
		$data = $this->security->xss_clean($data);
		// send data to model
		$this->people->update($id, $data);
	}

	/* ---------------------------------------------------------------------------------------------------------------------- */

	function delete()
	{
		// get data
		$id = $this->input->get('id');
		// clean data (xss filtering)
		$id = $this->security->xss_clean($id);
		// send data to model
		$this->people->delete($id);
	}

	/* ---------------------------------------------------------------------------------------------------------------------- */

}