<?php
    $con=mysqli_connect("localhost","root","","product_catalogue") or die(mysqli_error());
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!------font awesone----->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!----google font---->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <!-------------Animate CSS-------------->
    <link rel="stylesheet" href="css/animate.css">

    <title>Ohoshop Catalogue</title>

    <!---------css--------->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/media.css">
</head>

<body>

    <!---------------HEADER STARTS---------------->
    <header class="navigation shadow">
        <div class="container">
            <!-- A grey horizontal navbar that becomes vertical on small screens -->
            <nav class="navbar navbar-expand-md navbar-expand-lg">
                <!-- Brand/logo -->
                <a class="navbar-brand wow bounceInLeft" href="index.php">
                    <img src="images/logo.png" alt="logo" class="logo">
                </a>
                <!----navbar toggle starts----->
                <button class="navbar-toggler wow fadeIn delay_small" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span><i class="fas fa-bars menubar"></i></span>
                </button>
                <!----navbar toggle ends----->
                <!-- Links -->
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav ml-auto wow fadeInRight">
                        <li class="nav-item">
                            <a class="nav-link nav-active" href="index.php">Home</a>
                        </li>
                        <li class="">
                            <a href="mailto:anikasalsabilsalsabil@gmail.com"><button class="contact_btn">Contact us</button></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!---------BANNER STARTS---------->
    <section class="banner_index">
        <div class="container-fluid green_banner">
            <div class="container">
                <div class="row wow pulse">
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <h1>Explore all Branded Smartphones</h1>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
                        <a href="#startnow"><button class="btn">Start Now</button></a>
                    </div>

                </div>
            </div>

        </div>



        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h5 class="mt-5">Mobile Brands</h5>

                    <div class="">

                        <div class="row">
                            <?php  
                $query = "SELECT * FROM logo ORDER BY id";  
                $result = mysqli_query($con, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                ?>
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-2 col-xs-1 brand_a wow fadeIn">
                                <a href="view.php?brand=<?php echo $row['brand'];?>">
                                    <?php echo '   
                        <img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" class="img-fluid max70">  
                                
                     '; ?>

                                </a>
                            </div>
                            <?php    
                }  
                ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>
    <!---------BANNER ENDS---------->


    <section class="brand_wise" id="startnow">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h5 class="mt-5">All brands trending</h5>
                    <div class="row">
                        <?php  
                $query = "SELECT * FROM product group by brand";  
                $result = mysqli_query($con, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                ?>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-xs-3 card_col">
                            <div class="card shadow wow fadeInUp">
                                <a href="config.php?name=<?php echo $row['name'];?>">
                                    <div class="pink_card">
                                        <?php echo '   
                        <img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" class="img-fluid card-img-top">  
                                
                     '; ?>
                                        <div class="searchmiddle">
                                            <i class="fas fa-search"></i>
                                        </div>
                                    </div>
                                    <p class="brandname">
                                        <?php echo $row['name'];?>
                                    </p>
                                </a>
                                <div class="price_rate">
                                    <p class="mt-2"><b>Rating: </b>
                                        <?php 
                                        if($row['rate']==0){?>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <?php }
                                    ?>
                                    <?php 
                                        if($row['rate']==1){?>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <?php }
                                    ?>
                                    <?php 
                                        if($row['rate']==2){?>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <?php }
                                    ?>
                                    <?php 
                                        if($row['rate']==3){?>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <?php }
                                    ?>
                                    <?php 
                                        if($row['rate']==4){?>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <?php }
                                    ?>
                                    <?php 
                                        if($row['rate']==5){?>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <?php }
                                    ?>
                                    </p>
                                    

                                    <p class="pricing_config">৳
                                        <?php echo $row['price'];?>
                                    </p>
                                </div>
                            </div>

                        </div>
                        <?php    
                }  
                ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-------FOOTER STARTS-------->
    <footer>
        <div class="green_footer">
            <div class="container wow pulse">
                <h5><b>ALL BRANDS</b></h5>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">

                        <div class="row">
                            <?php  
                $query = "SELECT * FROM logo ORDER BY id";  
                $result = mysqli_query($con, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                ?>
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2 brand_col">
                                <a href="view.php?brand=<?php echo $row['brand'];?>">
                                    <?php echo $row['brand'];?></a>
                            </div>
                            <?php
                }
                ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="grey_footer">
            <div class="container">
                <div class="row wow zoomIn">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <p>© 2019 COPYRIGHT <b><a href="index.php" class="txt_green">OHOSHOP</a></b></p>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <p class="right_center">DESIGNED BY <a href="mailto:anikasalsabilsalsabil@gmail.com" class="txt_green"><b>Anika <b class="txt_white">.</b> Salsabil</b></a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-------FOOTER ENDS-------->
    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();

    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="//code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="js/countdown-timer.js"></script>
</body>

</html>
