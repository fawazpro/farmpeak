<div class="container-fluid">
          <div class="mt-3 mb-1">
            <h4>Paystack Transactions</h4>
            <!-- <p>List of OMB farm Investors</p> -->
          </div>

          <!-- list of paystack transaction -->

          <div class="row">
            <div class="col-12 m-sm-0 m-1">
              <div class="card p-1 mb-4">
                <div class="card-body">
                  <div class="table-responsive">
                    <table
                      class="table table-bordered"
                      id="dataTable"
                      width="100%"
                    >
                      <thead class="thead-dark">
                        <tr class="">
                          <th>Date</th>
                          <th>Trans ID</th>
                          <th>Amount</th>
                          <th>Payment from</th>
                          <th>Full Name</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php foreach ($inv as $key => $in): ?>
                        <tr>
                          <td><?=$in['date']?></td>
                          <td><?=$in['trans_id']?></td>
                          <td><span>&#x20a6;</span><?=price($in['amount']/100)?></td>
                          <td><?=$in['email']?></td>
                          <td><?=$in['user']['fname'].' '.$in['user']['lname']?></td>
                          <?php if($in['status'] == 'initiated'): ?>
                          <td>
                            <span class="badge badge-warning px-2">Initiated</span>
                          </td>
                          <?php elseif ($in['status'] == 'success'): ?>
                            <td>
                            <span class="badge badge-success px-2">Paid</span>
                          </td>
                          <?php elseif ($in['status'] == 'cancelled'): ?>
                            <td>
                            <span class="badge badge-danger px-2">Cancelled</span>
                          </td>
                          <?php endif; ?>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end of paystack transaction -->
        </div>
      </div>
      <!-- /#page-content-wrapper -->
    </div>
