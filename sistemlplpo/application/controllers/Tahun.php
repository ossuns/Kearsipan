<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tahun extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tahun_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'tahun/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'tahun/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'tahun/index.html';
            $config['first_url'] = base_url() . 'tahun/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tahun_model->total_rows($q);
        $tahun = $this->Tahun_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tahun_data' => $tahun,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('tahun/tahun_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tahun_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_tahun' => $row->id_tahun,
		'tahun' => $row->tahun,
	    );
            $this->load->view('tahun/tahun_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tahun'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tahun/create_action'),
	    'id_tahun' => set_value('id_tahun'),
	    'tahun' => set_value('tahun'),
	);
        $this->load->view('tahun/tahun_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tahun' => $this->input->post('tahun',TRUE),
	    );

            $this->Tahun_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tahun'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tahun_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tahun/update_action'),
		'id_tahun' => set_value('id_tahun', $row->id_tahun),
		'tahun' => set_value('tahun', $row->tahun),
	    );
            $this->load->view('tahun/tahun_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tahun'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_tahun', TRUE));
        } else {
            $data = array(
		'tahun' => $this->input->post('tahun',TRUE),
	    );

            $this->Tahun_model->update($this->input->post('id_tahun', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tahun'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tahun_model->get_by_id($id);

        if ($row) {
            $this->Tahun_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tahun'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tahun'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tahun', 'tahun', 'trim|required');

	$this->form_validation->set_rules('id_tahun', 'id_tahun', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tahun.xls";
        $judul = "tahun";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Tahun");

	foreach ($this->Tahun_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tahun);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tahun.doc");

        $data = array(
            'tahun_data' => $this->Tahun_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tahun/tahun_doc',$data);
    }

}

/* End of file Tahun.php */
/* Location: ./application/controllers/Tahun.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-30 05:23:35 */
/* http://harviacode.com */