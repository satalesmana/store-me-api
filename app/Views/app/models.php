<!-- Registration --> 
<div class="modal fade" id="registration-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Daftar Sekarang!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-floating m-2">
                        <input type="text" class="form-control" id="register-name" placeholder="Nama">
                        <label>Nama</label>
                    </div>
                    <div class="form-floating m-2">
                        <input type="email" class="form-control" id="register-email" placeholder="Email">
                        <label>Email</label>
                    </div>
                    <div class="form-floating m-2">
                        <input type="password" class="form-control" id="register-password" placeholder="Password">
                        <label>Password</label>
                    </div>
                    <div class="m-2">
                        <label class="mb-2">Upload fotomu</label>
                        <input class="form-control" type="file" id="register-photo">
                    </div>
                    <div class="form-floating m-2">
                        <textarea type="text" class="form-control" id="register-address" placeholder="Alamat" style="height: 120px"></textarea>
                        <label>Alamat</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Daftar</button>
            </div>
        </div>
    </div>
</div>
<!-- End Registration -->
<!-- Login -->
<div class="modal fade" id="login-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Masuk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-floating m-2">
                        <input type="email" class="form-control" id="login-email" placeholder="Email">
                        <label>Email</label>
                    </div>
                    <div class="form-floating m-2">
                        <input type="password" class="form-control" id="login-password" placeholder="Password">
                        <label>Password</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Masuk</button>
            </div>
        </div>
    </div>
</div>
<!-- End Login -->