<?php global $s_v_data, $user, $title, $makes; ?>
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
                                                <p>Create and manage makes and models here.</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">  
                                                        <li>
                                                         <a href="" class="btn btn-outline-light bg-white d-none d-sm-inline-flex go-back"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                                            <a href="" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none go-back"><em class="icon ni ni-arrow-left"></em></a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#create"><em class="icon ni ni-plus"></em> <span>Add Make</span></a>
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
                                                        <th class="nk-tb-col"><span class="sub-text">Models</span></th>
                                                        <th class="nk-tb-col"><span class="sub-text">Added On</span></th>
                                                        <th class="nk-tb-col"><span class="sub-text">Status</span></th>
                                                        <th class="nk-tb-col nk-tb-col-tools text-right"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (!empty($makes)) { ?>
                                                    <?php foreach ($makes as $index => $make) { ?>
                                                    <tr class="nk-tb-item">
                                                        <td class="nk-tb-col text-center"><?=  $index + 1 ; ?></td>
                                                        <td class="nk-tb-col tb-col-mb">
                                                            <span class="tb-amount"><?=  $make->name ; ?> </span>
                                                        </td>
                                                        <td class="nk-tb-col">
                                                            <span><?=  number_format($make->models) ; ?></span>
                                                        </td>
                                                        <td class="nk-tb-col">
                                                            <span><?=  date("F j, Y", strtotime($make->created_at)) ; ?></span>
                                                        </td>
                                                        <td class="nk-tb-col tb-col-mb">
                                                            <?php if ($make->status == "Enabled") { ?>
                                                            <span class="badge badge-sm badge-dot has-bg badge-success d-mb-inline-flex">Enabled</span>
                                                            <?php } else { ?>
                                                            <span class="badge badge-sm badge-dot has-bg badge-danger d-mb-inline-flex">Disabled</span>
                                                            <?php } ?>
                                                        </td>
                                                        <td class="nk-tb-col nk-tb-col-tools">
                                                            <ul class="nk-tb-actions gx-1">
                                                                <li>
                                                                    <div class="drodown">
                                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <li><a href="<?=  url('Models@get', array('makeid' => $make->id)) ; ?>"><em class="icon ni ni-eye"></em><span>View Models</span></a></li>
                                                                                <?php if ($make->company == $user->company || $user->role == "Admin" && is_null($make->company)) { ?>
                                                                                <li><a class="fetch-display-click" data="makeid:<?=  $make->id ; ?>" url="<?=  url('Makes@updateview') ; ?>" holder=".update-holder-regular" modal="#update-regular" href=""><em class="icon ni ni-pen"></em><span>Edit Make</span></a></li>
                                                                                <li class="divider"></li>
                                                                                <li><a href="" class="send-to-server-click"  data="makeid:<?=  $make->id ; ?>" url="<?=  url('Makes@delete') ; ?>" warning-title="Are you sure?" warning-message="This make will be deleted permanently." warning-button="Yes, delete!"><em class="icon ni ni-trash"></em><span>Delete Make</span></a></li>
                                                                                <?php } ?>
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
                    <h5 class="modal-title">Add a vehicle make</h5>
                </div>
                <form class="simcy-form" action="<?=  url('Makes@create') ; ?>" data-parsley-validate="" method="POST" loader="true">
                    <div class="modal-body">
                        <p>Add a vehicle make</p>
                        <div class="row gy-4">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Make Name</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control form-control-lg" placeholder="Make Name" name="name" required="">
                                    </div>
                                </div>
                            </div>
                            <?php if (false) { ?>
                            <div class="col-sm-12">
                                <div class="form-group">
                                     <div class="custom-control custom-switch">
                                        <input type="checkbox" name="status" id="status" class="custom-control-input" value="Enabled" checked>
                                        <label class="custom-control-label" for="status">Enable this make</label>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button class="btn btn-white btn-dim btn-outline-light" type="button" data-dismiss="modal"><em class="icon ni ni-cross-circle"></em><span>Cancel</span></button>
                        <button class="btn btn-primary" type="submit"><em class="icon ni ni-check-circle-cut"></em><span>Add Make</span></button>
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
