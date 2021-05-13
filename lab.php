<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./CSS/layout.css">
    <title>Lab Services</title>
</head>

<body>
    <!-- NAVBAR -->
    <section class="Navbar">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary px-md-5 py-md-2 fixed-top">
            <a class="navbar-brand" href="#">SOIL TEST ANALYSIS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ml-md-4">
                        <a class="nav-link" href="./index.php">Home</a>
                    </li>
                    <li class="nav-item ml-md-4 active dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Services
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="./farmer.php">Farmer Services</a>
                            <a class="dropdown-item" href="./lab.php">Lab Services</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline ml-md-4 my-2 my-lg-0">
                    <button class="btn bg-white my-1 px-3 font-weight-normal text-primary py-2 my-sm-0" type="button"
                        data-toggle="modal" data-target="#signup">Sign Up</button>
                </form>
            </div>
        </nav>
    </section>

    <!-- Modal for signup -->
    <div class="modal fade" id="signup" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Sign Up Now!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="lab.php" method="post" id="formSubmit">
                    <div class="modal-body" id="modal-body">
                        <span class="lab_errors"></span>
                        <div class="form-group" id="form">
                            <label for="name">Enter name</label>
                            <input type="text" oninput="this.className = 'form-control'" class="form-control"
                                name="lname" id="lname" required>
                        </div>
                        <div class="form-group">
                            <label for="workspace">Enter Workspace</label>
                            <input type="workspace" oninput="this.className = 'form-control'" class="form-control"
                                name="lworkspace" id="lworkspace" required>
                        </div>
                        <div class="form-group">
                            <label for="contact">Enter contact number</label>
                            <input type="mobile" oninput="this.className = 'form-control'" class="form-control"
                            name="lcontact" id="lcontact" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Enter email</label>
                            <input type="text" oninput="this.className = 'form-control'" class="form-control"
                                name="lemail" id="lemail" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Enter password</label>
                            <input type="password" oninput="this.className = 'form-control'" class="form-control"
                                name="lfpassword" id="lfpassword" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Enter confirm password</label>
                            <input type="password" oninput="this.className = 'form-control'" class="form-control"
                                id="lcpassword" name="lcpassword" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" onclick="req()" id="signup" name="labsubmit" class="btn btn-primary px-4 py-2">Sign
                                up</button>
                        </div>
                        <div class="form-group text-center">
                            <a href="" data-toggle="modal" data-dismiss="modal" data-target="#loginmodal"><span
                                    class="text-dark font-weight-lighter">Already have an account?</span></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal for login -->
    <div class="modal fade" id="loginmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Log in</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="lab.php" id="loginForm" method="post">
                    <div class="modal-body">
                        <span class="lab_errors"></span>
                        <div class="form-group">
                            <label for="email">Enter email</label>
                            <input type="text" oninput="this.className = 'form-control'" class="form-control"
                                name="loginEmail" id="loginEmail" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Enter password</label>
                            <input type="password" id="loginPassword" oninput="this.className = 'form-control'"
                                name="loginPassword" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" onclick="req()" name="lab_submit" class="btn btn-primary px-4 py-2">Log
                                in</button>
                        </div>
                        <div class="form-group text-center">
                            <a href="" data-toggle="modal" data-dismiss="modal" data-target="#signup"><span
                                    class="text-dark font-weight-lighter">Dont have an account?</span></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Banner -->
    <section class="banner bg-primary">
        <div class="container text-center pt-5">
            <div class="row pt-5 justify-content-center">
                <div class="col-md-5 mt-sm-0 mt-md-5">
                    <h1 class="header text-white font-weight-light display-5">Lab Services</h1>
                    <p class=" para text-white mt-4">Welcome lab assistant, here you have to made a new account by
                        signing in by clicking sign up button in navbar and get started with your work. A detailed
                        Services for you is given in this section make sure you read it properly before moving on. Have
                        a great day!</p>
                </div>
                <div class="col-md-6 offset-md-1 mt-5 mt-md-0">
                    <img src="./images/lab.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- services  -->
    <section class="services pt-40 text-center">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="heading">
                        <h2 class="header text-left">Services</h2>
                        <hr class="hero w-50">
                    </div>
                    <div class="services-list pt-40">
                        <button class="services-item">
                            <div class="services-icon"><span class="fas fa-sign-in-alt bg-dark"></span></div>
                            <div class="services-text">
                                <h3 class="services-title">Easy To Signup</h3>
                                <p class="services-desc">A lab assistant can easily made a free account and can start
                                    its work.</p>
                            </div>
                        </button>
                        <button class="services-item">
                            <div class="services-icon"><span class="fas fa-bell bg-danger"></span></div>
                            <div class="services-text">
                                <h3 class="services-title">Alert</h3>
                                <p class="services-desc">Fast alerts from farmer whether he submitted report or not.</p>
                            </div>
                        </button>
                        <button class="services-item">
                            <div class="services-icon"><span class="material-icons bg-success">verified</span></div>
                            <div class="services-text">
                                <h3 class="services-title">Status</h3>
                                <p class="services-desc">A lab assistant has a feature to change status of soil testing
                                    ie. approved/not approved/tested.</p>
                            </div>
                        </button>
                        <button class="services-item">
                            <div class="services-icon"><span class="material-icons bg-info">summarize</span></div>
                            <div class="services-text">
                                <h3 class="services-title">Report</h3>
                                <p class="services-desc">A lab assistant can easily generate a report based on farmer
                                    soil taken. and report sent to farmer easily.</p>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
    </section>
    <!-- How to use? -->
    <section class="some-section light-gray" style="padding: 5%;">
        <div class="container mb-5 text-sm-center">
            <div class="row">
                <div class="col-md-5">
                    <h2 class="header text-left">Steps for using</h2>
                </div>
            </div>
            <hr class="hero w-50">
        </div>
        <div class="container-fluid blue-bg">
            <div class="container">
                <!--first section-->
                <div class="row align-items-center how-it-works">
                    <div class="col-2 text-center bottom">
                        <div class="circle">1</div>
                    </div>
                    <div class="col-10">
                        <h2 style="font-weight:900; font-size: 1.8rem;letter-spacing: 1px;">Sign Up & Login!</h2>
                        <p class="lead">
                            Lab assistant has to first create a new account to get started and then he/she can <br> log in through personal creditentials!
                        </p>
                    </div>
                </div>
                <!--path between 1-2-->
                <div class="row timeline">
                    <div class="col-2">
                        <div class="corner top-right"></div>
                    </div>
                    <div class="col-8">
                        <hr />
                    </div>
                    <div class="col-2">
                        <div class="corner left-bottom"></div>
                    </div>
                </div>
                <!--second section-->
                <div class="row align-items-center justify-content-end how-it-works">
                    <div class="col-10 text-right">
                        <h2 style="font-weight:900; font-size: 1.8rem;letter-spacing: 1px;">Register!</h2>
                        <p class="lead">
                            As soon as he/she signed in a lab assistant would be having a dashboard where <br> one can see farmer requests, by accessing through his details a soil has to be <br> collected from farmer's end and can register his appointment.
                        </p>
                    </div>
                    <div class="col-2 text-center full">
                        <div class="circle">2</div>
                    </div>
                </div>
                <!--path between 2-3-->
                <div class="row timeline">
                    <div class="col-2">
                        <div class="corner right-bottom"></div>
                    </div>
                    <div class="col-8">
                        <hr />
                    </div>
                    <div class="col-2">
                        <div class="corner top-left"></div>
                    </div>
                </div>
                <!--third section-->
                <div class="row align-items-center how-it-works">
                    <div class="col-2 text-center fullright">
                        <div class="circle">3</div>
                    </div>
                    <div class="col-10">
                        <h2 style="font-weight:900; font-size: 1.8rem;letter-spacing: 1px;">Generate Report!</h2>
                        <p class="lead">
                            A lab assistant has to generate a report after the testing of the soil is done. There will <br> be option for particular farmer where assistant can generate a report and it would be <br> sended to farmer's end.
                        </p>
                    </div>
                </div>
                <!-- path between 3-4 -->
                <div class="row timeline">
                    <div class="col-2">
                        <div class="corner top-right"></div>
                    </div>
                    <div class="col-8">
                        <hr />
                    </div>
                    <div class="col-2">
                        <div class="corner left-bottom"></div>
                    </div>
                </div>
                <!-- fourth section -->
                <div class="row align-items-center justify-content-end how-it-works">
                    <div class="col-10 text-right">
                        <h2 style="font-weight:900; font-size: 1.8rem;letter-spacing: 1px;">Job Done!</h2>
                        <p class="lead">
                            Yes, you heard it right, It's as easy as possible! Now a lab assistant can  log out <br>from its account.
                        </p>
                    </div>
                    <div class="col-2 text-center full">
                        <div class="circle">4</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <section class="footer mt-5">
        <div class="container-fluid">
            <div class="row pt-5 pb-3 justify-content-center">
                <div class="col-lg-3 col-md-10 mt-4 mt-lg-0">
                    <h4 class="font-weight-bold">Soil Test Analysis</h4>
                    <p class="f-para">Soil test analysis is the place for the farmers and lab assistants. Soil is been
                        collected by the farmer with the proper steps and instructions and taken by the lab assistant.
                        After testing of soil, report is sent to farmer.</p>
                </div>
                <div class="col-lg-3 offset-lg-1 pl-lg-5 col-md-10 mt-4 mt-lg-0">
                    <h4 class="font-weight-bold">Follow Us</h4><br>
                    <i class="fab fa-facebook-f" style="font-size: 26px; color: royalblue;"></i> &nbsp;&nbsp;
                    <i class="fab fa-linkedin" style="font-size: 26px; color: rgb(14, 118, 168);"></i>&nbsp;&nbsp;
                    <i class="fab fa-twitter" style="font-size: 26px; color: rgb(0, 172, 238);"></i>&nbsp;&nbsp;
                    <i class="fab fa-instagram" style="font-size: 26px; color: saddlebrown;"></i>&nbsp;&nbsp;
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-10 mt-5 mt-lg-0">
                    <h4 class="font-weight-bold">Contact Us</h4>
                    <i class="fas  fa-map-marker-alt"></i> &nbsp;&nbsp;
                    <label class="label" for="">India</label><br>
                    <i class="fas fa-envelope"></i>&nbsp;&nbsp;
                    <label class="label" for="">pratikaswani9333@gmail.com</label><br>
                    <i class="fas fa-phone-alt"></i>&nbsp;&nbsp;
                    <label class="label" for="">+91 9764989345</label><br>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="./JS/lab.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</html>


