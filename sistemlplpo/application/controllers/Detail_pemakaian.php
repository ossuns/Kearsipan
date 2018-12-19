<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detail_pemakaian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Detail_pemakaian_model');
        $this->load->library('form_validation');
    }
//index detail pemakaian
    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'detail_pemakaian/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'detail_pemakaian/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'detail_pemakaian/index.html';
            $config['first_url'] = base_url() . 'detail_pemakaian/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Detail_pemakaian_model->total_rows($q);
        $detail_pemakaian = $this->Detail_pemakaian_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'detail_pemakaian_data' => $detail_pemakaian,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('detail_pemakaian/detail_pemakaian_list', $data);
    }
//fungsi untuk read
    public function read($id) 
    {
        $row = $this->Detail_pemakaian_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pakai' => $row->id_pakai,
		'id_pemakaian' => $row->id_pemakaian,
		'kode' => $row->kode,
		'umum' => $row->umum,
		'jknpbi' => $row->jknpbi,
		'jknnonpbi' => $row->jknnonpbi,
		'jamkesda' => $row->jamkesda,
		'jamkesdasktm' => $row->jamkesdasktm,
		'jamkesdajamkesmas' => $row->jamkesdajamkesmas,
		'uks' => $row->uks,
		'kir' => $row->kir,
		'gratis' => $row->gratis,
		'lainlian' => $row->lainlian,
		'jumlah_pemakaian' => $row->jumlah_pemakaian,
	    );
            $this->load->view('detail_pemakaian/detail_pemakaian_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detail_pemakaian'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('detail_pemakaian/create_action'),
	    'id_pakai' => set_value('id_pakai'),
	    'id_pemakaian' => set_value('id_pemakaian'),
	    'kode' => set_value('kode'),
	    'umum' => set_value('umum'),
	    'jknpbi' => set_value('jknpbi'),
	    'jknnonpbi' => set_value('jknnonpbi'),
	    'jamkesda' => set_value('jamkesda'),
	    'jamkesdasktm' => set_value('jamkesdasktm'),
	    'jamkesdajamkesmas' => set_value('jamkesdajamkesmas'),
	    'uks' => set_value('uks'),
	    'kir' => set_value('kir'),
	    'gratis' => set_value('gratis'),
	    'lainlian' => set_value('lainlian'),
	    'jumlah_pemakaian' => set_value('jumlah_pemakaian'),
	);
        $this->load->view('detail_pemakaian/detail_pemakaian_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_pemakaian' => $this->input->post('id_pemakaian',TRUE),
		'kode' => $this->input->post('kode',TRUE),
		'umum' => $this->input->post('umum',TRUE),
		'jknpbi' => $this->input->post('jknpbi',TRUE),
		'jknnonpbi' => $this->input->post('jknnonpbi',TRUE),
		'jamkesda' => $this->input->post('jamkesda',TRUE),
		'jamkesdasktm' => $this->input->post('jamkesdasktm',TRUE),
		'jamkesdajamkesmas' => $this->input->post('jamkesdajamkesmas',TRUE),
		'uks' => $this->input->post('uks',TRUE),
		'kir' => $this->input->post('kir',TRUE),
		'gratis' => $this->input->post('gratis',TRUE),
		'lainlian' => $this->input->post('lainlian',TRUE),
		'jumlah_pemakaian' => $this->input->post('jumlah_pemakaian',TRUE),
	    );

            $this->Detail_pemakaian_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('detail_pemakaian'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Detail_pemakaian_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('detail_pemakaian/update_action'),
		'id_pakai' => set_value('id_pakai', $row->id_pakai),
		'id_pemakaian' => set_value('id_pemakaian', $row->id_pemakaian),
		'kode' => set_value('kode', $row->kode),
		'umum' => set_value('umum', $row->umum),
		'jknpbi' => set_value('jknpbi', $row->jknpbi),
		'jknnonpbi' => set_value('jknnonpbi', $row->jknnonpbi),
		'jamkesda' => set_value('jamkesda', $row->jamkesda),
		'jamkesdasktm' => set_value('jamkesdasktm', $row->jamkesdasktm),
		'jamkesdajamkesmas' => set_value('jamkesdajamkesmas', $row->jamkesdajamkesmas),
		'uks' => set_value('uks', $row->uks),
		'kir' => set_value('kir', $row->kir),
		'gratis' => set_value('gratis', $row->gratis),
		'lainlian' => set_value('lainlian', $row->lainlian),
		'jumlah_pemakaian' => set_value('jumlah_pemakaian', $row->jumlah_pemakaian),
	    );
            $this->load->view('detail_pemakaian/detail_pemakaian_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detail_pemakaian'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pakai', TRUE));
        } else {
            $data = array(
		'id_pemakaian' => $this->input->post('id_pemakaian',TRUE),
		'kode' => $this->input->post('kode',TRUE),
		'umum' => $this->input->post('umum',TRUE),
		'jknpbi' => $this->input->post('jknpbi',TRUE),
		'jknnonpbi' => $this->input->post('jknnonpbi',TRUE),
		'jamkesda' => $this->input->post('jamkesda',TRUE),
		'jamkesdasktm' => $this->input->post('jamkesdasktm',TRUE),
		'jamkesdajamkesmas' => $this->input->post('jamkesdajamkesmas',TRUE),
		'uks' => $this->input->post('uks',TRUE),
		'kir' => $this->input->post('kir',TRUE),
		'gratis' => $this->input->post('gratis',TRUE),
		'lainlian' => $this->input->post('lainlian',TRUE),
		'jumlah_pemakaian' => $this->input->post('jumlah_pemakaian',TRUE),
	    );

            $this->Detail_pemakaian_model->update($this->input->post('id_pakai', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('detail_pemakaian'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Detail_pemakaian_model->get_by_id($id);

        if ($row) {
            $this->Detail_pemakaian_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('detail_pemakaian'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detail_pemakaian'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_pemakaian', 'id pemakaian', 'trim|required');
	$this->form_validation->set_rules('kode', 'kode', 'trim|required');
	$this->form_validation->set_rules('umum', 'umum', 'trim|required');
	$this->form_validation->set_rules('jknpbi', 'jknpbi', 'trim|required');
	$this->form_validation->set_rules('jknnonpbi', 'jknnonpbi', 'trim|required');
	$this->form_validation->set_rules('jamkesda', 'jamkesda', 'trim|required');
	$this->form_validation->set_rules('jamkesdasktm', 'jamkesdasktm', 'trim|required');
	$this->form_validation->set_rules('jamkesdajamkesmas', 'jamkesdajamkesmas', 'trim|required');
	$this->form_validation->set_rules('uks', 'uks', 'trim|required');
	$this->form_validation->set_rules('kir', 'kir', 'trim|required');
	$this->form_validation->set_rules('gratis', 'gratis', 'trim|required');
	$this->form_validation->set_rules('lainlian', 'lainlian', 'trim|required');
	$this->form_validation->set_rules('jumlah_pemakaian', 'jumlah pemakaian', 'trim|required');

	$this->form_validation->set_rules('id_pakai', 'id_pakai', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "detail_pemakaian.xls";
        $judul = "detail_pemakaian";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Pemakaian");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode");
	xlsWriteLabel($tablehead, $kolomhead++, "Umum");
	xlsWriteLabel($tablehead, $kolomhead++, "Jknpbi");
	xlsWriteLabel($tablehead, $kolomhead++, "Jknnonpbi");
	xlsWriteLabel($tablehead, $kolomhead++, "Jamkesda");
	xlsWriteLabel($tablehead, $kolomhead++, "Jamkesdasktm");
	xlsWriteLabel($tablehead, $kolomhead++, "Jamkesdajamkesmas");
	xlsWriteLabel($tablehead, $kolomhead++, "Uks");
	xlsWriteLabel($tablehead, $kolomhead++, "Kir");
	xlsWriteLabel($tablehead, $kolomhead++, "Gratis");
	xlsWriteLabel($tablehead, $kolomhead++, "Lainlian");
	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Pemakaian");

	foreach ($this->Detail_pemakaian_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_pemakaian);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kode);
	    xlsWriteNumber($tablebody, $kolombody++, $data->umum);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jknpbi);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jknnonpbi);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jamkesda);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jamkesdasktm);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jamkesdajamkesmas);
	    xlsWriteNumber($tablebody, $kolombody++, $data->uks);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kir);
	    xlsWriteNumber($tablebody, $kolombody++, $data->gratis);
	    xlsWriteNumber($tablebody, $kolombody++, $data->lainlian);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jumlah_pemakaian);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=detail_pemakaian.doc");

        $data = array(
            'detail_pemakaian_data' => $this->Detail_pemakaian_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('detail_pemakaian/detail_pemakaian_doc',$data);
    }

}

/* End of file Detail_pemakaian.php */
/* Location: ./application/controllers/Detail_pemakaian.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-30 05:23:34 */
/* http://harviacode.com */