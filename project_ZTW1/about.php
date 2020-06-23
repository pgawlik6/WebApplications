<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Natural IT - About</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


    </head>

    <body>
        <div class="container-fluid bg-success">  
            <div class="row justify-content-center">
            <div class="col-md-10 bg-white ">
                <nav class="navbar navbar-expand-md bg-success navbar-dark ">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="about.php">About</a>
                        </li>
                        <li class="nav-item">
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
                    <div class="col-md-10 text-center">
                        <hr>
                        <div class="h1">Who we are?</div>
                        <hr>
                        <p class="text-left">&#160;&#160;&#160;&#160;&#160;&#160;Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                        <br>
                        <hr>
                        <div class="h1">Our Management Staff</div>
                        <hr>
                        <div class="row justify-content-md-center">
                            <div class="col-md-4 text-center">
                                <img class="img-responsive" src="img/about1.jpg" alt="">
                                <h3>James Moore</h3>
                                <span class="intro-text text-center">Director</span>
                            </div>
                            <div class="col-md-4 text-center">
                                <img class="img-responsive" src="img/about2.jpg" alt="">
                                <h3>Jane Brown</h3>
                                <span class="intro-text text-center">Project Manager</span>
                            </div>
                            <div class="col-md-4 text-center">
                                <img class="img-responsive" src="img/about3.jpg" alt="">
                                <h3>Pavel Vukic</h3>
                                <span class="intro-text text-center">Project Manager</span>
                            </div>
                        </div> 
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
        </div>
    </body>
</html>
