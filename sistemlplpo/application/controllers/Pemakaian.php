<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pemakaian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pemakaian_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pemakaian/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pemakaian/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pemakaian/index.html';
            $config['first_url'] = base_url() . 'pemakaian/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pemakaian_model->total_rows($q);
        $pemakaian = $this->Pemakaian_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pemakaian_data' => $pemakaian,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('pemakaian/pemakaian_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Pemakaian_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pemakaian' => $row->id_pemakaian,
		'id_puskesmas' => $row->id_puskesmas,
		'id_bulan' => $row->id_bulan,
		'id_tahun' => $row->id_tahun,
		'total_pemakaian' => $row->total_pemakaian,
	    );
            $this->load->view('pemakaian/pemakaian_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pemakaian'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pemakaian/create_action'),
	    'id_pemakaian' => set_value('id_pemakaian'),
	    'id_puskesmas' => set_value('id_puskesmas'),
	    'id_bulan' => set_value('id_bulan'),
	    'id_tahun' => set_value('id_tahun'),
	    'total_pemakaian' => set_value('total_pemakaian'),
	);
        $this->load->view('pemakaian/pemakaian_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_puskesmas' => $this->input->post('id_puskesmas',TRUE),
		'id_bulan' => $this->input->post('id_bulan',TRUE),
		'id_tahun' => $this->input->post('id_tahun',TRUE),
		'total_pemakaian' => $this->input->post('total_pemakaian',TRUE),
	    );

            $this->Pemakaian_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pemakaian'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pemakaian_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pemakaian/update_action'),
		'id_pemakaian' => set_value('id_pemakaian', $row->id_pemakaian),
		'id_puskesmas' => set_value('id_puskesmas', $row->id_puskesmas),
		'id_bulan' => set_value('id_bulan', $row->id_bulan),
		'id_tahun' => set_value('id_tahun', $row->id_tahun),
		'total_pemakaian' => set_value('total_pemakaian', $row->total_pemakaian),
	    );
            $this->load->view('pemakaian/pemakaian_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pemakaian'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pemakaian', TRUE));
        } else {
            $data = array(
		'id_puskesmas' => $this->input->post('id_puskesmas',TRUE),
		'id_bulan' => $this->input->post('id_bulan',TRUE),
		'id_tahun' => $this->input->post('id_tahun',TRUE),
		'total_pemakaian' => $this->input->post('total_pemakaian',TRUE),
	    );

            $this->Pemakaian_model->update($this->input->post('id_pemakaian', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pemakaian'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pemakaian_model->get_by_id($id);

        if ($row) {
            $this->Pemakaian_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pemakaian'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pemakaian'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_puskesmas', 'id puskesmas', 'trim|required');
	$this->form_validation->set_rules('id_bulan', 'id bulan', 'trim|required');
	$this->form_validation->set_rules('id_tahun', 'id tahun', 'trim|required');
	$this->form_validation->set_rules('total_pemakaian', 'total pemakaian', 'trim|required');

	$this->form_validation->set_rules('id_pemakaian', 'id_pemakaian', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pemakaian.xls";
        $judul = "pemakaian";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Puskesmas");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Bulan");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Tahun");
	xlsWriteLabel($tablehead, $kolomhead++, "Total Pemakaian");

	foreach ($this->Pemakaian_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_puskesmas);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_bulan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_tahun);
	    xlsWriteNumber($tablebody, $kolombody++, $data->total_pemakaian);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=pemakaian.doc");

        $data = array(
            'pemakaian_data' => $this->Pemakaian_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('pemakaian/pemakaian_doc',$data);
    }

}

/* End of file Pemakaian.php */
/* Location: ./application/controllers/Pemakaian.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-30 05:23:34 */
/* http://harviacode.com */