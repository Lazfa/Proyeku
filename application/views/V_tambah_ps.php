<?php
$page = "Tambah proyek";
include "V_header.php";
?>

<div class="jumbotron">
    <h2 id="judulKonten" style="font-family: Cochin;" align=center>Ikuti Proyek</h2>
    <?php if ($this->session->flashdata('galat') != null){
        echo '<div class="alert alert-dismissible alert-danger">';
        echo '    <button type="button" class="close" data-dismiss="alert">&times;</button>';
        echo '    <strong>Kode Invitasi tidak ditemukan!</strong> .';
        echo '</div>';

    } ?>

    <div class="jumbotron wadah" style="width: fit-content; margin-left:auto; margin-right:auto; margin-top:2cm; padding:1cm;">
        <?php if ($result == null) {
            echo form_open('C_proyek_siswa/enrol'); ?>
            <div class="form-group">
                <label for="kode">Kode Invitasi</label>
                <input type="text" class="form-control" placeholder="xxxxxxxxxx" name="kode" autofocus value="<?php echo $kode; ?>"> <br>
            </div>
            <input type='submit' class='btn btn-success' value='Oke' style='width:10cm;' />
        <?php } else {
            echo form_open('C_proyek_siswa/enrol_response');
        ?>
            <div>
                <input type="hidden" name="id_proyek" value="<?php echo $result[0]->id_proyek ?>">
                <label for="guru" style="font-family: Cambria; font-size:16pt">Nama Guru</label> <br>
                <input type="text" class="form-control" name="guru" disabled value="<?php echo $result[0]->username; ?>"> <br>
                <label for="judul" style="font-family: Cambria; font-size:16pt">Judul Proyek</label> <br>
                <input type="text" class="form-control" name="judul" disabled value="<?php echo $result[0]->judul_proyek; ?>"> <br>
                <label for="kelas" style="font-family: Cambria; font-size:16pt">Kelas</label> <br>
                <input type="text" class="form-control" name="kelas" disabled value="<?php echo $result[0]->kelas; ?>"> <br>
            </div>
            <div>
                <input type="submit" class="btn btn-success float kiri" value="Ikuti" name="oke" style="width:4.5cm; margin-right:1cm;" />
                <input type="submit" class="btn btn-danger float kanan" value="Batal" name="batal" style="width:4.5cm;" />
                <hr class="invisible clear">
            </div>
        <?php
        } ?>

    </div>
</div>

<?php include "V_footer.php"; ?>