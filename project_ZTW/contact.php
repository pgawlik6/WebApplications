<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Natural IT - Contact</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    </head>

    <body>
        <div class="container-fluid bg-success">  
            <div class="row justify-content-md-center">
            <div class="col-md-10 bg-white ">
                <nav class="navbar navbar-expand-md bg-success navbar-dark ">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cone.php">Cone</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="room.php">Room</a>
                        </li>
                    </ul>
                </nav>
                
                <!--Jumbotron-->
                <?php require_once 'jumbotron.php'; ?>
        
                <div class="row justify-content-md-center">
                    <div class="col-md-6 ">
                        <p class="h2 text-center">Contact Us</p>
                        <p class="text-center border-bottom">If you would like to contact with us, please fill out this form.</p>
                        <form>
                            <div class="form-group">
                                <label class="h6" for="name">Name:</label>
                                <input type="text" class="form-control" placeholder="Enter your name" id="name">
                            </div>
                            <div class="form-group">
                                <label class="h6" for="email">Email address:</label>
                                <input type="email" class="form-control" placeholder="Enter your email" id="email">
                                <small class="text-secondary">Remember! We will never share your e-mail to anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label class="h6" for="subject">Subject:</label>
                                <input type="text" class="form-control" placeholder="Subject" id="subject">
                            </div>
                            <div class="form-group">
                                <label class="h6" for="subecjt_text">Message:</label>
                                <textarea class="form-control" id="subecjt_text" rows="3" placeholder="Enter here the content of the message"></textarea>
                            </div>
                            <a class="btn btn-success btn-md" href="contact.php" role="button">Submit</a>
                        </form>    
                    </div>
                </div>
                <br>
                <br>
                <!--Footer-->
                <?php require_once 'footer.php'; ?>
            </div>
        </div>
        <!--Modal-->
        <?php require_once 'modal.php'; ?>
        </div>
    </body>
</html>
