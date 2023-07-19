    <script type="text/javascript" src="<?=base_url()?>assets/js/auth.js"></script>

    <div class="container mt-4">
        <div style="max-width: 400px; margin-left: auto; margin-right: auto;">
            <form id="signup_form">
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="full_name">Full Name</label>
                    <input type="text" id="full_name" class="form-control" required />
                </div>
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" id="email" class="form-control" required />
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" id="password" class="form-control" required />
                </div>

                <!-- Submit button -->
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary w-100 mb-4">Sign Up</button>
                </div>
                <div>
                    Already a memeber?
                    <a href="<?=site_url()?>sign_in">Sign In</a>
                </div>
            </form>
        </div>
    </div>
    
</body> 
</html>