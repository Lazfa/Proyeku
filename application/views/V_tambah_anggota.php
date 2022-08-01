<?php
$page = "Tambah anggota";
include "V_header.php";
?>

<div class="jumbotron">
    <h2 id="judulKonten" style="font-family: Cochin;" align=center>Tuliskan Anggota Kelompok!</h2>

    <div class="jumbotron wadah" style="width: fit-content; margin-left:auto; margin-right:auto; margin-top:2cm; padding:1cm;">
        <?php if (!isset($jumlah)) {
            echo form_open('C_dashboard_siswa/jumlah_anggota'); ?>
            <div class="form-group">
                <label for="jumlah">Jumlah Anggota Kelompok</label>
                <select class="form-control" id="exampleSelect1" name="jumlah">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                </select>
            </div>

            <?php } else {
            echo form_open('C_dashboard_siswa/tambah_anggota/'.$jumlah);
            for ($i = 1; $i <= $jumlah; $i++) { ?>
                <div>
                    <label for="siswa<?php echo $i; ?>" style="font-family: Cambria; font-size:16pt">Anggota <?php echo $i; ?></label> <br>
                    <input type="text" class="form-control" placeholder="Nama" name="siswa <?php echo $i; ?>" autofocus> <br>
                    <input type="text" class="form-control" placeholder="Nomor Induk" name="nomor <?php echo $i; ?>" autofocus> <br>
                </div>
        <?php }
        } ?>
        <input type="submit" class="btn btn-success" value="Oke" style="width:10cm;" />

    </div>
</div>

<?php include "V_footer.php"; ?>