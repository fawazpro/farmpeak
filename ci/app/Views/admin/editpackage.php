<div class="container-fluid">
    <div class="mt-3">
        <h4>
            <a href="dashboard" style="color: #023c74">Farm</a>
            > farm info
        </h4>
        <p>Edit farm information</p>
    </div>
    <!-- Admin form info edit -->

    <div class="row justify-content-center">
        <div class="col-md-8 m-sm-0 m-1">
            <form action="editpackage" method="post" class="card p-4">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="farmId">Farm ID</label>
                        <input type="text" value="<?=$id?>" id="farmId" name="id" class="form-control"  readonly />
                    </div>
                    <div class="col-md-8 mb-3">
                        <label for="farmName">Farm Name</label>
                        <input type="text" class="form-control" id="farmName" placeholder="Farm Name" name="name" value="<?=$name?>" maxlength="27" required />
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="farmAmount">Plot (in numbers)</label>
                        <input type="text" class="form-control" id="farmPlot" placeholder="Plot" name="unit_stock" value="<?=$unit_stock?>" required />
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="farmAmount">Amount (per plot)</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text px-2">&#x20a6;</span>
                            </div>
                            <input type="text" class="form-control" id="farmAmount" placeholder="Amount" name="unit_price" value="<?=$unit_price?>" required />
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="farmDuration">Duration (in numbers)</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="farmDuration" name="duration" placeholder="Duration" value="<?=$duration?>" required />
                            <div class="input-group-append">
                                <span class="input-group-text px-1">Month(s)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="farmDesc">Description</label>
                        <textarea id="farmDesc" class="form-control" name="description"><?=$description?></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="farmRoi">ROI</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="farmRoi" placeholder="ROI" name="ROI" value="<?=$ROI?>" maxlength="3" max="100" min="1" required />
                            <div class="input-group-append">
                                <span class="input-group-text px-2">%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="farmStatus">Status</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="status" id="farmStatus" value="<?=$status?>"  max="100" min="1" required />
                            <div class="input-group-append">
                                <span class="input-group-text px-2">of <?=$unit_stock?></span>
                            </div>
                    </div>
                </div>
                <!-- submit -->
                <button type="submit" class="btn btn-block" style="background-color: #023c74; color: #ffffff">
                    Update
                </button>
                <!-- end of submit button -->
            </form>
        </div>
    </div>

    <!--end of Admin form info edit -->
</div>
</div>
<!-- /#page-content-wrapper -->
</div>