var flashdata = $('.flash-data').data('flashdata');
console.log(flashdata);
if(flashdata){
    swal.fire({
        tittle : 'Data' ,
        text : 'Berhasil '+ flashdata,
        icon : 'success',
        showConfirmButton: false,
        timer: 1500
    });
}