<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><i class="fa fa-home"></i> MES</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header">
            <a class="btn btn-primary" href="<?=base_url();?>mes/create"><i class="fa fa-plus"></i> Tambah MES</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <td style="width: 30px;">No</td>
                        <td>Nama</td>
                        <td>Alamat</td>
                        <td style="width: 70px;">Jumlah Kamar</td>
                        <td style="width: 100px;">Status</td>
                        <td style="width: 100px;">Aksi</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($mes as $key => $item): ?>
                        <tr>
                            <td><?=$key+1;?></td>
                            <td><?=@$item['name'];?></td>
                            <td><?=@$item['address'];?></td>
                            <td><?=@$item['max_room'];?></td>
                            <td><?=($item['status'])?'<badge class="badge badge-success">Aktif</badge>':'<badge class="badge badge-danger">Non-Aktif</badge>';?></td>
                            <td><a class="btn btn-warning btn-sm" href="<?=base_url();?>mes/edit/<?=$item['id'];?>"><i class="fa fa-edit"></i> Edit</a></td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
