<?php global $s_v_data, $user, $title, $payments; ?>
<?= view( 'includes/head', $s_v_data ); ?>

<body class="nk-body bg-lighter npc-default has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <?= view( 'includes/sidebar', $s_v_data ); ?>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <?= view( 'includes/header', $s_v_data ); ?>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Billing Payments</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>A list of all your billing payments.</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">
                                                        <li><a href="" class="btn btn-outline-light bg-white d-sm-inline-flex go-back"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                                    </ul>
                                                </div>
                                            </div><!-- .toggle-wrap -->
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="card card-stretch">
                                        <div class="card-inner">
                                            <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                                <thead>
                                                    <tr class="nk-tb-item nk-tb-head">
                                                        <th class="nk-tb-col text-center">#</th>
                                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Bill For</span></th>
                                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Date</span></th>
                                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Method</span></th>
                                                        <th class="nk-tb-col"><span class="sub-text">Amount</span></th>
                                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php if (!empty($payments)) { ?>
                                                <?php foreach ($payments as $index => $payment) { ?>
                                                <tr class="nk-tb-item">
                                                    <td class="nk-tb-col text-center"><?=  $index + 1 ; ?></td>
                                                    <td class="nk-tb-col tb-col-md">
                                                        <div class="user-card">
                                                            <div class="user-info">
                                                                <span class="tb-lead"><?=  $payment->company->name ; ?></span>
                                                                <span><?=  date("M j, Y H:i", strtotime($payment->created_at)) ; ?></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="nk-tb-col tb-col-md">
                                                        <span><?=  $payment->description ; ?></span>
                                                    </td>
                                                    <td class="nk-tb-col tb-col-md">
                                                        <span class="text-capitalize">Card • ***<?=  $payment->card_last4 ; ?></span>
                                                    </td>
                                                    <td class="nk-tb-col">
                                                        <span class="tb-amount"><?=  money($payment->amount, $payment->currency) ; ?></span>
                                                    </td>
                                                    <td class="nk-tb-col tb-col-md">
                                                        <span class="badge badge-sm badge-dot has-bg badge-success d-mb-inline-flex">Paid</span>
                                                    </td>
                                                </tr><!-- .nk-tb-item  -->
                                                <?php } ?>
                                                <?php } else { ?>
                                                <tr>
                                                    <td class="text-center" colspan="7">It's empty here!</td>
                                                </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div><!-- .card -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                <!-- footer @s -->
                <?= view( 'includes/footer', $s_v_data ); ?>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>


    <!-- app-root @e -->
    <!-- JavaScript -->
    <?= view( 'includes/scripts', $s_v_data ); ?>
</body>

</html>
<?php return;
