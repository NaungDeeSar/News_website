<?php 
include "include/header.php";
include "include/db.php";					
?>
	<!-- 	navbar end -->
			
	<!-- content start -->
	<div class="container-fluid  py-5 content">
		<div class="container breakingNews">
			<div class="row">
				<div class="col-8 col-md-6 col-lg-3">
					<div class="d-flex justify-content-between align-items-center bg-white shadow" >
						<div class="d-flex flex-row flex-grow-1 flex-fill justify-content-center py-1 text-white px-1 news" style="font-size: 20px;background:#f21dc1; font-family: Arial;">
							<span class="align-items-center" >&nbsp;Category</span>
						</div>
						<?php 
						$id=$_GET['id'];
						$sql="SELECT * FROM category WHERE id=:c_id";
						$stmt=$pdo->prepare($sql);
						$stmt->bindParam(':c_id',$id);
						$stmt->execute();
						$cats=$stmt->fetch(PDO::FETCH_ASSOC);

						 ?>
						<span class="ml-3"><?php echo $cats['name']; ?></span>	

						
					</div>
				</div>
			</div>
		</div>

		<div class="container my-3">	 
			<div class="row">
				<div class="col-lg-8">
					
					<div class="row">
						<?php 
 					
						$id=$_GET['id'];
	
    $sql ="SELECT items.*,category.name as cat_name FROM items INNER JOIN category ON category.id=items.cat_id  WHERE category.id=:c_id ORDER BY items.id DESC LIMIT 4";

                        $stmt=$pdo->prepare($sql);
						$stmt->bindParam(':c_id',$id);
						$stmt->execute();
						$cats=$stmt->fetchAll();

   
							foreach ($cats as $cat) {
						
						
						
						 ?>
						
						<div class="col-lg-6 col-md-6 col-sm-12 blog my-1 py-1"> 						
							<a href="detail.php?id=<?php echo $cat['id'] ?>">
						<img src="admin_info/<?php echo $cat['image'] ?>" class="img-fluid">
							</a>
							<label class="bg-white text-muted">
								<a href="detail.php?id=<?php echo $cat['id'] ?>" class="">
									<?php echo $cat['title'] ?>
								</a>

								<p class="text-muted my-2">
									<?php 
									$str=substr($cat['content'],0,400);
									echo $str.'........';

									 ?>
								</p>
								<h6 class="text-muted">
								<i class="far fa-clock"></i>
							<?php  $date=date($cat['created_at']);
								  echo $date;
								 ?> By Info-Channel</h6>
							</label>
						</div>
						<?php } ?>
					

					
					</div>
					
					<!-- pagination -->
					<nav aria-label="text-center">
						<ul class="pagination pagination-lg">
							<li class="page-item active" aria-current="page">
								<span class="page-link">1</span>
							</li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
						</ul>
					</nav>
					
				</div>

				
				<div class="col-lg-4 col-md-12 col-sm-12 side_right">


					<!-- latest post -->
					<div class="latest_post_right">
						<h6 class="text-dark">Latest News</h6>
						<table class=" table table_latest_post">
							<?php 
							$sql="SELECT * FROM items ORDER BY id  DESC LIMIT 4";
							$stmt=$pdo->prepare($sql);
						
						$stmt->execute();
						$items=$stmt->fetchAll();
						foreach ($items as $item) {
							# code...
						
							 ?>
							<tr>
								<td style="width: 40%">
                                    <a href="detail.php?id=<?php echo $item['id'] ?>">
                                        <img src="admin_info/<?php echo $item['image'] ?>" class="img-fluid">
                                    </a>

								</td>
								<td>
									<a href="detail.php?id=<?php echo $item['id'] ?>" class="text-muted">
										<?php 
									echo $item['title'];

									 ?>
									
									</a>
									<h6 class="text-muted" style="font-size: 13px;">
								<i class="far fa-clock"></i>5th Oct,2020</h6>

								</td>
							</tr>
							
							<?php } ?>


						</table>



					</div>
					<!-- follow -->
					<div class="category_right my-3">
						<h6 class="text-dark">Follow Us</h6>
						<hr>
						<div class="fb-page" data-href="https://www.facebook.com/Info-Channel-109463740923509" data-tabs="timeline" data-width="300" data-height="170" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Info-Channel-109463740923509" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Info-Channel-109463740923509">Info-Channel</a></blockquote></div>
						
					</div>
					
					
					
					
					
				</div>
				
				
			</div>
			<!-- row end -->
			
		</div>
	</div>
	<?php 
include "include/footer.php";
?>