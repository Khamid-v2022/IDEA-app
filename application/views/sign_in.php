    <script type="text/javascript" src="<?=base_url()?>assets/js/auth.js"></script>

    <div class="container mt-4" style='font-family: "Inter", sans-serif;'>
        <div class="middle-wrapper mx-auto" style="max-width: 540px; margin-top: 150px;">
            <form id="signin_form">
                <div class="text-center">
                    <h3 style="font-size: 26px"><b>Sign In</b></h3>
                    <h6 class="text-muted mt-3" style="font-size: 18px">Welcome back!</h6>
                </div>
                
                <div class="my-4 d-flex justify-content-between">
                    <button class="btn btn-secondary">
                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <mask id="mask0_1_933" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="21" height="21">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M20.7558 8.59091H10.7442V12.6477H16.507C15.9698 15.225 13.7233 16.7045 10.7442 16.7045C7.22791 16.7045 4.39535 13.9364 4.39535 10.5C4.39535 7.06364 7.22791 4.29545 10.7442 4.29545C12.2581 4.29545 13.6256 4.82045 14.7 5.67955L17.8256 2.625C15.9209 1.00227 13.4791 0 10.7442 0C4.78605 0 0 4.67727 0 10.5C0 16.3227 4.78605 21 10.7442 21C16.1163 21 21 17.1818 21 10.5C21 9.87955 20.9023 9.21136 20.7558 8.59091Z" fill="white"/>
                            </mask>
                            <g mask="url(#mask0_1_933)">
                                <path d="M-0.976807 16.7046V4.29547L7.32552 10.5L-0.976807 16.7046Z" fill="#FBBC05"/>
                            </g>
                            <mask id="mask1_1_933" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="21" height="21">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M20.7558 8.59091H10.7442V12.6477H16.507C15.9698 15.225 13.7233 16.7045 10.7442 16.7045C7.22791 16.7045 4.39535 13.9364 4.39535 10.5C4.39535 7.06364 7.22791 4.29545 10.7442 4.29545C12.2581 4.29545 13.6256 4.82045 14.7 5.67955L17.8256 2.625C15.9209 1.00227 13.4791 0 10.7442 0C4.78605 0 0 4.67727 0 10.5C0 16.3227 4.78605 21 10.7442 21C16.1163 21 21 17.1818 21 10.5C21 9.87955 20.9023 9.21136 20.7558 8.59091Z" fill="white"/>
                            </mask>
                            <g mask="url(#mask1_1_933)">
                                <path d="M-0.976807 4.29547L7.32552 10.5L10.7441 7.58865L22.4651 5.72729V-0.954529H-0.976807V4.29547Z" fill="#EA4335"/>
                            </g>
                            <mask id="mask2_1_933" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="21" height="21">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M20.7558 8.59091H10.7442V12.6477H16.507C15.9698 15.225 13.7233 16.7045 10.7442 16.7045C7.22791 16.7045 4.39535 13.9364 4.39535 10.5C4.39535 7.06364 7.22791 4.29545 10.7442 4.29545C12.2581 4.29545 13.6256 4.82045 14.7 5.67955L17.8256 2.625C15.9209 1.00227 13.4791 0 10.7442 0C4.78605 0 0 4.67727 0 10.5C0 16.3227 4.78605 21 10.7442 21C16.1163 21 21 17.1818 21 10.5C21 9.87955 20.9023 9.21136 20.7558 8.59091Z" fill="white"/>
                            </mask>
                            <g mask="url(#mask2_1_933)">
                                <path d="M-0.976807 16.7046L13.6744 5.72729L17.5325 6.20456L22.4651 -0.954529V21.9546H-0.976807V16.7046Z" fill="#34A853"/>
                            </g>
                            <mask id="mask3_1_933" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="21" height="21">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M20.7558 8.59091H10.7442V12.6477H16.507C15.9698 15.225 13.7233 16.7045 10.7442 16.7045C7.22791 16.7045 4.39535 13.9364 4.39535 10.5C4.39535 7.06364 7.22791 4.29545 10.7442 4.29545C12.2581 4.29545 13.6256 4.82045 14.7 5.67955L17.8256 2.625C15.9209 1.00227 13.4791 0 10.7442 0C4.78605 0 0 4.67727 0 10.5C0 16.3227 4.78605 21 10.7442 21C16.1163 21 21 17.1818 21 10.5C21 9.87955 20.9023 9.21136 20.7558 8.59091Z" fill="white"/>
                            </mask>
                                <g mask="url(#mask3_1_933)">
                            <path d="M22.4651 21.9546L7.32556 10.5L5.37207 9.0682L22.4651 4.29547V21.9546Z" fill="#4285F4"/>
                            </g>
                        </svg>
                        <span class="ms-2">Sign In with Google</span>
                    </button>
                    <button class="btn btn-secondary">
                        <svg width="20" height="25" viewBox="0 0 20 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.83343 23.5515C4.36068 23.2362 3.94084 22.8481 3.5895 22.4016C3.20679 21.9381 2.85149 21.4527 2.52541 20.9478C1.75981 19.8279 1.16025 18.603 0.745364 17.3114C0.26397 15.912 0.0129659 14.4437 0.00214364 12.9638C-0.0307311 11.5367 0.315027 10.1264 1.00424 8.87641C1.49739 7.97446 2.22214 7.22032 3.10378 6.69171C3.95813 6.1618 4.93937 5.87166 5.94451 5.85175C6.32593 5.85556 6.70545 5.90589 7.07467 6.00162C7.36488 6.08133 7.71503 6.21144 8.14489 6.37153C8.69464 6.58135 8.99506 6.71215 9.0952 6.74144C9.34975 6.84465 9.62046 6.9023 9.89497 6.91175C10.115 6.89829 10.3321 6.85451 10.5401 6.78163C10.6852 6.7319 10.9604 6.6413 11.3501 6.47167C11.7363 6.33134 12.0422 6.21144 12.2854 6.12152C12.629 6.01128 12.9795 5.92344 13.3345 5.85857C13.7133 5.79862 14.0978 5.78284 14.4803 5.81156C15.1441 5.85618 15.7977 5.99779 16.4205 6.23188C17.421 6.61801 18.2787 7.30216 18.8777 8.19178C18.6196 8.35226 18.377 8.5363 18.1528 8.74153C17.6652 9.17444 17.2499 9.68245 16.9225 10.2464C16.4937 11.0168 16.2719 11.8852 16.2788 12.7669C16.2711 13.7825 16.5633 14.7778 17.1187 15.6281C17.5193 16.24 18.0415 16.7629 18.6529 17.1643C18.9135 17.3479 19.1956 17.4991 19.4928 17.6146C19.3729 17.9899 19.2408 18.3544 19.0875 18.7147C18.7431 19.5218 18.3246 20.2951 17.8374 21.0248C17.4055 21.6549 17.0656 22.125 16.8074 22.4349C16.4693 22.8557 16.0718 23.2252 15.6275 23.5317C15.1968 23.8167 14.6916 23.9683 14.1751 23.9677C13.8258 23.9819 13.4766 23.9391 13.141 23.841C12.8508 23.7463 12.5647 23.6366 12.2847 23.5181C11.9912 23.3836 11.6887 23.2698 11.3794 23.1775C10.9993 23.078 10.608 23.0286 10.2151 23.0303C9.82457 23.0301 9.43549 23.0788 9.05705 23.1754C8.74791 23.2634 8.44499 23.372 8.15034 23.5004C7.73002 23.6755 7.45548 23.7906 7.29539 23.841C6.97308 23.9364 6.64104 23.9951 6.30556 24.0161C5.77734 24.0118 5.26152 23.8555 4.8198 23.5658L4.83343 23.5515ZM11.6873 5.09083C11.0816 5.41567 10.3978 5.56656 9.71169 5.52682C9.62407 4.83572 9.71798 4.13371 9.98418 3.48994C10.2147 2.87481 10.5534 2.30588 10.9842 1.81003C11.4418 1.28912 11.9952 0.861027 12.6144 0.549072C13.198 0.232864 13.8426 0.0456216 14.5048 0C14.583 0.700137 14.4974 1.40887 14.2548 2.07026C14.0243 2.70951 13.6858 3.30446 13.2541 3.82919C12.8161 4.35219 12.2766 4.78093 11.6682 5.08947L11.6873 5.09083Z" fill="#C1C7D0"/>
                        </svg>
                        <span class="ms-2">Sign In with Apple ID</span>
                    </button>
                </div>

                <div class="separator" style="margin: 38px 0;">
                    <span>OR</span>
                </div>

                <!-- Email input -->
                <div class="input-group my-4">
                    <span class="input-group-text" id="email-addon">@</span>
                    <input type="email" id="email" class="form-control" placeholder="Your Email" aria-describedby="email-addon" required />
                </div>

                <!-- Password input -->
                <div class="input-group mb-4">
                    <span class="input-group-text" id="password-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" id="password" class="form-control" placeholder="Password"  aria-describedby="password-addon" required />
                </div>

                <div class="d-flex justify-content-between">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="remember_me" checked>
                        <label class="form-check-label" for="remember_me" >
                            Remember Me
                        </label>
                    </div>
                    <a class="no-color text-decoration-none" href="javascript:;" data-bs-toggle="modal" data-bs-target="#requestModal" style="font-size: 16px">Forgot Password?</a>    
                </div>

                <!-- Submit button -->
                <div class="my-4" style="justify-content: space-between;">
                    <button type="submit" class="btn btn-primary w-100">Sign in</button>
                </div>

                <div class="text-center"  style="font-size: 16px;">
                    Don't have an account? 
                    <a class="text-decoration-none" href="<?=site_url()?>sign_up">Sign Up</a>
                </div>
            </form>
        </div>
    </div>




  <!--   <div class="modal fade" id="requestModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    </div> -->
    
</body> 
</html>