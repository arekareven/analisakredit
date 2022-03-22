<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_pdf extends CI_Model
{
    public function view()
    {
        return $this->db->get('condition')->result();
    }

    public function view_row()
    {
        return $this->db->get('condition')->result();
    }
}
