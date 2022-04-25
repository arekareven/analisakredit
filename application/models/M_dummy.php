<?php

class M_dummy extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
    }

    public function data_select()
    {
        return $this->db->get('notaris');
    }
}
