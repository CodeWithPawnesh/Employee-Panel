<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Batch Create</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="Batch-Create" method="post">
                            <?php if(!isset($_POST['course_data'])){ ?>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course</label>
                                    </div>
                                    <div class="form-group">
                                        <select name="course_data" class="form-control" required>
                                            <option value="0">Select Any One Option</option>
                                            <?php foreach($course_data AS $c_d){ ?>
                                            <option
                                                value="<?= $c_d['course_id']; ?>,<?= $c_d['course_abber']; ?>,<?= $c_d['course_name']; ?>">
                                                <?= $c_d['course_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit" class="btn btn-sm btn-success">Next</button>
                            </div>
                            <?php }else{ ?>
                            <input type="hidden" name="course" value="<?= $_POST['course_data'] ?>">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Select One Trainer</label>
                                    </div>
                                    <div class="from-group">
                                        <select name="trainer" class="form-control" required>
                                            <option value="0">Select Any One Option</option>
                                            <?php foreach($trainer_data AS $t_d){ ?>
                                            <option value="<?= $t_d['emp_id']; ?>">
                                                <?= $t_d['emp_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Class Timing</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="time" name="class_ts" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Batch Start Date</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="date" name="start_date" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Batch End Date</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="date" name="end_date" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>No. of Slots</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="slots" class="form-control" required>
                                    </div>
                                </div>      
                            </div>
                    </div>
                    <div class="card-footer ">
                        <button type="submit" name="submit" class="btn btn-sm btn-success">Submit</button>
                    </div>
                    <?php } ?>
                    </form>
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