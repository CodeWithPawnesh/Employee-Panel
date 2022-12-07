<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Job Updates Edit</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="admin/job_edit" method="post">
                            <input type="hidden" name="job_id" value="<?= $_GET['id'] ?>">
                            <input type="hidden" name="batch_id" value="<?= $job_data['batch_id'] ?>">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Job Title</label>
                                    </div>
                                    <div class="form-group">
                                      <input type="text" name="title" value="<?= $job_data['job_title'] ?>" class="form-control" rquired>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Job Updates Description</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="job_desc" class="form-control"><?= $job_data['job_description'] ?></textarea>
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
<script>
CKEDITOR.replace('job_desc');
</script>