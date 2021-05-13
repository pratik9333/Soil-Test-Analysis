<?php
ob_start();
session_start();
	if(!isset($_SESSION['Name']))
		header('location:http://localhost/Soil Test Analysis/farmer.php');
?>
<?php
    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,"soil_test_analysis");
    $email=$_SESSION['Email'];
    $test="select * from test where UserEmail='$email'";
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
    <title>Farmer Section</title>
</head>

<body>
    <!-- NAVBAR -->
    <section class="Navbar">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary px-md-5 py-md-2 fixed-top">
            <a class="navbar-brand font-weight-bold text-capitalize" href="#">Welcome
                <?php echo $_SESSION['Name'] ?>!
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ml-md-4 active">
                        <a class="nav-link" href="see_Tests.php">Generate Report</a>
                    </li>
                    <li class="nav-item ml-md-4 active">
                        <a class="nav-link" data-toggle="modal" data-target="#create_test" href="">Create Test</a>
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

    <!-- Create Test Modal -->
    <div class="modal fade" id="create_test" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Create Test!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="farmer_dashboard.php" method="post" id="formSubmit">
                    <div class="modal-body" id="modal-body">
                        <span class="errors"></span>
                        <div class="form-group" id="form">
                            <label for="name">Name (नाम)</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $_SESSION['Name'] ?>"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="age">Age (आयु)</label>
                            <input type="text" name="age" class="form-control" value="<?php echo $_SESSION['Age'] ?>"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="age">Address (पता)</label>
                            <textarea name="address" cols="8" rows="4" value="" class="form-control" readonly>
                            <?php echo $_SESSION['Address'] ?>
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="aadhaar">Aadhaar number (आधार नंबर)</label>
                            <input type="text" name="aadhar" class="form-control"
                                value="<?php echo $_SESSION['Aadhar'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="contact">Contact number (संपर्क नंबर)</label>
                            <input type="text" name="contact" class="form-control"
                                value="<?php echo $_SESSION['Contact'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="email">Email (ईमेल)</label>
                            <input type="text" name="email" class="form-control"
                                value="<?php echo $_SESSION['Email'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="acres">Enter Acres of land</label>
                            <input type="number" name="acres" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="desc">Enter Description</label>
                            <textarea name="desc" cols="8" rows="4" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" id="create_test" name="create_test"
                                class="btn btn-primary px-4 py-2">Create Test</button>
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

    <!-- Tests -->
    <section class="container mt-5">
        <div class="row pt-5">
            <div class="col-12">
                <h3 class="display-4 dash">Dashboard</h3>
                <hr class="hero w-25">
            </div>
            <?php
                for($i=1;$i<=$num;$i++)
				{
                    $row=mysqli_fetch_array($result);
                ?>
            <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                <form action="farmer_dashboard.php" method="post">
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
                                    <h5>Name</h5>
                                    <?php echo $row['Name'] ?>
                                </li>
                                <li class="list-group-item">
                                    <h5>Description</h5>
                                    <?php echo $row['Description'] ?>
                                </li>
                                <li class="list-group-item">
                                    <h5>Status</h5> 
                                    <span name="status"><?php echo $row['Status'] ?></span>
                                </li>
                            </ul>
                            </p>
                            <button type="submit" name="delete" id="delete" class="btn btn-danger w-100">Delete
                                Test</button>
                        </div>
                    </div>
                </form>
            </div>
            <?php
                }
            ?>
        </div>
    </section>
</body>
<script>
    let x=document.getElementsByName("status");
    for(let i=0;i<x.length;i++){
        if(x[i].textContent=="Not Approved"){
            x[i].style.color="#F93154";
        }
        else if(x[i].textContent=="Approved"){
            x[i].style.color="#39C0ED";
        }
        else{
            x[i].style.color="#00B74A";
        }
    }
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</html>

<?php
if(isset($_POST['create_test'])){
    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,"soil_test_analysis");
    $name=$_POST['name'];
    $address=$_POST['address'];
    $aadhar=$_POST['aadhar'];
    $contact=$_POST['contact'];
    $email=$_POST['email'];
    $acres=$_POST['acres']; 
    $desc=$_POST['desc']; 
    $ran=rand(10000,70000);
    $insert="insert into test(TestID,Name,Address,Aadhar,Acres,TestAlloted,UserEmail,Description,Status) values($ran,'$name','$address',$aadhar,$acres,'alloted soon!','$email','$desc','Not Approved')";
    mysqli_query($con,$insert);
    echo "
    <script>
        alert('Test Created!')
    </script>";
    header('location:http://localhost/Soil Test Analysis/farmer_dashboard.php');
}
if(isset($_POST['delete'])){
    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,"soil_test_analysis");
    $delete=$_POST['id'];
    $del="delete from test where TestID=$delete";
    $status=mysqli_query($con,$del);
    header('location:http://localhost/Soil Test Analysis/farmer_dashboard.php');
}
?>