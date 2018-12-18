<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Persediaan_model extends CI_Model
{

    public $table = 'persediaan';
    public $id = 'id_persediaan';
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
        $this->db->where('persediaan.id_persediaan', $id);
        $this->db->join('puskesmas', 'puskesmas.id_puskesmas=persediaan.id_puskesmas');
        $this->db->join('obat', 'obat.kode=persediaan.kode');
        $this->db->select('persediaan.id_persediaan');
        $this->db->select('nama_puskesmas');
        $this->db->select('kode');
        $this->db->select('nama_obat');
        $this->db->select('stok_awal');
        return $this->db->get($this->table)->row();
    }
    
    // get data by id
    function get_by_idpuskesmas($id)
    {
        $this->db->where('persediaan.id_puskesmas', $id);
        $this->db->join('puskesmas', 'puskesmas.id_puskesmas=persediaan.id_puskesmas');
        $this->db->join('obat', 'obat.kode=persediaan.kode');
        $this->db->select('id_persediaan');
        $this->db->select('persediaan.id_puskesmas');
        $this->db->select('persediaan.kode');
        $this->db->select('nama_obat');
        $this->db->select('stok_awal');
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_persediaan', $q);
	$this->db->or_like('id_puskesmas', $q);
	$this->db->or_like('kode', $q);
	$this->db->or_like('stok_awal', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get total rows khusus
    function total_rowskhusus($q = NULL) {
        $this->db->like('id_persediaan', $q);
    $this->db->or_like('id_puskesmas', $q);
    $this->db->or_like('kode', $q);
    $this->db->or_like('stok_awal', $q);
    $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get total rows khusus
    function total_rowskhusus2($q = NULL) {
        $this->db->like('id_persediaan', $q);
    $this->db->or_like('id_puskesmas', $q);
    $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->select('id_persediaan, persediaan.id_puskesmas, persediaan.kode, nama_obat, SUM(persediaan.stok_awal) AS stok_awal');
        $this->db->group_by('persediaan.kode');
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_persediaan', $q);
    $this->db->or_like('persediaan.id_puskesmas', $q);
    $this->db->or_like('persediaan.kode', $q);
    $this->db->or_like('stok_awal', $q);
    $this->db->limit($limit, $start);
        $this->db->join('puskesmas', 'puskesmas.id_puskesmas=persediaan.id_puskesmas');
        $this->db->join('obat', 'obat.kode=persediaan.kode');
        return $this->db->get($this->table)->result();
    }

    // get data with limit and search
    function get_limit_data2($tahun, $bulan, $id_puskesmas) {
        $this->db->group_by('persediaan.kode');
        // $this->db->order_by($this->id, $this->order);
        // $this->db->like('id_persediaan', $q);
/*  $this->db->or_like('persediaan.id_puskesmas', $q);
    $this->db->or_like('persediaan.kode', $q);
    $this->db->or_like('stok', $q);*/
    // $this->db->limit($limit, $start);

        $this->db->select('*');
        $this->db->select('persediaan.id_persediaan, persediaan.kode, obat.nama_obat, SUM(persediaan.persediaan) AS persediaan');
        $this->db->join('puskesmas', 'puskesmas.id_puskesmas=persediaan.id_puskesmas');
        $this->db->join('obat', 'obat.kode=persediaan.kode');
        if ($id_puskesmas==0 && $bulan==""){
            $this->db->where('persediaan.tahun',$tahun);
         }elseif ($id_puskesmas==0 && $bulan!="") {
            $this->db->where('persediaan.bulan',$bulan);
            $this->db->where('persediaan.tahun',$tahun);
        }elseif ($id_puskesmas!=0 && $bulan=="") {
            $this->db->where('persediaan.tahun',$tahun);
            $this->db->where('persediaan.id_puskesmas',$id_puskesmas);
        }else{
            $this->db->where('persediaan.tahun',$tahun);
            $this->db->where('persediaan.bulan',$bulan);
            $this->db->where('persediaan.id_puskesmas',$id_puskesmas);
        }
        return $this->db->get($this->table)->result();
    }

    // get data with limit and search
    function get_limit_datapencarian($tahun, $bulan, $id_puskesmas) {
        $this->db->group_by('persediaan.kode');
        // $this->db->order_by($this->id, $this->order);
        // $this->db->like('id_persediaan', $q);
/*  $this->db->or_like('persediaan.id_puskesmas', $q);
    $this->db->or_like('persediaan.kode', $q);
    $this->db->or_like('stok', $q);*/
    // $this->db->limit($limit, $start);

        $this->db->select('*');
        $this->db->select('persediaan.id_persediaan, persediaan.kode, obat.nama_obat, SUM(persediaan.persediaan) AS persediaan');
        $this->db->join('puskesmas', 'puskesmas.id_puskesmas=persediaan.id_puskesmas');
        $this->db->join('obat', 'obat.kode=persediaan.kode');
        if ($id_puskesmas==0 && $bulan=="all"){
            $this->db->where('persediaan.tahun',$tahun);
         }elseif ($id_puskesmas==0 && $bulan!="all") {
            $this->db->where('persediaan.bulan',$bulan);
            $this->db->where('persediaan.tahun',$tahun);
        }elseif ($id_puskesmas!=0 && $bulan=="all") {
            $this->db->where('persediaan.tahun',$tahun);
            $this->db->where('persediaan.id_puskesmas',$id_puskesmas);
        }else{
            $this->db->where('persediaan.tahun',$tahun);
            $this->db->where('persediaan.bulan',$bulan);
            $this->db->where('persediaan.id_puskesmas',$id_puskesmas);
        }
        return $this->db->get($this->table)->result();
    }

    // get data with limit and search
    function get_limit_data3($tahun, $bulan) {
        $this->db->group_by('persediaan.kode');
         $this->db->group_by('persediaan.tahun');
        $this->db->select('*');
        $this->db->select('puskesmas.nama_puskesmas, SUM(persediaan.persediaan) AS total, AVG(persediaan.persediaan) AS persediaan');
        $this->db->join('puskesmas', 'puskesmas.id_puskesmas=persediaan.id_puskesmas');
        $this->db->join('obat', 'obat.kode=persediaan.kode');
        if ($bulan==""){
            $this->db->where('persediaan.tahun',$tahun);
        }else{
            $this->db->where('persediaan.tahun',$tahun);
            $this->db->where('persediaan.bulan',$bulan);
        }
        return $this->db->get($this->table)->result();
    }

    // get data with limit and search
    function get_limit_datarata2($tahun, $bulan) {
        $this->db->group_by('persediaan.kode');
         $this->db->group_by('persediaan.tahun');
        $this->db->select('*');
        $this->db->select('puskesmas.nama_puskesmas, SUM(persediaan.persediaan) AS total, AVG(persediaan.persediaan) AS persediaan');
        $this->db->join('puskesmas', 'puskesmas.id_puskesmas=persediaan.id_puskesmas');
        $this->db->join('obat', 'obat.kode=persediaan.kode');
        if ($bulan=="all"){
            $this->db->where('persediaan.tahun',$tahun);
        }else{
            $this->db->where('persediaan.tahun',$tahun);
            $this->db->where('persediaan.bulan',$bulan);
        }
        return $this->db->get($this->table)->result();
    }

 // get data with limit and search
    function check($tahun,$bulan,$id_puskesmas) {
        $this->db->group_by('persediaan.kode');
        $this->db->select('persediaan','persediaan.tahun, persediaan.bulan, persediaan.id_puskesmas');
            $this->db->where('persediaan.tahun',$tahun);
            $this->db->where('persediaan.bulan',$bulan);
            $this->db->where('persediaan.id_puskesmas',$id_puskesmas);
        return $this->db->get($this->table);
    }


     // get data with limit and search
  //   function get_limit_data2($id, $limit, $start = 0, $q = NULL) {
  //       $this->db->where('persediaan.id_puskesmas',$id);/*
  //       $this->db->group_by('persediaan.id_puskesmas');*/
  //       $this->db->order_by($this->id, $this->order);
  //       $this->db->like('id_persediaan', $q);
  // $this->db->or_like('persediaan.id_puskesmas', $q);
  //   $this->db->or_like('persediaan.kode', $q);
  //   $this->db->or_like('stok', $q);
  //   $this->db->limit($limit, $start);
  //       $this->db->join('puskesmas', 'puskesmas.id_puskesmas=persediaan.id_puskesmas');
  //       $this->db->join('obat', 'obat.kode=persediaan.kode');
  //       return $this->db->get($this->table)->result();
  //   }

    // dropdown
    function ddtahun()
    {
        $this->db->select('*');
        $this->db->group_by('tahun');
        return $this->db->get('persediaan')->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
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

/* End of file Persediaan_model.php */
/* Location: ./application/models/Persediaan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-30 05:23:35 */
/* http://harviacode.com */