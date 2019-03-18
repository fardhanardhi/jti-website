<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>JTI Website</title>

  <?php
    include "config/styles.php";
  ?>
</head>

<body>
  <!-- navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-blue shadow-sm">
    <i class="burger-icon text-white fas fa-bars"></i>
    <a class="navbar-brand" href="#"><b>JTI Website</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
      aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <!-- memberi space ditengah navbar -->
      <div class="mr-auto"></div>
      <i class="notification-icon text-white far fa-bell">

        <!-- bagian notification bubble -->
        <span class="fas fa-circle notification-bubble"></span>
        <span class="notification-bubble-num">10</span>

      </i>
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

  <!-- konten -->
  <div class="container-fluid">
    <main role="main" class="container">
      <div class="row">
        <div class="col-md-12 p-0">
          <div class="m-2 bg-white shadow-sm rounded">
            <nav class="nav nav-underline">
              <span class="nav-link">KARTU HASIL STUDI</span>
            </nav>
          </div>
        </div>

        <div class="col-md-12 p-0">
          <div class="m-2 p-3 bg-white rounded shadow-sm">
            <h6 class="border-bottom border-gray pb-2 mb-0">Recent updates</h6>
            <div class="media text-muted pt-3">
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
        </div>

        <div class="col-md-3 p-0">
          <div class="m-2 p-3 bg-white rounded shadow-sm">
            <h6 class="border-bottom border-gray pb-2 mb-0">Suggestions</h6>
            <div class="media text-muted pt-3">
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
        </div>

        <div class="col-md-9 p-0">
          <div class="m-2 p-3 bg-white rounded shadow-sm">
            <h6 class="border-bottom border-gray pb-2 mb-0">Suggestions</h6>
            <div class="media text-muted pt-3">
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
        </div>

        <div class="col-md-3 p-0">
          <div class="m-2 p-3 bg-white rounded shadow-sm">
            <h6 class="border-bottom border-gray pb-2 mb-0">Suggestions</h6>
            <div class="media text-muted pt-3">
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
        </div>

        <div class="col-md-6 p-0">
          <div class="m-2 p-3 bg-white rounded shadow-sm">
            <h6 class="border-bottom border-gray pb-2 mb-0">Suggestions</h6>
            <div class="media text-muted pt-3">
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
        </div>

        <div class="col-md-3 p-0">
          <div class="m-2 p-3 bg-white rounded shadow-sm">
            <h6 class="border-bottom border-gray pb-2 mb-0">Suggestions</h6>
            <div class="media text-muted pt-3">
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
        </div>



      </div>

    </main>
  </div>

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