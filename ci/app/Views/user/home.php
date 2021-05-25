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

<div class="container-fluid">
    <div class="mt-3">
        <h4>Farm</h4>
        <p>List of Farmpeak farm</p>
    </div>
    <!-- list of farm -->
    <!-- farm1 -->
    <div class="row">
        <div class="col-md-4 m-sm-0 m-1">
            <a href="farmInfo.html" style="text-decoration: none">
                <div class="card my-1">
                    <div class="card-body m-0 px-2 px-lg-2 py-2">
                        <h5 style="color: #039730">Poultry Farm</h5>
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-1">
                                <div class="mb-1">
                                    <p class="subTitle mb-0">Amount</p>
                                    <p class="subInfo mb-0">
                                        <span>&#x20a6;</span>50 000
                                    </p>
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
                                    <p class="subTitle text-dark mb-0">ROI</p>
                                    <p class="subInfo1 mb-0">23%</p>
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
        <!-- end of farm1 -->

        <!-- farm2 -->
        <div class="col-md-4 m-sm-0 m-1">
            <a href="farmInfo.html" style="text-decoration: none">
                <div class="card my-1">
                    <div class="card-body m-0 px-2 px-lg-2 py-2">
                        <h5 style="color: #039730">Tomato Farm</h5>
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-1">
                                <div class="mb-1">
                                    <p class="subTitle mb-0">Amount</p>
                                    <p class="subInfo mb-0">
                                        <span>&#x20a6;</span>30 500
                                    </p>
                                </div>
                                <div class="mb-1">
                                    <p class="subTitle mb-0">Duration</p>
                                    <p class="subInfo mb-0">7 Months</p>
                                </div>
                                <div class="mb-1">
                                    <p class="subTitle mb-0">Used Plot</p>
                                    <p class="subInfo mb-0">100/100</p>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="text-right">
                                    <p class="subTitle text-dark mb-0">ROI</p>
                                    <p class="subInfo1 mb-0">15%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 class="card-footer m-0 text-center font-weight-bold text-white" style="background-color: #000000">
                        Closed
                    </h5>
                </div>
            </a>
        </div>
        <!-- end of farm2 -->
    </div>

    <!--end of list of farm -->
</div>
</div>
<!-- /#page-content-wrapper -->
</div>