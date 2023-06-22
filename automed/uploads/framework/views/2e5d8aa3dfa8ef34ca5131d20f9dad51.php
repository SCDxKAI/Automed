<?php global $s_v_data, $user, $title, $company, $timezones, $currencies, $countries; ?>
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
                                <div class="nk-block">
                                    <div class="card">
                                        <div class="card-aside-wrap">
                                            <div class="card-inner card-inner-lg custom-tab-body" id="personal">
                                                <div class="nk-block-head nk-block-head-lg">
                                                    <div class="nk-block-between">
                                                        <div class="nk-block-head-content">
                                                            <h4 class="nk-block-title">Personal Information</h4>
                                                            <div class="nk-block-des">
                                                                <p>Basic info, like your name and email, that you use on Asilify.</p>
                                                            </div>
                                                        </div>
                                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                                        </div>
                                                    </div>
                                                </div><!-- .nk-block-head -->
                                                <div class="nk-block card">
                                                    <div class="row">
                                                        <div class="col-sm-8">
                                                            <form class="simcy-form" action="<?=  url('Settings@updateprofile') ; ?>" data-parsley-validate="" method="POST" loader="true">
                                                                <div class="form-group">
                                                                    <div class="form-label-group">
                                                                        <label class="form-label" for="password">First Name</label>
                                                                    </div>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control form-control-lg" placeholder="First Name" name="fname" value="<?=  $user->fname ; ?>" required="">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="form-label-group">
                                                                        <label class="form-label" for="password">Last Name</label>
                                                                    </div>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control form-control-lg" placeholder="Last Name" name="lname" value="<?=  $user->lname ; ?>" required="">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="form-label-group">
                                                                        <label class="form-label" for="password">Email Address</label>
                                                                    </div>
                                                                    <div class="form-control-wrap">
                                                                        <input type="email" class="form-control form-control-lg" placeholder="Email Address" name="email" value="<?=  $user->email ; ?>" required="">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="form-label-group">
                                                                        <label class="form-label" for="password">Phone Number</label>
                                                                    </div>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control form-control-lg phone-input" placeholder="Phone Number" value="<?=  $user->phonenumber ; ?>">
                                                                        <input class="hidden-phone" type="hidden" name="phonenumber" value="<?=  $user->phonenumber ; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="form-label-group">
                                                                        <label class="form-label" for="password">Address</label>
                                                                    </div>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control form-control-lg" placeholder="Address" name="address" value="<?=  $user->address ; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group text-right">
                                                                    <button class="btn btn-lg btn-primary">Save Changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div><!-- .nk-block-head -->
                                            </div><!-- .card-inner -->
                                            <?php if ($user->role == "Owner" || $user->role == "Manager" || $user->role == "Admin") { ?>
                                            <div class="card-inner card-inner-lg custom-tab-body" id="company" style="display: none;">
                                                <div class="nk-block-head nk-block-head-lg">
                                                    <div class="nk-block-between">
                                                        <div class="nk-block-head-content">
                                                            <h4 class="nk-block-title">Company Information</h4>
                                                            <div class="nk-block-des">
                                                                <p>Basic company information and system preferences.</p>
                                                            </div>
                                                        </div>
                                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                                        </div>
                                                    </div>
                                                </div><!-- .nk-block-head -->
                                                <div class="nk-block card">
                                                    <div class="row">
                                                        <div class="col-sm-8">
                                                            <form class="simcy-form" action="<?=  url('Settings@updatecompany') ; ?>" data-parsley-validate="" method="POST" loader="true">
                                                                <div class="form-group">
                                                                    <div class="form-label-group">
                                                                        <label class="form-label">Company Name</label>
                                                                    </div>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control form-control-lg" placeholder="Company Name" name="name" value="<?=  $company->name ; ?>" required="">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="form-label-group">
                                                                        <label class="form-label">Company Logo</label>
                                                                    </div>
                                                                    <div class="form-control-wrap">
                                                                        <?php if (!empty($company->logo)) { ?>
                                                                        <input type="file" name="logo" class="croppie" default="<?=  asset('uploads/logos/'.$company->logo) ; ?>" crop-width="300" crop-height="150" accept="image/*">
                                                                        <?php } else { ?>
                                                                        <input type="file" name="logo" class="croppie" crop-width="300" crop-height="150" accept="image/*">
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="form-note">Your logo will be displayed on your invoices and quotes.</div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="form-label-group">
                                                                        <label class="form-label">Email Address</label>
                                                                    </div>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control form-control-lg" placeholder="Email Address" name="email" value="<?=  $company->email ; ?>" required="">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="form-label-group">
                                                                        <label class="form-label">Phone Number</label>
                                                                    </div>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control form-control-lg phone-input" placeholder="Phone Number" name="phone" value="<?=  $company->phone ; ?>" required="">
                                                                        <input class="hidden-phone" type="hidden" name="phone" value="<?=  $company->phone ; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="form-label-group">
                                                                        <label class="form-label">Address</label>
                                                                    </div>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control form-control-lg" placeholder="Address" name="address" value="<?=  $company->address ; ?>" required="">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="form-label-group">
                                                                        <label class="form-label">Town/City</label>
                                                                    </div>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control form-control-lg" placeholder="Town/City" name="city" value="<?=  $company->city ; ?>" required="">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="form-label-group">
                                                                        <label class="form-label">Country</label>
                                                                    </div>
                                                                    <div class="form-control-wrap">
                                                                        <select class="form-control form-control-lg select2" name="country">
                                                                            <?php foreach ($countries as $country) { ?>
                                                                            <option value="<?=  $country->name ; ?>" <?php if ($country->name == $company->country) { ?> 
                                                                                selected <?php } ?>><?=  $country->name ; ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="nk-divider divider md"></div>
                                                                <div class="form-group">
                                                                    <div class="form-label-group">
                                                                        <label class="form-label">Timezone</label>
                                                                    </div>
                                                                    <div class="form-control-wrap">
                                                                        <select class="form-control form-control-lg select2" name="timezone">
                                                                            <?php foreach ($timezones as $timezone) { ?>
                                                                            <option value="<?=  $timezone->zone ; ?>" <?php if ($timezone->zone == $company->timezone) { ?> 
                                                                                selected <?php } ?>><?=  $timezone->name ; ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="form-label-group">
                                                                        <label class="form-label">Currency</label>
                                                                    </div>
                                                                    <div class="form-control-wrap">
                                                                        <select class="form-control form-control-lg select2" name="currency">
                                                                            <?php foreach ($currencies as $currency) { ?>
                                                                            <option value="<?=  $currency->code ; ?>" <?php if ($currency->code == $company->currency) { ?> 
                                                                                selected <?php } ?>><?=  $currency->name ; ?> ( <?=  $currency->code ; ?> )</option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="nk-divider divider md"></div>
                                                                <div class="form-group">
                                                                    <div class="form-label-group">
                                                                        <label class="form-label">KRA PIN</label>
                                                                    </div>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control form-control-lg" placeholder="KRA PIN" name="kra_pin" value="<?=  $company->kra_pin ; ?>">
                                                                    </div>
                                                                    <div class="form-note">This printed on invoices and quotes.</div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="form-label-group">
                                                                        <label class="form-label">VAT Tax (%)</label>
                                                                    </div>
                                                                    <div class="form-control-wrap">
                                                                        <input type="number" class="form-control form-control-lg" placeholder="VAT Tax (%)"data-parsley-pattern="^[0-9]\d*(\.\d+)?$" step="0.01" min="0" name="vat" value="<?=  $company->vat ; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="form-label-group">
                                                                        <label class="form-label">Payment Details</label>
                                                                    </div>
                                                                    <div class="form-control-wrap">
                                                                        <textarea class="form-control form-control-lg unset-mh" placeholder="Payment Method" rows="4" name="payment_details"><?=  $company->payment_details ; ?></textarea>
                                                                    </div>
                                                                    <div class="form-note">Payment details will be printed on the invoices.</div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="form-label-group">
                                                                        <label class="form-label">Invoice Disclaimer</label>
                                                                    </div>
                                                                    <div class="form-control-wrap">
                                                                        <textarea class="form-control form-control-lg unset-mh" placeholder="Invoice Disclaimer" rows="4" name="invoice_disclaimer"><?=  $company->invoice_disclaimer ; ?></textarea>
                                                                    </div>
                                                                    <div class="form-note">Payment details will be printed on the invoices.</div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="form-label-group">
                                                                        <label class="form-label">Quotes Disclaimer</label>
                                                                    </div>
                                                                    <div class="form-control-wrap">
                                                                        <textarea class="form-control form-control-lg unset-mh" placeholder="Quotes Disclaimer" rows="4" name="quote_disclaimer"><?=  $company->quote_disclaimer ; ?></textarea>
                                                                    </div>
                                                                    <div class="form-note">Payment details will be printed on quotes.</div>
                                                                </div>
                                                                <div class="nk-divider divider md"></div>
                                                                <div class="form-group">
                                                                     <div class="custom-control custom-switch">
                                                                        <?php if ($company->sms_tasks == "Enabled") { ?>
                                                                        <input type="checkbox" name="sms_tasks" id="sms_tasks" class="custom-control-input" value="Enabled" checked="">
                                                                        <?php } else { ?>
                                                                        <input type="checkbox" name="sms_tasks" id="sms_tasks" class="custom-control-input" value="Enabled">
                                                                        <?php } ?>
                                                                        <label class="custom-control-label" for="sms_tasks">Send SMS to team members when new tasks are created.</label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                     <div class="custom-control custom-switch">
                                                                        <?php if ($company->insurance == "Enabled") { ?>
                                                                        <input type="checkbox" name="insurance" id="insurance-features" class="custom-control-input" value="Enabled" checked="">
                                                                        <?php } else { ?>
                                                                        <input type="checkbox" name="insurance" id="insurance-features" class="custom-control-input" value="Enabled">
                                                                        <?php } ?>
                                                                        <label class="custom-control-label" for="insurance-features"> Fix insurance covered repairs.</label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                     <div class="custom-control custom-switch">
                                                                        <?php if ($company->parts_to_inventory == "Enabled") { ?>
                                                                        <input type="checkbox" name="parts_to_inventory" id="parts-to-inventory" class="custom-control-input" value="Enabled" checked="">
                                                                        <?php } else { ?>
                                                                        <input type="checkbox" name="parts_to_inventory" id="parts-to-inventory" class="custom-control-input" value="Enabled">
                                                                        <?php } ?>
                                                                        <label class="custom-control-label" for="parts-to-inventory"> Add vehicle parts/expenses to inventory.</label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                     <div class="custom-control custom-switch">
                                                                        <?php if ($company->forced_completion == "Enabled") { ?>
                                                                        <input type="checkbox" name="forced_completion" id="forced_completion" class="custom-control-input" value="Enabled" checked="">
                                                                        <?php } else { ?>
                                                                        <input type="checkbox" name="forced_completion" id="forced_completion" class="custom-control-input" value="Enabled">
                                                                        <?php } ?>
                                                                        <label class="custom-control-label" for="forced_completion"> Vehicle tasks should be completed before marking a vehicle as completed.</label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                     <div class="custom-control custom-switch">
                                                                        <?php if ($company->forced_checkout == "Enabled") { ?>
                                                                        <input type="checkbox" name="forced_checkout" id="forced_checkout" class="custom-control-input" value="Enabled" checked="">
                                                                        <?php } else { ?>
                                                                        <input type="checkbox" name="forced_checkout" id="forced_checkout" class="custom-control-input" value="Enabled">
                                                                        <?php } ?>
                                                                        <label class="custom-control-label" for="forced_checkout"> Vehicles must be marked as completed before checking out.</label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                     <div class="custom-control custom-switch">
                                                                        <?php if ($company->restricted_checkout == "Enabled") { ?>
                                                                        <input type="checkbox" name="restricted_checkout" id="restricted_checkout" class="custom-control-input" value="Enabled" checked="">
                                                                        <?php } else { ?>
                                                                        <input type="checkbox" name="restricted_checkout" id="restricted_checkout" class="custom-control-input" value="Enabled">
                                                                        <?php } ?>
                                                                        <label class="custom-control-label" for="restricted_checkout"> Restrict check out until all parts, expenses, receivables & issuables are cleared.</label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                     <div class="custom-control custom-switch">
                                                                        <?php if ($company->invoice_signing == "Enabled") { ?>
                                                                        <input type="checkbox" name="invoice_signing" id="invoice_signing" class="custom-control-input" value="Enabled" checked="">
                                                                        <?php } else { ?>
                                                                        <input type="checkbox" name="invoice_signing" id="invoice_signing" class="custom-control-input" value="Enabled">
                                                                        <?php } ?>
                                                                        <label class="custom-control-label" for="invoice_signing"> Enable client signatures on invoices.</label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                     <div class="custom-control custom-switch">
                                                                        <?php if ($company->quote_signing == "Enabled") { ?>
                                                                        <input type="checkbox" name="quote_signing" id="quote_signing" class="custom-control-input" value="Enabled" checked="">
                                                                        <?php } else { ?>
                                                                        <input type="checkbox" name="quote_signing" id="quote_signing" class="custom-control-input" value="Enabled">
                                                                        <?php } ?>
                                                                        <label class="custom-control-label" for="quote_signing"> Enable client signatures on quotes.</label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group text-right">
                                                                    <button class="btn btn-lg btn-primary">Save Changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div><!-- .nk-block-head -->
                                            </div><!-- .card-inner -->
                                            <div class="card-inner card-inner-lg custom-tab-body" id="booking" style="display: none;">
                                                <div class="nk-block-head nk-block-head-lg">
                                                    <div class="nk-block-between">
                                                        <div class="nk-block-head-content">
                                                            <h4 class="nk-block-title">Booking Form</h4>
                                                            <div class="nk-block-des">
                                                                <p>Manage your company booking form here.</p>
                                                            </div>
                                                        </div>
                                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                                        </div>
                                                    </div>
                                                </div><!-- .nk-block-head -->
                                                <div class="nk-block card">
                                                    <div class="row">
                                                        <div class="col-sm-8">
                                                            <form class="simcy-form" action="<?=  url('Settings@updatebooking') ; ?>" data-parsley-validate="" method="POST" loader="true">
                                                                <div class="form-group">
                                                                    <div class="form-label-group">
                                                                        <label class="form-label">Vehicle booking form</label>
                                                                    </div>
                                                                    <div class="form-control-wrap">
                                                                        <select class="form-control form-control-lg" name="booking_form">
                                                                            <option value="Basic" <?php if ($company->booking_form == "Basic") { ?> selected <?php } ?>>Basic</option>
                                                                            <option value="Detailed" <?php if ($company->booking_form == "Detailed") { ?> selected <?php } ?>>Detailed</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                     <div class="custom-control custom-switch">
                                                                        <?php if ($company->car_diagram == "Enabled") { ?>
                                                                        <input type="checkbox" name="car_diagram" id="car-diagram" class="custom-control-input" value="Enabled" checked="">
                                                                        <?php } else { ?>
                                                                        <input type="checkbox" name="car_diagram" id="car-diagram" class="custom-control-input" value="Enabled">
                                                                        <?php } ?>
                                                                        <label class="custom-control-label" for="car-diagram"> Enable car diagram for marking dents and scratches.</label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="form-label-group">
                                                                        <label class="form-label">Vehicle Booking Form Disclaimer IN</label>
                                                                    </div>
                                                                    <div class="form-control-wrap">
                                                                        <textarea class="form-control form-control-lg unset-mh" placeholder="Vehicle Booking Form Disclaimer IN" rows="5" name="booking_disclaimer_in"><?=  $company->booking_disclaimer_in ; ?></textarea>
                                                                    </div>
                                                                    <div class="form-note">This disclaimer will be printed on the bottom of the booking form.</div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="form-label-group">
                                                                        <label class="form-label">Vehicle Booking Form Disclaimer OUT</label>
                                                                    </div>
                                                                    <div class="form-control-wrap">
                                                                        <textarea class="form-control form-control-lg unset-mh" placeholder="Vehicle Booking Form Disclaimer OUT" rows="5" name="booking_disclaimer_out"><?=  $company->booking_disclaimer_out ; ?></textarea>
                                                                    </div>
                                                                    <div class="form-note">This disclaimer will be printed on the bottom of the booking form.</div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="form-label-group">
                                                                        <label class="form-label">Terms & Conditions</label>
                                                                    </div>
                                                                    <div class="form-control-wrap">
                                                                        <textarea class="form-control form-control-lg unset-mh" placeholder="Terms & Conditions" rows="15" name="booking_terms"><?=  $company->booking_terms ; ?></textarea>
                                                                    </div>
                                                                    <div class="form-note">This disclaimer will be printed on the bottom of the booking form.</div>
                                                                </div>
                                                                <div class="form-group text-right">
                                                                    <button class="btn btn-lg btn-primary">Save Changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div><!-- .nk-block-head -->
                                            </div><!-- .card-inner -->
                                            <?php } ?>
                                            <?php if ($user->role == "Admin") { ?>
                                            <div class="card-inner card-inner-lg custom-tab-body" id="system" style="display: none;">
                                                <div class="nk-block-head nk-block-head-lg">
                                                    <div class="nk-block-between">
                                                        <div class="nk-block-head-content">
                                                            <h4 class="nk-block-title">System Settings</h4>
                                                            <div class="nk-block-des">
                                                                <p>Manage system settings and API keys.</p>
                                                            </div>
                                                        </div>
                                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                                        </div>
                                                    </div>
                                                </div><!-- .nk-block-head -->
                                                <div class="nk-block card">
                                                    <div class="row">
                                                        <div class="col-sm-8">
                                                            <form class="simcy-form" action="<?=  url('Settings@updatesystem') ; ?>" data-parsley-validate="" method="POST" loader="true">
                                                                <div class="form-group">
                                                                    <div class="form-label-group">
                                                                        <label class="form-label" for="password">System Name</label>
                                                                    </div>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control form-control-lg" placeholder="System Name" name="APP_NAME" value="<?=  env('APP_NAME') ; ?>" required="">
                                                                    </div>
                                                                </div>
                                                                <div class="nk-divider divider md"></div>
                                                                <p>Stripe API Keys</p>
                                                                <div class="form-group">
                                                                    <div class="form-label-group">
                                                                        <label class="form-label">Publishable Key</label>
                                                                    </div>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control form-control-lg" placeholder="Publishable Key" name="STRIPE_PUBLISHABLE_KEY" value="<?=  env('STRIPE_PUBLISHABLE_KEY') ; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="form-label-group">
                                                                        <label class="form-label">Secret Key</label>
                                                                    </div>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control form-control-lg" placeholder="Secret Key" name="STRIPE_SECRET_KEY" value="<?=  env('STRIPE_SECRET_KEY') ; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="nk-divider divider md"></div>
                                                                <p>SMS Settings</p>
                                                                <div class="form-group">
                                                                    <div class="form-label-group">
                                                                        <label class="form-label">SMS Provider</label>
                                                                    </div>
                                                                    <div class="form-control-wrap">
                                                                        <select class="form-control form-control-lg sms-provider-select" name="SMS_PROVIDER">
                                                                            <option value="twillio" <?php if (env('SMS_PROVIDER') == "twilio") { ?> selected <?php } ?>>Twilio</option>
                                                                            <option value="africastalking" <?php if (env('SMS_PROVIDER') == "africastalking") { ?> selected <?php } ?>>Africa's Talking</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <?php if (env('SMS_PROVIDER') == "africastalking") { ?>
                                                                <div class="africastalking-input form-group">
                                                                <?php } else { ?>
                                                                <div class="africastalking-input form-group" style="display:none;">
                                                                <?php } ?>
                                                                    <p>Africa's Talking API Keys</p>
                                                                    <div class="form-group">
                                                                        <div class="form-label-group">
                                                                            <label class="form-label" for="password">Username</label>
                                                                        </div>
                                                                        <div class="form-control-wrap">
                                                                            <input type="text" class="form-control form-control-lg" placeholder="Username" name="AFRICASTALKING_USERNAME" value="<?=  env('AFRICASTALKING_USERNAME') ; ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="form-label-group">
                                                                            <label class="form-label" for="password">API Key</label>
                                                                        </div>
                                                                        <div class="form-control-wrap">
                                                                            <input type="text" class="form-control form-control-lg" placeholder="API Key" name="AFRICASTALKING_KEY" value="<?=  env('AFRICASTALKING_KEY') ; ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="form-label-group">
                                                                            <label class="form-label" for="password">Sernder ID</label>
                                                                        </div>
                                                                        <div class="form-control-wrap">
                                                                            <input type="text" class="form-control form-control-lg" placeholder="Sernder ID" name="AFRICASTALKING_SENDERID" value="<?=  env('AFRICASTALKING_SENDERID') ; ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php if (env('SMS_PROVIDER') == "twillio") { ?>
                                                                <div class="twilio-input form-group">
                                                                <?php } else { ?>
                                                                <div class="twilio-input form-group" style="display:none;">
                                                                <?php } ?>
                                                                    <p>Twilio API Keys</p>
                                                                    <div class="form-group">
                                                                        <div class="form-label-group">
                                                                            <label class="form-label" for="password">SID</label>
                                                                        </div>
                                                                        <div class="form-control-wrap">
                                                                        <input type="text" class="form-control form-control-lg" placeholder="Twilio SID" name="TWILIO_SID" value="<?=  env('TWILIO_SID'); ; ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="form-label-group">
                                                                            <label class="form-label">Twilio Auth Token</label>
                                                                        </div>
                                                                        <div class="form-control-wrap">
                                                                            <input type="text" class="form-control form-control-lg" placeholder="Twilio Auth Token" name="TWILIO_AUTHTOKEN" value="<?=  env('TWILIO_AUTHTOKEN'); ; ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="form-label-group">
                                                                            <label class="form-label">Twilio Sender ID</label>
                                                                        </div>
                                                                        <div class="form-control-wrap">
                                                                            <input type="text" class="form-control form-control-lg" placeholder="Twilio Sender ID" name="TWILIO_PHONENUMBER" value="<?=  env('TWILIO_PHONENUMBER'); ; ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="nk-divider divider md"></div>
                                                                <p>SMTP Settings</p>
                                                                <div class="form-group">
                                                                    <div class="form-label-group">
                                                                        <label class="form-label" for="password">Username</label>
                                                                    </div>
                                                                    <div class="form-control-wrap">
                                                                        <input type="email" class="form-control form-control-lg" placeholder="Username" name="MAIL_USERNAME" value="<?=  env('MAIL_USERNAME') ; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="form-label-group">
                                                                        <label class="form-label" for="password">Send Email as</label>
                                                                    </div>
                                                                    <div class="form-control-wrap">
                                                                        <input type="email" class="form-control form-control-lg" placeholder="Send Email as" name="MAIL_SENDER" value="<?=  env('MAIL_SENDER') ; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="form-label-group">
                                                                        <label class="form-label" for="password">Host</label>
                                                                    </div>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control form-control-lg" placeholder="Host" name="SMTP_HOST" value="<?=  env('SMTP_HOST') ; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="form-label-group">
                                                                        <label class="form-label" for="password">Password</label>
                                                                    </div>
                                                                    <div class="form-control-wrap">
                                                                        <input type="password" class="form-control form-control-lg" placeholder="Password" name="SMTP_PASSWORD" value="<?=  env('SMTP_PASSWORD') ; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="form-label-group">
                                                                        <label class="form-label" for="password">Port</label>
                                                                    </div>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control form-control-lg" placeholder="Port" name="SMTP_PORT" value="<?=  env('SMTP_PORT') ; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="form-label-group">
                                                                        <label class="form-label" for="password">Encryption</label>
                                                                    </div>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control form-control-lg" placeholder="Encryption" name="MAIL_ENCRYPTION" value="<?=  env('MAIL_ENCRYPTION') ; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group text-right">
                                                                    <button class="btn btn-lg btn-primary">Save Changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div><!-- .nk-block-head -->
                                            </div><!-- .card-inner -->
                                            <?php } ?>
                                            <div class="card-inner card-inner-lg custom-tab-body" id="security" style="display: none;">
                                                <div class="nk-block-head nk-block-head-lg">
                                                    <div class="nk-block-between">
                                                        <div class="nk-block-head-content">
                                                            <h4 class="nk-block-title">Security Settings</h4>
                                                            <div class="nk-block-des">
                                                                <p>Set a unique password to protect your account.</p>
                                                            </div>
                                                        </div>
                                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                                        </div>
                                                    </div>
                                                </div><!-- .nk-block-head -->
                                                <div class="nk-block card">
                                                    <div class="row">
                                                        <div class="col-sm-8">
                                                            <form class="simcy-form" action="<?=  url('Settings@updatepassword') ; ?>" data-parsley-validate="" method="POST" loader="true">
                                                                <div class="form-group">
                                                                    <div class="form-label-group">
                                                                        <label class="form-label" for="password">Current Password</label>
                                                                    </div>
                                                                    <div class="form-control-wrap">
                                                                        <a href="#" class="form-icon form-icon-right passcode-switch" data-target="current">
                                                                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                                                        </a>
                                                                        <input type="password" class="form-control form-control-lg" id="current" name="current" placeholder="Enter your current password" required="">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="form-label-group">
                                                                        <label class="form-label" for="password">New Password</label>
                                                                    </div>
                                                                    <div class="form-control-wrap">
                                                                        <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                                                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                                                        </a>
                                                                        <input type="password" class="form-control form-control-lg" minlength="6" id="password" name="password" placeholder="Enter your new password" required="">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="form-label-group">
                                                                        <label class="form-label" for="password">Confirm New Password</label>
                                                                    </div>
                                                                    <div class="form-control-wrap">
                                                                        <a href="#" class="form-icon form-icon-right passcode-switch" data-target="confirm">
                                                                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                                                        </a>
                                                                        <input type="password" class="form-control form-control-lg" id="confirm" name="password" placeholder="Confirm new password" data-parsley-required="true" data-parsley-equalto="#password" data-parsley-error-message="Passwords don't Match!">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group text-right">
                                                                    <button class="btn btn-lg btn-primary" type="submit">Change Password</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div><!-- .nk-block-head -->
                                            </div><!-- .card-inner -->
                                            <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                                                <div class="card-inner-group">
                                                    <div class="card-inner">
                                                        <div class="user-card">
                                                            <div class="user-avatar bg-primary">
                                                                <span><?=  mb_substr($user->fname, 0, 1, "UTF-8").mb_substr($user->lname, 0, 1, "UTF-8") ; ?></span>
                                                            </div>
                                                            <div class="user-info">
                                                                <span class="lead-text"><?=  $user->fname ; ?> <?=  $user->lname ; ?></span>
                                                                <span class="sub-text"><?=  $user->phonenumber ; ?></span>
                                                            </div>
                                                        </div><!-- .user-card -->
                                                    </div><!-- .card-inner -->
                                                    <div class="card-inner p-0">
                                                        <ul class="link-list-menu custom-tab">
                                                            <li><a class="custom-tab-trigger active" href="#personal"><em class="icon ni ni-user-fill-c"></em><span>Personal Infomation</span></a></li>
                                                            <?php if ($user->role == "Owner" || $user->role == "Manager" || $user->role == "Admin") { ?>
                                                            <li><a class="custom-tab-trigger" href="#company"><em class="icon ni ni-building-fill"></em><span>Company Information</span></a></li>
                                                            <li><a class="custom-tab-trigger" href="#booking"><em class="icon ni ni-calendar-fill"></em><span>Booking Form</span></a></li>
                                                            <li><a class="" href="<?=  url('Bookingparts@get') ; ?>"><em class="icon ni ni-check-circle-fill"></em><span>Booking Parts List</span></a></li>
                                                            <li><a class="" href="<?=  url('Makes@get') ; ?>"><em class="icon ni ni-panel-fill"></em><span>Vehicle Makes</span></a></li>
                                                            <?php } ?>
                                                            <?php if ($user->role == "Admin") { ?>
                                                            <li><a class="custom-tab-trigger" href="#system"><em class="icon ni ni-activity-round-fill"></em><span>System Settings</span></a></li>
                                                            <?php } ?>
                                                            <li><a class="custom-tab-trigger" href="#security"><em class="icon ni ni-lock-alt-fill"></em><span>Security Settings</span></a></li>
                                                        </ul>
                                                    </div><!-- .card-inner -->
                                                </div><!-- .card-inner-group -->
                                            </div><!-- card-aside -->
                                        </div><!-- card-aside-wrap -->
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
