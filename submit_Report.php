<?php
ob_start();
session_start();
	if(!isset($_SESSION['lab_Name']))
		header('location:http://localhost/Soil Test Analysis/lab.php');
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
    <title>Lab Report</title>
</head>

<body>
    <!-- NAVBAR -->
    <section class="Navbar">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary px-md-5 py-md-2 fixed-top">
            <a class="navbar-brand font-weight-bold text-capitalize" href="#">Welcome
                <?php echo $_SESSION['lab_Name'] ?>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ml-md-4 active">
                        <a class="nav-link" href="./lab_Tests.php">Create Report</a>
                    </li>
                    <li class="nav-item ml-md-4 active">
                        <a class="nav-link" href="./lab_dashboard.php">Dashboard</a>
                    </li>
                </ul>
                <form class="form-inline ml-md-4 my-2 my-lg-0">
                    <a href="./farmer_Logout.php"><button
                            class="btn bg-white my-1 px-3 font-weight-normal text-primary py-2 my-sm-0"
                            type="button">Log Out</button></a>
                </form>
            </div>
        </nav>
    </section>

    <!-- Report -->
    <section class="report mt-5">
        <div class="container pt-5">
            <h2 class="dash">Create Report</h2>
            <hr class="hero w-50">
            <br>
            <form action="submit_Report.php" class="form" method="post">
                <div class='row'>
                    <div class="col-sm-6 mb-4">
                        <label for="pH" class="form-label">pH</label>
                        <input type="number" class="form-control" id="pH" name="ph" required>
                    </div>

                    <div class="col-sm-6">
                        <label for="Nitrogen" class="form-label">Nitrogen</label>
                        <input type="number" class="form-control" id="Nitrogen" name="nitrogen" required>
                    </div>
                </div>
                <div class='row'>
                    <div class="col-sm-6 mb-4">
                        <label for="Phosphoru" class="form-label">Phosphorus</label>
                        <input type="number" class="form-control" id="Phosphoru" name="phosphorus" required>
                    </div>

                    <div class="col-sm-6">
                        <label for="Pottasium" class="form-label">Pottasium</label>
                        <input type="number" class="form-control" id="Pottasium" name="pottasium" required>
                    </div>
                </div>
                <div class='row'>
                    <div class="col-sm-6 mb-4">
                        <label for="Calcium" class="form-label">Calcium</label>
                        <input type="number" class="form-control" id="Calcium" name="calcium" required>
                    </div>

                    <div class="col-sm-6">
                        <label for="magnesium" class="form-label">Magnesium</label>
                        <input type="number" class="form-control" id="Magnesium" name="magnesium" required>
                    </div>
                </div>
                <div class='row'>
                    <div class="col-sm-6 mb-4">
                        <label for="Salinity" class="form-label">Salinity</label>
                        <input type="number" class="form-control" id="Salinity" name="salinity" required>
                    </div>

                    <div class="col-sm-6">
                        <label for="Zinc" class="form-label">Zinc</label>
                        <input type="number" class="form-control" id="Zinc" name="zinc" required>
                    </div>
                </div>
                <div class='row'>
                    <div class="col-sm-6 mb-4">
                        <label for="Iron" class="form-label">Iron</label>
                        <input type="number" class="form-control" id="Iron" name="iron" required>
                    </div>

                    <div class="col-sm-6">
                        <label for="Manganese" class="form-label">Manganese</label>
                        <input type="number" class="form-control" id="Manganese" name="manganese" required>
                    </div>
                </div>
                <div class='row'>
                    <div class="col-sm-6 mb-4">
                        <label for="Copper" class="form-label">Copper</label>
                        <input type="number" class="form-control" id="Copper" name="copper" required>
                    </div>

                    <div class="col-sm-6">
                        <label for="Sodium" class="form-label">Sodium</label>
                        <input type="number" class="form-control" id="Sodium" name="sodium" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-12">
                        <input class="btn btn-success btn-block" id="submit-btn" type="submit" name="Submit"
                            value="Submit" />
                    </div>
                </div>
                <input type="hidden" name="id" value="<?php echo $_POST['id'] ?>">
            </form>
        </div>
    </section>
</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</html>

<!-- PHP CODE FOR REPORT SUBMIT -->
<?php
if(isset($_POST['Submit'])){
    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,"soil_test_analysis");
    $status="Tested";
    $testid=$_POST['id'];
    $ph=$_POST['ph'];
    $nitrogen=$_POST['nitrogen'];
    $phosphorus=$_POST['phosphorus'];
    $pottasium=$_POST['pottasium'];
    $calcium=$_POST['calcium'];
    $magnesium=$_POST['magnesium'];
    $salinity=$_POST['salinity'];
    $zinc=$_POST['zinc']; 
    $iron=$_POST['iron']; 
    $manganese=$_POST['manganese'];
    $copper=$_POST['copper'];
    $sodium=$_POST['sodium'];
    $insert="insert into reports(TestID,PH,Nitrogen,Phosphorus,Pottasium,Calcium,Magnesium,Salinity,Zinc,Iron,Manganese,Copper,Sodium) values($testid,$ph,$nitrogen,$phosphorus,$pottasium,$calcium,$magnesium,$salinity,$zinc,$iron,$manganese,$copper,$sodium)";
    mysqli_query($con,$insert);
    $updt="update test set Status='$status' where TestID=$testid";
    mysqli_query($con,$updt);
    echo "
    <script>
        alert('Report Created Successfully')
    </script>";
}