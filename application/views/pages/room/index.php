<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><i class="fa fa-door-closed"></i> Kamar</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header">
            <a class="btn btn-primary" href="<?=base_url();?>room/create"><i class="fa fa-plus"></i> Tambah Kamar</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <td>No</td>
                        <td>Mes</td>
                        <td>Nama</td>
                        <td>Kapasitas</td>
                        <td>Status</td>
                        <td>Aksi</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($rooms as $key => $item): ?>
                        <tr>
                            <td><?=$key+1;?></td>
                            <td><?=@$item['mes_name'];?></td>
                            <td><?=@$item['name'];?></td>
                            <td><?=@$item['max_capacity'];?> Orang</td>
                            <td><?=($item['status'])?'<badge class="badge badge-success">Aktif</badge>':'<badge class="badge badge-danger">Non-Aktif</badge>';?></td>
                            <td><a class="btn btn-warning btn-sm" href="<?=base_url();?>room/edit/<?=$item['id'];?>"><i class="fa fa-edit"></i> Edit</a></td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
