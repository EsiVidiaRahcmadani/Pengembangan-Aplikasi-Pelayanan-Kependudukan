<?php
class Data_User extends CI_Controller{
    function __construct(){
        parent::__construct();
        
        
        $this->load->model('user_model');
       // $this->load->library('upload');
        $this->load->helper(array('form', 'url'));
        
        $this->load->library('upload');
    }

    function index(){
            $data=array(
            'title'=>'Data User',
            'data_user' =>$this->user_model->getAllDataUser(),
            
        );
        $this->load->view('admin/data_user',$data);
    }

    function edituser($id){
            $data=array(
            'title'=>'Edit Data User',
            'data_user'=>$this->user_model->getDataUserEdit($id),
        );
        $this->load->view('admin/edit_user',$data);
    } 

        public function tambah()
    {
        $this->form_validation->set_rules('nama_user','Nama Lengkap','required');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('username','Username','required|alpha_numeric|min_length[5]|max_length[20]|is_unique[user.username]');
        $this->form_validation->set_rules('password','Password','required|alpha_numeric|min_length[8]|max_length[24]');
        $this->form_validation->set_rules('province','Provinsi','required');
        $this->form_validation->set_rules('regency','Kabupaten/Kota','required');
        $this->form_validation->set_rules('district','Kecamatan','required');
        
        if($this->form_validation->run() == FALSE){
            $data['provinces'] = $this->user_model->get_province();
            $this->load->view('admin/form_register', $data);
        }else{
            $user_data = array (
                'id_user' => $this->user_model->get_user_id(),
                'nama_user' => set_value('nama_user'),
                'email' => set_value('email'),
                'username' => set_value('username'),
                'password' => set_value('password'),
                'province_id' => set_value('province'),
                'regency_id' => set_value('regency'),
                'district_id' => set_value('district'),
                'group' => '1',
            );
            $this->user_model->register($user_data);
            $valid_user = $this->user_model->check_credential();
            $this->session->set_userdata('id',$valid_user->id);
            $this->session->set_userdata('username',$valid_user->username);
            
            switch($valid_user->group){
                case 1 :
                redirect('admin/home'); 
                break;
                case 2 :
                redirect(base_url()); 
                break;
                default: 
                break;
            }
        }
    }

    function simpanuser($id){
        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']   = '10000';
        $config['max_width']  = '20000';
        $config['max_height']  = '20000';
                
        $this->upload->initialize($config);
        if(!$this->upload->do_upload('gambar')){
                $gambar="";
        }else{
                $gambar=$this->upload->file_name;
        }

        $pass=MD5($this->input->post('passwd'));

        $data=array(
            'id_user'=>$this->input->post('ID'),
            'nama_user'=>$this->input->post('nmadmin'),
            'username'=>$this->input->post('username'),
            'password'=>$pass,
            'email'=>$this->input->post('email'),
            'foto_user'=>$gambar,
        );
        $this->user_model->updateDatab('user',$data, $id);
        $this->session->set_flashdata('notif','Edit User Berhasil');
        redirect("Data_User");
    }

    function hapus(){
        $id['id_user'] = $this->uri->segment(3);
        $this->user_model->deleteData('user',$id);

        $this->session->set_flashdata('notif','Hapus User Berhasil');
        redirect("Data_User");
    }

    function profile()
    {
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->view('/admin/profile_user');

    }
}