<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            Keluar Mes
        </div>
        <div class="card-body">
            <form action="<?=base_url();?>room_transaction/save_out" method="post">
                <input type="hidden" name="employee_id" value="<?=$employee_id;?>">
                <div class="form-group">
                    <label for="date">
                        Tanggal
                    </label>
                    <input class="form-control" type="date" name="date">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
