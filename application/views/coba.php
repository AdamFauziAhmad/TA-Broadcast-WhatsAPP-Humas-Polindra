<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1">
        <tr>
            <th>nama</th>
            <th>Username</th>
            <th>role</th>
        </tr>
        <?php foreach ($admin as $i) { ?>


            <tr>
                <td><?php echo $i->nama_admin;  ?></td>
                <td><?php echo $i->username;  ?></td>
                <td><?php echo $i->role;  ?></td>
                <td>
                    <a href="#" class="btn btn-block bg-gradient-success btn-sm" style="display: inline;" data-toggle="modal" data-target="#modal_edit">Edit</a>
                    <a href="#" class="btn btn-block bg-gradient-danger btn-sm" style="display: inline;" data-toggle="modal" data-target="#modal_hapus">Delete </a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <table border="1">


        <tr>
            <td><?php echo $this->session->userdata('username');  ?></td>
            <td><?php echo $this->session->userdata('nama_admin');  ?></td>
            <td><?php echo $this->session->userdata('role');  ?></td>
            <td><?php echo $this->session->userdata('username');  ?></td>
            <td><?php echo $this->session->userdata('nama_admin');  ?></td>
            <td><?php echo $this->session->userdata('role');  ?></td>
        </tr>
    </table>
    <?php
    // $kalimat = "ini adalah kalimat dengan koma, dan . tanda seru! tanda @ dan enter
    // ini adalah kalimat";
    // echo $kalimat;

    $kode = "&#13";
    $str = chr($kode);
    echo "karakter dengan kode ascii $kode adalah $str djaklj";
    ?>
</body>

<!-- //modal tambah -->
<div class="modal fade" id="modal_hapus" role="dialog">
    <div class="modal-dialog" role="dokumen">
        <div class="modal-content card card-primary">

            <div class="card-header">
                <h3 class="card-title">Tambah Kontak</h3>
            </div>
            <!-- /.card-header -->

            <!-- form start -->
            <form action="<?php echo site_url('kontakwa/tambah_kontak'); ?>" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_kontak">Nama Kontak</label>
                        <input type="text" class="form-control" id="nama_kontak" name="nama_kontak" placeholder="Mauskan Nama Kontak WA">
                    </div>
                    <div class="form-group">
                        <label for="nomor_kontak">Nomor Kontak</label>
                        <input type="number" class="form-control" id="nomor_kontak" name="nomor_kontak" placeholder="Masukan Nomor Kontak WA">
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukan Kelas">
                    </div>
                    <div class="form-group">
                        <label for="tahun_masuk">Tahun Masuk</label>
                        <input type="text" class="form-control" id="tahun_masuk" name="tahun_masuk" placeholder="Masukan Tahun Masuk">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" class="form-control" id="status" name="status" placeholder="Masukan status">
                    </div>

                    <!-- <div class="form-group">
                                 <label for="exampleInputFile">File input</label>
                                 <div class="input-group">
                                     <div class="custom-file">
                                         <input type="file" class="custom-file-input" id="exampleInputFile">
                                         <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                     </div>
                                     <div class="input-group-append">
                                         <span class="input-group-text">Upload</span>
                                     </div>
                                 </div>
                             </div> -->
                    <!-- <div class="form-check">
                                 <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                 <label class="form-check-label" for="exampleCheck1">Check me out</label>
                             </div> -->
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- //modal tambah -->
<?php foreach ($admin as $i) { ?>
    <div class="modal fade" id="modal_edit" role="dialog">
        <div class="modal-dialog" role="dokumen">
            <div class="modal-content card card-primary">

                <div class="card-header">
                    <h3 class="card-title">Tambah Kontak</h3>
                </div>
                <!-- /.card-header -->

                <!-- form start -->
                <form action="<?php echo site_url('kontakwa/tambah_kontak'); ?>" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_kontak">Nama Kontak</label>
                            <input type="text" class="form-control" id="nama_kontak" name="nama_kontak" placeholder="Mauskan Nama Kontak WA">
                        </div>
                        <div class="form-group">
                            <label for="nomor_kontak">Nomor Kontak</label>
                            <input type="number" class="form-control" id="nomor_kontak" name="nomor_kontak" placeholder="Masukan Nomor Kontak WA">
                        </div>
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukan Kelas">
                        </div>
                        <div class="form-group">
                            <label for="tahun_masuk">Tahun Masuk</label>
                            <input type="text" class="form-control" id="tahun_masuk" name="tahun_masuk" placeholder="Masukan Tahun Masuk">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" class="form-control" id="status" name="status" placeholder="Masukan status">
                        </div>

                        <!-- <div class="form-group">
                                 <label for="exampleInputFile">File input</label>
                                 <div class="input-group">
                                     <div class="custom-file">
                                         <input type="file" class="custom-file-input" id="exampleInputFile">
                                         <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                     </div>
                                     <div class="input-group-append">
                                         <span class="input-group-text">Upload</span>
                                     </div>
                                 </div>
                             </div> -->
                        <!-- <div class="form-check">
                                 <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                 <label class="form-check-label" for="exampleCheck1">Check me out</label>
                             </div> -->
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

</html>