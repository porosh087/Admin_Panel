<?php
  require_once('function/function.php');
  get_header();
  get_sidebar();
?>
  <div class="row">
      <div class="col-md-12">
          <div class="card mb-3">
            <div class="card-header">
              <div class="row">
                  <div class="col-md-8 card_title_part">
                      <i class="fab fa-gg-circle"></i>All User Information
                  </div>
                  <div class="col-md-4 card_button_part">
                      <a href="add-user.php" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add User</a>
                  </div>
              </div>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped table-hover custom_table">
                <thead class="table-dark">
                  <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Manage</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $sel="SELECT * FROM user_table ORDER BY user_id DESC";
                    $Q=mysqli_query($con,$sel);
                    while($data=mysqli_fetch_assoc($Q)){
                  ?>
                  <tr>
                    <td><?= $data['user_name']; ?></td>
                    <td><?= $data['user_phone']; ?></td>
                    <td><?= $data['user_email']; ?></td>
                    <td><?= $data['user_username']; ?></td>
                    <td>---</td>
                    <td>
                        <div class="btn-group btn_group_manage" role="group">
                          <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="view-user.php?v=<?=$data['user_id'];?>">View</a></li>
                            <li><a class="dropdown-item" href="edit-user.php">Edit</a></li>
                            <li><a class="dropdown-item" href="delete-user.php?d=<?=$data['user_id']?>">Delete</a></li>
                          </ul>
                        </div>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <div class="card-footer">
              <div class="btn-group" role="group" aria-label="Button group">
                <button type="button" class="btn btn-sm btn-dark">Print</button>
                <button type="button" class="btn btn-sm btn-secondary">PDF</button>
                <button type="button" class="btn btn-sm btn-dark">Excel</button>
              </div>
            </div>
          </div>
      </div>
  </div>
<?php
  get_footer();
?>
