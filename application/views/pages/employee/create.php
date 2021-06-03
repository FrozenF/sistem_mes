<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            Tambah Karyawan
        </div>
        <div class="card-body">
            <form action="<?=base_url();?>employee/store" method="post">
                <div class="form-group">
                    <label for="nik">NIK : </label>
                    <input class="form-control" type="number" name="nik" id="nik">
                </div>
                <div class="form-group">
                    <label for="name">Nama : </label>
                    <input class="form-control" type="text" name="name" id="name">
                </div>
                <div class="form-group">
                    <label for="address">Alamat : </label>
                    <textarea class="form-control" name="address" id="address"></textarea>
                </div>
                <div class="form-group">
                    <label for="department">Department : </label>
                    <select class="form-control" name="department_id" id="department" required>
                        <option value="" selected disabled>Pilih</option>
                        <?php foreach($departments as $dpt):?>
                            <option value="<?=$dpt['id'];?>"><?=$dpt['short_name'];?> - <?=$dpt['full_name'];?></option>
                        <?php endforeach ?>
                    </select>
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
