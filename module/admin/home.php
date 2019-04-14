<main role="main" class="container-fluid" id="homeAdmin">
  <div class="row">

    <!-- title -->
    <div class="col-md-12 p-0">
      <div class="m-2 bg-white shadow-sm">
        <nav class="nav nav-underline">
          <span class="nav-link">Dashboard</span>
        </nav>
      </div>
    </div>
    <!-- end title -->

    <!-- jumlah mahasiswa - dosen - kelas - ruang -->
    <div class="col-md-3 p-0">
      <div class="m-2 row shadow">
        <div class="col-md-9 p-3 rounded-left bg-white">
          <h4 class="m-0">1000</h4>
          <span class="small">Mahasiswa</span>
        </div>
        <div class="col-md-3 p-2 rounded-right bg-ungu d-flex justify-content-center align-items-center">
          <img src="../img/mahasiswa.svg" alt="">
        </div>
      </div>
    </div>

    <div class="col-md-3 p-0">
      <div class="m-2 row shadow">
        <div class="col-md-9 p-3 rounded-left bg-white">
          <h4 class="m-0">500</h4>
          <span class="small">Dosen</span>
        </div>
        <div class="col-md-3 p-2 rounded-right bg-biru d-flex justify-content-center align-items-center">
          <img src="../img/presentation.svg" alt="">
        </div>
      </div>
    </div>

    <div class="col-md-3 p-0">
      <div class="m-2 row shadow">
        <div class="col-md-9 p-3 rounded-left bg-white">
          <h4 class="m-0">56</h4>
          <span class="small">Kelas</span>
        </div>
        <div class="col-md-3 p-2 rounded-right bg-hijau d-flex justify-content-center align-items-center">
          <img src="../img/users.svg" alt="">
        </div>
      </div>
    </div>

    <div class="col-md-3 p-0">
      <div class="m-2 row shadow">
        <div class="col-md-9 p-3 rounded-left bg-white">
          <h4 class="m-0">47</h4>
          <span class="small">Ruangan</span>
        </div>
        <div class="col-md-3 p-2 rounded-right bg-pink d-flex justify-content-center align-items-center">
          <img src="../img/chair.svg" alt="">
        </div>
      </div>
    </div>
    <!-- end jumlah mahasiswa - dosen - kelas - ruang -->

    <!-- chart mahasiswa per tahun -->
    <div class="col-md-12 p-0">
      <div class="m-2 p-3 bg-white shadow rounded">
        <h6 class="border-bottom border-gray pb-2 mb-4">Total Mahasiswa per Tahun</h6>
        <canvas id="mahasiswaPerTahun" class="w-100"></canvas>
      </div>
    </div>
    <!-- end chart mahasiswa per tahun -->

    <!-- chart dosen per tahun -->
    <div class="col-md-12 p-0">
      <div class="m-2 p-3 bg-white shadow rounded">
        <h6 class="border-bottom border-gray pb-2 mb-4">Total Dosen per Tahun</h6>
        <canvas id="dosenPerTahun" class="w-100"></canvas>
      </div>
    </div>
    <!-- end chart dosen per tahun -->

    <!-- kuisioner -->
    <div class="col-md-6 p-0">
      <div class="m-2 p-3 bg-white shadow rounded">
        <h6 class="border-bottom border-gray pb-2 mb-0">Peringkat Hasil Kuisioner</h6>
        <div class="kuisioner-sp scrollbar">
          <div class="row d-flex justify-content-center align-items-center border-bottom border-gray py-2">
            <div class="col-md-1 text-center">1</div>
            <div class="col-md-2">
              <img src="../img/logo-jti.png" alt="foto dosen" style="width: 60px;" class="rounded-circle">
            </div>
            <div class="col-md-7">
              <h6 class="mb-0">Bu Atiqah</h6>
              <span class="small grey">19822931992002</span>
            </div>
            <div class="col-md-2 text-center">
              <h5 class="mb-0">150</h5>
              <span class="small grey">Poin</span>
            </div>
          </div>
          <div class="row d-flex justify-content-center align-items-center border-bottom border-gray py-2">
            <div class="col-md-1 text-center">2</div>
            <div class="col-md-2">
              <img src="../img/logo-jti.png" alt="foto dosen" style="width: 60px;" class="rounded-circle">
            </div>
            <div class="col-md-7">
              <h6 class="mb-0">Bu Atiqah</h6>
              <span class="small grey">19822931992002</span>
            </div>
            <div class="col-md-2 text-center">
              <h5 class="mb-0">140</h5>
              <span class="small grey">Poin</span>
            </div>
          </div>
          <div class="row d-flex justify-content-center align-items-center border-bottom border-gray py-2">
            <div class="col-md-1 text-center">3</div>
            <div class="col-md-2">
              <img src="../img/logo-jti.png" alt="foto dosen" style="width: 60px;" class="rounded-circle">
            </div>
            <div class="col-md-7">
              <h6 class="mb-0">Bu Atiqah</h6>
              <span class="small grey">19822931992002</span>
            </div>
            <div class="col-md-2 text-center">
              <h5 class="mb-0">130</h5>
              <span class="small grey">Poin</span>
            </div>
          </div>
          <div class="row d-flex justify-content-center align-items-center border-bottom border-gray py-2">
            <div class="col-md-1 text-center">4</div>
            <div class="col-md-2">
              <img src="../img/logo-jti.png" alt="foto dosen" style="width: 60px;" class="rounded-circle">
            </div>
            <div class="col-md-7">
              <h6 class="mb-0">Bu Atiqah</h6>
              <span class="small grey">19822931992002</span>
            </div>
            <div class="col-md-2 text-center">
              <h5 class="mb-0">100</h5>
              <span class="small grey">Poin</span>
            </div>
          </div>
          <div class="row d-flex justify-content-center align-items-center border-bottom border-gray py-2">
            <div class="col-md-1 text-center">5</div>
            <div class="col-md-2">
              <img src="../img/logo-jti.png" alt="foto dosen" style="width: 60px;" class="rounded-circle">
            </div>
            <div class="col-md-7">
              <h6 class="mb-0">Bu Atiqah</h6>
              <span class="small grey">19822931992002</span>
            </div>
            <div class="col-md-2 text-center">
              <h5 class="mb-0">90</h5>
              <span class="small grey">Poin</span>
            </div>
          </div>
          <div class="row d-flex justify-content-center align-items-center border-bottom border-gray py-2">
            <div class="col-md-1 text-center">6</div>
            <div class="col-md-2">
              <img src="../img/logo-jti.png" alt="foto dosen" style="width: 60px;" class="rounded-circle">
            </div>
            <div class="col-md-7">
              <h6 class="mb-0">Bu Atiqah</h6>
              <span class="small grey">19822931992002</span>
            </div>
            <div class="col-md-2 text-center">
              <h5 class="mb-0">50</h5>
              <span class="small grey">Poin</span>
            </div>
          </div>
          <div class="row d-flex justify-content-center align-items-center border-bottom border-gray py-2">
            <div class="col-md-1 text-center">7</div>
            <div class="col-md-2">
              <img src="../img/logo-jti.png" alt="foto dosen" style="width: 60px;" class="rounded-circle">
            </div>
            <div class="col-md-7">
              <h6 class="mb-0">Bu Atiqah</h6>
              <span class="small grey">19822931992002</span>
            </div>
            <div class="col-md-2 text-center">
              <h5 class="mb-0">30</h5>
              <span class="small grey">Poin</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end kuisioner -->

    <!-- mahasiswa sp -->
    <div class="col-md-6 p-0">
      <div class="m-2 p-3 bg-white shadow rounded">
        <h6 class="border-bottom border-gray pb-2 mb-0">Mahasiswa SP (Surat Peringatan) per Semester</h6>
        <div class="kuisioner-sp scrollbar px-2">
          <div class="row d-flex justify-content-center align-items-center border-bottom border-gray py-2">
            <div class="col-md-2">
              <img src="../img/logo-jti.png" alt="foto dosen" style="width: 60px;" class="rounded-circle">
            </div>
            <div class="col-md-8">
              <h6 class="mb-0">Veronica Dewi Ayu</h6>
              <span class="small grey">MI-2E</span>
            </div>
            <div class="col-md-2 text-center">
              <div class="px-3 rounded sp sp-3">SP 3</div>
            </div>
          </div>
          <div class="row d-flex justify-content-center align-items-center border-bottom border-gray py-2">
            <div class="col-md-2">
              <img src="../img/logo-jti.png" alt="foto dosen" style="width: 60px;" class="rounded-circle">
            </div>
            <div class="col-md-8">
              <h6 class="mb-0">Veronica Dewi Ayu</h6>
              <span class="small grey">MI-2E</span>
            </div>
            <div class="col-md-2 text-center">
              <div class="px-3 rounded sp sp-3">SP 3</div>
            </div>
          </div>
          <div class="row d-flex justify-content-center align-items-center border-bottom border-gray py-2">
            <div class="col-md-2">
              <img src="../img/logo-jti.png" alt="foto dosen" style="width: 60px;" class="rounded-circle">
            </div>
            <div class="col-md-8">
              <h6 class="mb-0">Veronica Dewi Ayu</h6>
              <span class="small grey">MI-2E</span>
            </div>
            <div class="col-md-2 text-center">
              <div class="px-3 rounded sp sp-3">SP 3</div>
            </div>
          </div>
          <div class="row d-flex justify-content-center align-items-center border-bottom border-gray py-2">
            <div class="col-md-2">
              <img src="../img/logo-jti.png" alt="foto dosen" style="width: 60px;" class="rounded-circle">
            </div>
            <div class="col-md-8">
              <h6 class="mb-0">Veronica Dewi Ayu</h6>
              <span class="small grey">MI-2E</span>
            </div>
            <div class="col-md-2 text-center">
              <div class="px-3 rounded sp sp-2">SP 2</div>
            </div>
          </div>
          <div class="row d-flex justify-content-center align-items-center border-bottom border-gray py-2">
            <div class="col-md-2">
              <img src="../img/logo-jti.png" alt="foto dosen" style="width: 60px;" class="rounded-circle">
            </div>
            <div class="col-md-8">
              <h6 class="mb-0">Veronica Dewi Ayu</h6>
              <span class="small grey">MI-2E</span>
            </div>
            <div class="col-md-2 text-center">
              <div class="px-3 rounded sp sp-2">SP 2</div>
            </div>
          </div>
          <div class="row d-flex justify-content-center align-items-center border-bottom border-gray py-2">
            <div class="col-md-2">
              <img src="../img/logo-jti.png" alt="foto dosen" style="width: 60px;" class="rounded-circle">
            </div>
            <div class="col-md-8">
              <h6 class="mb-0">Veronica Dewi Ayu</h6>
              <span class="small grey">MI-2E</span>
            </div>
            <div class="col-md-2 text-center">
              <div class="px-3 rounded sp sp-1">SP 1</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end mahasiswa sp -->

    <!-- chart berita per bulan -->
    <div class="col-md-12 p-0">
      <div class="m-2 p-3 bg-white shadow rounded">
        <h6 class="border-bottom border-gray pb-2 mb-4">Upload Berita per Bulan</h6>
        <canvas id="beritaPerBulan" class="w-100"></canvas>
      </div>
    </div>
    <!-- end chart berita per bulan -->

    <!-- chart kompen per tahun -->
    <div class="col-md-12 p-0">
      <div class="m-2 p-3 bg-white shadow rounded">
        <h6 class="border-bottom border-gray pb-2 mb-4">Total Kompen per Tahun</h6>
        <canvas id="kompenPerTahun" class="w-100"></canvas>
      </div>
    </div>
    <!-- end chart kompen per tahun -->
</div>
</main>