<?php
include("../../include/common.php");

if (is_method_post()) {
    //upload và nhận lại filename

    $fullname = $_POST["fullname"] ?? "";

    $dob = $_POST["dob"] ?? "";

    $gender = $_POST["gender"] ?? "";

    $address = $_POST["address"] ?? "";

    $class_id = $_POST["class_id"] ?? "";

    $img_path = upload_and_return_filename("img_path", "student/img");

    //dùng filename nhận được để lưu vào db
    $sql = "insert into students (fullname, dob, gender, address, class_id, img_path)
            values(?,?,?,?,?,?)";

    // $insert_success = db_execute($sql, [$fullname, $dob, $gender, $address, $class_id, $img_path]);

    $params = [$fullname, $dob, $gender, $address, $class_id, $img_path];
    db_execute($sql, $params);

    js_redirect_to("/"); // "/" => lấy file index.php

}

$_title = "Thêm học sinh";
include("../_header.php");

?>

<div class="box">
    <div class="box box-a">
        <form method="post" enctype="multipart/form-data" autocomplete="off">
            <label class="box name">Full name:</label>
            <input class="box text" type="text" name="fullname" required /></br>

            <label class="box name">Dob:</label>
            <input class="box text" type="date" name="dob" required /></br>

            <label class="box name">Gender:</label>
            <label class="box name">
                <input class="box text gender" type="radio" name="gender" value="0" required />
                Nam
            </label>

            <label class="box name">
                <input class="box text gender" type="radio" name="gender" value="1" required />
                Nữ
            </label> </br>

            <label class="box name">Address:</label>
            <input class="box text" type="text" name="address" required /></br>

            <label class="box name">Chooses classs:</label>
            <select name="class_id" class="box text">
                <option value="">-- Chooses classs --</option>
                <?php
                gen_option_ele("classes", "id", "class_name");
                ?>
            </select></br>

            <label class="box name">Chooses avatar:</label>
            <input class="box text img" type="file" name="img_path" accept=".png, .jpg, .jpeg" /></br>

            <input class="box btn" type="submit" value="Insert Student" />
        </form>
    </div>
</div>

<?php include("../_footer.php") ?>