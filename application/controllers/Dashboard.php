<?php
class Dashboard extends CI_controller
{


    public function __construct()
    {
        parent::__construct();
        chek_session();
        $this->load->model('Model_dashboard');
    }


    function index()
    {
        $data['box'] = $this->box();
        $data['graph'] = $this->Model_dashboard->graph_stok();
        $data['laris'] = $this->Model_dashboard->barang_laris();
        $data['title'] = 'Kasir Kita';
        $this->template->load('Template/template', 'Dashboard/lihat_dashboard', $data);
        // var_dump($this->session->userdata());
        // die;
    }

    public function box()
    {
        $box = [
            [
                'box'         => 'green',
                'total'     => $this->Model_dashboard->total(),
                'title'        => 'Total Barang',
                'link'    => 'Barang',
                'icon'        => 'cubes'
            ],

            [
                'box'         => 'yellow-active',
                'total'     =>  $this->Model_dashboard->total_penjualan()->total,
                'title'        => 'Total Barang Terjual',
                'link'    => 'laporan',
                'icon'        => 'shopping-cart'
            ],
            [
                'box'         => 'primary',
                'total'     => $this->Model_dashboard->total_stok()->total,
                'title'        => 'Total Stok Barang',
                'link'    => 'stok',
                'icon'        => 'retweet'
            ],
        ];
        $info_box = json_decode(json_encode($box), FALSE);
        return $info_box;
    }
}
