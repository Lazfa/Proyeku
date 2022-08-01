<?php
$page = "Proyek";
$bread = array(
    "Proyek" => "C_proyek_siswa/show",
    "Detail" => 'C_proyek_siswa/pekerjaan/' . $siswa[0]->id_siswa_proyek . '/' . $proyek[0]->jumlah_step
);
include "V_header.php";
include "V_navbar_siswa.php";
?>

<h2 id="judulKonten" class="float kiri" style="font-family: Cochin;"><?php echo $proyek[0]->judul_proyek; ?></h2>
<hr class="clear">
<h4 id="judulKonten" class="float kiri" style="font-family: Cochin;">Step <?php echo $step; ?></h2>
<h4 id="deadline" class="float kanan" style="font-family: Cochin; margin-right:22%;">Tenggat Waktu: <?php echo $proyek[0]->jangka_waktu; ?></h2>
    <hr class="invisible clear">

    <div class="card border-success mb-3 float kiri" style="width: 79%; padding:inherit; padding-top:0.5cm;">
        <h4 id="judulKonten" class="float kiri" style="font-family: Cochin;">Deskripsi Step <?php echo $step; ?></h2>

            <div class="card border-secondary mb-3" style="max-width: auto;">
                <div class="card-body">
                    <p class="card-text"><?php echo $proyek[0]->deskripsi; ?>.</p>
                </div>
            </div>
            
        <h4 id="judulKonten" class="float kiri" style="font-family: Cochin;">Jawaban</h2>
        <?php echo form_open('C_proyek_siswa/kerja_response'); ?>
        <input type="hidden" name="id_siswa_proyek" value="<?php echo $siswa[0]->id_siswa_proyek; ?>">
        <input type="hidden" name="step" value="<?php echo $step; ?>">
        <textarea name="jawaban" id="jawaban" cols="20" rows="8" style="width: 100%"><?php echo $siswa[$step]->jawaban; ?></textarea>
        <hr class="invisible">
        <div>
            <input type="submit" class="btn btn-success float kiri" value="Simpan" style="width:10cm; margin-right:1cm;" />
            <!-- <div class="form-group float kanan">
                <?php echo form_open_multipart('upload/do_upload'); ?>
                <div>
                    <input type="file" class="form-control-file float kiri" id="exampleInputFile" aria-describedby="fileHelp" name="file" style="width: 69%;">
                    <small id="fileHelp" class="form-text text-muted float kiri">Size max 20MB.</small>
                </div>
                <input type="submit" class="btn btn-success float kanan" value="upload" style="width:19%; margin-right:1cm;" />
            </div> -->

        </div>
    </div>

    <div class="card border-success mb-3 float kanan" style="width: 19%; padding:inherit; padding-top:0.5cm;" s>
        <h4 id="judulKonten" class="float kiri" style="font-family: Cochin;">Navigasi</h2>
            <?php for ($i = 0; $i <= $proyek[0]->jumlah_step; $i++) {
                if ($i == 0) { ?>
                    <a href="<?php echo base_url('C_proyek_siswa/pekerjaan/') . $siswa[0]->id_siswa_proyek . "/" . $proyek[0]->jumlah_step; ?>">
                    <button type='button' style='margin-top: 10pt; width:100%;' class='btn btn-success float kanan'>
            <?php } else if ($siswa[$i - 1]->jawaban != null) { ?>
                <a href="<?php echo base_url('C_proyek_siswa/kerja_step/') . $siswa[0]->id_siswa_proyek . "/" . $i ?>">
                    <button type='button' style='margin-top: 10pt; width:100%;' class='btn btn-success float kanan'>
                <?php } else { ?>
                    <a href="<?php echo base_url('C_proyek_siswa/kerja_step/') . $siswa[0]->id_siswa_proyek . "/" . $i ?>">
                        <button type='button' style='margin-top: 10pt; width:100%;' class='btn btn-secondary float kanan' disabled>
                        <?php }
                    if ($i == 0) {
                        echo "Pertanyaan Mendasar";
                    } else {
                        echo "Step " . $i;
                    } ?> </button></a>
                <?php } ?>
    </div>
    <?php include "V_footer.php"; ?>