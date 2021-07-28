<footer class="main-footer">
    <!-- <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.1.0-rc
    </div> -->
    <strong>Copyright &copy; &#13; 2021 .</strong> All rights reserved.
</footer>


<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/templateplugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->


<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/template/dist/js/demo.js"></script>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/template/plugins/jquery/jquery.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/template/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/template/dist/js/demo.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url(); ?>assets/template/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- js custom alert-->
<script src="<?php echo base_url(); ?>assets/js/apl.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>



<!-- Page specific script -->
<script>
    $(function() {

        $('input[name="dates"]').daterangepicker({
            autoUpdateInput: false,

            locale: {
                format: "DD/MM/YYYY",
                applyLabel: 'Terapkan'
            }
        });

        $('input[name="dates"]').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
            var range = $('#dates').val();
            var date = range.split(" - ");
            var obj_tgl_mulai = new Date(Date.parse(date[0]));
            var obj_tgl_akhir = new Date(Date.parse(date[1]));

            var month_custom = obj_tgl_mulai.getMonth() < 10 ? '0' + (obj_tgl_mulai.getMonth() + 1) : (obj_tgl_mulai.getMonth() + 1);
            tgl_mulai_filter = obj_tgl_mulai.getFullYear() + "-" + month_custom + "-" + obj_tgl_mulai.getDate();

            var month_custom_2 = obj_tgl_akhir.getMonth() < 10 ? '0' + (obj_tgl_akhir.getMonth() + 1) : (obj_tgl_akhir.getMonth() + 1);
            tgl_akhir_filter = obj_tgl_akhir.getFullYear() + "-" + month_custom_2 + "-" + obj_tgl_akhir.getDate();
        });

        $('input[name="dates"]').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
            tgl_mulai_filter = '';
            tgl_akhir_filter = '';
        });

    });
    document.addEventListener("DOMContentLoaded", function() {

        var elements = document.getElementsByTagName("input");
        for (var i = 0; i < elements.length; i++) {
            elements[i].oninvalid = function(e) {
                e.target.setCustomValidity("");
                if (!e.target.validity.valid) {
                    e.target.setCustomValidity("Mohon isi kolom tersebut");
                }
            };
            elements[i].oninput = function(e) {
                e.target.setCustomValidity("");
            };
        }
    })

    function checkall(box) {
        let Checkboxes = document.getElementsByTagName('input');
        if (box.checked) {
            for (let i = 0; i < Checkboxes.length; i++) {
                if (Checkboxes[i].type == 'checkbox') {
                    Checkboxes[i].checked = true;

                }

            }

        } else {
            for (let i = 0; i < Checkboxes.length; i++) {
                if (Checkboxes[i].type == 'checkbox') {
                    Checkboxes[i].checked = false;

                }

            }
        }
    }


    // $('#btn_delete').click(function() {
    //     if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
    //         var id = [];

    //         $(':checkbox:checked').each(function(i) {
    //             id[i] = $(this).val();
    //         });

    //         if (id.length === 0) {
    //             alert("Pilih minimal satu data");
    //         } else {
    //             $.ajax({
    //                 url: 'delete.php',
    //                 method: 'POST',
    //                 data: {
    //                     id: id
    //                 },
    //                 success: function() {
    //                     for (var i = 0; i < id.length; i++) {
    //                         $('tr#' + id[i] + '').fadeOut('slow');
    //                     }
    //                 }
    //             });
    //         }
    //     } else {
    //         return false;
    //     }
    // });
    $('#delete_all_kontak').click(function() {
        // const swalWithBootstrapButtons = Swal.mixin({
        //     customClass: {
        //         confirmButton: 'btn btn-success',
        //         cancelButton: 'btn btn-danger'
        //     },
        //     buttonsStyling: false
        // })
        // swalWithBootstrapButtons.fire({
        //     title: 'Apa Anda Yakin?',
        //     text: "Data Akan terhapus Permanen!!",
        //     icon: 'warning',
        //     showCancelButton: true,
        //     confirmButtonText: 'Ya, Hapus!',
        //     cancelButtonText: 'Tidak, Batalkan!',
        //     reverseButtons: true
        // })

        if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
            var id = [];

            $(':checkbox:checked').each(function(i) {
                id[i] = $(this).val();
            });


            if (id.length === 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Data Kosong',
                    text: 'Pilih Data Yang Akan Dihapus!',
                })
                // alert("Pilih minimal satu data");
            } else {
                $.ajax({
                    url: "<?php echo site_url('kontakwa/detele_all'); ?>",
                    method: 'POST',
                    data: {
                        id: id
                    },
                    success: function() {
                        swal.fire({
                            tittle: 'Data',
                            text: 'Berhasil ' + flashdata,
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 900
                        });
                        for (var i = 0; i < id.length; i++) {
                            $('tr#' + id[i] + '').fadeOut('slow');
                            location.reload(true);
                        }

                    }
                });
            }
        } else {
            return false;
        }
    });
    $('#addNewModal').on('hidden.bs.modal', function(e) {
        $(this)
            .find("input,textarea,select")
            .val('')
            .end()
        $(".select2").val([]).trigger("change")
            .find("input[type=checkbox], input[type=radio]")
            .prop("checked", "")
            .end();
    })
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {
            'placeholder': 'mm/dd/yyyy'
        })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });
        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker({
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        })

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        });

        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });
    })

    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
</body>

</html>