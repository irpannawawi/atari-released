<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		if ($this->session->role === "ADMIN") {
			redirect('admin/dashboard');
		}elseif($this->session->role === "DEFAULT"){
			redirect('public_area/home');
		}
		$this->load->view('login_page');
	}

	public function login_act()
	{
		$user = $this->input->post('username');
		$pass = $this->input->post("password");


		$result = $this->user_model->get_user($user, $pass);
		//check row of the data
		if ($result->num_rows()>=1) {
			 $status = 1; 
			 $user_data = $result->result()[0]; 
			//check username
			if($user === $user_data->username){ 
				$status = 1; 
				//check password
				if($pass === $user_data->password){
					$status =1; 
				}else{
					$status = 0;
				}
			}else{ 
				$status=0; 
			}
		}else{
			$status=0;
		}

		
		
		



		if($status==1)
		{
			//user granted
			//redirect to their own page
			//check role of user
			$this->session->username 	= $user;
			$this->session->userID 		= $user_data->id;
			$this->session->role 		= $user_data->privileges;
			if($this->session->role === "ADMIN")
			{
				//redirect to admin page
				redirect('admin/dashboard');
				
			}elseif($this->session->role === "DEFAULT"){
				//redirect to default user page
				redirect('public_area/home');
			}
		}else{
			$this->session->set_flashdata('status','Login failed! make sure you input correct username and password');
			redirect('Auth');
		}
	}


	public function logout()
	{
		session_destroy();
		redirect('auth');
		
	}
}