<!-- PHP CODE -->
<?php
// Signup 
if(isset($_POST['labsubmit'])){
    $name=$_POST['lname'];
    $workspace=$_POST['lworkspace'];
    $contact=$_POST['lcontact'];
    $email=$_POST['lemail'];
    $password=$_POST['lfpassword'];
    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,"soil_test_analysis");
    $q="select * from lab where Email ='$email'";
    $result=mysqli_query($con,$q);
    $num=mysqli_num_rows($result);
    if($num==0){
        $insert="insert into lab(Name,Workspace,Contact,Email,password) values('$name','$workspace','$contact','$email',$password)";
        $result=mysqli_query($con,$insert);
        echo $result;
        echo "
        <script>
            alert('Signup Successfull! Login to continue')
        </script>";
    }
    else{
        echo "
        <script>
        alert('User already signed up!')
        </script>";
    }
}

//Login
if(isset($_POST['lab_submit'])){
    session_start();
    $l_email=$_POST['loginEmail'];
    $l_password=$_POST['loginPassword'];
    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,"soil_test_analysis");
    $q="select * from lab where Email ='$l_email' && password ='$l_password'";   
    $result=mysqli_query($con,$q);
    $data = mysqli_fetch_array($result);
    $num=mysqli_num_rows($result);
    if($num==1){
        $_SESSION['lab_Name']= $data['Name'];
        $_SESSION['lab_Workspace']=$data['Workspace'];
        $_SESSION['lab_Contact']=$data['Contact'];
        $_SESSION['lab_Email']=$data['Email'];
        header('location:http://localhost/Soil Test Analysis/lab_dashboard.php');
    }
    else{
        echo "<script>alert('Incorrect email or password!')</script>";
    }
}
?>