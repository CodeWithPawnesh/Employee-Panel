<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Notification Create</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if(!isset($_POST['type'])){ ?>
                        <form method="post">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        Notification Type
                                    </div>
                                    <div class="form-group">
                                        <select name="type" class="form-control">
                                            <option value="0">ALL</option>
                                            <option value="1">All Teacher Only</option>
                                            <option value="2">All Student Only</option>
                                            <option value="4">One Batch</option>
                                            <option value="5">One Group</option>
                                            <option value="6">One Teacher</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit" class="btn btn-sm btn-success">Next</button>
                            </div>
                        </form>
                        <?php } if(isset($_POST['type'])){ ?>
                        <form action="Notification/create" method="post">
                            <input type="hidden" name="type" value="<?= $_POST['type'] ?>">
                            <div class="row">
                                <?php if($_POST['type']==4){ ?>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Select One Batch</label>
                                    </div>
                                    <div class="form-group">
                                        <Select name="batch_id" class="form-control">
                                            <?php foreach($batch_data as $b_d){ ?>
                                            <option value="<?= $b_d['batch_id'] ?>"><?= $b_d['batch_name'] ?></option>
                                            <?php } ?>
                                        </Select>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php if($_POST['type']==5){ ?>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Select One Group</label>
                                    </div>
                                    <div class="form-group">
                                        <Select name="group_id" class="form-control">
                                            <?php foreach($group_data as $g_d){ ?>
                                            <option value="<?= $g_d['group_id'] ?>"><?= $g_d['group_name'] ?></option>
                                            <?php } ?>
                                        </Select>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php if($_POST['type']==6){ ?>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Select One Teacher</label>
                                    </div>
                                    <div class="form-group">
                                        <Select name="teacher_id" class="form-control">
                                            <?php foreach($teacher_data as $t_d){ ?>
                                            <option value="<?= $t_d['emp_id'] ?>"><?= $t_d['emp_name'] ?></option>
                                            <?php } ?>
                                        </Select>
                                       
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Notification Name</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Notification Title</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="title" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Notification Description</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="description" class="form-control"></textarea>
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