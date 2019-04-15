<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header text-center">
          <h4 class="modal-title w-100">Kartu Hasil Studi</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class ="isi-modaLihat border-bottom1 border-gray">
              <p>Tahun Akademik : 2017/2018 Ganjil</p>
              <p>Nama : </p>
              <p>NIM : </p>
              <p>Kelas : TI-2F</p>
              <p>Prodi : Teknik Informatika</p>
          </div>
          <div id = "khsModal">
          <div class="media text-muted pt-8">
              <div class="media-body pb-8 mb-0">
                  <table class="table table-striped table-bordered text-center">
                      <thead>
                          <tr>
                              <th>No.</th>
                              <th>Nama Mata Kuliah</th>
                              <th>SKS</th>
                              <th>Jam</th>
                              <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Matkul A</td>
                                <td>2</td>
                                <td>4</td>
                                <td>9</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Matkul A</td>
                                <td>2</td>
                                <td>3</td>
                                <td>9</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<script>
    $('#myModal').on('show.bs.modal', event => {
    var button = $(event.relatedTarget);
    var modal = $(this);
    // Use above variables to manipulate the DOM
    });
</script>