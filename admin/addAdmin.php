<div id="wrapper6" class="container justify-content-center align-items-center mt-2">
  <div class="row justify-content-center align-items-center">



<div  id="adminList" class="col-12 col-sm-10 col-md-8 col-lg-6 d-none">
<div class="mt-5">
  <h3 class="text-center">Admin List</h3>
  <table id="adminTable" class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Username</th>
        <th scope="col">Level</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>admin1</td>
        <td>Super Admin</td>
        <td><button class="btn btn-danger btn-sm">Delete</button></td>
      </tr>

    </tbody>
  </table>
</div>
</div>




  
    <div class="col-12 col-sm-10 col-md-8 col-lg-6">
      <form id="formaddAdmin" class="custom-form justify-content-center align-items-center">
        <h2 class="text-center">New Admin</h2>

        <!-- Username -->
        <div class="mb-3 justify-content-center align-items-center">
          <div class="input-group">
            <span class="input-group-text">
              <i class="fas fa-user"></i>
            </span>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
          </div>
        </div>

        <!-- Email -->
        <div class="mb-3 justify-content-center align-items-center">
          <div class="input-group">
            <span class="input-group-text">
              <i class="fas fa-envelope"></i>
            </span>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
          </div>
        </div>

        <!-- Mobile -->
        <div class="mb-3 justify-content-center align-items-center">
          <div class="input-group">
            <span class="input-group-text">
              <i class="fas fa-phone"></i>
            </span>
            <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Enter your mobile number">
          </div>
        </div>

        <!-- Password -->
        <div class="mb-3 justify-content-center align-items-center">
          <div class="input-group">
            <span class="input-group-text">
              <i class="fas fa-key"></i>
            </span>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
          </div>
        </div>

        <!-- Confirm Password -->
        <div class="mb-3 justify-content-center align-items-center">
          <div class="input-group">
            <span class="input-group-text">
              <i class="fas fa-key"></i>
            </span>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>
          </div>
        </div>

        <!-- Admin Level -->
        <div class="mb-3 justify-content-center align-items-center">
          <div class="input-group">
            <span class="input-group-text">
              <i class="fas fa-user-shield"></i>
            </span>
            <select class="form-select" id="admin_level" name="admin_level">
              <option selected>Select Admin Level</option>
              <option value="3">Super Admin</option>
              <option value="2">Admin</option>
        
            </select>
          </div>
        </div>

        <button type="submit" class="btn btn-success w-100">Register</button>
      </form>
    </div>
  </div>
</div>
