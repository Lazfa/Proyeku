<?php
$page = "Lihat Step";
include "V_header.php";
include "V_navbar.php";
?>
<h2 id="judulKonten" style="font-family: Cochin;">Kelompok: <?php echo $this->input->get('user'); ?></h2>
<hr class="invisible">

<div class="card border-success mb-3 float kiri" style="width: 79%; padding:inherit; padding-top:0.5cm;">
    <?php foreach ($hasil as $row) { ?>
        <h4 id="judulKonten" style="font-family: Cochin;" class="float kiri">Step:
            <?php if ($row->urutan_step == 0) {
                echo "Pertanyaan Mendasar";
            } else {
                echo $row->urutan_step;
            } ?></h4>
        <p id="judulKonten" style="font-family: Cochin;" class="float kanan">Waktu Pengumpulan: <?php echo $row->waktu_submit; ?></p>
        <textarea name="jawaban" id="" cols="30" rows="8" style="width: 100%;" readonly><?php echo $row->jawaban; ?></textarea>
        
        <hr class="invisible clear">
    <?php } ?>
</div>

<div class="card border-success mb-3 float kanan" style="width: 19%; padding:inherit; padding-top:0.5cm;" s>
    <h4 id="judulKonten" class="float kiri" style="font-family: Cochin;">Anggota Kelompok</h2>
        <hr>
        <?php foreach ($identitas as $row) { ?>
            <div style="margin-top: 0; margin-bottom:5pt;">
                <p>Nama: <?php echo $row->nama_anggota; ?> <br>
                    Nomor Induk: <?php echo $row->nomor_induk; ?> </p>
            </div>
        <?php } ?>
</div>

<?php include "V_footer.php"; ?>