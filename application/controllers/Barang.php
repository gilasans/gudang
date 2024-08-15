<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('data_barang');
        $this->load->model('data_kategori');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Barang';
        $data['barang'] = $this->data_barang->get_barang_with_kategori();
        $data['kategori'] = $this->data_kategori->get_kategori(); 

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('barang', $data);
        $this->load->view('templates/footer');  
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Barang';
        $data['kategori'] = $this->data_kategori->get_kategori();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('tambah_barang', $data); 
        $this->load->view('templates/footer'); 
    }

    public function tambah_aksi()
    {
        $this->_rules(); // Memanggil aturan validasi

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'barang' => $this->input->post('barang'),
                'stok' => $this->input->post('stok'),
                'kategori_id' => $this->input->post('kategori'),
            );

            $this->data_barang->insert_data('tb_barang', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Data Berhasil Ditambahkan !!
              </div>');
            redirect('barang'); 
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Barang';
        $data['kategori'] = $this->data_kategori->get_kategori();
        $data['barang'] = $this->data_barang->get_by_id($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('edit_barang', $data);
        $this->load->view('templates/footer'); 
    }

    public function update()
    {
        $this->_rules(); // Memanggil aturan validasi

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id')); 
        } else {
            $data = array(
                'barang' => $this->input->post('barang'),
                'stok' => $this->input->post('stok'),
                'kategori_id' => $this->input->post('kategori'),
            );

            $this->data_barang->update_data($this->input->post('id'), $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Data Berhasil Diperbarui !!
              </div>');
            redirect('barang'); 
        }
    }

    public function hapus($id)
    {
        $this->data_barang->delete_data($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            Data Berhasil Dihapus !!
          </div>');
        redirect('barang');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('barang','Barang', 'required', array(
            'required'=> '%s harus diisi !!',
        ));
        $this->form_validation->set_rules('stok','Stok', 'required', array(
            'required'=> '%s harus diisi !!',
        ));
        $this->form_validation->set_rules('kategori','Kategori', 'required', array(
            'required'=> '%s harus diisi !!',
        ));
    }
}

/* End of file Barang.php */
