<?php
session_start();

if (!isset($_SESSION['nama'])) {
  header("Location:../login/login.php?pesan=failed");
  //echo "<script>alert('Anda Harus Melakukan Login Terlebih Dahulu');document.location= '../../login2/index.php'</script>";
}
if ($_SESSION['level'] != "admin cnp") {
  // die("Anda bukan Admin");
  header("Location:../login/login.php?pesan=failed");
}
?>

<?php
include '../component/header.php';
?>

<body id="page-top">


  <?php
  include 'menu.php';
  include '../component/profile1.php';
  include '../conn/koneksi.php';
  ?>
  <div class="container-fluid">
    <nav aria-label="breadcrumb ">
      <ol class="breadcrumb col-lg-3">
        <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Mahasiswa</li>
      </ol>
    </nav>

    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>
        <div class="dropdown no-arrow"><button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#tambahMhs" style="float: right;">
            <span class="icon text-white-50">
              <i class="fa fa-plus-square" aria-hidden="true"></i>
            </span>
            <span class="text">Tambah</span>
            </a></button>
        </div>
      </div>
      <!-- ################# AWAL TAMBAH ##################################################### -->
      <!-- Tambah Mahasiswa-->
      <div class="modal fade  bd-example-modal-lg" id="tambahMhs" tabindex="-1" aria-labelledby="tambah" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="modal-header ">
              <h5 class="modal-title" id="aktivasi">Tambah Mahasiswa</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>


            <div class="modal-body">
              <form class="user" method="POST" action="proses_tambahMhs.php">
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">NIM</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control " name="nim" required="">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Nama Mahasiswa</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control " name="nama" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Tempat Lahir</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control " name="tempat" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control " name="tanggal" onfocus="(this.type='date')">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-8">
                    <select class="custom-select" name="jenkel" required>
                      <option selected>Pilih Jenis Kelamin...</option>
                      <option value="1">Laki-Laki</option>
                      <option value="2">Prempuan</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Status Mahasiswa</label>
                  <div class="col-sm-8">
                    <select class="custom-select" name="status" required>
                      <option selected>Pilih Status...</option>
                      <option value="Aktif">Aktif</option>
                      <option value="U-30">U-30</option>
                      <option value="Pindah Prakuliah">Pindah Prakuliah</option>
                      <option value="Batal Registrasi">Batal Registrasi</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Tahun Angkatan</label>
                  <div class="col-sm-8">
                    <input name="angkatan" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="4" />
                  </div>
                </div>
            </div>


            <div class="modal-footer ">
              <button type="submit" name="simpan" class="btn btn-primary "> Simpan </button>

            </div>
            </form>
          </div>
        </div>
      </div>

      <!---------------- AKHIR TAMBAH DATA ----------------->
      <div class="card-body">
        <div class="table-responsive">
          <table id="datatable" class="table table-hover table-bordered " style="width:100%">
            <thead class="bg-primary">
              <tr>
                <th scope="col" style="color: white">No</th>
                <th scope="col" style="color: white">Nim</th>
                <th scope="col" style="color: white; width: 30px;">Nama</th>
                <th scope="col" style="color: white">Alamat</th>
                <th scope="col" style="color: white">Tanggal Lahir</th>
                <th scope="col" style="color: white; width: 120px">Aksi</th>

              </tr>
            </thead>
            <tbody>
              <?php
              $no = 0;
              $data = mysqli_query($conn, "select * from tb_mahasiswa");

              while ($d = mysqli_fetch_array($data)) {
                $no++;
                $date = $d['tgl_lahir'];
                $date =  date('d-M-Y', strtotime($date));

              ?>
                <tr>
                  <th scope="row" style="font-size: 14px"><?php echo $no; ?></th>
                  <td style="font-size: 14px"><?php echo $d['nim'];  ?></td>
                  <td style="font-size: 14px"><?php echo $d['nama'];  ?></td>
                  <td style="font-size: 14px"><?php echo $d['tempat_lahir'];  ?></td>
                  <td style="font-size: 14px"><?php echo $date =  date('d M Y', strtotime($date));  ?></td>
                  <td style="font-size: 14px"> <a href="#" type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target="#edit<?php echo $d['id']; ?>">
                      <i class="fas fa-edit"></i>
                    </a>

                    <!-- ################# AWAL EDIT ##################################################### -->
                    <!-- Edit Mahasiswa -->
                    <div class="modal fade" id="edit<?php echo $d['id']; ?>" role="dialog">
                      <div class="modal-dialog  modal-dialog-scrollable ">
                        <div class="modal-content">
                          <div class="modal-header ">
                            <h5 class="modal-title" id="edit_mahasiswa">Edit Mahasiswa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>


                          <div class="modal-body">
                            <form class="user" method="POST" action="proses_editMhs.php">

                              <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">NIM</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control " name="nim" value="<?php echo $d['nim']; ?>" required="">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Nama Mahasiswa</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control " name="nama" value="<?php echo $d['nama']; ?>" required>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control " name="tempat" value="<?php echo $d['tempat_lahir']; ?>" required>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-8">
                                  <input type="date" class="form-control " name="tanggal" value="<?php echo $d['tgl_lahir']; ?>" required>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-8">
                                  <select class="custom-select" name="jenkel" required>
                                    <?php
                                    if ($d['jenkel'] == "") echo "<option selected >Pilih Jenis Kelamin</option>";

                                    if ($d['jenkel'] == "1") echo "<option  value='1' selected >Laki-Laki</option> ";
                                    else echo "<option  value='1'>Laki-Laki</option>";

                                    if ($d['jenkel'] == "2") echo "<option value='2' selected >Prempuan</option>";
                                    else echo "<option  value='2'>Prempuan</option>";

                                    ?>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Status Mahasiswa</label>
                                <div class="col-sm-8">
                                  <select class="custom-select" name="status" required>
                                    <?php
                                    if ($d['status'] == "") echo "<option selected>Pilih Status</option>";

                                    if ($d['status'] == "Aktif") echo "<option value='Aktif' selected>Aktif</option>";
                                    else echo "<option value='Aktif'>Aktif</option>";

                                    if ($d['status'] == "U-30") echo "<option value= 'U-30' selected>U-30</option>";
                                    else echo "<option value= 'U-30' >U-30</option>";

                                    if ($d['status'] == "Pindah Prakuliah") echo "<option value='Pindah Prakuliah' selected>Pindah Prakuliah</option>";
                                    else echo "<option value='Pindah Prakuliah' >Pindah Prakuliah</option>";

                                    if ($d['status'] == "Batal Registrasi") echo "<option value='Batal Registrasi' selected>Batal Registrasi</option>";
                                    else echo "<option value='Batal Registrasi' > Batal Registrasi</option>";



                                    ?>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Tahun Angkatan</label>
                                <div class="col-sm-8">
                                  <input name="angkatan" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="4" value="<?php echo $d['angkatan']; ?>" />
                                </div>
                              </div>
                          </div>
                          <div class="modal-footer ">
                            <button type="submit" name="Update" class="btn  btn-primary "> Simpan </button>

                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
        </div>
        <!---------------- AKHIR EDIT DATA ----------------->

        <a href="delete_mhs.php?id=<?= $d['id'] ?>" class="btn btn-danger btn-xs delete-data btn-circle">
          <i class="far fa-trash-alt"></i>
        </a>
        <a href="#" class="btn btn-warning btn-circle" data-toggle="modal" data-target="#detail<?php echo $d['id']; ?>">
          <i class="fa fa-info" aria-hidden="true"></i>
        </a>

        <!--- AWAL MODAL DETAIL -->
        <div class="modal fade" id="detail<?php echo $d['id']; ?>" tabindex="-1" aria-hidden="true" role="dialog">
          <div class="modal-dialog modal-lg ">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="view">Detail Data Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="user">
                  <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">NIM</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control " value="<?php echo $d['nim']; ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Nama</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control " value="<?php echo $d['nama']; ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Alamat</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control " value="<?php echo $d['tempat_lahir']; ?>" readonly>
                    </div>
                  </div>
                  <div class=" form-group row">
                    <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control " value="<?php echo $d['tgl_lahir'];  ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control " value="<?php $jenkel = $d['jenkel'];
                                                                      if ($jenkel == "2") {
                                                                        echo $jenkel = "Prempuan";
                                                                      } else {
                                                                        echo $jenkel = "Laki-Laki";
                                                                      } ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Status</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control " value="<?php echo $d['status']; ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Tahun Angkatan</label>
                    <div class="col-sm-8">
                      <input name="angkatan" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="4" value="<?php echo $d['angkatan']; ?>" readonly />
                    </div>
                  </div>
                </form>
                <div class="modal-footer ">
                  <button type="button" class="btn  btn-danger " data-dismiss="modal">Close</button>

                </div>

              </div>
            </div>
          </div>
        </div>
        <!--- End -->

        </td>
        </tr>
      <?php }
      ?>
      </tbody>

      </table>
      </div>
    </div>

  </div>

  <?php
  include '../component/script.php';
  include '../component/script_datatable.php';
  ?>
  <?php
  $pesan = (isset($_GET['pesan']) ? $_GET['pesan'] : '');

  if ($pesan == 'success') {

    echo " <script>Swal.fire(
  'Berhasil',
  'Data Berhasil Disimpan',
  'success')
  </script>";
  } else {
  }

  ?>

  <script type="text/javascript">
    $('.delete-data').on('click', function(e) {
      e.preventDefault();
      var getLink = $(this).attr('href');

      Swal.fire({
        title: 'Hapus Data?',
        text: "Data akan dihapus permanen",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus'
      }).then((result) => {
        if (result.value) {

          window.location.href = getLink;
        }
      })
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      var table = $('#datatable').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'colvis']
      });

      table.buttons().container()
        .appendTo('#datatable_wrapper .col-md-6:eq(0)');
    });
  </script>
  <?php
  include '../component/footer.php';
  ?>

</body>

</html>