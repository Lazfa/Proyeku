<?php
$page = "Lihat Step";
$bread = array(
    "Proyek" => "C_proyek_guru/show",
    "Detail" => 'C_proyek_guru/tampil/' . $id_proyek,
    "Hasil Kerja Siswa" => 'C_proyek_guru/tampil/' . $id_proyek . '/' . $this->input->get('s')
);
include "V_header.php";
include "V_navbar.php";
?>
<h2 id="judulKonten" style="font-family: Cochin;">Hasil kerja siswa</h2>
<hr class="invisible">

<div>
    <table class="table table-hover">
        <thead>
            <tr class="table-success">
                <th scope="col">No</th>
                <th scope="col">Nama Kelompok</th>
                <th scope="col">Progres</th>
                <th scope="col" style="width:fit-content;"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result == null) {
                echo "<tr><td class='table-light' colspan=4 align=center>Belum ada yang mengikuti proyek ini.</td></tr>";
            } else {
                $no = 1;
                foreach ($result as $row) { ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row->username ?></td>
                        <td><?php echo $row->step_selesai . " dari " . $this->input->get("s"); ?></td>
                        <td><a href="<?php echo base_url('C_proyek_guru/show_kerja') . '/' . $row->id_siswa_proyek .'?user='. $row->username ?>"><button type="button" class="btn btn-outline-warning">Lihat</button></a></td>
                    </tr>
            <?php }
            }
            ?>
        </tbody>
    </table>
</div>
<?php include "V_footer.php"; ?>