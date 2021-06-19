<div class="container-fluid">
  <div class="mt-3">
    <h4>
      <a href="dashboard" style="color: #039730">Farm</a>
      > farm info
    </h4>
    <p>Detailed farm information</p>
  </div>
  <!-- list of farm -->
  <!-- farm1 -->
  <div class="row">
    <div class="col-md-4 m-sm-0 m-1">
      <div class="card my-1">
        <div class="card-body m-0 px-2 px-lg-2 py-2">
          <h5 style="color: #039730"><?= $name ?></h5>
          <div class="row no-gutters align-items-center">
            <div class="col mr-1">
              <div class="mb-1">
                <p class="subTitle mb-0">Amount</p>
                <p class="subInfo mb-0"><span>&#x20a6;</span>50 000</p>
              </div>
              <div class="mb-1">
                <p class="subTitle mb-0">Duration</p>
                <p class="subInfo mb-0">6 Months</p>
              </div>
              <div class="mb-1">
                <p class="subTitle mb-0">Used Plot</p>
                <p class="subInfo mb-0">0/200</p>
              </div>
            </div>
            <div class="col-auto">
              <div class="text-right">
                <p class="subTitle mb-0">ROI</p>
                <p class="subInfo1 mb-0">23%</p>
              </div>
            </div>
          </div>
        </div>
        <button class="card-footer m-0 text-center font-weight-bold text-white" style="background-color: #039730" data-toggle="modal" data-target="#plot">
          Invest
        </button>
      </div>
    </div>
    <!-- end of farm1 -->
  </div>

  <!--end of list of farm -->
</div>
</div>
<!-- /#page-content-wrapper -->
</div>

<!-- Modal -->
<div class="modal fade" id="plot" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Buy Plots</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <form method="post" action="processpay">
            <div class="form-group row">
              <label for="inputName" class="col-sm-1-12 col-form-label">Number of Plots</label>
              <div class="col-sm-1-12">
                <input type="number" class="form-control" name="plot" id="inputName" placeholder="">
                <input type="hidden" class="form-control" name="name" value="<?=$name?>">
              </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Pay</button>
      </div>
      </form>
    </div>
  </div>
</div>