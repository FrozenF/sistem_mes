<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Crud_model extends CI_Model
{
    public function __construct()
    {
    	parent::__construct();
    	$this->load->database();
    }

    public function get($table,$params)
    {
        # Select
        if(isset($params['select']))
        {
            $this->db->select($params['select']);
        }

        # Where
        if(isset($params['where']))
        {
            $this->db->where($params['where']);
        }

        # Join
        if(isset($params['join']))
        {
            foreach($params['join'] as $join)
            {
                $this->db->join($join[0],$join[1]);
            }
        }

        # Left Join
        if(isset($params['left_join']))
        {
            foreach($params['left_join'] as $left_join)
            {
                $this->db->join($left_join[0],$left_join[1],'left');
            }
        }

        # Group By
        if(isset($params['group_by']))
        {
            $this->db->group_by($params['group_by']);
        }

        # Having
        if(isset($params['having']))
        {
            $this->db->having($params['having']);
        }

        # Return Count
        if(isset($params['count']))
        {
            return $this->db->count_all_results($table);
        }

        return $this->db->get($table)->result_array();
    }

    public function getAll($table,$status=true)
    {
        if($status)
        {
            $this->db->where('status',true);
        }
        return $this->db->get($table)->result_array();
    }

    public function find($table,$column,$value,$where=[])
    {
        $this->db->where($column,$value);
        if($where){
            $this->db->where($where);
        }
        return $this->db->get($table)->row();
    }

    public function store($table, $data, $timestamp=false, $user_log=false)
    {
        if($timestamp) {
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');
        }

        if($user_log)
        {
            $user_id = $this->session->userdata('id');
            $data['created_by'] = $user_id;
            $data['updated_by'] = $user_id;
        }

        return $this->db->insert($table,$data);
    }

    public function update($table, $data, $id, $timestamp=false, $user_log=false)
    {
        if($timestamp) {
            $data['updated_at'] = date('Y-m-d H:i:s');
        }

        if($user_log)
        {
            $user_id = $this->session->userdata('id');
            $data['updated_by'] = $user_id;
        }

        $this->db->set($data);
        return $this->db->where('id',$id)->update($table);
    }
}

/* End of file .php */
