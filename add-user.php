<?php
  require_once('function/function.php');
  get_header();
  get_sidebar();

  if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    $pw=md5($_POST['password']);
    $rpw=md5($_POST['repassword']);
    $image=$_FILES['photo'];
    $image_name='';
    if($image['name']!=''){
      $image_name='U'.time().'-'.rand(100000,100000000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
    }
    $insert="INSERT INTO user_table(user_name,user_phone,user_email,user_username,user_password,user_photo)
    VALUES('$name','$phone','$email','$username','$pw','$image_name')";

    if(!empty($name)){
      if(!empty($email)){
        if(!empty($username)){
          if(!empty($pw)){
            if(!empty($rpw)){
              if(!empty($pw===$rpw)){
                if(mysqli_query($con,$insert)){
                  move_uploaded_file($image['tmp_name'],'uploads/'.$image_name);
                  echo "Sucessfully registration.";
                }else{
                  echo "Opps! registration failed.";
                }
              }else{
                echo "Password match please";
              }
            }else{
              echo "Please enter confirm password";
            }
          }else{
            echo "Please enter password";
          }
        }else{
          echo "Please enter username";
        }
      }else{
        echo "Please enter email";
      }
    }else{
      echo "Please enter name";
    }
  }
?>
  <div class="row">
      <div class="col-md-12 ">
          <form method="post" action="" enctype="multipart/form-data">
              <div class="card mb-3">
                <div class="card-header">
                  <div class="row">
                      <div class="col-md-8 card_title_part">
                          <i class="fab fa-gg-circle"></i>User Registration
                      </div>
                      <div class="col-md-4 card_button_part">
                          <a href="all-user.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All User</a>
                      </div>
                  </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                      <label class="col-sm-3 col-form-label col_form_label">Name<span class="req_star">*</span>:</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control form_control" id="" name="name">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-3 col-form-label col_form_label">Phone:</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control form_control" id="" name="phone">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-3 col-form-label col_form_label">Email<span class="req_star">*</span>:</label>
                      <div class="col-sm-7">
                        <input type="email" class="form-control form_control" id="" name="email">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-3 col-form-label col_form_label">Username<span class="req_star">*</span>:</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control form_control" id="" name="username">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-3 col-form-label col_form_label">Password<span class="req_star">*</span>:</label>
                      <div class="col-sm-7">
                        <input type="password" class="form-control form_control" id="" name="password">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-3 col-form-label col_form_label">Confirm-Password<span class="req_star">*</span>:</label>
                      <div class="col-sm-7">
                        <input type="password" class="form-control form_control" id="" name="repassword">
                      </div>
                      <div class="row mb-3">
                      <label class="col-sm-3 col-form-label col_form_label mt-3">User Role<span class="req_star">*</span>:</label>
                      <div class="col-sm-4 mb-3 mt-3">
                        <select class="form-control form_control" id="" name="">
                          <option value="">Select Role</option>
                          <option value="">SuperAdmin</option>
                          <option value="">Admin</option>
                        </select>
                      </div>
                      <div class="row mb-3">
                      <label class="col-sm-3 col-form-label col_form_label">Photo:</label>
                      <div class="col-sm-7">
                        <input type="file" class="form-control form_control" id="" name="photo">
                      </div>
                    </div>
                <div class="card-footer text-center">
                  <button type="submit" name="submit" class="btn btn-sm btn-dark">REGISTRATION</button>
                </div>
              </div>
          </form>
      </div>
  </div>
<?php
  get_footer();
?>
