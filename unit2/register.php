<?php
include("include/common.php");


if (is_method_post()) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cf_password = $_POST["cf_password"];
    if ($password != $cf_password) {
        js_alert("Nhập mật khẩu không khớp !!");
        js_redirect_to("register.php");
        die;
    }

    $sql_int = "insert into users values (default, ?, ?)";

    // $sql_sel = "select * from users where username=?";
    // $data = db_select($sql_sel, [$username]);

    // if (!empty($data)) {
    //     js_alert("Tài khoản đã tồn tại!!!");
    //     js_redirect_to("/");
    //     die;
    // }

    // $data = $data[0];

    /* Cách kiểm tra 2 */
    if (isUsernameExists($username)) {
        js_alert("Tài khoản đã tồn tại!!!");
        js_redirect_to("/");
        die;
    }

    // Độ dài của hash (Độ phức tạp tg của thuật toán)
    $options = [
        "cost" => 12
    ];

    $password_hash = password_hash($password, PASSWORD_DEFAULT, $options);
    $params = [$username, $password_hash];

    db_execute($sql_int, $params);
    js_alert("Tạo thành công");
    js_redirect_to("/");
}

/* kiểm tra tài khoản đã tồn tại hay chưa */
function isUsernameExists(string $username): bool
{
    $sql_sel = "select * from users where username=?";
    $data = db_select($sql_sel, [$username]);
    return !empty($data);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="<?php asset("css/style.css"); ?>" />

</head>

<body>
    <div class="box">
        <div class="box box-d-up">
            <h2 class="text_title">Đăng kí tài khoản</h2>

            <form  enctype="multipart/form-data" method="post">
                <div>
                    <label class="box name">Tên đăng nhập</label>
                    <input class="box text" type="text" name="username" minlength="4"maxlength="20" autocomplete="off"  require />
                </div>
                <br />

                <div>
                    <label class="box name">Mật khẩu</label>
                    <input class="box text" type="password" name="password" minlength="4" autocomplete="off" require />
                </div>
                <br />

                <div>
                    <label class="box name">Nhập lại mật khẩu</label>
                    <input class="box text" type="password" name="cf_password" minlength="4" autocomplete="off" require />
                </div>
                <br />

                <div>
                    <input class="box btn" type="submit" value="Đăng ký" />
                </div>
            </form>
        </div>
    </div>
</body>

</html>