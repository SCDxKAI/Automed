<?php global $s_v_data, $user, $title, $client, $notes, $projects, $staffmembers, $quotes, $invoices, $payments, $jobcards; ?>
<?= view( 'includes/head', $s_v_data ); ?>
<link rel="stylesheet" href="<?=  asset('assets/libs/summernote/summernote-lite.min.css') ; ?>" />

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
                                    <div class="nk-block-between g-3">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Clients / <strong class="text-primary small"><?=  $client->fullname ; ?></strong></h3>
                                            <div class="nk-block-des text-soft">
                                                <ul class="list-inline">
                                                    <li>Client ID: <span class="text-base">AC<?=  str_pad($client->id, 4, '0', STR_PAD_LEFT) ; ?></span></li>
                                                    <li>Created On: <span class="text-base"><?=  date("F j, Y h:ia", strtotime(timezoned($client->created_at, $user->parent->timezone))) ; ?></span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="nk-block-head-content">
                                            <ul class="nk-block-tools g-3">
                                                <li>                                                   
                                                 <a href="<?=  url('Clients@get') ; ?>" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                                    <a href="<?=  url('Clients@get') ; ?>" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                                                </li>
                                                <li>
                                                    <div class="drodown">
                                                        <a href="#" class="dropdown-toggle btn btn-dim btn-outline-primary" data-toggle="dropdown"><em class="icon ni ni-more-h"></em> <span>More</span></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li><a class="fetch-display-click" data="clientid:<?=  $client->id ; ?>" url="<?=  url('Clients@updateview') ; ?>" holder=".update-holder" modal="#update" href=""><em class="icon ni ni-pen"></em><span>Edit Details</span></a></li>
                                                                <li><a href="" class="send-sms" data-phonenumber="<?=  $client->phonenumber ; ?>" data-name="<?=  $client->fullname ; ?>"><em class="icon ni ni-chat-circle"></em><span>Send SMS</span></a></li>
                                                                <li class="divider"></li>
                                                                <li><a href="" class="fetch-display-click" data="clientid:<?=  $client->id ; ?>" url="<?=  url('Jobcards@createform') ; ?>" holder=".update-holder-lg" modal="#update-lg"><em class="icon ni ni-property-add"></em><span>Create Job Card</span></a></li>
                                                                <li><a class="fetch-display-click" data="clientid:<?=  $client->id ; ?>" url="<?=  url('Quote@createform') ; ?>" holder=".update-holder-xl" modal="#update-xl" href=""><em class="icon ni ni-cards"></em><span>Create Quote</span></a></li>
                                                                <li><a class="fetch-display-click" data="clientid:<?=  $client->id ; ?>" url="<?=  url('Invoice@createform') ; ?>" holder=".update-holder-xl" modal="#update-xl" href=""><em class="icon ni ni-cc"></em><span>Create Invoice</span></a></li>
                                                                <?php if ($user->role == "Owner" || $user->role == "Admin") { ?>
                                                                <li class="divider"></li>
                                                                <li><a href="" class="send-to-server-click"  data="clientid:<?=  $client->id ; ?>" url="<?=  url('Clients@delete') ; ?>" warning-title="Are you sure?" warning-message="This client's profile and data will be deleted permanently." warning-button="Yes, delete!"><em class="icon ni ni-trash"></em><span>Delete Client</span></a></li>
                                                                <?php } ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="card">
                                        <div class="card-aside-wrap">
                                            <div class="card-content">
                                                <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                                                    <li class="nav-item">
                                                        <a class="nav-link
                                                        <?php if (!isset($_GET['view'])) { ?>
                                                         active
                                                         <?php } ?>
                                                         " href="<?=  url('Clients@details', array('clientid' => $client->id)) ; ?>?details"><em class="icon ni ni-file-text"></em><span>Details</span></a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link
                                                        <?php if (isset($_GET['view']) && $_GET['view'] == 'projects') { ?>
                                                         active
                                                         <?php } ?>
                                                        " href="<?=  url('Clients@details', array('clientid' => $client->id)) ; ?>?view=projects"><em class="icon ni ni-todo"></em><span>Projects</span></a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link
                                                        <?php if (isset($_GET['view']) && $_GET['view'] == 'jobcards') { ?>
                                                         active
                                                         <?php } ?>" href="<?=  url('Clients@details', array('clientid' => $client->id)) ; ?>?view=jobcards"><em class="icon ni ni-property-add"></em><span>Job Cards</span></a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link
                                                        <?php if (isset($_GET['view']) && $_GET['view'] == 'invoices') { ?>
                                                         active
                                                         <?php } ?>
                                                         " href="<?=  url('Clients@details', array('clientid' => $client->id)) ; ?>?view=invoices"><em class="icon ni ni-cc"></em><span>Invoices</span></a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link
                                                        <?php if (isset($_GET['view']) && $_GET['view'] == 'quotes') { ?>
                                                         active
                                                         <?php } ?>
                                                        " href="<?=  url('Clients@details', array('clientid' => $client->id)) ; ?>?view=quotes"><em class="icon ni ni-cards"></em><span>Quotes</span></a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link
                                                        <?php if (isset($_GET['view']) && $_GET['view'] == 'payments') { ?>
                                                         active
                                                         <?php } ?>
                                                        " href="<?=  url('Clients@details', array('clientid' => $client->id)) ; ?>?view=payments"><em class="icon ni ni-align-left"></em><span>Payments</span></a>
                                                    </li>
                                                </ul><!-- .nav-tabs -->
                                                <?php if (!isset($_GET["view"])) { ?>
                                                <div class="card-inner">
                                                    <div class="nk-block">
                                                        <div class="nk-block-head">
                                                            <h5 class="title">Client Information</h5>
                                                            <p>Basic client info, that gives client summary.</p>
                                                        </div><!-- .nk-block-head -->
                                                        <div class="profile-ud-list">
                                                            <div class="profile-ud-item">
                                                                <div class="profile-ud wider">
                                                                    <span class="profile-ud-label">Client Name</span>
                                                                    <span class="profile-ud-value"><?=  $client->fullname ; ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="profile-ud-item">
                                                                <div class="profile-ud wider">
                                                                    <span class="profile-ud-label">Phone Number</span>
                                                                    <span class="profile-ud-value"><?=  $client->phonenumber ; ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="profile-ud-item">
                                                                <div class="profile-ud wider">
                                                                    <span class="profile-ud-label">Email</span>
                                                                    <?php if (!empty($client->email)) { ?>
                                                                    <span class="profile-ud-value"><?=  $client->email ; ?></span>
                                                                    <?php } else { ?>
                                                                    <span class="profile-ud-value">--|--</span>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            <div class="profile-ud-item">
                                                                <div class="profile-ud wider">
                                                                    <span class="profile-ud-label">Active Projects</span>
                                                                    <span class="profile-ud-value"><?=  $client->active_projects ; ?> / <?=  $client->total_projects ; ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="profile-ud-item">
                                                                <div class="profile-ud wider">
                                                                    <span class="profile-ud-label">Address</span>
                                                                    <?php if (!empty($client->address)) { ?>
                                                                    <span class="profile-ud-value"><?=  $client->address ; ?></span>
                                                                    <?php } else { ?>
                                                                    <span class="profile-ud-value">--|--</span>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            <div class="profile-ud-item">
                                                                <div class="profile-ud wider">
                                                                    <span class="profile-ud-label">Balance</span>
                                                                    <span class="profile-ud-value"><?=  money($client->balance, $user->parent->currency) ; ?></span>
                                                                </div>
                                                            </div>
                                                        </div><!-- .profile-ud-list -->
                                                    </div><!-- .nk-block -->
                                                    <div class="nk-block">
                                                        <div class="nk-block-head nk-block-head-line">
                                                            <h6 class="title overline-title text-base">Additional Information</h6>
                                                        </div><!-- .nk-block-head -->
                                                        <div class="profile-ud-list">
                                                            <div class="profile-ud-item">
                                                                <div class="profile-ud wider">
                                                                    <span class="profile-ud-label">Invoices</span>
                                                                    <span class="profile-ud-value"><?=  $client->total_invoices ; ?> </span>
                                                                </div>
                                                            </div>
                                                            <div class="profile-ud-item">
                                                                <div class="profile-ud wider">
                                                                    <span class="profile-ud-label">Quotes</span>
                                                                    <span class="profile-ud-value"><?=  $client->total_quotes ; ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="profile-ud-item">
                                                                <div class="profile-ud wider">
                                                                    <span class="profile-ud-label">Payments</span>
                                                                    <span class="profile-ud-value"><?=  money($client->total_paid, $user->parent->currency) ; ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="profile-ud-item">
                                                                <div class="profile-ud wider">
                                                                    <span class="profile-ud-label">Status</span>
                                                                    <span class="profile-ud-value"><span class="badge badge-sm badge-dot has-bg badge-success d-none d-mb-inline-flex">Active</span></span>
                                                                </div>
                                                            </div>
                                                        </div><!-- .profile-ud-list -->
                                                    </div><!-- .nk-block -->
                                                    <div class="nk-divider divider md"></div>
                                                    <div class="nk-block">
                                                        <div class="nk-block-head nk-block-head-sm nk-block-between">
                                                            <h5 class="title">Client Notes
                                                                <?php if (!empty($notes)) { ?> 
                                                                ( <?=  count($notes) ; ?> ) 
                                                                <?php } ?>
                                                            </h5>
                                                            <a href="" class="link link-sm" data-toggle="modal" data-target="#createnote">+ Add Note</a>
                                                        </div><!-- .nk-block-head -->
                                                        <div class="bq-note">
                                                            <?php if (!empty($notes)) { ?> 
                                                            <?php foreach ($notes as $note) { ?>
                                                            <div class="bq-note-item">
                                                                <div class="bq-note-text">
                                                                    <p><?=  $note->note ; ?></p>
                                                                </div>
                                                                <div class="bq-note-meta">
                                                                    <span class="bq-note-added">Added on <span class="date"><?=  date("F j, Y", strtotime(timezoned($note->created_at, $user->parent->timezone))) ; ?></span> at <span class="time"><?=  date("h:ia", strtotime(timezoned($note->created_at, $user->parent->timezone))) ; ?></span></span>
                                                                    <?php if ($user->role == "Owner" || $user->role == "Admin") { ?>
                                                                    <span class="bq-note-sep sep">•</span>
                                                                    <a href="#" class="link link-sm link-danger send-to-server-click"  data="noteid:<?=  $note->id ; ?>" url="<?=  url('Notes@delete') ; ?>" warning-title="Are you sure?" warning-message="This note will be deleted permanently." warning-button="Yes, delete!">Delete Note</a>
                                                                    <?php } ?>
                                                                </div>
                                                            </div><!-- .bq-note-item -->
                                                            <?php } ?>
                                                            <?php } else { ?>
                                                            <div class="empty text-center text-muted">
                                                                <em class="icon ni ni-info"></em>
                                                                <p>No notes added yet!</p>
                                                            </div>
                                                            <?php } ?>
                                                        </div><!-- .bq-note -->
                                                    </div><!-- .nk-block -->
                                                </div><!-- .card-inner -->
                                                <?php } else if (isset($_GET["view"]) && $_GET["view"] == "projects") { ?>
                                                <div class="card-inner">
                                                    <div class="nk-block mb-2">
                                                        <div class="nk-block-head">
                                                            <h5 class="title">Client Projects</h5>
                                                            <p>A list of <?=  $client->fullname ; ?>'s projects.</p>
                                                        </div><!-- .nk-block-head -->
                                                    </div><!-- .nk-block -->

                                                    <table class="datatable-init nk-tb-list nk-tb-ulist mt" data-auto-responsive="false">
                                                        <thead>
                                                            <tr class="nk-tb-item nk-tb-head">
                                                                <th class="nk-tb-col text-center">#</th>
                                                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Client</span></th>
                                                                <th class="nk-tb-col"><span class="sub-text">Project</span></th>
                                                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Profit / Start - Finish</span></th>
                                                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Quoted / Cost</span></th>
                                                                <th class="nk-tb-col tb-col-md text-center">
                                                                    <span class="sub-text" data-toggle="tooltip" title="Tasks In Progress">
                                                                        P. Tasks <em class="icon ni ni-info-fill"></em>
                                                                    </span>
                                                                </th>
                                                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
                                                                <th class="nk-tb-col nk-tb-col-tools text-right">
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php if (!empty($projects)) { ?>
                                                            <?php foreach ($projects as $index => $project) { ?>
                                                            <tr class="nk-tb-item">
                                                                <td class="nk-tb-col text-center"><?=  $index + 1 ; ?></td>
                                                                <td class="nk-tb-col tb-col-md">
                                                                    <div class="user-card">
                                                                        <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                                                                            <span><?=  mb_substr($client->fullname, 0, 2, "UTF-8") ; ?></span>
                                                                        </div>
                                                                        <div class="user-info">
                                                                            <span class="tb-lead"><?=  $client->fullname ; ?> <span class="dot dot-success d-md-none ml-1"></span></span>
                                                                            <span><?=  $client->phonenumber ; ?></span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="nk-tb-col">
                                                                    <span class="tb-amount"><?=  carmake($project->make) ; ?> <?=  carmodel($project->model) ; ?>
                                                                        <?php if (!empty($project->insurance)) { ?>
                                                                        <span class="text-success" data-toggle="tooltip" title="Covered by Insurance"><em class="icon ni ni-shield-check-fill"></em></span>
                                                                        <?php } ?>
                                                                    </span>
                                                                    <span><?=  $project->registration_number ; ?></span>
                                                                </td>
                                                                <td class="nk-tb-col tb-col-md">
                                                                    <span class="tb-amount"><?=  money(($project->invoiced - $project->cost), $user->parent->currency) ; ?></span>
                                                                    <span><?=  date("M d, y", strtotime($project->start_date)) ; ?> - <?=  date("M d, y", strtotime($project->end_date)) ; ?></span>
                                                                </td>
                                                                <td class="nk-tb-col tb-col-md">
                                                                    <span><?=  money($project->invoiced, $user->parent->currency) ; ?></span><br>
                                                                    <span><?=  money(($project->cost), $user->parent->currency) ; ?></span>
                                                                </td>
                                                                <td class="nk-tb-col tb-col-md text-center">
                                                                    <span><?=  $project->pending_tasks ; ?> / <?=  $project->total_tasks ; ?></span>
                                                                </td>
                                                                <td class="nk-tb-col tb-col-md">
                                                                    <?php if ($project->status == "Completed") { ?>
                                                                    <span class="badge badge-sm badge-dot has-bg badge-success d-none d-mb-inline-flex">Completed</span>
                                                                    <?php } else if ($project->status == "Cancelled") { ?>
                                                                    <span class="badge badge-sm badge-dot has-bg badge-secondary d-none d-mb-inline-flex">Cancelled</span>
                                                                    <?php } else { ?>
                                                                    <span class="badge badge-sm badge-dot has-bg badge-warning d-none d-mb-inline-flex">In Progress</span>
                                                                    <?php } ?>
                                                                </td>
                                                                <td class="nk-tb-col nk-tb-col-tools">
                                                                    <ul class="nk-tb-actions gx-1">
                                                                        <li>
                                                                            <div class="drodown">
                                                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                                    <ul class="link-list-opt no-bdr">
                                                                                    <li><a href="<?=  url('Projects@details', array('projectid' => $project->id)) ; ?>"><em class="icon ni ni-eye"></em><span>View Details</span></a></li>
                                                                                    <li><a class="fetch-display-click" data="projectid:<?=  $project->id ; ?>" url="<?=  url('Projects@updateview') ; ?>" holder=".update-project-holder" modal="#update-project" href=""><em class="icon ni ni-pen"></em><span>Edit Details</span></a></li>
                                                                                    <li><a href=""  class="create-jobcard" data-id="<?=  $project->id ; ?>"><em class="icon ni ni-property-add"></em><span>Create Job Card</span></a></li>
                                                                                    <li class="divider"></li>
                                                                                    <li><a href="" class="create-quote" data-type="project" data-id="<?=  $project->id ; ?>"><em class="icon ni ni-cards"></em><span>Create Quote</span></a></li>
                                                                                    <li><a href="" class="create-invoice" data-type="project" data-id="<?=  $project->id ; ?>"><em class="icon ni ni-cc"></em><span>Create Invoice</span></a></li>
                                                                                    <?php if ($project->status == "In Progress") { ?>
                                                                                    <li><a href="" class="send-to-server-click"  data="projectid:<?=  $project->id ; ?>" url="<?=  url('Projects@cancel') ; ?>" warning-title="Are you sure?" warning-message="This project will be marked as cancelled." warning-button="Yes, Cancel!"><em class="icon ni ni-na"></em><span>Cancel Project</span></a></li>
                                                                                    <?php } ?>
                                                                                    <?php if ($user->role == "Owner" || $user->role == "Admin") { ?>
                                                                                    <li><a class="send-to-server-click"  data="projectid:<?=  $project->id ; ?>" url="<?=  url('Projects@delete') ; ?>" warning-title="Are you sure?" warning-message="This project will be deleted permanently." warning-button="Yes, delete!" href=""><em class="icon ni ni-trash"></em><span>Delete Project</span></a></li>
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
                                                </div><!-- .card-inner -->
                                                <?php } else if (isset($_GET["view"]) && $_GET["view"] == "jobcards") { ?>
                                                <div class="card-inner">
                                                    <div class="nk-block mb-2">
                                                        <div class="nk-block-head">
                                                            <a href="" class="btn btn-primary pull-right fetch-display-click" data="clientid:<?=  $client->id ; ?>" url="<?=  url('Jobcards@createform') ; ?>" holder=".update-holder-lg" modal="#update-lg"><em class="icon ni ni-plus"></em><span>Create Job Card</span></a>
                                                            <h5 class="title">Project Job Cards</h5>
                                                            <p>A list of job cards for <?=  $client->fullname ; ?> projects.</p>
                                                        </div><!-- .nk-block-head -->
                                                    </div><!-- .nk-block -->
                                                    
                                                    
                                                        <div class="bq-note">
                                                            <?php if (!empty($jobcards)) { ?> 
                                                            <?php foreach ($jobcards as $jobcard) { ?>
                                                            <div class="bq-note-item">
                                                                <div class="bq-note-text">

                                                                    <?php if ($jobcard->approved == "Yes") { ?>
                                                                    <span class="badge badge-sm badge-dot has-bg badge-success float-right">Approved</span>
                                                                    <?php } else { ?>
                                                                    <span class="badge badge-sm badge-dot has-bg badge-warning float-right">Assessment</span>
                                                                    <?php } ?>
                                                                    <h6 class="title">Body Report</h6>
                                                                    <p><?=  html_entity_decode($jobcard->body_report) ; ?></p>
                                                                    <div class="nk-divider divider md"></div>
                                                                    <h6 class="title">Mechanical Report</h6>
                                                                    <p><?=  html_entity_decode($jobcard->mechanical_report) ; ?></p>
                                                                    <div class="nk-divider divider md"></div>
                                                                    <h6 class="title">Electrical Report</h6>
                                                                    <p><?=  html_entity_decode($jobcard->electrical_report) ; ?></p>
                                                                </div>
                                                                <div class="bq-note-meta">
                                                                    <span class="bq-note-added">Job Card <span class="fw-bold">#<?=  $jobcard->id ; ?></span> Created on <span class="date"><?=  date("F j, Y", strtotime(timezoned($jobcard->created_at, $user->parent->timezone))) ; ?></span> at <span class="time"><?=  date("h:ia", strtotime(timezoned($jobcard->created_at, $user->parent->timezone))) ; ?></span></span>
                                                                    <span class="bq-note-sep sep">•</span>
                                                                    <a href="" class="link link-sm link-primary fetch-display-click" data="jobcardid:<?=  $jobcard->id ; ?>|action:approved" url="<?=  url('Jobcards@updateview') ; ?>" holder=".update-holder-lg" modal="#update-lg">Edit Job Card</a>
                                                                    <?php if ($jobcard->approved == "No") { ?>
                                                                    <span class="bq-note-sep sep">•</span>
                                                                    <a href="" class="link link-sm link-primary fetch-display-click" data="jobcardid:<?=  $jobcard->id ; ?>|action:approved" url="<?=  url('Jobcards@updateview') ; ?>" holder=".update-holder-lg" modal="#update-lg">Create Approved Version</a>         
                                                                    <?php } ?>                                                           
                                                                    <span class="bq-note-sep sep">•</span>
                                                                    <a href="<?=  url('Jobcards@view', array('jobcardid' => $jobcard->id)) ; ?>" class="link link-sm link-primary">View Job Card</a>
                                                                    <span class="bq-note-sep sep">•</span>
                                                                    <a href="<?=  url('Jobcards@render', array('jobcardid' => $jobcard->id)) ; ?>" class="link link-sm link-primary" download="Job card #<?=  $jobcard->id ; ?>">Download Job Card</a>
                                                                    <?php if ($user->role == "Owner" || $user->role == "Admin") { ?>
                                                                    <span class="bq-note-sep sep">•</span>
                                                                    <a href="" class="link link-sm link-danger send-to-server-click" data="jobcardid:<?=  $jobcard->id ; ?>" url="<?=  url('Jobcards@delete') ; ?>" warning-title="Are you sure?" warning-message="This job card will be deleted permanently." warning-button="Yes, delete!">Delete</a>
                                                                    <?php } ?>
                                                                </div>
                                                            </div><!-- .bq-note-item -->
                                                            <div class="nk-divider divider md"></div>
                                                            <?php } ?>
                                                            <?php } else { ?>
                                                            <div class="empty text-center text-muted">
                                                                <em class="icon ni ni-info"></em>
                                                                <p>No job card created yet!</p>
                                                            </div>
                                                            <?php } ?>
                                                        </div><!-- .bq-note -->

                                                </div><!-- .card-inner -->
                                                <?php } else if (isset($_GET["view"]) && $_GET["view"] == "invoices") { ?>
                                                <div class="card-inner">
                                                    <div class="nk-block mb-2">
                                                        <div class="nk-block-head">
                                                            <a class="btn btn-primary pull-right fetch-display-click" data="clientid:<?=  $client->id ; ?>" url="<?=  url('Invoice@createform') ; ?>" holder=".update-holder-xl" modal="#update-xl" href=""><em class="icon ni ni-plus"></em><span>Create Invoice</span></a>
                                                            <h5 class="title">Client Invoices</h5>
                                                            <p>A list of invoices for <?=  $client->fullname ; ?>.</p>
                                                        </div><!-- .nk-block-head -->
                                                    </div><!-- .nk-block -->

                                                    <table class="datatable-init nk-tb-list nk-tb-ulist mt" data-auto-responsive="false">
                                                        <thead>
                                                            <tr class="nk-tb-item nk-tb-head">
                                                                <th class="nk-tb-col text-center">#</th>
                                                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Project</span></th>
                                                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Items</span></th>
                                                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Date / Due</span></th>
                                                                <th class="nk-tb-col"><span class="sub-text">Total / Balance</span></th>
                                                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
                                                                <th class="nk-tb-col nk-tb-col-tools text-right">
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php if (!empty($invoices)) { ?>
                                                            <?php foreach ($invoices as $index => $invoice) { ?>
                                                            <tr class="nk-tb-item">
                                                                <td class="nk-tb-col text-center"><?=  $index + 1 ; ?></td>
                                                                <td class="nk-tb-col tb-col-md">
                                                                    <div class="user-card">
                                                                        <div class="user-info">
                                                                            <span class="tb-lead"><?=  carmake($invoice->project->make) ; ?> <?=  carmodel($invoice->project->model) ; ?></span>
                                                                            <span><?=  $invoice->project->registration_number ; ?></span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="nk-tb-col tb-col-md">
                                                                    <span class="tb-amount"><?=  $invoice->items ; ?></span>
                                                                </td>
                                                                <td class="nk-tb-col tb-col-md">
                                                                    <span><?=  date("M j, Y", strtotime($invoice->invoice_date)) ; ?></span><br>
                                                                    <?php if ($invoice->due_date < date("Y-m-d") && $invoice->status != "Paid") { ?>
                                                                    <span class="text-danger">
                                                                        <?=  date("M j, Y", strtotime($invoice->due_date)) ; ?> 
                                                                        <span data-toggle="tooltip" title="Overdue"><em class="icon ni ni-info-fill"></em></span>
                                                                    </span>
                                                                    <?php } else { ?>
                                                                    <span><?=  date("M j, Y", strtotime($invoice->due_date)) ; ?></span>
                                                                    <?php } ?>
                                                                </td>
                                                                <td class="nk-tb-col">
                                                                    <span class="tb-amount"><?=  money($invoice->total, $user->parent->currency) ; ?></span>
                                                                    <span><?=  money($invoice->balance, $user->parent->currency) ; ?></span>
                                                                </td>
                                                                <td class="nk-tb-col">
                                                                    <?php if ($invoice->status == "Paid") { ?>
                                                                    <span class="badge badge-sm badge-dot has-bg badge-success d-none d-mb-inline-flex">Paid</span>
                                                                    <?php } else if ($invoice->status == "Partial") { ?>
                                                                    <span class="badge badge-sm badge-dot has-bg badge-warning d-none d-mb-inline-flex">Partial</span>
                                                                    <?php } else { ?>
                                                                    <span class="badge badge-sm badge-dot has-bg badge-danger d-none d-mb-inline-flex">Unpaid</span>
                                                                    <?php } ?>
                                                                </td>
                                                                <td class="nk-tb-col nk-tb-col-tools">
                                                                    <ul class="nk-tb-actions gx-1">
                                                                        <li>
                                                                            <div class="drodown">
                                                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                                    <ul class="link-list-opt no-bdr">
                                                                                    <li><a href="<?=  url('Invoice@view', array('invoiceid' => $invoice->id)) ; ?>"><em class="icon ni ni-eye"></em><span>View Invoice</span></a></li>
                                                                                    <li><a href="<?=  url('Invoice@render', array('invoiceid' => $invoice->id)) ; ?>" download="Invoice #<?=  $invoice->id ; ?>.pdf"><em class="icon ni ni-download-cloud"></em><span>Download</span></a></li>
                                                                                    <li><a href="" class="send-via-email" data-url="<?=  url('Invoice@send') ; ?>" data-id="<?=  $invoice->id ; ?>" data-subject="Invoice #<?=  $invoice->id ; ?>"><em class="icon ni ni-mail"></em><span>Send Via Email</span></a></li>
                                                                                    <?php if ($invoice->status != "Paid") { ?>
                                                                                    <li><a href="" class="add-payment" data-id="<?=  $invoice->id ; ?>"><em class="icon ni ni-coin-alt"></em><span>Add Payment</span></a></li>
                                                                                    <?php } ?>
                                                                                    <li><a class="fetch-display-click" data="invoiceid:<?=  $invoice->id ; ?>" url="<?=  url('Invoice@updateview') ; ?>" holder=".update-holder-xl" modal="#update-xl" href=""><em class="icon ni ni-pen"></em><span>Edit Invoice</span></a></li>
                                                                                    <?php if ($user->role == "Owner" || $user->role == "Admin") { ?>
                                                                                    <li class="divider"></li>
                                                                                    <li><a class="send-to-server-click"  data="invoiceid:<?=  $invoice->id ; ?>" url="<?=  url('Invoice@delete') ; ?>" warning-title="Are you sure?" warning-message="This invoice will be deleted permanently." warning-button="Yes, delete!" href=""><em class="icon ni ni-trash"></em><span>Delete Invoice</span></a></li>
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
                                                                <td class="text-center" colspan="6">It's empty here!</td>
                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div><!-- .card-inner -->
                                                <?php } else if (isset($_GET["view"]) && $_GET["view"] == "quotes") { ?>
                                                <div class="card-inner">
                                                    <div class="nk-block mb-2">
                                                        <div class="nk-block-head">
                                                            <a class="btn btn-primary pull-right fetch-display-click" data="clientid:<?=  $client->id ; ?>" url="<?=  url('Quote@createform') ; ?>" holder=".update-holder-xl" modal="#update-xl" href=""><em class="icon ni ni-plus"></em><span>Create Quote</span></a>
                                                            <h5 class="title">Client Quotes</h5>
                                                            <p>A list of quotes for <?=  $client->fullname ; ?>.</p>
                                                        </div><!-- .nk-block-head -->
                                                    </div><!-- .nk-block -->

                                                    <table class="datatable-init nk-tb-list nk-tb-ulist mt" data-auto-responsive="false">
                                                        <thead>
                                                            <tr class="nk-tb-item nk-tb-head">
                                                                <th class="nk-tb-col text-center">#</th>
                                                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Project</span></th>
                                                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Registration</span></th>
                                                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Items</span></th>
                                                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Date</span></th>
                                                                <th class="nk-tb-col"><span class="sub-text">Total</span></th>
                                                                <th class="nk-tb-col nk-tb-col-tools text-right">
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php if (!empty($quotes)) { ?>
                                                            <?php foreach ($quotes as $index => $quote) { ?>
                                                            <tr class="nk-tb-item">
                                                                <td class="nk-tb-col text-center"><?=  $index + 1 ; ?></td>
                                                                <td class="nk-tb-col tb-col-md">
                                                                    <div class="user-card">
                                                                        <div class="user-info">
                                                                            <span class="tb-lead"><?=  carmake($quote->project->make) ; ?> <?=  carmodel($quote->project->model) ; ?></span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="nk-tb-col tb-col-md">
                                                                    <span class="tb-amount"><?=  $quote->project->registration_number ; ?></span>
                                                                </td>
                                                                <td class="nk-tb-col tb-col-md">
                                                                    <span class="tb-amount"><?=  $quote->items ; ?></span>
                                                                </td>
                                                                <td class="nk-tb-col tb-col-md">
                                                                    <span><?=  date("F j, Y", strtotime($quote->created_at)) ; ?></span>
                                                                </td>
                                                                <td class="nk-tb-col">
                                                                    <span class="tb-amount"><?=  money($quote->total, $user->parent->currency) ; ?></span>
                                                                </td>
                                                                <td class="nk-tb-col nk-tb-col-tools">
                                                                    <ul class="nk-tb-actions gx-1">
                                                                        <li>
                                                                            <div class="drodown">
                                                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                                    <ul class="link-list-opt no-bdr">
                                                                                    <li><a href="<?=  url('Quote@view', array('quoteid' => $quote->id)) ; ?>"><em class="icon ni ni-eye"></em><span>View Quote</span></a></li>
                                                                                    <li><a href="<?=  url('Quote@render', array('quoteid' => $quote->id)) ; ?>" download="Quote #<?=  $quote->id ; ?>.pdf"><em class="icon ni ni-download-cloud"></em><span>Download</span></a></li>
                                                                                    <li><a href="" class="send-via-email" data-url="<?=  url('Quote@send') ; ?>" data-id="<?=  $quote->id ; ?>" data-subject="Quote #<?=  $quote->id ; ?>"><em class="icon ni ni-mail"></em><span>Send Via Email</span></a></li>
                                                                                    <li><a class="fetch-display-click" data="quoteid:<?=  $quote->id ; ?>" url="<?=  url('Quote@updateview') ; ?>" holder=".update-holder-xl" modal="#update-xl" href=""><em class="icon ni ni-pen"></em><span>Edit Quote</span></a></li>
                                                                                    <li><a class="convert-quote" data-id="<?=  $quote->id ; ?>" href=""><em class="icon ni ni-cc"></em><span>Convert to Invoice</span></a></li>
                                                                                    <?php if ($user->role == "Owner" || $user->role == "Admin") { ?>
                                                                                    <li class="divider"></li>
                                                                                    <li><a class="send-to-server-click"  data="quoteid:<?=  $quote->id ; ?>" url="<?=  url('Quote@delete') ; ?>" warning-title="Are you sure?" warning-message="This quote will be deleted permanently." warning-button="Yes, delete!" href=""><em class="icon ni ni-trash"></em><span>Delete Quote</span></a></li>
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
                                                                <td class="text-center" colspan="7">It's empty here!</td>
                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div><!-- .card-inner -->
                                                <?php } else if (isset($_GET["view"]) && $_GET["view"] == "payments") { ?>
                                                <div class="card-inner">
                                                    <div class="nk-block mb-2">
                                                        <div class="nk-block-head">
                                                            <a href="" class="btn btn-primary pull-right" data-toggle="modal" data-target="#addpayment"><em class="icon ni ni-plus"></em><span>Add Payment</span></a>
                                                            <h5 class="title">Client Payments</h5>
                                                            <p>A list of payments by <?=  $client->fullname ; ?>.</p>
                                                        </div><!-- .nk-block-head -->
                                                    </div><!-- .nk-block -->

                                                    <table class="datatable-init nk-tb-list nk-tb-ulist mt" data-auto-responsive="false">
                                                        <thead>
                                                            <tr class="nk-tb-item nk-tb-head">
                                                                <th class="nk-tb-col text-center">#</th>
                                                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Project</span></th>
                                                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Invoice</span></th>
                                                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Payment Date</span></th>
                                                                <th class="nk-tb-col"><span class="sub-text">Amount</span></th>
                                                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
                                                                <th class="nk-tb-col nk-tb-col-tools text-right">
                                                                </th>
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
                                                                            <span class="tb-lead"><?=  carmake($payment->project->make) ; ?> <?=  carmodel($payment->project->model) ; ?></span>
                                                                            <span><?=  $payment->project->registration_number ; ?></span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="nk-tb-col tb-col-md">
                                                                    <span class="tb-amount">Invoice #<?=  $payment->invoice ; ?></span>
                                                                </td>
                                                                <td class="nk-tb-col tb-col-md">
                                                                    <span><?=  date("F j, Y", strtotime($payment->payment_date)) ; ?></span>
                                                                </td>
                                                                <td class="nk-tb-col">
                                                                    <span class="tb-amount"><?=  money($payment->amount, $user->parent->currency) ; ?></span>
                                                                    <span><?=  $payment->method ; ?></span>
                                                                </td>
                                                                <td class="nk-tb-col tb-col-md">
                                                                    <span class="badge badge-sm badge-dot has-bg badge-success d-none d-mb-inline-flex">Paid</span>
                                                                </td>
                                                                <td class="nk-tb-col nk-tb-col-tools">
                                                                    <ul class="nk-tb-actions gx-1">
                                                                        <li>
                                                                            <div class="drodown">
                                                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                                    <ul class="link-list-opt no-bdr">
                                                                                    <li><a href="<?=  url('Invoice@view', array('invoiceid' => $payment->invoice)) ; ?>"><em class="icon ni ni-eye"></em><span>View Invoice</span></a></li>
                                                                                    <li><a class="fetch-display-click" data="paymentid:<?=  $payment->id ; ?>" url="<?=  url('Projectpayment@updateview') ; ?>" holder=".update-holder" modal="#update" href=""><em class="icon ni ni-pen"></em><span>Edit Payment</span></a></li>
                                                                                    <?php if ($user->role == "Owner" || $user->role == "Admin") { ?>
                                                                                    <li class="divider"></li>
                                                                                    <li><a class="send-to-server-click"  data="paymentid:<?=  $payment->id ; ?>" url="<?=  url('Projectpayment@delete') ; ?>" warning-title="Are you sure?" warning-message="This payment will be deleted permanently." warning-button="Yes, delete!" href=""><em class="icon ni ni-trash"></em><span>Delete Payment</span></a></li>
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
                                                                <td class="text-center" colspan="7">It's empty here!</td>
                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div><!-- .card-inner -->
                                                <?php } ?>
                                            </div><!-- .card-content -->
                                        </div><!-- .card-aside-wrap -->
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

    <!-- Create Note Modal -->
    <div class="modal fade" tabindex="-1" id="createnote">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <div class="modal-header">
                    <h5 class="modal-title">Add a Note</h5>
                </div>
                <form class="simcy-form" action="<?=  url('Notes@create') ; ?>" data-parsley-validate="" method="POST" loader="true">
                    <div class="modal-body">
                        <p>Add a note on this client's account</p>
                        <div class="row gy-4">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Write your note</label>
                                    <div class="form-control-wrap">
                                        <textarea class="form-control form-control-lg" placeholder="Write your note" name="note" rows="5" required=""></textarea>
                                        <input type="hidden" name="item" value="<?=  $client->id ; ?>" required="">
                                        <input type="hidden" name="type" value="Client" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button class="btn btn-white btn-dim btn-outline-light" type="button" data-dismiss="modal"><em class="icon ni ni-cross-circle"></em><span>Cancel</span></button>
                        <button class="btn btn-primary" type="submit"><em class="icon ni ni-check-circle-cut"></em><span>Save Note</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Update Modal -->
    <div class="modal fade" tabindex="-1" id="update">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <div class="modal-header">
                    <h5 class="modal-title">Update Info</h5>
                </div>
                <div class="update-holder"></div>
            </div>
        </div>
    </div>

    <!-- Modal create quote -->
    <div class="modal fade" tabindex="-1" id="createquote">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <div class="modal-header">
                    <h5 class="modal-title">Create Quote</h5>
                </div>
                <form class="simcy-form" action="<?=  url('Quote@create') ; ?>" data-parsley-validate="" method="POST" loader="true">
                    <div class="modal-body">
                        <p>Create a quote for this project</p>
                        <div class="item-lines" data-type="quote">
                            <div class="row gy-4">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="form-label">Item Description</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-lg" placeholder="Item Description" name="item[]" required="">
                                            <input type="hidden" name="project" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-group">
                                        <label class="form-label">Qty</label>
                                        <div class="form-control-wrap hide-arrows">
                                            <input type="number" class="form-control form-control-lg line-quantity" value="1" min="1" placeholder="Quantity" name="quantity[]" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="form-label">Unit Cost ( <?=  currency($user->parent->currency) ; ?> )</label>
                                        <div class="form-control-wrap hide-arrows">
                                            <input type="number" class="form-control form-control-lg line-cost" placeholder="Unit Cost" data-parsley-pattern="[0-9]*(\.?[0-9]{2}$)" name="cost[]" value="0.00" step="0.01" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="form-label">Tax (%)</label>
                                        <div class="form-control-wrap hide-arrows">
                                            <input type="number" class="form-control form-control-lg line-tax"  placeholder="Tax (%)" min="0" name="tax[]">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="form-label">Total ( <?=  currency($user->parent->currency) ; ?> )</label>
                                        <div class="form-control-wrap">
                                            <input type="number" class="form-control form-control-lg line-total" placeholder="Amount" data-parsley-pattern="[0-9]*(\.?[0-9]{2}$)" name="total[]" value="0.00" step="0.01" required="" readonly="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                </div>
                            </div>
                            <div class="row gy-4">

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="form-label">Item Description</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-lg" placeholder="Item Description" name="item[]" required="">
                                            <input type="hidden" name="project" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-group">
                                        <label class="form-label">Qty</label>
                                        <div class="form-control-wrap hide-arrows">
                                            <input type="number" class="form-control form-control-lg line-quantity" value="1" min="1" placeholder="Quantity" name="quantity[]" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="form-label">Unit Cost ( <?=  currency($user->parent->currency) ; ?> )</label>
                                        <div class="form-control-wrap hide-arrows">
                                            <input type="number" class="form-control form-control-lg line-cost" placeholder="Unit Cost" data-parsley-pattern="[0-9]*(\.?[0-9]{2}$)" name="cost[]" value="0.00" step="0.01" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="form-label">Tax (%)</label>
                                        <div class="form-control-wrap hide-arrows">
                                            <input type="number" class="form-control form-control-lg line-tax"  placeholder="Tax (%)" min="0" name="tax[]">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="form-label">Total ( <?=  currency($user->parent->currency) ; ?> )</label>
                                        <div class="form-control-wrap">
                                            <input type="number" class="form-control form-control-lg line-total" placeholder="Total" data-parsley-pattern="[0-9]*(\.?[0-9]{2}$)" name="total[]" value="0.00" step="0.01" required="" readonly="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <a href="#" class="btn btn-icon btn-lg btn-round btn-dim btn-outline-danger mt-gs remove-line" data-toggle="tooltip" title="Remove Item"><em class="icon ni ni-cross-circle-fill"></em></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item-totals border-top mt-2 pt-2">
                            <div class="row gy-4 d-flex justify-content-end">
                                <div class="col-sm-4">
                                    <a href="" class="btn btn-dim btn-outline-primary mt-2 add-item" data-type="invoice"><em class="icon ni ni-plus"></em><span>Add Item</span> </a>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="form-label">VAT Tax (%)</label>
                                        <div class="form-control-wrap hide-arrows">
                                            <input type="number" class="form-control form-control-lg total-vat"  placeholder="Tax (%)" value="<?=  $user->parent->vat ; ?>" data-parsley-pattern="^[0-9]\d*(\.\d+)?$" step="0.01" min="0" name="vat">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 text-right">
                                    <div class="fw-normal">Sub Total:<div class="fw-bold sub-total"><?=  currency($user->parent->currency) ; ?> 0.00</div></div>
                                    <div class="fw-normal">VAT Tax:<div class="fw-bold tax-total"><?=  currency($user->parent->currency) ; ?> 0.00</div></div>
                                    <div class="fw-bold fs-19px border-top">Total:<div class="fw-bold grand-total"><?=  currency($user->parent->currency) ; ?> 0.00</div></div>
                                </div>
                                <div class="col-sm-1">
                                </div>
                            </div>
                        </div>
                        <div class="border-top mt-2">
                            <div class="row gy-4">
                                <div class="col-12">
                                    <div class="form-group mt-1">
                                        <label class="form-label">Notes</label>
                                        <div class="form-control-wrap">
                                            <textarea class="form-control form-control-lg unset-mh" placeholder="Notes" rows="2" name="notes"></textarea>
                                        </div>
                                        <div class="form-note">Notes will be printed on the quote.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button class="btn btn-white btn-dim btn-outline-light" type="button" data-dismiss="modal"><em class="icon ni ni-cross-circle"></em><span>Cancel</span></button>
                        <button class="btn btn-primary" type="submit"><em class="icon ni ni-check-circle-cut"></em><span>Create Quote</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal create invoice -->
    <div class="modal fade" tabindex="-1" id="createinvoice">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <div class="modal-header">
                    <h5 class="modal-title">Create Invoice</h5>
                </div>
                <form class="simcy-form" action="<?=  url('Invoice@create') ; ?>" data-parsley-validate="" method="POST" loader="true">
                    <div class="modal-body">
                        <p>Create an invoice for this project</p>
                        <div class="item-lines" data-type="quote">
                            <div class="row gy-4">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="form-label">Item Description</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-lg" placeholder="Item Description" name="item[]" required="">
                                            <input type="hidden" name="project" value="<?=  $project->id ; ?>" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-group">
                                        <label class="form-label">Qty</label>
                                        <div class="form-control-wrap hide-arrows">
                                            <input type="number" class="form-control form-control-lg line-quantity" value="1" min="1" placeholder="Quantity" name="quantity[]" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="form-label">Unit Cost ( <?=  currency($user->parent->currency) ; ?> )</label>
                                        <div class="form-control-wrap hide-arrows">
                                            <input type="number" class="form-control form-control-lg line-cost" placeholder="Unit Cost" data-parsley-pattern="[0-9]*(\.?[0-9]{2}$)" name="cost[]" value="0.00" step="0.01" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="form-label">Tax (%)</label>
                                        <div class="form-control-wrap hide-arrows">
                                            <input type="number" class="form-control form-control-lg line-tax"  placeholder="Tax (%)" min="0" name="tax[]">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="form-label">Total ( <?=  currency($user->parent->currency) ; ?> )</label>
                                        <div class="form-control-wrap">
                                            <input type="number" class="form-control form-control-lg line-total" placeholder="Amount" data-parsley-pattern="[0-9]*(\.?[0-9]{2}$)" name="total[]" value="0.00" step="0.01" required="" readonly="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                </div>
                            </div>
                            <div class="row gy-4">

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="form-label">Item Description</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-lg" placeholder="Item Description" name="item[]" required="">
                                            <input type="hidden" name="project" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-group">
                                        <label class="form-label">Qty</label>
                                        <div class="form-control-wrap hide-arrows">
                                            <input type="number" class="form-control form-control-lg line-quantity" value="1" min="1" placeholder="Quantity" name="quantity[]" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="form-label">Unit Cost ( <?=  currency($user->parent->currency) ; ?> )</label>
                                        <div class="form-control-wrap hide-arrows">
                                            <input type="number" class="form-control form-control-lg line-cost" placeholder="Unit Cost" data-parsley-pattern="[0-9]*(\.?[0-9]{2}$)" name="cost[]" value="0.00" step="0.01" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="form-label">Tax (%)</label>
                                        <div class="form-control-wrap hide-arrows">
                                            <input type="number" class="form-control form-control-lg line-tax"  placeholder="Tax (%)" min="0" name="tax[]">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="form-label">Total ( <?=  currency($user->parent->currency) ; ?> )</label>
                                        <div class="form-control-wrap">
                                            <input type="number" class="form-control form-control-lg line-total" placeholder="Total" data-parsley-pattern="[0-9]*(\.?[0-9]{2}$)" name="total[]" value="0.00" step="0.01" required="" readonly="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <a href="#" class="btn btn-icon btn-lg btn-round btn-dim btn-outline-danger mt-gs remove-line" data-toggle="tooltip" title="Remove Item"><em class="icon ni ni-cross-circle-fill"></em></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item-totals border-top mt-2 pt-2">
                            <div class="row gy-4 d-flex justify-content-end">
                                <div class="col-sm-4">
                                    <a href="" class="btn btn-dim btn-outline-primary mt-2 add-item" data-type="invoice"><em class="icon ni ni-plus"></em><span>Add Item</span> </a>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="form-label">VAT Tax (%)</label>
                                        <div class="form-control-wrap hide-arrows">
                                            <input type="number" class="form-control form-control-lg total-vat"  placeholder="Tax (%)" value="<?=  $user->parent->vat ; ?>" data-parsley-pattern="^[0-9]\d*(\.\d+)?$" step="0.01" min="0" name="vat">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 text-right">
                                    <div class="fw-normal">Sub Total:<div class="fw-bold sub-total"><?=  currency($user->parent->currency) ; ?> 0.00</div></div>
                                    <div class="fw-normal">VAT Tax:<div class="fw-bold tax-total"><?=  currency($user->parent->currency) ; ?> 0.00</div></div>
                                    <div class="fw-bold fs-19px border-top">Total:<div class="fw-bold grand-total"><?=  currency($user->parent->currency) ; ?> 0.00</div></div>
                                </div>
                                <div class="col-sm-1">
                                </div>
                            </div>
                        </div>
                        <div class="mt-2">
                            <div class="row gy-4 border-top mt-1">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Invoice Date</label>
                                        <div class="form-control-wrap">
                                            <input type="date" class="form-control form-control-lg" placeholder="Invoice Date" value="<?=  date('Y-m-d') ; ?>" name="invoice_date" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Payment Due</label>
                                        <div class="form-control-wrap">
                                            <input type="date" class="form-control form-control-lg" placeholder="Payment Due" value="<?=  date('Y-m-d') ; ?>" name="due_date" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Notes</label>
                                        <div class="form-control-wrap">
                                            <textarea class="form-control form-control-lg unset-mh" placeholder="Notes" rows="2" name="notes"></textarea>
                                        </div>
                                        <div class="form-note">Notes will be printed on the invoice.</div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Payment Details</label>
                                        <div class="form-control-wrap">
                                            <textarea class="form-control form-control-lg unset-mh" placeholder="Payment Details" rows="2" name="payment_details"><?=  $user->parent->payment_details ; ?></textarea>
                                        </div>
                                        <div class="form-note">Payment details will be printed on the invoice.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button class="btn btn-white btn-dim btn-outline-light" type="button" data-dismiss="modal"><em class="icon ni ni-cross-circle"></em><span>Cancel</span></button>
                        <button class="btn btn-primary" type="submit"><em class="icon ni ni-check-circle-cut"></em><span>Create Invoice</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    

    <!-- Modal create job card -->
    <div class="modal fade" tabindex="-1" id="createjobcard">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <div class="modal-header">
                    <h5 class="modal-title">Create Job Card</h5>
                </div>
                <form class="jobcard-form" action="<?=  url('Jobcards@create') ; ?>" data-parsley-validate="" method="POST" loader="true">
                    <div class="modal-body">
                        <p>Create a project job card.</p>
                        <div class="row gy-4">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Body Report</label>
                                    <input type="hidden" name="project" required="">
                                    <input type="hidden" name="jobcardid">
                                    <div class="asilify-stack">
                                        <div class="stacked-inputs">
                                            <div class="form-control-wrap stacked">
                                                <input type="text" class="form-control form-control-lg" placeholder="Body Report" name="body_report[]">
                                            </div>
                                            <div class="form-control-wrap stacked">
                                                <a href="" class="btn btn-round btn-sm btn-icon btn-dim btn-danger remove-stack"><em class="icon ni ni-trash"></em></a>
                                                <input type="text" class="form-control form-control-lg" placeholder="Body Report" name="body_report[]">
                                            </div>
                                            <div class="form-control-wrap stacked">
                                                <a href="" class="btn btn-round btn-sm btn-icon btn-dim btn-danger remove-stack"><em class="icon ni ni-trash"></em></a>
                                                <input type="text" class="form-control form-control-lg" placeholder="Body Report" name="body_report[]">
                                            </div>
                                        </div>
                                        <div class="">
                                            <a href="" class="btn btn-dim btn-primary add-stack" data-name="body_report[]" data-placeholder="Body Report"><em class="icon ni ni-plus"></em><span>Add Item</span> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Mechanical Report</label>
                                    <div class="asilify-stack">
                                        <div class="stacked-inputs">
                                            <div class="form-control-wrap stacked">
                                                <input type="text" class="form-control form-control-lg" placeholder="Mechanical Report" name="mechanical_report[]">
                                            </div>
                                            <div class="form-control-wrap stacked">
                                                <a href="" class="btn btn-round btn-sm btn-icon btn-dim btn-danger remove-stack"><em class="icon ni ni-trash"></em></a>
                                                <input type="text" class="form-control form-control-lg" placeholder="Mechanical Report" name="mechanical_report[]">
                                            </div>
                                            <div class="form-control-wrap stacked">
                                                <a href="" class="btn btn-round btn-sm btn-icon btn-dim btn-danger remove-stack"><em class="icon ni ni-trash"></em></a>
                                                <input type="text" class="form-control form-control-lg" placeholder="Mechanical Report" name="mechanical_report[]">
                                            </div>
                                        </div>
                                        <div class="">
                                            <a href="" class="btn btn-dim btn-primary add-stack" data-name="mechanical_report[]" data-placeholder="Mechanical Report"><em class="icon ni ni-plus"></em><span>Add Item</span> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Electrical Report</label>
                                    <div class="asilify-stack">
                                        <div class="stacked-inputs">
                                            <div class="form-control-wrap stacked">
                                                <input type="text" class="form-control form-control-lg" placeholder="Electrical Report" name="electrical_report[]">
                                            </div>
                                            <div class="form-control-wrap stacked">
                                                <a href="" class="btn btn-round btn-sm btn-icon btn-dim btn-danger remove-stack"><em class="icon ni ni-trash"></em></a>
                                                <input type="text" class="form-control form-control-lg" placeholder="Electrical Report" name="electrical_report[]">
                                            </div>
                                            <div class="form-control-wrap stacked">
                                                <a href="" class="btn btn-round btn-sm btn-icon btn-dim btn-danger remove-stack"><em class="icon ni ni-trash"></em></a>
                                                <input type="text" class="form-control form-control-lg" placeholder="Electrical Report" name="electrical_report[]">
                                            </div>
                                        </div>
                                        <div class="">
                                            <a href="" class="btn btn-dim btn-primary add-stack" data-name="electrical_report[]" data-placeholder="Electrical Report"><em class="icon ni ni-plus"></em><span>Add Item</span> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button class="btn btn-white btn-dim btn-outline-light" type="button" data-dismiss="modal"><em class="icon ni ni-cross-circle"></em><span>Cancel</span></button>
                        <button class="btn btn-primary" type="submit"><em class="icon ni ni-check-circle-cut"></em><span>Create Job Card</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal add payment -->
    <div class="modal fade" tabindex="-1" id="addpayment">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <div class="modal-header">
                    <h5 class="modal-title">Add Payment</h5>
                </div>
                <form class="simcy-form" action="<?=  url('Projectpayment@create') ; ?>" data-parsley-validate="" method="POST" loader="true">
                    <div class="modal-body">
                        <p>Add payment</p>
                        <div class="row gy-4">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Select Invoice</label>
                                    <div class="form-control-wrap ">
                                        <div class="form-control-select">
                                            <select class="form-control select2" name="invoice" required="">
                                                <option value="">Select Invoice</option>
                                                <?php if (!empty($invoices)) { ?>
                                                <?php foreach ($invoices as $invoice) { ?>
                                                    <?php if ($invoice->status != "Paid") { ?>
                                                    <option value="<?=  $invoice->id ; ?>">Invoice #<?=  $invoice->id ; ?> ( <?=  currency($user->parent->currency) ; ?><?=  $invoice->balance ; ?> )</option>
                                                    <?php } ?>
                                                <?php } ?>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    <div class="form-note">The amout in brackets is the balance due.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Amount</label>
                                    <div class="form-control-wrap">
                                        <div class="form-text-hint">
                                            <span class="overline-title"><?=  currency($user->parent->currency) ; ?></span>
                                        </div>
                                        <input type="number" class="form-control form-control-lg" placeholder="Amount" data-parsley-pattern="[0-9]*(\.?[0-9]{2}$)" name="amount" value="0.00" step="0.01" min="0.01" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Payment Date</label>
                                    <div class="form-control-wrap">
                                        <input type="date" class="form-control form-control-lg" placeholder="Payment Date" value="<?=  date('Y-m-d') ; ?>" name="payment_date" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Payment Method</label>
                                    <div class="form-control-wrap ">
                                        <div class="form-control-select">
                                            <select class="form-control form-control-lg" name="method">
                                                <option value="Cash">Cash</option>
                                                <option value="Card">Card</option>
                                                <option value="Mobile Money">Mobile Money</option>
                                                <option value="Bank">Bank</option>
                                                <option value="Cheque">Cheque</option>
                                                <option value="Online Payment">Online Payment</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Note</label>
                                    <div class="form-control-wrap">
                                        <textarea class="form-control form-control-lg" placeholder="Note" rows="2" name="note"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button class="btn btn-white btn-dim btn-outline-light" type="button" data-dismiss="modal"><em class="icon ni ni-cross-circle"></em><span>Cancel</span></button>
                        <button class="btn btn-primary" type="submit"><em class="icon ni ni-check-circle-cut"></em><span>Add Payment</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Modal add payment -->
    <div class="modal fade" tabindex="-1" id="invoicepayment">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <div class="modal-header">
                    <h5 class="modal-title">Add Payment</h5>
                </div>
                <form class="simcy-form" action="<?=  url('Projectpayment@create') ; ?>" data-parsley-validate="" method="POST" loader="true">
                    <div class="modal-body">
                        <p>Add payment</p>
                        <div class="row gy-4">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Amount</label>
                                    <div class="form-control-wrap">
                                        <div class="form-text-hint">
                                            <span class="overline-title"><?=  currency($user->parent->currency) ; ?></span>
                                        </div>
                                        <input type="number" class="form-control form-control-lg" placeholder="Amount" data-parsley-pattern="[0-9]*(\.?[0-9]{2}$)" name="amount" value="0.00" step="0.01" min="0.01" required="">
                                        <input type="hidden" name="invoice" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Payment Date</label>
                                    <div class="form-control-wrap">
                                        <input type="date" class="form-control form-control-lg" placeholder="Payment Date" value="<?=  date('Y-m-d') ; ?>" name="payment_date" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Payment Method</label>
                                    <div class="form-control-wrap ">
                                        <div class="form-control-select">
                                            <select class="form-control form-control-lg" name="method">
                                                <option value="Cash">Cash</option>
                                                <option value="Card">Card</option>
                                                <option value="Mobile Money">Mobile Money</option>
                                                <option value="Bank">Bank</option>
                                                <option value="Cheque">Cheque</option>
                                                <option value="Online Payment">Online Payment</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Note</label>
                                    <div class="form-control-wrap">
                                        <textarea class="form-control form-control-lg" placeholder="Note" rows="2" name="note"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button class="btn btn-white btn-dim btn-outline-light" type="button" data-dismiss="modal"><em class="icon ni ni-cross-circle"></em><span>Cancel</span></button>
                        <button class="btn btn-primary" type="submit"><em class="icon ni ni-check-circle-cut"></em><span>Add Payment</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal create project -->
    <div class="modal fade" tabindex="-1" id="convertquote">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <div class="modal-header">
                    <h5 class="modal-title">Convert Quote to Invoice</h5>
                </div>
                <form class="simcy-form" action="<?=  url('Quote@convert') ; ?>" data-parsley-validate="" method="POST" loader="true">
                    <div class="modal-body">
                        <p>Convert Quote to Invoice</p>
                        <div class="row gy-4">

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Invoice Date</label>
                                        <div class="form-control-wrap">
                                            <input type="date" class="form-control form-control-lg" placeholder="Invoice Date" value="<?=  date('Y-m-d') ; ?>" name="invoice_date" required="">
                                            <input type="hidden" name="quote" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Payment Due</label>
                                        <div class="form-control-wrap">
                                            <input type="date" class="form-control form-control-lg" placeholder="Payment Due" value="<?=  date('Y-m-d') ; ?>" name="due_date" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Notes</label>
                                        <div class="form-control-wrap">
                                            <textarea class="form-control form-control-lg unset-mh" placeholder="Notes" rows="2" name="notes"></textarea>
                                        </div>
                                        <div class="form-note">Notes will be printed on the invoice.</div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Payment Details</label>
                                        <div class="form-control-wrap">
                                            <textarea class="form-control form-control-lg unset-mh" placeholder="Payment Details" rows="4" name="payment_details"><?=  $user->parent->payment_details ; ?></textarea>
                                        </div>
                                        <div class="form-note">Payment details will be printed on the invoice.</div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button class="btn btn-white btn-dim btn-outline-light" type="button" data-dismiss="modal"><em class="icon ni ni-cross-circle"></em><span>Cancel</span></button>
                        <button class="btn btn-primary" type="submit"><em class="icon ni ni-check-circle-cut"></em><span>Convert Quote</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- app-root @e -->
    <!-- JavaScript -->
    <?= view( 'includes/scripts', $s_v_data ); ?>
    <script src="<?=  asset('assets/libs/summernote/summernote-lite.min.js') ; ?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.summernote').summernote({
                placeholder: 'Write something',
                height: 120,
            });
        });
    </script>
</body>

</html>
<?php return;
