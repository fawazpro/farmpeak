<div class="container-fluid">
    <div class="mt-3">
        <h4>Payout</h4>
        <p>Record / Request of OMB farm payout</p>
        <i class="text-info hide">swipe table for info</i>
    </div>
    <!-- payout table -->
    <div class="m-2 m-sm-0 card">
        <div class="card-body p-0 px-lg-2 py-lg-2">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%">
                    <thead class="thead-dark">
                        <tr>
                            <th hidden>Trans ID</th>
                            <th>Date</th>
                            <th>Farm Name</th>
                            <th>Payment to</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($inv)) : ?>

                            <tr>
                                <td hidden>jh9u99</td>
                                <td>No payout yet!!</td>
                                <td>No payout yet!!</td>
                                <td>No payout yet!!</td>
                                <td>No payout yet!!</td>
                                <td>No payout yet!!</td>
                            </tr>
                        <?php else : ?>
                            <?php foreach ($inv as $key => $in) : ?>
                                <?php if ($in['status'] == 'completed') : ?>
                                    <tr>
                                        <td hidden><?= $in['farmID'] ?></td>
                                        <td><?= $in['invested'] ?></td>
                                        <td><?= $in['farmName'] ?></td>
                                        <td><?= $in['email'] ?></td>
                                        <td>&#x20a6;<span id=""><?= price($in['tpayout']) ?></span></td>
                                        <td>
                                            <span class="badge badge-success px-2">confirmed</span>
                                        </td>
                                        <td></td>
                                    </tr>
                                <?php else : ?>
                                    <tr>
                                        <td hidden><?= $in['farmID'] ?></td>
                                        <td><?= $in['invested'] ?></td>
                                        <td><?= $in['farmName'] ?></td>
                                        <td><?= $in['email'] ?></td>
                                        <td>&#x20a6;<span id=""><?= price($in['tpayout']) ?></span></td>
                                        <td><span class="badge badge-secondary px-2"><?= $in['status'] ?></span></td>
                                        <td>
                                            <a href="#confirmPayoutModal<?= $in['farmID'] ?>" data-toggle="modal" data-dismiss="modal" style="text-decoration: none">
                                                <button class="btn p-0 m-0 btn-block btn-farm2 smallex">
                                                    Update
                                                </button>
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- request payout modal -->
                                    <div id="confirmPayoutModal<?= $in['farmID'] ?>" class="modal fade zoom-in">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color: #000000">
                                                    <h5 class="modal-title text-white ml-auto">
                                                        Confirm Payout Request
                                                    </h5>
                                                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">
                                                        &times;
                                                    </button>
                                                </div>
                                                <form method="post" action="wallet">
                                                    <div class="modal-body p-4">
                                                        <div class="form-row">
                                                            <!-- hidden info -->
                                                            <div hidden class="col-md-0 mb-2">
                                                                <p id="farmId">Farm ID</p>
                                                                <p id="investor_email"><?= $in['farmID'] ?></p>
                                                            </div>
                                                            <!-- end of hidden -->
                                                            <div class="col-md-6 mb-1">
                                                                <p class="subTitle2 mb-1">Farm Name</p>
                                                                <p class="subInfo2"><?= $in['farmName'] ?></p>
                                                            </div>
                                                            <div class="col-md-6 mb-1">
                                                                <p class="subTitle2 mb-1">ROI</p>
                                                                <p class="subInfo2"><span id="roi"><?= $in['roi'] ?></span>%</p>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-6 mb-1">
                                                                <p class="subTitle2 mb-1">Payment to</p>
                                                                <p class="subInfo2"><?= $in['email'] ?></p>
                                                            </div>
                                                            <div class="col-md-6 mb-1">
                                                                <p class="subTitle2 mb-1">Account Name</p>
                                                                <p class="subInfo2"><?= $in['acc_name'] ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-6 mb-1">
                                                                <p class="subTitle2 mb-1">Amount Invested</p>
                                                                <p class="subInfo2">
                                                                    &#x20a6;<span id="totalPrice"><?= price($in['total_price']) ?></span>
                                                                </p>
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <p class="subTitle2 mb-1">Total Payout</p>
                                                                <p class="subInfo2">
                                                                    &#x20a6;<span id="totalPayout"><?= price($in['tpayout']) ?></span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-6 mb-1">
                                                                <p class="subTitle2 mb-1">Bank</p>
                                                                <p class="subInfo2"><?= $in['bank'] ?></p>
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <p class="subTitle2 mb-1">Account Number</p>
                                                                <p class="subInfo2"><?= $in['acc_no'] ?></p>
                                                            </div>
                                                        </div>

                                                        <hr />
                                                        <!-- user password -->
                                                        <div class="form-row">
                                                            <div class="col-md-12 mb-1">
                                                                <label for="adminPwd">Confirmation Message</label>
                                                                <select name="message" id="" class="form-control" required>
                                                                    <option value="">Update Status</option>
                                                                    <option value="completed">Transferred</option>
                                                                    <option value="Cancelled">Cancelled</option>
                                                                    <option value="Bank Details Error">Bank Details Error</option>
                                                                    <option value="Contact Help Line">Contact Help Line</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-12 mb-1">
                                                                <label for="adminPwd">Admin password</label>
                                                                <input type="password" name="pass" class="form-control" id="adminPwd" placeholder="Password" required />
                                                                <input type="hidden" name="investID" class="form-control" value="<?= $in['investID']?>" required />
                                                            </div>
                                                        </div>
                                                        <!-- submit -->
                                                        <button type="submit" class="btn btn-block" style="background-color: #023c74; color: #ffffff">
                                                            Confirm Payout
                                                        </button>
                                                        <!-- end of submit button -->
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end of request payout modal -->
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end of payout table -->
</div>
</div>
<!-- /#page-content-wrapper -->
</div>