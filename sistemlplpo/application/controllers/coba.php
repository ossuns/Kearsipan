 <?php
 public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
        /*$id_puskesmas=($this->input->post('id_puskesmas', TRUE));
        $tahun=($this->input->post('tahun', TRUE));
        $bulan=($this->input->post('bulan', TRUE));*/
        $data = array(
        'id_puskesmas' => $this->input->post('puskesmas',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
        'bulan' => $this->input->post('bulan',TRUE),
        );
        if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
            // lakukan upload file dengan memanggil function upload yang ada di nilai_model.php
            $upload = $this->Laporan_model->upload_file($this->filename);
            
            if($upload['result'] == "success"){ // Jika proses upload sukses
                // Load plugin PHPExcel nya
                include APPPATH.'third_party/PHPExcel/PHPExcel.php';
                
                $excelreader = new PHPExcel_Reader_Excel2007();
                $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
                $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
                
                // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
                // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
                $data['sheet'] = $sheet; 
                $data['laporan'] = $this->Laporan_model->get_by_id($data['id_puskesmas']);

            }else{ // Jika proses upload gagal
                $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
            }
        }else{
              $data['laporan'] = $this->Laporan_model->get_by_id($data['id_puskesmas']);
        }
        /*print_r($data);
        die();*/
            $this->Laporan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('laporan'));
        }

    }
?>
 <?php
 public function create_action() 
    {
        /*$this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {*/
        /*$id_puskesmas=($this->input->post('id_puskesmas', TRUE));
        $tahun=($this->input->post('tahun', TRUE));
        $bulan=($this->input->post('bulan', TRUE));*/
        
        if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
            // lakukan upload file dengan memanggil function upload yang ada di nilai_model.php
            $upload = $this->Laporan_model->upload_file($this->filename);
            
            if($upload['result'] == "success"){ // Jika proses upload sukses
                $data = array(
                'id_puskesmas' => $this->input->post('puskesmas',TRUE),
                'tahun' => $this->input->post('tahun',TRUE),
                'bulan' => $this->input->post('bulan',TRUE),
                );
                // Load plugin PHPExcel nya
                include APPPATH.'third_party/PHPExcel/PHPExcel.php';
                
                $excelreader = new PHPExcel_Reader_Excel2007();
                $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
                $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
                
                // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
                // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
                $data['sheet'] = $sheet; 
                $data['laporan'] = $this->Laporan_model->get_by_id($data['id_puskesmas']);
                $this->Laporan_model->insert($data);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('laporan'));

            }else{ // Jika proses upload gagal
                $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
            }else{
              $data['laporan'] = $this->Laporan_model->get_by_id($data['id_puskesmas']);
        }
    }
?>