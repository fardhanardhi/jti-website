<!-- Modal -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center">
                <h4 class="modal-title w-100">Kartu Hasil Studi</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="isi-modaLihat">
                    <p>Nama : Mahasiswa A</p>
                    <p>Nim : 1741720060</p>
                </div>
                <form action="">
                    <div class="border-bottom border-gray">
                        <div class="row">
                            <div class="col-sm-5">
                            </div>
                            <div class="col-sm-7">
                                <div class="row isi-modaLihat">
                                    <p class="col">A</p>
                                    <p class="col">B+</p>
                                    <p class="col">B</p>
                                    <p class="col">C</p>
                                    <p class="col">C+</p>
                                    <p class="col">D</p>
                                    <p class="col">E</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row isi-modaLihat">
                            <div class="col-sm-5">
                                <p>Sistem Manajemen Basis Data</p>
                            </div>
                            <div class="col-sm-7">
                                <div class="row">
                                    <div class="col"><input type="radio" name="name1" value="nilai1" /></div>
                                    <div class="col"><input type="radio" name="name1" value="nilai2" /></div>
                                    <div class="col"><input type="radio" name="name1" value="nilai3" /></div>
                                    <div class="col"><input type="radio" name="name1" value="nilai4" /></div>
                                    <div class="col"><input type="radio" name="name1" value="nilai5" /></div>
                                    <div class="col"><input type="radio" name="name1" value="nilai5" /></div>
                                    <div class="col"><input type="radio" name="name1" value="nilai5" /></div>
                                </div>
                            </div>
                        </div>
                        <div class="row isi-modaLihat">
                            <div class="col-sm-5">
                                <p>Pemograman Web Lanjut</p>
                            </div>
                            <div class="col-sm-7">
                                <div class="row">
                                    <div class="col"><input type="radio" name="name1" value="nilai1" /></div>
                                    <div class="col"><input type="radio" name="name1" value="nilai2" /></div>
                                    <div class="col"><input type="radio" name="name1" value="nilai3" /></div>
                                    <div class="col"><input type="radio" name="name1" value="nilai4" /></div>
                                    <div class="col"><input type="radio" name="name1" value="nilai5" /></div>
                                    <div class="col"><input type="radio" name="name1" value="nilai5" /></div>
                                    <div class="col"><input type="radio" name="name1" value="nilai5" /></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="tmbl-kirim btn btn-success float-right">Kirim</button>
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