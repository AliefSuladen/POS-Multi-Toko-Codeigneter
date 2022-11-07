<?php

class Model_lapbulanan extends Ci_Model
{

    public function bulanan($thn)
    {
        $id = $this->session->userdata('id');
        return $this->db->select('tgl_trf,sum(grand_total) as gtotal')
            ->from('detail_penjualan')
            ->where('YEAR(tgl_trf)', $thn)
            ->where('detail_penjualan.id_user', $id)
            ->group_by('MONTH(tgl_trf)')
            ->get()
            ->result();
    }

    public function income()
    {
        $id = $this->session->userdata('id');
        return $this->db->select('sum(grand_total) as gtotal')
            ->from('detail_penjualan')
            ->where('month(tgl_trf) = month(CURRENT_date())')
            ->where('detail_penjualan.id_user', $id)
            ->get()
            ->row();
    }

    public function total_penjualan()
    {
        $id = $this->session->userdata('id');
        return $this->db->select('sum(jumlah_stok) as total')
            ->join('detail_penjualan', 'detail_penjualan.id = penjualan.id_dtlpen', 'left')
            ->where('month(detail_penjualan.tgl_trf) = month(CURRENT_date())')
            ->where('penjualan.id_user', $id)
            ->from('penjualan')->get()->row();
    }

    public function total_transaksi()
    {
        $id = $this->session->userdata('id');
        return $this->db->select('count(id) as total')
            ->where('month(tgl_trf) = month(CURRENT_date())')
            ->where('detail_penjualan.id_user', $id)
            ->from('detail_penjualan')->get()->row();
    }

    public function total_barang()
    {
        $id = $this->session->userdata('id');
        return $this->db->select('sum(jumlah_stok) as total')
            ->where('penjualan.id_user', $id)
            ->from('penjualan')->get()->row();
    }
    public function barang_laris()
    {
        $id = $this->session->userdata('id');
        $query =  $this->db->select('barang.nama_barang,sum(jumlah_stok) as total,barang.foto,detail_penjualan.tgl_trf')
            ->from('penjualan')
            ->join('barang', 'barang.id_barang = penjualan.id_barang', 'left')
            ->join('detail_penjualan', 'detail_penjualan.id = penjualan.id_dtlpen', 'left')
            ->group_by('barang.nama_barang')
            ->order_by('total', 'ASC')
            ->where('penjualan.id_user', $id)
            ->where('month(detail_penjualan.tgl_trf) = month(CURRENT_date())')
            ->limit('1')
            ->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
}
