<!--
<div class="container">
    <form action="/usuarios/login" method="post">
        <div class="form-group">
            <label for="user">user</label>
            <input type="text" class="form-control" name="user">
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" name="senha>
        </div>
        <input type="submit" name="submit" class="btn btn-primary"  value="Entrar">
    </form>
</div>
-->
<section class="vh-100" style="background-color: #9A616D;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img
                src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                alt="login form"
                class="img-fluid" style="border-radius: 1rem 0 0 1rem;"
              />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form action="/usuarios/login" method="post">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">I.R</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Entre com seu usuário</h5>

                  <div class="form-outline mb-4">
                    <input type="text" id="user" class="form-control form-control-lg" name="user" />
                    <label class="form-label" for="user">Usuário</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="senha" class="form-control form-control-lg" name="senha" />
                    <label class="form-label" for="senha">Senha</label>
                  </div>

                  <div class="pt-1 mb-4">
                    <input type="submit" name="submit" class="btn btn-dark btn-lg btn-block btn-primary"  value="Entrar">
                    <!--<button class="btn btn-dark btn-lg btn-block" type="button">Login</button>-->
                  </div>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>