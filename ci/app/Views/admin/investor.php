<div class="container-fluid">
          <div class="mt-3">
            <h4>Investor</h4>
            <p>List of OMB farm Investors</p>
          </div>

          <!-- investors -->
          <div class="row">
            <div class="col-12 m-sm-0 m-1">
              <div class="card p-2 mb-4">
                <div class="card-body">
                  <div class="table-responsive">
                    <table
                      class="table table-bordered"
                      id="dataTable"
                      width="100%"
                    >
                      <thead class="thead-dark">
                        <tr class="text-center">
                          <th>Name</th>
                          <th>Email</th>
                          <th>Tel</th>
                          <th>Clearance</th>
                          <th>Details</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php if(empty($inv)): ?>
                        <tr> No investment yet!! </tr>
                        <?php else : ?>
                        <?php foreach ($inv as $key => $in) : ?>
                        <tr>
                          <td><?= $in['name'] ?></td>
                          <td><?= $in['email'] ?></td>
                          <td><?= $in['tel'] ?></td>
                          <td><?= $in['plot'] ?></td>
                          <td class="text-center">
                            <a href="investorinfo?user=<?= $in['id'] ?>" class="shadow px-3 py-1"
                              ><i class="text-info fas fa-info-circle fa-1x"></i
                            ></a>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--end of investors -->
        </div>
      </div>
      <!-- /#page-content-wrapper -->
    </div>