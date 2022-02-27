<?php 
    include 'inc/header.php';
    include 'inc/footer.php';
    include 'config.php';
    include 'database.php';


 ?>

 <!--read data-->





<div class="container">         
  <table class="table table-dark">
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>image</th>
      </tr>
    </thead>
    <tbody>
    <?php    /// showing post at the admin pagge with categorylist for this we connenct here join database
					$db = new database();
					$query = "SELECT * FROM tbl_user";
					 $form=$db->select($query);
					 if($form){
						 $i=0;
						 while($result=$form->fetch_assoc()){
							$i++;
					
					
					?>
      <tr>
        <td><?php echo $result['id']?></td>
        <td><?php echo $result['name']; ?></td>
        <td><?php echo $result['email']; ?></td>
        <td><?php echo $result['phone']; ?></td>
        <td><img src="./uploads/<?php echo $result['image']?>" width="60px" height="60px" /></td>
      </tr>
      <?php } } ?>
    </tbody>
  </table>
</div>