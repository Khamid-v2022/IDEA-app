    <script type="text/javascript" src="<?=base_url()?>assets/js/auth.js"></script>

    <div class="container mt-4">
        <div style="max-width: 400px; margin-left: auto; margin-right: auto;">
            <form id="signin_form">
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example1">Email</label>
                    <input type="email" id="email" class="form-control" required />
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example1">Password</label>
                    <input type="password" id="password" class="form-control" required />
                </div>

                <!-- Submit button -->
                <div class="d-flex" style="justify-content: space-between;">
                    <!-- <a href="#" class="mt-2" data-bs-toggle="modal" data-bs-target="#requestModal">Forgot Password</a> -->
                    <button type="submit" class="btn btn-primary w-100 mb-4">Sign in</button>
                </div>
                <div>
                    Don't have an account?
                    <a href="<?=site_url()?>sign_up">Sign Up</a>
                </div>
            </form>
        </div>
    </div>




    <div class="modal fade" id="requestModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Reset Password</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="request-form ">
                        <form method="post" id="m_reset_pass_form">
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="email" class="form-control" id="m_email" required>
                            </div>
                              
                            <div class="text-center">
                                <button type="submit" class="btn mt-5 btn-primary" id="reset_password">Reset Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body> 
</html>