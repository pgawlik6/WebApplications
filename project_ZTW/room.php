<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Natural IT - Room</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <!--Alerts swal()-->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <!--AJAX script-->
        <script>
            $(document).ready(function(){
                $("#count").click(function(){
                var h = parseInt($("#height_1").val()); //height
                var w = parseInt($("#width_1").val()); //width
                var len = parseInt($("#length").val()); //length
                var vol = h*w*len; //volume
                $.ajax({
                    type:"GET",
                    url:"../project/calc_room.php",
                    cache:false,
                    data:"vol=" + vol ,
                    success:function(html){
                        if(vol < 20){
                            swal({
                            title: "Counting error!",
                            text: "Volume of room is too small to place heater!\n(Your room has " + vol + " of volume. You need at least 20). ",
                            icon: "error",
                            button: "Back",
                        });
                        }else{
                        swal({
                            title: "Counting done!",
                            text: "Volume of room: " + vol + "\nNumber of heaters in room: " + html,
                            icon: "success",
                            button: "Back",
                        });
                        }
                    }
                });
            });
            });
        </script>
        <!--AJAX script - version 2
        <script>
            $(document).ready(function(){
                $("#count").click(function(){
                var h = parseInt($("#height_1").val()); //height
                var w = parseInt($("#width_1").val()); //width
                var len = parseInt($("#length").val()); //length
                $.ajax({
                    type:"GET",
                    url:"../project/calc_room_2.php",
                    cache:false,
                    data:"h=" + h + "&w=" + w + "&len=" + len,
                    success:function(html){
                        swal({
                            title: "Counting done!",
                            text: "Number of heaters in room: " + html,
                            icon: "success",
                            button: "Back",
                        });
                    }
                });
            });
            });
        </script>-->

    </head>

    <body>
        <div class="container-fluid bg-success">  
            <div class="row justify-content-md-center">

                <div class="col-md-10 bg-white">
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
                            <li class="nav-item">
                                <a class="nav-link" href="cone.php">Cone</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="room.php">Room</a>
                            </li>
                        </ul>
                    </nav>
                    
                    <!--Jumbotron-->
                    <?php require_once 'jumbotron.php'; ?>
                    
                    <div class="row justify-content-md-center">
                        <div class="col-md-10">
                        <p class="h2 text-center">Complete Room Form</p>
                            <p class="text-center border-bottom">Fill out this form if u want to get room volume and number of <br>heaters which can be placed in this room (1 heaters need 20 of volume).</p>
                            <form>
                                <div class="form-group">
                                    <label class="h5" for="height_1">Height:</label>
                                    <input type="range" max="10" min="1" value="1" class="form-control-range" id="height_1" oninput="heightVal.value = height_1.value">
                                    <span><u>Height value:</u> </span><b><output name="heightVal" id="heightVal">1</output></b>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="h5" for="length">Length:</label>
                                    <input type="range" max="400" min="1" value="1" class="form-control-range" id="length" oninput="lengthVal.value = length.value">
                                    <span><u>Length value:</u> </span><b><output name="lengthVal" id="lengthVal">1</output></b>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="h5" for="width_1">Width:</label>
                                    <input type="range" max="400" min="1" value="1" class="form-control-range" id="width_1" oninput="widthVal.value = width_1.value">
                                    <span><u>Width value:</u> </span><b><output name="widthVal" id="widthVal">1</output></b>
                                </div>
                                <hr>
                                <a class="btn btn-success btn-md text-white" role="button" id="count">Count</a>
                            </form>
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
