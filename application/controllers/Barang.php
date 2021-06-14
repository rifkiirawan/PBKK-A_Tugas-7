<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('barang_model');

    }

	public function index()
	{
        $data['barang'] = $this->barang_model->getBarang();
		$this->load->view('view_list_barang',$data);
	}

    public function insert()
    {
        $this->load->view('view_tambah_barang');
    }

	public function store()
	{   
        $data   = array(
            'nama_barang'  => $this->input->post('nama_barang'),
            'harga'   => $this->input->post('harga')
        );
        
        $this->barang_model->insertBarang($data);

		$this->index();
	}

    public function updateView($id)
	{
        $data['barang'] = $this->barang_model->getBarangSpesific($id);
        $this->load->view('view_edit_barang',$data);
	}

    public function update()
	{

        $id = $this->input->post('id');
        $data   = array(
            'nama_barang'  => $this->input->post('nama_barang'),
            'harga'   => $this->input->post('harga')
        );
        $this->barang_model->updateBarang($data,$id);

		$this->index();
	}

    public function delete($id)
	{   
        $this->barang_model->deleteBarang($id);

        $this->index();
	}

}
