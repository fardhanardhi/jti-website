<main role="main" class="container-fluid">
    <div id="khs" class="row">
        <div class="col-md-12 p-0">
            <div class="m-2 bg-white shadow-sm rounded">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="pr-4 title"><a href="#"><strong>Lihat KHS</strong></a></li>
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kartu Hasil Studi(KHS)</li>
                        <li class="breadcrumb-item active" aria-current="page">Lihat KHS</li>
                    </ol>
                </nav>
            </div>
        </div>
        <?php 
            include('khsModalLihat.php');
        ?>
        <div class="col-md-12 p-0">
            <div class="m-2 p-3 bg-white rounded shadow-sm">
                <h4>Daftar Kartu Hasil Studi</h4>
                <hr>
                <select class="kelas custom-select" style="width:150px">
                    <option selected>-</option>
                    <option value="1">TI-2F</option>
                    <option value="2">TI-2C</option>
                </select>
                <select class="kelas custom-select ml-3" style="width:150px">
                    <option selected>-</option>
                    <option value="1">Semester 1</option>
                    <option value="2">Semester 2</option>
                </select>
                <button type="button" class="tmbl-filter btn btn-success ml-3">Cari</button>
                <br><br>
                <div class="media text-muted pt-8">
                    <div class="media-body pb-8 mb-0 small lh-125">
                        <table class="table table-striped table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>SKS</th>
                                    <th>Proses</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Matkul A</td>
                                    <td>lalalalallalalalaal</td>
                                    <td>A</td>
                                    <td><button class="tmbl-table lihat btn btn-info" type="button" class="pratinjau btn" data-toggle="modal" data-target="#myModal" class="edit">Lihat</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Matkul A</td>
                                    <td>lllalalallalallalala</td>
                                    <td>A</td>
                                    <td><button class="tmbl-table lihat btn btn-info" type="button" class="pratinjau btn" data-toggle="modal" data-target="#myModal" class="edit">Lihat</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>