<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Room_transaction extends CI_Controller {

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
        $params['select'] = 'room_details.*,employees.id as employee_id,employees.name as employee_name,mes.name as mes_name,rooms.name as room_name';
        $params['join'] = [
            ['employees','employees.id = room_details.employee_id'],
            ['rooms','rooms.id = room_details.room_id'],
            ['mes','rooms.mes_id = mes.id']
        ];
        $params['where'] = [
            'room_details.status' => true
        ];

        if($mes_id = $this->input->get('filter_mes')){
            $params['where']['mes.id'] = $mes_id;
        }

        $data['room_details'] = $this->crud_model->get('room_details',$params);
        $data['mes'] = $this->crud_model->getAll('mes');

        $data['room_detail_menu'] = 'active';
        $data['room_detail_menu_active'] = 'active';
        $data['page'] = 'room_transaction/index';
        $this->load->view('layouts/base', $data);
    }

	public function new()
	{
	    $params1['select'] = 'employees.*,room_details.room_id';
	    $params1['left_join'] = [
	        ['room_details','room_details.employee_id = employees.id and room_details.status = 1']
        ];
	    $data['employee'] = $this->crud_model->get('employees',$params1);
        $data['mes'] = $this->crud_model->getAll('mes');

        $data['room_detail_menu'] = 'active';
        $data['room_detail_menu_new'] = 'active';
	    $data['page'] = 'room_transaction/new';
        $this->load->view('layouts/base', $data);
	}

	public function get_room($id)
    {
        $params['select'] = 'rooms.id,rooms.name,rooms.max_capacity';

        $params['where'] = [
            'rooms.status' => 1,
            'rooms.mes_id' => $id
        ];

        $params['left_join'] = [
            ['room_details','room_details.room_id = rooms.id and room_details.status = 1']
        ];

        $params['group_by'] = [
            'rooms.id'
        ];

        $params['having'] = 'count(room_details.id) < max_capacity';

        $data['rooms'] = $this->crud_model
            ->get('rooms',$params);

        echo json_encode($data['rooms']);
    }

	public function save_new()
    {
        $data['employee_id'] = $this->input->post('employee_id');
        $data['room_id'] = $this->input->post('room_id');
        $data['date'] = $this->input->post('date');
        $data['status'] = true;

        if($this->crud_model->store('room_details',$data,true,true)){
            redirect('room_transaction/index');
        }else{
            redirect('room_transaction/index');
        }
    }

	public function move($employee_id)
    {
        $data['mes'] = $this->crud_model->getAll('mes');

        $data['employee_id'] = $employee_id;
        $data['room_detail_menu'] = 'active';
        $data['room_detail_menu_move'] = 'active';
        $data['page'] = 'room_transaction/move';
        $this->load->view('layouts/base', $data);
    }

    public function save_move()
    {
        $data['employee_id'] = $this->input->post('employee_id');
        $data['date'] = $this->input->post('date');

        # Set Old Room to Empty
        $old_room = $this->crud_model->find('room_details','employee_id',$data['employee_id'],['status'=>1]);

        $old_update = ['status'=>false,'out_date'=>$data['date']];
        $this->crud_model->update('room_details',$old_update,$old_room->id,true,true);


        $data['room_id'] = $this->input->post('room_id');
        $data['status'] = true;

        # Insert New Data
        if($this->crud_model->store('room_details',$data,true,true)){
            redirect('room_transaction/index');
        }else{
            redirect('room_transaction/index');
        }

    }

    public function out($employee_id)
    {
        $data['employee_id'] = $employee_id;

        $data['room_detail_menu'] = 'active';
        $data['room_detail_menu_out'] = 'active';
        $data['page'] = 'room_transaction/out';
        $this->load->view('layouts/base', $data);
    }

    public function save_out()
    {
        $data['employee_id'] = $this->input->post('employee_id');
        $data['date'] = $this->input->post('date');

        # Update Status
        $old_room = $this->crud_model->find('room_details','employee_id',$data['employee_id'],['status'=>true]);
        $old_update = ['status'=>false,'out_date'=>$data['date']];
        if($this->crud_model->update('room_details',$old_update,$old_room->id,true,true)){
            redirect('room_transaction/index');
        }else{
            redirect('room_transaction/index');
        }
    }

}

/* End of file Room_transaction.php */
