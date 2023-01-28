<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Certificate Edit</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="Certificate-Edit" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>line 1</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="line1" class="form-control" value="<?= $certificate_data['line1'] ?>" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>line 2</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="line2" class="form-control" value="<?= $certificate_data['line2'] ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>line 3</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="line3" class="form-control" value="<?= $certificate_data['line3'] ?>" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Image</label>
                                    </div>
                                        <input type="file" name="image" class="form-control" >
                                        <input type="hidden" name="h_image" value="<?= $certificate_data['certificate_image'] ?>">
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