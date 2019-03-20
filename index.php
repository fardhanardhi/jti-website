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
  <!-- navigation -->
  <div id="navigation" class="container-fluid h-100">
    <a class="btn btn-primary">oke</a>
  </div>


  <!-- navbar -->
  <nav class="app-navbar navbar navbar-expand-md navbar-dark bg-blue shadow-sm sticky-top">
    <a class="ml-5 mr-5" id="navigation-btn"> <i class="fas fa-bars text-white burger-icon"></i></a>
    <a class="navbar-brand " href="#"><b>JTI Website</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
      aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <!-- memberi space ditengah navbar -->
      <div class="mx-auto"></div>
      <i class="notification-icon text-white far fa-bell">

        <!-- bagian notification bubble -->
        <span class="fas fa-circle notification-bubble"></span>
        <span class="notification-bubble-num">10</span>
      </i>

      <div class="dropdown mr-5">
        <img class="dropdown-toggle nav-profile-photo ml-4 " src="attachment/img/avatar.jpeg" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
        <a href="#" class="dropdown-toggle ml-2 profile-link" id="dropdownMenuButton" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Avatar <b class="caret"></b></a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
          <b class="caret d-none d-lg-block d-xl-block"></b>
          <a class="dropdown-item" href="#">Ganti Password</a>
          <hr class="hr-light m-0">
          <a class="dropdown-item" href="#">Log Out</a>
        </div>
      </div>
    </div>
  </nav>



  <!-- konten -->
  <div class="container-fluid">
    <main role="main" class="container-fluid px-5">
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

        <div class="col-md-3 p-0 ">
          <div class="sticky-sidebar sticky-top">
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
                <div class="isi">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, rerum. Animi nihil eveniet
                  reprehenderit obcaecati, perferendis, numquam dicta itaque accusantium fugit labore ullam pariatur
                  consectetur eum recusandae sapiente quam omnis.
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum temporibus tempora vel. Dolore veniam
                  totam possimus quam. Voluptates pariatur alias ea laborum libero, aperiam rerum nisi amet, soluta sunt
                  assumenda?
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam asperiores atque perferendis porro
                  sint maiores maxime sapiente optio totam sunt eveniet distinctio, odit rem quam, qui ratione aliquid
                  fugiat facere!
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, animi asperiores, fugiat molestias
                  impedit ipsa laborum obcaecati fugit delectus odio ad provident at officiis quam recusandae quis
                  debitis error omnis.
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae inventore sint distinctio
                  dignissimos nesciunt alias earum pariatur aliquam odit, eveniet corrupti doloremque exercitationem qui
                  est quia culpa placeat minus laborum!
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Enim eaque odit quas officiis repudiandae,
                  minima aperiam maxime, facere, aut facilis reprehenderit dignissimos voluptates aspernatur nihil
                  tempora possimus earum dicta officia.
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci id recusandae consequuntur!
                  Voluptatem cupiditate distinctio itaque laboriosam iure nemo aspernatur earum sit sequi amet
                  consectetur, doloremque non sed, quisquam molestias.
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit. Esse amet error vitae ratione quas dolores
                  molestiae laborum sapiente necessitatibus, rerum incidunt sit officiis odio ea omnis qui porro quam
                  adipisci?
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, rerum. Animi nihil eveniet
                  reprehenderit obcaecati, perferendis, numquam dicta itaque accusantium fugit labore ullam pariatur
                  consectetur eum recusandae sapiente quam omnis.
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum temporibus tempora vel. Dolore veniam
                  totam possimus quam. Voluptates pariatur alias ea laborum libero, aperiam rerum nisi amet, soluta sunt
                  assumenda?
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam asperiores atque perferendis porro
                  sint maiores maxime sapiente optio totam sunt eveniet distinctio, odit rem quam, qui ratione aliquid
                  fugiat facere!
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, animi asperiores, fugiat molestias
                  impedit ipsa laborum obcaecati fugit delectus odio ad provident at officiis quam recusandae quis
                  debitis error omnis.
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae inventore sint distinctio
                  dignissimos nesciunt alias earum pariatur aliquam odit, eveniet corrupti doloremque exercitationem qui
                  est quia culpa placeat minus laborum!
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Enim eaque odit quas officiis repudiandae,
                  minima aperiam maxime, facere, aut facilis reprehenderit dignissimos voluptates aspernatur nihil
                  tempora possimus earum dicta officia.
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci id recusandae consequuntur!
                  Voluptatem cupiditate distinctio itaque laboriosam iure nemo aspernatur earum sit sequi amet
                  consectetur, doloremque non sed, quisquam molestias.
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit. Esse amet error vitae ratione quas dolores
                  molestiae laborum sapiente necessitatibus, rerum incidunt sit officiis odio ea omnis qui porro quam
                  adipisci?
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, rerum. Animi nihil eveniet
                  reprehenderit obcaecati, perferendis, numquam dicta itaque accusantium fugit labore ullam pariatur
                  consectetur eum recusandae sapiente quam omnis.
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum temporibus tempora vel. Dolore veniam
                  totam possimus quam. Voluptates pariatur alias ea laborum libero, aperiam rerum nisi amet, soluta sunt
                  assumenda?
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam asperiores atque perferendis porro
                  sint maiores maxime sapiente optio totam sunt eveniet distinctio, odit rem quam, qui ratione aliquid
                  fugiat facere!
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, animi asperiores, fugiat molestias
                  impedit ipsa laborum obcaecati fugit delectus odio ad provident at officiis quam recusandae quis
                  debitis error omnis.
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae inventore sint distinctio
                  dignissimos nesciunt alias earum pariatur aliquam odit, eveniet corrupti doloremque exercitationem qui
                  est quia culpa placeat minus laborum!
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Enim eaque odit quas officiis repudiandae,
                  minima aperiam maxime, facere, aut facilis reprehenderit dignissimos voluptates aspernatur nihil
                  tempora possimus earum dicta officia.
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci id recusandae consequuntur!
                  Voluptatem cupiditate distinctio itaque laboriosam iure nemo aspernatur earum sit sequi amet
                  consectetur, doloremque non sed, quisquam molestias.
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit. Esse amet error vitae ratione quas dolores
                  molestiae laborum sapiente necessitatibus, rerum incidunt sit officiis odio ea omnis qui porro quam
                  adipisci?
                </div>
              </div>
            </div>
            <small class="d-block text-right mt-3">
              <a href="#">All suggestions</a>
            </small>
          </div>
        </div>

        <div class="col-md-3 p-0">
          <div class="sticky-sidebar sticky-top">
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

        <div class="circle">
          <i class="fas fa-comment-alt"></i>
        </div>
            
        

      </div>

    </main>
  </div>

  <!-- jquery -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

  <!-- popper -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>

  <!-- bootstrap -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>

  <script src="js/script.js"></script>
</body>

</html>