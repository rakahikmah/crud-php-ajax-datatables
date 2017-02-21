// glonal untuk keseluruhan table
var manageMahasiswaTable;

$(document).ready(function(){
    manageMahasiswaTable = $("#manageMahasiswaTable").DataTable({
        "ajax": "process/tampildata.php",
        "order": []
    });

    $('#TambahDataMhsBtn').on('click',function(){
    	//reset form data yang dimodal
    	$('#tambahDataMhsForm')[0].reset();
    	$('.form-group').removeClass('has-error').removeClass('has-success');
    	$('.text-danger').remove();
    	$('.messages').html("");

    	$('#tambahDataMhsForm').unbind('submit').bind('submit',function(){
    		$('.text-danger').remove();
            var form = $(this);

    		
    		//validasi  untuk mengecek apakah data kosong pada form
    		var nim = $('#nim').val();
    		var nama = $('#nama').val();
    		var alamat = $('#alamat').val();
    		var tgllahir = $('#tgllahir').val();
    		var telp = $('#telp').val();
    		var jenis_kel =$('input[name=jenis_kel]:checked', '#tambahDataMhsForm').val();
    		var fakultas = $('#fakultas').val();
    		var jurusan = $('#jurusan').val();
    		var agama = $('#agama').val();

    		if (nim == ""){
    			$('#nim').closest('.form-group').addClass('has-error');
    			$('#nim').after('<p class="text-danger">NIM mahasiswa harus terisi</p>');
    		}else{
    			$('#nim').closest('.form-group').removeClass('has-error');
    			$('#nim').closest('.form-group').addClass('has-success');
    		}

    		if (nama == ""){
    			$('#nama').closest('.form-group').addClass('has-error');
    			$('#nama').after('<p class="text-danger">nama mahasiswa harus terisi</p>');
    		}else{
    			$('#nama').closest('.form-group').removeClass('has-error');
    			$('#nama').closest('.form-group').addClass('has-success');
    		}

    		if (alamat == ""){
    			$('#alamat').closest('.form-group').addClass('has-error');
    			$('#alamat').after('<p class="text-danger">alamat mahasiswa harus terisi</p>');
    		}else{
    			$('#alamat').closest('.form-group').removeClass('has-error');
    			$('#alamat').closest('.form-group').addClass('has-success');
    		}

    		if (tgllahir == ""){
    			$('#tgllahir').closest('.form-group').addClass('has-error');
    			$('.input-group').after('<p class="text-danger">tanggal mahasiswa harus terisi</p>');
    		}else{
    			$('#tgllahir').closest('.form-group').removeClass('has-error');
    			$('#tgllahir').closest('.form-group').addClass('has-success');
    		}

    		if (telp == ""){
    			$('#telp').closest('.form-group').addClass('has-error');
    			$('#telp').after('<p class="text-danger">telepon mahasiswa harus terisi</p>');
    		}else{
    			$('#telp').closest('.form-group').removeClass('has-error');
    			$('#telp').closest('.form-group').addClass('has-success');
    		}

    		if (fakultas == ""){
    			$('#fakultas').closest('.form-group').addClass('has-error');
    			$('#fakultas').after('<p class="text-danger">fakultas mahasi terisi</p>');
    		}else{
    			$('#fakultas').closest('.form-group').removeClass('has-error');
    			$('#fakultas').closest('.form-group').addClass('has-success');
    		}

    		if (!jurusan){
    			$('#jurusan').closest('.form-group').addClass('has-error');
    			$('#jurusan').after('<p class="text-danger">jurusan mahasiswa harus tesi</p>');
    		}else{
    			$('#jurusan').closest('.form-group').removeClass('has-error');
    			$('#jurusan').closest('.form-group').addClass('has-success');
    		}

    		if (!jenis_kel) {          
				$('#jenis_kel').closest('.form-group').addClass('has-error');
    			$('.error-jeniskelamin').html('<p class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;jenis kelamin mahasiswa harus terisi</p>');
			}else{
    			$('#jenis_kel').closest('.form-group').removeClass('has-error');
    			$('#jenis_kel').closest('.form-group').addClass('has-success');
    		}			

    		if (agama == ""){
    			$('#agama').closest('.form-group').addClass('has-error');
    			$('#agama').after('<p class="text-danger">agama mahasiswa harus terisi</p>');
    		}else{
    			$('#agama').closest('.form-group').removeClass('has-error');
    			$('#agama').closest('.form-group').addClass('has-success');
    		}		

            //proses dari tombol submit dengan menggunakan ajax
    		if (nim && nama && alamat && tgllahir && telp && fakultas && jurusan && jenis_kel && agama ) {
                $.ajax({
                    url : form.attr('action'),
                    type : form.attr('method'),
                    data : form.serialize(),
                    dataType :'json',
                    success:function(response){
                        // remove pesan error
                        $('.form-group').removeClass('has-error').removeClass('has-success');

                        if (response.success == true) {
                            $(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                              '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
                            '</div>');

                            //reset form 
                            $('#tambahDataMhsForm')[0].reset();
                            //reload the datatables
                            manageMahasiswaTable.ajax.reload(null,false);
                        }else{
                            $(".messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                              '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
                            '</div>');
                        }
                    }
                });
            }
    		return false;
    	});
    });
});


