<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Corona extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("corona_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function list_grafik()
    {
        $data["corona"] = $this->corona_model->get_grafik();
        $this->load->view("admin/corona/list_grafik", $data);
    }

    public function index()
    {
        $data['corona']=$this->corona_model->get_data();
        $this->load->view('admin/corona/list_read',$data);
        
    }

    public function unggah()
    {
        $fileName = $_FILES['file']['name'];
        
        $config['upload_path']       = './upload/';
        $config['allowed_types']     = 'xls|xlsx|csv';
        $config['max_size']          = 10000;
        $config['overwrite']         = true;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
            $this->upload->display_errors();
            die();
        }

        $inputFileName = './upload/'.$fileName;

        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch (Exception $e) {
            die('error');
        }

        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        for ($row=2; $row <= $highestRow; $row++) {
            $rowData = $sheet->rangeToArray('A'.$row.':'.$highestColumn.$row,NULL,TRUE,FALSE);
            $data = array(
                'id'         => $rowData[0][1],
                'kecamatan'  => $rowData[0][2],
                'odp'        => $rowData[0][3],
                'pdp'        => $rowData[0][4],
                'positif'    => $rowData[0][5],
                'pp'         => $rowData[0][6],
                'tanggal'    => $rowData[0][7]
            );
            $this->db->insert('corona', $data);
        } 
    }

    public function add()
    {
        $corona = $this->corona_model;
        $validation = $this->form_validation;
        $validation->set_rules($corona->rules());

        if ($validation->run()) {
            $corona->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/corona/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/corona');
       
        $corona = $this->corona_model;
        $validation = $this->form_validation;
        $validation->set_rules($corona->rules());

        if ($validation->run()) {
            $corona->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["corona"] = $corona->getById($id);
        if (!$data["corona"]) show_404();
        
        $this->load->view("admin/corona/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->corona_model->delete($id)) {
            redirect(site_url('admin/corona'));
        }
    }

    public function ekspor()
    {
     $this->load->library("excel");
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);
        $table_columns = array("Kecamatan", "PP", "ODP", "PDP", "Positif");
        $column = 0;
        foreach($table_columns as $field){
        $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
        $column++;
        }
      $employee_data = $this->corona_model->fetch_data();
      $excel_row = 2;
      foreach($employee_data as $row){
        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->kecamatan);
        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->pp);
        $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->odp);
        $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->pdp);
        $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->positif);
        $excel_row++;
      }
      $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="Tabel Corona.xls"');
      $object_writer->save('php://output');
    }
}