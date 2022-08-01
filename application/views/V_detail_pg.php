<?php
$page = "Detail Proyek";
$bread = array(
    "Proyek" => "C_proyek_guru/show",
    "Detail" => 'C_proyek_guru/tampil/' . $result[0]->id_proyek
);
include "V_header.php";
include "V_navbar.php";
?>
<h2 id="judulKonten" style="font-family: Cochin;">Detail Proyek</h2>

<div>
    <div class="float kiri">
        <label for="">Judul Proyek: <?php echo $result[0]->judul_proyek; ?></label> <br>
        <label for="">Kelas: <?php echo $result[0]->kelas; ?></label> <br>
        <label for="">Kode Invitasi: <?php echo $result[0]->kode_inv; ?></label>
    </div>
    <div class="float kanan">
        <a href="<?php echo base_url('C_proyek_guru/edit') . '/' . $result[0]->id_proyek; ?>">
            <button type="button" class="btn btn-warning">Edit</button></a>
    </div>
    <div class="float kanan" style="margin-right: 5pt;">
        <a href="<?php echo base_url('C_proyek_guru/show_step') . '/' . $result[0]->id_proyek . "?s=" . $result[0]->jumlah_step; ?>">
            <button type="button" class="btn btn-success">Lihat Progres Siswa</button></a>
    </div>
    <hr class="clear">

    <?php echo form_open('C_proyek_guru/edit_detail_response'); ?>
    <input type="hidden" name="id_proyek" value="<?php echo $result[0]->id_proyek; ?>">
    <input type="hidden" name="jumlah_step" value="<?php echo $result[0]->jumlah_step; ?>">

    <div class="float kiri" style="width: 39%; margin-right:2%;">
        <div class="form-group">
            <label for="pertanyaan_awal">Pertanyaan Mendasar</label>
            <textarea class="form-control" id="pertanyaan_awal" name="pertanyaan_awal" rows="7" placeholder="" readonly> <?php echo $result[0]->pertanyaan_awal; ?></textarea>
        </div>

        <div class="form-group">
            <label for="jawaban_pertanyaan">Jawaban Pertanyaan Mendasar</label>
            <textarea class="form-control" id="Jawaban Pertanyaan Mendasar" name="jawaban_pertanyaan" rows="7" placeholder="" readonly><?php echo $result[0]->jawaban_pertanyaan; ?></textarea>
        </div>
    </div>

    <div class="float kanan" style="width: 59%;">
        <?php for ($i = 1; $i <= $result[0]->jumlah_step; $i++) { ?>
            <div class="float kiri" style="width:69%; margin:0pt;">
                <label for="<?php echo $i; ?>_desc">Step <?php echo $i; ?> - Deskripsi/Pertanyaan</label>
                <textarea class="form-control" name="<?php echo $i; ?>_desc" rows="3" placeholder="" readonly><?php echo $result[$i - 1]->deskripsi ?></textarea>
            </div>

            <div style="width:2%;"></div>

            <div class="float kanan" style="width: 29%; margin:0pt;">
                <label for="<?php echo $i; ?>_date">Deadline Pengerjaan</label>
                <input type="date" class="form-control" name="<?php echo $i; ?>_date" id="<?php echo $i; ?>_date" value="<?php echo $result[$i - 1]->jangka_waktu; ?>" readonly>
            </div>

            <hr class="invisible clear">
        <?php } ?>
    </div>

    <hr class="invisible clear">
</div>
<?php include "V_footer.php"; ?>