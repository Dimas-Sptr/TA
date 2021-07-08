<?php
include '../conn/koneksi.php';
require_once __DIR__ . '/../mpdf/vendor/autoload.php';


$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT tb_pengajuanmagang.id,
tb_pengajuanmagang.nim,
tb_pengajuanmagang.nama_mahasiswa,
tb_pengajuanmagang.nama_perusahaan,
tb_pengajuanmagang.posisi,
tb_pengajuanmagang.persyaratan,
tb_pengajuanmagang.tgl_berakhir,
tb_pengajuanmagang.alamat,
tb_pengajuanmagang.status,
tb_cvmahasiswa.jurusan,
tb_cvmahasiswa.nim
FROM
tb_pengajuanmagang
INNER JOIN tb_cvmahasiswa ON tb_pengajuanmagang.nim = tb_cvmahasiswa.nim

WHERE
tb_pengajuanmagang.id = $id");

while ($d = mysqli_fetch_array($data)) {
    $jurusan = $d['jurusan'];
    if ($jurusan == "-") {
        echo $jurusan = "-";
    } else if ($jurusan == "AB") {
        echo $jurusan = "Administrasi Bisnis";
    } else if ($jurusan == "TK") {
        echo $jurusan = "Teknologi Komputer";
    } else {
        echo $jurusan = "Akutansi";
    }


    $html = '<style type="text/css">
    .container {
       margin-top : 30 px;
       margin-left: 30 px;
       margin-bottom : 30 px;
       margin-right : 30 px;
    }

    .pembukaan {
        text-align: justify;
        font-family: Times New Roman, Times, serif;
    }

    .isi {
        text-align: justify;

    }

    .penutup {
        text-align: justify;
    }

    .biodata {

        text-align: justify;
    }

    .pr2 {
        text-align: justify;
    }

    .nama {
        text-align: justify;
        margin-top: 60px;
    }

    .jab {
        font-size: 14px;

    }
</style>

    <img src="../img/LOGO.png" alt="" style="height: 70px; float:right"><br>';

    $html .= '<div style=" margin-left: 20px">

<h4>Kepada Yth,
    <br><b>Bapak/Ibu Pimpinan</b><br><b>' . $d['nama_perusahaan'] . '</b>
</h4>Di-<br>Tempat <h4>Perihal : <b><i>Bukti Penerimaan Mahasiswa Magang</i></b></h4>
</p> <p>Assalamualaikum dan salam sejahtera untuk kita semua
<p class="pembukaan">Semoga Bapak / Ibu pimpinan besrta jajaran selalu dalam keadaan sehat wal afiat serta
    sukses dalam aktivitas sehari-hari.
<p class="isi">Politeknik LP3I Medan adalah Intitusi Pendidikan Vokasi yang mendidik calon tenaga muda professional selama 3 tahun yang siap kerja. Kami mengembangkan suatu konsep sistem pendidikan yang beorientasi
    pada kesiapan softskill dan hardskill serta aplikatif bagi lulusannya
    demi memenuhi tuntutan kebutuhan Sumber Daya Manusia yang handal bagi dunia kerja &
    industri,
    politeknik LP3I medan juga mendidik lulusannya untuk memiliki semangat etos kerja berkualitas professional yang berbudi luhur,
    berimasn dan bertaqwa sehingga mampu segera beradptasi di dunia kerja & industri,
    Adapun bidang keahlian yang kami miliki adalah Administrasi Bisnis,
    Akuntansi dan Teknologi Komputer.
<p class="pr2">Berkenan dengan hal tersebut diatas,
    kami memohon kepada Bapak/Ibu Pimpinan perusahan
    mengizinkan mahasiswa/i Politeknik LP3I Medan untuk dapat mempraktekkan dan
    mendedikasikan ilmunya di Perusahaan yang Bapak/Ibu Pimpin dan juga diizinkan untuk
    melakukan riset Tugas Akhir. Adapun nama-nama mahasiswa yang akan dikirim sebagai berikut:

<p class="biodata">
    NIM     :' . $d['nim'] . '<br>
    Nama    : ' . $d['nama_mahasiswa'] . '<br>';
    $html .= 'Jurusan : ' . $jurusan . '';
    $html .= ' <p class="penutup">
    Demikianlah kami sampaikan, atas perhatian & kerjasamanya kami ucapkan terimakasih.


<p class="ttd">
    Hormat Kami,<br>
    <b>POLITEKNIK LP3I MEDAN</b>


<p class="nama">
    <b><u>SYAHFITRI INDRIYANTI</u></b><br>

    Koord. Kerjasama & Penempatan Kerja



</div>
</div>';
}

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output();
