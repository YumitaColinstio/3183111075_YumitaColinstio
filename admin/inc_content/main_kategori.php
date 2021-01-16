<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Manajemen Kategori</h1>
</div>
<div class="card">
    <div class="card-header">
        <div class="col-lg-8">
        <button type="button" class="btn btn-large btn-primary" onclick="showModalKategori();" style="margin-bottom: 5px;">
            <i data-feather="plus-square" style="margin-bottom: 3px;"></i> Add
        </button>
        <input class="form-control-sm py-3 px-4 border" type="search" value="" placeholder="Search Category" id="searchkategori" name="searchkategori" onkeyup="searchkategori(this.value);">
    </div>    
</div>
<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th style="text-align: center;">NO</th>
                <th style="text-align: center;">KODE</th>
                <th style="text-align: center;">NAMA KATEGORI</th>
                <th style="text-align: center;">AKSI</th>
            </tr>
        </thead>
        <tbody id="kategorilist">
            <?php
            require_once("../koneksi.php");
            $varCnt=0;
            $sql="select * from produk_kategori order by id desc";
            $result= mysqli_query($koneksi, $sql);
            while($data=mysqli_fetch_assoc($result)){
                $varCnt=$varCnt+1;
                $varKd=$data['kategori_kode'];
                $varNm=$data['kategori_nama'];
                $varId=$data['id'];
            ?>
            <tr class="">
                <td style="text-align: center;white-space: nowrap;"><?php echo $varCnt;?></td>
                <td style="text-align: center;white-space: nowrap;"><?php echo $varKd;?></td>
                <td style="text-align: center;white-space: nowrap;"><?php echo $varNm;?></td>
                <td style="text-align: center;white-space: nowrap;">
                    <button type="button" onclick="showModalKatEdt(<?php echo $varId; ?>,'<?php echo $varNm; ?>');" class="btn btn-warning btn-sm" title="Edit">
                        <span id="fcheck" data-feather="edit"></span>
                    </button>
                    <button type="button" onclick="showModalKatDel(<?php echo $varId; ?>,'<?php echo $varNm; ?>');" class="btn btn-danger btn-sm" title="Delete">
                        <span id="ftrash2" data-feather="trash-2"></span>
                    </button>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
                    
<!-- FORM KATEGORI MODAL -->
<div class="modal fade" id="ModalKategori" tabindex="-1" role="dialog" aria-labelledby="DialogModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #79a616">
                <h5 class="modal-title" id="ModalLabel01">
                    Kategori
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="background-color: #e1f2b8">
                <form id="form-kategori">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="kategorikode" class="form-control-label">Kode :</label>
                                <input type="hidden" name="kategoriid" id="kategoriid">
                                <input type="hidden" id="proc01" name="proc" value="">
                                <input type="text" id="kategorikode" name="kategorikode" placeholder="Kode" maxlength="20" class="form-control">
                            </div>                                    
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <label for="kategorikode" class="form-control-label">Nama Kategori :</label>
                                <input type="text" name="kategorinama" id="kategorinama" placeholder="Nama Kategori" maxlength="50" class="form-control">
                            </div>                                    
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button onclick="insertKategori();" class="btn btn-success" type="button" data-dismiss="modal">
                    Save
                </button>
                <button class="btn btn-danger" type="button" data-dismiss="modal">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>
<!-- END OF FORM KATEGORI MODAL -->
                    
<!-- Modal Kategori Delete -->
<div class="modal fade" id="ModalKatDel" tabindex="-1" role="dialog" aria-labelledby="DialogModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #f857a6;">
                <h5 class="modal-title" id="ModalLabel01">
                    Kategori Delete
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="background-color: #f8cdda;">
                <p style="color: red; font-size: larger;text-align: center">Yakin menghapus data berikut..?</p>
                <h3 id="katnama" style="text-align: center; color: #d9534f"></h3>
                <form id="form-katdel">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="hidden" name="kategoriid" id="katiddel">
                                <input type="hidden" id="proc02" name="proc" value="">
                            </div>                                    
                        </div>
                    </div>        
                </form>
            </div>
            <div class="modal-footer">
                <button onclick="deleteKategori();" class="btn btn-danger" type="button" data-dismiss="modal">
                    Delete
                </button>
                <button class="btn btn-info" type="button" data-dismiss="modal">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>
<!-- End Of Modal Delete -->

<!-- Modal Error Aksi -->
<div class="modal fade" id="ModalError" tabindex="-1" role="dialog" aria-labelledby="DialogModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #d9534f;">
                <h5 class="modal-title" id="ModalLabel01">
                    ERROR...!!!
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="background-color:#BBD6EC;">
                <h3 id="errnama" style="text-align: center; color: #d9534f"></h3>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>
<!-- End Of Modal Error Aksi -->

        </main>
    </div>
</div>

<script>
    function showModalKu1() {
        $('#ModalKu1').modal('show');                
    } 
    function showModalKategori() {
        $('#kategoriid').val(0);                
        $('#kategorikode').val('');
        $('#kategorinama').val('');
        $('#proc01').val('insert');
        $('#ModalKategori').modal('show');                
    } 
    function insertKategori() {
        $.ajax({
            type: "POST",
            url: "kategori_aksi.php",
            data: $("#form-kategori").serialize(),
            cache: false,
            dataType: "json",
            success: function (data) {
                if(data[0]==0){
                    $('#errnama').text(data[1]);
                    $('#ModalError').modal('show');
                }else{
                    $("#kategorilist").html(data[1]);
                }
            },
            error: function (err) {
                console.log(err);
            }
        });
    }
            
    function showModalKatEdt(id,nm) {
        $.ajax({
            type: "POST",
            url: "kategori_aksi_cari.php",
            data: "proc=edit&datacari="+id,
            cache: false,
            dataType: "json",
            success: function (data) {
                $('#kategoriid').val(data.id);
                $('#kategorikode').val(data.kategori_kode);
                $('#kategorinama').val(data.kategori_nama);
                $('#proc01').val('edit');
                $('#ModalKategori').modal('show');
            },
            error: function (err) {
                console.log(err);
            }
        });
    }
            
    function searchkategori(srch) {
        $.ajax({
            type: "POST",
            url: "kategori_aksi_cari.php",
            data: { datacari: srch },
            cache: false,
            dataType: "json",
            success: function (data) {
                if(data[0]==0){
                    alert(data[1]);
                }else{
                    $("#kategorilist").html(data[1]);
                }
                        
            },
            error: function (err) {
                console.log(err);
            }
        });
    }
    function showModalKatDel(id,nm) {
        $('#katiddel').val(id);
        $('#katnama').text(nm);
        $('#proc02').val('delete');
        $('#ModalKatDel').modal('show');                
    }
    function deleteKategori() {
        $.ajax({
            type: "POST",
            url: "kategori_aksi.php",
            data: $("#form-katdel").serialize(),
            cache: false,
            dataType: "json",
            success: function (data) {
                if(data[0]==0){
                    $('#errnama').text(data[1]);
                    $('#ModalError').modal('show');
                }else{
                    $("#kategorilist").html(data[1]);
                }
            },
            error: function (err) {
                console.log(err);
            }
        });
    }
</script>