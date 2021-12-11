<?php 
include "include/header.php";
?>
	<!-- 	navbar end -->

	<!-- content start -->
	<div class="container-fluid  py-5 content">
		<?php 


		$id=$_GET['id'];
		$sql="SELECT items.*, category.name as cat_name FROM items INNER JOIN category ON items.cat_id=category.id WHERE items.id =:item_id";
		$stmt=$pdo->prepare($sql);
		$stmt->bindParam(':item_id',$id);
		$stmt->execute();
		$items=$stmt->fetch(PDO::FETCH_ASSOC);



		 ?>
		<div class="container breakingNews">
			<div class="row">
				<div class="col-8 col-md-6 col-lg-3">
					<div class="d-flex justify-content-between align-items-center bg-white" >
						<div class="d-flex flex-row flex-grow-1 flex-fill justify-content-center py-1 text-white px-1 news" style="background:#f21dc1;font-size: 20px;font-family: Arial;">
							<span class="align-items-center" >&nbsp;Category</span>
						</div>
						
						<span class="ml-3"><?php echo $items['cat_name']; ?></span>	

						
					</div>
				</div>
			</div>
		</div>
		<div class="container my-3">	 
			<div class="row">
				<div class="col-lg-8 col-md-12 col-sm-12 blog_detail">
					<div class="container">
 					<h5 class="text-danger">
 					<?php echo $items['title']; ?></h5>
 					<h6 class="text-muted py-2">		

 							<i class="far fa-clock"></i>
 							<?php  $date=date($cat['created_at']);
								  echo $date;
								 ?> | <i class="fas fa-user-cog"></i> Info-Channel</h6>
 					<a href="news_detail.html">
 					<img src="admin_info/<?php echo $items['image'] ?>" class="img-fluid">
 					</a>
 					<p class="text-muted my-3">
 								
                        <?php echo $items['content']; ?>


 					</p>
 					<span>
 						<label>Share</label>
 						<br>
 						<a href="https://twitter.com/">
 						<button type="button" value="share" class="btn btn-outline-info">
 							<i class="fab fa-twitter"></i>&nbsp;</i>share
 						</button>
 						</a>
 						<a href="https://facebook.com">
 						<button type="button" value="share" class="btn btn-outline-info">
 							<i class="fab fa-facebook-f">&nbsp;</i>share
 						</button>
 						</a>

 					</span>
 					<hr>
 				    <?php 
 				    // Previous button 

	$sql="SELECT * FROM items WHERE id<$id order by id DESC";
		$stmt=$pdo->prepare($sql);		
		$stmt->execute();
		$row=$stmt->fetch(PDO::FETCH_ASSOC);


 
  echo '<a href="detail.php?id='.$row['id'].'">
  <button type="button" class="btn btn-success"><img src="img/prev.png" ></button>
  </a>';  



