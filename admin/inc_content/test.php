<script>
	function showModalAdd() {
		$('#id01').val(0);                
		$('#ket').val('');
		$('#harga').val('');
		$('#stok').val('');
		$('#nama').val('');
		$("#gambarnya").attr('src','');
		$("#userImage").val('');
		$("#katnama").val('');
		$("#filenm").val('');
		$("#proc01").val('new');
		$('#Modal01').modal('show');                
	} 
	function insertdata() {
		var id=document.getElementById('id01').value;
		var nama=document.getElementById('nama').value;
		var proc=document.getElementById('proc01').value;
		var katnama=document.getElementById('katnama').value;
		var harga=document.getElementById('harga').value;
		var stok=document.getElementById('stok').value;
		var ket=document.getElementById('ket').value;
		var filenm=document.getElementById('filenm').value;
		var ofile=document.getElementById('userImage').files[0];
		var formdata = new FormData();
		formdata.append("id",id);
		formdata.append("nama",nama);
		formdata.append("proc",proc);
		formdata.append("katnama",katnama);
		formdata.append("harga",harga);
		formdata.append("stok",stok);
		formdata.append("ket",ket);
		formdata.append("filename",filenm);
		formdata.append("media",ofile);
		$.ajax({
			type: "POST",
			url: "produk_aksi.php",
			data: formdata,
			cache: false,
			async: false,
			dataType: "json",
			mimeTypes:"multipart/form-data",
			contentType: false,
			processData: false,
			success: function (data) {
				if(data[0]==0){
					alert(data[1]);
				}else{
					$("#datalist").html(data[1]);
				}
			},
			error: function (err) {
				console.log(err);
			}
		});
	}
	function showModalEdt(id,nm) {
		$.ajax({
			type: "POST",
			url: "produk_aksi_cari.php",
			data: "proc=edit&datacari="+id,
			cache: false,
			dataType: "json",
			success: function (data) {
			$('#id01').val(id);                
			$('#harga').val(data.br_hrg);
			$('#stok').val(data.br_stok);
			$('#nama').val(data.br_nm);
			$("#userImage").val('');
			$("#gambarnya").attr('src', "../"+data.br_gbr);
			$('#ket').val(data.ket);
			$("#katnama").val(data.br_kat);
			$("#proc01").val('edit');
			$("#filenm").val(data.br_gbr);
			$('#Modal01').modal('show');
			},
			error: function (err) {
				console.log(err);
			}
		});
	}
	function searchdt(srch) {
		$.ajax({
			type: "POST",
			url: "produk_aksi_cari.php",
			data: { datacari: srch },
			cache: false,
			dataType: "json",
			success: function (data) {
				if(data[0]==0){
					alert(data[1]);
				}else{
					$("#datalist").html(data[1]);
				}
				
			},
			error: function (err) {
				console.log(err);
			}
		});
	}
	function showModalDel(id,nm,filename) {
		$('#dataiddel').val(id);
		$('#datanama').text(nm);
		$('#filename').val(filename);
		$('#proc02').val('delete');
		$('#ModalDel').modal('show');                
	}
	function deleteData() {
		$.ajax({
			type: "POST",
			url: "produk_aksi.php",
			data: $("#form-del").serialize(),
			cache: false,
			dataType: "json",
			success: function (data) {
				if(data[0]==0){
					$('#errnama').text(data[1]);
					$('#ModalError').modal('show');
				}else{
					$("#datalist").html(data[1]);
				}
			},
			error: function (err) {
				console.log(err);
			}
		});
	}
	
	function isNumberKey(evt){
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
		return true;
	}            
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#gambarnya').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>
