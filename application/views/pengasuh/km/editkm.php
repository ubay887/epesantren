<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Dashboard</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="fas fa-futbol"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Master</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit Data Pelanggaran Keamanan</a>

                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">

                            <div class="d-flex align-items-center">
                                <h3>
                                    Edit Data Pelanggaran Keamanan
                                </h3>

                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <?php foreach ($pp as $k) : ?>

                                        <form name="f1" method="post" enctype="multipart/form-data" action="<?= base_url('admin/crud_pelanggaran/ed_pel'); ?>">
                                            <div class="row">
                                                <div class="col">
                                                    <label for="nis">NIS</label>

                                                    <input type="text" name="nise" readonly onchange="ambilnise(this.value)" value="<?= $k->nis ?>" class="form-control" id="nisee" placeholder="NIS">

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="nama">Nama</label>
                                                    <input type="text" name="" class="form-control" value="<?= $k->nama ?>" readonly id="nama" placeholder="Nama">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">

                                                <div class="col">
                                                    <label for="foto">Pelanggaran</label>
                                                    <input type="text" name="plg" class="form-control" value="<?= $k->pelanggaran ?>">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="alamat">Sanksi</label>
                                                    <input type="text" name="sanks" value="<?= $k->sanksi ?>" class="form-control" id="alamat" placeholder="Alamat">
                                                    <input type="hidden" name="uri" value="<?= $this->uri->segment(3) ?>">
                                                    <input type="hidden" name="idx" value="<?= $k->code_pelanggaran ?>">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="alamat">Tingkat Pelanggaran</label>
                                                    <select class="form-control" name="tingkat">
                                                        <option <?= $k->tingkat == 'Ringan' ? 'selected' : '' ?>>Ringan
                                                        </option>
                                                        <option <?= $k->tingkat == 'Sedang' ? 'selected' : '' ?>>Sedang
                                                        </option>
                                                        <option <?= $k->tingkat == 'Berat' ? 'selected' : '' ?>>Berat
                                                        </option>
                                                        <option <?= $k->tingkat == 'Sangat Berat' ? 'selected' : '' ?>>
                                                            Sangat Berat</option>
                                                    </select>
                                                </div>
                                            </div>


                                </div>
                                <div class="modal-footer">

                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan
                                        Data</button>
                                    </form>


                                <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade nis" tabindex="-1" role="dialog" aria-labelledby="nis" aria-hidden="true" id="nis">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="exampleModalLabel">Form Data Kelas (ISWAH)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>NIS</th>
                                    <th>Nama Santri/Wati</th>
                                    <th>Nama Ayah</th>
                                    <td>Nama Ibu</td>

                                    <th>AKSI</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($esantri as $row) { ?>
                                    <tr>
                                        <td><?= $row->nis ?></td>
                                        <td><?= $row->nama ?></td>
                                        <td><?= $row->nama_ayah ?></td>
                                        <td><?= $row->nama_ibu ?></td>

                                        <td><a href='#' onclick="etangkapq('<?= $row->nis ?>');"><button class="btn btn-primary">PILIH</button></a></td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i>
                        Tutup </button>

                </div>
            </div>
        </div>
    </div>

    <script>
        <?php

        $array2 = "var dataa = new Array();\n";
        foreach ($esantri as $rows) {
            $p = $rows->nis;
            $array2 .= "dataa['" . $rows->nis . "'] = {nama : '" . $rows->nama . "',alamat : '" . $rows->alamat . "'};\n";
        }

        ?>
        <?php echo $array2; ?>


        function etangkapq(o) {

            document.getElementById('nama').value = dataa[o].nama;
            document.getElementById('nisee').value = o;
            $('#nis').modal('hide');
        }
    </script>



    <div class="modal fade ket" tabindex="-1" role="dialog" aria-labelledby="ket" aria-hidden="true" id="ket">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="exampleModalLabel">Form Data Extrakurikuler</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>


                                    <th>Kode Pengajar</th>
                                    <th>Nama Pengajar</th>


                                    <th>AKSI</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($tguru as $row) { ?>
                                    <tr>
                                        <td><?= $row->code_pengajar ?></td>
                                        <td><?= $row->nama_pengajar ?></td>

                                        <td><a href='#' onclick="etangkappp('<?= $row->nama_pengajar ?>');"><button class="btn btn-primary">PILIH</button></a></td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i>
                        Tutup </button>

                </div>
            </div>
        </div>
    </div>

    <script>
        <?php

        $array = "var data = new Array();\n";
        foreach ($tguru as $row) {
            $m = $row->nama_pengajar;
            $array .= "data['" . $row->nama_pengajar . "'] = {code_pengajar : '" . $row->code_pengajar . "'};\n";
        }

        ?>
        <?php echo $array; ?>


        function etangkappp(s) {

            document.getElementById('wk').value = s;
            $('#ket').modal('hide');
        }
    </script>