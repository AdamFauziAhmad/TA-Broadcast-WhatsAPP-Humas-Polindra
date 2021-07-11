var flashdata = $('.flash-data').data('flashdata');
var flashdata_in_db =$('.flash-data').data('flashdataindb');

if(flashdata){
    swal.fire({
        tittle : 'Data' ,
        text : 'Berhasil '+ flashdata,
        icon :'warning',
        showConfirmButton: false,
        timer: 1500
    });
} 

