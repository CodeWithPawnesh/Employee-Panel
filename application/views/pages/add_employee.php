<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Add Employee</h4>
                        </div>
                    </div>
                    <form action="Panel/add_employee" method="post">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Select Employee Role</label>
                                    </div>
                                    <div class="form-group">
                                        <select name="role" class="form-control">
                                            <option value="" selected disabled>Choose Any One Option...</option>
                                            <option value="0">Admin</option>
                                            <option value="1">Trainer</option>
                                            <option value="2">Instructor</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Select Any One Course</label>
                                    </div>
                                    <div class="form-group">
                                        <select name="course" class="form-control">
                                            <option value="" selected disabled>Choose Any One Option...</option>
                                            <?php foreach($course_data as $c_d) ?>
                                            <option value="<?= $c_d['course_id'] ?>"><?= $c_d['course_name'] ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Employee Name</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="emp_name" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Enter Employee Phone</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="emp_phone" class="form-control" required max-length="13">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Enter Employee E-mail ID</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Enter Education</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="education" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Employee Account Password</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="password" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit" name="submit" class="btn btn-sm btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
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