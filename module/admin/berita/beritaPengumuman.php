<main id="adminBerita" role="main" class="container-fluid">
    <div class="row">
        <div class="col-md-12 p-0">
            <div class="m-2 bg-white shadow-sm rounded">
                <div class="row">
                    <div class="col-md-auto pr-0">
                        <strong><span class="nav-link">Berita</span></strong>
                    </div>
                    <div class="col pl-0">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb p-2 m-0 bg-white">
                                <li class="breadcrumb-item"><a href="index.php?module=home">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Berita</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 p-0">
            <div class="m-2 p-3 bg-white rounded shadow-sm">
                <div class="media text-muted pt-3">
                    <div class="media-body pb-3 mb-0 small lh-125">
                        <div class="isi">
                            <div class="card border border-secondary">
                                <div class="card-header">
                                    <strong>Buat Postingan Berita</strong>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post" class="p-0">
                                        <div class="form-group berita-utama">
                                            <input type="text" class="form-control border-0" name="berita-utama" placeholder="Berita Utama ..." style="width=100%">
                                        </div>
                                        <hr>
                                        <div class="form-group ketik-berita">
                                            <textarea name="ketik-berita" id="" cols="" rows="6" placeholder="Ketik Berita ..." class="form-control border-0"></textarea>
                                        </div>
                                        <hr>
                                        <div class="container m-0">
                                            <div class="row">
                                                <div class="col-sm-7 mt-1">
                                                    0/500
                                                </div>
                                                <div class="col-sm-5 text-right">
                                                    <div class="row">
                                                        <div class="col-sm-2 mt-1">
                                                            <img src="../img/imgUpload.svg" alt="Image Upload" class="">
                                                        </div>
                                                        <div class="col-sm-2 mt-1">
                                                            <img src="../img/fileUpload.svg" alt="File Upload" class=""></div>
                                                        <div class="col-sm-5 mt-1">
                                                            <strong><label for="kategori-AdBer" class="labelBerita">Kategori :
                                                            </label></strong> 
                                                            <select name="" id="">       
                                                                <option value="ridwan">Berita</option>
                                                                <option value="rudy">Pengumuman</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-3">
                                                        <button type="submit" class="btn btn-success btn-kirim">Kirim</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <br>
                            <form class="form-inline ml-4">
                                <i class="fas fa-search mr-2"></i>
                                <input type="date" name="waktu" id="" class="form-control">
                                <button class="btn btn-success" type="submit">Cari</button>
                            </form>
                            <div class="scrolltable">
                                <table class="table table-striped table-bordered text-center mt-3">
                                    <thead>
                                        <tr class="p-2">
                                            <th>No</th>
                                            <th>Berita</th>
                                            <th>Tanggal Pembuatan</th>
                                            <th>Tanggal Perubahan</th>
                                            <th>Komentar</th>
                                            <th colspan="2">Proses</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>5 Dosen Dikirim ke Jepang</td>
                                            <td>20 Februari 2019</td>
                                            <td>25 Februari 2019</td>
                                            <td>10</td>
                                            <td><button class=" tmbl-table btn btn-primary" type="button"
                                                    class="pratinjau btn" data-toggle="modal" data-target="#editModal"
                                                    class="edit">Edit</button></td>
                                            <td><button class=" tmbl-table btn btn-danger" type="button"
                                                    class="pratinjau btn" data-toggle="modal" data-target="#hapus"
                                                    class="hapus">Hapus</button></td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>5 Dosen Dikirim ke Jepang</td>
                                            <td>20 Februari 2019</td>
                                            <td>25 Februari 2019</td>
                                            <td>10</td>
                                            <td><button class=" tmbl-table btn btn-primary" type="button"
                                                    class="pratinjau btn" data-toggle="modal" data-target="#editModal"
                                                    class="edit">Edit</button></td>
                                            <td><button class=" tmbl-table btn btn-danger" type="button"
                                                    class="pratinjau btn" data-toggle="modal" data-target="#hapus"
                                                    class="hapus">Hapus</button></td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>5 Dosen Dikirim ke Jepang</td>
                                            <td>20 Februari 2019</td>
                                            <td>25 Februari 2019</td>
                                            <td>10</td>
                                            <td><button class=" tmbl-table btn btn-primary" type="button"
                                                    class="pratinjau btn" data-toggle="modal" data-target="#editModal"
                                                    class="edit">Edit</button></td>
                                            <td><button class=" tmbl-table btn btn-danger" type="button"
                                                    class="pratinjau btn" data-toggle="modal" data-target="#hapus"
                                                    class="hapus">Hapus</button></td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>5 Dosen Dikirim ke Jepang</td>
                                            <td>20 Februari 2019</td>
                                            <td>25 Februari 2019</td>
                                            <td>10</td>
                                            <td><button class=" tmbl-table btn btn-primary" type="button"
                                                    class="pratinjau btn" data-toggle="modal" data-target="#editModal"
                                                    class="edit">Edit</button></td>
                                            <td><button class=" tmbl-table btn btn-danger" type="button"
                                                    class="pratinjau btn" data-toggle="modal" data-target="#hapus"
                                                    class="hapus">Hapus</button></td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>5 Dosen Dikirim ke Jepang</td>
                                            <td>20 Februari 2019</td>
                                            <td>25 Februari 2019</td>
                                            <td>10</td>
                                            <td><button class=" tmbl-table btn btn-primary" type="button"
                                                    class="pratinjau btn" data-toggle="modal" data-target="#editModal"
                                                    class="edit">Edit</button></td>
                                            <td><button class=" tmbl-table btn btn-danger" type="button"
                                                    class="pratinjau btn" data-toggle="modal" data-target="#hapus"
                                                    class="hapus">Hapus</button></td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>5 Dosen Dikirim ke Jepang</td>
                                            <td>20 Februari 2019</td>
                                            <td>25 Februari 2019</td>
                                            <td>10</td>
                                            <td><button class=" tmbl-table btn btn-primary" type="button"
                                                    class="pratinjau btn" data-toggle="modal" data-target="#editModal"
                                                    class="edit">Edit</button></td>
                                            <td><button class=" tmbl-table btn btn-danger" type="button"
                                                    class="pratinjau btn" data-toggle="modal" data-target="#hapus"
                                                    class="hapus">Hapus</button></td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>5 Dosen Dikirim ke Jepang</td>
                                            <td>20 Februari 2019</td>
                                            <td>25 Februari 2019</td>
                                            <td>10</td>
                                            <td><button class=" tmbl-table btn btn-primary" type="button"
                                                    class="pratinjau btn" data-toggle="modal" data-target="#editModal"
                                                    class="edit">Edit</button></td>
                                            <td><button class=" tmbl-table btn btn-danger" type="button"
                                                    class="pratinjau btn" data-toggle="modal" data-target="#hapus"
                                                    class="hapus">Hapus</button></td>
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
    <!-- Modal Hapus -->
    <div class="modal fade hapusBerita-modal" id="hapus" tabindex="-1" role="dialog" aria-labelledby="hapusTitle" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content konten-modal">
                <div class="modal-body ">
                    <h5 class="isiHapusBerita text-center">Apakah Anda Yakin?</h5>
                    <div class="tombolAksiHapusBerita text-center">
                        <button type="button" class="btn btn-tidak" data-dismiss="modal">Tidak</button>
                        <button type="button" class="btn btn-iya">Ya</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>