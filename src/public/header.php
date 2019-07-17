<!--
  Bhumi - Creatives Platform
  Navigation Bar for General User
  Dependencies: luxbar
-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<header>
   <!-- <input type="checkbox" class="luxbar-checkbox" id="luxbar-checkbox"/>
    <div class="luxbar-menu luxbar-menu-right luxbar-menu-dark">
        <ul class="luxbar-navigation">
          <li class="luxbar-header">
              <a href="#" class="luxbar-brand"><img src="../../assets/img/logo.png" style="width: 40%; height: 40%" alt="Bhumi Logo"></a> <label class="luxbar-hamburger luxbar-hamburger-doublespin" id="luxbar-hamburger" for="luxbar-checkbox">
            <li class="luxbar-item"><a href="projects.php">Home</a></li>
            <li class="luxbar-item">
                <a>
                    <form action='filtered.php' method='post'>
                        <input type='text' name='filter' placeholder='Filter by tags' required/>
                        <input type='submit' value='Filter' class="small button" style="color:#000;"/>
                    </form>
                </a>
            </li>

            <li class="luxbar-item"><a href="uploading.php">Upload</a></li>
            <li class="luxbar-item"><a href="notification.php">Notifications </a></li>
            <li class="luxbar-item"><a href="myAccount.php">My Account</a></li>
            <li class="luxbar-item"><a href="../common/logout.php">Logout</a></li>
        </ul>
    </div>
    -->


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#"><img src="../../assets/img/logo.png" style="width: 40%; height: auto" alt="Bhumi Logo"></a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
      
      <li class="nav-item ">
        <a class="nav-link" href="projects.php">Home</a>
      </li>
      <form class="form-inline my-2 my-lg-0" action='filtered.php' method='post'>
      <input class="form-control mr-sm-2" type="text" name='filter' placeholder="Filter by tags" aria-label="Search" required>
      <button class="btn btn-outline-success my-2 my-sm-0" value='Filter' type="submit">Search</button>
    </form>
      <li class="nav-item">
        <a class="nav-link" href="uploading.php">Upload</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="notification.php">Notifications</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="myAccount.php">My Account</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../common/logout.php">Logout</a>
      </li>

    </ul>
    
  </div>
</nav>

</header>