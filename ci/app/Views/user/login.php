<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 col-md-4 d-flex justify-content-center aligns-items-center pBack">
                <img src="asset/images/p.svg" alt="logo" style="width: 200px; height: auto" />
            </div>
            <div class="col-lg-7 col-md-8 py-5 px-md-5 pBack2">
                <div>
                    <span class="d-block text-right mb-1">
                        No Account? <b><a href="signup.html">Sign-Up</a></b></span>
                    <form method="post" action="login" class="card p-4">
                        <div class="form-group">
                            <label for="username">Email</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user text-farm"></i></span>
                                </div>
                                <input type="text" name="email" class="form-control" placeholder="Enter Email" id="uname" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-key text-farm"></i></span>
                                </div>
                                <input name="pass" type="password" class="form-control" placeholder="Enter Password" id="pwd" />
                            </div>
                        </div>

                        <button type="submit" class="btn btn-block btn-farm">
                            Login
                        </button>
                    </form>
                    <div class="text-right mt-2" style="font-weight: 500">
                        <a href="#!" data-toggle="modal" data-target="#resetpass">forgot password?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Reset Modal -->
    <div class="modal fade" id="resetpass" tabindex="-1" role="dialog" aria-labelledby="Password Reset" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reset Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="rst" method="POST">
                    <div class="modal-body">
                        <div class="container">
                            <div class="form-group row">
                                <label for="inputName" class="col-12 col-form-label">Email Address</label>
                                <div class="col-12">
                                    <input type="email" class="form-control" name="email" placeholder="Enter email address to reset your password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Reset</button>
                </form>
            </div>
        </div>
    </div>