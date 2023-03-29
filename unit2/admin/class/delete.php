<?php
include("../../include/common.php");
check_login();

$id = $_GET["id"] ?? -1;

$sql = "delete from classes where id=?"; //Xóa lớp có id = _____;

if (db_execute($sql, [$id])) {

    js_alert("Xóa thành công");
} else {
    js_alert("Không có gì để xóa");
}

js_redirect_to("/"); // "/" => lấy file index.php
