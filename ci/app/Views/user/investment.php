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
                            <th>Total Amount</th>
                            <th>Total Payout</th>
                            <th>Status</th>
                            <th>Info</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td hidden>10D35</td>
                            <td>Fish Farm</td>
                            <td><span>&#x20a6;</span>35,000</td>
                            <td>3</td>
                            <td>12<span>%</span></td>
                            <td>6 month</td>
                            <td hidden><span>&#x20a6;</span>105,000</td>
                            <td><span>&#x20a6;</span>117,600</td>
                            <td>
                                <div class="progress progress-bg1">
                                    <div class="progress-bar progress-green" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                                        35%
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <a href="#investInfoModal" data-toggle="modal" rel="tooltip" class="shadow p-1"><i class="text-info fas fa-info-circle fa-1x"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td hidden>10D35</td>
                            <td>Tomato Farm</td>
                            <td><span>&#x20a6;</span>50,000</td>
                            <td>3</td>
                            <td>25%</td>
                            <td>6 month</td>
                            <td hidden><span>&#x20a6;</span>150,000</td>
                            <td><span>&#x20a6;</span>187,000</td>
                            <td>
                                <div class="progress progress-bg1">
                                    <div class="progress-bar progress-green" role="progressbar" style="width: 5%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                                        5%
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <a href="#investInfoModal" data-toggle="modal" rel="tooltip" class="shadow p-1"><i class="text-info fas fa-info-circle fa-1x"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td hidden>10D35</td>
                            <td>Cassava Farm</td>
                            <td><span>&#x20a6;</span>70,000</td>
                            <td>4</td>
                            <td>56%</td>
                            <td>6 month</td>
                            <td hidden><span>&#x20a6;</span>280,000</td>
                            <td><span>&#x20a6;</span>436,800</td>
                            <td>
                                <div class="progress progress-bg1">
                                    <div class="progress-bar progress-green" role="progressbar" style="width: 100%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                                        Completed
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <a href="#investInfoModal" data-toggle="modal" rel="tooltip" class="shadow p-1"><i class="text-info fas fa-info-circle fa-1x"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--end of investment table -->

    <!-- investment info modal -->
    <div id="investInfoModal" class="modal fade zoom-in">
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
                            <p class="subInfo2">234HDGE21</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <p class="subTitle1 mb-1">Farm Name</p>
                            <p class="subInfo2">Poultry Farm</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <p class="subTitle1 mb-1">Invested on</p>
                            <p class="subInfo2">22/05/2021</p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <p class="subTitle1 mb-1">Plot</p>
                            <p class="subInfo2">3</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <p class="subTitle1 mb-1">ROI</p>
                            <p class="subInfo2">12<span>%</span></p>
                        </div>

                        <div class="col-md-4 mb-3">
                            <p class="subTitle1 mb-1">Payout Month</p>
                            <p class="subInfo2">December</p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <p class="subTitle1 mb-1">Unit Price</p>
                            <p class="subInfo2"><span>&#x20a6;</span>35,000</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <p class="subTitle1 mb-1">Total Price</p>
                            <p class="subInfo2"><span>&#x20a6;</span>105,000</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <p class="subTitle1 mb-1">Total Payout</p>
                            <p class="subInfo2"><span>&#x20a6;</span>117,600</p>
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
</div>
<!-- /#page-content-wrapper -->