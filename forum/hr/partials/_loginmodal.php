<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Prijava u OpenSesame</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/forum/partials/_handleLogin.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="loginEmail">Email</label>
                        <input type="text" class="form-control" id="loginEmail" name="loginEmail"
                            aria-describedby="emailHelp">
                     </div>

                     <div class="form-group">
                        <label for="loginUnmae">Korisničko ime</label>
                        <input type="text" class="form-control" id="loginUname" name="loginUname">
                     </div>

                    <div class="form-group">
                        <label for="loginPass">Lozinka</label>
                        <input type="password" class="form-control" id="loginPass" name="loginPass">
                    </div>

                    <button type="submit" class="btn btn-primary">Potvrdi</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
                </div>
            </form>
        </div>
    </div>
</div>
