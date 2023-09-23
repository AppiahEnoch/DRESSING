
<div id="wrapper2" class="container-fluid d-none">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card mt-5">
                <div class="card-body">
                    <h3 class="card-title text-center">Signup</h3>
                    <form id="form2" action="#" method="post">
                        <!-- Username Input -->
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        
                        <!-- Email Input -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        
                        <!-- Password Input -->
                        <div class="mb-3 position-relative">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            <i class="fas fa-eye-slash toggle-icon"></i>
                        </div>
                        
                        <!-- Confirm Password Input -->
                        <div class="mb-3 position-relative">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                            <i class="fas fa-eye-slash toggle-icon"></i>
                        </div>
                        
                        <!-- Signup Button -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Create Account</button>
                        </div>

                        <!-- Additional Links -->
                        <div class="mt-3 d-flex justify-content-between">
                            <a onclick="showWrapper4(['wrapper1'], 'wrapper', 5)" href="#" class="text-decoration-none">Already have an account? Login</a>
                        </div>
                        <div class="mt-3 d-flex justify-content-between">
                            <a href="../index.php" class="text-decoration-none">Go Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>