<?php

class user_model extends CI_Model{
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
        $this->db->where('id_user',$id)->update($table,$data);
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
    public function getAllDataUser()
    {
        return $this->db->get('user')->result();
    }
    function getDataUserEdit($id){
        return $this->db->query("SELECT * from user where id_user = '$id' ")->result();
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

    public function check_credential()
    {
        $username = set_value('username');
        $password = set_value('password');
        
        $hasil = $this->db->where('username',$username)
        ->where('password',$password)
        ->limit(1)
        ->get('user');
        
        if($hasil->num_rows() > 0){
            return $hasil->row();
        }else{
            return array();
        }
    }


    public function get_user_id()
    {
        $hasil=$this->db->query("SELECT MAX(RIGHT(id_user,5)) AS kode_max FROM user");
        $kode = "";
        if($hasil->num_rows() > 0){
            foreach($hasil->result() as $kd){
                $tmp = ((int)$kd->kode_max)+1;
                $kode = sprintf("%05s", $tmp);
            }
        }else{
            $kode = "001";
        }

        $karakter = "USR";
        return $karakter.$kode;
    }

    public function register($user_data)
    {
        $this->db->insert('user',$user_data);
    }

    public function detail($id)
    {
        $hasil = $this->db->where('id_user',$id)
        ->limit(1)
        ->get('user');
        if($hasil->num_rows() > 0){
            return $hasil->result();
        }else{
            return array();
        }
    }

    public function find($id)
    {
        $hasil = $this->db->where('id_user',$id)
        ->limit(1)
        ->get('user');
        if($hasil->num_rows() > 0){
            return $hasil->row();
        }else{
            return array();
        }
    }
    
}