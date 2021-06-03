<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Penghuni Aktif</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-12">
                    <form class="form-inline" action="">
                        <div class="form-group mr-2">
                            <label cfor="filter-mes">Filter Mes : </label>
                            <select style="width: 150px" class="form-control ml-3" name="filter_mes" id="filter-mes">
                                <option value="" selected>Pilih</option>
                                <?php foreach($mes as $ms):?>
                                    <option value="<?=$ms['id'];?>"><?=$ms['name']?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Terapkan Filter</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <td>No</td>
                                <td>Nama Pegawai</td>
                                <td>Nama Mes</td>
                                <td>Nama Ruangan</td>
                                <td>Tanggal Masuk</td>
                                <td>Aksi</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($room_details as $key => $item): ?>
                                <tr>
                                    <td><?=$key+1;?></td>
                                    <td><?=@$item['employee_name'];?></td>
                                    <td><?=@$item['mes_name'];?></td>
                                    <td><?=@$item['room_name'];?></td>
                                    <td><?= date_format(new DateTime($item['date']),'d F Y');?></td>
                                    <td>
                                        <a href="<?=base_url();?>room_transaction/move/<?=$item['employee_id'];?>" class="btn btn-warning btn-sm"><i class="fa fa-arrow-circle-right"></i> Pindah</a>
                                        <a href="<?=base_url();?>room_transaction/out/<?=$item['employee_id'];?>" class="btn btn-danger btn-sm"><i class="fa fa-door-open"></i> Keluar</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
