<div class="container-fluid">
    <div class="mt-3">
        <h4>My Investment</h4>
        <p>List of your Farmpeak investment</p>
        <i class="text-info hide">swipe table for info</i>
    </div>
    <!-- myInvestment table -->
    <div class="m-2 m-sm-0 card">
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
                        <?php foreach ($inv as $key => $in) : ?>
                            <?php if ($in['status'] == 'successful') : ?>
                                <tr>
                                    <td hidden><?=$in['farmID'] ?></td>
                                    <td><?=$in['farmName'] ?></td>
                                    <td><span>&#x20a6;</span><?=price($in['unit_price']) ?></td>
                                    <td><?=$in['plot'] ?></td>
                                    <td><?=$in['roi'] ?><span>%</span></td>
                                    <td><?=$in['duration'] ?> month</td>
                                    <td><span>&#x20a6;</span><?=price($in['total_price']) ?></td>
                                    <td>
                                        <div class="progress progress-bg1">
                                            <div class="progress-bar progress-green" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                                                35%
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a href="#investInfoModal<?=$in['farmID'] ?>" data-toggle="modal" rel="tooltip" class="shadow p-1"><i class="text-info fas fa-info-circle fa-1x"></i></a>
                                    </td>
                                </tr>

                                <!-- investment info modal -->
                                <div id="investInfoModal<?=$in['farmID'] ?>" class="modal fade zoom-in">
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
                                                        <p class="subInfo2"><?=$in['farmID'] ?></p>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <p class="subTitle1 mb-1">Farm Name</p>
                                                        <p class="subInfo2"><?=$in['farmName'] ?></p>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <p class="subTitle1 mb-1">Invested on</p>
                                                        <p class="subInfo2"><?=$in['invested'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-4 mb-3">
                                                        <p class="subTitle1 mb-1">Plot</p>
                                                        <p class="subInfo2"><?=$in['plot'] ?></p>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <p class="subTitle1 mb-1">ROI</p>
                                                        <p class="subInfo2"><?=$in['roi'] ?><span>%</span></p>
                                                    </div>

                                                    <div class="col-md-4 mb-3">
                                                        <p class="subTitle1 mb-1">Payout Month</p>
                                                        <p class="subInfo2"><?=$in['payout_month'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-4 mb-3">
                                                        <p class="subTitle1 mb-1">Unit Price</p>
                                                        <p class="subInfo2"><span>&#x20a6;</span><?=price($in['unit_price']) ?></p>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <p class="subTitle1 mb-1">Total Price</p>
                                                        <p class="subInfo2"><span>&#x20a6;</span><?=price($in['total_price']) ?></p>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <p class="subTitle1 mb-1">Total Payout</p>
                                                        <p class="subInfo2"><span>&#x20a6;</span><?=price($in['total_payout']) ?></p>
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
                                    <td hidden><?=$in['farmID'] ?></td>
                                    <td><?=$in['farmName'] ?></td>
                                    <td><span>&#x20a6;</span><?=price($in['unit_price']) ?></td>
                                    <td><?=$in['plot'] ?></td>
                                    <td><?=$in['roi'] ?><span>%</span></td>
                                    <td><?=$in['duration'] ?> month</td>
                                    <td><span>&#x20a6;</span><?=price($in['total_price']) ?></td>
                                    <td>
                                        Pending
                                    </td>
                                    <td class="text-center">
                                        <a href="#!" rel="tooltip" class="shadow p-1"><i class="text-info fas fa-times fa-1x"></i></a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--end of investment table -->

</div>
<!-- /#page-content-wrapper -->