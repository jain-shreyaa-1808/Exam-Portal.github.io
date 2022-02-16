<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  </head>
  <body>
    <div class="head">
      <div class="logo">
        <img src="https://s3-ap-southeast-1.amazonaws.com/tv-prod/member/photo/7801039-large.jpeg" alt="logo">
        <button class="btn btn-primary" style="float:right;margin-top:35px;margin-right:50px"><a class="lgnbtn" href="login.php" style="text-decoration: none; color:white;">Login &nbsp;&nbsp;<i class="fas fa-sign-in-alt" aria-hidden="true"></i></a></button>
      </div>
      <div class="name">
        Hello Study Global
      </div>
      
    </div>

    <div class="left-cont">
      <div class="nav">
        <ul>
          <li><a href="#"><i class="fas fa-chalkboard-teacher"></i>&nbsp;&nbsp;Dashboard</a>
          </li><li><a href="#"><i class="fa fa-book-open"></i>&nbsp;&nbsp;My Courses</a>
          </li><li><a href="#"><i class="fa fa-video-camera"></i>&nbsp;&nbsp;Video Lectures</a>
          </li><li><a href="#"><i class="fas fa-user"></i>&nbsp;&nbsp;My Account</a>
          </li><li><a href="#"> <i class="fa fa-cog"></i>&nbsp;&nbsp;Settings</a></li>
        </ul>
      </div>
    </div>

    <div class="content">
      <div class="about">
        <h1>About Hello Study Global</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ullamcorper eros in orci luctus consequat. Donec porta elementum nunc, id dapibus eros tincidunt a. Vestibulum tempus egestas turpis. Ut purus ante, interdum in hendrerit non, dignissim at magna. Proin dapibus molestie volutpat. </p>
      </div>

      <div class="courses">
        <h1>Your Courses</h1>
        <span class="msg"></span>
        <div class="list">
          <ul>
            <li><a href="#">GMAT </a> <span class="complt"></span> </li>
            <li><a href="#">SAT </a><span class="complt"></span> </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="right-cont">
      <div class="rings">
        <div class="percent1">
          <svg>
            <circle cx="70" cy="70" r="70"></circle>
            <circle cx="70" cy="70" r="70"></circle>
          </svg>
          <div class="number">
            <h2>80<span>%</span></h2>
          </div>
        </div>
      </div>

      <div class="topics">
        <h3>TOPICS</h3>
      </div>
    </div>
  </body>
</html>
