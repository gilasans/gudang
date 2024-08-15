<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('data_kategori'); // Load model data_kategori
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Kategori';
        $data['kategori'] = $this->data_kategori->get_kategori();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('kategori', $data);
        $this->load->view('templates/footer');  
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Kategori';
        $data['kategori'] = $this->data_kategori->get_kategori(); // Ambil data kategori

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('tambah_kategori', $data); // Pastikan data dikirim ke view
        $this->load->view('templates/footer'); 
    }

    public function tambah_aksi()
    {
        $this->_rules(); // Memanggil aturan validasi

        if ($this->form_validation->run() == FALSE) {
            $this->tambah(); // Jika validasi gagal, kembali ke form tambah
        } else {
            $data = array(
                'kategori' => $this->input->post('kategori'), // Pastikan ini sesuai dengan nama field di form
            );

            $this->data_kategori->insert_data('tb_kategori', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Data Berhasil Ditambahkan !!
              </div>');
            redirect('kategori'); 
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Kategori';
        $data['kategori'] = $this->data_kategori->get_by_id($id); 

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('edit_kategori', $data);
        $this->load->view('templates/footer'); 
    }

    public function update()
    {
        $this->_rules(); // Memanggil aturan validasi

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id')); // Jika validasi gagal, kembali ke form edit
        } else {
            $data = array(
                'kategori' => $this->input->post('kategori'), // Pastikan ini sesuai dengan nama field di form
            );

            $this->data_kategori->update_data($this->input->post('id'), $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Data Berhasil Diperbarui !!
              </div>');
            redirect('kategori'); 
        }
    }

    public function hapus($id)
    {
        $this->data_kategori->delete_data($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            Data Berhasil Dihapus !!
          </div>');
        redirect('kategori');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kategori','Kategori', 'required', array(
            'required'=> '%s harus diisi !!',
        ));
    }
}

