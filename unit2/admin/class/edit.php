<?php
include("../../include/common.php");
check_login();

$id = $_GET["id"] ?? -1;

if (is_method_get()) {
    $sql = "select * from classes where id=?";
    $data = db_select($sql, [$id]);
    if (empty($data)) {
        //quay về trang chủ nếu không có dữ liệu
        redirect_to("/");
    }
    $data = $data[0];
} else if (is_method_post()) {
    //Cập nhật dữ liệu
    $name = $_POST["class_name"];
    $sql = "update classes set class_name=? where id=?";
    db_execute($sql, [$name, $id]);
    js_alert("Cập nhật thành công");
    js_redirect_to("/"); //Chuyển hướng về trang chủ
}


$_title = "Edit class";
include("../_header.php");
?>

<div class="box">
    <div class="box box-a" style="width: 700px; height:400px;">
        <h2 class="text_title">Sửa lớp</h2>

        <form method="post" autocomplete="off">
            <label class="box name">Class_name: </label>
            <input class="box text" style="text-align: center;" type="text" name="class_name" required value="<?php echo $data["class_name"]; ?>" /><br>
            <input class="box btn" type="submit" value="Cập nhật lớp" />
        </form>
    </div>
</div>

<?php include("../_footer.php") ?>