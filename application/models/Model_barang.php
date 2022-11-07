
<?php

class Model_barang extends CI_Model
{
	function get_all_data()
	{
		$id = $this->session->userdata('id');
		$this->db->select('*');
		$this->db->where('id_user', $id);
		$this->db->from('barang');
		$this->db->join('ukuran', 'ukuran.id_ukuran = barang.ukuran', 'left');

		$query = $this->db->get();
		return $query->result();
	}


	function tampilkan_ukuran()
	{
		return  $this->db->get('ukuran');
	}

	function tampil_dropdown()
	{
		return
			$this->db->select('id_barang, nama_barang')
			->from('barang')
			->get();
	}

	function post($data)
	{
		$this->db->insert('barang', $data);
	}

	function get_one($id)
	{
		$param = array('id_barang' => $id);
		return $this->db->get_where('barang', $param);
	}

	function edit($data, $id)
	{
		$this->db->where('id_barang', $id);
		$this->db->update('barang', $data);
	}

	function hapus($id)
	{
		$this->db->where('id_barang', $id);
		$this->db->delete('barang');
	}

	function get_detail_modal($id)
	{
		return $this->db->where('id_barang', $id)
			->get('barang')
			->row();
	}
}
