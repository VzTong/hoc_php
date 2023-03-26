<?php
include("../../include/common.php");

$id = $_GET["id"] ?? -1;

$sql_sel = "select * from students where id=?"; //Chọn lớp có id = _____;
$sql_del = "delete from students where id=?"; //Xóa lớp có id = _____;

$data = db_select($sql_sel, [$id]);

if (empty($data)) {
    js_alert("Không có gì để xóa");
    js_redirect_to("/");
    die;
}

$data = $data[0];

// Xóa file ảnh
remove_file($data["img_path"]);
//Xóa trong database
db_execute($sql_del, [$id]);
js_alert("Xóa thành công");
js_redirect_to("/"); // "/" => lấy file index.php
