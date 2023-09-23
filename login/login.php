<div id="wrapper1" class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-4">
      <div class="card mt-5">
        <div class="card-body">
          <h3 class="card-title text-center">Login</h3>
          <form action="#" method="post">
            <div class="mb-3">
              <label for="usernameOrEmail" class="form-label"
                >Username / Email</label
              >
              <input
                type="text"
                class="form-control"
                id="usernameOrEmail"
                name="usernameOrEmail"
                placeholder="username/email"
                required
              />
            </div>
            <div class="mb-3 position-relative">
              <label for="password" class="form-label">Password</label>
              <input
                type="password"
                class="form-control"
                id="password"
                name="password"
                placeholder="password"
                required
              />
              <i class="fas fa-eye-slash toggle-icon"></i>
            </div>

            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-primary">Login</button>
            </div>
            <div class="mt-3 d-flex justify-content-between">
              <a  onclick="showWrapper4(['wrapper3'], 'wrapper', 5)" href="#" class="text-decoration-none">Forgot password?</a>
              <a onclick="showWrapper4(['wrapper2'], 'wrapper', 5)" href="#" class="text-decoration-none">Create account</a>
            </div>
            <div class="mt-3 d-flex justify-content-between">
              <a  href="../index.php" class="text-decoration-none">Go Back</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
