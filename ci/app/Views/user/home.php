<div class="container-fluid">
    <div class="mt-3">
        <h4>Farm</h4>
        <p>List of OMB farm</p>
    </div>
    <!-- list of farm -->
    <div class="row">
        <?php foreach ($products as $prod) : ?>
            <?php if ($prod['io'] == 'open'):?>
            <div class="col-md-4 m-sm-0 m-1">
                <a href="#addInvestModal<?= $prod['id'] ?>" data-toggle="modal" style="text-decoration: none">
                    <div class="card my-1">
                        <div class="card-body m-0 px-2 px-lg-2 py-2">
                            <h5 style="color: #039730"><?= $prod['name'] ?></h5>
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-1">
                                    <div class="mb-1">
                                        <p class="subTitle mb-0">Amount</p>
                                        <p class="subInfo mb-0">
                                            <span>&#x20a6;</span><?= price($prod['unit_price']) ?>
                                        </p>
                                    </div>
                                    <div class="mb-1">
                                        <p class="subTitle mb-0">Duration</p>
                                        <p class="subInfo mb-0"><?= $prod['duration'] ?> Months</p>
                                    </div>
                                    <div class="mb-1">
                                        <p class="subTitle mb-0">Unit Used</p>
                                        <p class="subInfo mb-0"><?= $prod['status'] ?>/<?= $prod['unit_stock'] ?></p>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="text-right">
                                        <p class="subTitle text-dark mb-0">ROI</p>
                                        <p class="subInfo1 mb-0"><?= $prod['ROI'] ?>%</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h5 class="card-footer m-0 text-center font-weight-bold text-white" style="background-color: #039730">
                            Invest
                        </h5>
                    </div>
                </a>
            </div>
            <!-- add farm modal -->
            <div id="addInvestModal<?= $prod['id'] ?>" class="modal fade zoom-in">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #025c1d">
                            <h3 class="modal-title text-white ml-auto">
                                Investment Info
                            </h3>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">
                                &times;
                            </button>
                        </div>
                        <form method="post" action="processpay">
                            <div class="modal-body p-4">
                                <div class="form-row">
                                    <div class="col-md-4 mb-2">
                                        <p class="subTitle1 mb-1">Farm ID</p>
                                        <p class="subInfo2"><?= $prod['id'] ?></p>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <p class="subTitle1 mb-1">Farm Name</p>
                                        <p class="subInfo2"><?= $prod['name'] ?></p>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <p class="subTitle1 mb-1">Price (per unit)</p>
                                        <!-- help in rendering plotPrice1 nd totalPrice1 with diff id on diff modal -->
                                        <p class="subInfo2">
                                            &#x20a6;<span id="plotPrice<?= $prod['id'] ?>"><?= price($prod['unit_price']) ?></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-2">
                                        <p class="subTitle1 mb-1">Unit Used</p>
                                        <p class="subInfo2"> <span id="plotUsed<?= $prod['id'] ?>"><?= $prod['status'] ?></span>/ <span id="totalPlot<?= $prod['id'] ?>"><?= $prod['unit_stock'] ?></span> </p>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <p class="subTitle1 mb-1">Duration</p>
                                        <p class="subInfo2"><?= $prod['duration'] ?> Months</p>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <p class="subTitle1 mb-1">ROI</p>
                                        <p class="subInfo2"><?= $prod['ROI'] ?>%</p>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-0">
                                        <p class="subTitle1 mb-1">Description</p>
                                        <p class="subInfo2">
                                            <?= $prod['description'] ?>
                                        </p>
                                    </div>
                                </div>

                                <hr />
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="buyPlot" class="subTitle1">
                                            No of units will you invest in?</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="buyPlot<?= $prod['id'] ?>" name="plot" min="1" onkeyup="calculate<?= $prod['id'] ?>()" required />
                                            <input type="hidden" class="form-control" name="name" value="<?= $prod['name'] ?>">
                                            <div class="input-group-append">
                                                <span class="input-group-text appended px-2">plot(s)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <p class="subTitle1 mb-1">Total Price</p>
                                        <!-- help in rendering plotPrice1 nd totalPrice1 with diff id on diff modal -->
                                        <p class="subInfo3" id="totalPrice<?= $prod['id'] ?>"></p>
                                    </div>
                                </div>
                                <!-- submit -->
                                <button id="investBtn<?= $prod['id'] ?>" type="submit" disabled="" class="btn btn-block" style="background-color: #025c1d; color: #ffffff">
                                    Invest
                                </button>
                                <!-- end of submit button -->
                            </div>
                        </form>
                        <script>
                            // help me in feeding diff plotPrice Id nd totalPrice1 to script if needed
                            function calculate<?= $prod['id'] ?>() {
                                // plotUsed<?= $prod['id'] ?>, totalPlot<?= $prod['id'] ?>, investBtn<?= $prod['id'] ?>
                                let formatTotalprice;
                                let availablePlot;


                                let plotPrice = parseInt(
                                    document
                                    .getElementById("plotPrice<?= $prod['id'] ?>")
                                    .innerHTML.replace(/,/g, "")
                                );
                                let investBtn = document.getElementById("investBtn<?= $prod['id'] ?>");
                                

                                let plotUsed = parseInt(
                                    document
                                    .getElementById("plotUsed<?= $prod['id'] ?>")
                                    .innerHTML.replace(/,/g, "")
                                );
                                let totalPlot = parseInt(
                                    document
                                    .getElementById("totalPlot<?= $prod['id'] ?>")
                                    .innerHTML.replace(/,/g, "")
                                );
                                
                                let plotNo = parseInt(
                                    document.getElementById("buyPlot<?= $prod['id'] ?>").value
                                );

                                availablePlot = totalPlot - plotUsed;

                                if(plotNo > availablePlot){
                                    investBtn.disabled = true;
                                    formatTotalprice = "Exceeds available plot";
                                } else if (isNaN(plotNo)) {
                                    investBtn.disabled = true;
                                    formatTotalprice = "Invalid input";
                                } else {
                                    investBtn.disabled = false;
                                    let totalPrice = plotNo * plotPrice;
                                    formatTotalprice = formatter.format(totalPrice);
                                }

                                document.getElementById(
                                    "totalPrice<?= $prod['id'] ?>"
                                ).innerHTML = formatTotalprice;
                            }
                            var formatter = new Intl.NumberFormat("en-NG", {
                                style: "currency",
                                currency: "NGN",
                            });
                        </script>
                    </div>
                </div>
            </div>
            <!-- end of add farm modal -->
            <?php endif; ?>
        <?php endforeach; ?>
        <!-- end of farm1 -->
    </div>

    <!--end of list of farm -->

</div>
<!-- /#page-content-wrapper -->
</div>