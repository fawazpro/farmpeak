<div class="container-fluid">
    <div class="my-3">
        <h5>
            <a href="investor.html" style="color: #023c74">Investor</a>
            > Investor Info
        </h5>
    </div>
    <!-- investor info -->

    <div class="row justify-content-center">
        <div class="col-md-12 m-sm-0 m-1">
            <div class="card shadow-sm p-4">
                <div class="form-row">
                    <div class="col-md-4 mb-2">
                        <p class="subTitle2 mb-1">Investor ID</p>
                        <p class="subInfo2"><?=$user['id']?></p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <p class="subTitle2 mb-1">First Name</p>
                        <p class="subInfo2"><?=$user['fname']?></p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <p class="subTitle2 mb-1">Last Name</p>
                        <p class="subInfo2"><?=$user['lname']?></p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <p class="subTitle2 mb-1">Email</p>
                        <p class="subInfo2"><?=$user['email']?></p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <p class="subTitle2 mb-1">Tel no</p>
                        <p class="subInfo2"><?=$user['phone']?></p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <p class="subTitle2 mb-1">No of Farm</p>
                        <p class="subInfo2">-</p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <p class="subTitle2 mb-1">Bank</p>
                        <p class="subInfo2"><?=$user['bank']?></p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <p class="subTitle2 mb-1">Acct No</p>
                        <p class="subInfo2"><?=$user['acc_no']?></p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <p class="subTitle2 mb-1">Acct Name</p>
                        <p class="subInfo2"><?=$user['acc_name']?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end of investor info -->
    <div class="mt-3">
        <h5>List of Investment</h5>
    </div>

    <div class="row">
        <!-- myInvestment table -->
        <div class="col-md-12">
            <div class="m-2 m-sm-0 card shadow-sm">
                <div class="card-body px-2 px-lg-2 py-2">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th hidden>Farm Id</th>
                                    <th>Farm Name</th>
                                    <th>Amount</th>
                                    <th>Plot</th>
                                    <th>ROI</th>
                                    <th>Duration</th>
                                    <th>Total Payout</th>
                                    <th>Status</th>
                                    <th>Info</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($inv)) : ?>
                                    <tr> No investment yet!! </tr>
                                <?php else : ?>
                                    <?php foreach ($inv as $key => $in) : ?>
                                        <?php if ($in['status'] == 'successful') : ?>
                                            <tr>
                                                <td hidden><?= $in['farmID'] ?></td>
                                                <td><?= $in['farmName'] ?></td>
                                                <td><span>&#x20a6;</span><?= price($in['unit_price']) ?></td>
                                                <td><?= $in['plot'] ?></td>
                                                <td><?= $in['roi'] ?><span>%</span></td>
                                                <td><?= $in['duration'] ?> month</td>
                                                <td><span>&#x20a6;</span><?= price($in['total_price']) ?></td>
                                                <td>
                                                    <div class="progress progress-bg1">
                                                        <div class="progress-bar progress-green" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                                                            35%
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <a href="#investInfoModal<?= $in['farmID'] ?>" data-toggle="modal" rel="tooltip" class="shadow p-1"><i class="text-info fas fa-info-circle fa-1x"></i></a>
                                                </td>
                                            </tr>

                                            <!-- investment info modal -->
                                            <div id="investInfoModal<?= $in['farmID'] ?>" class="modal fade zoom-in">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header" style="background-color: #038d2c">
                                                            <h5 class="modal-title text-white ml-auto">More Info</h5>
                                                            <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">
                                                                &times;
                                                            </button>
                                                        </div>

                                                        <div class="modal-body p-4">
                                                            <div class="form-row">
                                                                <div class="col-md-4 mb-2">
                                                                    <p class="subTitle1 mb-1">Farm ID</p>
                                                                    <p class="subInfo2"><?= $in['farmID'] ?></p>
                                                                </div>
                                                                <div class="col-md-4 mb-3">
                                                                    <p class="subTitle1 mb-1">Farm Name</p>
                                                                    <p class="subInfo2"><?= $in['farmName'] ?></p>
                                                                </div>
                                                                <div class="col-md-4 mb-3">
                                                                    <p class="subTitle1 mb-1">Invested on</p>
                                                                    <p class="subInfo2"><?= $in['invested'] ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="col-md-4 mb-3">
                                                                    <p class="subTitle1 mb-1">Plot</p>
                                                                    <p class="subInfo2"><?= $in['plot'] ?></p>
                                                                </div>
                                                                <div class="col-md-4 mb-3">
                                                                    <p class="subTitle1 mb-1">ROI</p>
                                                                    <p class="subInfo2"><?= $in['roi'] ?><span>%</span></p>
                                                                </div>

                                                                <div class="col-md-4 mb-3">
                                                                    <p class="subTitle1 mb-1">Payout Month</p>
                                                                    <p class="subInfo2"><?= $in['payout_month'] ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="col-md-4 mb-3">
                                                                    <p class="subTitle1 mb-1">Unit Price</p>
                                                                    <p class="subInfo2"><span>&#x20a6;</span><?= price($in['unit_price']) ?></p>
                                                                </div>
                                                                <div class="col-md-4 mb-3">
                                                                    <p class="subTitle1 mb-1">Total Price</p>
                                                                    <p class="subInfo2"><span>&#x20a6;</span><?= price($in['total_price']) ?></p>
                                                                </div>
                                                                <div class="col-md-4 mb-3">
                                                                    <p class="subTitle1 mb-1">Total Payout</p>
                                                                    <p class="subInfo2"><span>&#x20a6;</span><?= price($in['total_payout']) ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="col-md-12 mb-3">
                                                                    <p class="subTitle2 mb-1">Status</p>
                                                                    <div class="progress progress-bg1">
                                                                        <div class="progress-bar progress-green" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                                                                            35%
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end of add farm modal -->
                                        <?php else : ?>
                                            <tr style="background-color: black; color: white;">
                                                <td hidden><?= $in['farmID'] ?></td>
                                                <td><?= $in['farmName'] ?></td>
                                                <td><span>&#x20a6;</span><?= price($in['unit_price']) ?></td>
                                                <td><?= $in['plot'] ?></td>
                                                <td><?= $in['roi'] ?><span>%</span></td>
                                                <td><?= $in['duration'] ?> month</td>
                                                <td><span>&#x20a6;</span><?= price($in['total_price']) ?></td>
                                                <td>
                                                    Pending
                                                </td>
                                                <td class="text-center">
                                                    <a href="#!" rel="tooltip" class="shadow p-1"><i class="text-info fas fa-times fa-1x"></i></a>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--end of investment table -->
    </div>
    <div class="mt-3">
        <h5>Investor's Payout</h5>
    </div>

    <div class="row">
        <!-- myInvestment table -->
        <div class="col-md-12">
            <div class="m-2 m-sm-0 card shadow-sm">
                <div class="card-body px-2 px-lg-2 py-2">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Date</th>
                                    <th>Farm Name</th>
                                    <th>Trans ID</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>03/06/2021</td>
                                    <td>Cassava farm</td>
                                    <td>234HDGE21</td>
                                    <td><span>&#x20a6;</span>436,800</td>
                                    <td>
                                        <span class="badge badge-success px-2">paid</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--end of investment table -->
    </div>

    <!-- investment info modal -->
    <div id="investInfoModal" class="modal fade zoom-in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #023c74">
                    <h5 class="modal-title text-white ml-auto">More Info</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                </div>

                <div class="modal-body p-4">
                    <div class="form-row">
                        <div class="col-md-4 mb-2">
                            <p class="subTitle2 mb-1">Farm ID</p>
                            <p class="subInfo2">234HDGE21</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <p class="subTitle2 mb-1">Farm Name</p>
                            <p class="subInfo2">Poultry Farm</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <p class="subTitle2 mb-1">Invested on</p>
                            <p class="subInfo2">22/05/2021</p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <p class="subTitle2 mb-1">Plot</p>
                            <p class="subInfo2">3</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <p class="subTitle2 mb-1">ROI</p>
                            <p class="subInfo2">12<span>%</span></p>
                        </div>

                        <div class="col-md-4 mb-3">
                            <p class="subTitle2 mb-1">Payout Month</p>
                            <p class="subInfo2">December</p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <p class="subTitle2 mb-1">Unit Price</p>
                            <p class="subInfo2"><span>&#x20a6;</span>35,000</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <p class="subTitle2 mb-1">Total Price</p>
                            <p class="subInfo2"><span>&#x20a6;</span>105,000</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <p class="subTitle2 mb-1">Total Payout</p>
                            <p class="subInfo2"><span>&#x20a6;</span>117,600</p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <p class="subTitle2 mb-1">Status</p>
                            <div class="progress progress-bg">
                                <div class="progress-bar progress-purple" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                                    35%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of add farm modal -->
</div>
</div>
<!-- /#page-content-wrapper -->
</div>