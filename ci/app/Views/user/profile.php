<div class="container-fluid">
          <div class="row">
            <div class="col-lg-8">
              <div class="mt-3">
                <h4>My Profile</h4>
              </div>
              <!-- profile -->
              <div class="m-1">
                <!-- form -->
                <form method="post" action="personalinfo" class="card p-4 mt-md-2">
                  <div class="form-row">
                    <div class="col mb-3">
                      <label for="investorId">Investor ID</label>
                      <input
                        type="text"
                        id="investorId"
                        class="form-control"
                        value="OMB00<?=$user['id']?>"
                        readonly
                      />
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="first_Name">First Name</label>
                      <input
                        type="text"
                        id="first_Name"
                        class="form-control"
                        placeholder="First Name"
                        value="<?=$user['fname']?>"
                        maxlength="17"
                        required
                        readonly
                      />
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="last_Name">Last Name</label>
                      <input
                        type="text"
                        id="last_Name"
                        class="form-control"
                        placeholder="Last Name"
                        value="<?=$user['lname']?>"
                        maxlength="17"
                        required
                        readonly
                      />
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-8 mb-3">
                      <label for="email">Email</label>
                      <input
                        type="email"
                        id="email"
                        class="form-control"
                        placeholder="Email"
                        value="<?=$user['email']?>"
                        readonly
                      />
                    </div>
                    <div class="col-md-4 mb-3">
                      <label for="telNo">Tel No</label>
                      <input
                        type="tel"
                        id="telNo"
                        name="phone"
                        class="form-control"
                        placeholder="08000000000"
                        value="<?=$user['phone']?>"
                        required
                      />
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="acctNo">Account No</label>
                      <input
                        type="tel"
                        id="acctNo"
                        name="acc_no"
                        class="form-control"
                        value="<?=$user['acc_no']?>"
                        maxlength="10"
                        minlength="10"
                        required
                      />
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="bankName">Bank</label>
                      <select name="bank" class="form-control" required>
                                        <option value="">Select a Bank</option>
                                        <?php foreach ($banks as $key => $bank) : ?>
                                            <option value="<?= $bank['name'] ?>"><?= $bank['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                    </div>
                  <div class="col-md-12 mb-3">
                      <label for="accname">Account Name</label>
                      <input
                        type="text"
                        id="accname"
                        name="acc_name"
                        class="form-control"
                        placeholder="Account name"
                        value="<?=$user['acc_name']?>"
                      />
                    </div>
                  </div>
                  <hr />
                  <div class="form-row">
                    <div class="col mb-3">
                      <label for="userPwd">Your Password</label>
                      <div class="input-group">
                        <input
                          type="password"
                          id="userPwd"
                          name="pass"
                          class="form-control pwd"
                          placeholder="Password"
                          required
                        />
                        <div
                          class="input-group-append"
                          style="cursor: pointer"
                          rel="tooltip"
                          title="show"
                        >
                          <span class="input-group-text reveal">
                            <i class="fa fa-eye"></i
                          ></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- submit -->
                  <button type="submit" class="btn btn-block btn-farm">
                    Update
                  </button>
                  <!-- end of submit button -->
                </form>
              </div>
            </div>
            <!-- change password -->
            <div class="col-lg-4">
              <div class="mt-3">
                <h4>Change Password</h4>
              </div>
              <!-- profile -->
              <div class="m-1">
                <!-- form -->
                <form method="post" action="chgpassword" class="card p-4 mt-md-2">
                  <div class="form-row">
                    <div class="col mb-3">
                      <label for="currentPwd">Current Password</label>
                      <div class="input-group">
                        <input
                          type="password"
                          name="pass"
                          id="currentPwd"
                          class="form-control pwd1"
                          placeholder="Password"
                          required
                        />
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col mb-3">
                      <label for="newPwd">New Password</label>
                      <div class="input-group">
                        <input
                          type="password"
                          id="password"
                          class="form-control pwd2"
                          placeholder="Password"
                          required
                        />
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col mb-3">
                      <label for="confirmPwd">Confirm Password</label>
                      <div class="input-group">
                        <input
                          type="password"
                          id="confirm_password"
                          name="newpass"
                          class="form-control pwd3"
                          placeholder="Password"
                          required
                        />
                      </div>
                    </div>
                  </div>
                  <!-- submit -->
                  <button type="submit" class="btn btn-block btn-farm">
                    Change Password
                  </button>
                  <!-- end of submit button -->
                </form>
              </div>
            </div>
            <!-- end of change password -->
          </div>
          <!--end of profile -->
        </div>
      </div>
      <!-- /#page-content-wrapper -->
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