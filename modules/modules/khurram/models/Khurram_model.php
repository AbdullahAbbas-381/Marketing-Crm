<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Khurram_model extends App_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get($id = '')
    {
        if ($id != '') {
            $this->db->where('id', $id);
            return $this->db->get(db_prefix() . 'khurram')->row();
        }

        return $this->db->get(db_prefix() . 'khurram')->result_array();
    }

    public function add($data)
    {
        $insert = [
            'clientid'   => isset($data['clientid']) ? $data['clientid'] : 0,
            'remarks'    => isset($data['remarks']) ? $data['remarks'] : '',
            'date_added' => date('Y-m-d H:i:s'),
        ];

        $this->db->insert(db_prefix() . 'khurram', $insert);

        return $this->db->insert_id();
    }
}
