<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_proyek_siswa extends CI_Controller{
    public function __construct()
    {
        parent :: __construct();
        $this->load->model('M_proyeku');
    }

    public function index()
    {
        redirect('C_proyek_siswa/show');
    }

    public function show()
    {
        if ($this->session->has_userdata('nama') == null) {
            $this->session->set_flashdata('galat', 'Anda harus login dulu!');
            redirect('C_login');
        } else if ($this->session->userdata('profesi') == "Guru") {
            redirect('C_dashboard_guru');
        }

        $id = $this->session->userdata('idUser');
        $table1 = "tb_siswa_proyek";
        $table2 = "tb_proyek_guru";
        $param = "tb_siswa_proyek.id_proyek = tb_proyek_guru.id_proyek";
        $con = "tb_siswa_proyek.id_siswa = '$id'";

        $data['result'] = $this->M_proyeku->getJoined($table1, $table2, $param, $con);

        $this->load->view('V_proyek_siswa', $data);
    }

    public function enrol(){
        if ($this->session->has_userdata('nama') == null) {
            $this->session->set_flashdata('galat', 'Anda harus login dulu!');
            redirect('C_login');
        } else if ($this->session->userdata('profesi') == "Guru") {
            redirect('C_dashboard_guru');
        }

        if ($this->input->post('kode')!= null){
            $kode = $this->input->post('kode');
            $data['kode'] = $kode;
        } else {
            $kode = 0;
            $data['kode'] = "";
        }

        $table1 = "tb_proyek_guru";
        $table2 = "tb_user";
        $param = "tb_proyek_guru.id_user = tb_user.id_user";
        $con = "tb_proyek_guru.kode_inv = '$kode'";

        $data['result'] = $this->M_proyeku->getJoined($table1, $table2, $param, $con);

        if ($this->input->post('kode') != null && $data['result'] == null){
            $this->session->set_flashdata('galat', 'Kode invitasi salah!');
        }

        $this->load->view('V_tambah_ps', $data);
    }

    public function enrol_response(){
        if ($this->input->post('batal')){
            redirect('C_proyek_siswa');
        }

        $id_siswa = $this->session->userdata('idUser');
        $id_proyek = $this->input->post('id_proyek');
        $step_selesai = 0;

        $table = 'tb_siswa_proyek';
        $value = array(
            'id_siswa_proyek' => uniqid(),
            'id_siswa' => $id_siswa,
            'id_proyek' => $id_proyek,
            'step_selesai' => $step_selesai
        );

        $this->M_proyeku->addRecord($table, $value);
        redirect('C_proyek_siswa');
    }

    public function unenroll($id_siswa_proyek){
        if ($this->session->has_userdata('nama') == null) {
            $this->session->set_flashdata('galat', 'Anda harus login dulu!');
            redirect('C_login');
        } else if ($this->session->userdata('profesi') == "Guru") {
            redirect('C_dashboard_guru');
        }

        $table = "tb_siswa_proyek";
        $param = array('id_siswa_proyek' => $id_siswa_proyek);
        $proyek = $this->M_proyeku->getRecord($table, $param);

        $table1 = "tb_proyek_guru";
        $table2 = "tb_user";
        $param = "tb_proyek_guru.id_user = tb_user.id_user";
        $con = "tb_proyek_guru.id_proyek = '$proyek->id_proyek'";

        $data['result'] = $this->M_proyeku->getJoined($table1, $table2, $param, $con);
        $data['id_siswa_proyek'] = $id_siswa_proyek;
        $this->load->view('V_hapus_ps', $data);
    }

    public function unenroll_response(){
        if ($this->input->post('batal') != null) {
            redirect('C_proyek_siswa');
        }

        $id_siswa_proyek = $this->input->post('id_siswa_proyek');
        $param = array('id_siswa_proyek' => $id_siswa_proyek);

        $table = 'tb_kerja_siswa';
        $this->M_proyeku->deleteRecord($table, $param);
        
        $table = 'tb_siswa_proyek';
        $this->M_proyeku->deleteRecord($table, $param);

        redirect('C_proyek_siswa');
    }

    public function pekerjaan($id_siswa_proyek, $jumlah_step){
        if ($this->session->has_userdata('nama') == null) {
            $this->session->set_flashdata('galat', 'Anda harus login dulu!');
            redirect('C_login');
        } else if ($this->session->userdata('profesi') == "Guru") {
            redirect('C_dashboard_guru');
        }

        $table = "tb_siswa_proyek";
        $param = array('id_siswa_proyek' => $id_siswa_proyek);
        $data['proyek'] = $this->M_proyeku->getRecord($table, $param);
        
        $table = "tb_proyek_guru";
        $param = array('id_proyek' => $data['proyek']->id_proyek);
        $data['detail'] = $this->M_proyeku->getRecord($table, $param);

        $table = "tb_kerja_siswa";
        $param = array('id_siswa_proyek' => $id_siswa_proyek);
        $data['kerja'] = $this->M_proyeku->getAllWhere($table, $param);
        
        if ($data['kerja'] == null){
            for ($i = 0; $i <= $jumlah_step; $i++){
                $value = array(
                    'id_detail_kerja' => uniqid(),
                    'id_siswa_proyek' => $id_siswa_proyek,
                    'urutan_step' => $i
                );
                $this->M_proyeku->addRecord($table, $value);
            }
            $data['kerja'] = $this->M_proyeku->getAllWhere($table, $param);
        }

        $this->load->view('V_pertanyaan_mendasar', $data);
    }

    public function kerja_response(){
        $step = $this->input->post('step');

        $table = "tb_kerja_siswa";
        $jawaban = $this->input->post('jawaban');
        $id_siswa_proyek = $this->input->post('id_siswa_proyek');
        $param = array(
            'id_siswa_proyek' => $id_siswa_proyek,
            'urutan_step' => $step
        );
        $value = array(
            "jawaban" => $jawaban,
            'waktu_submit' => date("Y-m-d H:i:s")
        );
        $this->M_proyeku->updateRecord($table, $param, $value);

        $table = "tb_siswa_proyek";
        $param = array(
            'id_siswa_proyek' => $id_siswa_proyek
        );
        $data['result'] = $this->M_proyeku->getRecord($table, $param);

        if ($data['result']->step_selesai <= $step){
            $value = array('step_selesai' => $step);
            $this->M_proyeku->updateRecord($table, $param, $value);
        }

        if ($step == 0){
            $jumlah_step = $this->input->post('jumlah_step');
            redirect("C_proyek_siswa/pekerjaan/$id_siswa_proyek/$jumlah_step");
        }
        redirect("C_proyek_siswa/kerja_step/$id_siswa_proyek/$step");
    }

    public function kerja_step($id_siswa_proyek, $step){
        if ($this->session->has_userdata('nama') == null) {
            $this->session->set_flashdata('galat', 'Anda harus login dulu!');
            redirect('C_login');
        } else if ($this->session->userdata('profesi') == "Guru") {
            redirect('C_dashboard_guru');
        }

        $table1 = "tb_siswa_proyek";
        $table2= "tb_kerja_siswa";
        $param = 'tb_siswa_proyek.id_siswa_proyek = tb_kerja_siswa.id_siswa_proyek';
        $con = "tb_siswa_proyek.id_siswa_proyek = '$id_siswa_proyek'";
        $data['siswa'] = $this->M_proyeku->getJoined($table1, $table2, $param, $con);
        $data['step'] = $step;

        $id_proyek = $data['siswa'][0]->id_proyek;
        $table1 = "tb_proyek_guru";
        $table2 = "tb_proyek_detail";
        $param = "tb_proyek_guru.id_proyek = tb_proyek_detail.id_proyek";
        $con = "tb_proyek_detail.id_proyek = '$id_proyek' AND tb_proyek_detail.urutan_step = '$step'";
        $data['proyek'] = $this->M_proyeku->getJoined($table1, $table2, $param, $con);

        $this->load->view('V_kerja_siswa', $data);
    }
}