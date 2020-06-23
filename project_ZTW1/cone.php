<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Natural IT - Cone</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <!--Alerts swal()-->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        
        <!--Number rounding function-->
        <script>
            function roundPrecised(number, precision) {
                var power = Math.pow(10, precision);
                return Math.round(number * power) / power;
            }
        </script>

        <!--JQuery script for counting cone properties-->
        <script>
            $(document).ready(function(){
               $("#count").click(function(){
                   var h = parseFloat($("#high").val());
                   var r = parseFloat($("#radius").val());
                   var tmp = (h*h)+(r*r);
                   var l = Math.sqrt(tmp);
                   var s = Math.PI*r*(r+l); //surface
                   var v = (Math.PI*r*r*h)/3; //volume
                swal({
                    title: "Counting done!",
                    text: "Cone volume: " + roundPrecised(v,2) + "\nCone surface: " + roundPrecised(s,2),
                    icon: "success",
                    button: "Back",
                    });
               });
            });
        </script>

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
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                        <li class="nav-item active">
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
                    <div class="col-md-10 ">
                            <p class="h2 text-center">Complete Cone Form</p>
                            <p class="text-center border-bottom">Fill out this form if u want to get cone properties (volume and total surface area of the cone).</p>
                            <form id="cone_form">
                                <div class="form-group">
                                    <label class="h5" for="high">Height:</label>
                                    <input type="range" max="200" min="1" value="1" class="form-control-range" id="high" oninput="highVal.value = high.value">
                                    <span><u>Height value:</u> </span><b><output name="highVal" id="highVal">1</output></b>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="h5" for="radius">Radius:</label>
                                    <input type="range" max="200" min="1" value="1" class="form-control-range" id="radius" oninput="radiusVal.value = radius.value">
                                    <span><u>Radius value:</u> </span><b><output name="radiusVal" id="radiusVal">1</output></b>
                                </div>
                                <hr>
                                <a class="btn btn-success btn-md text-white" role="button" id="count">Count</a>
                            </form>    
                    </div>      
                </div>
                <br>
                <br>
                <!--Footer-->
                <?php require_once 'footer.php'; ?>
                </div>
            </div>
        </div>
        <!--Modal-->
        <?php require_once 'modal.php'; ?>
    </body>
</html>
