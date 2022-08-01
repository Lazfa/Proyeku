<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_dashboard_siswa extends CI_Controller
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
        } else if ($this->session->userdata('profesi') == "Guru") {
            redirect('C_dashboard_guru');
        }

        $table = "tb_anggota_kelompok";
        $param = array("id_user" => $this->session->userdata('idUser'));
        
        if ($this->M_proyeku->getRecord($table, $param) == null){
            $this->load->view("V_tambah_anggota");
        } else {
            $table = "tb_user";
            $param = array('id_user' => $this->session->userdata('idUser'));
            $data['user'] = $this->M_proyeku->getRecord($table, $param);
    
            $table = "tb_siswa_proyek";
            $param = array('id_siswa' => $this->session->userdata('idUser'));
            $data['proyek'] = $this->M_proyeku->getJumlah($table, $param);
            
            $this->load->view('V_dashboard_siswa', $data);
        }
    }

    public function jumlah_anggota(){
        $data['jumlah'] = $this->input->post('jumlah');
        $this->load->view('V_tambah_anggota', $data);
    }

    public function tambah_anggota($jumlah){
        $table = "tb_anggota_kelompok";
        $id_user = $this->session->userdata('idUser');

        for ($i = 1; $i <= $jumlah; $i++){
            $nama_anggota = $this->input->post('siswa_'. $i);
            $nomor_induk = $this->input->post('nomor_'. $i);

            $value = array(
                'id_user' => $id_user,
                'nama_anggota' => $nama_anggota,
                'nomor_induk' => $nomor_induk
            );
            
            $this->M_proyeku->addRecord($table, $value);
        }

        redirect('C_dashboard_siswa');
    }
}
?>