<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?php echo base_url('C_dashboard_guru') ?>" style="font-family: Cochin; margin-top: 0pt; margin-bottom: 0pt;">Proyeku</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor02">
        <ul class="navbar-nav mr-auto float kiri">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('C_dashboard_siswa') ?>">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('C_proyek_siswa') ?>">Proyek</a>
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url("C_login/logout"); ?>" class="nav-link">Keluar</a>
            </li>
            <div class="nav-item float kanan">
            </div>
        </ul>

        <div class="float kanan" align=center>
            <h6 style="color: white;">Selamat Datang <br> <?php echo $this->session->userdata('nama'); ?></h6>
        </div>
        <div class="clear"></div>
    </div>

    <!-- <div class="float kanan">
        <p>foto user</p>
    </div> -->

</nav>

<body style="min-height: 100%;">
    <?php
    if (isset($bread)) {
        include "V_breadcrumb.php";
    } ?>
    <div class="jumbotron clearfix" style="min-height:100%;">