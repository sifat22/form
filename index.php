<?php 
    
    include 'inc/header.php';
    include 'config.php';
    include 'database.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require './vendor/autoload.php';
    $mail =new PHPMailer();
    $db = new Database();
    
    
 ?>


<!--create database-->





<?php   /// insert post image category all thing at the database
if($_SERVER['REQUEST_METHOD'] == "POST"){
 $name  = mysqli_real_escape_string($db->link, $_POST['name']);
 $email = mysqli_real_escape_string($db->link, $_POST['email']);
 $phone = mysqli_real_escape_string($db->link, $_POST['phone']);

 $chkquery="SELECT * FROM tbl_user WHERE email='$email'";
 $chkpro=$db->select($chkquery);


 try {
    $mail->SMTPDebug = 2;                                       
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                   
    $mail->SMTPAuth   = true;                             
    $mail->Username   = 'tousif2018ahamid@gmail.com';                 
    $mail->Password   = 'girish28@M';                        
    $mail->SMTPSecure = 'tls';                              
    $mail->Port       = 587;  
  
    $mail->setFrom('tousif2018ahamid@gmail.com');           
    $mail->addAddress('toushif.dcastalia@gmail.com');
    // $mail->addAddress('receiver2@gfg.com', 'Name');
       
    $mail->isHTML(true);                                  
    $mail->Subject = 'sent successfull';
    $mail->Body    = '<b>form submitted</b> ';
    $mail->AltBody = 'Body in plain text for non-HTML mail clients';
    $mail->send();
    echo "Mail has been sent successfully!";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
  





/// uploading image

    $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];
    $folder = "uploads/";
    move_uploaded_file($file_temp, $folder.$file_name);
  
    
    $chkquery="SELECT * FROM tbl_user WHERE email='$email'";
    $chkpro=$db->select($chkquery);
    if($chkpro){
    $msg="Email already added !";
    
    }else{
    //   if($name == '' || $email == '' || $phone == ''|| $file_name==''){
    //     $error ="Field must not be Empty !!";
    //    } else{
        $query = "INSERT INTO tbl_user(name,email,phone,image) VALUES('$name','$email','$phone','$file_name')";
        $inserted_rows=$db->insert($query);
        if ($inserted_rows) {
          echo "<span class='success'>post Inserted Successfully.
          </span>";


      }else {
          echo "<span class='error'>post Not Inserted !</span>";
      }
    }
    }


  
// }




?>




<section class="forms">
        <div class="container">
            <div class="row justify-content-center d-block">
                <div class="col-md-12">
                    <form class="form-classes" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label" for="inputName">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Name"name="name" required>
                            <span></span>

                                 <!--error message-->
                                 <?php 
                                    // if(isset($error)){
                                    // echo "<span class='error'>".$error."</span>";
                                    // }
                                  ?> 
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="inputEmail">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                            <span id="emailms"></span>

                             <!--error message-->
                            <?php 
                                    // if(isset($error)){
                                    // echo "<span class='error'>".$error."</span>";
                                    // }

                                    if(isset($msg)){
                                      echo "<span class='error'>".$msg."</span>";
                                      }
                                    
                                    
                                  ?> 
                        </div>
                        <div class="mb-3">
                            <label class="field" for="inputNumber">Phone Number</label>
                            <input type="text" class="form-control" id="phone" placeholder="phone"
                                name="phone" required>
                                <span id="phonemsg"></span>
                               <!--error message-->
                               <?php 
                                    // if(isset($error)){
                                    // echo "<span class='error'>".$error."</span>";
                                    // }
                                  ?> 
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="file_upload">Upload Files</label>
                            <input type="file" class="form-control-file" id="file_upload" name="image" required>
                        </div>
                        <span></span>
                       <!--error message-->
                       <?php 
                                    // if(isset($error)){
                                    // echo "<span class='error'>".$error."</span>";
                                    // }
                                  ?> 

                        <button type="submit" class="btn btn-primary btn-block btn2" name="submit">Submit Data</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
<br>

   <section class="show-all">
     <div class="container">
      <button class="btn btn-primary btn-block" name="submit"><a style="color:#FFFFFF;" href="show.php">Show ALL</a></button>
     </div>
   </section>




<?php 

include 'inc/footer.php';

?>



