<?php include 'include/header.php';
 include "include/db.php";
  $sql="SELECT items.*,category.name as cat_name FROM items INNER JOIN category ON items.cat_id=category.id ORDER BY items.id DESC LIMIT 8";
  $stmt=$pdo->prepare($sql);
$stmt->execute();
$items=$stmt->fetchAll();


  ?>


   
  <!--Main Navigation-->

  <!--Main layout-->
  <main class="pt-5 mx-lg-12">
    <div class="container-fluid mt-5">  
    
       
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 text-muted">Items</h1>
   
    <a href="additems.php" class="btn btn-outline-primary waves-effect waves-light">
             <i class="fas fa-plus fa-sm text-dark-50"></i>
              <span>Add Item</span>
          </a>
  </div>
   

  <table id="dtMaterialDesignExample" class="table table-hover bg-white shadow" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">No
      </th>
      <th class="th-sm">Title
      </th>
      <th class="th-sm">Category
      </th>
      <th class="th-sm">Photo
      </th>
      <th class="th-sm">Tags
      </th>
      <th class="th-sm">Content
      </th>
    
      <th class="th-sm">Action
      </th>
    </tr>
  </thead>
  <tbody>

  <?php 
 $num="";
foreach($items as $item){
  $num++; ?>

  
    <tr>
      <td><?php echo $num;?></td>
      <td><?php echo $item['title'] ?></td>
      <td><?php echo $item['cat_id'] ?></td>
      <td style="width:10%">
      <img src="<?php echo $item['image'] ?>" alt="" class="img-fluid">
      </td>
      <td><?php echo $item['tag'] ?></td>
      <td>
      <?php
      $str=substr($item['content'],0,230);
       echo $str;
        ?></td>
  
      <td style="font-size:20px">
         <a href="item_edit.php?id=<?php echo $item['id'] ?>" cl><i class="fas fa-edit text-primary"></i> Edit</a>
      &nbsp;<span>/</span>&nbsp;
      <a href="item_delete.php?id=<?php echo $item['id'] ?>"><i class="fas fa-trash text-danger"></i> Del</a>
      </td>
    </tr>
  
<?php } ?>
   
  </tbody>
  <tfoot>
  <tr>
      <th class="th-sm">No
      </th>
      <th class="th-sm">Title
      </th>
      <th class="th-sm">Category
      </th>
      <th class="th-sm">Photo
      </th>
      <th class="th-sm">Tags
      </th>
      <th class="th-sm">Content
      </th>
      <th class="th-sm">Count
      </th>
      <th class="th-sm">Action
      </th>
    </tr>
  </tfoot>
</table>

    </div>
  </main>
  <!--Main layout-->

<?php include 'include/footer.php';?>  
