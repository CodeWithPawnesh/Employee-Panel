<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <?php if(!isset($_POST['course_id'])){ ?>
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Group Create</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course</label>
                                    </div>
                                    <div class="form-group">
                                        <select name="course_id" class="form-control">
                                            <?php foreach($course_data as $c_d){ ?>
                                            <option value="<?= $c_d['course_id'] ; ?>"><?= $c_d['course_name']; ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer ">
                        <button class="btn btn-sm btn-success">Next</button>
                    </div>
                    </form>
                </div>
                <?php } if(isset($_POST['course_id'])){ ?>
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Group Create</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="admin/group_create" method="post">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Select One Batch</label>
                                    </div>
                                    <input type="hidden" name="course_id" value="<?= $_POST['course_id']; ?>">
                                    <div class="form-group">
                                        <select name="batch_id" class="form-control">
                                            <?php foreach($batch_data as $b_d){ ?>
                                            <option value="<?= $b_d['batch_id'] ; ?>"><?= $b_d['batch_name']; ?>
                                                (<?= $b_d['batch_number']; ?>)</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Group Name</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="group_name" required>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer ">
                        <button type="submit" name="submit" class="btn btn-sm btn-success">Submit</button>
                    </div>
                    </form>
                </div>
                <?php } ?>
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