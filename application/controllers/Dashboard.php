<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();

        if(!$this->session->userdata('id'))
        {
            $this->session->set_flashdata('error', 'Please Login First');
            redirect(base_url().'login');
            exit();
        }
    }

    public function index()
	{
	    $data['dashboard'] = 'active';
	    $data['page'] = 'dashboard/index';
        $this->load->view('layouts/base', $data);
	}

}

/* End of file Dashboard.php */
