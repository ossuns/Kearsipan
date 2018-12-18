<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Obat_model');
        $this->load->library('form_validation');
        /*$this->simple_login->cek_login();*/
    }
	public function index()
	{

        $data=array(
            'title'=>'Transaksi',
            
            //active navigation
            'transaksi'=>'active',
                'tervalidasi'=>'',
                'belumtervalidasi'=>'active',

            'paket'=>'',
                'listpaket'=>'',
                'tambahpaket'=>'',

            'jenispaket'=>'',
                'listjenispaket'=>'',
                'tambahjenispaket'=>'',

            'destinasi'=>'',
                'listdestinasi'=>'',
                'tambahdestinasi'=>''

        );
		$this->load->view('layouts/template.php', $data);
	}
