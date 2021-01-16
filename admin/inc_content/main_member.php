<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Manajemen Member</h1>
</div>
<div class="card">
    <div class="card-header">
        <div class="col-lg-8">
        <button type="button" class="btn btn-large btn-primary" onclick="showModal();" style="margin-bottom: 5px;">
            <i data-feather="plus-square" style="margin-bottom: 3px;"></i> Add
        </button>
        <input class="form-control-sm py-3 px-4 border" type="search" value="" placeholder="Search Member" id="search" name="search" onkeyup="search(this.value);">
    </div>
</div>                
<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th style="text-align: center;">NO</th>
                <th style="text-align: center;">EMAIL</th>
                <th style="text-align: center;">PASSWORD</th>
                <th style="text-align: center;">NAMA MEMBER</th>
                <th style="text-align: center;">AKSI</th>
            </tr>
        </thead>
        <tbody id="datalist">
            <?php
            require_once("../koneksi.php");
            $varCnt=0;
            $sql="select * from member order by id_usr desc";
            $result= mysqli_query($koneksi, $sql);
            while($data=mysqli_fetch_assoc($result)){
                $varCnt=$varCnt+1;
                $varKd=$data['email_usr'];
                $varPs=$data['pas_usr'];
                $varNm=$data['nama_usr'];
                $varId=$data['id_usr'];
            ?>
            <tr class="">
                <td style="text-align: center;white-space: nowrap;"><?php echo $varCnt;?></td>
                <td style="text-align: center;white-space: nowrap;"><?php echo $varKd;?></td>
                <td style="text-align: center;white-space: nowrap;"><?php echo $varPs;?></td>
                <td style="text-align: center;white-space: nowrap;"><?php echo $varNm;?></td>
                <td style="text-align: center;white-space: nowrap;">
                    <button type="button" onclick="showModalEdt(<?php echo $varId; ?>,'<?php echo $varNm; ?>');" class="btn btn-warning btn-sm" title="Edit">
                        <span id="fcheck" data-feather="edit"></span>
                    </button>
                    <button type="button" onclick="showModalDel(<?php echo $varId; ?>,'<?php echo $varNm; ?>');" class="btn btn-danger btn-sm" title="Delete">
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
<!-- FORM MODAL -->
<div class="modal fade" id="Modal01" tabindex="-1" role="dialog" aria-labelledby="DialogModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #50c9c3;">
                <h5 class="modal-title" id="ModalLabel01">
                    Member
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="background-color: #96deda;">
                <form id="form01">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="email" class="form-control-label">Email :</label>
                                <input type="hidden" name="formid" id="formid">
                                <input type="hidden" id="proc01" name="proc" value="">
                                <input type="email" id="email" name="email" placeholder="email@dot.com" maxlength="50" class="form-control">
                            </div>                                    
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <label for="password" class="form-control-label">Password :</label>
                                <input type="password" name="password" id="password" placeholder="Password" maxlength="50" class="form-control" required>
                            </div>                                    
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="fullname" class="form-control-label">Nama Lengkap:</label>
                                <input type="text" name="fullname" id="fullname" placeholder="Full Name" maxlength="50" class="form-control" required>
                            </div>                                    
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button onclick="insert();" class="btn btn-success" type="button" data-dismiss="modal">
                    Save
                </button>
                <button class="btn btn-danger" type="button" data-dismiss="modal">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>
<!-- END OF FORM MODAL -->
                    
<!-- Modal Member Delete -->
<div class="modal fade" id="ModalDel" tabindex="-1" role="dialog" aria-labelledby="DialogModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #f857a6;">
                <h5 class="modal-title" id="ModalLabel01">
                    Delete
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="background-color: #f8cdda;">
                <p style="color: red; font-size: larger;text-align: center">Yakin menghapus data berikut..?</p>
                <h3 id="datanama" style="text-align: center; color: #d9534f"></h3>
                <form id="form-del">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="hidden" name="formid" id="iddel">
                                <input type="hidden" id="proc02" name="proc" value="">
                            </div>                                    
                        </div>
                    </div>        
                </form>
            </div>
            <div class="modal-footer">
                <button onclick="delete_data();" class="btn btn-danger" type="button" data-dismiss="modal">
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
    function showModal() {
        $('#formid').val(0);
        $('#email').val('');
        $('#fullname').val('');
        $('#password').val('');
        $('#proc01').val('insert');
        $('#Modal01').modal('show');
        //alert ();
    } 
    function insert() {
        $.ajax({
            type: "POST",
            url: "member_aksi.php",
            data: $("#form01").serialize(),
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
        //alert ("sukses");
    }
            
    function showModalEdt(id,nm) {
        $.ajax({
            type: "POST",
            url: "member_aksi_cari.php",
            data: "proc=edit&datacari="+id,
            cache: false,
            dataType: "json",
            success: function (data) {
                $('#formid').val(data.id_usr);
                $('#email').val(data.email_usr);
                $('#fullname').val(data.nama_usr);
                $('#proc01').val('edit');
                $('#Modal01').modal('show');
            },
            error: function (err) {
                console.log(err);
            }
        });
    }
            
    function search(srch) {
        $.ajax({
            type: "POST",
            url: "member_aksi_cari.php",
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
    function showModalDel(id,nm) {
        $('#iddel').val(id);
        $('#datanama').text(nm);
        $('#proc02').val('delete');
        $('#ModalDel').modal('show');                
    }
    function delete_data() {
        $.ajax({
            type: "POST",
            url: "member_aksi.php",
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
</script>