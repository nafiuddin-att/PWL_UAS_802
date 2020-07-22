<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Corona_model extends CI_Model
{
    private $_table = "corona";

    public $id;
    public $kecamatan;
    public $pp;
    public $odp;
    public $pdp;
    public $positif;
    public $tanggal;

    public function rules()
    {
        return [
            ['field' => 'kecamatan',
            'label' => 'kecamatan',
            'rules' => 'required'],

            ['field' => 'pp',
            'label' => 'pp',
            'rules' => 'numeric'],
            
            ['field' => 'odp',
            'label' => 'odp',
            'rules' => 'numeric'],

            ['field' => 'pdp',
            'label' => 'pdp',
            'rules' => 'numeric'],

            ['field' => 'positif',
            'label' => 'positif',
            'rules' => 'numeric'],
        ];
    }

    public function get_data()
    {
    $query = $this->db->query("SELECT kecamatan, SUM(pp) as pp,SUM(pdp) as pdp,SUM(odp) as odp,SUM(positif) as positif from corona group by kecamatan");
        
    if($query->num_rows() > 0){
        foreach($query->result() as $data){
            $hasil[] = $data;
            }
            return $hasil;
        }
    }

    public function get_grafik()
    {
        $query = $this->db->query("SELECT tanggal,SUM(pp) as pp,SUM(pdp) as pdp,SUM(odp) as odp,SUM(positif) as positif from corona group by tanggal");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id = md5(uniqid(rand(), true));
        $this->kecamatan = $post["kecamatan"];
        $this->pp = $post["pp"];
        $this->odp = $post["odp"];
        $this->pdp = $post["pdp"];
        $this->positif = $post["positif"];
        $this->tanggal = $post["tanggal"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->kecamatan = $post["kecamatan"];
        $this->pp = $post["pp"];
        $this->odp = $post["odp"];
        $this->pdp = $post["pdp"];
        $this->positif = $post["positif"];
        $this->tanggal = $post["tanggal"];

        return $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public  function fetch_data()
    {
        $this->db->order_by("id", "DESC");
        $query = $this->db->query("SELECT kecamatan, SUM(pp) as pp,SUM(pdp) as pdp,SUM(odp) as odp,SUM(positif) as positif from corona group by kecamatan");
        return $query->result();
    }
}