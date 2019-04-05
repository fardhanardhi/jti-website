<main role="main" class="container-fluid" id="home">
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
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-body">
                <div class="icon">
                  <button type="button" class="close text-right text-white active" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="container-fluid">
                  <strong>
                    <center>
                      <h5 class="p-2">Kuisioner</h5>
                    </center>
                  </strong>
                  <form action="">
                    <div class="pilihan-dosen">
                      <strong><label for="nama-dosen" class="nama-dosen">Dosen Pengajar dan Mata Kuliah :
                        </label></strong>
                      <select name="nama-dosen" id="nama-dosen" class="p-1 ">
                        <option value="ridwan">Ridwan Rismanto, SST., M.KOM. (Pemrograman Dasar) </option>
                        <option value="rudy">Rudy Arianto, ST, M.Cs. (Proyek 2)</option>
                      </select>
                    </div>
                    <div class="kriteria-kuisioner p-2 border-bottom border-gray ">
                      <div class="row kriteria">
                        <div class="col-sm-7">
                          <strong>
                            <center>Kriteria Kuisioner</center>
                          </strong>
                        </div>
                        <div class="col-sm-5">
                          <div class="row pilihan">
                            <div class="col-sm-2">1</div>
                            <div class="col-sm-2">2</div>
                            <div class="col-sm-2">3</div>
                            <div class="col-sm-2">4</div>
                            <div class="col-sm-2">5</div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="isi-kuisioner p-1">
                      <div class="row pil1">
                        <div class="col-sm-7">
                          <label>Ruang kuliah tertata dengan rapi</label>
                        </div>
                        <div class="col-sm-5">
                          <div class="row">
                            <div class="col-sm-2"><input type="radio" name="name1" value="nilai1" /></div>
                            <div class="col-sm-2"><input type="radio" name="name1" value="nilai2" /></div>
                            <div class="col-sm-2"><input type="radio" name="name1" value="nilai3" /></div>
                            <div class="col-sm-2"><input type="radio" name="name1" value="nilai4" /></div>
                            <div class="col-sm-2"><input type="radio" name="name1" value="nilai5" /></div>
                          </div>
                        </div>
                      </div>
                      <div class="row pil2">
                        <div class="col-sm-7">
                          <label>Ruang kuliah tertata dengan rapi</label>
                        </div>
                        <div class="col-sm-5">
                          <div class="row">
                            <div class="col-sm-2"><input type="radio" name="name2" value="nilai1" /></div>
                            <div class="col-sm-2"><input type="radio" name="name2" value="nilai2" /></div>
                            <div class="col-sm-2"><input type="radio" name="name2" value="nilai3" /></div>
                            <div class="col-sm-2"><input type="radio" name="name2" value="nilai4" /></div>
                            <div class="col-sm-2"><input type="radio" name="name2" value="nilai5" /></div>
                          </div>
                        </div>
                      </div>
                      <div class="row pil3">
                        <div class="col-sm-7">
                          <label>Ruang kuliah tertata dengan rapi</label>
                        </div>
                        <div class="col-sm-5">
                          <div class="row">
                            <div class="col-sm-2"><input type="radio" name="name3" value="nilai1" /></div>
                            <div class="col-sm-2"><input type="radio" name="name3" value="nilai2" /></div>
                            <div class="col-sm-2"><input type="radio" name="name3" value="nilai3" /></div>
                            <div class="col-sm-2"><input type="radio" name="name3" value="nilai4" /></div>
                            <div class="col-sm-2"><input type="radio" name="name3" value="nilai5" /></div>
                          </div>
                        </div>
                      </div>
                      <div class="row pil4">
                        <div class="col-sm-7">
                          <label>Ruang kuliah tertata dengan rapi</label>
                        </div>
                        <div class="col-sm-5">
                          <div class="row">
                            <div class="col-sm-2"><input type="radio" name="name4" value="nilai1" /></div>
                            <div class="col-sm-2"><input type="radio" name="name4" value="nilai2" /></div>
                            <div class="col-sm-2"><input type="radio" name="name4" value="nilai3" /></div>
                            <div class="col-sm-2"><input type="radio" name="name4" value="nilai4" /></div>
                            <div class="col-sm-2"><input type="radio" name="name4" value="nilai5" /></div>
                          </div>
                        </div>
                      </div>
                      <div class="row pil5">
                        <div class="col-sm-7">
                          <label>Ruang kuliah tertata dengan rapi</label>
                        </div>
                        <div class="col-sm-5">
                          <div class="row">
                            <div class="col-sm-2"><input type="radio" name="name5" value="nilai1" /></div>
                            <div class="col-sm-2"><input type="radio" name="name5" value="nilai2" /></div>
                            <div class="col-sm-2"><input type="radio" name="name5" value="nilai3" /></div>
                            <div class="col-sm-2"><input type="radio" name="name5" value="nilai4" /></div>
                            <div class="col-sm-2"><input type="radio" name="name5" value="nilai5" /></div>
                          </div>
                        </div>
                      </div>
                      <div class="row pil6">
                        <div class="col-sm-7">
                          <label>Ruang kuliah tertata dengan rapi</label>
                        </div>
                        <div class="col-sm-5">
                          <div class="row">
                            <div class="col-sm-2"><input type="radio" name="name6" value="nilai1" /></div>
                            <div class="col-sm-2"><input type="radio" name="name6" value="nilai2" /></div>
                            <div class="col-sm-2"><input type="radio" name="name6" value="nilai3" /></div>
                            <div class="col-sm-2"><input type="radio" name="name6" value="nilai4" /></div>
                            <div class="col-sm-2"><input type="radio" name="name6" value="nilai5" /></div>
                          </div>
                        </div>
                      </div>
                      <div class="row pil7">
                        <div class="col-sm-7">
                          <label>Ruang kuliah tertata dengan rapi</label>
                        </div>
                        <div class="col-sm-5">
                          <div class="row">
                            <div class="col-sm-2"><input type="radio" name="name7" value="nilai1" /></div>
                            <div class="col-sm-2"><input type="radio" name="name7" value="nilai2" /></div>
                            <div class="col-sm-2"><input type="radio" name="name7" value="nilai3" /></div>
                            <div class="col-sm-2"><input type="radio" name="name7" value="nilai4" /></div>
                            <div class="col-sm-2"><input type="radio" name="name7" value="nilai5" /></div>
                          </div>
                        </div>
                      </div>
                      <div class="row pil8">
                        <div class="col-sm-7">
                          <label>Ruang kuliah tertata dengan rapi</label>
                        </div>
                        <div class="col-sm-5">
                          <div class="row">
                            <div class="col-sm-2"><input type="radio" name="name8" value="nilai1" /></div>
                            <div class="col-sm-2"><input type="radio" name="name8" value="nilai2" /></div>
                            <div class="col-sm-2"><input type="radio" name="name8" value="nilai3" /></div>
                            <div class="col-sm-2"><input type="radio" name="name8" value="nilai4" /></div>
                            <div class="col-sm-2"><input type="radio" name="name8" value="nilai5" /></div>
                          </div>
                        </div>
                      </div>
                      <div class="row pil9">
                        <div class="col-sm-7">
                          <label>Ruang kuliah tertata dengan rapi</label>
                        </div>
                        <div class="col-sm-5">
                          <div class="row">
                            <div class="col-sm-2"><input type="radio" name="name9" value="nilai1" /></div>
                            <div class="col-sm-2"><input type="radio" name="name9" value="nilai2" /></div>
                            <div class="col-sm-2"><input type="radio" name="name9" value="nilai3" /></div>
                            <div class="col-sm-2"><input type="radio" name="name9" value="nilai4" /></div>
                            <div class="col-sm-2"><input type="radio" name="name9" value="nilai5" /></div>
                          </div>
                        </div>
                      </div>
                      <div class="row pil10">
                        <div class="col-sm-7">
                          <label>Ruang kuliah tertata dengan rapi</label>
                        </div>
                        <div class="col-sm-5">
                          <div class="row">
                            <div class="col-sm-2"><input type="radio" name="name10" value="nilai1" /></div>
                            <div class="col-sm-2"><input type="radio" name="name10" value="nilai2" /></div>
                            <div class="col-sm-2"><input type="radio" name="name10" value="nilai3" /></div>
                            <div class="col-sm-2"><input type="radio" name="name10" value="nilai4" /></div>
                            <div class="col-sm-2"><input type="radio" name="name10" value="nilai5" /></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn kirim">Kirim</button>
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
            <div class="row komens">
              <div class="col-sm-1">

              </div>
              <div class="col-sm-8 ">
                <div class="balas-komen p-2 border-left border-dark">
                  <strong>Admin</strong> <span class="komen">Dosen pergi ke jepang dalam rangka sebagai perwakilan
                      indonesia di pertemuan KTT 2019</span> <br>
                  <strong>Sabyan_Lovers</strong> <span class="komen">Okeke min</span> <br>
                </div>
              <div class="form-group border border-dark komen2 ">
                <textarea class="form-control border-0" name="" id="" rows="1"
                  placeholder="Tulis Komentar..."></textarea>
              </div>
                
              </div>
              <div class="col-sm-2">
                <strong>Reply</strong>
              </div>
            </div>

          </div>
        </div>
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
            <div class="photos">
              <div class="row">
                <div class="col-md-6 p-2">
                  <div class="image">
                    <a href="../attachment/img/yuri.png" data-toggle="lightbox" data-gallery="mixedgallery">
                      <img class="img img-fluid img-responsive full-width cursor" src="../attachment/img/yuri.png"
                        alt="foto">
                    </a>
                  </div>
                </div>
                <div class="col-md-6 p-2">
                  <div class="image">
                    <a href="../attachment/img/ariadi.png" data-toggle="lightbox" data-gallery="mixedgallery">
                      <img class="img img-fluid img-responsive full-width cursor" src="../attachment/img/ariadi.png"
                        alt="foto">
                    </a>
                  </div>
                </div>
                <div class="col-md-6 p-2">
                  <div class="image">
                    <a href="../attachment/img/atiqah.png" data-toggle="lightbox" data-gallery="mixedgallery">
                      <img class="img img-fluid img-responsive full-width cursor" src="../attachment/img/atiqah.png"
                        alt="foto">
                    </a>
                  </div>
                </div>
                <div class="col-md-6 p-2">
                  <div class="image">
                    <a href="../attachment/img/ridwan.png" data-toggle="lightbox" data-gallery="mixedgallery">
                      <img class="img img-fluid img-responsive full-width cursor" src="../attachment/img/ridwan.png"
                        alt="foto">
                    </a>
                  </div>
                </div>
                <div class="col-md-6 p-2">
                  <div class="image">
                    <a href="../attachment/img/yan.png" data-toggle="lightbox" data-gallery="mixedgallery">
                      <img class="img img-fluid img-responsive full-width cursor" src="../attachment/img/yan.png"
                        alt="foto">
                    </a>
                  </div>
                </div>
              </div>
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
              Terima Kasih... <br>
                <div class="row isi-download">
                  <div class="col-md-12">
                    <button class="btn btn-outline-dark download d-flex justify-content-around">
                      <h5><a href="" class="pl-0">Dokumen Rahasia</a></h5>
                      <img src="../img/vector.svg" alt="Download button" class="pl-0">
                    </button>
                </div>
                </div>
              
              <!-- <a href="">
                <div class="download border border-dark mt-2 p-3">
                  <div class="row isi-download">
                    <div class="col-sm-7">
                      <h5><a href="">Dokumen Rahasia</a></h5>
                    </div>
                    <div class="col-sm-5 text-right">
                      <img src="../img/vector.svg" alt="Download button" class="">
                    </div>
                  </div>
                </div>
              </a> -->
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

      <div class="button-back m-2 p-0 mb-3">
        <div class="row btn-back">
          <div class="col-sm-6 text-left ">
            <button class="shadow-sm back btn pl-1"><a href="#">&xlarr; &#124; Berita Lama</a></button>
          </div>
          <div class="col-sm-6 d-block text-right ">
            <button class="shadow-sm back btn pl-1"><a href="#">Berita Baru &#124; &rarr; </a></button>
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
        <!-- <div class="m-2 p-3 bg-white rounded shadow-sm">
          <div class="beasiswa pb-3 mb-0 ">
            <h5 class="text-center"><strong>Info Beasiswa</strong></h5>
            <div class="scholarship text-center mt-5 mb-5">
              <img src="../img/scholarship.svg" alt="Scholarship" class="">
              <br>
              <p>Mohon maaf, untuk saat ini beasiswa belum tersedia</p>
            </div>
          </div>
        </div> -->
      </div>
    </div>
  </div>
</main>