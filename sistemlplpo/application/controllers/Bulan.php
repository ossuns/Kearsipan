<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bulan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Bulan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'bulan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'bulan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'bulan/index.html';
            $config['first_url'] = base_url() . 'bulan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Bulan_model->total_rows($q);
        $bulan = $this->Bulan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'bulan_data' => $bulan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('bulan/bulan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Bulan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_bulan' => $row->id_bulan,
		'bulan' => $row->bulan,
	    );
            $this->load->view('bulan/bulan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bulan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('bulan/create_action'),
	    'id_bulan' => set_value('id_bulan'),
	    'bulan' => set_value('bulan'),
	);
        $this->load->view('bulan/bulan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'bulan' => $this->input->post('bulan',TRUE),
	    );

            $this->Bulan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('bulan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Bulan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('bulan/update_action'),
		'id_bulan' => set_value('id_bulan', $row->id_bulan),
		'bulan' => set_value('bulan', $row->bulan),
	    );
            $this->load->view('bulan/bulan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bulan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_bulan', TRUE));
        } else {
            $data = array(
		'bulan' => $this->input->post('bulan',TRUE),
	    );

            $this->Bulan_model->update($this->input->post('id_bulan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('bulan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Bulan_model->get_by_id($id);

        if ($row) {
            $this->Bulan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('bulan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bulan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('bulan', 'bulan', 'trim|required');

	$this->form_validation->set_rules('id_bulan', 'id_bulan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "bulan.xls";
        $judul = "bulan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Bulan");

	foreach ($this->Bulan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->bulan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=bulan.doc");

        $data = array(
            'bulan_data' => $this->Bulan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('bulan/bulan_doc',$data);
    }

}

/* End of file Bulan.php */
/* Location: ./application/controllers/Bulan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-30 05:23:33 */
/* http://harviacode.com */