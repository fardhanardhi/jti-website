<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>JTI Website</title>

  <link rel="stylesheet" href="css/style.css">

  <!-- bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- fonts -->
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">

  <!-- icons -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-purple shadow-sm">
    <i class="burger-icon text-white fas fa-bars"></i>
    <a class="navbar-brand" href="#"><b>JTI Website</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
      aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <!-- memberi space ditengah navbar -->
      <div class="mr-auto"></div>
      <!-- <form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
      </form> -->
      <i class="notification-icon text-white far fa-bell"></i>
      <img class="nav-profile-photo ml-4" src="attachment/img/avatar.jpeg">
      <div class="dropdown">
        <a href="#" class="dropdown-toggle ml-2 profile-link" id="dropdownMenuButton" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Avatar <b class="caret"></b></a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="#">Ganti Password</a>
          <a class="dropdown-item" href="#">Log Out</a>
        </div>
      </div>
    </div>
  </nav>

  <main role="main" class="container">

    <div class="bg-white shadow-sm">
      <nav class="nav nav-underline">
        <span class="nav-link">KARTU HASIL STUDI</span>
      </nav>
    </div>

  </main>

  <main role="main" class="container">
    <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
      <img class="mr-3" src="https://getbootstrap.com/docs/4.3/assets/brand/bootstrap-outline.svg" alt="" width="48"
        height="48">
      <div class="lh-100">
        <h6 class="mb-0 text-white lh-100">Bootstrap</h6>
        <small>Since 2011</small>
      </div>
    </div>

    <div class="my-3 p-3 bg-white rounded shadow-sm">
      <h6 class="border-bottom border-gray pb-2 mb-0">Recent updates</h6>
      <div class="media text-muted pt-3">
        <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg"
          preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32">
          <title>Placeholder</title>
          <rect width="100%" height="100%" fill="#007bff" /><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text>
        </svg>
        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
          <strong class="d-block text-gray-dark">@username</strong>
          Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris
          condimentum nibh, ut fermentum massa justo sit amet risus.
        </p>
      </div>
      <div class="media text-muted pt-3">
        <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg"
          preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32">
          <title>Placeholder</title>
          <rect width="100%" height="100%" fill="#e83e8c" /><text x="50%" y="50%" fill="#e83e8c" dy=".3em">32x32</text>
        </svg>
        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
          <strong class="d-block text-gray-dark">@username</strong>
          Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris
          condimentum nibh, ut fermentum massa justo sit amet risus.
        </p>
      </div>
      <div class="media text-muted pt-3">
        <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg"
          preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32">
          <title>Placeholder</title>
          <rect width="100%" height="100%" fill="#6f42c1" /><text x="50%" y="50%" fill="#6f42c1" dy=".3em">32x32</text>
        </svg>
        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
          <strong class="d-block text-gray-dark">@username</strong>
          Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris
          condimentum nibh, ut fermentum massa justo sit amet risus.
        </p>
      </div>
      <small class="d-block text-right mt-3">
        <a href="#">All updates</a>
      </small>
    </div>

    <div class="my-3 p-3 bg-white rounded shadow-sm">
      <h6 class="border-bottom border-gray pb-2 mb-0">Suggestions</h6>
      <div class="media text-muted pt-3">
        <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg"
          preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32">
          <title>Placeholder</title>
          <rect width="100%" height="100%" fill="#007bff" /><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text>
        </svg>
        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
          <div class="d-flex justify-content-between align-items-center w-100">
            <strong class="text-gray-dark">Full Name</strong>
            <a href="#">Follow</a>
          </div>
          <span class="d-block">@username</span>
        </div>
      </div>
      <div class="media text-muted pt-3">
        <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg"
          preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32">
          <title>Placeholder</title>
          <rect width="100%" height="100%" fill="#007bff" /><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text>
        </svg>
        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
          <div class="d-flex justify-content-between align-items-center w-100">
            <strong class="text-gray-dark">Full Name</strong>
            <a href="#">Follow</a>
          </div>
          <span class="d-block">@username</span>
        </div>
      </div>
      <div class="media text-muted pt-3">
        <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg"
          preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32">
          <title>Placeholder</title>
          <rect width="100%" height="100%" fill="#007bff" /><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text>
        </svg>
        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
          <div class="d-flex justify-content-between align-items-center w-100">
            <strong class="text-gray-dark">Full Name</strong>
            <a href="#">Follow</a>
          </div>
          <span class="d-block">@username</span>
        </div>
      </div>
      <small class="d-block text-right mt-3">
        <a href="#">All suggestions</a>
      </small>
    </div>
  </main>

  <script src="js/script.js"></script>

  <!-- jquery -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>

  <!-- popper -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>

  <!-- bootstrap -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>

</body>

</html>