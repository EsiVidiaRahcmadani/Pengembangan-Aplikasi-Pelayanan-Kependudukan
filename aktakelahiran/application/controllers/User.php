 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
{
    parent::__construct();
    #load_library dan helper yang dibutuhkan
    $this->load->library(array('table','form_validation'));
    $this->load->helper(array('form','url'));
    $this->load->model('login_user','',TRUE);
    $this->load->library('session');
    $this->load->helper('date');
    $this->load->model('user_model');
}
public function login()

    {
        $this->form_validation->set_rules('username','Username','required|alpha_numeric');
        $this->form_validation->set_rules('password','Password','required|alpha_numeric');
        
        if($this->form_validation->run() == FALSE){
            $this->load->view('web/login');
        }else{
            $this->load->model('user_model');
            $valid_user = $this->user_model->check_credential();
            
            if($valid_user == FALSE){
                $this->session->set_flashdata('error','Maaf, username atau password yang Anda masukkan salah. Silakan coba lagi');
                redirect('login');
            }else{
                $this->session->set_userdata('id_user',$valid_user->id_user);
                $this->session->set_userdata('username',$valid_user->username);
                $this->session->set_userdata('group',$valid_user->group);
                
                switch($valid_user->group){
                    case 1 :
                    redirect('user'); 
                    break;
                    case 2 :
                    redirect(base_url()); 
                    break;

                    case 3 :
                    redirect('loket'); 
                    break;
                    default: 
                    break;
                }
            }
        }
    }

    public  function logout() {
        $this->session->sess_destroy();
        
        redirect('home');
    }
    
    public function index()
    {
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->view('/admin/index');
    }

    public function edit_user($id)
    {
        $this->form_validation->set_rules('nama_user','Nama Lengkap','required');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('username','Username','required|alpha_numeric|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('password','Password','required|alpha_numeric|min_length[8]|max_length[24]');
        $this->form_validation->set_rules('province','Provinsi','required');
        $this->form_validation->set_rules('regency','Kabupaten/Kota','required');
        $this->form_validation->set_rules('district','Kecamatan','required');
        
        if($this->form_validation->run() == FALSE){
            $data = array (
                'provinces' => $this->user_model->get_province(),
                'user' => $this->user_model->find($id)
                );
            $this->load->view('form_edit_user', $data);
        }else{
            $user_data = array (
                'nama_user' => set_value('nama_user'),
                'email' => set_value('email'),
                'username' => set_value('username'),
                'password' => set_value('password'),
                'province_id' => set_value('province'),
                'regency_id' => set_value('regency'),
                'district_id' => set_value('district'),
                'group' => '2'
            );
            $this->user_model->update($id, $user_data);
            redirect('user/detail_user/' . $this->session->userdata('id'));
        }   
    }

    public function detail_user($id)
    {
        $data['user'] = $this->user_model->detail($id);
        $this->load->view('view_user_detail', $data);
    }
}