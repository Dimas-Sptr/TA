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
  <div class="container">
    <nav aria-label="breadcrumb ">
      <ol class="breadcrumb col-lg-3">
        <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Input Data</li>
      </ol>
    </nav>

    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">SPPM</h6>
        <div class="dropdown no-arrow"><button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#tambah_sppm" style="float: right;">
            <span class="icon text-white-50">
              <i class="fa fa-plus-square" aria-hidden="true"></i>
            </span>
            <span class="text">Tambah</span>
            </a></button>


        </div>

      </div>




      <!-- ################# AWAL TAMBAH ##################################################### -->
      <!-- Tambah SPPM -->
      <div class="modal fade  bd-example-modal-lg" id="tambah_sppm" tabindex="-1" aria-labelledby="aktivasi" aria-hidden="true">
        <div class="modal-dialog modal-lg  " role="document">
          <div class="modal-content">
            <div class="modal-header ">
              <h5 class="modal-title" id="aktivasi">Tambah SPPM!</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>


            <div class="modal-body">
              <form class="user" method="POST" action="proses_tambahSppm.php">
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <input type="text" class="form-control form-control-user" name="nim" placeholder="Ketik NIM kamu..." required="">
                  </div>
                  <div class="form-group col-lg-6">
                    <input type="text" class="form-control form-control-user" name="nama" placeholder="Ketik Nama Lengkap ..." required>
                  </div>
                  <div class="form-group col-lg-6">
                    <input type="text" class="form-control form-control-user" name="tempat" placeholder="Ketik Tempat Tinggal..." required>
                  </div>
                  <div class="form-group col-lg-6">
                    <input type="text" class="form-control form-control-user" name="tanggal" placeholder="Pilih Tanggal Lahir ..." onfocus="(this.type='date')">
                  </div>
                  <div class="form-group col-lg-6">
                    <select class="custom-select" style="height: 50px;  border-radius: 30px;" name="prodi" required>
                      <option selected>Pilih Jurusan...</option>
                      <option value="AB">Administrasi Bisnis</option>
                      <option value="TK">Teknologi Komputer</option>
                      <option value="AK">Akutansi</option>
                    </select>
                  </div>
                  <div class="form-group col-lg-6">
                    <input type="text" class="form-control form-control-user" name="lokasi" placeholder="Ketik Lokasi Kampus ..." required>
                  </div>
                  <div class="form-group col-lg-6">
                    <input type="text" class="form-control form-control-user" name="usia" placeholder="Ketik Usia ...">
                  </div>
                  <div class="form-group col-lg-6">
                    <input type="number" class="form-control form-control-user" name="nohp" placeholder="Ketik Nomor Handphone ...">
                  </div>
                  <div class="form-group col-lg-6">
                    <input type="text" class="form-control form-control-user" onkeyup="sum();" id="ipk1" name="ipk1" placeholder="Ketik IPK1..." required>
                  </div>
                  <div class="form-group col-lg-6">
                    <input type="text" class="form-control form-control-user" onkeyup="sum();" id="ipk2" name="ipk2" placeholder="Ketik IPK2..." required>
                  </div>
                  <div class="form-group col-lg-6">
                    <input type="text" class="form-control form-control-user" onkeyup="sum();" id="ipk3" name="ipk3" placeholder="Ketik IPK3..." required>
                  </div>
                  <div class="form-group col-lg-6">
                    <input type="text" class="form-control form-control-user" onkeyup="sum();" id="ipk4" name="ipk4" placeholder="Ketik IPK4..." required>
                  </div>
                  <div class="form-group col-lg-12">
                    <input type="text" class="form-control form-control-user" name="angkatan" style="text-align: center;" placeholder="Ketik Tahun Angkatan..." required>
                  </div>
                </div>


                <div class="modal-footer ">
                  <button type="submit" name="simpan" class="btn  btn-user btn-primary  btn-block"> Simpan </button>

                </div>
              </form>
            </div>
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
                <th scope="col" style="color: white">Nama</th>
                <th scope="col" style="color: white">Alamat</th>
                <th scope="col" style="color: white">Tanggal Lahir</th>
                <th scope="col" style="color: white">Aksi</th>

              </tr>
            </thead>
            <tbody>
              <?php
              $no = 0;
              $data = mysqli_query($conn, "select * from tb_sppm");

              while ($d = mysqli_fetch_array($data)) {
                $no++;
                $date = $d['tgl_lahir'];
                $date =  date('d-M-Y', strtotime($date));

              ?>
                <tr>
                  <th scope="row"><?php echo $no; ?></th>
                  <td><?php echo $d['nim'];  ?></td>
                  <td><?php echo $d['nama'];  ?></td>
                  <td><?php echo $d['tempat'];  ?></td>
                  <td><?php echo $date =  date('d M Y', strtotime($date));  ?></td>
                  <td><a href="#" class="btn btn-success btn-circle" data-target="#edit<?php echo $d['id']; ?>" data-toggle="modal">
                      <i class="fas fa-edit"></i>
                    </a>



                    <!-- ############## EDIT DATA ##################################################################### -->
                    <!-- Edit Modal -->
                    <div class="modal fade" id="edit<?php echo $d['id']; ?>" tabindex="-1" aria-hidden="true" role="dialog">
                      <div class="modal-dialog modal-lg  ">
                        <div class="modal-content">
                          <div class="modal-header ">
                            <h5 class="modal-title" id="edit">Edit SPPM!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form class="user" method="POST" action="proses_editSppm.php">
                              <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                              <div class="form-row">
                                <div class="form-group col-lg-6">
                                  <input type="text" class="form-control form-control-user" name="nim" placeholder="Ketik NIM kamu..." value="<?php echo $d['nim']; ?>" required="">
                                </div>
                                <div class="form-group col-lg-6">
                                  <input type="text" class="form-control form-control-user" name="nama" placeholder="Ketik Nama Lengkap ..." value="<?php echo $d['nama']; ?>" required>
                                </div>
                                <div class="form-group col-lg-6">
                                  <input type="text" class="form-control form-control-user" name="tempat" placeholder="Ketik Tempat Tinggal..." value="<?php echo $d['tempat']; ?>" required>
                                </div>
                                <div class=" form-group col-lg-6">
                                  <input type="date" class="form-control form-control-user" name="tanggal" placeholder="Pilih Tanggal Lahir ..." value="<?php echo $d['tgl_lahir']; ?>" required>
                                </div>
                                <div class="form-group col-lg-6">
                                  <select class="custom-select" style="height: 50px;  border-radius: 30px;" name="prodi" required>
                                    <?php
                                    if ($d['prodi'] == "") echo "<option selected >Pilih Jurusan</option>";

                                    if ($d['prodi'] == "TK") echo "<option  value='TK' selected >Teknologi Komputer</option> ";
                                    else echo "<option  value='TK'>Teknologi Komputer</option>";

                                    if ($d['prodi'] == "AB") echo "<option  value='AB' selected >Administrasi Bisnis</option> ";
                                    else echo "<option  value='AB'>Administrasi Bisnis</option>";

                                    if ($d['prodi'] == "AK") echo "<option  value='AK' selected >Akutansi</option> ";
                                    else echo "<option  value='AK'>Akutansi</option>";

                                    ?>
                                  </select>
                                </div>
                                <div class="form-group col-lg-6">
                                  <input type="text" class="form-control form-control-user" name="lokasi" placeholder="Ketik Lokasi Kampus ..." value="<?php echo $d['lokasi_kampus']; ?>" required>
                                </div>
                                <div class="form-group col-lg-6">
                                  <input type="text" class="form-control form-control-user" name="usia" placeholder="Ketik Usia ..." value="<?php echo $d['usia']; ?>">
                                </div>
                                <div class="form-group col-lg-6">
                                  <input type="number" class="form-control form-control-user" name="nohp" placeholder="Ketik Nomor Handphone ..." value="<?php echo $d['nohp']; ?>">
                                </div>
                                <div class="col-lg-6">
                                  <input type="text" class="form-control form-control-user" id="ipk1e" name="ipk1" placeholder="Ketik IPK1..." value="<?php echo $d['ipk1']; ?>" required>
                                </div>
                                <div class="form-group col-lg-6">
                                  <input type="text" class="form-control form-control-user" id="ipk2e" name="ipk2" placeholder="Ketik IPK2..." value="<?php echo $d['ipk2']; ?>" required>
                                </div>
                                <div class="form-group col-lg-6">
                                  <input type="text" class="form-control form-control-user" id="ipk3e" name="ipk3" placeholder="Ketik IPK3..." value="<?php echo $d['ipk3']; ?>" required>
                                </div>
                                <div class="form-group col-lg-6">
                                  <input type="text" class="form-control form-control-user" id="ipk4e" name="ipk4" placeholder="Ketik IPK4..." value="<?php echo $d['ipk4']; ?>" required>
                                </div>

                                <input type="hidden" class="form-control form-control-user" id="totale" name="total" placeholder="Total..." readonly>

                                <div class="form-group col-lg-12">
                                  <input type="text" class="form-control form-control-user" style="text-align: center;" name="angkatan" placeholder="Ketik Tahun Angkatan..." value="<?php echo $d['tahun_angkatan']; ?>" required>
                                </div>
                              </div>


                              <div class="modal-footer ">
                                <button type="submit" name="simpan" class="  btn  btn-user btn-primary  btn-block "> Update </button>

                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- ############ AKHIR EDIT DATA ######################################################### -->
                    <a href="delete_sppm.php?id=<?= $d['id'] ?>" class="btn btn-danger btn-xs  btn-circle delete-data">
                      <i class="far fa-trash-alt"></i>
                    </a>
                    <a href="#" class="btn btn-warning btn-circle" data-target="#view<?php echo $d['id']; ?>" data-toggle="modal">
                      <i class="fa fa-info" aria-hidden="true"></i>
                    </a>
                    <!-- ############## DETAIL DATA ##################################################################### -->
                    <!-- DETAIL Modal -->
                    <div class="modal fade" id="view<?php echo $d['id']; ?>" tabindex="-1" aria-hidden="true" role="dialog">
                      <div class="modal-dialog modal-lg modal-dialog-scrollable ">
                        <div class="modal-content">
                          <div class="modal-header ">
                            <h5 class="modal-title" id="view">Detail SPPM Atas Nama <?php echo $d['nama']; ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form class="user" method="POST">
                              <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">NIM</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control form-control-user" value="<?php echo $d['nim']; ?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control form-control-user" value="<?php echo $d['nama']; ?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Alamat</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control form-control-user" value="<?php echo $d['tempat']; ?>" readonly>
                                </div>
                              </div>
                              <div class=" form-group row">
                                <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-8">
                                  <input type="date" class="form-control form-control-user" value="<?php echo $d['tgl_lahir']; ?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Program Studi</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control form-control-user" value="<?php echo $d['prodi']; ?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Lokasi Kampus</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control form-control-user" value="<?php echo $d['lokasi_kampus']; ?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Usia</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control form-control-user" value="<?php echo $d['usia']; ?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Nomor Handphone</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control form-control-user" value="<?php echo $d['nohp']; ?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">IPK 1</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control form-control-user" onkeyup="autosum();" id="ipk1e" value="<?php echo $d['ipk1']; ?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">IPK 2</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control form-control-user" onkeyup="autosum();" id="ipk2e" name="ipk2" placeholder="Ketik IPK2..." value="<?php echo $d['ipk2']; ?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">IPK 3</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control form-control-user" onkeyup="autosum();" id="ipk3e" name="ipk3" placeholder="Ketik IPK3..." value="<?php echo $d['ipk3']; ?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">IPK 4</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control form-control-user" onkeyup="autosum();" id="ipk4e" name="ipk4" placeholder="Ketik IPK4..." value="<?php echo $d['ipk4']; ?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <?php
                                $ipk = number_format($d['total'], 1, '.', '');
                                ?>
                                <label class="col-sm-4 col-form-label">Total</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control form-control-user" id="totale" name="total" placeholder="Total..." value="<?php echo $ipk; ?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Tahun Angkatan</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control form-control-user" name="angkatan" placeholder="Ketik Tahun Angkatan..." value="<?php echo $d['tahun_angkatan']; ?>" readonly>
                                </div>
                              </div>



                              <div class="modal-footer ">
                                <button type="button" class="btn  btn-danger " data-dismiss="modal">Close</button>

                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- ############ AKHIR DETAIL DATA ###################################################### -->
                  </td>
                </tr>
              <?php } ?>
            </tbody>

          </table>


        </div>
      </div>
    </div>

  </div>




  <?php
  include '../component/script.php';
  include '../component/script_datatable.php';
  ?>

  <?php

  $pesan = (isset($_GET['pesan']) ? $_GET['pesan'] : '');

  if ($pesan == 'update_success') {

    echo " <script>
    Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'Data Berhasil Disimpan',
          showConfirmButton: false,
          timer: 1500
    })
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