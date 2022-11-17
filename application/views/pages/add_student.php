<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Add Student</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if(!isset($_POST['course_data']) && !isset($_POST['batch_data'])){ ?>
                        <form action="" method="post">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Select a Course For Student</label>
                                    </div>
                                    <div class="form-group">
                                        <select name="course_data" class="form-control" required>
                                            <option value="0">Select Any One Option</option>
                                            <?php foreach($course_data AS $c_d){ ?>
                                            <option value="<?= $c_d['course_id']; ?>">
                                                <?= $c_d['course_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit" class="btn btn-sm btn-success">Next</button>
                            </div>
                        </form>
                        <?php } if(isset($_POST['course_data']) && !isset($_POST['batch_data'])){ ?>
                        <form action="" method="post">
                            <input type="hidden" name="course_id" value="<?= $_POST['course_data'] ?>">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Select a Batch for Student</label>
                                    </div>
                                    <div class="form-group">
                                        <select name="batch_data" class="form-control" required>
                                            <option value="0">Select Any One Option</option>
                                            <?php foreach($batch_data AS $b_d){ ?>
                                            <option value="<?= $b_d['batch_id']; ?>">
                                                <?= $b_d['batch_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit" class="btn btn-sm btn-success">Next</button>
                            </div>
                        </form>
                        <?php } if(isset($_POST['batch_data'])){ ?>
                        <form action="" method="post">
                            <input type="hidden" name="course_id" value="<?= $_POST['course_id'] ?>">
                            <input type="hidden" name="batch_id" value="<?= $_POST['batch_data'] ?>">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Select a group for the student</label>
                                    </div>
                                    <div class="form-group">
                                        <select name="group_id" class="form-control" required>
                                            <option value="0">Select Any One Option</option>
                                            <?php foreach($group_data AS $g_d){ ?>
                                            <option value="<?= $g_d['group_id']; ?>">
                                                <?= $g_d['group_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Enter Student Name</label>
                                    </div>
                                    <div class="form-gorup">
                                        <input type="text" name="student_name" class="form-control"
                                            placeholder="Student Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Enter Student E-mail</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control"
                                            placeholder="Student E-mail" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Enter Your Ph No</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="phone" class="form-control" placeholder="Phone Number" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit" name="submit" class="btn btn-sm btn-success">Submit</button>
                            </div>
                        </form>
                        <?php } ?>
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