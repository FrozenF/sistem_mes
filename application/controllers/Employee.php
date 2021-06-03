<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

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
	    $data['employee_menu'] = 'active';
	    $data['employees'] = $this->crud_model->getAll('employees',false);
        $data['page'] = 'employee/index';
        $this->load->view('layouts/base', $data);
	}

	public function create()
    {
        $data['employee_menu'] = 'active';
        $data['departments'] = $this->crud_model->getAll('departments');
        $data['page'] = 'employee/create';
        $this->load->view('layouts/base', $data);
    }

    public function store()
    {
        $data['nik'] = $this->input->post('nik');
        $data['name'] = $this->input->post('name');
        $data['address'] = $this->input->post('address');
        $data['department_id'] = $this->input->post('department_id');
        $data['status'] = $this->input->post('status');

        if($this->crud_model->store('employees',$data,true,true)){
            redirect('employee/index');
        }else{
            redirect('employee/create');
        }
    }

    public function edit($id)
    {
        $data['employee_menu'] = 'active';
        $data['edit'] = $this->crud_model->find('employees','id',$id);
        $data['departments'] = $this->crud_model->getAll('departments');
        $data['page'] = 'employee/edit';
        $this->load->view('layouts/base', $data);
    }

    public function update()
    {
        $id = $this->input->post('edit_id');
        $data['nik'] = $this->input->post('nik');
        $data['name'] = $this->input->post('name');
        $data['address'] = $this->input->post('address');
        $data['department_id'] = $this->input->post('department_id');
        $data['status'] = $this->input->post('status');

        if($this->crud_model->update('employees',$data,$id,true,true)){
            redirect('employee/index');
        }else{
            redirect('employee/edit/'.$id);
        }
    }


}

/* End of file Employee.php */
