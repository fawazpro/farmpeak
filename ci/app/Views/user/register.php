    <!-- Begin page content -->
    <main class="flex-shrink-0 main-container">
        <!-- page content goes here -->
        <div class="banner-hero scroll-y bg-white">
            <div class="container h-100">
                <div class="row h-100 h-sm-auto">
                    <div class="col-11 col-sm-8 col-md-6 mx-auto align-self-start">
                    </div>
                    <div class="w-100"></div>
                    <div class="col-11 col-sm-8 col-md-6 mx-auto align-self-center">
                        <img src="assets/img/favicons/skilltaps.png" width="100%" alt="">
                        <h3 class="">Welcome on board </h3>
                        <h2 class="font-weight-bold mb-4">Sign Up</h2>
                        <form action="register" method="post">
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label for="inputName" class="sr-only">First Name</label>
                                    <input type="text" name="fname" id="inputName" class="form-control" placeholder="First Name" required="" autofocus="">
                                </div>
                                <div class="col-6 form-group">
                                    <label for="inputName" class="sr-only">Last Name</label>
                                    <input type="text" name="lname" id="inputName" class="form-control" placeholder="Last Name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                    <label for="inputPhone" class="sr-only">Phone</label>
                                    <input type="number" name="phone" id="inputPhone" class="form-control" placeholder="Phone" maxlength="13" required="">
                            </div>

                            <div class="form-group">
                                <label for="inputEmail" class="sr-only">Email address</label>
                                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
                            </div>
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label for="inputPassword" class="sr-only">Password</label>
                                    <input type="password" id="password" minlength="6" class="form-control" placeholder="Password" required="">
                                </div>
                                <div class="col-6 form-group">
                                    <label for="inputPassword" class="sr-only">Confirm Password</label>
                                    <input type="password" name="pass" id="confirm_password" minlength="6" class="form-control" placeholder="Confirm Password" required="">
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label for="inputReferrerID" class="sr-only">Contact Address</label>
                                <textarea class="form-control" name="address" placeholder="Contact Address" id="" rows="3"></textarea>
                            </div> -->
                    </div>
                    <div class="w-100"></div>
                    <div class="col-11 col-sm-8 col-md-6 mx-auto align-self-end">
                        <div class="mb-4">
                            <button type="submit" class=" btn btn-lg btn-default default-shadow btn-block">Sign Up <span class="ml-2 icon arrow_right"></span></button>
                        </div>
                        </form>
                        <div class="mb-4">
                            <p>Already have an account?<br> <a href="login">Sign in</a> here.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Button trigger modal -->

    
    <!-- Modal -->
    <div class="modal fade" id="refid" tabindex="-1" role="dialog" aria-labelledby="refid" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title">Company's Referrer ID</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <p class="text-center">Use <br> <i>alpha</i> <br> as your referrer ID</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- End of page content -->
    <script>
        var password = document.getElementById("password"),
            confirm_password = document.getElementById("confirm_password");

        function validatePassword() {
            if (password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords doesn't match");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
