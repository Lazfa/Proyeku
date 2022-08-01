<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Login extends CI_Controller
{
    public function __construct()
    {
        parent :: __construct();
        $this->load->model('M_proyeku');
    }

    public function index()
    {
        if ($this->session->has_userdata('nama') != 0){
            redirect('C_dashboard_guru');
        }
        $this->load->view('V_login');
    }

    public function login(){
        $table = "tb_user";
        $user = $this->input->post('user');
        $pass = $this->input->post('pass');
        $profesi = $this->input->post('profesi');
        
        // if ($user == "Admin" && $pass == 'Admin'){
        //     $profesi = 'Admin';
        // } else {
        //     $profesi = $this->input->post('profesi');
        // }
        
        $pass = 'kepala'.$this->input->post('pass').'buntut';
        $param = array(
            'username' => $user,
            'profesi' => $profesi
        );

        $data = $this->M_proyeku->getRecord($table, $param);

        if (password_verify($pass, $data->password)){
            $this->session->set_userdata('idUser', $data->id_user);
            $this->session->set_userdata('nama', $user);
            $this->session->set_userdata('profesi', $profesi);

            // if ($profesi == "Admin"){
            //     redirect('C_dashboard_guru');
            // } else 
            if ($profesi == "Guru"){
                redirect('C_dashboard_guru');
            } else {
                redirect('C_dashboard_siswa');
            }

        } else {
            $this->session->set_flashdata('galat', 'Username atau password salah!');
            redirect('C_login');
        }
    }

    public function daftar(){
        if ($this->session->has_userdata('nama') != 0) {
            redirect('C_dashboard_guru');
        }
        $this->load->view('V_daftar');
    }

    public function daftar_response(){
        $this->form_validation->set_rules('user', 'Username', 'trim|required|min_length[6]|is_unique[tb_user.username]',
            array('is_unique' => 'Username already taken!')
        );
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
        $this->form_validation->set_rules('instansi', 'Instansi', 'trim|required');
        $this->form_validation->set_rules('pass', 'Password', 'trim|required');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[pass]');

        if($this->form_validation->run() == false){
            $this->load->view("V_daftar");
        } else {
            $table = "tb_user";
            $id = uniqid();
            $user = $this->input->post('user');
            $pass = "kepala".$this->input->post('pass')."buntut";
            $pass = password_hash($pass, PASSWORD_BCRYPT);
            $email = $this->input->post('email');
            $profesi = $this->input->post('profesi');
            $instansi = $this->input->post('instansi');
            $created_at = date("Y-m-d H:i:s");
            
            $value = array(
                'id_user' => $id,
                'username' => $user,
                'password' => $pass,
                'email' => $email,
                'profesi' => $profesi,
                'instansi' => $instansi,
                'created_at' => $created_at
            );

            $this->M_proyeku->addRecord($table, $value);
            $this->load->view("V_login");
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('C_login');
    }
}
?>