<?php
include("../../include/common.php");

if (is_method_post()) {
    $name = $_POST["class_name"];
    $sql = "insert into classes values(default, ?)";

    $insert_success = db_execute($sql, [$name]);
    js_redirect_to("/"); // "/" => lấy file index.php

}

$_title = "Tạo mới lớp";
include("../_header.php");

?>

<div class="box">
    <div class="box box-a">
        <form method="post" autocomplete="off">
            <label class="box name">Class name:</label>
            <input class="box text" type="text" name="class_name" required /><br>
            <input class="box btn" type="submit" value="Thêm lớp" />
        </form>
    </div>
</div>

<?php include("../_footer.php") ?>