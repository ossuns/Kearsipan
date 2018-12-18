<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    private $filename = "laporan_obat"; // Untuk menentuka nama filenya

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_model');
        $this->load->model('Persediaan_model');
        $this->load->model('Penerimaan_model');
        $this->load->model('Pemakaian_model');
        $this->load->model('Obat_model');
        $this->load->model('Detail_pemakaian_model');
        $this->load->model('Detail_penerimaan_model');
        $this->load->library('form_validation');
        $this->simple_login->cek_login();
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'laporan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'laporan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'laporan/index.html';
            $config['first_url'] = base_url() . 'laporan/index.html';
        }

        $config['per_page'] = 1000;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Laporan_model->total_rows($q);
        $laporan = $this->Laporan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'Laporan_data' => $laporan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('layouts','laporan/laporan_list', $data);
    }

    public function pencarianlaporan() 
    {
        $listtahun=$this->Laporan_model->ddtahun();
        $tahun = array();
        foreach ($listtahun as $key => $value){
            $tahun[$value->id_persediaan]=$value->tahun;
        }
        $data = array(

            'button' => 'Tampilkan',
            'action' => site_url('laporan/listlaporan/'),
        'dd_tahun'=>$listtahun,
        'dd_currenttahun'=>'',
        'tahun' => set_value('tahun'),
        'bulan' => set_value('bulan'),
        'id_puskesmas' => set_value('id_puskesmas'),
    );
        /*print_r($data);
        die();*/
        $this->template->load('layouts','laporan/laporan_pencarianlaporan', $data);
    }

    public function listlaporan()
    {
        $tahun=($this->input->post('tahun', TRUE));
        $bulan=($this->input->post('bulan', TRUE));

        $id_puskesmas=($this->input->post('id_puskesmas', TRUE));
        /*print_r($id_puskesmas);
        die();*/
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'laporan/laporan_listlaporan.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'laporan/laporan_listlaporan.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'laporan/laporan_listlaporan.html';
            $config['first_url'] = base_url() . 'laporan/laporan_listlaporan.html';
        }

        $config['per_page'] = 1000;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Laporan_model->total_rows($q,$tahun, $bulan, $id_puskesmas);
        /*$config['total_rows'] = $this->Laporan_model->total_rowskhusus($q);*/
        //$persediaan = $this->Persediaan_model->get_limit_data2($id, $config['per_page'], $start, $q);

       $this->load->library('pagination');
        $this->pagination->initialize($config);
 
        //$row = $this->Persediaan_model->get_by_idpuskesmas($id);
        /*if ($row) {*/
        $data = array(
            //'persediaan_data1' => $persediaan,
            'Laporan_data'=>$this->Laporan_model->get_limit_data2($tahun, $bulan, $id_puskesmas),
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'tahun' => $tahun,
            'bulan'     => $bulan,
            'id_puskesmas' => $id_puskesmas,
            'start' => $start,
        );
        $this->session->set_flashdata('tahun',$tahun);
        $this->session->set_flashdata('bulan',$bulan);
        $this->session->set_flashdata('id_puskesmas',$id_puskesmas);
        $this->template->load('layouts','laporan/laporan_listlaporan', $data);
        /*} else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('persediaan'));
        }*/
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
        $listpuskesmas=$this->Laporan_model->ddpuskesmas();
        $puskesmas = array();
        foreach ($listpuskesmas as $key => $value){
            $puskesmas[$value->id_puskesmas]=$value->nama_puskesmas;
        }
        $data = array(
            'button' => 'Create',
            'action' => site_url('laporan/create_action'),
        'dd_puskesmas'=>$puskesmas,
        'dd_currentpuskesmas'=>'',
        /*'nama_puskesmas' => $this->db->get('puskesmas')->result(),*/
        'id_puskesmas' => set_value('id_puskesmas'),
        'tahun' => set_value('tahun'),
        'bulan' => set_value('bulan'),
        'laporan' => set_value('laporan'),
	    );
        /* print_r($data);
        die();*/
        // if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
        //     // lakukan upload file dengan memanggil function upload yang ada di nilai_model.php
        //     $upload = $this->Laporan_model->upload_file($this->filename);
            
        //     if($upload['result'] == "success"){ // Jika proses upload sukses
        //         // Load plugin PHPExcel nya
        //         include APPPATH.'third_party/PHPExcel/PHPExcel.php';
                
        //         $excelreader = new PHPExcel_Reader_Excel2007();
        //         $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
        //         $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
                
        //         // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
        //         // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
        //         $data['sheet'] = $sheet; 
        //         $this->Laporan_model->insert($data);
        //         $this->session->set_flashdata('message', 'Create Record Success');
        //         redirect(site_url('laporan'));
        //         /*print_r($data);*/

        //     }else{ // Jika proses upload gagal
        //         $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
        //     }
        // }
        $this->template->load('layouts','laporan/laporan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
        $id_puskesmas=($this->input->post('puskesmas', TRUE));
        $tahun=($this->input->post('tahun', TRUE));
        $bulan=($this->input->post('bulan', TRUE));
        //check bulan, puskesmas dan tahun
        $check=$this->Persediaan_model->check($tahun,$bulan,$id_puskesmas);
        // $listpuskesmas=$this->Persediaan_model->check();
            if ($check->num_rows()){
                $this->session->set_flashdata('message', 'gagal');
                $this->create();
                /*redirect(site_url('laporan/create'));
    */       }else{
                $data = array(
                'id_puskesmas' => $id_puskesmas,
                'tahun' => $tahun,
                'bulan' => $bulan,
                );        
                $this->Penerimaan_model->insert($data);
                $this->Pemakaian_model->insert($data);
                $config['upload_path']          = './excel/';
                $config['allowed_types']        = 'xls|xlsx|xml';
         
                $this->load->library('upload', $config);
         
                if ( ! $this->upload->do_upload('laporan')){
                    $error = array('error' => $this->upload->display_errors());
                }else{
                    $filename=array('upload_data' => $this->upload->data('file_name'))['upload_data'];
                }
                include APPPATH.'third_party/PHPExcel/PHPExcel.php';
                $excelreader = new PHPExcel_Reader_Excel5();
                /*$excelreader2 = new PHPExcel_Reader_Excel5versi2();*/
                $loadexcel = $excelreader->load('excel/'.$filename); // Load file yang telah diupload ke folder excel
                /*$loadexcel2 = $excelreader2->load('excel/'.$filename); // Load file yang telah diupload ke folder excel*/
                $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
                foreach($sheet as $numrow => $row){
                    if($numrow < 2 && $row['S']!=''){
                        $cekid_puskesmas=$row['S'];
                        $cekbulan=$row['T'];
                        $cektahun=$row['U'];
                    }
                }
                // $numrow = 6;
                //echo $cekid_puskesmas.$cekbulan.$cektahun.$id_puskesmas.$bulan.$tahun;
                if ($cekid_puskesmas != $id_puskesmas) {
                    //echo '<script>alert("gagal cui");</script>';
                    $this->session->set_flashdata('message', 'Failed Record Success');
                    redirect(site_url('laporan/create'));
      
                }elseif($cekbulan != $bulan){
                    //echo '<script>alert("gagal cui");</script>';
                    $this->session->set_flashdata('message', 'Failed Record Success');
                    redirect(site_url('laporan/create'));

                }elseif($cektahun != $tahun){
                    //echo '<script>alert("gagal cui");</script>';
                    $this->session->set_flashdata('message', 'Failed Record Success');
                    redirect(site_url('laporan/create'));
                }else{
                    foreach($sheet as $numrow => $row){
                    // Cek $numrow apakah lebih dari 1
                    // Artinya karena baris pertama adalah nama-nama kolom
                    // Jadi dilewat saja, tidak usah dinilai
                        if($numrow > 6 && $row['B']!=''){
                                //'id_nilai'=>$row['A'], // Insert data nis dari kolom A di excel
                            $kode=$row['B']; // Insert data nama dari kolom B di excel
                            $nama_obat=$row['C']; // Insert data jenis kelamin dari kolom C di excel
                            $satuan=$row['D']; // Insert data alamat dari kolom D di excel
                            $stok_awal=$row['E']; // Insert data alamat dari kolom D di excel
                            $penerimaan=$row['F']; // Insert data alamat dari kolom D di excel
                            $persediaan=$row['G']; // Insert data alamat dari kolom D di excel
                            $umum=$row['H']; // Insert data alamat dari kolom D di excel
                            $jknpbi=$row['I']; // Insert data alamat dari kolom D di excel
                            $jknnonpbi=$row['J']; // Insert data alamat dari kolom D di excel
                            $jamkesda=$row['K']; // Insert data alamat dari kolom D di excel
                            $jamkesdasktm=$row['L']; // Insert data alamat dari kolom D di excel
                            $jamkesdajamkesmas=$row['M']; // Insert data alamat dari kolom D di excel
                            $uks=$row['N']; // Insert data alamat dari kolom D di excel
                            $kir=$row['O']; // Insert data alamat dari kolom D di excel
                            $gratis=$row['P']; // Insert data alamat dari kolom D di excel
                            $lainlain=$row['Q']; // Insert data alamat dari kolom D di excel
                            $jumlah=$row['R']; // Insert data alamat dari kolom D di excel
                            $sisa_stok=$row['S']; // Insert data alamat dari kolom D di excel
                            $permintaan=$row['T']; // Insert data alamat dari kolom D di excel
                            $pemberian=$row['U']; // Insert data alamat dari kolom D di excel  
                            $cekobat=$this->Obat_model->get_by_id($kode);
                            if (!$cekobat) {
                                $this->Obat_model->insert(array('kode' => $kode, 'nama_obat' => $nama_obat, 'satuan' => $satuan));
                            }
                            
                            $this->Persediaan_model->insert(array(
                                'id_puskesmas' => $this->input->post('puskesmas',TRUE),
                                'tahun' => $this->input->post('tahun',TRUE),
                                'bulan' => $this->input->post('bulan',TRUE),
                                'kode' => $kode, 
                                'stok_awal' => $stok_awal, 
                                'persediaan' => $persediaan, 
                                'sisa_stok' => $sisa_stok, 
                                'permintaan' => $permintaan, 
                                'pemberian' => $pemberian, 
                                ));
                            $id_penerimaan=$this->Penerimaan_model->get_last();
                            $id_pemakaian=$this->Pemakaian_model->get_last();
                            $this->Detail_penerimaan_model->insert(array(
                                'id_penerimaan' => $id_penerimaan, 
                                'kode' => $kode, 
                                'jumlah_terima' => $penerimaan, 
                                ));
                            $this->Detail_pemakaian_model->insert(array(
                                'id_pemakaian' => $id_pemakaian, 
                                'kode' => $kode, 
                                'umum' => $umum, 
                                'jknpbi' => $jknpbi, 
                                'jknnonpbi' => $jknnonpbi, 
                                'jamkesda' => $jamkesda, 
                                'jamkesdasktm' => $jamkesdasktm, 
                                'jamkesdajamkesmas' => $jamkesdajamkesmas, 
                                'uks' => $uks, 
                                'kir' => $kir, 
                                'gratis' => $gratis, 
                                'lainlain' => $lainlain, 
                                'jumlah_pemakaian' => $jumlah, 
                                ));
                            /*print_r($datainput);
                            echo "<br>";*/
                        }
                    }

                    // echo $numrow;
                    /*print_r($datainput);
                    echo "<br>";
        */            // $numrow++; // Tambah 1 setiap kali looping
                    
                    // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
                    // $this->Laporan_model->insert_multiple($data);

                    // $this->Laporan_model->insert($data);
                    $this->session->set_flashdata('message', 'Create Record Success'.$cekid_puskesmas.$cekbulan.$cektahun.$id_puskesmas.$bulan.$tahun);
                    //redirect(site_url('laporan'));
                    redirect(site_url('laporan/tampilupload/'.$id_puskesmas.'/'.$tahun.'/'.$bulan));
                    /*$this->load->view('laporan/listlaporan',$data);*/
                }// 
            }// cek numrow
        } // validation
    } // public

    public function tampilupload($id_puskesmas,$tahun,$bulan)
    {

        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'laporan/laporan_listlaporan.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'laporan/laporan_listlaporan.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'laporan/laporan_listlaporan.html';
            $config['first_url'] = base_url() . 'laporan/laporan_listlaporan.html';
        }

        $config['per_page'] = 1000;
        $config['page_query_string'] = TRUE;
        /*$config['total_rows'] = $this->Laporan_model->total_rows($q,$tahun, $bulan, $id_puskesmas);*/
        $config['total_rows'] = $this->Laporan_model->total_rowskhusus($q);

       $this->load->library('pagination');
        $this->pagination->initialize($config);
        $data = array(
            //'persediaan_data1' => $persediaan,
            'Laporan_data'=>$this->Laporan_model->get_limit_data2($tahun, $bulan, $id_puskesmas),
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'tahun' => $tahun,
            'bulan' => $bulan,
            'id_puskesmas' => $id_puskesmas
        );
        $this->session->set_flashdata('tahun',$tahun);
        $this->session->set_flashdata('bulan',$bulan);
        $this->session->set_flashdata('id_puskesmas',$id_puskesmas);
        $this->template->load('layouts','laporan/laporan_listlaporan', $data);
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
	$this->form_validation->set_rules('tahun', 'tahun', 'trim|required|exact_length[4]');
	$this->form_validation->set_rules('id_tahun', 'id_tahun', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function laporan_format()
    {
        $namaFile =     "formatlaporan.xls";
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        /*$judul = array(
            'tahun' => $tahun,
            'bulan'     => $bulan,
            'id_puskesmas' => $id_puskesmas);
        $data['data'] = $this->Laporan_model->get_limit_data2($tahun, $bulan, $id_puskesmas);

        $this->load->view('laporan/output_excel', $data);*/
        $this->load->view('laporan/laporan_format');
    }

    public function excel($id_puskesmas,$bulan,$tahun)
    {
        $namaFile = "laporan.xls";
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        $data = array(
            'tahun' => $tahun,
            'bulan'     => $bulan,
            'id_puskesmas' => $id_puskesmas);
        $data['data'] = $this->Laporan_model->get_limit_data3($tahun, $bulan, $id_puskesmas);

        $this->load->view('laporan/output_excel', $data);

        /*$this->load->helper('exportexcel');
        $judul = "Laporan Pemakaian dan Lembar Permintaan Obat";
        $tablehead = 4;
        $tablebody = 5;
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
        xlsWriteLabel($tablehead, $kolomhead++, "NO");
    xlsWriteLabel($tablehead, $kolomhead++, "KODE");
    xlsWriteLabel($tablehead, $kolomhead++, "NAMA OBAT");
    xlsWriteLabel($tablehead, $kolomhead++, "SATUAN");
    xlsWriteLabel($tablehead, $kolomhead++, "STOK AWAL");
    xlsWriteLabel($tablehead, $kolomhead++, "PENERIMAAN");
    xlsWriteLabel($tablehead, $kolomhead++, "PERSEDIAAN");
    xlsWriteLabel($tablehead, $kolomhead++, "UMUM");
    xlsWriteLabel($tablehead, $kolomhead++, "JKN-PBI");
    xlsWriteLabel($tablehead, $kolomhead++, "JKN-NON PBI");
    xlsWriteLabel($tablehead, $kolomhead++, "JAMKESDA");
    xlsWriteLabel($tablehead, $kolomhead++, "JAMKESDA-SKTM");
    xlsWriteLabel($tablehead, $kolomhead++, "JAMKESDA-JAMKESMAS");
    xlsWriteLabel($tablehead, $kolomhead++, "UKS");
    xlsWriteLabel($tablehead, $kolomhead++, "KIR");
    xlsWriteLabel($tablehead, $kolomhead++, "GRATIS");
    xlsWriteLabel($tablehead, $kolomhead++, "LAIN-LAIN");
    xlsWriteLabel($tablehead, $kolomhead++, "JUMLAH");
    xlsWriteLabel($tablehead, $kolomhead++, "SISA STOK");
    xlsWriteLabel($tablehead, $kolomhead++, "PERMINTAAN");
    xlsWriteLabel($tablehead, $kolomhead++, "PEMBERIAN");
    // print_r($this->Laporan_model->get_limit_data2($tahun, $bulan, $id_puskesmas));
	foreach ($this->Laporan_model->get_limit_data2($tahun, $bulan, $id_puskesmas) as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	        xlsWriteLabel($tablebody, $kolombody++, $data->kode);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama_obat);
            xlsWriteLabel($tablebody, $kolombody++, $data->satuan);
            xlsWriteLabel($tablebody, $kolombody++, $data->stok_awal);
            xlsWriteLabel($tablebody, $kolombody++, $data->jumlah_terima);
            xlsWriteLabel($tablebody, $kolombody++, $data->persediaan);
            xlsWriteLabel($tablebody, $kolombody++, $data->umum);
            xlsWriteLabel($tablebody, $kolombody++, $data->jknpbi);
            xlsWriteLabel($tablebody, $kolombody++, $data->jknnonpbi);
            xlsWriteLabel($tablebody, $kolombody++, $data->jamkesda);
            xlsWriteLabel($tablebody, $kolombody++, $data->jamkesdasktm);
            xlsWriteLabel($tablebody, $kolombody++, $data->jamkesdajamkesmas);
            xlsWriteLabel($tablebody, $kolombody++, $data->uks);
            xlsWriteLabel($tablebody, $kolombody++, $data->kir);
            xlsWriteLabel($tablebody, $kolombody++, $data->gratis);
            xlsWriteLabel($tablebody, $kolombody++, $data->lainlain);
            xlsWriteLabel($tablebody, $kolombody++, $data->jumlah_pemakaian);
            xlsWriteLabel($tablebody, $kolombody++, $data->sisa_stok);
            xlsWriteLabel($tablebody, $kolombody++, $data->permintaan);
            xlsWriteLabel($tablebody, $kolombody++, $data->pemberian);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();*/
    }

    public function word($id_puskesmas,$bulan,$tahun)
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tahun.doc");

        $data = array(
            'tahun_data' => $this->Laporan_model->get_limit_data2($tahun, $bulan, $id_puskesmas),
            'start' => 0
        );
        
        $this->load->view('tahun/tahun_doc',$data);
    }

}

/* End of file Tahun.php */
/* Location: ./application/controllers/Tahun.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-18 09:41:30 */
/* http://harviacode.com */