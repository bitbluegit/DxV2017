 
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dextro Campus | School CRM Management System</title>

    <!-- Meta Tags  -->
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/> 
    <meta name="author" content="http://www.bitbluetech.com/"/>
    <meta name="publisher" content="http://www.bitbluetech.com/"/>
    <meta name="Content-Language" content="english"/>
    <meta name="description" content="school managment system"/>
    <meta name="keywords" content="school, college,education,managment"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>

    <!-- <meta http-equiv="cache-control" content="no-cache"> -->
    <!-- <meta name="audience" content="all"> -->
    <!-- <meta name="GENERATOR" content="Microsoft FrontPage 4.0"> -->
    <!-- <meta name="page-topic" content="Free Computer help"> -->
    <!-- <meta name="page-type" content="Technical Support"> -->
    <!-- <meta name="ProgId" content="FrontPage.Editor.Document"> -->
    <!-- <meta name="revisit-after" content="15 days"> -->
    <!-- <meta name="ROBOTS" content="Index, ALL"> -->
    <!-- <meta name="ROBOTS" content="Index, FOLLOW"> -->
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge" /> -->
    <!-- <meta name="robots" content="NOODP,NOYDIR" /> -->
    <!-- <meta http-equiv="refresh" content="30"> -->

    <!-- Links -->
    <link rel="shortcut icon" href="assets/img/dx-icon.jpg" />
    <link rel="icon" sizes="16x16 32x32 64x64" href="assets/img/dx-icon.jpg" />

    <!-- styles -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendor/bricks.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/vendor/ionicons/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/utilities.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/custom.css">
    <link rel="stylesheet" type="text/css" href="assets/css/login.css">

</head>

<body>

  <div class="row container pad15">
    <section class="login-page">
        <!-- Transaction Filter Form -->
        <div class="l3 l-offset-01  bg-white overflow-x box-shadow margin-top ">
            <h5 class="bg-red pad10 small-caps txt-white align-left margin-bottom-zero">
                <i class="ion-android-unlock margin-right20"></i>
                LOGIN 
            </h5>
            <!-- Expense Form -->
            <form class="row" method="post" action="helper/auth.php">
                <!-- Start Date -->
                <div class="col m12  ">
                    <label for="user_name" class="font-weight100 small-caps full-width">User Name</label>
                    <input type="text"  name="user_name" id="user_name" class="full-width" 
                    placeholder="Enter Your User Name" title="Enter User Name." required="required">
                </div>

                <!--End Date -->
                <div class="col m12  ">
                    <label for="user_pwd" class="font-weight100 small-caps full-width">Password</label>
                    <input type="password" name="user_pwd" id="user_pwd" class="full-width"
                    placeholder="Enter Your Password" title="Enter Your Password." required="required">
                </div>   

                <!-- Submit Button -->
                <div class="col m12 pad-top10 txt-left">
                    <button type="submit" class="btn bg-grey txt-ash full-width">
                        <i class="ion-android-send"></i>
                        LOGIN
                    </button>
                </div>
            </form>
        </div>
    </section>

</div>
</body>
</html>
