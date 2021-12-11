<?php include "db.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Info Channel</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		/*--------------------------------------------------------------
/*moblie view menu*/

.sidenav  {
  width: 0;
  position: fixed;
  z-index: 99;
  height: 100%;
  top: 0px;
  left: 0;
  background-color:#FAFBFC;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
 color: blue;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: #111;
  color: white;
  padding: 10px 15px;
  border: none;
}

.openbtn:hover {
  background-color:#444;
}

	</style>
</head>
<body>
	<!-- 	header -->
	<div class="container-fluid bg-danger py-1">
		<div class="container">
			<span id="day" class="date py-1"></span>
		</div>	
	</div>
	<header class="container-fluid py-1 bg-white">
		<div class="container py-2">
			<div class="logo-bg">
				<a href="home.php">
					<img src="img/logo.png" class="img-fluid">
				</a>
				<span class="text-danger ml-3">Info</span> <span class="text-muted"> -
				Channel</span>
			</div>

		</div>		

	</header>
	<!-- header end -->

	<!-- navbar start -->
	<nav class="navbar navbar-expand-lg  navbar-light py-3 menu">
		<div class="container">		

			<button class="navbar-toggler" data-toggle="collapse" class="openbtn" onclick="openNav()">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a href="home.php" class="title">
				<img src="img/info2.png">
			</a>
			<i class="fas fa-search menu_search"></i>
			<div class="search-box">
                <form action="search.php" method="post" enctype="multipart/form-data">
                    <div class="input-group">
                        <input type="text" class="search_text my-3 ml-4" placeholder="search" name="search">
                        <span class="input-group-btn ">
						<button class="btn btn-default" type="submit" value="search">
							<i class="fas fa-search"></i>
						</button>
					</span>
                    </div>

                </form>

			</div>	
 						<!-- mobile view -->
			<div class="sidenav shadow bg-white" id="mySidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
				  <a href="home.php">ပင်မစာမျက်နှာ</a>
				  <?php 
					$sql="SELECT * FROM category";
					$stmt=$pdo->prepare($sql);
					$stmt->execute();
					$cats=$stmt->FetchAll();

					foreach ($cats as $cat) {
						# code...
					
					 ?>
				  
				   <a href="category.php?id=<?php echo $cat['id'] ?>"><?php  echo $cat['name']; ?></a>
				   <?php } ?>
			</div>
		
					<!-- navegation view -->
			<div class="collapse navbar-collapse">
				<ul class="navbar-nav font-weight-bold">
					<li class="nav-item active">
						<a href="home.php" class="nav-link">ပင်မစာမျက်နှာ</a>
					</li>
					<?php 
					$sql="SELECT * FROM category";
					$stmt=$pdo->prepare($sql);
					$stmt->execute();
					$cats=$stmt->FetchAll();

					foreach ($cats as $cat) {						
					
					 ?>
					<li class="nav-item">
						<a href="category.php?id=<?php echo $cat['id'] ?>" class="nav-link">
							<?php  echo $cat['name']; ?></a>
					</li>
				<?php } ?>

					

				</ul>
				<ul class="navbar-nav ml-auto search_btn">

					<li class="nav-item">
						<i class="fas fa-search"></i>
						<div class="search-box">
                            <form action="search.php" method="post" enctype="multipart/form-data">
                                <div class="input-group">
                                    <input type="text" class="search_text my-3 ml-4" placeholder="search" name="search">
                                    <span class="input-group-btn ">
						    <button class="btn btn-default" type="submit" value="search">
							<i class="fas fa-search"></i>
						    </button>
					        </span>
                                </div>

                            </form>
						</div>

					</li>


				</ul>

			</div>
		</div>
	</nav>
	