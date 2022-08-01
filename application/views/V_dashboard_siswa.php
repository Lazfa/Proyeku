<?php
$page = "Dashboard";
include_once "V_header.php";
include_once "V_navbar_siswa.php";
?>

<!-- <div class="jumbotron"> -->
<div class="card border-success mb-3" style="max-width: auto;">
    <div class="card-header">Selamat Datang!</div>
    <div class="card-body">
        <h4 class="card-title">Selamat Datang di Website Proyeku!</h4>
        <p class="card-text">Proyeku merupakan sebuah aplikasi berbasis web yang dapat digunakan untuk
            melakukan monitoring antara guru dan murid dalam pembelajaran dengan model Project Based Learning
            (PjBL).
        </p>
    </div>
</div>

<div class="card border-success mb-3 float kiri" style="width: 32%;">
    <div class="card-header">Hai <?php echo $this->session->userdata('nama') ?>!</div>
    <div class="card-body">
        <h4 class="card-title">Biodata</h4>
        <p class="card-text">Email: <?php echo $user->email; ?> <br>Instansi: <?php echo $user->instansi; ?></p>
    </div>
</div>

<p class="float kiri" style="width: 2%;">&nbsp;</p>

<div class="card border-success mb-3 float kiri" style="width: 32%;">
    <div class="card-header">Statistik Proyek</div>
    <div class="card-body">
        <h4 class="card-title">Proyek sejauh ini</h4>
        <p class="card-text">Proyek diikuti: <?php echo $proyek; ?></p>
    </div>
</div>

<p class="float kiri" style="width: 2%;">&nbsp;</p>

<div class="card border-success mb-3 float kiri" style="width: 32%;">
    <div class="card-header">Pengumuman</div>
    <div class="card-body">
        <h4 class="card-title">Launching Proyeku</h4>
        <p class="card-text">Proyeku akan launching pada tanggal 21 Juni 2020.</p>
    </div>
</div>

<hr class="invisible clear">
<!-- </div> -->

<? include "V_footer.php"; ?>