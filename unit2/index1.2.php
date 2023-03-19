<?php
include("include/common.php");
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
		</div>

		<table>

			<col style="width: 10%;" />
			<col style="width: 70%;" />
			<col style="width: 20%;" />

			<tr>
				<th>ID</th>
				<th>Lớp</th>
				<th></th>
			</tr>

			<?php
			$data = db_select("select *from classes");

			foreach ($data as $item) {
				$id = $item["id"];
				$name = $item["class_name"];
				// dd($data);
			?>

				<tr>
					<td><?php echo $id ?></td>

					<td><?php echo $name ?></td>

					<td>
						<a href="#" class="btn btn-a">Chi tiết</a>

						<a href="#" class="btn btn-b">Sửa</a>

						<a href="#" class="btn btn-c">Xóa</a>
					</td>

				</tr>

			<?Php
			} ?>

		</table>
	</div>
</body>

</html>