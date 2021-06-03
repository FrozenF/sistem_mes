<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Masuk</h1>
                                </div>
                                <form action="<?=base_url();?>login/process" method="post" class="user">
                                    <div class="form-group">
                                        <input name="username" type="text"class="form-control form-control-user"
                                               placeholder="Masukkan Username">
                                    </div>
                                    <div class="form-group">
                                        <input name="password" type="password" name="password" class="form-control form-control-user"
                                               placeholder="Masukkan Password">
                                        <?php
                                        echo '<span style="color:red">'.@$_SESSION['error'].'</span>';
                                        ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
