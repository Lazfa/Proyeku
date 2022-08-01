<?php
$page = "Login";
include_once "V_header.php";
?>

<body>
    <div class="jumbotron" style="min-height: 100%">

        <header>
            <?php if ($this->session->has_userdata('galat') != null) { ?>
                <div class="alert alert-dismissible alert-danger" style="width:auto;">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><?php echo $this->session->userdata('galat'); ?></strong>
                </div>
            <?php } ?>

            <div id="brand">
                <h1 style="font-family: Cochin; font-size: 68pt; margin-top: 0pt; margin-bottom: 0pt;" align=center>Proyeku</h1>
                <h2 style="font-family: Cochin; font-size: 20pt; margin-top: 0pt; margin-bottom: 0pt ;" align=center>Project-Based Learning Platform</h2>
            </div>
        </header>

        <div>
            <div class="jumbotron wadah" style="width: fit-content; margin-left:auto; margin-right:auto; margin-top:2cm; padding:1cm;">
                <h3 style="font-family: Cambria; font-size:16pt" align=center>Masuk</h3>

                <?php echo validation_errors();
                echo form_open('C_Login/login'); ?>
                
                <label for="user" style="font-family: Cambria; font-size:16pt">Username</label> <br>
                <input type="text" class="form-control" name="user" autofocus> <br>
                <label for="pass" style="font-family: Cambria; font-size:16pt">Password</label> <br>
                <input type="password" class="form-control" name="pass"> <br>

                <div style="width: 70%; margin: auto;">
                    <div class="custom-control custom-radio float kiri">
                        <input type="radio" id="customRadio1" name="profesi" class="custom-control-input" checked="" value="Guru" <?php echo set_radio('profesi', 'Guru'); ?>>
                        <label class="custom-control-label" for="customRadio1" style="font-family: Cambria; font-size:16pt">Guru</label>
                    </div>
                    <div class="custom-control custom-radio float kanan">
                        <input type="radio" id="customRadio2" name="profesi" class="custom-control-input" value="Siswa" <?php echo set_radio('profesi', 'Siswa'); ?>>
                        <label class="custom-control-label" for="customRadio2" style="font-family: Cambria; font-size:16pt">Siswa</label>
                    </div>
                    <hr class="invisible" id="clear">
                </div>

                <input type="submit" class="btn btn-success" value="Masuk" style="width:10cm;" />
                <hr class="invisible">

                <?php
                if ($this->session->has_userdata('salah')) { ?>
                    <p align=center style="color: red">Username atau Password salah!</p>
                <?php }
                ?>
                <div id="tautan">
                    <a href=<?php echo base_url("C_Login/daftar") ?> style="font-style: italic;">Belum punya akun?</a>
                </div>

            </div>
        </div>

        <?php include "V_footer.php" ?>