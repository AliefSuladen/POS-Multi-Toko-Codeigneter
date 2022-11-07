<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_toko extends CI_Model
{
    public function login($email, $password)
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where(array(
            'email' => $email,
            'password' => $password,
        ));
        return $this->db->get()->row();
    }
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('operator');
        $this->db->order_by('id_operator', 'ASC');
        return $this->db->get()->result();
    }
    public function add($data)
    {
        $this->db->insert('operator', $data);
    }
    public function delete($data)
    {
        $this->db->where('id_operator', $data['id_operator']);
        $this->db->delete('operator', $data);
    }
}
