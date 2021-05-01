<div class="card border-0">
    <div class="card-body">
        <h5 class="card-title pb-2">Cari Produk Hukum</h5>
        <hr>
        <form action="/Jdih/cari" method="GET">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <input type="text" class="form-control" id="prohum" name="prohum" placeholder="Cari produk hukum" autocomplete="off">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <label for="no">Nomor</label>
                        <input type="text" class="form-control" id="no" autocomplete="off" name="no" placeholder="Nomor">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <select name="tahun" id="tahun" class="form-control custom-select">
                            <option value="">Semua</option>
                            <?php foreach ($tahun as $row) { ?>
                                <option value="<?= $row['tahun']; ?>"><?= $row['tahun']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <label for="id_unit">Unit</label>
                        <select name="id_unit" id="id_unit" class="form-control custom-select">
                            <option value="">Semua</option>
                            <?php foreach ($unit as $row) { ?>
                                <option value="<?= $row['id_unit']; ?>"><?= $row['nama_unit']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <label for="id_kategori">Kategori</label>
                        <select name="id_kategori" id="id_kategori" class="form-control custom-select">
                            <option value="">Semua</option>
                            <?php foreach ($kategori as $row) { ?>
                                <option value="<?= $row['id_kategori']; ?>"><?= $row['nama_kategori']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control custom-select">
                            <option value="">Semua</option>
                            <?php foreach ($status as $row) { ?>
                                <option value="<?= $row['status']; ?>"><?= $row['status']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <input type="submit" name="submit" class="btn text-white" style=" padding: 5px 15px 5px 15px; background: #288ACB">
        </form>
    </div>
</div>