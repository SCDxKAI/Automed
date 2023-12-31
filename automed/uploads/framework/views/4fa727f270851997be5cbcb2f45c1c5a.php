<?php global $s_v_data, $user, $title, $plans; ?>
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
                                            <h3 class="nk-block-title page-title"><?=  $title ; ?></h3>
                                            <div class="nk-block-des text-soft">
                                                <p>Create and manage subscription plans here.</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">  
                                                        <li>
                                                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#create"><em class="icon ni ni-plus"></em> <span>Create a Plan</span></a>
                                                        </li>           
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
                                                        <th class="nk-tb-col"><span class="sub-text">Name</span></th>
                                                        <th class="nk-tb-col"><span class="sub-text">Users / Projects</span></th>
                                                        <th class="nk-tb-col"><span class="sub-text">Free Trial</span></th>
                                                        <th class="nk-tb-col"><span class="sub-text">Monthly</span></th>
                                                        <th class="nk-tb-col"><span class="sub-text">Annualy</span></th>
                                                        <th class="nk-tb-col"><span class="sub-text">Subscribed</span></th>
                                                        <th class="nk-tb-col nk-tb-col-tools text-right"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (!empty($plans)) { ?>
                                                    <?php foreach ($plans as $index => $plan) { ?>
                                                    <tr class="nk-tb-item">
                                                        <td class="nk-tb-col text-center"><?=  $index + 1 ; ?></td>
                                                        <td class="nk-tb-col tb-col-mb">
                                                            <span class="tb-amount"><?=  $plan->name ; ?> </span>
                                                        </td>
                                                        <td class="nk-tb-col"> 
                                                            <?php if (!empty($plan->users_limit)) { ?>
                                                            <span><?=  number_format($plan->users_limit) ; ?></span> / 
                                                            <?php } else { ?>
                                                            <span>∞</span> / 
                                                            <?php } ?>
                                                            <?php if (!empty($plan->projects_limit)) { ?>
                                                            <span><?=  number_format($plan->projects_limit) ; ?></span> 
                                                            <?php } else { ?>
                                                            <span>∞</span> 
                                                            <?php } ?>
                                                        </td>
                                                        <td class="nk-tb-col">
                                                            <?php if (!empty($plan->trial_days)) { ?>
                                                            <span><?=  number_format($plan->trial_days) ; ?> days</span> 
                                                            <?php } else { ?>
                                                            <span class="text-warning">None</span> 
                                                            <?php } ?>
                                                        </td>
                                                        <td class="nk-tb-col"> <span><?=  money($plan->monthly_fee, "subscription_currency") ; ?></span> </td>
                                                        <td class="nk-tb-col"> <span><?=  money($plan->annual_fee, "subscription_currency") ; ?></span> </td>
                                                        <td class="nk-tb-col tb-col-mb">
                                                            <span class="badge badge-sm badge-dot has-bg badge-success d-mb-inline-flex"><?=  number_format($plan->companies) ; ?></span>
                                                        </td>
                                                        <td class="nk-tb-col nk-tb-col-tools">
                                                            <ul class="nk-tb-actions gx-1">
                                                                <li>
                                                                    <div class="drodown">
                                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <li><a href="<?=  url('Companies@get', array('makeid' => $make->id)) ; ?>"><em class="icon ni ni-eye"></em><span>Subscribed Companies</span></a></li>
                                                                                <li><a class="fetch-display-click" data="planid:<?=  $plan->id ; ?>" url="<?=  url('Plans@updateview') ; ?>" holder=".update-holder-regular" modal="#update-regular" href=""><em class="icon ni ni-pen"></em><span>Edit Plan</span></a></li>
                                                                                <li class="divider"></li>
                                                                                <li><a href="" class="send-to-server-click"  data="planid:<?=  $plan->id ; ?>" url="<?=  url('Plans@delete') ; ?>" warning-title="Are you sure?" warning-message="This plan will be deleted permanently." warning-button="Yes, delete!"><em class="icon ni ni-trash"></em><span>Delete Make</span></a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr><!-- .nk-tb-item  -->
                                                    <?php } ?>
                                                    <?php } else { ?>
                                                    <tr>
                                                        <td class="text-center" colspan="8">It's empty here!</td>
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

    <!-- Create Modal -->
    <div class="modal fade" tabindex="-1" id="create">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <div class="modal-header">
                    <h5 class="modal-title">Create a subscription plan</h5>
                </div>
                <form class="simcy-form" action="<?=  url('Plans@create') ; ?>" data-parsley-validate="" method="POST" loader="true">
                    <div class="modal-body">
                        <p>Create a subscription plan</p>
                        <div class="row gy-4">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control form-control-lg" placeholder="Name" name="name" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Short Description</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control form-control-lg" placeholder="Short Description" name="description" required="">
                                    </div>
                                    <div class="form-note">i.e: Good for teams.</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Monthly Fee</label>
                                    <div class="form-control-wrap">
                                        <div class="form-text-hint">
                                            <span class="overline-title"><?=  currency(env("SUBSCRIPTION_CURRENCY")) ; ?></span>
                                        </div>
                                        <input type="number" class="form-control form-control-lg" placeholder="Monthly Fee" name="monthly_fee" data-parsley-pattern="^[0-9]\d*(\.\d+)?$" step="0.01" min="0.00" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Annual Fee</label>
                                    <div class="form-control-wrap">
                                        <div class="form-text-hint">
                                            <span class="overline-title"><?=  currency(env("SUBSCRIPTION_CURRENCY")) ; ?></span>
                                        </div>
                                        <input type="number" class="form-control form-control-lg" placeholder="Annual Fee" name="annual_fee" data-parsley-pattern="^[0-9]\d*(\.\d+)?$" step="0.01" min="0.00" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Free Trial Days</label>
                                    <div class="form-control-wrap">
                                        <input type="number" class="form-control form-control-lg" placeholder="Free Trial Days" name="trial_days" min="1">
                                    </div>
                                    <div class="form-note">Leave empty for no trial period</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">User Limits</label>
                                    <div class="form-control-wrap">
                                        <input type="number" class="form-control form-control-lg" placeholder="User Limits" name="users_limit" min="1">
                                    </div>
                                    <div class="form-note">Leave empty for unlimited</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Project Limits</label>
                                    <div class="form-control-wrap">
                                        <input type="number" class="form-control form-control-lg" placeholder="Project Limits" name="projects_limit" min="1">
                                    </div>
                                    <div class="form-note">Leave empty for unlimited</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button class="btn btn-white btn-dim btn-outline-light" type="button" data-dismiss="modal"><em class="icon ni ni-cross-circle"></em><span>Cancel</span></button>
                        <button class="btn btn-primary" type="submit"><em class="icon ni ni-check-circle-cut"></em><span>Create a Plan</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- app-root @e -->
    <!-- JavaScript -->
    <?= view( 'includes/scripts', $s_v_data ); ?>
</body>

</html>
<?php return;
