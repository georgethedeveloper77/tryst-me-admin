<?php

require '../vendor/autoload.php';

use Parse\ParseConfig;
use Parse\ParseQuery;
use Parse\ParseException;

// Update data ------------------------------------------------

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['approveAction'])){

    $phone = $_POST['phone'];
    $facebook = $_POST['facebook'];
    $google = $_POST['google'];
    $apple = $_POST['apple'];
    $apple_ios = $_POST['apple_ios'];

    try {
        $config = new ParseConfig();

        $config->set('phoneLoginEnabled', filter_var($phone, FILTER_VALIDATE_BOOLEAN));
        $config->set('facebookLoginConfig', filter_var($facebook, FILTER_VALIDATE_BOOLEAN));
        $config->set('googleLoginEnabled', filter_var($google, FILTER_VALIDATE_BOOLEAN));
        $config->set('appleLoginEnabled', filter_var($apple, FILTER_VALIDATE_BOOLEAN));
        $config->set('appleLoginEnabledForIOS', filter_var($apple_ios, FILTER_VALIDATE_BOOLEAN));

        $config->save();
        // The object was retrieved successfully.

        // We disabled it to avoid bad use, in your own app will work perfectly

        showSweetAlert("Success!", "Login types Updated", "success", "");
    } catch (ParseException $ex) {
        // The object was not retrieved successfully.
        // error is a ParseException with an error code and message.
        showSweetAlert("Error!", $ex->getMessage(), "error", "#");
    } catch (Exception $e) {
        showSweetAlert("Error!", $e->getMessage(), "error", "#");
    }
}

?>

<?php
// Get current Payout
$config = new ParseConfig();

$phoneLogin = $config->get('phoneLoginEnabled');
$facebookLogin = $config->get('facebookLoginConfig');
$googleLogin = $config->get('googleLoginEnabled');
$appleLogin = $config->get('appleLoginEnabled');
$appleLoginIos = $config->get('appleLoginEnabledForIOS');

$withdrawPercent = $config->get('withdraw_percent');

if ($phoneLogin ==! null){
    $phoneLogin1 = "Enabled";
    $phoneLoginDisabled1 = true;

    $phoneLogin2 = "Disabled";
    $phoneLoginDisabled2 = false;
} else {
    $phoneLogin1 = "Disabled";
    $phoneLoginDisabled1 = false;

    $phoneLogin2 = "Enabled";
    $phoneLoginDisabled2 = true;
}

if ($facebookLogin ==! null){
    $facebookLogin1 = "Enabled";
    $facebookLoginDisabled1 = true;

    $facebookLogin2 = "Disabled";
    $facebookLoginDisabled2 = false;
} else {
    $facebookLogin1 = "Disabled";
    $facebookLoginDisabled1 = false;

    $facebookLogin2 = "Enabled";
    $facebookLoginDisabled2 = true;
}

if ($googleLogin ==! null){
    $googleLogin1 = "Enabled";
    $googleLoginDisabled1 = true;

    $googleLogin2 = "Disabled";
    $googleLoginDisabled2 = false;
} else {
    $googleLogin1 = "Disabled";
    $googleLoginDisabled1 = false;

    $googleLogin2 = "Enabled";
    $googleLoginDisabled2 = true;
}

if ($appleLogin ==! null){
    $appleLogin1 = "Enabled";
    $appleLoginDisabled1 = true;

    $appleLogin2 = "Disabled";
    $appleLoginDisabled2 = false;
} else {
    $appleLogin1 = "Disabled";
    $appleLoginDisabled1 = false;

    $appleLogin2 = "Enabled";
    $appleLoginDisabled2 = true;
}

if ($appleLoginIos ==! null){
    $appleLoginIos1 = "Enabled";
    $appleLoginIosDisabled1 = true;

    $appleLoginIos2 = "Disabled";
    $appleLoginIosDisabled2 = false;
} else {
    $appleLoginIos1 = "Disabled";
    $appleLoginIosDisabled1 = false;

    $appleLoginIos2 = "Enabled";
    $appleLoginIosDisabled2 = true;
}