function hapusData(nim = null) {
    if(nim) {
        // click on remove button
        $("#hapusBtn").unbind('click').bind('click', function() {
            $.ajax({
                url: 'process/hapusData.php',
                type: 'post',
                data: {nim_mhs : nim},
                dataType: 'json',
                success:function(response) {
                    if(response.success == true) {                      
                        $(".pesanHapus").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                              '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
                            '</div>');

                        // refresh the table
                        manageMahasiswaTable.ajax.reload(null, false);

                        // close the modal
                        

                    } else {
                        $(".pesanHapus").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                              '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
                            '</div>');
                    }
                }
            });
        }); // click remove btn
    } else {
        alert('Error: Refresh the page again');
    }
}





function editData(nim = null) {
    if(nim) {

        // remove the error 
        $(".form-group").removeClass('has-error').removeClass('has-success');
        $(".text-danger").remove();
        // empty the message div
        $(".edit-messages").html("");

        
        

        // fetch the member data
        $.ajax({
            url: 'process/permahasiswa.php',
            type: 'post',
            data: {nim_mhs :nim },
            dataType: 'json',
            success:function(response) {
                var tgllahir = response.tgllahir;
                var dateAr = tgllahir.split('-');
                var newDate = dateAr[2] + '/' + dateAr[1] + '/' + dateAr[0];
                
                $('#editnim').val(response.nim);
                $('#editagama').val(response.agama);
                $('input[name="editjenis_kel"][value="'+(response.jenis_kel=='Perempuan'?'Perempuan':'Laki-laki')+'"]').prop( "checked", true );
                $('#edittgllahir').val(newDate);
                $('#editfakultas').val(response.fakultas);
                $('#editnama').val(response.nama);
                $('#editjurusan').val(response.jurusan);
                $('#edittelp').val(response.telp);
                $('#editalamat').val(response.alamat);

                // here update the member data
                $("#editDataMhsForm").unbind('submit').bind('submit', function() {
                    // remove error messages
                    $(".text-danger").remove();

                    var form = $(this);

                    // validation
                    var editnim = $('#editnim').val();
                    var editnama = $('#editnama').val();
                    var editalamat = $('#editalamat').val();
                    var edittgllahir = $('#edittgllahir').val();
                    var edittelp = $('#edittelp').val();
                    var editjenis_kel =$('input[name=editjenis_kel]:checked').val();
                    var editfakultas = $('#editfakultas').val();
                    var editjurusan = $('#editurusan').val();
                    var editagama = $('#editagama').val();

                    if (editnim == ""){
                        $('#editnim').closest('.form-group').addClass('has-error');
                        $('#editnim').after('<p class="text-danger">editNIM mahasiswa harus terisi</p>');
                    }else{
                        $('#editnim').closest('.form-group').removeClass('has-error');
                        $('#editnim').closest('.form-group').addClass('has-success');
                    }

                    if (editnama == ""){
                        $('#editnama').closest('.form-group').addClass('has-error');
                        $('#editnama').after('<p class="text-danger">editnama mahasiswa harus terisi</p>');
                    }else{
                        $('#editnama').closest('.form-group').removeClass('has-error');
                        $('#editnama').closest('.form-group').addClass('has-success');
                    }

                    if (editalamat == ""){
                        $('#editalamat').closest('.form-group').addClass('has-error');
                        $('#editalamat').after('<p class="text-danger">editalamat mahasiswa harus terisi</p>');
                    }else{
                        $('#editalamat').closest('.form-group').removeClass('has-error');
                        $('#editalamat').closest('.form-group').addClass('has-success');
                    }

                    if (edittgllahir == ""){
                        $('#edittgllahir').closest('.form-group').addClass('has-error');
                        $('.input-group').after('<p class="text-danger">tanggal mahasiswa harus terisi</p>');
                    }else{
                        $('#edittgllahir').closest('.form-group').removeClass('has-error');
                        $('#edittgllahir').closest('.form-group').addClass('has-success');
                    }

                    if (edittelp == ""){
                        $('#edittelp').closest('.form-group').addClass('has-error');
                        $('#edittelp').after('<p class="text-danger">telepon mahasiswa harus terisi</p>');
                    }else{
                        $('#edittelp').closest('.form-group').removeClass('has-error');
                        $('#edittelp').closest('.form-group').addClass('has-success');
                    }

                    if (editfakultas == ""){
                        $('#editfakultas').closest('.form-group').addClass('has-error');
                        $('#editfakultas').after('<p class="text-danger">editfakultas mahasi terisi</p>');
                    }else{
                        $('#editfakultas').closest('.form-group').removeClass('has-error');
                        $('#editfakultas').closest('.form-group').addClass('has-success');
                    }

                    if (editjurusan == ""){
                        $('#editjurusan').closest('.form-group').addClass('has-error');
                        $('#editjurusan').after('<p class="text-danger">editjurusan mahasiswa harus tesi</p>');
                    }else{
                        $('#editjurusan').closest('.form-group').removeClass('has-error');
                        $('#editjurusan').closest('.form-group').addClass('has-success');
                    }

                    if (editjenis_kel=="") {          
                        $('#editjenis_kel').closest('.form-group').addClass('has-error');
                        $('.error-jeniskelamin').html('<p class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;jenis kelamin mahasiswa harus terisi</p>');
                    }else{
                        $('#editjenis_kel').closest('.form-group').removeClass('has-error');
                        $('#editjenis_kel').closest('.form-group').addClass('has-success');
                    }           

                    if (editagama == ""){
                        $('#editagama').closest('.form-group').addClass('has-error');
                        $('#editagama').after('<p class="text-danger">editagama mahasiswa harus terisi</p>');
                    }else{
                        $('#editagama').closest('.form-group').removeClass('has-error');
                        $('#editagama').closest('.form-group').addClass('has-success');
                    }

                    if(editnim && editnama && editalamat && edittgllahir && edittelp && editfakultas && !editjurusan && editjenis_kel && editagama) {
                        $.ajax({
                            url: form.attr('action'),
                            type: form.attr('method'),
                            data: form.serialize(),
                            dataType: 'json',
                            success:function(response) {
                                if(response.success == true) {
                                    $(".edit-messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                                      '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                                      '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
                                    '</div>');

                                    // reload the datatables
                                    manageMahasiswaTable.ajax.reload(null, false);
                                    // this function is built in function of datatables;

                                    // remove the error 
                                    $(".form-group").removeClass('has-success').removeClass('has-error');
                                    $(".text-danger").remove();
                                } else {
                                    $(".edit-messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                                      '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                                      '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
                                    '</div>')
                                }
                            } // /success
                        }); // /ajax
                    } // /if
                    return false;
                     
                });
                
            } // /success
        }); // /fetch selected member info

    } else {
        alert("Error : Refresh the page again");
    }
}