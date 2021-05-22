    <!-- Begin page content -->
    <main class="flex-shrink-0 main-container">
        <!-- page content goes here -->
        <div class="banner-hero vh-100 scroll-y bg-white">
            <div class="container h-100">
                <div class="row h-100 h-sm-auto">
                    <div class="col-11 col-sm-8 col-md-6 mx-auto align-self-start">
                    </div>
                    <div class="w-100"></div>
                    <div class="col-11 col-sm-8 col-md-6 mx-auto align-self-center">
                        <img src="assets/img/favicons/skilltaps.png" width="100%" alt="">
                        <h3 class="">Just one more step</h3>
                        <h2 class="font-weight-bold mb-4">Reset Password</h2>
                        <form action="resetpassword" method="post">
                        <div class="form-group">
                            <label for="Password" class="sr-only">Password</label>
                            <input type="password" id="password" class="form-control" placeholder="Password" required="" autofocus="">
                        </div>
                        <div class="form-group">
                            <label for="ConfirmPassword" class="sr-only">Confirm Password</label>
                            <input type="password" id="confirm_password" name="password" class="form-control" placeholder="Confirm Password" required="" autofocus="">
                        </div>
                            <input type="hidden" class="form-control" name="loader" value="<?=$email?>">
                        <p>You are on this page because you requested for the link.</p>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-11 col-sm-8 col-md-6 mx-auto align-self-end">
                        <div class="mb-4">
                            <button type="submit" class=" btn btn-lg btn-default default-shadow btn-block">Reset Password <span class="ml-2 icon arrow_right"></span></a>
                        </div>
                        </form>
                        <div class="mb-4">
                            <p>Back to <a href="login">login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- End of page content -->
    
    <!-- Required jquery and libraries -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap-4.4.1/js/bootstrap.min.js"></script>

    <!-- cookie css -->
    <script src="assets/vendor/cookie/jquery.cookie.js"></script>


    <!-- Customized jquery file  -->
    <script src="assets/js/main.js"></script>
    </body>

    </html>