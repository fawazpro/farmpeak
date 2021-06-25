<div class="container-fluid">
    <div class="mt-3 mb-1">
        <h4>Help Center Setting</h4>
        <!-- <p>List of Farmpeak Investors</p> -->
    </div>

    <!-- list of helpline -->

    <div class="row">
        <!-- help1 -->
        <div class="col-md-4 m-sm-0 m-1">
            <a href="#editHelp1Modal" data-toggle="modal" style="text-decoration: none">
                <div class="card shadow my-1">
                    <div class="card-body m-0 px-2 px-lg-2 py-4 d-flex justify-content-center align-items-center">
                        <span><i class="fas fa-headset fa-7x" style="color: #023c74 !important"></i></span>
                    </div>
                    <h5 class="card-footer m-0 text-center font-weight-bold text-white" style="background-color: #023c74">
                        Edit Call Help-1
                    </h5>
                </div>
            </a>
        </div>
        <!-- end of help1 -->
        <!-- help2 -->
        <div class="col-md-4 m-sm-0 m-1">
            <a href="#editHelp2Modal" data-toggle="modal" style="text-decoration: none">
                <div class="card shadow my-1">
                    <div class="card-body m-0 px-2 px-lg-2 py-4 d-flex justify-content-center align-items-center">
                        <span><i class="fas fa-headset fa-7x" style="color: #000000 !important"></i></span>
                    </div>
                    <h5 class="card-footer m-0 text-center font-weight-bold text-white" style="background-color: #000000">
                        Edit Call Help-2
                    </h5>
                </div>
            </a>
        </div>
        <!-- end of help2 -->
        <!-- helpmail -->
        <div class="col-md-4 m-sm-0 m-1">
            <a href="#editHelpMailModal" data-toggle="modal" style="text-decoration: none">
                <div class="card shadow my-1">
                    <div class="card-body m-0 px-2 px-lg-2 py-4 d-flex justify-content-center align-items-center">
                        <span><i class="fas fa-envelope-open-text fa-7x" style="color: #023c74 !important"></i></span>
                    </div>
                    <h5 class="card-footer m-0 text-center font-weight-bold text-white" style="background-color: #023c74">
                        Edit Mail Us
                    </h5>
                </div>
            </a>
        </div>
    </div>
    <!-- end of helpmail -->
    <!-- end of helpline -->

    <!-- editHelp1 modal -->
    <div id="editHelp1Modal" class="modal fade zoom-in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #023c74">
                    <h5 class="modal-title text-white ml-auto">
                        Edit Helpline-1
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                </div>
                <form method="post" action="upvariables">
                    <div class="modal-body p-4">
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <label for="helpline1">Tel no</label>
                                <input type="number" class="form-control" id="helpline1" placeholder="" value="<?=$phone1?>" maxlength="11" name="val" required />
                                <input type="hidden" name="name" value="phone1">
                            </div>
                        </div>
                        <hr />
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <label for="adminPwd">Admin password</label>
                                <input type="password" class="form-control" id="adminPwd" placeholder="Password" name="pass" required />
                            </div>
                        </div>
                        <!-- submit -->
                        <button type="submit" class="btn btn-block" style="background-color: #023c74; color: #ffffff">
                            Update
                        </button>
                        <!-- end of submit button -->
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end of editHelp1 modal -->

    <!-- editHelp2 modal -->
    <div id="editHelp2Modal" class="modal fade zoom-in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #023c74">
                    <h5 class="modal-title text-white ml-auto">
                        Edit Helpline-2
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                </div>
                <form method="post" action="upvariables">
                    <div class="modal-body p-4">
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <label for="helpline2">Tel no</label>
                                <input type="hidden" name="name" value="phone2">
                                <input type="number" class="form-control" id="helpline2" placeholder="" value="<?=$phone2?>" maxlength="11" name="val" required />
                            </div>
                        </div>
                        <hr />
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <label for="adminPwd">Admin password</label>
                                <input type="password" class="form-control" id="adminPwd" placeholder="Password" name="pass" required />
                            </div>
                        </div>
                        <!-- submit -->
                        <button type="submit" class="btn btn-block" style="background-color: #023c74; color: #ffffff">
                            Update
                        </button>
                        <!-- end of submit button -->
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end of editHelp2 modal -->

    <!-- editHelp2 modal -->
    <div id="editHelpMailModal" class="modal fade zoom-in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #023c74">
                    <h5 class="modal-title text-white ml-auto">
                        Edit Helpline-2
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                </div>
                <form method="post" action="upvariables">
                    <div class="modal-body p-4">
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <label for="helpMail">Email</label>
                                <input type="hidden" name="name" value="email1">
                                <input type="email" class="form-control" id="helpMail" placeholder="mail@mail.com" value="<?=$email1?>" maxlength="11" name="val" required />
                            </div>
                        </div>
                        <hr />
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <label for="adminPwd">Admin password</label>
                                <input type="password" class="form-control" id="adminPwd" placeholder="Password" name="pass" required />
                            </div>
                        </div>
                        <!-- submit -->
                        <button type="submit" class="btn btn-block" style="background-color: #023c74; color: #ffffff">
                            Update
                        </button>
                        <!-- end of submit button -->
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end of editHelp2 modal -->
</div>
</div>
<!-- /#page-content-wrapper -->
</div>