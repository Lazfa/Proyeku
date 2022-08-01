<?php
$page = "Proyek";
$bread = array(
    "Proyek" => "C_proyek_siswa/show",
    "Detail" => 'C_proyek_siswa/pekerjaan/' . $proyek->id_siswa_proyek . '/' .$detail->jumlah_step
);
include "V_header.php";
include "V_navbar_siswa.php";
?>

<h2 id="judulKonten" class="float kiri" style="font-family: Cochin;"><?php echo $detail->judul_proyek ?></h2>
<hr class="clear">
<h4 id="judulKonten" class="float kiri" style="font-family: Cochin;">Pertanyaan Mendasar</h2>
    <hr class="invisible clear">

    <div class="card border-success mb-3 float kiri" style="width: 79%; padding:inherit; padding-top:0.5cm;">
        <h4 id="judulKonten" class="float kiri" style="font-family: Cochin;">Pertanyaan</h2>

            <div class="card border-secondary mb-3" style="max-width: auto;">
                <div class="card-body">
                    <p class="card-text"><?php echo $detail->pertanyaan_awal; ?>.</p>
                </div>
            </div>

            <h4 id="judulKonten" class="float kiri" style="font-family: Cochin;">Jawaban</h2>
                <?php echo form_open('C_proyek_siswa/kerja_response'); ?>
                <input type="hidden" name="id_siswa_proyek" value="<?php echo $proyek->id_siswa_proyek; ?>">
                <input type="hidden" name="step" value="0">
                <input type="hidden" name="jumlah_step" value="<?php echo $detail->jumlah_step; ?>">
                <textarea name="jawaban" id="jawaban" cols="20" rows="8" style="width: 100%"><?php echo $kerja[0]->jawaban; ?></textarea>
                <hr class="invisible">
                <input type="submit" class="btn btn-success float kiri" value="Simpan" style="width:10cm; margin-right:1cm;" />
    </div>

    <div class="card border-success mb-3 float kanan" style="width: 19%; padding:inherit; padding-top:0.5cm;">
        <h4 id="judulKonten" class="float kiri" style="font-family: Cochin;">Navigasi</h2>
            <?php for ($i = 0; $i <= $detail->jumlah_step; $i++) {
                if ($i == 0) { ?>
                    <a href="<?php echo base_url('C_proyek_siswa/pekerjaan/') . $proyek->id_siswa_proyek . "/" . $detail->jumlah_step; ?>">
                    <button type='button' style='margin-top: 10pt; width:100%;' class='btn btn-success float kanan'>
            <?php } else if ($kerja[$i - 1]->jawaban != null) { ?>
                <a href="<?php echo base_url('C_proyek_siswa/kerja_step/') . $proyek->id_siswa_proyek . "/" . $i ?>">
                    <button type='button' style='margin-top: 10pt; width:100%;' class='btn btn-success float kanan'>
                <?php } else { ?>
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