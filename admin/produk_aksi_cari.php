<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);
include_once '../koneksi.php';

$datacari = filter_input(INPUT_POST, 'datacari', FILTER_SANITIZE_URL);
$proc = filter_input(INPUT_POST, 'proc', FILTER_SANITIZE_URL);

if (empty($proc)) {
    $query = "select * from produk where br_id like '%$datacari%' or br_nm like '%$datacari%' order by br_id desc";
    $result = mysqli_query($koneksi, $query);
    $i = 1;
    $list = "";
    $msg[0] = "1";
    foreach ($result as $value) {
        $list .= "<tr>
                <td>" . $i . "</td>
                <td>" . $value['br_nm'] . "</td>
                <td>" . $value['br_hrg'] . "</td>
                <td>" . $value['br_stok'] . "</td>
                <td>" . $value['ket'] . "</td>
                <td>
                    <img class=\"mb-4\" src=\"../" . $value['br_gbr'] . "\" alt=\"\" style=\"max-width: 100px;height: auto;\">
                </td>
                <td nowrap style=\"text-align: center;\">
                    <button type=\"button\" onclick=\"showModalKatEdt(" . $value['br_id'] . ",'" . $value['br_nm'] . "');\" class=\"btn btn-success btn-sm\" title=\"Delete\">
                         Edit
                    </button>
                    <button type=\"button\" onclick=\"showModalKatDel(" . $value['br_id'] . ",'" . $value['br_nm'] . "');\" class=\"btn btn-danger btn-sm\" title=\"Delete\">
                         Del
                    </button>
                </td>
            </tr>";
        $i++;
    }
    $msg[1] = $list;
    echo json_encode($msg);
    exit();
} else {
    $query = "select * from produk where br_id='$datacari'";
    $result = mysqli_query($koneksi, $query);
    $list = mysqli_fetch_array($result);
    echo json_encode($list);
    exit();
}

