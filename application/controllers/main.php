<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
		$this->load->model('Dash');
		$this->load->helper('html');
		$this->load->library('form_validation');
	}
	public function remove($id)
	{
		$user = $this->Dash->getuser($id);
		$this->load->view('remove', array('user' => $user));
	}
	public function delete($id)
	{
		$user = $this->Dash->delete($id);
		redirect(base_url('admindash'));
	}
	public function index()
	{
		$this->load->view('main');
	}
	public function signin()
	{
		$this->load->view('signin');
	}
	public function register()
	{
		$this->load->view('register');
	}	 
	public function dashboard()
	{
		$users = $this->Dash->getusers();
		$this->load->view('dashboard', array('users' => $users));
	}
	public function admindash()
	{
		$users = $this->Dash->getusers();
		$this->load->view('admindash', array('users' => $users));
	}

//edit profile
	public function edit($id)
	{
		$user = $this->Dash->getuser($id);
		$this->load->view('edit', array('user' => $user));
	}
	public function updateuser($id)
	{

		//update form validation
		$this->form_validation->set_rules('first_name', 'firstname', 'trim|alpha|required');
		$this->form_validation->set_rules('last_name', 'lastname', 'trim|alpha|required');
		$this->form_validation->set_rules('email', 'e-mail', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'password', 'trim|required|matches[confirmpassword]|md5');
		$this->form_validation->set_rules('confirmpassword', 'confirm password', 'trim|required|md5');
		if ($this->form_validation->run() == FALSE)
		{
			 $this->session->set_flashdata('edit', validation_errors());
			 redirect(base_url('/dashboard'));

		}
		else
		{
			//load model send post data
			$user = $this->input->post();
			$this->Dash->update($user);
			$user = $this->Dash->getuser($id);
			redirect(base_url('/dashboard'));
		}

	}


//show functions and messaging	
	public function show($id)
	{
		$messages=$this->Dash->get_messages($id);
		$user = $this->Dash->getuser($id);
		$comments=$this->Dash->get_comments($id);
		$this->load->view('show', array('user' => $user, 'messages' => $messages, 'comments' => $comments));
	}
	public function message_post($id)
	{
		//takes in message id of user posting.. posted by user $id add message to database, send back to view
		$post = $this->input->post();
		$this->Dash->postmessage($id);
		redirect(base_url('users/show/'.$post['wall_id']));
	}
	public function comment_post($id)
	{
		$post = $this->input->post();
		$this->Dash->postcomment($post);
		redirect(base_url('users/show/'.$post['wall_id']));
	}


//LOGIN / REGISTRATION
	public function logincheck()
	{
		//login
		$this->form_validation->set_rules('login', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('pw', 'password', 'trim|required|md5');
		if ($this->form_validation->run() == FALSE)
		{
			 $this->session->set_flashdata('login', validation_errors());
			 redirect(base_url('/signin'));
		}
		else
		{
			//load model send post data
			$user = $this->input->post();
			$get_user = $this->Dash->login($user);
	
			if($get_user){
				if($get_user['user_level'] == 'admin')
				{
					$this->session->set_userdata('user', $get_user);
				redirect(base_url('admindash'));
				}
				$this->session->set_userdata('user', $get_user);
				redirect(base_url('dashboard'));
			} else {
				$this->session->set_flashdata('login', 'User not found.');
				redirect(base_url('/signin'));
			}
		}
	}
	public function registercheck()
	{
		//registration
		$this->form_validation->set_rules('first_name', 'firstname', 'trim|alpha|required');
		$this->form_validation->set_rules('last_name', 'lastname', 'trim|alpha|required');
		$this->form_validation->set_rules('email', 'e-mail', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'password', 'trim|required|matches[confirm]|md5');
		$this->form_validation->set_rules('confirm', 'confirm password', 'trim|required|md5');
		if ($this->form_validation->run() == FALSE)
		{
			 $this->session->set_flashdata('registration', validation_errors());
			 redirect(base_url('/register'));
		}
		else
		{
			//load model send post data
			$user = $this->input->post();
			$this->Dash->registration($user);
			redirect(base_url('/signin'));
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();

		$this->session->set_flashdata('logout', 'You are Logged Out');

		redirect(base_url('/'));
	}

//end of main controller
}

