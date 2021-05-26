        <body style="background-color: #f0f0f0">
            <div class="container-fluid">
                <h4 class="text-center mt-2 mt-md-3">Create your Farmpeak Account</h4>
                <div class="row justify-content-center">
                    <!-- form -->
                    <div class="card">
                        <div class="d-block pt-3 pr-4 text-right">
                            Had an Account? <b><a href="login">Login</a></b>
                        </div>
                        <hr />
                        <form action="register" method="post" class="px-4 pb-4 pt-1">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="first_Name">First Name</label>
                                    <input type="text" class="form-control" name="fname" autofocus="" placeholder="First Name" maxlength="17" required />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="last_Name">Last Name</label>
                                    <input type="text" class="form-control" name="lname" placeholder="Last Name" maxlength="17" required />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 mb-3 form-outline">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" class="form-control" name="email" placeholder="Email" required />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 mb-3">
                                    <label for="phoneNo">Phone No</label>
                                    <input type="tel" id="phoneNo" class="form-control" name="phone" placeholder="08000000000" maxlength="11" required />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" class="form-control" placeholder="Password" minlength="6" required />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 mb-3">
                                    <label for="confirmPassword">Confirm Password</label>
                                    <input type="password" minlength="6" name="pass" id="confirm_password" class="form-control" placeholder="Confirm Password" required />
                                </div>
                            </div>
                            <!-- submit -->
                            <button type="submit" class="btn btn-block btn-farm">
                                Sign-Up
                            </button>
                            <!-- end of submit button -->
                            <br />
                            <p>
                                By clicking on <b>SignUp</b>, you have agree to our
                                <a href="#" style="text-decoration: none; font-weight: 600">Terms of Service</a>
                            </p>
                        </form>
                    </div>
                    <!-- End of form -->
                </div>
            </div>
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