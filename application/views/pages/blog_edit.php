<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Blog Edit</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="Blog/edit" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="blog_id" value="<?= $_GET['id'] ?>">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Blog Name</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="name" value=" <?= $edit_data['blog_name'] ?>" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Blog Title</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="title" value="<?= $edit_data['blog_title'] ?>" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Blog Description</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="description" class="form-control"><?= $edit_data['blog_description'] ?></textarea>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Blog Image</label>
                                    </div>
                                        <input type="file" name="file" class="form-control">
                                        <input type="hidden" name="h_file" value="<?= $edit_data['image'] ?>">
                                        <br>
                                        <div style="padding-left:150px;padding-right:150px">
                                        <img src="assets/images/blog/<?= $edit_data['image'] ?>"
                                            style="width:200px;height:150px">
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
CKEDITOR.replace('description');
</script>