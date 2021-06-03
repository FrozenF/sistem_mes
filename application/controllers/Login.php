<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();
        $this->load->library('bcrypt');
        $this->load->model('crud_model');
        /* Default user

        $data['password'] = $this->bcrypt->hash('admin');
        $data['username'] = 'admin';
        $data['name'] = 'Administrator';
        $this->crud_model->store('users',$data);

        */

    }

	public function index()
	{
	    $data['login'] = true;
	    $data['page'] = 'auth/login';
        return $this->load->view('layouts/base',$data);
	}

	public function process()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $find = $this->crud_model->find('users','username',$username);

        if($find){
            if($this->bcrypt->verify($password,$find->password))
            {
                $array = array(
                    'id' => $find->id,
                    'name' => $find->name,
                    'username' => $find->username
                );

                $this->session->set_userdata($array);
                redirect('dashboard','refresh');
            }else{
                $this->session->set_flashdata('error', 'Invalid Username and Password');
                redirect('login', 'refresh');
            }
        }else{
            $this->session->set_flashdata('error', 'Invalid Username and Password');
            redirect('login', 'refresh');
        }

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login','refresh');
    }

}

/* End of file Controllername.php */
