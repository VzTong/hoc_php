<?php

/*
 * Thay "php_common_function" bằng tên thư mục của bạn ở htdocs
 */

// Thư mục gốc ở htdocs (đối với XAMPP)
define('ROOT_PATH', "/php1/unit2");

// Thư mục chứa file asset (css/js/img)
define('ASSET_PATH', "/php1/unit2/asset");

// Thư mục chứa file upload bởi user
define('UPLOAD_PATH', "/php1/unit2/upload");

// Đường dẫn đầy đủ đến thư mục hiện tại, không cần chỉnh sửa nếu dùng XAMPP
define('DOCUMENT_ROOT_PATH', $_SERVER["DOCUMENT_ROOT"]);

// Thông tin đăng nhập database
$database = [
	"host" => "localhost",
	"db" => "study_php",
	"username" => "root",
	"password" => "",
];
