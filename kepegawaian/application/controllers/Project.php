<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper('url');
		$this->load->model('project_model');
		$this->load->library('pagination');
	}

	public function index()
	{
		$this->load->view('user_dashboard/templates/header');
		$this->load->view('user_dashboard/project_index.php');
		$this->load->view('user_dashboard/templates/footer');
	}


	public function tambah()
	{
		$this->load->view('user_dashboard/templates/header');
		$this->load->view('user_dashboard/project_save.php');
		$this->load->view('user_dashboard/templates/footer');
	}

	public function projectData()
	{
		$config = array();
		$config["base_url"] = base_url() . "Project/projectData";
		$config['total_rows'] = $this->project_model->record_count();
		$config['per_page'] = 10;
		$config['uri_segment'] = 2;
		$this->pagination->initialize($config);

		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

		$data['results'] = $this->project_model->fetch_project($config['per_page'], $page);

		$data['links'] = $this->pagination->create_links();

		$this->load->view('user_dashboard/templates/header');
		$this->load->view('user_dashboard/project_index',$data);
		$this->load->view('user_dashboard/templates/footer');

	}

	public function projectSaving(){
		$data = array(
			'id' 			=> $this->input->post('id'),
			'title' 		=> $this->input->post('title'),
			'url'			=> $this->input->post('url'),
			'category'		=> $this->input->post('category'),
			'description'	=> $this->input->post('description')
			);

		$this->db->insert('m_project',$data);

		redirect('Project/projectData');
	}


}
