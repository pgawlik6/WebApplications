<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Natural IT - Contact</title>

    <!--Site Favicon-->
    <link rel="icon" type="image/png" href="img/icon.png">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/natural-it.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

	
	<!-- jQuery with ajax -->
    <script src="js/jquery.js"></script>
	
		<script type="text/javascript">
        $(document).ready(function () {

            $("#contact").click(function () {

                fname = $("#fname").val();
                email = $("#email").val();
		        subject = $("#subject").val();
                message = $("#message").val();

                $.ajax({
                    type: "POST",
                    url: "sendmsg.php",
                    data: "fname=" + fname + "&email=" + email + "&subject=" + subject + "&message=" + message,
                    success: function (html) {
                        if (html == 'true') {

                            $("#add_err2").html('<div class="alert alert-success"> \
                                                 <strong>Message Sent Successfuly!</strong> \ \
                                                 </div>');
			    $("#fname").val('');
 			    $("#email").val('');
 			    $("#subject").val('');
 			    $("#message").val('');

                        } else if (html == 'fname_long') {
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>First Name</strong> must cannot exceed 50 characters. \ \
                                                 </div>');
						
						} else if (html == 'fname_short') {
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>First Name</strong> must exceed 2 characters. \ \
                                                 </div>');
												 
						} else if (html == 'email_long') {
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Email</strong> must cannot exceed 50 characters. \ \
                                                 </div>');
						
						} else if (html == 'email_short') {
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Email</strong> must exceed 2 characters. \ \
                                                 </div>');
												 
						} else if (html == 'eformat') {
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Email</strong> format incorrect. \ \
                                                 </div>');
												 
						} else if (html == 'subject_long') {
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Subject</strong> must cannot exceed 50 characters. \ \
                                                 </div>');
						
						} else if (html == 'subject_short') {
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Subject</strong> must exceed 2 characters. \ \
                                                 </div>');
												 
						}else if (html == 'message_long') {
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Message</strong> must cannot exceed 50 characters. \ \
                                                 </div>');
						
						} else if (html == 'message_short') {
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Message</strong> must exceed 2 characters. \ \
                                                 </div>');


                        } else {
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Error</strong> processing request. Please try again. \ \
                                                 </div>');
                        }
                    },
                    beforeSend: function () {
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
                    <li class="active">
                        <a class="uFromLeft" href="contact.php">Contact</a>
                    </li>
                    <li>
                        <a class="uFromLeft" href="blog.php">Blog</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Contact
                        <strong>NATURAL IT</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-md-8">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2560.0816961767982!2d19.925908315557496!3d50.08475727942658!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47165a516290eb35%3A0xea2ebc64c7542fd4!2sRusznikarska-Deptak%207%2C%2031-302%20Krak%C3%B3w!5e0!3m2!1spl!2spl!4v1592496345512!5m2!1spl!2spl" width="600" height="450" frameborder="1" style="border-style:solid; border-color:gray;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <div class="col-md-4">
                    <p><strong><u>Phone:</u></strong>
                       (+48) 666 888 555
                    </p>
                    <p><strong><u>Email:</u></strong>
                        <a href="mailto:pawelgawlik6@o2.pl">natural-it@naturalit.com</a>
                    </p>
                    <p><strong><u>Address:</u></strong>
                        Rusznikarska-Deptak 7, 
                            <br>&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;31-302 Kraków
                    </p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <div id="add_err2"></div>
                    <hr>
                    <h2 class="intro-text text-center">Contact
                        <strong>form</strong>
                    </h2>
		    
                    <hr>

                    
                    <form role="form">
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label>Name</label>
                                <input type="text" id="fname" name="fname" maxlength="50" class="form-control" placeholder="Enter your name"></input>
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Email Address</label>
                                <input type="email" id="email" name="email" maxlength="50" class="form-control" placeholder="Enter your email"></input>
                            </div>
      			    <div class="form-group col-lg-4">
                                <label>Subject</label>
                                <input type="text" id="subject" name="subject" maxlength="50" class="form-control" placeholder="Enter the subject"></input>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-lg-12">
                                <label>Message</label>
                                <textarea class="form-control" id="message" name="message" maxlength="500" rows="6" placeholder="Type your message here..."></textarea>
                            </div>
                            <div class="form-group col-lg-12">                           
                                <button type="submit"  id="contact" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
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
