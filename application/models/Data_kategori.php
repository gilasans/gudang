<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_kategori extends CI_Model {
    public function __construct() {
        parent::__construct();
        
    }
    // public function index()
    // {
    //     $this->load->view('kategori');
    // }
    public function get_kategori()
    {
        $query = $this->db->get('tb_kategori');
        return $query->result();
    }
    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('tb_kategori');
        return $query->row(); 
    }

    public function insert_data($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function update_data($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_kategori', $data);
    }

    public function delete_data($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_kategori');
    }
}

/* End of file Data_kategori.php */
