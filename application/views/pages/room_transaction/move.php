<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            Pindah Mes & Kamar
        </div>
        <div class="card-body">
            <form action="<?=base_url();?>room_transaction/save_move" method="post">
                <input type="hidden" name="employee_id" value="<?=$employee_id;?>">
                <div class="form-group">
                    <label for="select_mes">Pilih Mes</label>
                    <select class="form-control" name="room_id" id="select_mes">
                        <option value="" selected disabled>Pilih</option>
                        <?php foreach($mes as $ms):?>
                            <option value="<?=$ms['id'];?>"><?=$ms['name']?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="select_room">Pilih kamar</label>
                    <select class="form-control" name="room_id" id="select_room" required>
                        <option value="" selected disabled>Pilih Mes Terlebih Dahulu</option>
                    </select>
                </div>
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
<script>
    $(document).ready(function(){
        $('#select_mes').on('change',function(e){
            $.ajax({
                url : `/room_transaction/get_room/${$(this).val()}`,
                dataType : 'json'
            }).done(function(data){
                $('.additional-option').remove();
                for (let i = 0; i < data.length; i++) {
                    $('#select_room').append(`<option class="additional-option" value="${data[i]['id']}">${data[i].name}</option>`);
                }
            });
        });
    });
</script>
