<?php
$page = "Edit Detail Proyek";
$bread = array(
    "Proyek" => "C_proyek_guru/show",
    "Detail" => 'C_proyek_guru/tampil/' . $result[0]->id_proyek,
    'Edit' => 'C_proyek_guru/tampil/' . $result[0]->id_proyek
);
include "V_header.php";
include "V_navbar.php";
?>
<h2 id="judulKonten" style="font-family: Cochin;">Edit Detail Proyek</h2>

<div>
    <div>
        <label for="">Judul Proyek: <?php echo $result[0]->judul_proyek; ?></label> <br>
        <label for="">Kelas: <?php echo $result[0]->kelas; ?></label> <br>
        <label for="">Kode Invitasi: <?php echo $result[0]->kode_inv; ?></label>
        <hr>
    </div>
    <?php echo form_open('C_proyek_guru/edit_detail_response'); ?>
    <input type="hidden" name="id_proyek" value="<?php echo $result[0]->id_proyek; ?>">
    <input type="hidden" name="jumlah_step" value="<?php echo $result[0]->jumlah_step; ?>">

    <div class="float kiri" style="width: 39%; margin-right:2%;">
        <div class="form-group">
            <label for="pertanyaan_awal">Pertanyaan Mendasar</label>
            <textarea class="form-control" id="pertanyaan_awal" name="pertanyaan_awal" rows="7" placeholder=""> <?php echo $result[0]->pertanyaan_awal; ?></textarea>
        </div>

        <div class="form-group">
            <label for="jawaban_pertanyaan">Jawaban Pertanyaan Mendasar</label>
            <textarea class="form-control" id="Jawaban Pertanyaan Mendasar" name="jawaban_pertanyaan" rows="7" placeholder=""><?php echo $result[0]->jawaban_pertanyaan; ?></textarea>
        </div>
    </div>

    <div class="float kanan" style="width: 59%;">
        <?php for ($i = 1; $i <= $result[0]->jumlah_step; $i++) { ?>
            <div class="float kiri" style="width:69%; margin:0pt;">
                <label for="<?php echo $i; ?>_desc">Step <?php echo $i; ?> - Deskripsi/Pertanyaan</label>
                <textarea class="form-control" name="<?php echo $i; ?>_desc" rows="3" placeholder=""><?php echo $result[$i - 1]->deskripsi ?></textarea>
            </div>
            <div style="width:2%;"></div>
            <div class="float kanan" style="width: 29%; margin:0pt;">
                <label for="<?php echo $i; ?>_date">Deadline Pengerjaan</label>
                <input type="date" class="form-control" name="<?php echo $i; ?>_date" id="<?php echo $i; ?>_date" value="<?php echo $result[$i - 1]->jangka_waktu; ?>">
            </div>
            <hr class="invisible clear">
        <?php } ?>
    </div>

    <hr class="invisible clear">
    <div class="float kanan" style="width: fit-content;">
        <input type="submit" class="btn btn-success float kiri" value="Simpan!" name="oke" style="width:6cm; margin:auto;" />
        <p class="float kiri">&nbsp;&nbsp;</p>
        <input type="submit" class="btn btn-danger float kiri" value="Batal..." name="batal" style="width:6cm; margin:auto;" />
    </div>
</div>
<?php include "V_footer.php"; ?>