<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_barang extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_barang_with_kategori()
    {
        $this->db->select('tb_barang.*, tb_kategori.kategori');
        $this->db->from('tb_barang');
        $this->db->join('tb_kategori', 'tb_barang.kategori_id = tb_kategori.id', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('tb_barang');
        return $query->row(); // Mengembalikan satu baris data
    }

    public function insert_data($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function update_data($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_barang', $data);
    }

    public function delete_data($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_barang');
    }
}
