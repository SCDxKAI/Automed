<?php global $s_v_data, $user, $title, $inventory; ?>
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
                                            <h3 class="nk-block-title page-title">Receiveables</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>Confirm receipt of parts into inventory.</p>
                                            </div>
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
                                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Supplier</span></th>
                                                        <th class="nk-tb-col"><span class="sub-text">Vehicle</span></th>
                                                        <th class="nk-tb-col"><span class="sub-text">Item</span></th>
                                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Quantity</span></th>
                                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Unit Cost</span></th>
                                                        <th class="nk-tb-col nk-tb-col-tools text-right">Confirm</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (!empty($inventory)) { ?>
                                                    <?php foreach ($inventory as $index => $item) { ?>
                                                    <tr class="nk-tb-item">
                                                        <td class="nk-tb-col text-center"><?=  $index + 1 ; ?></td>
                                                        <td class="nk-tb-col tb-col-md">
                                                            <?php if (!empty($item->supplier)) { ?>
                                                            <span class="tb-lead"><?=  $item->supplier->name ; ?></span>
                                                            <?php } else { ?>
                                                            <span>--|--</span>
                                                            <?php } ?>
                                                        </td>
                                                        <td class="nk-tb-col">
                                                            <span class="tb-lead"><?=  carmake($item->project->make) ; ?> • <?=  $item->project->registration_number ; ?></span>
                                                        </td>
                                                        <td class="nk-tb-col">
                                                            <span class="tb-lead"><?=  $item->name ; ?></span>
                                                        </td>
                                                        <td class="nk-tb-col tb-col-mb">
                                                                <span class="tb-lead"><?=  $item->quantity ; ?> <?=  $item->quantity_unit ; ?></span>
                                                        </td>
                                                        <td class="nk-tb-col tb-col-mb" data-order="<?=  $item->unit_cost ; ?>">
                                                            <span class="tb-amount"><?=  money($item->unit_cost, $user->parent->currency) ; ?> </span>
                                                        </td>
                                                        <td class="nk-tb-col text-right"><a href="" class="btn btn-primary btn-sm send-to-server-click"  data="inventoryid:<?=  $item->id ; ?>" url="<?=  url('Inventory@confirmreceipt') ; ?>" warning-title="Are you sure?" warning-message="This item will be added to inventory." warning-button="Yes, Confirm!"><em class="icon ni ni-check"></em><span>Confirm Receipt</span> </a></td>
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
