<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{
    private $_table = "produk";

    public $id_produk;
    public $nama_produk;
    public $harga_produk;
    public $gambar_produk = "default.jpg";

    public function rules()
    {
        return [
            ['field' => 'nama_produk',
            'label' => 'nama_produk',
            'rules' => 'required'],

            ['field' => 'harga_produk',
            'label' => 'harga_produk',
            'rules' => 'numeric'],
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_produk" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_produk = md5(uniqid(rand(), true));
        $this->nama_produk = $post["nama_produk"];
        $this->harga_produk = $post["harga_produk"];
        $this->gambar_produk = $this->_uploadImage();
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_produk = $post["id"];
        $this->nama_produk = $post["nama_produk"];
        $this->harga_produk = $post["harga_produk"];

        if (!empty($_FILES["gambar_produk"]["nama_produk"])) {
            $this->gambar_produk = $this->_uploadImage();
        } else {
            $this->gambar_produk = $post["old_image"];
        }

        return $this->db->update($this->_table, $this, array('id_produk' => $post['id']));
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("id_produk" => $id));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './upload/product/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->id_produk;
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar_produk')) {
            return $this->upload->data("file_name");
        }
        
        return "default.jpg";
    }

    private function _deleteImage($id)
    {
        $product = $this->getById($id);
        if ($product->gambar_produk != "default.jpg") {
            $filename = explode(".", $product->gambar_produk)[0];
            return array_map('unlink', glob(FCPATH."upload/product/$filename.*"));
        }
    }
}