<?php

class Barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        chek_role();
        $this->load->model('Model_barang');
        $this->load->model('Model_kategori');
    }
    function index()
    {
        $data = array(
            'title' => 'KasirKita',
            'record' => $this->Model_barang->get_all_data(),
        );

        $this->template->load('Template/template', 'Barang/lihat_data', $data);
        $this->load->view('template/datatables');
    }
    function post()
    {
        if (isset($_POST["submit"])) {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 1024;
            $config['max_width']            = 6000;
            $config['max_height']           = 6000;
            $config['overwrite'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['encrypt_name'] = TRUE;
            $this->upload->initialize($config);


            // proses barang
            $id = $this->input->post('id');
            $nama = $this->input->post('nama_barang');
            $harga = $this->input->post('harga');
            $data = array(
                'nama_barang' => $nama,
                'harga' => $harga,
                'id_user' => $this->session->id,

            );
            $this->Model_barang->post($data, $id);
            $this->session->set_flashdata('message', 'Data Barang berhasil ditambahkan!');
            redirect('Barang');
        } else {
            $id = $this->uri->segment(3);
            $data['error'] = $this->upload->display_errors();
            $this->load->model("Model_kategori");
            $data = array(
                'title' => 'KasirKita',
                'record' => $this->Model_barang->get_all_data(),
                'ukuran' => $this->Model_barang->tampilkan_ukuran()->result(),

            );
            $this->template->load("Template/template", "Barang/form_input", $data);
        }
    }


    function edit()
    {
        if (isset($_POST['submit'])) {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 1024;
            $config['max_width']            = 6000;
            $config['max_height']           = 6000;
            $config['overwrite'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['encrypt_name'] = TRUE;
            $this->upload->initialize($config);

            $id         =   $this->input->post('id');
            $nama       =   $this->input->post('nama_barang');
            $kategori   =   $this->input->post('kategori');
            $harga      =   $this->input->post('harga');
            $ukuran     =   $this->input->post('ukuran');

            $data       = array(
                'nama_barang' => $nama,
                'id_kategori' => $kategori,
                'ukuran' => $ukuran,
                'harga' => $harga,
                'id_user' => $this->session->id

            );
            $this->Model_barang->edit($data, $id);
            $this->session->set_flashdata('message', 'Data Barang berhasil dirubah!');
            redirect('Barang');
        } else {
            $id =  $this->uri->segment(3);
            $this->load->model('Model_kategori');
            $data = array(
                'title' => 'KasirKita',
            );
            $data['record']     =  $this->Model_barang->get_one($id)->row_array();
            $this->template->load('Template/template', 'Barang/form_edit', $data);
        }
    }
    function hapus()
    {
        $id = $this->uri->segment(3);
        $this->Model_barang->hapus($id);
        $this->session->set_flashdata('message', 'Data Barang berhasil dihapus!');
        redirect('Barang');
    }

    function detail_modal($id)
    {
        $id = $this->input->get('id');
        $data['detail'] = $this->Model_barang->get_detail_modal($id);
        $this->load->view('Barang/modal_detail', $data);
    }
}
