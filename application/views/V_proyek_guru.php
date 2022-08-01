<?php
$page = "Proyek";
include "V_header.php";
include_once "V_navbar.php";
?>

<h2 id="judulKonten" class="float kiri" style="font-family: Cochin;">Daftar Proyek</h2>
<a href="<?php echo base_url('C_proyek_guru/tambah') ?>"><button type="button" style="margin-top: 10pt;" class="btn btn-success float kanan">Tambah Data</button></a>
<hr class="invisible clear">

<div class="card border-success mb-3" style="max-width: auto;">
    <div class="card-body">

        <table class="table table-hover">
            <thead>
                <tr class="table-success">
                    <th scope="col" align=center>Nomor</th>
                    <th scope="col" align=center>Judul</th>
                    <th scope="col" align=center>Jumlah Step</th>
                    <th scope="col" align=center>Kelas</th>
                    <th scope="col" align=center>Kode Invitasi</th>
                    <th scope="col" style="width: fit-content;" align=center></th>
                </tr>
            </thead>
            <tbody>

                <?php if ($result == null) { ?>
                    <tr>
                        <td colspan="5" align=center>Belum ada proyek...</td>
                    </tr>
                    <?php } else {
                    $nomor = 1;
                    foreach ($result as $row) { ?>

                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $row->judul_proyek; ?></td>
                            <td><?php echo $row->jumlah_step; ?></td>
                            <td><?php echo $row->kelas; ?></td>
                            <td><?php echo $row->kode_inv; ?></td>
                            <td style="width: fit-content;" align=right>
                                <a href="<?php echo base_url('C_proyek_guru/tampil') . '/' . $row->id_proyek ?>"><button type="button" class="btn btn-outline-primary">Lihat</button></a>
                                <a href="<?php echo base_url('C_proyek_guru/ubah') . '/' . $row->id_proyek ?>"><button type="button" class="btn btn-outline-warning">Ubah</button></a>
                                <a href="<?php echo base_url('C_proyek_guru/hapus') . '/' . $row->id_proyek ?>"><button type="button" class="btn btn-outline-danger">Hapus</button></a>
                            </td>
                        </tr>

                <?php $nomor++;
                    }
                } ?>

            </tbody>
        </table>

        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>
<?php include "V_footer.php"; ?>