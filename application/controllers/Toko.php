<?php
class Toko extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        chek_role();
        $this->load->model('M_toko');
    }

    function index()
    {
        $data = array(
            'title' => 'KasirKita',
            'user' => $this->M_toko->get_all_data(),
        );
        $this->template->load('Template/template', 'Toko/lihat_data', $data, FALSE);
        $this->load->view('Template/datatables');
    }

    public function add()
    {
        $this->form_validation->set_rules('nama_operator', 'Nama Toko', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'KasirKita',
            );
            $this->template->load('Template/template', 'Toko/add', $data, FALSE);
            $this->load->view('Template/datatables');
        } else {
            $data = array(
                'nama_operator' => $this->input->post('nama_operator'),
                'username'   => $this->input->post('username'),
                'password'   => $this->input->post('password'),
            );
            $this->M_toko->add($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan!!');
            redirect('Toko');
        }
    }
    public function delete($id_operator)
    {
        $data = array(
            'id_operator'   => $id_operator,
        );
        $this->M_toko->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Delete!!');
        redirect('Toko');
    }
}
