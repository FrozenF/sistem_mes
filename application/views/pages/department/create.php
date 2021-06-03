<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            Buat Departemen Baru
        </div>
        <div class="card-body">
            <form action="<?=base_url();?>department/store" method="post">
                <div class="form-group">
                    <label for="name">Nama Departemen : </label>
                    <input class="form-control" type="text" name="name" id="name">
                </div>
                <div class="form-group">
                    <label for="short_name">Kependekan : </label>
                    <input class="form-control" type="text" name="short_name" id="short_name">
                </div>
                <div class="form-group">
                    Status :
                    <input class="custom-radio" id="active" type="radio" name="status" value="1">
                    <label for="active">Aktif</label>
                    <input class="custom-radio" id="non-active" type="radio" name="status" value="0">
                    <label for="non-active">Non-Aktif</label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
