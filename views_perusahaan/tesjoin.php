<?php
include '../conn/koneksi.php';
?>
<table id="datatable" class="table table-hover table-bordered " style="width:100%">
    <thead class="bg-primary">
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Perusahaan</th>
            <th>Posisi</th>
            <th>Persyaratan</th>
            <th>Tanggal Berakhir</th>
            <th>Status</th>
            <th>Aksi</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $no = 0;
        $data = mysqli_query($conn, "select * from tb_pengajuanmagang where status='1' ");

        while ($d = mysqli_fetch_array($data)) {
            $no++;
            $date = $d['tgl_berakhir'];
            $date =  date('d-M-Y', strtotime($date));
            if ($d['status'] == 1) {
                $status = '<span class="badge badge-pill badge-info" style="margin-top: 5px; font-size: 14px; ">Pending</span>';
            }
            if ($d['status'] == 2) {
                $status = '<span class="badge badge-pill badge-success" style="margin-top: 5px; font-size: 14px;">Approved</span>';
            }



        ?>
            <tr>
                <th scope=" row" style="font-size: 14px"><?php echo $no; ?></th>
                <td style="font-size: 14px"><?php echo $d['nim'];  ?></td>
                <td style="font-size: 14px"><?php echo $d['nama_mahasiswa'];  ?></td>
                <td style="font-size: 14px"><?php echo $d['nama_perusahaan'];  ?></td>
                <td style="font-size: 14px"><?php echo $d['posisi'];  ?></td>
                <td style="font-size: 14px"><?php echo $d['persyaratan']; ?></td>
                <td style="font-size: 14px"> <?php echo $date =  date('d M Y', strtotime($date));  ?></td>
                <td style="font-size: 14px"><?php echo $status; ?></td>
                <td style="font-size: 14px"> <a href="detail.php?id=<?php echo $d['id']; ?>">Detail
                    </a>

                </td>
            </tr>
    </tbody>
<?php
        }
?>
</table>