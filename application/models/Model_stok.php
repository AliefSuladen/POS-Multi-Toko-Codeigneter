<?php

class Model_stok extends CI_Model
{

	function tampil_data()
	{
		$id = $this->session->userdata('id');
		$this->db->select('*');
		$this->db->where('barang.id_user', $id);
		$this->db->from('barang');
		$this->db->join('stok', 'barang.id_barang = stok.id_barang', 'left');
		return $this->db->get()->result();
	}

	function tampil_data2()
	{
		return $this->db->get('stok')->result();
	}

	function post($data)
	{
		$this->db->insert('stok', $data);
	}

	function get_one($id)
	{
		$param = array('id_stok' => $id);
		return $this->db->get_where('stok', $param);
	}

	function edit($id, $data)
	{
		$this->db->where('id_stok', $id);
		$this->db->update('stok', $data);
	}

	function tambah_stok($id, $data)
	{
		$this->db->where('id_barang', $id);
		$this->db->update('stok', $data);
	}

	function hapus($id)
	{
		$this->db->where('id_stok', $id);
		$this->db->delete('stok');
	}

	function get_stok($id)
	{
		$param = array('id_barang' => $id);
		return $this->db->get_where('stok', $param)->row();
	}
}
