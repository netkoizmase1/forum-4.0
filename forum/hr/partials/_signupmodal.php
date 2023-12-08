<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Registrirajte se za OpenSesame račun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Zatvori">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="/forum/partials/_handlesignup.php" method="post">
            <div class="modal-body">

                    <div class="form-group">
                        <label for="exampleInputPassword1">Email </label>
                        <input type="email" class="form-control" id="signupEmail" name="signupEmail" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Korisničko ime</label>
                        <input type="text" class="form-control" id="signupUname" name="signupUname" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Lozinka</label>
                        <input type="password" class="form-control" id="signupPassword" name="signupPassword">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Potvrdite lozinku</label>
                        <input type="password" class="form-control" id="signupcPassword" name="signupcPassword">
                    </div>
                  
                    <button type="submit" class="btn btn-primary">Registracija</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button> 
            </div>
                </form>
    </div>
  </div>
</div>
