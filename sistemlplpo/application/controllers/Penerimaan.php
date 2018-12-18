<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penerimaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Penerimaan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'penerimaan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'penerimaan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'penerimaan/index.html';
            $config['first_url'] = base_url() . 'penerimaan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Penerimaan_model->total_rows($q);
        $penerimaan = $this->Penerimaan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'penerimaan_data' => $penerimaan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('penerimaan/penerimaan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Penerimaan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_penerimaan' => $row->id_penerimaan,
		'id_puskesmas' => $row->id_puskesmas,
		'id_bulan' => $row->id_bulan,
		'id_tahun' => $row->id_tahun,
		'jumlah_penerimaan' => $row->jumlah_penerimaan,
	    );
            $this->load->view('penerimaan/penerimaan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penerimaan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('penerimaan/create_action'),
	    'id_penerimaan' => set_value('id_penerimaan'),
	    'id_puskesmas' => set_value('id_puskesmas'),
	    'id_bulan' => set_value('id_bulan'),
	    'id_tahun' => set_value('id_tahun'),
	    'jumlah_penerimaan' => set_value('jumlah_penerimaan'),
	);
        $this->load->view('penerimaan/penerimaan_form', $data);
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
		'jumlah_penerimaan' => $this->input->post('jumlah_penerimaan',TRUE),
	    );

            $this->Penerimaan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('penerimaan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Penerimaan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('penerimaan/update_action'),
		'id_penerimaan' => set_value('id_penerimaan', $row->id_penerimaan),
		'id_puskesmas' => set_value('id_puskesmas', $row->id_puskesmas),
		'id_bulan' => set_value('id_bulan', $row->id_bulan),
		'id_tahun' => set_value('id_tahun', $row->id_tahun),
		'jumlah_penerimaan' => set_value('jumlah_penerimaan', $row->jumlah_penerimaan),
	    );
            $this->load->view('penerimaan/penerimaan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penerimaan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_penerimaan', TRUE));
        } else {
            $data = array(
		'id_puskesmas' => $this->input->post('id_puskesmas',TRUE),
		'id_bulan' => $this->input->post('id_bulan',TRUE),
		'id_tahun' => $this->input->post('id_tahun',TRUE),
		'jumlah_penerimaan' => $this->input->post('jumlah_penerimaan',TRUE),
	    );

            $this->Penerimaan_model->update($this->input->post('id_penerimaan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('penerimaan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Penerimaan_model->get_by_id($id);

        if ($row) {
            $this->Penerimaan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('penerimaan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penerimaan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_puskesmas', 'id puskesmas', 'trim|required');
	$this->form_validation->set_rules('id_bulan', 'id bulan', 'trim|required');
	$this->form_validation->set_rules('id_tahun', 'id tahun', 'trim|required');
	$this->form_validation->set_rules('jumlah_penerimaan', 'jumlah penerimaan', 'trim|required');

	$this->form_validation->set_rules('id_penerimaan', 'id_penerimaan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "penerimaan.xls";
        $judul = "penerimaan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Penerimaan");

	foreach ($this->Penerimaan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_puskesmas);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_bulan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_tahun);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jumlah_penerimaan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=penerimaan.doc");

        $data = array(
            'penerimaan_data' => $this->Penerimaan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('penerimaan/penerimaan_doc',$data);
    }

}

/* End of file Penerimaan.php */
/* Location: ./application/controllers/Penerimaan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-30 05:23:35 */
/* http://harviacode.com */