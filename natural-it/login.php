<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Natural IT - Login</title>

    <!--Site Favicon-->
    <link rel="icon" type="image/png" href="img/icon.png">
    
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/natural-it.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
	
	<!-- jQuery -->
    <script src="js/jquery.js"></script>
	
	<!-- Script with ajax-->
	<script type="text/javascript">
        		$(document).ready(function(){
			
                    $("#login").click(function(){
                    
                        email=$("#email").val();
                        password=$("#password").val();
                        $.ajax({
                            type: "POST",
                            url: "pcheck.php",
                            data: "email="+email+"&password="+password,
                            success: function(html){
                            if(html=='true')
                            {
                                
                                $("#add_err2").html('<div class="alert alert-success"> \
                                                        <strong>Authenticated</strong> \ \
                                                    </div>');

                                window.location.href = "blog.php";
                            
                            } else if (html=='false') {
                                    $("#add_err2").html('<div class="alert alert-danger"> \
                                                        <strong>Authentication</strong> failure. \ \
                                                    </div>');
                                    
                            
                            } else {
                                    $("#add_err2").html('<div class="alert alert-danger"> \
                                                        <strong>Error</strong> processing request. Please try again. \ \
                                                    </div>');
                            }
                            },
                            beforeSend:function()
                            {
                                $("#add_err2").html("loading...");
                            }
                        });
                        return false;
                    });
});
    </script>

</head>

<body>

    <!-- Top of site-->
    <div class="brand">NATURAL IT</div>
    <div class="brand-description">Always choose wisely</div>

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.html">Natural IT</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a class="uFromLeft" href="index.php">Home</a>
                    </li>
                    <li>
                        <a class="uFromLeft" href="about.php">About</a>
                    </li>
                    <li>
                        <a class="uFromLeft" href="contact.php">Contact</a>
                    </li>
                    <li class="active">
                        <a class="uFromLeft" href="blog.php">Blog</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <div class="container">
        <div class="row text-center">
            <div class="box">
                <div class="col-lg-12">
                    
					<div class="alert alert-warning">
					<strong>You must be logged in to view the blog.</strong>
                    </div>
                    
                    <!--Information about correct logout-->
                    <?php
                    
                    if (isset($_GET["logout"])) {
                        
                        if ($_GET["logout"] == "true") { ?>
                            
                            <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>You have been logged out of the system.</strong>
                            </div>   
                
                    <?php
                        }
                    }
                    ?>
                    <div id="add_err2"></div>
					
					<hr>
                    <h2 class="intro-text text-center">
                        <strong>Login</strong>
                    </h2>
                    <hr> 
					
                          
                    <form role="form">
                        <div class="row">
                            <div class="form-group col-lg-4 text-left col-lg-offset-4">
                                <label>Email Address</label>
                                <input type="email" id="email" name="email" maxlength="50" class="form-control" placeholder="Email">
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-lg-4 text-left col-lg-offset-4">
                                <label>Password</label>
                                <input type="password" id="password" name="password" maxlength="25" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group col-lg-12">
                                <button type="submit" id="login" class="btn btn-default"> Login </button>
                            </div>
                        </div>
                    </form>
					
					<div class="form-group col-lg-12">
						<a href="register.php"><button type="submit" class="btn btn-primary">Not a Member? Register here</button></a>
					</div>

					
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <!--footer-->
    <?php require_once 'footer.php'; ?>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
