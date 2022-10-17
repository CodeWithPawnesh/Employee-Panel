<?php
$emp_info = $this->session->userdata('emp_data');
?>
<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Profile</h4>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <label class="col-sm-3 col-form-label"> Name*</label>
                            <div class="col">
                                <input type="text" class="form-control" name="name" id="name"
                                    value="<?= $emp_info->emp_name; ?>" disabled>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Role</label>
                            <div class="col">
                                <input type="text" class="form-control" name="name" id="name"
                                   <?php if($emp_info->role == 0){ ?> value="Admin" <?php } ?> 
                                   <?php if($emp_info->role == 1){ ?> value="Trainer" <?php } ?>
                                   <?php if($emp_info->role == 2){ ?> value="Instructor" <?php } ?>
                                   disabled>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Designation</label>
                            <div class="col">
                                <input type="text" class="form-control" name="name" id="name"
                                    value="<?= $emp_info->designation; ?>" disabled>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Education</label>
                            <div class="col">
                                <input type="text" class="form-control" name="name" id="name"
                                    value="<?= $emp_info->education; ?>" disabled>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Address</label>
                            <div class="col">
                                <input type="text" class="form-control" name="name" id="name"
                                    value="<?= $emp_info->address; ?>" disabled>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col">
                                <input type="text" class="form-control" name="name" id="name"
                                    value="<?= $emp_info->email; ?>" disabled>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Phone Number</label>
                            <div class="col">
                                <input type="text" class="form-control" name="name" id="name"
                                    value="<?= $emp_info->phone; ?>" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="container">
        <div class="copyright pull-right">
            &copy;
            <script>
            document.write(new Date().getFullYear())
            </script>,Think-Champ
        </div>
    </div>
</footer>
<a class="text-white shadow" href="?page=student_chat"
    style="z-index:9999; position:fixed; bottom:30px; right:20px; height:60px; width:60px; border-radius:1000px; background: #e91e63; padding-top:15px; text-align:center">
    <i class="material-icons" style="font-size:35px">forum</i>
</a>
</div>
</div>
</body>