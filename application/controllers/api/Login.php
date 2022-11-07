<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Login extends RestController
{

    public function index_post()
    {
        $data = [
            'username' => trim($this->input->post('username', TRUE)),
            'password' => trim($this->input->post('password', TRUE)),
        ];
        $cek = $this->db->get_where('operator', array('username' => $this->input->post('username', TRUE)));
        $row = $this->db->get_where('operator', $data)->row();
        if ($cek->num_rows() >= 1) {
            if ($row) {
                $result = [
                    'id' => $row->id_operator,
                    'status_login' => 'oke',
                    'username' => $row->username,
                    'nama_operator' => $row->nama_operator,
                ];
                $this->response(['error' => false, 'massage' => 'login berhasil', 'Result' => $result], 200);
            } else {
                $this->response(['error' => true, 'massage' => 'Pasword Salah'], 401);
            }
        } else {
            $this->response(['error' => true, 'massage' => 'email tidak terdaftar'], 401);
        }
    }
}
