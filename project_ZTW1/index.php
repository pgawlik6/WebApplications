<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Natural IT - Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


    </head>

    <body>
        <div class="container-fluid bg-success">  
            <div class="row justify-content-md-center">

            <div class="col-md-10 bg-white">
            <nav class="navbar navbar-expand-md bg-success navbar-dark ">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
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
                    <div class="col-md-10 text-center ">
                        <hr>
                        <div class="h1">How to choose the best IT company?</div>
                        <hr>
                        <p class="text-left">&#160;&#160;&#160;&#160;&#160;&#160;It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                        <br>
                        <hr>
                        <div class="h1">Our Gallery</div>
                        <hr>
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="img/slide1.jpg" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="img/slide2.jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="img/slide3.jpg" alt="Third slide">
                            </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <br>
                        <p class="text-left">&#160;&#160;&#160;&#160;&#160;&#160;Vestibulum dapibus nisl eget nisl sodales gravida. Sed maximus blandit congue. Nulla porttitor nulla vel sem maximus, at molestie nisl pellentesque. Maecenas porttitor tellus id tortor ornare, vitae sagittis ex faucibus. Sed laoreet metus nibh. Quisque pellentesque est a libero efficitur suscipit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        
                    <br>
                    <br>
                    <!--Footer-->
                    <?php require_once 'footer.php'; ?>
                    </div>
                </div>
            </div>
            <!--Modal-->
            <?php require_once 'modal.php'; ?>
            </div>
        </div>
    </body>
</html>
