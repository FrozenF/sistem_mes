<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            Ubah MES
        </div>
        <div class="card-body">
            <form action="<?=base_url();?>mes/update" method="post">
                <input type="hidden" name="edit_id" value="<?=$edit->id;?>">
                <div class="form-group">
                    <label for="name">Nama : </label>
                    <input class="form-control" type="text" name="name" id="name" value="<?=$edit->name;?>">
                </div>
                <div class="form-group">
                    <label for="address">Alamat : </label>
                    <textarea class="form-control" name="address" id="address"><?=$edit->address;?></textarea>
                </div>
                <div class="form-group">
                    <label for="max-room">Jumlah Kamar :</label>
                    <input class="form-control" type="number" name="max_room" id="max-room" value="<?=$edit->max_room;?>">
                </div>
                <div class="form-group">
                    Status :
                    <input id="active" type="radio" name="status" value="1" <?=($edit->status)?'checked':''?>>
                    <label for="active">Aktif</label>
                    <input id="non-active" type="radio" name="status" value="0" <?=(!$edit->status)?'checked':''?>>
                    <label for="non-active">Non-Aktif</label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
