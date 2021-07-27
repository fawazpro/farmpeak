<?php
function gender($sex)
{
    if($sex == 'male'){
        return 'Mr';
    }elseif($sex == 'female'){
        return 'Mrs';
    }
}
?>
      <div class="container-fluid">
          <div class="mt-3">
              <h4>Trainee</h4>
              <p>List of OMB farms students</p>
          </div>

          <!-- trainee -->
          <div class="row">
              <div class="col-12 m-sm-0 m-1">
                  <div class="card p-2 mb-4">
                      <div class="card-body">
                          <div class="table-responsive">
                              <table class="table table-bordered table-hover nowrap" id="dataTable" width="100%">
                                  <thead class="thead-dark">
                                      <tr>
                                          <th>Name</th>
                                          <th>Email</th>
                                          <th>Tel</th>
                                          <th>Course</th>
                                          <th>Reg Date</th>
                                          <th>Details</th>
                                          <th>Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php foreach ($details as $key => $detail): ?>
                                      <tr>
                                          <td><?=gender($detail['gender'])?> <?=$detail['fname']?> <?=$detail['lname']?></td>
                                          <td><?=$detail['email']?></td>
                                          <td><?=$detail['phone']?></td>
                                          <td><?=$detail['course']?></td>
                                          <td><?=$detail['created_at']?></td>
                                          <td class="text-center">
                                              <a href="#studentInfoModal<?=$detail['id']?>"  data-toggle="modal"  class="shadow px-3 py-1"><i class="text-info fas fa-info-circle fa-1x"></i></a>
                                          </td>
                                          <td class="text-center">
                                              <a href="#deleteStudentModal<?=$detail['id']?>" data-toggle="modal" class="shadow px-3 py-1"><i class="fas text-danger fa-trash-alt fa-1x actionDelete"></i></a>
                                          </td>
                                      </tr>
                                      <!-- studentInfo modal -->
                                      <div id="studentInfoModal<?=$detail['id']?>" class="modal fade zoom-in">
                                          <div class="modal-dialog">
                                              <div class="modal-content">
                                                  <div class="modal-header" style="background-color:#023c74">
                                                      <h5 class="modal-title text-white ml-auto">
                                                          Trainee Information
                                                      </h5>
                                                      <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">
                                                          &times;
                                                      </button>
                                                  </div>
                                                  <div class="modal-body p-4">
                                                      <!-- student info -->
                                                      <div class="row justify-content-center">
                                                          <div class="col-md-12 m-sm-0 m-1">
                                                              <div class="card shadow-sm p-4">
                                                                  <div class="form-row">
                                                                      <div class="col-md-4 mb-2">
                                                                          <p class="subTitle2 mb-1">Trainee ID</p>
                                                                          <p class="subInfo2">OMBST<?=$detail['id']?></p>
                                                                      </div>
                                                                      <div class="col-md-4 mb-3">
                                                                          <p class="subTitle2 mb-1">First Name</p>
                                                                          <p class="subInfo2"><?=$detail['fname']?></p>
                                                                      </div>
                                                                      <div class="col-md-4 mb-3">
                                                                          <p class="subTitle2 mb-1">Last Name</p>
                                                                          <p class="subInfo2"><?=$detail['lname']?></p>
                                                                      </div>
                                                                  </div>
                                                                  <div class="form-row">
                                                                      <div class="col-md-4 mb-3">
                                                                          <p class="subTitle2 mb-1">Email</p>
                                                                          <p class="subInfo2"><?=$detail['email']?></p>
                                                                      </div>
                                                                      <div class="col-md-4 mb-3">
                                                                          <p class="subTitle2 mb-1">Tel no</p>
                                                                          <p class="subInfo2"><?=$detail['phone']?></p>
                                                                      </div>
                                                                      <div class="col-md-4 mb-3">
                                                                          <p class="subTitle2 mb-1">Gender</p>
                                                                          <p class="subInfo2"><?=$detail['gender']?></p>
                                                                      </div>
                                                                  </div>
                                                                  <div class="form-row">
                                                                      <div class="col-md-4 mb-3">
                                                                          <p class="subTitle2 mb-1">Course</p>
                                                                          <p class="subInfo2"><?=$detail['course']?></p>
                                                                      </div>
                                                                      <div class="col-md-4 mb-3">
                                                                          <p class="subTitle2 mb-1">Date of Birth</p>
                                                                          <p class="subInfo2"><?=$detail['dob']?></p>
                                                                      </div>
                                                                      <div class="col-md-4 mb-3">
                                                                          <p class="subTitle2 mb-1">Reg Date</p>
                                                                          <p class="subInfo2"><?=$detail['created_at']?></p>
                                                                      </div>
                                                                  </div>
                                                                  <div class="form-row">
                                                                      <div class="col-md-4 mb-3">
                                                                          <p class="subTitle2 mb-1">Home Address</p>
                                                                          <p class="subInfo2">
                                                                          <?=$detail['address']?>
                                                                          </p>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                      <!--end of student info -->
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <!-- end of studentInfo modal -->
                                      <!-- deleteStudent modal -->
                                      <div id="deleteStudentModal<?=$detail['id']?>" class="modal fade zoom-in">
                                          <div class="modal-dialog">
                                              <div class="modal-content">
                                                  <div class="modal-header" style="background-color: #ff0000">
                                                      <h5 class="modal-title text-white ml-auto">
                                                          Delete Investment
                                                      </h5>
                                                      <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">
                                                          &times;
                                                      </button>
                                                  </div>
                                                  <form method="post" action="deltrainee">
                                                      <div class="modal-body p-4">
                                                          <h5>
                                                              Are you sure you want to delete this student (<?=$detail['fname']?> <?=$detail['lname']?>) record?
                                                          </h5>
                                                          <p class="text-danger">
                                                              <small style="font-size: large; font-weight: bold">This action cannot be undone.</small>
                                                          </p>
                                                          <div class="form-row">
                                                              <div class="col-0 mb-3">
                                                                  <input type="text" class="form-control" name="id" id="TraineeId" value="<?=$detail['id']?>" hidden />
                                                              </div>
                                                              <div class="col-12 mb-3">
                                                                  <label for="adminPwd">Admin password</label>
                                                                  <input type="password" class="form-control" name="pass" placeholder="Password" required />
                                                              </div>
                                                          </div>

                                                          <!-- submit -->
                                                          <button type="submit" class="btn btn-block" style="background-color: #ff0000; color: #ffffff">
                                                              Delete
                                                          </button>
                                                          <!-- end of submit button -->
                                                      </div>
                                                  </form>
                                              </div>
                                          </div>
                                      </div>
                                      <!-- end of deleteStudent modal -->
                                      <?php endforeach; ?>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!--end of trainee -->

      </div>
  </div>
  <!-- /#page-content-wrapper -->