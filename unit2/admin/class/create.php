<?php
include("../../include/common.php");
check_login();

if (is_method_post()) {
    $name = $_POST["class_name"];
    $sql = "insert into classes values(default, ?)";

    $insert_success = db_execute($sql, [$name]);
    js_redirect_to("/"); // "/" => lấy file index.php

}

$_title = "Create new class";
include("../_header.php");

?>

<div class="box">
    <div class="box box-b">
        <h2 class="text_title">Tạo mới lớp</h2>

        <form method="post" autocomplete="off">
            <label class="box name">Class name:</label>
            <input class="box text" style="text-align: center;" type="text" name="class_name" required /><br>
            <input class="box btn" type="submit" value="Thêm lớp" />
        </form>
    </div>
</div>

<?php include("../_footer.php") ?>