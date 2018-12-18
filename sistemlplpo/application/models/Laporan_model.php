<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan_model extends CI_Model
{

    public $table = 'puskesmas';
    public $id = 'id_puskesmas';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        /*$this->db->where($this->id, $id);*/
        $this->db->where('puskesmas.id_puskesmas', $id);
        $this->db->join('persediaan','persediaan.id_puskesmas=puskesmas.id_puskesmas');
        $this->db->join('obat','obat.kode=persediaan.kode');
        $this->db->join('obat','obat.kode=detail_penerimaan.kode');
        $this->db->join('penerimaan','penerimaan.id_puskesmas=puskesmas.id_puskesmas');
        $this->db->join('detail_penerimaan','detail_penerimaan.id_penerimaan=penerimaan.id_penerimaan');
        $this->db->join('pemakaian','pemakaian.id_puskesmas=puskesmas.id_puskesmas');
        $this->db->join('detail_pemakaian','detail_pemakaian.id_pemakaian=pemakaian.id_pemakaian');
        /*$this->db->join('obat','obat.kode=detail_penerimaan.kode');*/
        /*$this->db->join('detail_penerimaan','detail_penerimaan.kode=obat.kode');*/
        $this->db->select('puskesmas.id_puskesmas');
        $this->db->select('nama_puskesmas');
        $this->db->select('kode');
        $this->db->select('nama_obat');
        $this->db->select('stok_awal');
        $this->db->select('jumlah_terima');
        $this->db->select('detail_pemakaian.umum');
        /*$this->db->select('detail.penerimaan.jumlah_terima');*/
        return $this->db->get($this->table)->row();
    }

    public function upload_file($filename){
        $this->load->library('upload'); // Load librari upload
        
        $config['upload_path'] = './excel/';
        $config['allowed_types'] = 'xlsx';
        $config['max_size'] = '2048';
        $config['overwrite'] = true;
        $config['file_name'] = $filename;
      
        $this->upload->initialize($config); // Load konfigurasi uploadnya
        if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
          // Jika berhasil :
          $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
          return $return;
        }else{
          // Jika gagal :
          $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
          return $return;
        }
    }

    // Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
    public function insert_multiple($data){
        $this->db->insert_batch('nilai', $data);
    }
    
    // get total rows
    function total_rows($q = NULL, $tahun, $bulan, $id_puskesmas) {
        $this->db->join('persediaan','persediaan.id_puskesmas=puskesmas.id_puskesmas');
        $this->db->like('persediaan.kode', $q);                                                                
        if ($id_puskesmas==0 && $bulan==""){
            $this->db->where('persediaan.tahun',$tahun);
        }elseif ($id_puskesmas==0 && $bulan!="") {
            $this->db->where('persediaan.tahun',$tahun);
            $this->db->where('persediaan.id_puskesmas',$id_puskesmas);
        }elseif ($id_puskesmas!=0 && $bulan=="") {
            $this->db->where('persediaan.tahun',$tahun);
            $this->db->where('persediaan.id_puskesmas',$id_puskesmas);
        }else{
            $this->db->where('persediaan.tahun',$tahun);
            $this->db->where('persediaan.bulan',$bulan);
            $this->db->where('persediaan.id_puskesmas',$id_puskesmas);
        }
    $this->db->from($this->table);
        //return $this->db->select('COUNT(persediaan.kode) AS total_rows');
        return $this->db->count_all_results();
        /*$this->db->select('persediaan.bulan, persediaan.kode,nama_obat,satuan,SUM(persediaan.stok_awal) AS stok_awal,detail_penerimaan.jumlah_terima,SUM(persediaan.persediaan) AS persediaan,SUM(detail_pemakaian.umum) AS umum,SUM(detail_pemakaian.jknpbi) AS jknpbi,SUM(detail_pemakaian.jknnonpbi) AS jknnonpbi,SUM(detail_pemakaian.jamkesda) AS jamkesda,SUM(detail_pemakaian.jamkesdasktm) AS jamkesdasktm,SUM(detail_pemakaian.jamkesdajamkesmas) AS jamkesdajamkesmas,SUM(detail_pemakaian.uks) AS uks,SUM(detail_pemakaian.kir) AS kir,SUM(detail_pemakaian.gratis) AS gratis,SUM(detail_pemakaian.lainlain) AS lainlain,SUM(detail_pemakaian.jumlah_pemakaian) AS jumlah_pemakaian,SUM(persediaan.sisa_stok) AS sisa_stok,SUM(persediaan.permintaan) AS permintaan,SUM(persediaan.pemberian) AS pemberian');
        $this->db->join('persediaan','persediaan.id_puskesmas=puskesmas.id_puskesmas');
        $this->db->join('obat','obat.kode=persediaan.kode');
        $this->db->join('penerimaan', 'penerimaan.id_puskesmas=puskesmas.id_puskesmas');
        $this->db->join('pemakaian', 'pemakaian.id_puskesmas=puskesmas.id_puskesmas');
        $this->db->join('detail_pemakaian', 'detail_pemakaian.id_pemakaian=pemakaian.id_pemakaian');
        $this->db->join('detail_penerimaan', 'detail_penerimaan.id_penerimaan=penerimaan.id_penerimaan');
        $this->db->like('kode', $q);
        $this->db->or_like('nama_obat', $q);
        $this->db->or_like('satuan', $q);
        $this->db->or_like('stok_awal', $q);
        $this->db->or_like('jumlah_terima', $q);
        $this->db->or_like('persediaan', $q);
        $this->db->or_like('umum', $q);
        $this->db->or_like('jknpbi', $q);
        $this->db->or_like('jknpbi', $q);
        $this->db->or_like('jamkesda', $q);
        $this->db->or_like('jamkesdasktm', $q);
        $this->db->or_like('jamkesdajamkesmas', $q);
        $this->db->or_like('uks', $q);
        $this->db->or_like('kir', $q);
        $this->db->or_like('gratis', $q);
        $this->db->or_like('lainlain', $q);
        $this->db->or_like('jumlah_pemakaian', $q);
        $this->db->or_like('sisa_stok', $q);
        $this->db->or_like('permintaan', $q);
        $this->db->or_like('pemberian', $q);*/

    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        /*$this->db->select('persediaan.id_puskesmas,persediaan.kode,nama_obat,satuan,SUM(persediaan.stok_awal) AS stok_awal,detail_penerimaan.jumlah_terima,COUNT(persediaan.stok_awal+detail_penerimaan.jumlah_terima) AS persediaan,detail_pemakaian.umum');*/
        $this->db->select('persediaan.kode,nama_obat,satuan,SUM(persediaan.stok_awal) AS stok_awal,detail_penerimaan.jumlah_terima,SUM(persediaan.persediaan) AS persediaan,SUM(detail_pemakaian.umum) AS umum,SUM(detail_pemakaian.jknpbi) AS jknpbi,SUM(detail_pemakaian.jknnonpbi) AS jknnonpbi,SUM(detail_pemakaian.jamkesda) AS jamkesda,SUM(detail_pemakaian.jamkesdasktm) AS jamkesdasktm,SUM(detail_pemakaian.jamkesdajamkesmas) AS jamkesdajamkesmas,SUM(detail_pemakaian.uks) AS uks,SUM(detail_pemakaian.kir) AS kir,SUM(detail_pemakaian.gratis) AS gratis,SUM(detail_pemakaian.lainlain) AS lainlain,SUM(detail_pemakaian.jumlah_pemakaian) AS jumlah_pemakaian,SUM(persediaan.sisa_stok) AS sisa_stok,SUM(persediaan.permintaan) AS permintaan,SUM(persediaan.pemberian) AS pemberian');
        $this->db->where('persediaan.kode=detail_pemakaian.kode AND persediaan.kode=detail_penerimaan.kode
                            AND persediaan.tahun=pemakaian.tahun AND persediaan.tahun=penerimaan.tahun 
                            AND persediaan.bulan=pemakaian.bulan AND persediaan.bulan=penerimaan.bulan'
                            );
        $this->db->group_by('kode');
        /*$this->db->order_by('puskesmas.id_puskesmas');*/
        /*$this->db->order_by($this->id, $this->order);*/
        /*$this->db->like('puskesmas.id_puskesmas', $q);*/
    /*$this->db->or_like('puskesmas.id_puskesmas', $q);
    $this->db->or_like('nama_puskesmas', $q);
    $this->db->or_like('kecamatan', $q);*/
    $this->db->limit($limit, $start);
        $this->db->join('persediaan','persediaan.id_puskesmas=puskesmas.id_puskesmas');
        $this->db->join('obat','obat.kode=persediaan.kode');
        $this->db->join('penerimaan', 'penerimaan.id_puskesmas=puskesmas.id_puskesmas');
        $this->db->join('pemakaian', 'pemakaian.id_puskesmas=puskesmas.id_puskesmas');
        $this->db->join('detail_pemakaian', 'detail_pemakaian.id_pemakaian=pemakaian.id_pemakaian');
        $this->db->join('detail_penerimaan', 'detail_penerimaan.id_penerimaan=penerimaan.id_penerimaan');
        /*$this->db->join('penerimaan','penerimaan.id_puskesmas=puskesmas.id_puskesmas');
        $this->db->join('detail_penerimaan','detail_penerimaan.id_penerimaan=penerimaan.id_penerimaan');
        $this->db->join('pemakaian','pemakaian.id_puskesmas=puskesmas.id_puskesmas');
        $this->db->join('detail_pemakaian','detail_pemakaian.id_pemakaian=pemakaian.id_pemakaian');*/
        /*$this->db->join('detail_penerimaan','detail_penerimaan.kode=obat.kode');
        $this->db->join('penerimaan','detail_penerimaan.id_penerimaan=detail_penerimaan.id_penerimaan');
        $this->db->join('detail_pemakaian','detail_pemakaian.kode=obat.kode');
        $this->db->join('pemakaian','pemakaian.id_pemakaian=detail_pemakaian.id_pemakaian');*/
        return $this->db->get($this->table)->result();
    }

     // get total rows khusus
        function total_rowskhusus($q = NULL) {
             $this->db->join('persediaan','persediaan.id_puskesmas=puskesmas.id_puskesmas');
        $this->db->join('obat','obat.kode=persediaan.kode');
        $this->db->or_like('persediaan.kode', $q);
        $this->db->from($this->table);
            return $this->db->count_all_results();
        }

    function get_limit_data2($tahun, $bulan, $id_puskesmas) {
        $this->db->group_by('persediaan.kode');
        $this->db->select('*');
        $this->db->select('persediaan.bulan, persediaan.kode,nama_obat,satuan,SUM(persediaan.stok_awal) AS stok_awal,detail_penerimaan.jumlah_terima,SUM(persediaan.persediaan) AS persediaan,SUM(detail_pemakaian.umum) AS umum,SUM(detail_pemakaian.jknpbi) AS jknpbi,SUM(detail_pemakaian.jknnonpbi) AS jknnonpbi,SUM(detail_pemakaian.jamkesda) AS jamkesda,SUM(detail_pemakaian.jamkesdasktm) AS jamkesdasktm,SUM(detail_pemakaian.jamkesdajamkesmas) AS jamkesdajamkesmas,SUM(detail_pemakaian.uks) AS uks,SUM(detail_pemakaian.kir) AS kir,SUM(detail_pemakaian.gratis) AS gratis,SUM(detail_pemakaian.lainlain) AS lainlain,SUM(detail_pemakaian.jumlah_pemakaian) AS jumlah_pemakaian,SUM(persediaan.sisa_stok) AS sisa_stok,SUM(persediaan.permintaan) AS permintaan,SUM(persediaan.pemberian) AS pemberian');
        $this->db->join('persediaan','persediaan.id_puskesmas=puskesmas.id_puskesmas');
        $this->db->join('obat','obat.kode=persediaan.kode');
        $this->db->join('penerimaan', 'penerimaan.id_puskesmas=puskesmas.id_puskesmas');
        $this->db->join('pemakaian', 'pemakaian.id_puskesmas=puskesmas.id_puskesmas');
        $this->db->join('detail_pemakaian', 'detail_pemakaian.id_pemakaian=pemakaian.id_pemakaian');
        $this->db->join('detail_penerimaan', 'detail_penerimaan.id_penerimaan=penerimaan.id_penerimaan');
        if ($id_puskesmas==0 && $bulan==""){
            $this->db->where('persediaan.tahun',$tahun);
            $this->db->where('persediaan.kode=detail_pemakaian.kode AND persediaan.kode=detail_penerimaan.kode
                              AND persediaan.tahun=pemakaian.tahun AND persediaan.tahun=penerimaan.tahun');
        }elseif ($id_puskesmas==0 && $bulan!="") {
            $this->db->where('persediaan.bulan',$bulan);
            $this->db->where('persediaan.tahun',$tahun);
            $this->db->where('persediaan.kode=detail_pemakaian.kode AND persediaan.kode=detail_penerimaan.kode
                            AND persediaan.tahun=pemakaian.tahun AND persediaan.tahun=penerimaan.tahun 
                            AND persediaan.bulan=pemakaian.bulan AND persediaan.bulan=penerimaan.bulan' );
        }elseif ($id_puskesmas!=0 && $bulan=="") {
            $this->db->where('persediaan.tahun',$tahun);
            $this->db->where('persediaan.id_puskesmas',$id_puskesmas);
            $this->db->where('persediaan.kode=detail_pemakaian.kode AND persediaan.kode=detail_penerimaan.kode
                            AND persediaan.tahun=pemakaian.tahun AND persediaan.tahun=penerimaan.tahun 
                            AND puskesmas.id_puskesmas=pemakaian.id_puskesmas AND persediaan.id_puskesmas=penerimaan.id_puskesmas');
        }else{
            $this->db->where('persediaan.tahun',$tahun);
            $this->db->where('persediaan.bulan',$bulan);
            $this->db->where('persediaan.id_puskesmas',$id_puskesmas);
            $this->db->where('persediaan.kode=detail_pemakaian.kode AND persediaan.kode=detail_penerimaan.kode
                            AND persediaan.tahun=pemakaian.tahun AND persediaan.tahun=penerimaan.tahun 
                            AND persediaan.bulan=pemakaian.bulan AND persediaan.bulan=penerimaan.bulan
                            AND puskesmas.id_puskesmas=pemakaian.id_puskesmas AND persediaan.id_puskesmas=penerimaan.id_puskesmas');
        }
        return $this->db->get($this->table)->result();
    }

    function get_limit_data3($tahun, $bulan, $id_puskesmas) {
        $this->db->group_by('persediaan.kode');
        $this->db->select('*');
        $this->db->select('persediaan.bulan, persediaan.kode,nama_obat,satuan,SUM(persediaan.stok_awal) AS stok_awal,detail_penerimaan.jumlah_terima,SUM(persediaan.persediaan) AS persediaan,SUM(detail_pemakaian.umum) AS umum,SUM(detail_pemakaian.jknpbi) AS jknpbi,SUM(detail_pemakaian.jknnonpbi) AS jknnonpbi,SUM(detail_pemakaian.jamkesda) AS jamkesda,SUM(detail_pemakaian.jamkesdasktm) AS jamkesdasktm,SUM(detail_pemakaian.jamkesdajamkesmas) AS jamkesdajamkesmas,SUM(detail_pemakaian.uks) AS uks,SUM(detail_pemakaian.kir) AS kir,SUM(detail_pemakaian.gratis) AS gratis,SUM(detail_pemakaian.lainlain) AS lainlain,SUM(detail_pemakaian.jumlah_pemakaian) AS jumlah_pemakaian,SUM(persediaan.sisa_stok) AS sisa_stok,SUM(persediaan.permintaan) AS permintaan,SUM(persediaan.pemberian) AS pemberian');
        $this->db->join('persediaan','persediaan.id_puskesmas=puskesmas.id_puskesmas');
        $this->db->join('obat','obat.kode=persediaan.kode');
        $this->db->join('penerimaan', 'penerimaan.id_puskesmas=puskesmas.id_puskesmas');
        $this->db->join('pemakaian', 'pemakaian.id_puskesmas=puskesmas.id_puskesmas');
        $this->db->join('detail_pemakaian', 'detail_pemakaian.id_pemakaian=pemakaian.id_pemakaian');
        $this->db->join('detail_penerimaan', 'detail_penerimaan.id_penerimaan=penerimaan.id_penerimaan');
        if ($id_puskesmas==0 && $bulan=="all"){
            $this->db->where('persediaan.tahun',$tahun);
            $this->db->where('persediaan.kode=detail_pemakaian.kode AND persediaan.kode=detail_penerimaan.kode
                              AND persediaan.tahun=pemakaian.tahun AND persediaan.tahun=penerimaan.tahun');
        }elseif ($id_puskesmas==0 && $bulan!="all") {
            $this->db->where('persediaan.bulan',$bulan);
            $this->db->where('persediaan.tahun',$tahun);
            $this->db->where('persediaan.kode=detail_pemakaian.kode AND persediaan.kode=detail_penerimaan.kode
                            AND persediaan.tahun=pemakaian.tahun AND persediaan.tahun=penerimaan.tahun 
                            AND persediaan.bulan=pemakaian.bulan AND persediaan.bulan=penerimaan.bulan' );
        }elseif ($id_puskesmas!=0 && $bulan=="all") {
            $this->db->where('persediaan.tahun',$tahun);
            $this->db->where('persediaan.id_puskesmas',$id_puskesmas);
            $this->db->where('persediaan.kode=detail_pemakaian.kode AND persediaan.kode=detail_penerimaan.kode
                            AND persediaan.tahun=pemakaian.tahun AND persediaan.tahun=penerimaan.tahun 
                            AND puskesmas.id_puskesmas=pemakaian.id_puskesmas AND persediaan.id_puskesmas=penerimaan.id_puskesmas');
        }else{
            $this->db->where('persediaan.tahun',$tahun);
            $this->db->where('persediaan.bulan',$bulan);
            $this->db->where('persediaan.id_puskesmas',$id_puskesmas);
            $this->db->where('persediaan.kode=detail_pemakaian.kode AND persediaan.kode=detail_penerimaan.kode
                            AND persediaan.tahun=pemakaian.tahun AND persediaan.tahun=penerimaan.tahun 
                            AND persediaan.bulan=pemakaian.bulan AND persediaan.bulan=penerimaan.bulan
                            AND puskesmas.id_puskesmas=pemakaian.id_puskesmas AND persediaan.id_puskesmas=penerimaan.id_puskesmas');
        }
        return $this->db->get($this->table)->result();
    }

     // dropdown
    function ddtahun()
    {
        $this->db->select('*');
        $this->db->group_by('tahun');
        return $this->db->get('persediaan')->result();
    }

     // dropdown
    function ddpuskesmas()
    {
        $this->db->select('*');
        $this->db->group_by('nama_puskesmas');
        return $this->db->get('puskesmas')->result();
    }

    // insert data
    function insert($data)
    {
        /*$this->db->insert($this->table, $data);*/
        $this->db->insert('persediaan',$data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
}

/* End of file Tahun_model.php */
/* Location: ./application/models/Tahun_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-18 09:41:30 */
/* http://harviacode.com */