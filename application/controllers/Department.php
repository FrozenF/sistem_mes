<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('id'))
        {
            $this->session->set_flashdata('error', 'Please Login First');
            redirect(base_url().'login');
            exit();
        }

        $this->load->model('crud_model');
    }

	public function index()
	{
	    $data['department_menu'] = 'active';
	    $data['departments'] = $this->crud_model->getAll('departments',false);
        $data['page'] = 'department/index';
        $this->load->view('layouts/base', $data);
	}

	public function create()
    {
        $data['department_menu'] = 'active';
        $data['page'] = 'department/create';
        $this->load->view('layouts/base', $data);
    }

    public function store()
    {
        $data['full_name'] = $this->input->post('name');
        $data['short_name'] = $this->input->post('short_name');
        $data['status'] = $this->input->post('status');

        if($this->crud_model->store('departments',$data,true,true)){
            redirect('department/index');
        }else{
            redirect('department/create');
        }
    }

    public function edit($id)
    {
        $data['department_menu'] = 'active';
        $data['edit'] = $this->crud_model->find('departments','id',$id);
        $data['page'] = 'department/edit';
        $this->load->view('layouts/base', $data);
    }

    public function update()
    {
        $id = $this->input->post('edit_id');
        $data['full_name'] = $this->input->post('name');
        $data['short_name'] = $this->input->post('short_name');
        $data['status'] = $this->input->post('status');

        if($this->crud_model->update('departments',$data,$id,true,true)){
            redirect('department/index');
        }else{
            redirect('department/edit');
        }

    }

}

/* End of file Department.php */
