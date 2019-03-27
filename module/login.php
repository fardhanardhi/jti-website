<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Masuk - JTI Website</title>

  <?php
    include '../config/styles.php';
  ?>
</head>

<body>
  <div class="fullscreen d-flex flex-column justify-content-center align-items-center">
    <h1 style="font-weight: 800; color: #40407A;">MASUK</h1>
    <div class="row mt-3 w-100">
      <div class="col-md-3"></div>
      <div class="col-md-6 p-4 shadow-sm bg-white rounded">
        <div class="row">
          <div class="col-md-3 p-3 pt-5 pb-5 d-flex justify-content-center align-items-center border-right">
            <img src="../img/logo-jti.png" alt="Logo JTI" style="width:100%">
          </div>
          <!-- form begin -->
          <form action="../process/loginProcess.php" method="post" class="col-md-9 pt-5 pb-5 d-flex flex-column justify-content-center align-items-center">
            <div class="row w-100 mb-3">
              <label class="col-md-3" for="username">Username</label>
              <div class="input-group col-md-9">
                <input type="text" class="form-control shadow-none" name="username" id="username" placeholder="Username">
              </div>
            </div>
            <div class="row w-100 mb-3">
              <label class="col-md-3" for="password">Password</label>
              <div class="input-group col-md-9">
                <input type="password" class="form-control border-right-0 shadow-none" name="password" id="password" placeholder="Password">
                <div class="input-group-append">
                  <span class="far fa-eye form-control rounded-right" id="eye" onclick="showPassword()"></span>
                </div>
              </div>
            </div>
            <a href="" data-toggle="modal" data-target="#modelId" class="align-self-start px-3 text-dark">Lupa Password?</a>
            <!-- error handling -->
            <?php
              if(isset($_GET["error"])) {
                $error = $_GET["error"];
            ?>
            <small class="rounded border border-danger text-danger align-self-start p-1 ml-3 mt-3" id="error-handling">
            <?php
                  echo $error;
              }
            ?>
            </small>
            <input type="submit" name="submit" class="btn btn-success align-self-end shadow-none mr-3" value="Masuk">
          </form>
          <!-- end form -->

          <!-- button hak akses -->
          <form action="../process/loginProcess.php" method="post">
            <input type="submit" name="dosen" class="btn btn-primary align-self-end shadow-none mr-3" value="Dosen">
            <input type="submit" name="mahasiswa" class="btn btn-secondary align-self-end shadow-none mr-3" value="Mahasiswa">
          </form>
          <!-- end button -->
          
        </div>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>

  <!-- Modal lupa password -->
  <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-center">
          <h5 class="modal-title">Lupa Password</h5>
        </div>
        <div class="modal-body pb-0">
          <ol>
            <li>Temui admin di ruang administrasi atau hubungi admin lewat HP(085442785023)</li>
            <li>Tanyakan password untuk akun anda kepada admin</li>
            <li>Tunggu sampai admin memberikan password anda lalu login</li>
            <li>Jika ingin mengganti password, pilih opsi Ganti Password pada setting akun anda</li>
          </ol>
        </div>
        <div class="align-self-end p-3">
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>

  <script src="../js/script.js"></script>

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