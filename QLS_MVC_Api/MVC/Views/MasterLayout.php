<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>QUẢN LÝ KHU VUI CHƠI</title>
	<style type="text/css">
		* {
			margin: 0px
		}

		.header {
			height: 100px;
			background: #251cfb url("http://localhost/QLS_MVC_API/Public/images/logo.png") no-repeat;
			padding: 10px 15px;
			margin-right: 0px;
		}

		.menu {
			height: 45px;
			background: #2f5841;
			margin-top: 0px;
		}

		.menu>ul>li {
			float: left;
			list-style: none;
			padding: 10px 25px;
			position: relative;
		}

		.menu>ul>li>a {
			text-decoration: none;
			color: white;
			font-size: 16px;
		}

		.menu>ul>li:hover {
			display: block;
			background: #00bb55;
		}

		.menu>ul>li>ul {
			display: none;
			background: #3e454c;
			width: 200px;
			position: absolute;
			padding: 0px;
			top: 44px;
			left: 0px;
		}

		.menu>ul>li:hover ul {
			display: block;
			background: #1a1b1a;
		}

		.menu>ul>li>ul>li {
			list-style: none;
			padding: 10px 10px;
			border: 1px dotted gray;
		}

		.menu>ul>li>ul>li>a {
			text-decoration: none;
			color: white;
		}

		.menu>ul>li>ul>li:hover {
			display: block;
			background: #00bb55
		}

		h1 {
			text-shadow: 0 0 3px red;
			text-align: center;
			padding-top: 20px;
			padding-left: 380px;
			color: #f7ef06;
		}

		.footer {
			height: 70px;
			background: #b5d0e3;
		}

		cation {
			text-align: center;
		}
	</style>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">

</head>

<body>

	<div class="container form-group" style="background-color: #e5e4e4 ;    padding-bottom: 25%;">
		<div class="header row">
			<h1>QUẢN LÝ KHU VUI CHƠI</h1>
		</div>
		<div class="menu row">
			<ul>
				<li><a href="http://localhost/QLS_MVC_API/Home">Trang chủ</a></li>
				<li><a href="http://localhost/QLS_MVC_API/Home">Quản lý trò chơi</a>
					<ul>
						<li><a href="http://localhost/QLS_MVC_API/Sach">Thêm trò chơi</a></li>
						<li><a href="http://localhost/QLS_MVC_API/Danhsachsach">Danh sách trò chơi</a></li>
					</ul>
				</li>
				<li><a href="http://localhost/QLS_MVC_API/Home">Quản lý user</a>
					<ul>
						<li><a href="http://localhost/QLS_MVC_API/User">Thêm user</a></li>
						<li><a href="http://localhost/QLS_MVC_API/Danhsachuser">Danh sách user</a></li>
					</ul>
				</li><li><a href="http://localhost/QLS_MVC_API/Home">Quản lý dịch vụ</a>
					<ul>
						<li><a href="http://localhost/QLS_MVC_API/Theloai">Thêm dịch vụ</a></li>
						<li><a href="http://localhost/QLS_MVC_API/Danhsachtheloai">Danh sách dịch vụ</a></li>
					</ul>
				</li>
				<li><a href="http://localhost/QLS_MVC_API/Home">Quản lý vé</a>
					<ul>
						<li><a href="http://localhost/QLS_MVC_API/Donhang">Thêm vé</a></li>
						<li><a href="http://localhost/QLS_MVC_API/Danhsachdonhang">Danh sách vé</a></li>
					</ul>
				</li>
				<li><a href="http://localhost/QLS_MVC_API/Login"><img src="http://localhost/QLS_MVC_API/MVC/Public/images/top_menu_logout.gif">&nbsp;&nbsp;Thoát</a></li>
			</ul>
			
		</div>
		<div>Tài khoản : <?php echo $_SESSION ["taikhoan1"] ?></div>
		<!-- Gọi các trang khác -->
		<?php
		require_once "./MVC/Views/" . $data["page"] . ".php";
		?>

	</div>
</body>

</html>