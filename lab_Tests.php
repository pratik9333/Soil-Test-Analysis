<?php
ob_start();
session_start();
	if(!isset($_SESSION['lab_Name']))
		header('location:http://localhost/Soil Test Analysis/lab.php');
?>
<?php
    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,"soil_test_analysis");
    $email=$_SESSION['Email'];
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
    <title>Received Tests</title>
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
                        <a class="nav-link" href="./lab_dashboard.php">Dashboard</a>
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

    <section class="tests mt-5">
        <div class="container-fluid pt-5">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <span style="font-size: 35px; font-family: 'Cinzel', serif;">Tests</span>
                    </thead><br>
                    <tr>
                        <th>Test ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Aadhar</th>
                        <th>Acres</th>
                        <th>User Email</th>
                        <th>Test Alloted</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Report</th>
                    </tr>
                    <?php 
                        for($i=1;$i<=$num;$i++)
                        {
                            $row=mysqli_fetch_array($result);
                    ?>
                    <form action="submit_Report.php" method="post">
                        <input type="hidden" value="<?php echo $row['TestID'] ?>" name="id">
                    <tr>
                        <td><?php echo $row['TestID'] ?></td>
				        <td><?php echo $row['Name'] ?></td>
				        <td><?php echo $row['Address'] ?></td>
				        <td><?php echo $row['Aadhar'] ?></td>
                        <td><?php echo $row['Acres'] ?></td>
                        <td><?php echo $row['UserEmail'] ?></td>
                        <td><?php echo $row['TestAlloted'] ?></td>
                        <td><?php echo $row['Description'] ?></td>
                        <td><span name="status"><?php echo $row['Status'] ?></span></td>
                        <td><button name="but" type="submit" data-toggle="tooltip" data-placement="bottom" title="Cannot create report if status is not approved or once its tested" id="report" class="btn btn-primary">Create Report</button></td>
                    </tr>
                    </form>
                    <?php
				        }
			        ?>
                </table>
        </div>
    </section>
</body>
<script>
    let x=document.getElementsByName("status");
    let y=document.getElementsByName("but");
    for(let i=0;i<x.length;i++){
        if(x[i].textContent=="Not Approved"){
            y[i].disabled=true;
            x[i].style.color="#F93154";
        }
        else if(x[i].textContent=="Approved"){
            y[i].disabled=false;
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