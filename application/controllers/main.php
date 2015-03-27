<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
	}

	public function index()
	{
		$this->load->model('process');
		
		$this->load->view('index');
		
	}
	
	public function process_login()
	{
		$thepost = $this->input->post();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if($this->form_validation->run())
		{
			$this->load->model('process');
			$this->process->compare_login($thepost);
			if ($this->session->userdata('email') != NULL) {
					redirect('/main/profile');
				}
			else {
					redirect('/');
				}	
			
	    }
	    else
	    {
	    $this->session->set_flashdata("login_error", "Email/password is incorrect");
	      	redirect('/');
	    }
		
	}
	
	public function profile()
	{
		$this->load->model('process');
		$data['friends']=$this->process->get_friends();
		$data['not_friends']=$this->process->get_not_friends();
		$this->load->view('profile', $data);
	}
	
	public function process_registration()
	{		
		$thepost = $this->input->post();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
		if($this->form_validation->run())
		{
			$this->load->model('process');
			$this->process->compare_registration($thepost);
			redirect('/');

	    }
	    else
	    {
	    $this->session->set_flashdata("registration_error_form", "Please fill all fields");
	      	redirect('/');
	    }
		
		
	}

	public function view_profile($id)
	{
		$this->load->model('process');
		$data['user']=$this->process->get_specific_user($id);
		$this->load->view('other_user_profile', $data );
	}

	public function delete_friend($id)
	{
		$this->load->model('process');
		$data['user']=$this->process->delete_this_friend($id);
		redirect('/main/profile');
	}

	public function out()
	{

		$this->session->sess_destroy();
		redirect('/');
		
	}
	
}
