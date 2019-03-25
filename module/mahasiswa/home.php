<main role="main" class="container-fluid">
  <div class="row">
    <div class="col-md-3 p-0 ">
      <div class="sticky-sidebar sticky-top">
        <div class="m-2 p-3 bg-white rounded shadow-sm">
          <h5><strong>Pencarian Berita</strong></h5>
          <!-- datepicker -->
          <div id="datepicker" class="pb-3 border-bottom border-gray">
          </div>
          <!-- datepicker hidden input -->
          <input type="hidden" id="my_hidden_input">
          <div class="search-null text-center">
            <img src="../img/magnifier.svg" alt="Search Not Found" class="p-3">
            <p>Tidak ada berita pada tanggal "22 Maret 2019"</p>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6 p-0 pb-3">
      <div class="m-2 p-3 mb-3 bg-white rounded shadow-sm px-4">
        <h5 class="border-bottom border-gray pb-2 mb-3"><strong>Kuisioner</strong></h5>
        <div class="isi-mhs small lh-125 mb-2">
          note : Apabila tidak mengisi kuisioner maka akan mendapat sanksi berupa aplha 1(satu) jam setiap mata kuliah
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="check-modal btn" data-toggle="modal" data-target="#modelId">Isi Kuisioner</button>

        <!-- Modal -->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Kuisioner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="container-fluid">
                  Add rows here
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
              </div>
            </div>
          </div>
        </div>

        <script>
        $('#exampleModal').on('show.bs.modal', event => {
          var button = $(event.relatedTarget);
          var modal = $(this);
          // Use above variables to manipulate the DOM

        });
        </script>
      </div>
      <div class="m-2 p-3 mb-3 bg-white rounded shadow-sm px-4">
        <div class="border-bottom border-gray">
          <div class="row">
            <div class="col-sm-8">
              <div class="judul">
                <h5><strong>5 Dosen dikirim ke Jepang</strong></h5>
                <p>6 Maret 2019</p>
              </div>
            </div>
            <div class="col-sm-4 mt-2 text-right">
              <span class="kategori-label badge badge-secondary px-3 py-2">Berita</span>
            </div>
          </div>
        </div>
        <div class="media text-muted pt-3">
          <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <div class="isi-mhs">
              Dikarenakan dosen bernama : <br>
              - Pak Yan <br>
              - Pak Rosa <br>
              - Pak Vipkas <br>
              sedang di tugaskan ke jepang maka kelas yang diajar oleh dosen-dosen tersebut diharap segera menghubungi
              untuk meminta tugas. <br><br>
              Terima Kasih...
            </div>
          </div>
        </div>
        <div class="form-group border-bottom border-gray">
          <textarea class="form-control border-0" name="" id="" rows="auto" placeholder="Tulis Komentar..."></textarea>
        </div>
        <div class="media-body pb-3 mb-0 small lh-125">
          <div class="isi-mhs">
            <strong>Pak_Yan123</strong> <span class="komen">Mantappp minn ...</span> <br>
            <strong>Veronica_imoet</strong> <span class="komen">Lanjutkan min!!!</span> <br>
            <strong>Sabyan_Lovers</strong> <span class="komen">Terima Kasih</span> <br>
          </div>
        </div>
      </div>
      <div class="m-2 p-3 bg-white rounded shadow-sm px-4">
        <div class="border-bottom border-gray">
          <div class="row">
            <div class="col-sm-8">
              <div class="judul">
                <h5><strong>5 Dosen dikirim ke Jepang</strong></h5>
                <p>6 Maret 2019</p>
              </div>
            </div>
            <div class="col-sm-4 mt-2 text-right">
              <span class="kategori-label badge badge-secondary px-3 py-2">Pengumuman</span>
            </div>
          </div>
        </div>
        <div class="media text-muted pt-3">
          <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <div class="isi-mhs">
              Dikarenakan dosen bernama : <br>
              - Pak Yan <br>
              - Pak Rosa <br>
              - Pak Vipkas <br>
              sedang di tugaskan ke jepang maka kelas yang diajar oleh dosen-dosen tersebut diharap segera menghubungi
              untuk meminta tugas. <br><br>
              Terima Kasih...
            </div>
          </div>
        </div>
        <div class="form-group border-bottom border-gray">
          <textarea class="form-control border-0" name="" id="" rows="auto" placeholder="Tulis Komentar..."></textarea>
        </div>
        <div class="media-body pb-3 mb-0 small lh-125">
          <div class="isi-mhs">
            <strong>Pak_Yan123</strong> <span class="komen">Mantappp minn ...</span> <br>
            <strong>Veronica_imoet</strong> <span class="komen">Lanjutkan min!!!</span> <br>
            <strong>Sabyan_Lovers</strong> <span class="komen">Terima Kasih</span> <br>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-3 p-0">
      <div class="sticky-sidebar sticky-top">
        <div class="m-2 p-3 bg-white rounded shadow-sm">
          <div class="beasiswa pb-3 mb-0 border-bottom border-dark">
            <h5 class="text-center"><strong>Info Beasiswa</strong></h5>
            <h6><strong>Beasiswa Astra</strong></h6>
            <p class="isi-beasiswa">PT Astra Internasional, Tbk memiliki 2 beasiswa kuliah S1 yang diberikan untuk kamu.
              Pertama adalah Beasiswa Astra 1st yang diberikan pada mahasiswa yang berkuliah di Pulau Jawa dan
              diutamakan dari jurusan Teknik, Ekonomi, Psikologi, IT, dan Statistik yang berada di semester 2,4, atau 6.
            </p>
            <small class="d-block text-right mt-3 ">
              <button class="check btn"><a href="#">Cek Link</a></button>
            </small>
          </div>
          <div class="beasiswa pt-3 pb-3 mb-0 border-bottom border-dark">
            <h6><strong>Beasiswa Astra</strong></h6>
            <p class="isi-beasiswa">PT Astra Internasional, Tbk memiliki 2 beasiswa kuliah S1 yang diberikan untuk kamu.
              Pertama adalah Beasiswa Astra 1st yang diberikan.</p>
            <small class="d-block text-right mt-3 ">
              <button class="check btn"><a href="#">Cek Link</a></button>
            </small>
          </div>
        </div>
      </div>
    </div>



  </div>
</main>