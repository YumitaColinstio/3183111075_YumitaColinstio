<?php

ini_set('display_errors', 'On'); 
error_reporting(E_ALL); 
include_once '../koneksi.php';

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING);
$formid = filter_input(INPUT_POST, 'formid', FILTER_SANITIZE_NUMBER_INT);
$proc = filter_input(INPUT_POST, 'proc', FILTER_SANITIZE_URL);

if ($formid == 0) {
	$query = "INSERT INTO member (email_usr,pas_usr,nama_usr) "
	. "VALUE ('$email','$password','$fullname')";
} elseif ($formid >= 1) {
	if ($proc=='edit'){ 
		if(empty($password)){
		$query = "UPDATE member SET nama_usr = '$fullname', email_usr = '$email' WHERE id_usr=$formid";
	}else {
		$query = "UPDATE member SET pas_usr = '$password', nama_usr = '$fullname', email_usr = '$email' WHERE id_usr=$formid";
	}
} elseif ($proc=='delete') {
$query = "DELETE FROM member WHERE id_usr=$formid";
}
}

$result = mysqli_query($koneksi, $query);

if (!$result) {
$msg[0] = "0";
$msg[1] = mysqli_error($koneksi);
} else {
$query = "select * from member order by nama_usr desc";
$result = mysqli_query($koneksi, $query);
$i = 1;
$list = "";
$msg[0] = "1";
foreach ($result as $value) {
$list .= "<tr>
<td>" . $i . "</td>
<td>" . $value['email_usr'] . "</td>
<td>" . $value['pas_usr'] . "</td>
<td>" . $value['nama_usr'] . "</td>
<td nowrap style=\"text-align: center;\">
<button type=\"button\" onclick=\"showModalEdt(" . $value['id_usr'] . ",'" . $value['nama_usr'] . "');\" class=\"btn btn-warning btn-sm\" title=\"Edit\">
Edit
</button>
<button type=\"button\" onclick=\"showModalDel(" . $value['id_usr'] . ",'" . $value['nama_usr'] . "');\" class=\"btn btn-danger btn-sm\" title=\"Delete\">
Del
</button>
</td>
</tr>";
$i++;
}
$msg[1] = $list;
}
echo json_encode($msg);

?>