<?php
    session_start();

    include "dbconfig.php";

    if(isset($_GET['logout'])) {
        session_destroy();
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>music Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/base.css" />
</head>
<body>
    <header id="header-1">
        <a href="./legal/privacy.html">Privacy Policy</a>
        <a href="./legal/tnc.html">Terms and Conditions</a>
        
        <?php if(!isset($_SESSION['userid'])) { ?>
        
        <div id="dropdown">
            <button id="dropdown-btn">LOGIN</button>
            <div id="dropdown-content">
                <a href="./auth/login.php">Login into existing account</a>
                <a href="./auth/register.php">Create a new account</a>
            </div>
        </div>

        <?php } else { ?>

        <div id="dropdown">
            <button id="dropdown-btn"><?php echo $_SESSION['username'] ?></button>
            <div id="dropdown-content">
                <a href="./auth/profile.php">User profile</a>
                <a href="./auth/changepwd.php">Change password</a>
                <a href="./index.php?logout=true">Logout</a>
            </div>
        </div>

        <?php } ?>

    </header>
    <header id="header-2">
        <section id="branding">
            <img src="./assets/images/logo.gif" />
            <h1>MUSIC HUB</h1>
            <span>One stop shop for all your musical needs</span>
        </section>
        <section id="search">
            <form method="get" action="./search.html">
                <input type="text" placeholder="Search songs, artists and more..." />
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </section>
    </header>
    <nav>
        <li><a href="./index.html">Home</a></li>
        <li><a href="./hits.html">Top Hits</a></li>
        <li><a href="./recent.html?">Recently Added</a></li>
        <li><a href="./favs.html">Favourites</a></li>
        <li><a href="./playlists.html">Playlists</a></li>
        <li><a href="./about.html">About Us</a></li>
    </nav>
    <main>
        <section id="hero">
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="https://s3.ap-south-1.amazonaws.com/data.com.live101.in/images/home_page_component/website_banner_desktop.webp" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="https://s3.ap-south-1.amazonaws.com/data.com.live101.in/images/home_page_component/website_banner_desktop.webp" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="https://s3.ap-south-1.amazonaws.com/data.com.live101.in/images/home_page_component/website_banner_desktop.webp" class="d-block w-100" alt="...">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
        </section>
        <section id="music-list">
            <h3 class="text-center mt-5">Songs</h3>
            <div id="song-details">
                <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-5 mx-5 mt-2 mb-5">
                <?php 
                    $sql_query = "SELECT * FROM music;";
                    $result = mysqli_query($conn,$sql_query);
                    while($rows=mysqli_fetch_array($result)) {   
                ?>
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-header">
                                <img src="./assets/musicimg/<?php echo $rows['image']?>" class="card-img-top" alt="...">
                                <audio controls style="width: 100%; border-radius: none;">
                                    <source src="./assets/music/<?php echo $rows['link'] ?>" />
                                </audio>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $rows['name'] ?></h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-body-secondary">Views: <?php echo $rows['views'] ?></small>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <section id="company-info">
            <section id="branding">
                <img src="./assets/images/logo.gif" />
                <div>
                    <h1>MUSIC HUB</h1>
                    <span>One stop shop for all your musical needs</span>
                </div>
            </section>
            <span></span>
            <div id="socials">
                <a href="www.faebook.com"><icon></icon></a>
            </div>
        </section>
        <section id="site-map">
            <li><a href="./index.html">Home</a></li>
            <li><a href="./hits.html">Top Hits</a></li>
            <li><a href="./recent.html?">Recently Added</a></li>
            <li><a href="./favs.html">Favourites</a></li>
            <li><a href="./playlists.html">Playlists</a></li>
            <li><a href="./about.html">About Us</a></li>
        </section>
        <section id="legal">
            <li><a href="./legal/privacy.html">Privacy Policy</a></li>
            <li><a href="./legal/tnc.html">Terms and Conditions</a></li>
        </section>
        <section id="newsletter">
            <p></p>
            <input type="email" placeholder="Enter you email">
        </section>
    </footer>
    <hr>

    <script src="https://kit.fontawesome.com/9e2c9fd14a.js" crossorigin="anonymous"></script>
</body>
</html>