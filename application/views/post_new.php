    <script type="text/javascript" src="<?=base_url()?>assets/js/posts.js"></script>

    <div class="container mt-4">
        <div class="m-auto" style="max-width: 800px;">
            <form id="new_post_form">
                <!-- Email input -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-4">
                            <label class="form-label" for="my_job">I'm a</label>
                            <select class="form-select" id="my_job">
                                <?php 
                                foreach($jobs as $job){
                                    echo "<option value='" . $job['id'] . "'>" . $job['job_name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-4">
                            <label class="form-label" for="looking_job">Looking for a</label>
                            <select class="form-select" id="looking_job">
                                <?php 
                                foreach($jobs as $job){
                                    echo "<option value='" . $job['id'] . "'>" . $job['job_name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label" for="post_title">Title</label>
                    <input type="text" id="post_title" class="form-control" required />
                </div>

                <!-- Password input -->
                <div class="mb-4">
                    <label class="form-label" for="post_detail">Tell Us More</label>
                    <textarea id="post_detail" class="form-control" rows="10" required /></textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label" for="purpose">Purpose</label>
                    <select class="form-select" id="purpose">
                        <option vlaue="Freelancing together">Freelancing together</option>
                        <option vlaue="Fun">Fun</option>
                        <option vlaue="Learning">Learning</option>
                    </select>
                </div>

                <!-- Submit button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    
</body> 
</html>