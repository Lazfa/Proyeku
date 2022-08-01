<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_dashboard_guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_proyeku');
    }

    public function index()
    {
        if ($this->session->has_userdata('nama') == null) {
            $this->session->set_flashdata('galat', 'Anda harus login dulu!');
            redirect('C_login');
        } else if ($this->session->userdata('profesi') == "Siswa") {
            redirect('C_dashboard_siswa');
        }

        $table = "tb_user";
        $param = array('id_user' => $this->session->userdata('idUser'));
        $data['user'] = $this->M_proyeku->getRecord($table, $param);

        $table = "tb_proyek_guru";
        $param = array('id_user' => $this->session->userdata('idUser'));
        $data['proyek'] = $this->M_proyeku->getJumlah($table, $param);

        $this->load->view('V_dashboard_guru', $data);
    }
}
?>