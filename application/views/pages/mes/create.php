<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            Tambah MES
        </div>
        <div class="card-body">
            <form action="<?=base_url();?>mes/store" method="post">
                <div class="form-group">
                    <label for="name">Nama : </label>
                    <input class="form-control" type="text" name="name" id="name">
                </div>
                <div class="form-group">
                    <label for="address">Alamat : </label>
                    <input class="form-control" type="text" name="address" id="address">
                </div>
                <div class="form-group">
                    <label for="max-room">Jumlah Kamar :</label>
                    <input class="form-control" type="number" name="max_room" id="max-room">
                </div>
                <div class="form-group">
                    Status :
                    <input id="active" type="radio" name="status" value="1">
                    <label for="active">Aktif</label>
                    <input id="non-active" type="radio" name="status" value="0">
                    <label for="non-active">Non-Aktif</label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