?>

<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Login Settings </h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Settings</a></li>
                <li class="breadcrumb-item active">Login Settings</li>
            </ol>
        </div>
    </div>

    <?php

    echo '
    
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row bg-white m-l-0 m-r-0 box-shadow ">

        </div>
        <div class="row">
            <div class="col-lg">
                <div class="card">
                    <div class="card-body">
                        <div class="form-validation">
                        <form class="form-valide" action="" method="post">
                        
                         <div class="form-group row">
                              <label class="col-lg-2 col-form-label" for="phone">Phone number Login <span class="text-danger"></span></label>
                              <div class="col-sm-10">
                                  <select class="form-control" id="phone" name="phone">
                                     <option value="' . $phoneLoginDisabled1 . '">' . $phoneLogin1 . '</option>
                                     <option value="' . $phoneLoginDisabled2 . '">' . $phoneLogin2 . '</option>
                                  </select>
                             </div>
                        </div>
                        
                         <div class="form-group row">
                              <label class="col-lg-2 col-form-label" for="facebook">Facebook Login<span class="text-danger"></span></label>
                              <div class="col-sm-10">
                                  <select class="form-control" id="facebook" name="facebook">
                                     <option value="' . $facebookLoginDisabled1 . '">' . $facebookLogin1 . '</option>
                                     <option value="' . $facebookLoginDisabled2 . '">' . $facebookLogin2 . '</option>
                                  </select>
                             </div>
                        </div>
                        
                         <div class="form-group row">
                              <label class="col-lg-2 col-form-label" for="google">Google Login<span class="text-danger"></span></label>
                              <div class="col-sm-10">
                                  <select class="form-control" id="google" name="google">
                                     <option value="' . $googleLoginDisabled1 . '">' . $googleLogin1 . '</option>
                                     <option value="' . $googleLoginDisabled2 . '">' . $googleLogin2 . '</option>
                                  </select>
                             </div>
                        </div>
                        
                        <div class="form-group row">
                              <label class="col-lg-2 col-form-label" for="apple">Apple Login<span class="text-danger"></span></label>
                              <div class="col-sm-10">
                                  <select class="form-control" id="apple" name="apple">
                                     <option value="' . $appleLoginDisabled1 . '">' . $appleLogin1 . '</option>
                                     <option value="' . $appleLoginDisabled2 . '">' . $appleLogin2 . '</option>
                                  </select>
                             </div>
                        </div>
                        
                        <div class="form-group row">
                              <label class="col-lg-2 col-form-label" for="apple_ios">Apple Login for iOS<span class="text-danger"></span></label>
                              <div class="col-sm-10">
                                  <select class="form-control" id="apple_ios" name="apple_ios">
                                     <option value="' . $appleLoginIosDisabled1 . '">' . $appleLoginIos1 . '</option>
                                     <option value="' . $appleLoginIosDisabled2 . '">' . $appleLoginIos2 . '</option>
                                  </select>
                             </div>
                        </div>
                        
                
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" name="approveAction" class="btn btn-info"> Update now </button>
                                <!--<a class="btn btn-inverse" href="../dashboard/settings_login.php"> Back </a>-->
                            </div>
                        </div>
                    </form>
                </div>

            </div>
                </div>
        </div>
        </div>
        <!-- End PAge Content -->
    </div>
    <!-- End Container fluid  -->
    
    ';
    ?>


</div>

<?php

function showSweetAlert($title, $explain, $type, $redirectUrl)
{
    echo '<script type="text/javascript">
    setTimeout(function () 
        { 
            swal("'.$title.'","'.$explain.'","'.$type.'").then(value => window.location = "'.$redirectUrl.'");
        }, 
        1000);
        </script>';
}
?>