<?php global $s_v_data, $user, $title, $companies; ?>
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
                                            <h3 class="nk-block-title page-title">Companies List</h3>
                                            <div class="nk-block-des text-soft">
                                                <?php if (!empty($companies)) { ?>
                                                <p>A total of <?=  number_format(count($companies)) ; ?> companies.</p>
                                                <?php } else { ?>
                                                <p>View companies list here.</p>
                                                <?php } ?>
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
                                                        <th class="nk-tb-col"><span class="sub-text">Company</span></th>
                                                        <th class="nk-tb-col"><span class="sub-text">Contact</span></th>
                                                        <th class="nk-tb-col"><span class="sub-text">Plan</span></th>
                                                        <th class="nk-tb-col">
                                                            <span class="sub-text" data-toggle="tooltip" title="Projects / Users / Clients">
                                                                 P / U / C <em class="icon ni ni-info-fill"></em>
                                                            </span>
                                                        </th>
                                                        <th class="nk-tb-col"><span class="sub-text">Status</span></th>
                                                        <th class="nk-tb-col nk-tb-col-tools text-right">
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (!empty($companies)) { ?>
                                                    <?php foreach ($companies as $index => $company) { ?>
                                                    <tr class="nk-tb-item">
                                                        <td class="nk-tb-col text-center"><?=  $index + 1 ; ?></td>
                                                        <td class="nk-tb-col">
                                                            <div class="user-card">
                                                                <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                                                                    <span><?=  mb_substr($company->name, 0, 2, "UTF-8") ; ?></span>
                                                                </div>
                                                                <div class="user-info">
                                                                    <span class="tb-lead"><?=  $company->name ; ?> <span class="dot dot-success d-md-none ml-1"></span></span>
                                                                    <span>Last seen <?=  timeAgo(strtotime(timezoned($company->last_activity, "Africa/Nairobi"))) ; ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="nk-tb-col">
                                                            <span><?=  $company->email ; ?></span><br>
                                                            <span><?=  $company->phone ; ?></span>
                                                        </td>
                                                        <td class="nk-tb-col">
                                                            <?php if ($company->admin == "Yes") { ?>
                                                            <span class="tb-amount text-primary fw-bold">Super Admin</span>
                                                            <?php } else if (!empty($company->subscription_plan)) { ?>
                                                            <span class="tb-amount"><?=  $company->plan->name ; ?> </span>
                                                            <span><?=  date("M d, y", strtotime($company->subscription_start)) ; ?> - <?=  date("M d, y", strtotime($company->subscription_end)) ; ?></span>
                                                            <?php } else { ?>
                                                            <span class="tb-amount text-warning">None</span>
                                                            <?php } ?>
                                                        </td>
                                                        <td class="nk-tb-col">
                                                            <span class="tb-amount"><?=  $company->projects ; ?> / <?=  $company->users ; ?> / <?=  $company->clients ; ?> </span>
                                                        </td>
                                                        <td class="nk-tb-col">
                                                            <?php if ($company->subscription_status == "Active") { ?>
                                                            <span class="badge badge-sm badge-dot has-bg badge-success d-mb-inline-flex">Active</span>
                                                            <?php } else if ($company->subscription_status == "Cancelled") { ?>
                                                            <span class="badge badge-sm badge-dot has-bg badge-warning d-mb-inline-flex">Cancelled</span>
                                                            <?php } else if ($company->subscription_status == "Expired") { ?>
                                                            <span class="badge badge-sm badge-dot has-bg badge-danger d-mb-inline-flex">Expired</span>
                                                            <?php } ?>
                                                        </td>
                                                        <td class="nk-tb-col nk-tb-col-tools">
                                                            <ul class="nk-tb-actions gx-1">
                                                                <li>
                                                                    <div class="drodown">
                                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <ul class="link-list-opt no-bdr">
                                                                            <li><a class="fetch-display-click" data="companyid:<?=  $company->id ; ?>" url="<?=  url('Companies@updateview') ; ?>" holder=".update-holder-regular" modal="#update-regular" href=""><em class="icon ni ni-pen"></em><span>Edit Details</span></a></li>
                                                                            <li><a href="" class="send-sms" data-phonenumber="<?=  $company->phone ; ?>" data-name="<?=  $company->name ; ?>"><em class="icon ni ni-chat-circle"></em><span>Send SMS</span></a></li>
                                                                            <li><a href="" class="send-email" data-email="<?=  $company->email ; ?>"><em class="icon ni ni-mail"></em><span>Send Email</span></a></li>
                                                                            <li class="divider"></li>
                                                                            <li><a class="send-to-server-click"  data="companyid:<?=  $company->id ; ?>" url="<?=  url('Companies@delete') ; ?>" warning-title="Are you sure?" warning-message="This company's profile and data will be deleted permanently." warning-button="Yes, delete!" href=""><em class="icon ni ni-trash"></em><span>Delete Co.</span></a></li>
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
    

    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="<?=  asset('assets/js/bundle.js') ; ?>"></script>
    <script src="<?=  asset('assets/js/scripts.js') ; ?>"></script>
    <script src="<?=  asset('assets/js/simcify.min.js') ; ?>"></script>
    <script src="<?=  asset('assets/js/intlTelInput.min.js') ; ?>"></script>
    <script src="<?=  asset('assets/js/asilify.js') ; ?>"></script>
</body>

</html>
<?php return;
