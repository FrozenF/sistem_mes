<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            Ubah Kamar
        </div>
        <div class="card-body">
            <?php if(isset($_SESSION['error'])): ?>
                <div class="form-group">
                    <span class="alert alert-danger"><?=$_SESSION['error'];?></span>
                </div>
            <?php endif ?>
            <form action="<?=base_url();?>room/update" method="post">
                <input type="hidden" name="edit_id" value="<?=$edit->id;?>">
                <div class="form-group">
                    <label for="name">Nama : </label>
                    <input class="form-control" type="text" name="name" id="name" value="<?=$edit->name;?>">
                </div>
                <div class="form-group">
                    <label for="mes">Mes : </label>
                    <select class="form-control" name="mes_id" id="mes" required>
                        <option value="" selected disabled>Pilih</option>
                        <?php foreach($mes as $ms):?>
                            <?php if($ms['id'] == $edit->mes_id): ?>
                                <option value="<?=$ms['id'];?>" selected><?=$ms['name'];?></option>
                            <?php else: ?>
                                <option value="<?=$ms['id'];?>"><?=$ms['name'];?></option>
                            <?php endif ?>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="capacity">Kapasitas (Orang) :</label>
                    <input class="form-control" type="number" name="max_capacity" id="capacity" value="<?=@$edit->max_capacity;?>">
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
