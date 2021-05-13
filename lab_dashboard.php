<?php
ob_start();
session_start();
	if(!isset($_SESSION['lab_Name']))
		header('location:http://localhost/Soil Test Analysis/lab.php');
?>
<?php
    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,"soil_test_analysis");
    $test="select * from test";
    $result=mysqli_query($con,$test);
    $num=mysqli_num_rows($result);
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
    <title>Lab Assistant Section</title>
</head>

<body>
    <!-- NAVBAR -->
    <section class="Navbar">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary px-md-5 py-md-2 fixed-top">
            <a class="navbar-brand font-weight-bold text-capitalize" href="#">Welcome
                <?php echo $_SESSION['lab_Name'] ?>!
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ml-md-4 active">
                        <a class="nav-link" href="lab_Tests.php">Create Report</a>
                    </li>
                </ul>
                <form class="form-inline ml-md-4 my-2 my-lg-0">
                    <a href="./Logout.php"><button
                            class="btn bg-white my-1 px-3 font-weight-normal text-primary py-2 my-sm-0"
                            type="button">Log Out</button></a>
                </form>
            </div>
        </nav>
    </section>

    <!-- Tests -->
    <section class="container mt-5">
        <div class="row pt-5">
            <div class="col-12">
                <h3 class="display-4 dash">Dashboard / Farmer's Test</h3>
                <hr class="hero w-75">
            </div>
            <?php
                if($num!=0)
                { 
                for($i=1;$i<=$num;$i++)
				{
                    $row=mysqli_fetch_array($result);
                ?>
            <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                <form action="lab_dashboard.php" method="post">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Test ID-
                                <?php echo $row['TestID'] ?>
                            </h4>
                            <?php $t_id=$row['TestID']; ?>
                            <p class="card-text">
                            <input type="hidden" name="id" value="<?php echo $row['TestID'] ?>">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <h5>Farmer Name</h5>
                                    <?php echo $row['Name'] ?>
                                </li>
                                <li class="list-group-item">
                                    <h5>Farmer Description</h5>
                                    <?php echo $row['Description'] ?>
                                </li>
                                <li class="list-group-item">
                                    <h5>Status</h5>
                                    <span name="status"><?php echo $row['Status'] ?></span>
                                </li>
                            </ul>
                            </p>
                            <center><button type="submit" id="app" class="btn btn-primary w-50" name="approve">Approve</button></center>
                        </div>
                    </div>
                </form>
            </div>
            <?php
                }
                }
            ?>
        </div>
    </section>
</body>
<script>
    let x=document.getElementsByName("status");
    let y=document.getElementsByName("approve");
    for(let i=0;i<x.length;i++){
        if(x[i].textContent=="Not Approved"){
            y[i].disabled=false;
            x[i].style.color="#F93154";
        }
        else if(x[i].textContent=="Approved"){
            y[i].disabled=true;
            x[i].style.color="#39C0ED";
        }
        else{
            y[i].disabled=true;
            x[i].style.color="#00B74A";
        }
    }
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</html>

<?php
if(isset($_POST['approve'])){
    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,"soil_test_analysis");
    $approve=$_POST['id'];
    $name=$_SESSION['lab_Name'];
    $app="Approved";
    $update="update test set Status='$app',TestAlloted='$name' where TestID=$approve";
    $status=mysqli_query($con,$update);
    //echo $status;
    header('location:http://localhost/Soil Test Analysis/lab_dashboard.php');
}
?>