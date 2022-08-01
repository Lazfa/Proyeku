<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_proyek_guru extends CI_Controller{
    public function __construct()
    {
        parent :: __construct();
        $this->load->model('M_proyeku');
        $this->load->library('pagination');
    }

    public function index()
    {
        redirect('C_proyek_guru/show');
    }

    public function show($dari = 0){
        if ($this->session->has_userdata('nama') == null) {
            $this->session->set_flashdata('galat', 'Anda harus login dulu!');
            redirect('C_login');
        } else if ($this->session->userdata('profesi') == "Siswa") {
            redirect('C_dashboard_siswa');
        }

        $table = "tb_proyek_guru";
        $param = array('id_user' => $this->session->userdata('idUser'));
        $jumlah = $this->M_proyeku->getJumlah($table, $param);
        $limit = 5;

        $config['base_url'] = base_url('C_proyek_guru/show');
        $config['total_rows'] = $jumlah ;
        $config['per_page'] = $limit;
        
        $data['result'] = $this->M_proyeku->getLimited($table, $limit, $dari, $param);

        $this->pagination->initialize($config);
        $this->load->view('V_proyek_guru', $data);
    }

    public function tambah(){
        if ($this->session->has_userdata('nama') == null) {
            $this->session->set_flashdata('galat', 'Anda harus login dulu!');
            redirect('C_login');
        } else if ($this->session->userdata('profesi') == "Siswa") {
            redirect('C_dashboard_siswa');
        }
        $this->load->view('V_tambah_pg');
    }

    public function tambahResponse(){
        $this->form_validation->set_rules('judul_proyek', 'Judul Proyek', 'trim|required');
        $this->form_validation->set_rules('jumlah_step', 'Jumlah Step', 'trim|required|less_than[11]|greater_than[0]');
        $this->form_validation->set_rules('kelas', 'Kelas', 'trim|required');
        $this->form_validation->set_rules('kode_inv', 'Kode Invitasi', 'trim|required|min_length[0]|max_length[11]|is_unique[tb_proyek_guru.kode_inv]',
            array('is_unique' => 'Kode invitasi sudah digunakan!'));
        
        if ($this->input->post('batal') != null){
            redirect('C_proyek_guru');
        }
        
        if ($this->form_validation->run() == false){
            $this->load->view('V_tambah_pg');

        } else {
            $id_proyek = uniqid();
            $id_user = $this->session->userdata('idUser');
            $judul_proyek = $this->input->post('judul_proyek');
            $jumlah_step = $this->input->post('jumlah_step');
            $kelas = $this->input->post('kelas');
            $created_at = date("Y-m-d H:i:s");
            $kode_inv = $this->input->post('kode_inv');

            $table = "tb_proyek_guru";
            $value = array(
                'id_proyek' => $id_proyek,
                'id_user' => $id_user,
                'judul_proyek' => $judul_proyek,
                'jumlah_step' => $jumlah_step,
                'kelas' => $kelas,
                'created_at' => $created_at,
                'kode_inv' => $kode_inv
            );

            $this->M_proyeku->addRecord($table, $value);
            redirect('C_proyek_guru');
        }
    }

    public function ubah($id){
        if ($this->session->has_userdata('nama') == null) {
            $this->session->set_flashdata('galat', 'Anda harus login dulu!');
            redirect('C_login');
        } else if ($this->session->userdata('profesi') == "Siswa") {
            redirect('C_dashboard_siswa');
        }
        
        $table = "tb_proyek_guru";
        $param = array('id_proyek' => $id);

        $data['result'] = $this->M_proyeku->getRecord($table, $param);
        $this->load->view('V_edit_pg', $data);
    }

    public function ubah_response(){
        if ($this->input->post('batal') != null){
            redirect('C_proyek_guru');
        }

        $id_proyek = $this->input->post('id_proyek');
        $judul_proyek = $this->input->post('judul_proyek');
        $jumlah_step = $this->input->post('jumlah_step');
        $kelas = $this->input->post('kelas');
        $kode_inv = $this->input->post('kode_inv');

        $table = "tb_proyek_guru";
        $param = array('id_proyek' => $id_proyek);
        $value = array(
            'judul_proyek' => $judul_proyek,
            'jumlah_step' => $jumlah_step,
            'kelas' => $kelas,
            'kode_inv' => $kode_inv
        );
        $this->M_proyeku->updateRecord($table, $param, $value);
        redirect('C_proyek_guru');
    }
    
    public function hapus($id){
        if ($this->session->has_userdata('nama') == null) {
            $this->session->set_flashdata('galat', 'Anda harus login dulu!');
            redirect('C_login');
        } else if ($this->session->userdata('profesi') == "Siswa") {
            redirect('C_dashboard_siswa');
        }

        $table = "tb_proyek_guru";
        $param = array('id_proyek' => $id);

        $data['result'] = $this->M_proyeku->getRecord($table, $param);
        $this->load->view('V_hapus_pg', $data);
    }

    public function hapus_response(){
        if ($this->input->post('batal') != null) {
            redirect('C_proyek_guru');
        }

        $id_proyek = $this->input->post('id_proyek');
        $param = array('id_proyek' => $id_proyek);
        
        $table = 'tb_proyek_detail';
        $this->M_proyeku->deleteRecord($table, $param);
        $table = 'tb_proyek_guru';
        $this->M_proyeku->deleteRecord($table, $param);
        
        redirect('C_proyek_guru');
    }

    public function tampil($id){
        if ($this->session->has_userdata('nama') == null) {
            $this->session->set_flashdata('galat', 'Anda harus login dulu!');
            redirect('C_login');
        } else if ($this->session->userdata('profesi') == "Siswa") {
            redirect('C_dashboard_siswa');
        }

        $table1 = "tb_proyek_guru";
        $table2 = "tb_proyek_detail";
        $param = "tb_proyek_guru.id_proyek = tb_proyek_detail.id_proyek";
        $con = "tb_proyek_guru.id_proyek = '$id'";
        
        $data['result'] = $this->M_proyeku->getJoined($table1, $table2, $param, $con);
        if ($data['result'] == null){
            redirect('C_proyek_guru/edit/'.$id);
        } else {
            $this->load->view('V_detail_pg', $data);
        }
    }

    public function edit($id){
        if ($this->session->has_userdata('nama') == null) {
            $this->session->set_flashdata('galat', 'Anda harus login dulu!');
            redirect('C_login');
        } else if ($this->session->userdata('profesi') == "Siswa") {
            redirect('C_dashboard_siswa');
        }

        $table1 = "tb_proyek_guru";
        $table2 = "tb_proyek_detail";
        $param = "tb_proyek_guru.id_proyek = tb_proyek_detail.id_proyek";
        $con = "tb_proyek_guru.id_proyek = '$id'";

        $data['result'] = $this->M_proyeku->getJoined($table1, $table2, $param, $con);
        if ($data['result'] == null){
            $args = array('id_proyek' => $id);
            $data["result"] = $this->M_proyeku->getAllWhere($table1, $args);
            
            for ($i = 1; $i <= $data['result'][0]->jumlah_step; $i++){
                $value = array(
                    'id_detail_proyek' => uniqid(),
                    'id_proyek' => $data['result'][0]->id_proyek,
                    'urutan_step' => $i,
                );
                $this->M_proyeku->addRecord($table2, $value);
            }
            $data['result'] = $this->M_proyeku->getJoined($table1, $table2, $param, $con);
            $this->load->view('V_edit_detail_pg', $data);
        } else {
            $this->load->view('V_edit_detail_pg', $data);
        }
    }

    public function edit_detail_response(){
        $id_proyek = $this->input->post('id_proyek');
        $pertanyaan_awal = $this->input->post('pertanyaan_awal');
        $jawaban_pertanyaan = $this->input->post('jawaban_pertanyaan');
        $jumlah_step = $this->input->post('jumlah_step');

        if ($this->input->post('batal') != null){
            redirect('C_proyek_guru/tampil/'.$id_proyek);
        }
        
        $table = "tb_proyek_guru";
        $param = array('id_proyek' => $id_proyek);
        $value = array(
            'pertanyaan_awal' => $pertanyaan_awal,
            'jawaban_pertanyaan' => $jawaban_pertanyaan
        );
        $this->M_proyeku->updateRecord($table, $param, $value);

        $table = "tb_proyek_detail";
        for ($i = 1; $i <= $jumlah_step; $i++){
            $desc = $this->input->post($i.'_desc');
            $date = $this->input->post($i.'_date');

            $param = array(
                'id_proyek' => $id_proyek,
                'urutan_step' => $i
            );
            $value = array(
                'deskripsi' => $desc,
                'jangka_waktu' => $date
            );
            $this->M_proyeku->updateRecord($table, $param, $value);
        }
        
        $this->session->set_flashdata('sukses', 'Data berhasil disimpan!');
        redirect('C_proyek_guru/tampil/'.$id_proyek);
    }

    public function show_step($id_proyek){
        if ($this->session->has_userdata('nama') == null) {
            $this->session->set_flashdata('galat', 'Anda harus login dulu!');
            redirect('C_login');
        } else if ($this->session->userdata('profesi') == "Siswa") {
            redirect('C_dashboard_siswa');
        }

        $table1 = "tb_siswa_proyek";
        $table2 = "tb_user";
        $param = "tb_user.id_user = tb_siswa_proyek.id_siswa";
        $con = "tb_siswa_proyek.id_proyek = '$id_proyek'";

        $data['result'] = $this->M_proyeku->getJoined($table1, $table2, $param, $con);
        $data['id_proyek'] = $id_proyek;
        
        $this->load->view('V_step_pg', $data);
    }

    public function show_kerja($id_siswa_proyek){
        if ($this->session->has_userdata('nama') == null) {
            $this->session->set_flashdata('galat', 'Anda harus login dulu!');
            redirect('C_login');
        } else if ($this->session->userdata('profesi') == "Siswa") {
            redirect('C_dashboard_siswa');
        }
        
        $table = "tb_kerja_siswa";
        $param = array('id_siswa_proyek' => $id_siswa_proyek);
        $data['hasil'] = $this->M_proyeku->getAllWhere($table, $param);

        $table1 = "tb_siswa_proyek";
        $table2 = "tb_anggota_kelompok";
        $param = "tb_siswa_proyek.id_siswa = tb_anggota_kelompok.id_user";
        $con = "tb_siswa_proyek.id_siswa_proyek = '$id_siswa_proyek'";
        $data['identitas'] = $this->M_proyeku->getJoined($table1, $table2, $param, $con);

        $this->load->view('V_hasil_ks', $data);
    }

    public function hasil_kerja($id_proyek, $step){
        if ($this->session->has_userdata('nama') == null) {
            $this->session->set_flashdata('galat', 'Anda harus login dulu!');
            redirect('C_login');
        } else if ($this->session->userdata('profesi') == "Siswa") {
            redirect('C_dashboard_siswa');
        }

        $table = "tb_siswa_proyek";
        // $param = array('id_siswa_proyek' => $)
    }
}