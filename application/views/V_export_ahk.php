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

                                $ankga = mt_rand(1000, 10000);
                                $nama_file = $nama_file;
                                $tanggal = date('d-M-Y-H-i-s');
                                $kode_enter = 13; //kode ASCII untuk enter
                                $str = chr($kode_enter); //deklarasi variabel kode ASCII 
                                //membuat gemerate tamda bca ke AHK
                                $pesan_isi = str_replace(array('!', '?', ',', '.', ':', '"', ';', '[', ']', '|', '<', '>'), array('{!}', '{?}', '{,}' . '{,}', '{:}', '{,}', '{"}', '{;}', '{[}', '{}}', '{|}', '{<}', '{>}'), $pesan);
                                $PecahStr = explode($str, $pesan_isi); //mengacak string setiap enter kedalam bentuk array
                                // foreach ($PecahStr as $value) {
                                //     echo $value . "+{Enter}";
                                // }
                                // $jmlh_pecahan = count($PecahStr);
                                // $psn = str_replace($str, '+{Enter}', $pesan);
                                // $pesan_isi =  $psn;
                                // echo $pesan_isi;
                                $tanggal = date('d-M-Y-H-i-s');
                                $myfile = fopen("BCWA" . "_" . $nama_file . "_" . $tanggal . ".ahk", "w") or die("Unable to open file!");
                                $txt = "MsgBox, Mulai?\n";
                                fwrite($myfile, $txt);

                                $txt = ";kalau mau kirim gambar, harus copy foto di WA\n";
                                // fwrite($myfile, $txt);
                                // $txt = 'clipboard :=""' . "\n";
                                fwrite($myfile, $txt);


                                foreach ($data_kontak as $data) {

                                    $txt = "Run, https://api.whatsapp.com/send?phone=" . $data->nomor_kontak . "\n";
                                    fwrite($myfile, $txt);
                                    $txt = "Sleep, 10000\n";
                                    fwrite($myfile, $txt);
                                    $txt = "Sleep, 100\n";
                                    fwrite($myfile, $txt);
                                    $txt = "send, ^W\n";
                                    fwrite($myfile, $txt);
                                    $txt = "Sleep, 9000\n";
                                    fwrite($myfile, $txt);
                                    $txt = "Send, ^v\n";
                                    fwrite($myfile, $txt);
                                    $txt = "Sleep," . $ankga . "\n";
                                    // fwrite($myfile, $txt);
                                    // $txt = "string =\n(\n" . $pesan_isi . "\n)\n";
                                    foreach ($PecahStr as $jml => $psn) {
                                        if ($jml == 0) {
                                            fwrite($myfile, $txt);
                                            $txt = "string" . $jml . " =\n(\n" . $psn . "\n)\n";
                                        } else {

                                            fwrite($myfile, $txt);
                                            $txt = "string" . $jml . " =\n(" . $psn . "\n)\n";
                                        }
                                    }

                                    foreach ($PecahStr as $jml => $data) {
                                        if ($jml == 0) {
                                            fwrite($myfile, $txt);
                                            $txt = "Send," . "%string" . $jml . "%+{Enter}";
                                        } else {
                                            fwrite($myfile, $txt);
                                            $txt = "%string" . $jml . "%+{Enter}";
                                        }
                                    }
                                    fwrite($myfile, $txt);
                                    $txt = "\n";
                                    fwrite($myfile, $txt);
                                    $txt = "Sleep," . $ankga . "\n";
                                    fwrite($myfile, $txt);
                                    $txt = "Send, {Enter}\n";
                                    fwrite($myfile, $txt);
                                    $txt =  "Sleep," . $ankga . "\n";
                                    fwrite($myfile, $txt);
                                }
                                fwrite($myfile, $txt);
                                $txt = "Sleep," . $ankga . "\n";
                                fwrite($myfile, $txt);
                                $txt = 'clipboard :=""' . "\n";
                                fwrite($myfile, $txt);
                                $txt = "MsgBox, Selesai!\n";
                                fwrite($myfile, $txt);
                                $txt = "return\n";
                                fwrite($myfile, $txt);
                                $txt = "Exit";
                                fwrite($myfile, $txt);
                                fclose($myfile);
                                ?>
                         </div>
                         <!-- /.card-body -->
                         <div class="card-footer">
                             <a href="<?php echo base_url('Kontakwa')  ?>" class="btn btn-block bg-gradient-danger col-6" style="display: inline;">kembali</a>
                             <a href="<?php echo base_url() . "BCWA" . "_" . $nama_file . "_" . $tanggal . ".ahk" ?>" class="btn btn-block bg-gradient-secondary col-6" style="display: inline;" download>Export</a>
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