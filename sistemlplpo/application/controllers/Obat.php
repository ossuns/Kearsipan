<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Obat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Obat_model');
        $this->load->library('form_validation', 'simple_login');
        $this->simple_login->cek_login();
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'obat/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'obat/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'obat/index.html';
            $config['first_url'] = base_url() . 'obat/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Obat_model->total_rows($q);
        $obat = $this->Obat_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'obat_data' => $obat,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
             //active navigation
            'dasboard'=>'',
                'home'=>'',
                'profil'=>'',

            'obat'=>'active',
                'listobat'=>'active',
                'tambahobat'=>'',

            'persediaanobat'=>'',
                'keseluruhan'=>'',
                'tambahjenispaket'=>'',

            'destinasi'=>'',
                'listdestinasi'=>'',
                'tambahdestinasi'=>''
        );
        $this->template->load('layouts','obat/obat_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Obat_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kode' => $row->kode,
		'nama_obat' => $row->nama_obat,
		'satuan' => $row->satuan,
	    );
            $this->template->load('template','obat/obat_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('obat'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('obat/create_action'),
	    'kode' => set_value('kode'),
	    'nama_obat' => set_value('nama_obat'),
	    'satuan' => set_value('satuan'),
	);
        $this->template->load('layouts','obat/obat_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        'kode' => $this->input->post('kode',TRUE),
		'nama_obat' => $this->input->post('nama_obat',TRUE),
		'satuan' => $this->input->post('satuan',TRUE),
	    );

            $this->Obat_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('obat'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Obat_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('obat/update_action'),
		'kode' => set_value('kode', $row->kode),
		'nama_obat' => set_value('nama_obat', $row->nama_obat),
		'satuan' => set_value('satuan', $row->satuan),
	    );
            $this->template->load('layouts','obat/obat_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('obat'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kode', TRUE));
        } else {
            $data = array(
        'kode' => set_value('kode', $row->kode),
		'nama_obat' => $this->input->post('nama_obat',TRUE),
		'satuan' => $this->input->post('satuan',TRUE),
	    );

            $this->Obat_model->update($this->input->post('kode', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('obat'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Obat_model->get_by_id($id);

        if ($row) {
            $this->Obat_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('obat'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('obat'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_obat', 'nama obat', 'trim|required');
	$this->form_validation->set_rules('satuan', 'satuan', 'trim|required');

	$this->form_validation->set_rules('kode', 'kode', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "obat.xls";
        $judul = "Data Obat Dinas Kabupaten Karanganyar";
        $tablehead = 2;
        $tablebody = 3;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        /*header("Content-Transfer-Encoding: binary ");*/

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
    xlsWriteLabel($tablehead, $kolomhead++, "Kode Obat");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Obat");
	xlsWriteLabel($tablehead, $kolomhead++, "Satuan");

	foreach ($this->Obat_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
        xlsWriteLabel($tablebody, $kolombody++, $data->kode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_obat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->satuan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=obat.doc");

        $data = array(
            'obat_data' => $this->Obat_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('obat/obat_doc',$data);
    }

}

/* End of file Obat.php */
/* Location: ./application/controllers/Obat.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-30 05:23:34 */
/* http://harviacode.com */