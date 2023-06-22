<?php global $s_v_data; ?>

<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Dotted Craft Limited">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?=  env('APP_NAME'); ?> | Auto Garage Management System">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="<?=  asset('assets/images/favicon.png') ; ?>">
    <!-- Page Title  -->
    <title>Create Account | Auto Garage Management System</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="<?=  asset('assets/css/app.css') ; ?>">
    <link rel="stylesheet" href="<?=  asset('assets/css/theme.css') ; ?>">
    <link rel="stylesheet" href="<?=  asset('assets/css/intlTelInput.css') ; ?>">
    <link rel="stylesheet" href="<?=  asset('assets/css/simcify.min.css') ; ?>">
    <link rel="stylesheet" href="<?=  asset('assets/css/asilify.css') ; ?>">

</head>

<body class="nk-body bg-white npc-general pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-split nk-split-page nk-split-md">
                        <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white w-lg-45">
                            <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                                <a href="https://asilify.com/" class="toggle btn btn-white btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
                            </div>
                            <div class="nk-block nk-block-middle nk-auth-body">
                                <div class="brand-logo pb-5">
                                    <a href="html/index.html" class="logo-link">
                                        <img class="logo-light logo-img logo-img-lg" src="<?=  asset('assets/images/logo-dark.png') ; ?>" srcset="<?=  asset('assets/images/logo-dark.png') ; ?>" alt="logo">
                                        <img class="logo-dark logo-img logo-img-lg" src="<?=  asset('assets/images/logo-dark.png') ; ?>" srcset="<?=  asset('assets/images/logo-dark.png') ; ?>" alt="logo-dark">
                                    </a>
                                </div>
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">Create Account</h5>
                                        <div class="nk-block-des">
                                            <p>Create New <?=  env('APP_NAME'); ?> Account</p>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <form class="simcy-form" action="<?=  url('Auth@createaccount') ; ?>" data-parsley-validate="" method="POST" loader="true">
                                    <div class="row mb-1">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">First Name</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control form-control-lg" name="fname" placeholder="First Name" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="name">Last Name</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control form-control-lg" name="lname" placeholder="Last Name" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="name">Company Name</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control form-control-lg" name="company" placeholder="Company Name" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="name">Email Address</label>
                                                <div class="form-control-wrap">
                                                    <?php if (isset($_GET["email"])) { ?>
                                                    <input type="email" class="form-control form-control-lg" value="<?=  $_GET['email'] ; ?>" name="email" placeholder="Email Address" required="">
                                                    <?php } else { ?>
                                                    <input type="email" class="form-control form-control-lg" name="email" placeholder="Email Address" required="">
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="name">Phone Number</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control form-control-lg phone-input" placeholder="Phone Number" required="">
                                                    <input class="hidden-phone" type="hidden" name="phonenumber">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            <label class="form-label" for="password">Password</label>
                                            <div class="form-control-wrap">
                                                <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                                </a>
                                                <input type="password" class="form-control form-control-lg" id="password" placeholder="Enter your password" name="password"  required="">
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-control-xs custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox" required="">
                                            <label class="custom-control-label" for="checkbox">I agree to <?=  env('APP_NAME'); ?> <a tabindex="-1" href="">Privacy Policy</a> &amp; <a tabindex="-1" href=""> Terms.</a></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block">Create Account</button>
                                    </div>
                                </form><!-- form -->
                                <div class="form-note-s2 pt-4"> Already have an account ? <a href="<?=  url('Auth@get') ; ?>"><strong>Sign in instead</strong></a>
                                </div>
                            </div><!-- .nk-block -->
                            <div class="nk-block nk-auth-footer">
                                <div class="nk-block-between">
                                    <ul class="nav nav-sm">
                                        <li class="nav-item">
                                            <a class="nav-link" href="">Terms & Condition</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="">Privacy Policy</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="">Help</a>
                                        </li>
                                    </ul><!-- nav -->
                                </div>
                                <div class="mt-3">
                                    <p>&copy; <?=  date("Y") ; ?> <?=  env("APP_NAME") ; ?> • All Rights Reserved.</p>
                                </div>
                            </div><!-- nk-block -->
                        </div><!-- nk-split-content -->
                        <div class="nk-split-content nk-split-stretch bg-abstract"></div><!-- nk-split-content -->
                    </div><!-- nk-split -->
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
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

</html>
<?php return;
