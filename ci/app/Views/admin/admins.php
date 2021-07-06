<div class="container-fluid">
    <div class="mt-3">
        <h4>Admin</h4>
        <p>List of Admins</p>
    </div>

    <!-- payout -->
    <div class="row">
        <!-- admin table -->
        <div class="col-md-12">
            <div class="m-2 m-sm-0 card shadow-sm">
                <div class="card-body px-2 px-lg-2 py-2">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-dark text-center">
                                <tr>
                                    <th hidden>Admin Id</th>
                                    <th>First-Name</th>
                                    <th>Last-Name</th>
                                    <th>Email</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php foreach ($users as $key => $user) : ?>
                                    <tr>
                                        <td hidden><?= $user['id'] ?></td>
                                        <td><?= $user['fname'] ?></td>
                                        <td><?= $user['lname'] ?></td>
                                        <td><?= $user['email'] ?></td>
                                        <td class="text-center">
                                            <a href="#removeAdminModal<?= $user['id'] ?>" data-toggle="modal" rel="tooltip" class="shadow p-1"><i class="text-danger fas fa-trash-alt fa-1x"></i></a>
                                        </td>
                                    </tr>

                                    <!-- removeAdmin modal -->
                                    <div id="removeAdminModal<?= $user['id'] ?>" class="modal fade zoom-in">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color: #ff0000">
                                                    <h5 class="modal-title text-white ml-auto">Remove Admin</h5>
                                                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">
                                                        &times;
                                                    </button>
                                                </div>
                                                <form action="removeadmin" method="post">
                                                    <div class="modal-body p-4">
                                                        <h5>Are you sure you want to remove this Admin?</h5>
                                                        
                                                        <div class="form-row">
                                                            <div class="col-0 mb-3">
                                                                <input type="text" class="form-control" id="AdminId" hidden />
                                                            </div>
                                                            <div class="col-12 mb-3">
                                                                <label for="adminPwd">Admin password</label>
                                                                <input type="password" name="pass" class="form-control" id="adminPwd" placeholder="Password" required />
                                                                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                                            </div>
                                                        </div>

                                                        <!-- submit -->
                                                        <button type="submit" class="btn btn-block" style="background-color: #ff0000; color: #ffffff">
                                                            Remove
                                                        </button>
                                                        <!-- end of submit button -->
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end of removeAdmin modal -->
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!--end of admin table -->
        </div>
    </div>

    <!-- Edit farm info -->
    <div class="row justify-content-center">
        <div class="col-md-8 m-sm-0 m-1">
            <form method="post" action="addadmin" class="card shadow-sm my-5">
                <div class="card-header text-white text-center" style="background-color: #023c74 !important">
                    <h5>Add New Admin</h5>
                </div>
                <div class="card-body p-4">
                    <p class="text-info">
                        Note:
                        <span>Make sure you enter a
                            <b>registered OMB farm account email</b> for the role of
                            Admin</span>
                    </p>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="adminEmailAdd">Email</label>
                            <input type="email" name="email" class="form-control" id="adminEmailAdd" placeholder="Enter email" maxlength="40" required />
                        </div>
                    </div>
                    <hr />
                    <div class="form-row">
                        <!-- FOR AUTHORIZED UPDATE (Admin password) -->
                        <div class="col-md-12 mb-3">
                            <label for="adminPwd">Admin password</label>
                            <input type="password" name="pass" class="form-control" id="adminPwd" placeholder="Password" required />
                        </div>
                    </div>
                    <!-- submit -->
                    <button type="submit" class="btn btn-block" style="background-color: #023c74; color: #ffffff">
                        Authorize
                    </button>
                    <!-- end of submit button -->
                </div>
            </form>
        </div>
    </div>

    <!--end of Edit farm info -->
    <!--end of admin -->
</div>
</div>
<!-- /#page-content-wrapper -->
</div>