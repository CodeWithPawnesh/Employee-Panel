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
                            <h4 class="card-title">Profile Edit</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="Panel/profile_edit" method="post">
                            <input type="hidden" name="emp_id" value="<?= $employee_data['emp_id'] ?>">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Live Link</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="live_link" class="form-control"value="<?= $employee_data['live_link'] ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Name</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="name" value="<?= $employee_data['emp_name'] ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Education</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="education" value="<?= $employee_data['education'] ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>
                                            Address
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="address" value="<?= $employee_data['address'] ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>E-mail</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" value="<?= $employee_data['email'] ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="number" value="<?= $employee_data['phone'] ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="submit" class="btn btn-sm btn-success">Submit</button>
                            </div>
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