?>

 				    
 				
 				    <span style="float: right;">
 				    	<?php
 				    	$id = $_GET['id']; 
 				    	// Next button 
 	$sql="SELECT * FROM items WHERE id>$id order by id ASC";
		$stmt=$pdo->prepare($sql);		
		$stmt->execute();
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
  echo '<a href="detail.php?id='.$row['id'].'"><button class="btn btn-danger ml-auto" type="button"><img src="img/next.png"></button></a>';  

 

 				    	 ?>
 				  
 				    </span> 

 				</div>
				
				</div>
				
				<div class="col-12 col-lg-4 col-md-12  side_right">						<!-- latest news --> 	
	 			<div class="latest_news_right shadow">
	 			 <h5 class="text-white  py-3" style="background:#f21dc1;">
	 			 	<span class="ml-2">နောက်ဆုံးရ ပြည်တွင်းသတင်းများ</span>
	 			 </h5>
	 			 <table>
	 			 	<?php 
	 			 	$sql="SELECT * FROM items WHERE cat_id=1 ORDER BY id DESC LIMIT 3";
	 			 	$stmt=$pdo->prepare($sql);

	 			 	$stmt->execute();
	 			 	$items=$stmt->fetchAll();
	 			 	foreach ($items as $item) {
							# code...

	 			 		?>
	 			 		<tr>
	 			 			<td style="width: 30%">
	 			 				<a href="detail.php?id=<?php echo $item['id'] ?>">
	 			 					<img src="admin_info/<?php echo $item['image'] ?>" class="img-fluid">
	 			 				</a>

	 			 			</td>
	 			 			<td>
	 			 				<a href="detail.php?id=<?php echo $item['id'] ?>" class="text-muted">
	 			 					<?php 
	 			 					$str=substr($item['content'],0,200);
	 			 					echo $str;

	 			 					?>
	 			 				</a>

	 			 			</td>
	 			 		</tr>
	 			 	<?php } ?>





	 			 </table>				
	 			</div>

	 			<div class="latest_news_right my-3 shadow">
	 			 <h5 class="text-white  py-3" style="background:#f21dc1;">
	 			 	<span class="ml-2">နောက်ဆုံးရ နိုင်ငံတကာသတင်းများ</span>
	 			 </h5>
	 				<table>
	 						<?php 
							$sql="SELECT * FROM items WHERE cat_id=2 ORDER BY id DESC LIMIT 3";
							$stmt=$pdo->prepare($sql);
						
						$stmt->execute();
						$items=$stmt->fetchAll();
						foreach ($items as $item) {
							# code...
						
							 ?>
	 					<tr>
	 						<td style="width: 30%">
	 							<a href="detail.php?id=<?php echo $item['id'] ?>">
	 								<img src="admin_info/<?php echo $item['image'] ?>" class="img-fluid">
	 							</a>
	 								
	 						</td>
	 						<td>
	 							<a href="detail.php?id=<?php echo $item['id'] ?>" class="text-muted">
	 								<?php 
									$str=substr($item['content'],0,200);
									echo $str;

									 ?>
	 						</a>
	 							
	 						</td>
	 					</tr>
	 				<?php } ?>
	 					
	 				</table>				
	 			</div>

                 <div class="latest_news_right my-3 shadow">
	 			   <h5 class="text-white  py-3" style="background:#f21dc1;">
	 			 	<span class="ml-2">အားကစားသတင်းများ</span>
	 			    </h5>	 			
	 				<table>
	 						<?php 
							$sql="SELECT * FROM items WHERE cat_id=3 ORDER BY id DESC LIMIT 3";
							$stmt=$pdo->prepare($sql);
						
						$stmt->execute();
						$items=$stmt->fetchAll();
						foreach ($items as $item) {
							# code...
						
							 ?>
	 					<tr>
	 						<td style="width: 30%">
	 							<a href="detail.php?id=<?php echo $item['id'] ?>">
	 								<img src="admin_info/<?php echo $item['image'] ?>" class="img-fluid">
	 							</a>
	 								
	 						</td>
	 						<td>
	 							<a href="detail.php?id=<?php echo $item['id'] ?>" class="text-muted">
	 								<?php 
									$str=substr($item['content'],0,200);
									echo $str;

									 ?>
	 						</a>
	 							
	 						</td>
	 					</tr>
	 				<?php } ?>
	 				</table>				
	 			</div>
	 			

	 			  <div class="latest_news_right my-3 shadow">
	 			   <h5 class="text-white  py-3" style="background:#f21dc1;">
	 			 	<span class="ml-2">နောက်ဆုံးရ ဖျော်ဖြေရေးသတင်းများ</span>
	 			    </h5>	
	 				<table>
	 						<?php 
							$sql="SELECT * FROM items WHERE cat_id=4 ORDER BY id DESC LIMIT 3";
							$stmt=$pdo->prepare($sql);
						
						$stmt->execute();
						$items=$stmt->fetchAll();
						foreach ($items as $item) {
							# code...
						
							 ?>
	 					<tr>
	 						<td style="width: 30%">
	 							<a href="detail.php?id=<?php echo $item['id'] ?>">
	 								<img src="admin_info/<?php echo $item['image'] ?>" class="img-fluid">
	 							</a>
	 								
	 						</td>
	 						<td>
	 							<a href="detail.php?id=<?php echo $item['id'] ?>" class="text-muted">
	 								<?php 
									$str=substr($item['content'],0,200);
									echo $str;

									 ?>
	 						</a>
	 							
	 						</td>
	 					</tr>
	 				<?php } ?>

	 					
	 				</table>				
	 			</div>
                 <div class="latest_news_right my-3 shadow">
	 			   <h5 class="text-white  py-3" style="background:#f21dc1;">
	 			 	<span class="ml-2">ဗဟုသုတ သတင်းများ</span>
	 			    </h5>
	 			    <table>
	 						<?php 
							$sql="SELECT * FROM items WHERE cat_id=5 ORDER BY id DESC LIMIT 4";
							$stmt=$pdo->prepare($sql);
						
						$stmt->execute();
						$items=$stmt->fetchAll();
						foreach ($items as $item) {
							# code...
						
							 ?>
	 					<tr>
	 						<td style="width: 30%">
	 							<a href="detail.php?id=<?php echo $item['id'] ?>">
	 								<img src="admin_info/<?php echo $item['image'] ?>" class="img-fluid">
	 							</a>
	 								
	 						</td>
	 						<td>
	 							<a href="detail.php?id=<?php echo $item['id'] ?>" class="text-muted">
	 								<?php 
									$str=substr($item['content'],0,200);
									echo $str;

									 ?>
	 						</a>
	 							
	 						</td>
	 					</tr>
	 				<?php } ?>

	 					
	 				</table>
	 						
	 			</div>
					
				</div>
				
				
			</div>
			<!-- row end -->
			
		</div>
	</div>
<?php 
include "include/footer.php";
?>