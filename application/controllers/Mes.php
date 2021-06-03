<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mes extends CI_Controller {

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
        $data['mes_menu'] = 'active';
        $data['mes'] = $this->crud_model->getAll('mes',false);
        $data['page'] = 'mes/index';
        $this->load->view('layouts/base', $data);
    }

    public function create()
    {
        $data['mes_menu'] = 'active';
        $data['page'] = 'mes/create';
        $this->load->view('layouts/base', $data);
    }

    public function store()
    {
        $data['name'] = $this->input->post('name');
        $data['address'] = $this->input->post('address');
        $data['status'] = $this->input->post('status');
        $data['max_room'] = $this->input->post('max_room');

        if($this->crud_model->store('mes',$data,true,true)){
            redirect('mes/index');
        }else{
            redirect('mes/create');
        }
    }

    public function edit($id)
    {
        $data['mes_menu'] = 'active';
        $data['edit'] = $this->crud_model->find('mes','id',$id);
        $data['page'] = 'mes/edit';
        $this->load->view('layouts/base', $data);
    }

    public function update()
    {
        $id = $this->input->post('edit_id');
        $data['name'] = $this->input->post('name');
        $data['address'] = $this->input->post('address');
        $data['status'] = $this->input->post('status');
        $data['max_room'] = $this->input->post('max_room');

        if($this->crud_model->update('mes',$data,$id,true,true)){
            redirect('mes/index');
        }else{
            redirect('mes/edit/'.$id);
        }
    }

}

/* End of file Mes.php */
