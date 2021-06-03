<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Room extends CI_Controller {

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
        $data['room_menu'] = 'active';
        $params['select'] = 'rooms.*,mes.name as mes_name';

        $params['join'] = [
            ['mes','mes.id = rooms.mes_id']
        ];

        $data['rooms'] = $this->crud_model->get('rooms',$params);
        $data['page'] = 'room/index';
        $this->load->view('layouts/base', $data);
    }

    public function create()
    {
        $data['room_menu'] = 'active';
        $data['mes'] = $this->crud_model->getAll('mes');
        $data['page'] = 'room/create';
        $this->load->view('layouts/base', $data);
    }

    public function store()
    {
        $data['name'] = $this->input->post('name');
        $data['mes_id'] = $this->input->post('mes_id');
        $data['status'] = $this->input->post('status');
        $data['max_capacity'] = $this->input->post('max_capacity');

        if(!$this->check_mes_capacity($data['mes_id']))
        {
            $this->session->set_flashdata('error', 'Mes sudah penuh.');
            redirect('room/create');
        }

        if($this->crud_model->store('rooms',$data,true,true)){
            redirect('room/index');
        }else{
            redirect('room/create');
        }
    }

    public function edit($id)
    {
        $data['room_menu'] = 'active';
        $data['edit'] = $this->crud_model->find('rooms','id',$id);
        $data['mes'] = $this->crud_model->getAll('mes');
        $data['page'] = 'room/edit';
        $this->load->view('layouts/base', $data);
    }

    public function update()
    {
        $id = $this->input->post('edit_id');
        $data['name'] = $this->input->post('name');
        $data['mes_id'] = $this->input->post('mes_id');
        $data['status'] = $this->input->post('status');
        $data['max_capacity'] = $this->input->post('max_capacity');

        if(!$this->check_mes_capacity($data['mes_id'],true))
        {
            $this->session->set_flashdata('error', 'Mes sudah penuh.');
            redirect('room/edit/'.$id);
        }

        if($this->crud_model->update('rooms',$data,$id,true,true)){
            redirect('room/index');
        }else{
            redirect('room/edit/'.$id);
        }
    }

    private function check_mes_capacity($mes_id,$edit = false)
    {
        # Get Max Capacity
        $mes = $this->crud_model
            ->find('mes','id',$mes_id);

        $count_used_room = $this->crud_model
            ->get('rooms',
                  [
                      'where' => ['mes_id'=>$mes_id],
                      'count' => true
                  ]
            );
        if($edit)
        {
            $count_used_room -= 1;
        }

        return ($count_used_room < $mes->max_room);
    }

}

/* End of file Room.php */
