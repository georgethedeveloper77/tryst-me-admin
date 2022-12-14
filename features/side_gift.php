<?php

require '../vendor/autoload.php';

//include '../Configs.php';

use Parse\ParseException;
use Parse\ParseQuery;
use Parse\ParseUser;


//session_start();

$currUser = ParseUser::getCurrentUser();
if ($currUser) {

    // Store current user session token, to restore in case we create new user
    $_SESSION['token'] = $currUser->getSessionToken();
} else {

    header("Refresh:0; url=../index.php");
}

?>

<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Gifts</h3></div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Features</a></li>
                <li class="breadcrumb-item active">All gifts</li>
            </ol>
        </div>
    </div>

    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row bg-white m-l-0 m-r-0 box-shadow ">

        </div>
        <div class="row">
            <div class="col-lg">
                <div class="card">

                    <?php

                    $query = new ParseQuery("Gifts");
                    $matchCounter = $query->count(true);

                    echo ' <h2 class="card-title">' . $matchCounter . ' Gift(s) in total</h2> ';

                    ?>

                    <h5 class="card-subtitle">Copy or Export CSV, Excel, PDF and Print data</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <!--<table class="table">-->
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                                   cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>ObjectId</th>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Coins</th>
                                    <th>Category</th>
                                    <th>File</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                try {

                                    $query = new ParseQuery("Gifts");
                                    $query->descending('createdAt');
                                    $catArray = $query->find(false);

                                    foreach ($catArray as $iValue) {
                                        // Get Parse Object
                                        $cObj = $iValue;

                                        $objectId = $cObj->getObjectId();
                                        $date = $cObj->getCreatedAt();
                                        $created = date_format($date, "d/m/Y");

                                        $credits = $cObj->get('coins');
                                        $category = $cObj->get('categories');

                                        $typeFile = $cObj->get('file');
                                        if ($typeFile !== null) {

                                            $profilePhotoUrl = $typeFile->getURL();

                                            $file = "<span/><a target='_blank' href=\"$profilePhotoUrl\" class=\"badge badge-info\">Download</a></span>";

                                        } else {

                                            $file = "<span class=\"badge badge-red\">NOT AVAILABLE</span>";
                                        }

                                        $giftName = $cObj->get('name');

                                        echo '
		            	
		            	        <tr>
                                    <td>' . $objectId . '</td>
                                    <td>' . $created . '</td>
                                    <td><span>' . $giftName . '</span></td>
                                    <td>' . $credits . '</td>
                                     <td>' . $category . '</td>
                                    <td><span>' . $file . '</span></td>
                                </tr>
                                
                                ';
                                    }
                                    // error in query
                                } catch (ParseException $e) {
                                    echo $e->getMessage();
                                }
                                ?>

                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <!-- End PAge Content -->
    </div>
    <!-- End Container fluid  -->
    <!-- footer -->

    <!-- End footer -->
</div>
