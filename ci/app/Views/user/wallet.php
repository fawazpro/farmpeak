<div class="container-fluid">
  <div class="mt-3">
    <h4>Payout</h4>
    <p>Record of your OMB farm payout</p>
    <i class="text-info hide">swipe table for info</i>
  </div>
  <!-- mypayout table -->
  <div class="m-2 m-sm-0 card">
    <div class="card-body p-0 px-lg-2 py-lg-2">
      <div class="table-responsive">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th hidden>Trans ID</th>
              <th>Date</th>
              <th>Farm Name</th>
              <th>Amount</th>
              <th>Status</th>
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
              </tr>
            <?php else : ?>
              <?php foreach ($inv as $key => $in) : ?>
                <?php if ($in['status'] == 'completed') : ?>
                  <tr>
                    <td hidden><?= $in['farmID'] ?></td>
                    <td><?= $in['invested'] ?></td>
                    <td><?= $in['farmName'] ?></td>
                    <td>&#x20a6;<span id=""><?= price($in['tpayout']) ?></span></td>
                    <td>
                      <span class="badge badge-success px-2">paid</span>
                    </td>
                  </tr>
                <?php else : ?>
                  <tr>
                    <td hidden><?= $in['farmID'] ?></td>
                    <td><?= $in['invested'] ?></td>
                    <td><?= $in['farmName'] ?></td>
                    <td>&#x20a6;<span id=""><?= price($in['tpayout']) ?></span></td>
                    <td>
                      <span class="badge badge-warning px-2"><?= $in['status'] ?></span>
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
  <!-- end of mypayout table -->
</div>
</div>
<!-- /#page-content-wrapper -->
</div>