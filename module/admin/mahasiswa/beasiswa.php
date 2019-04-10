<main role="main" class="container-fluid" id="beasiswa">
<link rel="stylesheet" href="../css/adminBeasiswa.css">
    <div class="row">
    <div class="col-md-12 p-0">
      <div class="m-2 bg-white shadow-sm rounded">
        <div class="row">
          <div class="col-md-auto pr-0">
            <span class="nav-link">Beasiswa</span>
          </div>
          <div class="col pl-0">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb p-2 m-0 bg-white">
                <li class="breadcrumb-item"><a href="index.php?module=home">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Beasiswa</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
        
        <div class="col-md-12 p-0">
            <div class="m-2 p-3 bg-white rounded shadow-sm">
                <div class="col-md-12 p-0">

                    <div class="card border border-secondary">
                        <div class="card-header">
                            Buat Postingan Beasiswa
                        </div>
                        <div class="card-body">
                            <form action="">
                            
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input type="text" style="border:none" name="judulBeasiswa" id="judulBeasiswa" placeholder="Judul..." class="form-control border-bottom border-gray pb-2 mb-0">
                                    </div>
                                    <div class="col-md-12">
                                        <textarea style="border:none" name="isiBeasiswa" id="isiBeasiswa" cols="30" rows="4" placeholder="Ketik Beasiswa..." class="form-control border-bottom border-gray pb-2 mb-0"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                        <div class="form-group row">
                                            <label for="linkBeasiswa" style="color:gray">Link</label>
                                            <div class="col-md-11">
                                                <input id="linkBeasiswa" style="border:none" name="linkBeasiswa" class="form-control border-bottom border-gray pb-2 mb-0" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <input id="submitBeasiswa" class="submitBeasiswa form-control btn btn-success" type="submit" value="Kirim">
                                        </div>
                                    </div>

                                </div>
                                
                            </form>
                        </div>
                    </div>
                    
                    <div class="cari">
                        <form class="form-inline ml-4">
                                <i class="fas fa-search mr-2"></i>
                                <input class="form-control mr-sm-2" type="search" placeholder="" aria-label="Search">
                                <button class="btn btn-success" type="submit">Cari</button>
                        </form>
                    </div>

                    <div class="scrolltable">
                        <table class="table table-striped table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Beasiswa</th>
                                    <th>Tanggal Pembuatan</th>
                                    <th>Tanggal Perubahan</th>
                                    <th>Batas Tanggal</th>
                                    <th colspan="2">Proses</th>
                                </tr>
                            </thead>
                            <tbody class="text-center m-auto">
                                <tr>
                                    <td>1</td>
                                    <td  style="width:40em;" class="text-left" data-toggle="modal" data-target="#modelId">Dosen dikirim ke Jepang</td>
                                    <td style="width:15em;">20 Februari 2019</td>
                                    <td style="width:15em;">25 Februari 2019</td>
                                    <td style="width:15em;">20 Februari 2019</td>
                                    <td><button class="btn btn-primary beasiswa-edit-btn">Edit</button></td>
                                    <td><button class="btn btn-danger beasiswa-hapus-btn">Hapus</button></td>
                                </tr>

                                <tr>
                                    <td>1</td>
                                    <td  style="width:40em;" class="text-left">Dosen dikirim ke Jepang</td>
                                    <td style="width:15em;">20 Februari 2019</td>
                                    <td style="width:15em;">25 Februari 2019</td>
                                    <td style="width:15em;">20 Februari 2019</td>
                                    <td><button class="btn btn-primary beasiswa-edit-btn">Edit</button></td>
                                    <td><button class="btn btn-danger beasiswa-hapus-btn">Hapus</button></td>
                                </tr>

                                <tr>
                                    <td>1</td>
                                    <td  style="width:40em;" class="text-left">Dosen dikirim ke Jepang</td>
                                    <td style="width:15em;">20 Februari 2019</td>
                                    <td style="width:15em;">25 Februari 2019</td>
                                    <td style="width:15em;">20 Februari 2019</td>
                                    <td><button class="btn btn-primary beasiswa-edit-btn">Edit</button></td>
                                    <td><button class="btn btn-danger beasiswa-hapus-btn">Hapus</button></td>
                                </tr>

                                <tr>
                                    <td>1</td>
                                    <td  style="width:40em;" class="text-left">Dosen dikirim ke Jepang</td>
                                    <td style="width:15em;">20 Februari 2019</td>
                                    <td style="width:15em;">25 Februari 2019</td>
                                    <td style="width:15em;">20 Februari 2019</td>
                                    <td><button class="btn btn-primary beasiswa-edit-btn">Edit</button></td>
                                    <td><button class="btn btn-danger beasiswa-hapus-btn">Hapus</button></td>
                                </tr>

                                
                            </tbody>
                        </table>
                    </div>

                
                </div>
            </div>
        </div>

    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-lg" >
      Launch
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Beasiswa Astra</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                    Ipsum rem delectus hic minima voluptate, eaque repellendus animi dolore cum modi aspernatur dolorum ut iste temporibus unde soluta, quas recusandae porro!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-tutup" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</main>

