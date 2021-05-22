<?php
function price(int $pri)
{
    $len =  mb_strlen($pri);
    if ($len == 4) {
        $end = substr($pri, -3);
        $first = substr($pri, 0, 1);
        return $first . ',' . $end;
    } elseif ($len == 3) {
        return $pri;
    } elseif ($len == 2) {
        return $pri;
    } elseif ($len == 1) {
        return $pri;
    } elseif ($len == 5) {
        $end = substr($pri, -3);
        $first = substr($pri, 0, 2);
        return $first . ',' . $end;
    } elseif ($len == 6) {
        $end = substr($pri, -3);
        $first = substr($pri, 0, 3);
        return $first . ',' . $end;
    } elseif ($len == 7) {
        $end = substr($pri, -3);
        $mid = substr($pri, -6, 3);
        $first = substr($pri, 0, 1);
        return $first . ',' . $mid . ',' . $end;
    } elseif ($len == 8) {
        $end = substr($pri, -3);
        $mid = substr($pri, -6, 3);
        $first = substr($pri, 0, 2);
        return $first . ',' . $mid . ',' . $end;
    }
}
function type($t)
{
    if ($t == 'p') {
        return 'Order';
    } else if ($t == 'c') {
        return 'Withdrawal';
    }
}
?>
<!-- Begin page content -->
<main class="flex-shrink-0 main-container pb-0">
    <!-- page content goes here -->
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="container mt-4">
                <div class="card border-0 shadow bg-default text-white">
                    <div class="card-body">
                        <p class="mb-2">Balance: <small class="text-mute">&#x20a6;<?= price($user['balance']) ?></small></p>
                        <div class="row mb-2">
                            <div class="col">

                                <h1>&#x20a6;<?= price($user['balance']) ?> <span class="float-right"> <a href="" class="text-white" data-toggle="modal" data-target="#withdraw">Withdraw <i class="material-icons h1">send</i></a></span></h1>
                            </div>
                        </div>
                        <div class="progress bg-light-primary h-5 mb-2">
                            <div class="progress-bar bg-white" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                        </div>
                        <p>ID: <span class="text-mute"><?= $user['id'] ?></p>
                    </div>
                </div>
            </div>
            <div class="container">
                <h6 class="page-subtitle">Quick Bills</h6>
                <div class="card shadow-sm border-0 mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="font-weight-normal mb-1">$ 1048.00 </h5>
                                <p class="text-mute small text-secondary mb-2">20d to pay electricity bill</p>
                                <div class="progress h-5 bg-light-warning">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width:35%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-auto align-self-center">
                                <button class="btn btn-44 default-shadow border-0 bg-default">
                                    <i class="material-icons">local_atm</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow-sm border-0 mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="font-weight-normal mb-1">$ 150.00 </h5>
                                <p class="text-mute small text-secondary mb-2">5d to pay telephone bill</p>
                                <div class="progress h-5 bg-light-danger">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width:80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-auto align-self-center">
                                <button class="btn btn-44 default-shadow border-0 bg-default">
                                    <i class="material-icons">local_atm</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mb-4 px-2">
                <h6 class="page-subtitle">Investment Packages
                    <p class="float-right"><a href="market">View all</a></p>
                </h6>

                <div class="swiper-container swiper-offers">
                    <div class="swiper-wrapper">
                        <?php foreach ($products as $key => $prod) : ?>
                            <div class="swiper-slide w-auto p-2">
                                <div class="card shadow-sm border-0">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <a href="details?sku=<?= $prod['id'] ?>">
                                                    <img class="" src="<?= $dir_img ?><?= $prod['image'] ?>" height="150" alt="">
                                                    <h6 class="mt-2  text-mute"><?= $prod['name'] ?></h6>
                                                </a>
                                                <p class="float-right">&#x20a6;<?= price($prod['price']) ?></p>
                                                <a href="#" title="Add to Cart" data-name="<?= $prod['name'] ?>" data-img=<?= $prod['image'] ?> data-price="<?= $prod['price'] ?>" style="font-size: smaller;" class="btn btn-outline-danger add-to-cart">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Modal -->
<div class="modal fade mt-5" id="withdraw" tabindex="-1" role="dialog" aria-labelledby="withdrawal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cash Withdrawal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="container">
                        <form method="post" action="withdraw">
                            <div class="col text-center">
                                <label for="inputName" class="col-sm-1-12 col-form-label">Amount: </label>
                            </div>
                            <div class="form-group col">
                                <div class="col-sm-1-12">
                                    <input type="number" class="form-control" name="amount" placeholder="Amount" max="<?= (int)$user['balance'] - (0.025 * (int)$user['balance']) ?>">
                                </div>
                            </div>

                    </div>
                    <p class="text-center text-dark-50 h6">Max Withrawal: &#x20a6;<?= price((int)$user['balance'] - (0.025 * (int)$user['balance'])) ?></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <?php if ($b_acc) : ?>
                    <p>You can't withdraw because your bank details is incomplete. <a href="profile">Edit Account</a></p>
                    <button disabled type="submit" class="btn btn-primary">Withdraw</button></form>
                <?php else : ?>
                    <button type="submit" class="btn btn-primary">Withdraw</button></form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
    $('#exampleModal').on('show.bs.modal', event => {
        var button = $(event.relatedTarget);
        var modal = $(this);
        // Use above variables to manipulate the DOM

    });
</script>
<!-- End of page content -->