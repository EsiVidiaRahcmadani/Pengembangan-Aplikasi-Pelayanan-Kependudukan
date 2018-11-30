<?php

class aktakelahiran_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    public function getAllData($table)
    {
        return $this->db->get($table)->result();
    }
    public function getSelectedData($table,$data)
    {
        return $this->db->get_where($table, $data);
    }
    function updateData($table,$data,$field_key)
    {
        $this->db->update($table,$data,$field_key);
    }
    function updateDatab($table,$data,$id)
    {
        $this->db->where('nik',$id)->update($table,$data);
    }
    function deleteData($table,$id)
    {
        $this->db->delete($table,$id);
    }
    function insertData($table,$data)
    {
        $this->db->insert($table,$data);
    }
    function manualQuery($q)
    {
        return $this->db->query($q);
    }
    public function getAllDataKelahiran()
    {
        $this->db->select('*');
    $this->db->from('akta_kelahiran');
    $this->db->join('berkas', 'akta_kelahiran.nik = berkas.nik');
    $query = $this->db->get();
    return $query->result(); 
    }
    function getDataKelahiranEdit($id){
        return $this->db->query("SELECT * from akta_kelahiran where nik = '$id' ")->result();
    }
    function caridata(){
    $c = $this->input->POST ('cari');
    $this->db->select('*');
    $this->db->from('akta_kelahiran');
    $this->db->join('berkas', 'akta_kelahiran.nik = berkas.nik');
    $this->db->like('berkas.nik', $c);
    $query = $this->db->get();
    return $query->result(); 
    }

        public function get_province()
    {
        $this->db->order_by('name','ASC');
        $hasil=$this->db->get('provinces');
        if($hasil->num_rows() > 0){
            return $hasil->result();
        }else{
            return false;
        }
    }

    public function get_regency($province_id)
    {
        $regency="<option value='0'>--Pilih Kabupaten/Kota--</option>";
        $this->db->order_by('name','ASC');
        $hasil= $this->db->get_where('regencies',array('province_id'=>$province_id));
        foreach ($hasil->result_array() as $data ) {
            $regency.= "<option value='$data[id]'>$data[name]</option>";
        }
        return $regency;
    }   

    public function get_district($regency_id)
    {
        $district="<option value='0'>--Pilih Kecamatan--</option>";
        $this->db->order_by('name','ASC');
        $hasil= $this->db->get_where('districts',array('regency_id'=>$regency_id));
        foreach ($hasil->result_array() as $data ) {
            $district.= "<option value='$data[id]'>$data[name]</option>";
        }
        return $district;
    }
}