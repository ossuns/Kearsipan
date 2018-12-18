<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Persediaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Persediaan_model');
        $this->load->library('form_validation');
        $this->simple_login->cek_login();
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'persediaan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'persediaan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'persediaan/index.html';
            $config['first_url'] = base_url() . 'persediaan/index.html';
        }

        $config['per_page'] = 1000;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Persediaan_model->total_rows($q);
        $persediaan = $this->Persediaan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'persediaan_data' => $persediaan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('layouts','persediaan/persediaan_list', $data);
    }

    public function dropdown() 
    {
        $listtahun=$this->Persediaan_model->ddtahun();
        /* print_r($listtahun);
        die();*/
        $tahun = array();
        // var_dump($tahun);
        foreach ($listtahun as $key => $value){
            $tahun[$value->id_persediaan]=$value->tahun;
          // $data->tahun;
           
        }
        /*var_dump($tahun);
        die();*/
        $data = array(

            'button' => 'Tampilkan',
            'action' => site_url('persediaan/listpersediaan'),
            /*'button2' => 'Tampilkan2',
            'action' => site_url('persediaan/listpersediaan2'),*/
        'dd_tahun'=>$listtahun,
        'dd_currenttahun'=>'',
        'tahun' => set_value('tahun'),
        'bulan' => set_value('bulan'),
        'id_puskesmas' => set_value('id_puskesmas'),
    );
        $this->template->load('layouts','persediaan/persediaan_dropdown', $data);
    }

    public function dropdown2() 
    {
        $listtahun=$this->Persediaan_model->ddtahun();
        /* print_r($listtahun);
        die();*/
        $tahun = array();
        // var_dump($tahun);
        foreach ($listtahun as $key => $value){
            $tahun[$value->id_persediaan]=$value->tahun;
          // $data->tahun;
           
        }
        /*var_dump($tahun);
        die();*/
        $data = array(

            'button' => 'Tampilkan',
            'action' => site_url('persediaan/listpersediaan2'),
        'dd_tahun'=>$listtahun,
        'dd_currenttahun'=>'',
        'tahun' => set_value('tahun'),
        'bulan' => set_value('bulan'),
    );
        $this->template->load('layouts','persediaan/persediaan_dropdown2', $data);
    }

    public function listpersediaan()
    {
        $tahun=($this->input->post('tahun', TRUE));
        $bulan=($this->input->post('bulan', TRUE));
        $id_puskesmas=($this->input->post('id_puskesmas', TRUE));
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'persediaan/persediaan_listpersediaan.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'persediaan/persediaan_listpersediaan.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'persediaan/persediaan_listpersediaan.html';
            $config['first_url'] = base_url() . 'persediaan/persediaan_listpersediaan.html';
        }

        $config['per_page'] = 1000;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Persediaan_model->total_rowskhusus($q);
        //$persediaan = $this->Persediaan_model->get_limit_data2($id, $config['per_page'], $start, $q);

       $this->load->library('pagination');
        $this->pagination->initialize($config);
 
        //$row = $this->Persediaan_model->get_by_idpuskesmas($id);
        /*if ($row) {*/
        $data = array(
            //'persediaan_data1' => $persediaan,
            'persediaan_data'=>$this->Persediaan_model->get_limit_data2($tahun, $bulan, $id_puskesmas),
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'tahun' => $tahun,
            'bulan' => $bulan,
            'id_puskesmas' => $id_puskesmas,
        );
        $this->session->set_flashdata('tahun',$tahun);
        $this->session->set_flashdata('bulan',$bulan);
        $this->session->set_flashdata('id_puskesmas',$id_puskesmas);
        $this->template->load('layouts','persediaan/persediaan_listpersediaan', $data);
        /*} else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('persediaan'));
        }*/
    }

        public function listpersediaan2()
    {
        $tahun=($this->input->post('tahun', TRUE));
        $bulan=($this->input->post('bulan', TRUE));
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'persediaan/persediaan_listpersediaan2.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'persediaan/persediaan_listpersediaan2.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'persediaan/persediaan_listpersediaan2.html';
            $config['first_url'] = base_url() . 'persediaan/persediaan_listpersediaan2.html';
        }

        $config['per_page'] = 1000;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Persediaan_model->total_rowskhusus2($q);
        //$persediaan = $this->Persediaan_model->get_limit_data2($id, $config['per_page'], $start, $q);

       $this->load->library('pagination');
        $this->pagination->initialize($config);
 
        //$row = $this->Persediaan_model->get_by_idpuskesmas($id);
        /*if ($row) {*/
        $data = array(
            //'persediaan_data1' => $persediaan,
            'persediaan_data'=>$this->Persediaan_model->get_limit_data3($tahun, $bulan),
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'tahun' => $tahun,
            'bulan' => $bulan,
        );
        $this->session->set_flashdata('tahun',$tahun);
        $this->session->set_flashdata('bulan',$bulan);
        $this->template->load('layouts','persediaan/persediaan_listpersediaan2', $data);
        /*} else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('persediaan'));
        }*/
    }


    public function read($id) 
    {
        $row = $this->Persediaan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_persediaan' => $row->id_persediaan,
		'id_puskesmas' => $row->id_puskesmas,
		'kode' => $row->kode,
		'stok' => $row->stok,
	    );
            $this->template->load('layouts','persediaan/persediaan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('persediaan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('persediaan/create_action'),
	    'id_persediaan' => set_value('id_persediaan'),
	    'id_puskesmas' => set_value('id_puskesmas'),
	    'kode' => set_value('kode'),
	    'stok' => set_value('stok'),
	);
        $this->template->load('layouts','persediaan/persediaan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_puskesmas' => $this->input->post('id_puskesmas',TRUE),
		'kode' => $this->input->post('kode',TRUE),
		'stok' => $this->input->post('stok',TRUE),
	    );

            $this->Persediaan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('persediaan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Persediaan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('persediaan/update_action'),
		'id_persediaan' => set_value('id_persediaan', $row->id_persediaan),
		'id_puskesmas' => set_value('id_puskesmas', $row->id_puskesmas),
		'kode' => set_value('kode', $row->kode),
		'stok' => set_value('stok', $row->stok),
	    );
            $this->template->load('layouts','persediaan/persediaan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('persediaan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_persediaan', TRUE));
        } else {
            $data = array(
		'id_puskesmas' => $this->input->post('id_puskesmas',TRUE),
		'kode' => $this->input->post('kode',TRUE),
		'stok' => $this->input->post('stok',TRUE),
	    );

            $this->Persediaan_model->update($this->input->post('id_persediaan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('persediaan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Persediaan_model->get_by_id($id);

        if ($row) {
            $this->Persediaan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('persediaan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('persediaan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_puskesmas', 'id puskesmas', 'trim|required');
	$this->form_validation->set_rules('kode', 'kode', 'trim|required');
	$this->form_validation->set_rules('stok', 'stok', 'trim|required');

	$this->form_validation->set_rules('id_persediaan', 'id_persediaan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

public function excel($id_puskesmas,$bulan,$tahun)
    {
        /*$this->load->helper('exportexcel');*/
        $namaFile = "persediaan.xls";
        /*$judul = "persediaan";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;*/
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        /*header("Content-Transfer-Encoding: binary ");*/
        $data = array(
            'persediaan_data' => $this->Persediaan_model->get_limit_datapencarian($tahun, $bulan, $id_puskesmas),
            'start' => 0,
            'tahun' => $tahun,
            'bulan'     => $bulan,
            'id_puskesmas' => $id_puskesmas
        );

        $this->load->view('persediaan/persediaan_excel', $data);

        /*xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "NO");
	xlsWriteLabel($tablehead, $kolomhead++, "KODE");
    xlsWriteLabel($tablehead, $kolomhead++, "NAMA OBAT");
    xlsWriteLabel($tablehead, $kolomhead++, "PERSEDIAAN");
    // print_r($this->Persediaan_model->get_limit_data2($tahun, $bulan, $id_puskesmas));
	foreach ($this->Persediaan_model->get_limit_data2($tahun, $bulan, $id_puskesmas) as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->kode);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->nama_obat);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->sisa_stok);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();*/
    }

    public function excel2($tahun,$bulan)
    {
        $this->load->helper('exportexcel');
        $namaFile = "persediaan.xls";
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        /*header("Content-Transfer-Encoding: binary ");*/
        $data = array(
            'persediaan_data' => $this->Persediaan_model->get_limit_datarata2($tahun, $bulan),
            'start' => 0,
            'tahun' => $tahun,
            'bulan'     => $bulan,
        );

        $this->load->view('persediaan/persediaan_excel2', $data);

        
    }

public function word($id_puskesmas,$bulan,$tahun)
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=persediaan.doc");

        $data = array(
            'persediaan_data' => $this->Persediaan_model->get_limit_datapencarian2($tahun, $bulan, $id_puskesmas),
            'start' => 0,
             'tahun' => $tahun,
            'bulan'     => $bulan,
            'id_puskesmas' => $id_puskesmas
        );
        
        $this->load->view('persediaan/persediaan_doc',$data);
    }

    public function word2($tahun,$bulan)
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename='persediaan'.doc");
        $data = array(
            'persediaan_data' => $this->Persediaan_model->get_limit_datarata($tahun,$bulan),
            'start' => 0,
             'tahun' => $tahun,
            'bulan'     => $bulan,
            'id_puskesmas' => $id_puskesmas
        );
        
        $this->load->view('persediaan/persediaan_doc',$data);
    }

}

/* End of file Persediaan.php */
/* Location: ./application/controllers/Persediaan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-30 05:23:35 */
/* http://harviacode.com */