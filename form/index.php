<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Websites</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
   
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>

    <style>
       .h-title{
            color: black;
            text-align: center;
            font-size: 18px;
       }
       .title{
            color: black;
            text-align: center;
            font-size: 20px;
        }
        .text{
            text-align: center;
        }
        .rounded-image {
            border-radius: 50%;
            width: 100%; 
            height: auto;
        }
    </style>
</head>
<body>
   
    <div class="m-4">
         <!-- navbar start -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a href="#home" class="navbar-brand">Demo</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="#home" class="nav-item nav-link active">Home</a>
                        <a href="#about" class="nav-item nav-link">About Us</a>
                        <a href="#service" class="nav-item nav-link">Service</a>
                        <a href="#team" class="nav-item nav-link">Our Team</a>
                        <a href="#contact" class="nav-item nav-link">Contact Us</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- navbar end -->
    </div>

    <div class="container">
        <!-- home start -->
        <div id="home" class="row p-5 my-4 bg-light">
            <div class="col-md-8">
                <div id="carouselExample" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div>
                                <h1>HELLO I AM </h1>
                                <p>Solomon Developer</p>
                                <h6>welcome to my site, change the word with solomon developer.</h6>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div>
                                <h1>HELLO I AM </h1>
                                <p>Full Stack Developer</p>
                                <h6>welcome to my site, change the word with solomon developer.</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <img src="../form/img/avatar.png" class="img-fluid" alt="Cover Image">
            </div>
        </div>
        <!-- home end -->

        <!-- about start -->
        <div id="about" class="row p-5 my-4 bg-light">
            <h2 class="title" >Who we are</h2>
            <div class="m-4">
                <p>At Sologroup, we are more than a team; we're a community of tech enthusiasts with a passion for creating digital excellence. With over 2+ years of experience, we're here to be your trusted guides in the rapidly evolving landscape of technology.</p>
                <p><strong>Experience</strong>: With over 2+ years of hands-on experience, our team brings a wealth of knowledge and expertise to every project. <br>
                <p><strong>Collaboration</strong>: We believe in working closely with our clients, understanding their goals, and ensuring a collaborative and transparent development process.</p>
                <p><strong>Comprehensive Solutions</strong>: From crafting responsive websites to designing user-friendly mobile apps, we offer a range of services to meet all your digital needs.</p>
                <p><strong>Innovation</strong>: At Sologroup, we thrive on pushing boundaries and embracing the latest in technology to deliver innovative solutions.</p></p>
            </div>
        </div>
        <!-- about end -->

        <!-- service start -->
        <div id="service" class="row p-5 my-4 bg-light">
            <div class="m-4">
                <div class="row g-3">
                <h2 class="title" >our service</h2>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <h2 class="h-title">Full Stack Web Development</h2>
                        <p>Our expert Full-Stack Web Developers are ready to bring your digital vision to life. From dynamic websites to robust web applications, we specialize in creating cutting-edge solutions tailored to your unique needs.</p>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <h2 class="h-title">Mobile App Design</h2>
                        <p>Dive into the world of mobile innovation with our user-friendly and visually stunning mobile app designs. Whether it's iOS, Android, or cross-platform development, we craft mobile experiences that captivate and engage your audience.</p>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <h2 class="h-title">ICT Support and Consultation</h2>
                        <p>Need tech assistance or advice? Our dedicated team provides comprehensive ICT support and consultation services. From troubleshooting issues to strategic planning, we ensure your systems run smoothly and efficiently.</p>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <h2 class="h-title">Responsive System Development</h2>
                        <p>We excel in crafting responsive systems that adapt seamlessly to various devices and screen sizes. Our goal is to ensure your digital presence is not only visually appealing but also functional and accessible to all users.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- service end -->

        <!-- our team start -->
        <div id="team" class="row p-5 my-4 bg-light justify-content-center">
            <h2 class="title">Our Team</h2>

            <div class="card col-md-4 mb-4">
                <img src="../form/img//Genesis.jpeg" class="card-img-top rounded-circle" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title">Solomon Mwalupani</h5>
                    <p class="card-text">
                        Solomon is a freelance web designer and developer based in Tanzania. 
                        He is specialized in PHP, JAVA, HTML5, CSS3, JavaScript, Bootstrap, etc.
                    </p>
                    <a href="https://solo.co.tz/" class="btn btn-primary">View Profile</a>
                </div>
            </div>

            <div class="card col-md-4 mb-4">
                <img src="../form/img/person avatar.jpg" class="card-img-top rounded-circle" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title">Solomon Mwalupani</h5>
                    <p class="card-text">
                        Solomon is a freelance web designer and developer based in Tanzania.
                        He is specialized in PHP, JAVA, HTML5, CSS3, JavaScript, Bootstrap, etc.
                    </p>
                    <a href="https://sologroup.solo.co.tz/" class="btn btn-primary">View Profile</a>
                </div>
            </div>

            <div class="card col-md-4 mb-4">
                <img src="../form/img/person avatar.jpg" class="card-img-top rounded-circle" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title">Solomon Mwalupani</h5>
                    <p class="card-text">
                        Solomon is a freelance web designer and developer based in Tanzania.
                        He is specialized in PHP, JAVA, HTML5, CSS3, JavaScript, Bootstrap, etc.
                    </p>
                    <a href="https://github.com/solomoni12/" class="btn btn-primary">View Profile</a>
                </div>
            </div>
        </div>

        <!-- our team end -->

        <!-- contact start -->
        <div id="contact" class="row p-5 my-4 bg-light">
            <div class="m-4">
                <h2 class="title" >Contact us</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="iname" placeholder="Your name" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail" placeholder="Your email" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="Gender" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10">
                            <select name="sex" id="sex" class="form-control" required>
                            <option value="male">Select gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="message" class="col-sm-2 col-form-label">Message</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control" id="message" placeholder="Your message" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- contact end -->

        <hr>

        <!-- footer start -->
        <footer>
            <div class="row">
                <div class="col-md-6">
                    <p>Copyright © 2024 Demo</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="#" class="text-dark">Terms of Use</a>
                    <span class="text-muted mx-2">|</span>
                    <a href="#" class="text-dark">Privacy Policy</a>
                </div>
            </div>
        </footer>
        <!-- footer end -->
    </div>

</body>
</html>