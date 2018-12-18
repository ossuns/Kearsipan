<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detail_penerimaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Detail_penerimaan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'detail_penerimaan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'detail_penerimaan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'detail_penerimaan/index.html';
            $config['first_url'] = base_url() . 'detail_penerimaan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Detail_penerimaan_model->total_rows($q);
        $detail_penerimaan = $this->Detail_penerimaan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'detail_penerimaan_data' => $detail_penerimaan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('detail_penerimaan/detail_penerimaan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Detail_penerimaan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_detailpenerimaan' => $row->id_detailpenerimaan,
		'id_penerimaan' => $row->id_penerimaan,
		'kode' => $row->kode,
		'jumlah_terima' => $row->jumlah_terima,
	    );
            $this->load->view('detail_penerimaan/detail_penerimaan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detail_penerimaan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('detail_penerimaan/create_action'),
	    'id_detailpenerimaan' => set_value('id_detailpenerimaan'),
	    'id_penerimaan' => set_value('id_penerimaan'),
	    'kode' => set_value('kode'),
	    'jumlah_terima' => set_value('jumlah_terima'),
	);
        $this->load->view('detail_penerimaan/detail_penerimaan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_penerimaan' => $this->input->post('id_penerimaan',TRUE),
		'kode' => $this->input->post('kode',TRUE),
		'jumlah_terima' => $this->input->post('jumlah_terima',TRUE),
	    );

            $this->Detail_penerimaan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('detail_penerimaan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Detail_penerimaan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('detail_penerimaan/update_action'),
		'id_detailpenerimaan' => set_value('id_detailpenerimaan', $row->id_detailpenerimaan),
		'id_penerimaan' => set_value('id_penerimaan', $row->id_penerimaan),
		'kode' => set_value('kode', $row->kode),
		'jumlah_terima' => set_value('jumlah_terima', $row->jumlah_terima),
	    );
            $this->load->view('detail_penerimaan/detail_penerimaan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detail_penerimaan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_detailpenerimaan', TRUE));
        } else {
            $data = array(
		'id_penerimaan' => $this->input->post('id_penerimaan',TRUE),
		'kode' => $this->input->post('kode',TRUE),
		'jumlah_terima' => $this->input->post('jumlah_terima',TRUE),
	    );

            $this->Detail_penerimaan_model->update($this->input->post('id_detailpenerimaan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('detail_penerimaan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Detail_penerimaan_model->get_by_id($id);

        if ($row) {
            $this->Detail_penerimaan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('detail_penerimaan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detail_penerimaan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_penerimaan', 'id penerimaan', 'trim|required');
	$this->form_validation->set_rules('kode', 'kode', 'trim|required');
	$this->form_validation->set_rules('jumlah_terima', 'jumlah terima', 'trim|required');

	$this->form_validation->set_rules('id_detailpenerimaan', 'id_detailpenerimaan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "detail_penerimaan.xls";
        $judul = "detail_penerimaan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Penerimaan");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode");
	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Terima");

	foreach ($this->Detail_penerimaan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_penerimaan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kode);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jumlah_terima);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=detail_penerimaan.doc");

        $data = array(
            'detail_penerimaan_data' => $this->Detail_penerimaan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('detail_penerimaan/detail_penerimaan_doc',$data);
    }

}

/* End of file Detail_penerimaan.php */
/* Location: ./application/controllers/Detail_penerimaan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-30 05:23:34 */
/* http://harviacode.com */