<?php


class Laporan extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        chek_role();
        $this->load->model('Model_laporan');
    }


    function index($start = null, $end = null)
    {
        if (isset($_POST['search'])) {
            $start = $this->input->post('start_date');
            $end = $this->input->post('end_date');
            $metode = $this->input->post('metode');
            $data = array(
                'title' => 'KasirKita',
                'laporan' => $this->Model_laporan->get_range($start, $end, $metode),
                'metode' => $this->Model_laporan->get_metode(),
            );
            $this->template->load('Template/template', 'Laporan/lihat_data', $data);
            $this->load->view('Template/datatables');
        } else {

            $data = array(
                'title' => 'KasirKita',
                'laporan' => $this->Model_laporan->get_data(),
                'metode' => $this->Model_laporan->get_metode(),
            );
            $this->template->load('Template/template', 'Laporan/lihat_data', $data);
            $this->load->view('Template/datatables');
        }
    }

    function hapus($id)
    {
        $this->Model_laporan->hapus_trf($id);
        $this->Model_laporan->hapus_id($id);
    }
}
