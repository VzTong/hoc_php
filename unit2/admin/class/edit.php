<?php
include("../../include/common.php");

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


$_title = "Sửa lớp";
include("../_header.php");
?>

<div class="box">
    <div class="box box-a">
        <form method="post" autocomplete="off">
            <label class="box name">Class_name: </label>
            <input class="box text" type="text" name="class_name" required value="<?php echo $data["class_name"]; ?>" /><br>
            <input class="box btn" type="submit" value="Cập nhật lớp" />
        </form>
    </div>
</div>

<?php include("../_footer.php") ?>