<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Edit Student</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="Student-Edit" method="post">
                            <input type="hidden" name="u_id" value="<?= $student_data['id'] ?>">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Student Name</label>
                                    </div>
                                    <div class="form-group">
                                       <input type="text" name="name" value="<?= $student_data['student_name'] ?>" class="form-control" rquired>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Address</label>
                                    </div>
                                    <div class="form-group">
                                    <input type="text" name="address" value="<?= $student_data['address'] ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Student E-mail</label>
                                    </div>
                                    <div class="form-group">
                                    <input type="email" name="email" value="<?= $student_data['email'] ?>" class="form-control" rquired>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Student Phone</label>
                                    </div>
                                    <div class="form-group">
                                    <input type="number" name="phone" value="<?= $student_data['phone'] ?>" class="form-control" rquired>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Student Password</label>
                                    </div>
                                    <div class="form-group">
                                    <input type="text" name="password" value="<?= $student_data['password'] ?>" class="form-control" rquired>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Student Collage</label>
                                    </div>
                                    <div class="form-group">
                                    <input type="text" name="collage" value="<?= $student_data['collage'] ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Collage Year</label>
                                    </div>
                                    <div class="form-group">
                                    <input type="number" name="year" value="<?= $student_data['year'] ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit" name="submit" class="btn btn-sm btn-success">Submit</button>
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