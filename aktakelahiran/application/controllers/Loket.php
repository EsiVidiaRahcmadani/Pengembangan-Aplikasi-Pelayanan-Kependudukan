<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loket extends CI_Controller {

 function __construct(){
        parent::__construct();
                
        $this->load->model('aktakelahiran_model');

       // $this->load->library('upload');
        $this->load->helper(array('form', 'url', 'html'));
        
        $this->load->library('upload','table');

    }

	function index(){
			$data=array(
            'title'=>'Data Kelahiran',
            'data_kelahiran' =>$this->aktakelahiran_model->getAllDataKelahiran(),
			
        );
        $this->load->view('loket/index',$data);
    }

}