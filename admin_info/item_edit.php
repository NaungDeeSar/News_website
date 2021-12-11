<?php include 'include/header.php';

$id=$_GET['id'];

$sql="SELECT * FROM items WHERE id=:item_id";
$stmt=$pdo->prepare($sql);
$stmt->bindParam('item_id',$id);
$stmt->execute();
$items=$stmt->fetch(PDO::FETCH_ASSOC);



if(isset($_POST['update'])){
   $id=$_POST['id'];
    $title=$_POST['title'];
  $cat_id=$_POST['cat_id'];
  $tags=$_POST['tags'];
  $content=$_POST['content'];
  $fullpath=$_POST['oldphoto'];
  $photo=$_FILES['photo'];

  
if ($photo['size']>0) {
    $basepath="img/items/";
    $fullpath=$basepath.$photo['name'];
    move_uploaded_file($photo['tmp_name'], $fullpath);
  }

$sql="UPDATE items SET title=:item_title,cat_id=:item_cat_id,image=:item_image,tag=:item_tag,content=:item_content WHERE id=:item_id";

$stmt=$pdo->prepare($sql);
$stmt->bindParam(':item_id',$id);
$stmt->bindParam(':item_title',$title);
$stmt->bindParam(':item_cat_id',$cat_id);
$stmt->bindParam(':item_image',$fullpath);
$stmt->bindParam(':item_tag',$tags);
$stmt->bindParam(':item_content',$content);
$stmt->execute();

 if ($stmt->rowCount()) {
    header("location:items.php");
  }else{
    echo "Error";
  }
 

}



?>  

   
  <!--Main Navigation-->
  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5"> 
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Items Edit</h1>
    <a href="items.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Go Back</a>
  </div>
   
   <div class="row">
     <div class="col-12 col-md-8 offset-md-2">
   
       <form method="POST" action="" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $items['id'] ?>">
         <div class="form-group">
         <label>Title:</label>
         <input type="text" name="title" class="form-control" value="<?php echo $items['title'] ?>">
       </div>
        <div class="form-group">
         <label>Category:</label>
         <select name="cat_id" class="form-control">
           <option>Selected Category</option>
           <?php 
         $sql="SELECT * FROM category";
          $stmt=$pdo ->prepare($sql);
          $stmt ->execute();
          $cats=$stmt->fetchAll();
           foreach ($cats as $cat) {
            $id=$cat['id'];
            $name=$cat['name'];

           ?>
          
            <option value="<?php echo $id; ?>" 
              <?php 
            if ($cat['id']==$items['cat_id']) {
              echo "selected";
            } ?>
            >
            <?php echo $cat['name']; ?>
              
            </option>

          
          <?php } ?>
         </select>
       </div>
       <div class="form-group">
         <label for="photo">Photo</label><br>
        <input type="hidden" name="oldphoto" value="<?php echo $items['image'] ?>">
        <input type="file" name="photo">
        <img src="<?php echo $items['image'] ?>" class="img-fluid" width="200px">

       </div>
         <div class="form-group">
         <label>Tags:</label>
         <input type="text" name="tags" class="form-control" value="<?php echo $items['tag'] ?>">
       </div>
         <div class="form-group">
         <label>Content:</label>
        <textarea name="content" class="form-control">
          <?php echo $items['content']; ?>
        </textarea>
       </div>
       <input type="submit" name="update" value="Save" class="btn btn-primary">
       </form>
     </div>
      
   </div>

      



    </div>
  </main>
  <!--Main layout-->

<?php include 'include/footer.php';?>  
