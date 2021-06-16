 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>Export AHK</h1>
                 </div>
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="#">Home</a></li>
                         <li class="breadcrumb-item active">Export AHK</li>
                     </ol>
                 </div>
             </div>
         </div><!-- /.container-fluid -->
     </section>

     <!-- Main content -->
     <section class="content">
         <div class="container-fluid">
             <!-- /.row -->
             <div class="row">
                 <div class="col-12">
                     <div class="card card-primary">
                         <div class="card-header">
                             <h3 class="card-title">Form Pembuatan Pesan Broadcast</h3>

                         </div>

                         <div class="card-body">
                             <p> Silahkan tekan tombol export untuk mendownload file ahk yang berisi Pesan Broadcast ! </p>
                             <form id="buat-pesan" action="<?php echo site_url('pesan_bc/download_AHK'); ?>" method="post" hidden>
                                 <div class="form-group">
                                     <label for="nama_file">Nama File</label>
                                     <input value="<?php echo $jenis . " " . $nama_file  ?>" class="form-control col-6" id="nama_file" name="nama_file" type="text" placeholder="Masukan nama File">
                                 </div>
                                 <div class="form-group">
                                     <label for="keterangan">Keterangan</label>
                                     <input value="<?php echo $keterangan ?>" class="form-control col-6" id="keterangan" name="keterangan" type="text" placeholder="Masukan Keterangan File">
                                 </div>
                                 <div class="form-group">
                                     <label for="pesan">Pesan</label>
                                     <textarea class="form-control col-7" rows="0" id="keterangan" name="pesan" placeholder="Masukan Pesan Anda ..."><?php echo $pesan ?></textarea>
                                 </div>


                                 <table class="table table-head-fixed text-nowrap">
                                     <thead>
                                         <tr>
                                             <th>#</th>
                                             <th>Nama</th>
                                             <th>Nomor Kontak</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php
                                            $count = 0;
                                            foreach ($data_kontak as $row) :
                                                $count++;
                                            ?>

                                             <tr>
                                                 <td> <?php echo $count; ?> </td>
                                                 <td hidden> <input name="id_kontak[]" id="id_kontak" type="text" value="<?php echo $row->id_kontak ?>"> </td>
                                                 <td><?php echo $row->nama_kontak; ?></td>
                                                 <td><?php echo $row->nomor_kontak; ?></td>
                                             </tr>
                                         <?php endforeach; ?>
                                     </tbody>
                                 </table>

                             </form>
                             <?php

                                //Contoh Penggunaan Fungsi explode ()
                                // $kode_enter = 13;
                                // $str = chr($kode_enter);

                                // $PecahStr = explode($str, $pesan);



                                // for ($i = 0; $i < count($PecahStr); $i++) {
                                //     echo $PecahStr[$i];
                                // }

                                ?>

                             <?php

                                // $ankga = mt_rand(1000, 10000);
                                // $nama_file = $nama_file;
                                // $tanggal = date('d-M-Y-H-i-s');
                                // $kode_enter = 13; //kode ASCII untuk enter
                                // $str = chr($kode_enter); //deklarasi variabel kode ASCII 
                                // //membuat gemerate tamda bca ke AHK
                                // $pesan_isi = str_replace(array('!', '?', ',', '.', ':', '"', ';', '[', ']', '|', '<', '>'), array('{!}', '{?}', '{,}' . '{,}', '{:}', '{,}', '{"}', '{;}', '{[}', '{}}', '{|}', '{<}', '{>}'), $pesan);
                                // $PecahStr = explode($str, $pesan_isi); //mengacak string setiap enter kedalam bentuk array
                                // $tanggal = date('d-M-Y-H-i-s');
                                // $myfile = fopen("BCWA" . "_" . $nama_file . "_" . $tanggal . ".ahk", "w") or die("Unable to open file!");
                                // $txt = "MsgBox, Mulai?\n";
                                // fwrite($myfile, $txt);

                                // $txt = ";Jika ingin mengirim gambar, copy foto yang akan dikirim ke WA\n";
                                // // fwrite($myfile, $txt);
                                // // $txt = 'clipboard :=""' . "\n";
                                // fwrite($myfile, $txt);


                                // foreach ($data_kontak as $data) {

                                //     $txt = "Run, https://api.whatsapp.com/send?phone=" . $data->nomor_kontak . "\n";
                                //     fwrite($myfile, $txt);
                                //     $txt = "Sleep, 10000\n";
                                //     fwrite($myfile, $txt);
                                //     $txt = "Sleep, 100\n";
                                //     fwrite($myfile, $txt);
                                //     $txt = "send, ^W\n";
                                //     fwrite($myfile, $txt);
                                //     $txt = "Sleep, 9000\n";
                                //     fwrite($myfile, $txt);
                                //     $txt = "Send, ^v\n";
                                //     fwrite($myfile, $txt);
                                //     $txt = "Sleep," . $ankga . "\n";
                                //     // fwrite($myfile, $txt);
                                //     // $txt = "string =\n(\n" . $pesan_isi . "\n)\n";
                                //     foreach ($PecahStr as $jml => $psn) {
                                //         if ($jml == 0) {
                                //             fwrite($myfile, $txt);
                                //             $txt = "string" . $jml . " =\n(\n" . $psn . "\n)\n";
                                //         } else {

                                //             fwrite($myfile, $txt);
                                //             $txt = "string" . $jml . " =\n(" . $psn . "\n)\n";
                                //         }
                                //     }

                                //     foreach ($PecahStr as $jml => $data) {
                                //         if ($jml == 0) {
                                //             fwrite($myfile, $txt);
                                //             $txt = "Send," . "%string" . $jml . "%+{Enter}";
                                //         } else {
                                //             fwrite($myfile, $txt);
                                //             $txt = "%string" . $jml . "%+{Enter}";
                                //         }
                                //     }
                                //     fwrite($myfile, $txt);
                                //     $txt = "\n";
                                //     fwrite($myfile, $txt);
                                //     $txt = "Sleep," . $ankga . "\n";
                                //     fwrite($myfile, $txt);
                                //     $txt = "Send, {Enter}\n";
                                //     fwrite($myfile, $txt);
                                //     $txt =  "Sleep," . $ankga . "\n";
                                //     fwrite($myfile, $txt);
                                // }
                                // fwrite($myfile, $txt);
                                // $txt = "Sleep," . $ankga . "\n";
                                // fwrite($myfile, $txt);
                                // $txt = 'clipboard :=""' . "\n";
                                // fwrite($myfile, $txt);
                                // $txt = "MsgBox, Selesai!\n";
                                // fwrite($myfile, $txt);
                                // $txt = "return\n";
                                // fwrite($myfile, $txt);
                                // $txt = "Exit";
                                // fwrite($myfile, $txt);
                                // fclose($myfile);
                                ?>
                         </div>
                         <!-- /.card-body -->
                         <div class="card-footer">
                             <a href="<?php echo base_url('Kontakwa')  ?>" class="btn btn-block bg-gradient-danger col-3" style="display: inline; ">kembali</a>
                             <!-- <a href="<?php //echo base_url('pesan_bc/download_AHK') . "BCWA" . "_" . $nama_file . "_" . $tanggal . ".ahk";
                                            ?>" class="btn btn-block bg-gradient-secondary col-6" style="display: inline;" download>Export</a> -->


                             <button form="buat-pesan" type="submit" class="btn btn-block btn-primary col-1" style="display: inline; padding: 4px; margin-bottom: 5px;">Export</button>
                         </div>

                     </div>
                     <!-- /.card -->
                     <!-- /.card -->
                 </div>
             </div>

             <!-- /.col -->
         </div>
         <!-- /.row -->






         <!-- /.card -->
     </section>
 </div>


 <!-- /.content -->

 <!-- /.content-wrapper -->