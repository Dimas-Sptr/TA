<?php
session_start();
include '../conn/koneksi.php';
include '../component/header.php';

?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Penyerahan</title>
    <style type="text/css">
        .pembukaan {
            text-align: justify;

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
</head>

<body>
    <div class="p-3 mb-2 bg-dark ">
        <div class="container">

            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <div class="card-body">
                        <img src="../img/LOGO.png" alt="" height="70px;" style="float: right;">

                        <?php
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




                        ?>


                            <div style="font-size:20px; color: black;">Kepada Yth,
                                <br><b>Bapak/Ibu Pimpinan</b><br><b><?php $d['nama_perusahaan']; ?></b>
                                </h4>Di-<br>Tempat <h4>Perihal : <b><i>Bukti Penerimaan Mahasiswa Magang</i></b></h4>
                                </p>


                                <p>Assalamualaikum dan salam sejahtera untuk kita semua
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
                            </div>
                            <div style="font-size:20px; color:black;">

                                <p class="biodata">
                                    NIM :<?php echo $d['nim']; ?><br>
                                    Nama :<?php echo $d['nama_mahasiswa']; ?><br>
                                    Jurusan :<input type="text" style="border: 0px; font-family:Times New Roman; font-size: 20px;" value="<?php $jurusan = $d['jurusan'];
                                                                                                                                            if ($jurusan == "-") {
                                                                                                                                                echo $jurusan = "-";
                                                                                                                                            } else if ($jurusan == "AB") {
                                                                                                                                                echo $jurusan = "Administrasi Bisnis";
                                                                                                                                            } else if ($jurusan == "TK") {
                                                                                                                                                echo $jurusan = "Teknologi Komputer";
                                                                                                                                            } else {
                                                                                                                                                echo $jurusan = "Akutansi";
                                                                                                                                            } ?>" readonly>




                                <p class="penutup">
                                    Demikianlah kami sampaikan, atas perhatian & kerjasamanya kami ucapkan terimakasih.


                                <p class="ttd">
                                    Hormat Kami,<br>
                                    <b>POLITEKNIK LP3I MEDAN</b>


                                <p class="nama">
                                    <b><u>SYAHFITRI INDRIYANTI</u></b><br>

                                    Koord. Kerjasama & Penempatan Kerja

                            </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
                        }
    ?>
    <form action="" method="post">
        <center><input type="submit" class="btn btn-success center-block mt-4 " name="pdf" value="Download Surat Ini"></center>
    </form>
    </div>
    <?php
    if (isset($_POST['pdf'])) {

        header("location:report.php");
    } else {
    }


    ?>
    <?php
    include '../component/script.php';
    ?>

</body>


</html>