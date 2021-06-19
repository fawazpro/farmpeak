
<div class="container-fluid">
    <div class="mt-3">
        <h4>Farm</h4>
        <p>List of Farmpeak farm</p>
    </div>
    <div class="text-right">
        <a href="#addFarmModal" data-toggle="modal" class="btn" style="background-color: #023c74 !important; color: #ffffff"><i style="font-size: 19px" class="fas fa-plus-circle mr-2"></i>Add Farm</a>
    </div>
    <!-- list of farm -->
    <!-- farm1 -->
    <div class="row">
    <?php foreach ($products as $prod): ?>
        <div class="col-md-4 m-sm-0 m-1">
            <a href="editpackage?id=<?=$prod['id']?>" style="text-decoration: none">
                <div class="card my-1">
                    <div class="card-body m-0 px-2 px-lg-2 py-2">
                        <h5 style="color: #023c74"><?=$prod['name']?></h5>
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-1">
                                <div class="mb-1">
                                    <p class="subTitle mb-0">Amount</p>
                                    <p class="subInfo mb-0">
                                        <span>&#x20a6;</span><?=price($prod['unit_price'])?>
                                    </p>
                                </div>
                                <div class="mb-1">
                                    <p class="subTitle mb-0">Duration</p>
                                    <p class="subInfo mb-0"><?=$prod['duration']?> Months</p>
                                </div>
                                <div class="mb-1">
                                    <p class="subTitle mb-0">Used Plot</p>
                                    <p class="subInfo mb-0"><?=$prod['status']?>/<?=$prod['unit_stock']?></p>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="text-right">
                                    <p class="subTitle text-dark mb-0">ROI</p>
                                    <p class="subInfo1Admin mb-0"><?=$prod['ROI']?>%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 class="card-footer m-0 text-center font-weight-bold text-white" style="background-color: #023c74">
                        Edit
                    </h5>
                </div>
            </a>
        </div>
        <?php endforeach; ?>
        <!-- end of farm1 -->
    </div>
    <!--end of list of farm -->

    <!-- add farm modal -->
    <div id="addFarmModal" class="modal fade zoom-in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #023c74">
                    <h3 class="modal-title text-white ml-auto">Add Farm</h3>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                </div>
                <form action="addpackage" method="post">
                    <div class="modal-body p-4">
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <label for="farmName">Farm Name</label>
                                <input type="text" class="form-control" id="farmName" name="name" placeholder="Farm Name" maxlength="27" required />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="farmAmount">Plot (in numbers)</label>
                                <input type="text" class="form-control" id="farmPlot" name="unit_stock" placeholder="Plot" required />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="farmAmount">Amount (per plot)</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text px-2">&#x20a6;</span>
                                    </div>
                                    <input type="text" class="form-control" id="farmAmount" name="unit_price" placeholder="Amount" required />
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="farmDuration">Duration (in num)</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="farmDuration" name="duration" placeholder="1" required />
                                    <div class="input-group-append">
                                        <span class="input-group-text px-1">Month(s)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="farmDesc">Description</label>
                                <textarea id="farmDesc" class="form-control" name="description">
                        </textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label for="farmRoi">ROI</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="farmRoi" name="ROI" placeholder="ROI" maxlength="3" max="100" min="1" required />
                                    <div class="input-group-append">
                                        <span class="input-group-text px-2">%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <label for="farmStatus">Status</label>
                                <select id="farmStatus" class="form-control" name="status">
                                    <option value="">Open</option>
                                    <option value="">Closed</option>
                                </select>
                            </div>
                        </div>
                        <!-- submit -->
                        <button type="submit" class="btn btn-block" style="background-color: #023c74; color: #ffffff">
                            Add Farm
                        </button>
                        <!-- end of submit button -->
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end of add farm modal -->
</div>
</div>
<!-- /#page-content-wrapper -->
</div>