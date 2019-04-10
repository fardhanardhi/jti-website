<main role="main" class="container-fluid" id="beasiswa">
<link rel="stylesheet" href="../css/adminBeasiswa.css">
    <div class="row">
        <div class="col-md-12 p-0">
        <div class="m-2 bg-white shadow-sm rounded">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="pr-4 title"><strong>Beasiswa</strong></li>
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Beasiswa</li>
                </ol>
            </nav>
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
                
                <div>
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
                        <tbody class="text-center">
                            <tr>
                                <td>1</td>
                                <td>Dosen dikirim ke Jepang</td>
                                <td>20 Februari 2019</td>
                                <td>25 Februari 2019</td>
                                <td>20 Februari 2019</td>
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
</main>

