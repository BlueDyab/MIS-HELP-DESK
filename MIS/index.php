<!doctype html>
<html lang="en">

<head>
    <title>MIS</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/animation.css">
    <link rel="stylesheet" href="./css/overlay.css">
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #ff7601;">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="./uccLogo.png" alt="Company Logo" class="logo-img">
                    M<span>IS</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#service">Our Service</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="aboutDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">About Us</a>
                            <ul class="dropdown-menu" aria-labelledby="aboutDropdown">
                                <li><a class="dropdown-item" href="#about">MIS</a></li>
                                <li><a class="dropdown-item" href="./Chart.php">Chart</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="carousel-caption">
                    <h5 class="animated fadeInDown"><span>Competitive</span></h5>
                    <p class="animated fadeInUp">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam recusandae porro eum laudantium repellat quod fugiat voluptas itaque, architecto quaerat hic. Sed, saepe dicta excepturi fuga velit id modi facere!</p>
                </div>
            </div>
            <div class="carousel-item">
                <div class="carousel-caption">
                    <h5 class="animated fadeInDown">Team <span>Support</span></h5>
                    <p class="animated fadeInUp">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam recusandae porro eum laudantium repellat quod fugiat voluptas itaque, architecto quaerat hic. Sed, saepe dicta excepturi fuga velit id modi facere!</p>
                </div>
            </div>
            <div class="carousel-item">
                <div class="carousel-caption">
                    <h5 class="animated fadeInDown"><span>Services</span></h5>
                    <p class="animated fadeInUp">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam recusandae porro eum laudantium repellat quod fugiat voluptas itaque, architecto quaerat hic. Sed, saepe dicta excepturi fuga velit id modi facere!</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>




    <!-- Our Services -->
    <div class="service section-padding" id="service">
        <div class="container" >
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-header text-center animate-on-scroll">
                        <h2 class="animated fadeInDown">Our <span>Services</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-services text-center animate-on-scroll">
                        <i class="bi bi-person-fill"></i>
                        <h2>Service Staff</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi aut nulla ab velit, explicabo exercitationem!</p>
                        <div class="col">
                            <button type="button" id="openFormBtnService" class="btn btn-light  me-4">PROFESSOR</button>
                        </div>
                    </div>
                </div>



                <!-- Overlay form Request for Professor -->
                <div class="overlay-form" id="overlayFormService">
                    <div class="form-container">
                        <button class="close-icon" id="closeFormBtnService"><span>&#10006;</span> </button><!-- Close icon -->
                        <div class="form-logo">
                            <img src="./uccLogo.png" alt="Company Logo" class="logo-imig">
                            <h2> MIS Service Request Form</h2>
                        </div>
                        <form>
                            <div class="mb-1 form-group">
                                <label for="dateTime">Date and Time:</label>
                                <input type="datetime-local" class="form-control" id="dateTime" name="dateTime" required>
                            </div>
                            <div class="mb-1 form-group">
                                <label for="department">Department:</label>
                                <input type="text" class="form-control" id="department" name="department" required>
                            </div>
                            <div class="mb-1 form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-1 form-group">
                                <label for="name">Details:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-1 form-group">
                                <label for="requestedItem">Action Taken:</label>
                                <input type="text" class="form-control" id="requestedItem" name="requestedItem" required>
                            </div>
                            <div class="mb-1 form-group">
                                <label for="purpose">Recomendation</label>
                                <textarea class="form-control" id="purpose" name="purpose" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-services text-center animate-on-scroll">
                        <i class="bi bi-person-fill-gear"></i>
                        <h2>Equipment</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi aut nulla ab velit, explicabo exercitationem!</p>
                        <div class="column">
                            <button type="button" id="openFormBtnProfessor" class="btn btn-light  me-4">PROFESSOR</button>
                            <button type="button" id="openFormBtnStudent" class="btn btn-light ">STUDENT</button>
                        </div>
                    </div>
                </div>
                <!-- Overlay form MIS Equiment  for Professor-->
                <div class="overlay-form" id="overlayFormProfessor">
                    <div class="form-container">
                        <button class="close-icon" id="closeFormBtnProfessor"><span>&#10006;</span> </button><!-- Close icon -->
                        <div class="form-logo">
                            <img src="./uccLogo.png" alt="Company Logo" class="logo-imig">
                            <h2> MIS Equiment Request Form</h2>
                        </div>
                        <form>
                            <div class="mb-2 form-group">
                                <label for="department">Department:</label>
                                <input type="text" class="form-control" id="department" name="department" required>
                            </div>
                            <div class="mb-2 form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-2 form-group">
                                <label for="requestedItem">Requested Item:</label>
                                <input type="text" class="form-control" id="requestedItem" name="requestedItem" required>
                            </div>
                            <div class="mb-2 form-group">
                                <label for="purpose">Purpose:</label>
                                <textarea class="form-control" id="purpose" name="purpose" rows="3" required></textarea>
                            </div>
                            <h2>Borrowed</h2>
                            <div class="mb-2 form-group">
                                <label for="dateTime">Date and Time:</label>
                                <input type="datetime-local" class="form-control" id="dateTime" name="dateTime" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

                <!-- Overlay form Equipment for student-->
                <div class="overlay-form" id="overlayFormStudent">
                    <div class="form-container">
                        <button class="close-icon" id="closeFormBtnStudent"><span>&#10006;</span> </button><!-- Close icon -->
                        <div class="form-logo">
                            <img src="./uccLogo.png" alt="Company Logo" class="logo-imig">
                            <h2> MIS Equiment Request Form</h2>
                        </div>
                        <form>
                            <div class="mb-1 form-group">
                                <label for="department">Department:</label>
                                <input type="text" class="form-control" id="department" name="department" required>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-1 form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="col-md-6 mb-1 form-group">
                                    <label for="studentID">Student Number:</label>
                                    <input type="text" class="form-control" id="studentID" name="studentID" required>
                                </div>
                            </div>
                            <div class="mb-1 form-group">
                                <label for="requestedItem">Requested Item:</label>
                                <input type="text" class="form-control" id="requestedItem" name="requestedItem" required>
                            </div>
                            <div class="mb-1 form-group">
                                <label for="purpose">Purpose:</label>
                                <textarea class="form-control" id="purpose" name="purpose" rows="3" required></textarea>
                            </div>
                            <h2>Borrowed</h2>
                            <div class="mb-1 form-group">
                                <label for="dateTime">Date/Time:</label>
                                <input type="datetime-local" class="form-control" id="dateTime" name="dateTime" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>



                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-services text-center animate-on-scroll">
                        <i class="bi bi-person-hearts"></i>
                        <h2>Feedback</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi aut nulla ab velit, explicabo exercitationem!</p>
                        <div class="column">
                            <button type="button"  id="openFormBtnFeedback" class="btn btn-light">PROFESSOR</button>
                        </div>
                    </div>
                    <!-- Overlay form Request for feedback -->
                <div class="overlay-form" id="overlayFormFeedback">
                    <div class="form-container">
                        <button class="close-icon" id="closeFormBtnFeedback"><span>&#10006;</span> </button><!-- Close icon -->
                        <div class="form-logo">
                            <img src="./uccLogo.png" alt="Company Logo" class="logo-imig">
                            <h2> MIS Feedback Form</h2>
                        </div>
                        <form>
                            <div class="mb-1 form-group">
                                <label for="dateTime">Date and Time:</label>
                                <input type="datetime-local" class="form-control" id="dateTime" name="dateTime" required>
                            </div>
                            <div class="mb-1 form-group">
                                <label for="department">Department:</label>
                                <input type="text" class="form-control" id="department" name="department" required>
                            </div>
                            <div class="mb-1 form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-1 form-group">
                                <label for="name"> FeedBack Details:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-1 form-group">
                                <label for="requestedItem">Action Taken:</label>
                                <input type="text" class="form-control" id="requestedItem" name="requestedItem" required>
                            </div>
                            <div class="mb-1 form-group">
                                <label for="purpose">Recomendation</label>
                                <textarea class="form-control" id="purpose" name="purpose" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

    <!-- about Us-->

    <div class="about-area section-padding" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="img-area animate-on-scroll">
                        <img src="./nature.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="about-text animate-on-scroll">
                        <h2>We Are <span>Trusted</span> Support Staff</h2>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                            Magnam deleniti minima consequuntur facilis, eos saepe quas quia reiciendis quis quam odit
                            repudiandae dolorem aperiam laboriosam nihil maxime eligendi molestiae. Iusto!</p>
                        <a href="#contact" class="btn"> Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact-->
    <div class="contact-area section-padding" id="contact">
        <div class="container1">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Message <span>Us</span></h3>
                            <form>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Your Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter your name">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Your Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter your email">
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" id="message" rows="5" placeholder="Enter your message"></textarea>
                                </div>
                                <button type="submit" class="btn1">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="footer-left">
                        <h4>UNIVERSITY OF CALOOCAN CITY</h4>
                        <p>Biglang Awa Street<br>Cor 11th Ave Catleya, Caloocan<br>1400 Metro Manila, Philippines</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="footer-right">
                        <h5>Contact Information</h5>
                        <p>Phone: +632-3106581 / +632-3106855
                            <br>
                            Email: MIS@ucc-caloocan.edu.ph
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="./js/json.js"></script>


</body>


</html>