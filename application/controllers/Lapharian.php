<?php

class Lapharian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        chek_session();
        $this->load->model('Model_lapharian');
    }


    function index($year = NULL, $month = NULL)
    {
        $data['calender'] = $this->Model_lapharian->getcalender($year, $month);
        $data['title'] = 'Kasir Kita';
        $data['cards'] = $this->cards();
        $this->template->load('Template/template', 'Laporan/lap_harian', $data);
    }

    public function cards()
    {
        $data['laris'] = $this->Model_lapharian->barang_laris();
        if ($data['laris'] == FALSE) {
            $laris = 'kosong';
        } else {
            $laris = $this->Model_lapharian->barang_laris()->nama_barang;
        }
        $card = [
            [
                'box'         => 'green',
                'total'     => 'Rp.' . number_format($this->Model_lapharian->income()->gtotal),
                'title'        => 'Pendapatan',
                'description'    => 'Total Pendapatan',
                'icon'        => 'money'
            ],
            [
                'box'         => 'blue',
                'total'     => $this->Model_lapharian->total_penjualan()->total,
                'title'        => 'Barang Terjual',
                'description'    => 'Total Barang Terjual',
                'icon'        => 'shopping-cart'
            ],
            [
                'box'         => 'yellow-active',
                'total'     =>  $this->Model_lapharian->total_transaksi()->total,
                'title'        => 'Total Penjualan',
                'description'    => 'Total Penjualan',
                'icon'        => 'shopping-basket'
            ],

        ];
        $info_card = json_decode(json_encode($card), FALSE);
        return $info_card;
    }
}
