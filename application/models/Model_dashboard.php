<?php

class Model_dashboard extends CI_Model
{

    public function total()
    {

        $id = $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->where('id_user', $id);
        $query = $this->db->get()->num_rows();
        return $query;
    }

    public function total_penjualan()
    {
        $id = $this->session->userdata('id');
        $this->db->select('sum(jumlah_stok) as total');
        $this->db->from('penjualan');
        $this->db->where('id_user', $id);
        return $this->db->get()->row();
    }

    public function total_stok()
    {
        $id = $this->session->userdata('id');
        $this->db->select('sum(stok_barang) as total');
        $this->db->from('stok');
        $this->db->where('id_user', $id);
        return $this->db->get()->row();
    }

    public function graph_stok()
    {
        $id = $this->session->userdata('id');
        $this->db->select('barang.nama_barang,sum(stok_barang) as total,barang.foto');
        $this->db->from('stok')->join('barang', 'barang.id_barang = stok.id_barang', 'left');
        $this->db->where('stok.id_user', $id);
        $this->db->group_by('stok.id_barang');
        return $this->db->get()->result();
    }



    public function barang_laris()
    {
        $id = $this->session->userdata('id');
        $this->db->select('barang.nama_barang,sum(jumlah_stok) as total,barang.foto,detail_penjualan.tgl_trf');
        $this->db->from('penjualan');
        $this->db->join('barang', 'barang.id_barang = penjualan.id_barang', 'left');
        $this->db->join('detail_penjualan', 'detail_penjualan.id = penjualan.id_dtlpen', 'left');
        $this->db->group_by('barang.nama_barang');
        $this->db->order_by('total', 'ASC');
        $this->db->where('penjualan.id_user', $id);
        $this->db->where('month(detail_penjualan.tgl_trf) = month(CURRENT_date())');
        $this->db->limit('5');
        return $this->db->get()->result();
    }
}
