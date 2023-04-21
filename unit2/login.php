<?php
include("include/common.php");

if (is_logged()) {
    js_redirect_to("/");
}

if (is_method_post()) {
    // 1.Nhận thông tin
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    //2.select từ db dựa vào username
    $sql = "select * from `users` where `username`=?";
    $user = db_select($sql, [$username]);

    //3.Nếu kết quá select là rỗng ==> Nhập sai username
    if (empty($user)) {
        js_alert("Tên đăng nhập hoặc mật khẩu không hợp lệ");
        js_redirect_to("login.php");
        die;
    }

    $user = $user[0];

    //4.Nếu kết quả select khác rỗng thì so sánh password trong db vs password ở bước 1
    // --> sử dụng password_verify()
    if (password_verify($password, $user["password"]) == true) {
        //xác thực thông tin đăng nhập thành công
        js_alert("Đăng nhập thành công!!!");
        $_SESSION["username"] = $username;
        $_SESSION["user_id"] = $user["id"];
        js_redirect_to("/");
    } else {
        js_alert("Tên đăng nhập hoặc mật khẩu không hợp lệ");
        js_redirect_to("login.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="<?php asset("css/style.css"); ?>" />

</head>

<body>
    <div class="box">
        <div class="box box-d-in">
            <h2 class="text_title">Đăng Nhập tài khoản</h2>

            <form  enctype="multipart/form-data" method="post">
                <div>
                    <label class="box name">Tên đăng nhập</label>
                    <input class="box text" type="text" name="username" minlength="4" maxlength="20" autocomplete="off"  require/>
                </div>
                <br />

                <div>
                    <labe class="box name">Mật khẩu</labe>
                    <input class="box text" type="password" name="password" minlength="4" autocomplete="off"  require/>
                </div>
                <br />

                <div>
                    <input class="box btn" type="submit" value="Đăng Nhập" />
                </div>
            </form>
        </div>
    </div>
</body>

</html>