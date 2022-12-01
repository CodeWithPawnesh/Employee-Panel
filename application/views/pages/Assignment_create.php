<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Assignment Create</h4>
                        </div>
                    </div>
                    <?php
                    $user_info = $this->session->userdata('user_data');
                    if($user_info->access_level==0){
                    if(!isset($_POST['course_id']) && !isset($_POST['batch_id'])){ ?>
                    <div class="card-body">
                        <form method="post">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Select A Course</label>
                                    </div>
                                    <div class="form-group">
                                        <select name="course_id" class="form-control" required>
                                            <option value="0">Select Any One Option</option>
                                            <?php if(!empty($course_data)){ 
                                                foreach($course_data as $c_d){
                                             ?>
                                            <option value="<?= $c_d['course_id']; ?>"><?= $c_d['course_name']; ?>
                                            </option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button class="btn btn-sm btn-success">Next</button>
                            </div>
                        </form>
                    </div>
                    <?php } ?>
                    <?php if(isset($_POST['course_id']) ){ ?>
                    <div class="card-body">
                        <form method="post">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Select A Batch</label>
                                    </div>
                                    <div class="form-group">
                                        <select name="batch_id" class="form-control" required>
                                            <option value="0">Select Any One Option</option>
                                            <?php if(!empty($batch_data)){ 
                                                foreach($batch_data as $b_d){
                                             ?>
                                            <option value="<?= $b_d['batch_id']; ?>"><?= $b_d['batch_name']; ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button class="btn btn-sm btn-success">Next</button>
                            </div>
                        </form>
                    </div>
                    <?php } ?>
                    <?php if(isset($_POST['batch_id']) ){ ?>
                    <div class="card-body">
                        <form action="Assignment/assignment_create" method="post">
                        <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Select A Group</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="batch_id" value="<?= $_POST['batch_id']; ?>">
                                        <select name="group_id" class="form-control" required>
                                            <option value="0">Select Any One Option</option>
                                            <?php if(!empty($group_data)){ 
                                                foreach($group_data as $g_d){
                                             ?>
                                            <option value="<?= $g_d['group_id']; ?>"><?= $g_d['group_name']; ?>
                                                (<?= $g_d['group_number']; ?>)</option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Create Assignment </label>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="batch_id" value="<?= $_POST['batch_id']; ?>">
                                        <input type="hidden" name="group_id" value="<?= $_POST['group_id']; ?>">
                                        <textarea name="assignment" class="form-control" id="" cols="30"
                                            rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Assignment Start Date</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="date" name="start_date" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Assignment Deadline</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="date" name="end_date" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button name="submit" type="submit" class="btn btn-sm btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                    <?php } }if($user_info->access_level==1){ ?>
                    <div class="card-body">
                        <form action="Assignment/assignment_create" method="post">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Select Any One Batch</label>
                                    </div>
                                    <div class="form-group">
                                        <select name="batch" class="form-control">
                                            <option value="" disabled selected>Select Any One Option</option>
                                            <?php foreach($batch_data AS $b_d){ ?>
                                            <option value="<?= $b_d['batch_id'] ?>"><?= $b_d['batch_name']; echo "(".$b_d['batch_number'].")"; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Create Assignment </label>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="assignment" class="form-control" id="" cols="30"
                                            rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Assignment Start Date</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="date" name="start_date" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Assignment Deadline</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="date" name="end_date" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button name="submit" type="submit" class="btn btn-sm btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                    <?php } if($user_info->access_level==2){ ?>
                    <div class="card-body">
                        <form action="Assignment/assignment_create" method="post">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Select Any One Group</label>
                                    </div>
                                    <div class="form-group">
                                        <select name="group_batch" class="form-control">
                                            <option value="" disabled selected>Select Any One Option</option>
                                            <?php foreach($group_data as $g_d){ ?>
                                            <option value="<?= $g_d['group_id']?>,<?= $g_d['batch_id'] ?>"><?= $g_d['group_name']."(".$g_d['group_number'].")"; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Create Assignment </label>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="assignment" class="form-control" id="" cols="30"
                                            rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Assignment Start Date</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="date" name="start_date" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Assignment Deadline</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="date" name="end_date" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button name="submit" type="submit" class="btn btn-sm btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                    <?php } ?>
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