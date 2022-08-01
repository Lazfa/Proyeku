<?php
$page = "Tambah Proyek";
include "V_header.php";
include "V_navbar.php";
?>
<h2 id="judulKonten" style="font-family: Cochin;">Hapus Proyek</h2>
<hr class="invisible">

<div class="card border-success mb-3" style="max-width: auto; margin: auto; padding: inherit;">
    <?php echo form_open('C_proyek_guru/hapus_response'); ?>
    <input type="hidden" name="id_proyek" value="<?php echo $result->id_proyek; ?>">

    <div class="form-group">
        <label for="judul_proyek">Judul Proyek</label>
        <?php echo form_error('judul_proyek'); ?>
        <input type="text" class="form-control" id="judul_proyek" name="judul_proyek" disabled value="<?php echo $result->judul_proyek; ?>">
    </div>
    <div class="form-group">
        <label for="jumlah_step">Jumlah Step</label>
        <?php echo form_error('jumlah_step'); ?>
        <input type="number" class="form-control" id="jumlah_step" name="jumlah_step" max="10" min="1" value="<?php echo $result->jumlah_step; ?>" disabled>
        <small id="step_help" class="form-text text-muted">Minimal 1 step dan maksimal 10 step.</small>
    </div>
    <div class="form-group">
        <label for="kelas">Kelas</label>
        <?php echo form_error('kelas'); ?>
        <input type="text" class="form-control" id="kelas" name="kelas" value="<?php echo $result->kelas; ?>" disabled>
    </div>
    <div class="form-group">
        <label for="kelas">Kode Invitasi</label>
        <?php echo form_error('kode_inv'); ?>
        <input type="text" class="form-control" id="kode_inv" name="kode_inv" value="<?php echo $result->kode_inv; ?>" disabled>
        <small id="kode_inv_help" class="form-text text-muted">Kode invitasi digunakan siswa untuk mengikuti proyek, max. 10 alphanumeric.</small>
    </div>
    
    <label for="submit" class="float kanan" style="margin-right:3.5cm;">Yakin akan menghapus?</label><p class="clear"></p>
    <div class="float kanan" style="width: fit-content;">
        <input type="submit" class="btn btn-success float kiri" value="Hapus" name="oke" style="width:6cm; margin:auto;" />
        <p class="float kiri">&nbsp;&nbsp;</p>
        <input type="submit" class="btn btn-danger float kiri" value="Batal..." name="batal" style="width:6cm; margin:auto;" />
    </div>
    <hr class="clear invisible">
</div>

<?php include "V_footer.php"; ?>