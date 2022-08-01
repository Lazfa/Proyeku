<?php
$page = "Daftar";
include_once "V_header.php";

if ($this->session->has_userdata('status')) {
}
?>

<header>
    <div id="brand">
        <h1 style="font-family: Cochin; font-size: 68pt; margin-top: 0pt; margin-bottom: 0pt;" align=center>Proyeku</h1>
        <h2 style="font-family: Cochin; font-size: 20pt; margin-top: 0pt; margin-bottom: 0pt ;" align=center>Project-Based Learning Platform</h2>
    </div>
</header>

<div class="">
    <div class="jumbotron wadah" style="width: fit-content; margin-left:auto; margin-right:auto; margin-top:2cm; padding:1cm;">
        <h3 style="font-family: Cambria; font-size:16pt" align=center>Daftar Baru</h3>
        <?php echo form_open('C_login/daftar_response'); ?>

        <label for="user" style="font-family: Cambria; font-size:16pt">Username</label> <br>
        <?php echo form_error('user'); ?>
        <small id="userHelp" class="form-text text-muted">Minimal 6 karakter</small>
        <input type="text" class="form-control" name="user" autofocus required value="<?php echo set_value('user') ?>"> <br>
        <label for="email" style="font-family: Cambria; font-size:16pt">E-mail</label> <br>
        <?php echo form_error('email'); ?>
        <input type="email" class="form-control" name="email" autofocus required value="<?php echo set_value('email') ?>"> <br>
        <label for="instansi" style="font-family: Cambria; font-size:16pt">Instansi</label> <br>
        <?php echo form_error('instansi'); ?>
        <input type="text" class="form-control" name="instansi" autofocus required value="<?php echo set_value('instansi') ?>"> <br>
        <label for="pass" style="font-family: Cambria; font-size:16pt">Password</label> <br>
        <?php echo form_error('pass'); ?>
        <input type="password" class="form-control" name="pass" required> <br>
        <label for="passconf" style="font-family: Cambria; font-size:16pt">Password Confirmation</label> <br>
        <?php echo form_error('passconf'); ?>
        <input type="password" class="form-control" name="passconf" required> <br>

        <div style="width: 70%; margin: auto; margin-bottom:40pt;">
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
        
        <input type="submit" class="btn btn-success" value="Daftar" style="width:10cm;" />
        <hr class="invisible">

        <div id="tautan">
            <a href=<?php echo base_url("C_login") ?> style="font-style: italic;">Sudah punya akun?</a>
        </div>
    </div>
</div>

<?php include "V_footer.php" ?>