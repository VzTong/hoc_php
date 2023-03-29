<?php
include("../../include/common.php");
check_login();

$id = $_GET["id"] ?? -1;

if (is_method_get()) {
    $sql = "select * from students where id=?";
    $data = db_select($sql, [$id]);

    $data2 = db_select("select *from classes");
    if (empty($data)) {
        //quay về trang chủ nếu không có dữ liệu
        redirect_to("/");
    }
    $data = $data[0];
} else if (is_method_post()) {
    //Cập nhật dữ liệu

    $fullname = $_POST["fullname"];

    $dob = $_POST["dob"];

    $gender = $_POST["gender"];

    $address = $_POST["address"];

    $class_id = $_POST["class_id"];

    $img_path = upload_and_return_filename("img_path", "student/img"); // url --> img

    if (!empty($img_path)) {
        $sql = "update students set fullname=?, dob=?, gender=?, address=?, class_id=?, img_path=?
        where id=?";

        $params = [$fullname, $dob, $gender, $address, $class_id, $img_path, $id];
        db_execute($sql, $params);
        js_redirect_to("/"); //Chuyển hướng về trang chủ
        die;
    }

    $sql1 = "update students set fullname=?, dob=?, gender=?, address=?, class_id=?
    where id=?";

    $params1 = [$fullname, $dob, $gender, $address, $class_id, $id];
    db_execute($sql1, $params1);


    // js_alert("Cập nhật thành công");
    js_redirect_to("/"); //Chuyển hướng về trang chủ
}


$_title = "Edit student information";
include("../_header.php");
?>

<div class="box">
    <div class="box box-a">

        <h2 class="text_title">Sửa thông tin sinh viên</h2>

        <form method="post" enctype="multipart/form-data" autocomplete="off">

            <?php
            if (!empty($data["img_path"])) { ?>
                <img src="<?php upload($data["img_path"]); ?>" alt="" class="box img">
                <br />
            <?php } ?>

            <label class="box name">Full name:</label>
            <input class="box text" type="text" name="fullname" required value="<?php echo $data["fullname"]; ?>" /></br>

            <label class="box name">Dob:</label>
            <input class="box text" style="text-align: center;" type="date" name="dob" required value="<?php echo $data["dob"]; ?>" />
            </br>

            <label class="box name">Gender:</label>
            <label class="box text">
                <input class="box text gender" type="radio" name="gender" value="0" required <?php echo $data["gender"] == 0 ? "checked" : ""; ?> />
                <span style="color:aliceblue;">Nam</span>

                <input class="box text gender" type="radio" name="gender" value="1" required <?php echo $data["gender"] == 1 ? "checked" : ""; ?> />
                <span style="color:aliceblue;">Nữ</span>
            </label>

            <!-- <label class="box name">
                <input class="box text gender" type="radio" name="gender" value="1" required <_?php echo $data["gender"] == 1 ? "checked" : ""; ?> />
                Nữ
            </label> </br> -->

            <label class="box name">Address:</label>
            <input class="box text" type="text" name="address" required value="<?php echo $data["address"]; ?>" /></br>

            <label class="box name">Chooses classs:</label>
            <select name="class_id" class="box text" style="text-align: center;">
                <?php
                gen_option_ele("classes", "id", "class_name", $data["class_id"]);
                ?>
            </select>
            </br>

            <label class="box name">Chooses avatar:</label>
            <input class="box text img" type="file" name="img_path" accept=".png, .jpg, .jpeg" />

            <input class="box btn" type="submit" value="Update Student" />
        </form>
    </div>
</div>

<?php include("../_footer.php") ?>