<?php
include("include/common.php");


$data = db_select("select *from classes"); //db classes

$data2 = db_select("select st.*, cls.class_name from study_php.students st
left join study_php.classes cls on st.class_id = cls.id;"); //db students

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Danh sách lớp</title>

	<link rel="stylesheet" href="<?php asset("css/style.css"); ?>" />

</head>

<body>
	<div class="container">
		<div class="mb-3">
			<a href="admin/class/create.php" class="btn btn-a">Thêm mới lớp</a>
			<a href="register.php" class="btn btn-a">Đăng ký tài khoản</a>
		</div>

		<table>
			<col style="width: 10%;" />
			<col style="width: 70%;" />
			<col style="width: 20%;" />
			<thead>
				<tr>
					<th>ID</th>
					<th>Lớp</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($data as $item) {
					$id = $item["id"];
					$classname = $item["class_name"];

					echo <<<KEY_WORLD
						<tr>
							<td>$id</td>
							<td>$classname</td>

							<td>
								<a href="#" class="btn btn-a">Chi tiết</a>

								<a href="admin/class/edit.php?id=$id" class="btn btn-b">Sửa</a>

								<a href="admin/class/delete.php?id=$id" class="btn btn-c">Xóa</a>
							</td>
						</tr>
KEY_WORLD;
				} ?>
			</tbody>
		</table>
	</div>
	<br />
	<hr />
	<br />


	<div class="container">
		<div class="mb-3">
			<a href="admin/student/create.php" class="btn btn-a">Thêm học sinh</a>
		</div>

		<table style="text-align: center;">
			<col style="width: 5%;" />
			<col style="width: 20%;" />
			<col style="width: 20%;" />
			<col style="width: 10%;" />
			<col style="width: 5%;" />
			<col style="width: 10%;" />
			<col style="width: 10%;" />
			<col style="width: 20%;" />
			<thead>
				<tr>
					<th>ID</th>
					<th>Fullname</th>
					<th>Avatar</th>
					<th>Dob</th>
					<th>Gender</th>
					<th>Address</th>
					<th>Class_name</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($data2 as $item2) {
					$id = $item2["id"];

					$fullname = $item2["fullname"];

					$dob = $item2["dob"];

					$gender = $item2["gender"];

					$address = $item2["address"];

					$class_name = $item2["class_name"];

					$img = upload($item2["img_path"] ?? "", true); // url --> img

					echo <<<KEY_WORLD
						<tr>
							<td>$id</td>
							<td>$fullname</td>
							<td><img src="$img" style="width: 200px; higth:200px"/></td>
							<td>$dob</td>
							<td>$gender</td>
							<td>$address</td>
							<td>$class_name</td>


							<td>
								<a href="#" class="btn btn-a">Chi tiết</a>

								<a href="admin/student/edit.php?id=$id" class="btn btn-b">Sửa</a>

								<a href="admin/student/delete.php?id=$id" class="btn btn-c">Xóa</a>
							</td>
						</tr>
KEY_WORLD;
				} ?>
			</tbody>
		</table>
	</div>
</body>

</html>

<!--
	phía sau dấu ? là khai báo tên của biến
	?? $id lấy địa chỉ của biến
 -->