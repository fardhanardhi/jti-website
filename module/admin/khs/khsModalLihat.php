<?php
  $resultTampilKhsLihat=khsLihat($con);
  if (mysqli_num_rows($resultTampilKhsLihat) == 0) {}
  else{
    $no = 1;
    while ($row = mysqli_fetch_assoc($resultTampilKhsLihat)) {
?>
<!-- Modal -->
<div class="modal fade" id="myModal<?php echo $no; ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" data-backdrop="true">
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
              <p>Nama : <?php echo $row["nm_mahasiswa"]; ?></p>
              <p>NIM : <?php echo $row["nim"]; ?></p>
              <p>Kelas : <?php echo $row["kode"]." - ".$row["tingkat"].$row["kode_kelas"];?></p>
              <p>Prodi : <?php echo $row["nm_prodi"]; ?></p>
          </div>
          <div id = "khsModal">
          <div class="media text-muted pt-8">
          <?php 
            $resultTampilKhsNilai=khsNilai($con);
            if(mysqli_num_rows($resultTampilKhsNilai) > 0){
                ?>
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
                        <?php 
                        $index=1;
                        while($row1 = mysqli_fetch_assoc($resultTampilKhsNilai)){
                            ?>
                            <tr>
                                <td><?php echo $index;?></td>
                                <td><?php echo $row1["nm_matkul"];?></td>
                                <td><?php echo $row1["sks"];?></td>
                                <td><?php echo $row1["jam"];?></td>
                                <td><?php echo $row1["nilai"];?></td>
                            </tr>
                            <?php
                            $index++;
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php 
                        }else{
                            ?>
                            <div class="text-center">
                            <p class="text-muted">Maaf Data Mahasiswa masih belum ada</p>
                            </div>
                            <?php
                        }
                        ?>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<?php
$no++;
}
}
?>

<script>
    $('#myModal').on('show.bs.modal', event => {
        var button = $(event.relatedTarget);
        var modal = $(this);
        // Use above variables to manipulate the DOM
    });
</script>