<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            Ubah Departemen
        </div>
        <div class="card-body">
            <form action="<?=base_url();?>department/update" method="post">
                <input type="hidden" name="edit_id" value="<?=@$edit->id;?>">
                <div class="form-group">
                    <label for="name">Nama Departemen : </label>
                    <input class="form-control" type="text" name="name" id="name" value="<?=@$edit->full_name;?>">
                </div>
                <div class="form-group">
                    <label for="short_name">Kependekan : </label>
                    <input class="form-control" type="text" name="short_name" id="short_name" value="<?=@$edit->short_name;?>">
                </div>
                <div class="form-group">
                    Status :
                    <input class="custom-radio" id="active" type="radio" name="status" value="1" <?=($edit->status)?'checked':''?>>
                    <label for="active">Aktif</label>
                    <input class="custom-radio" id="non-active" type="radio" name="status" value="0" <?=(!$edit->status)?'checked':''?>>
                    <label for="non-active">Non-Aktif</label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
