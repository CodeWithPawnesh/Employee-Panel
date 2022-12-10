<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Workshop Edit</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="Workshop/edit" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="workshop_id" value="<?= $edit_data['workshop_id'] ?>">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Workshop Name</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="name" value="<?= $edit_data['workshop_name'] ?>" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Workshop Title</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="title" value="<?= $edit_data['workshop_title'] ?>" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Workshop Description</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="description" class="form-control"><?= $edit_data['workshop_description'] ?></textarea>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Workshop Image</label>
                                    </div>
                                        <input type="file" name="file" class="form-control">
                                        <input type="hidden" name="h_file" value="<?= $edit_data['image'] ?>">
                                        <br>
                                    <div style="padding-left:150px;padding-right:150px">
                                        <img src="assets/images/workshop/<?= $edit_data['image'] ?>"
                                            style="width:200px;height:150px">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Start Date</label>
                                    </div>
                                    <div class="form-group">
                                        <?php $s_date_time = explode(",",$edit_data['start_date_time']);?>
                                        <input type="date" name="s_date" class="form-control" value="<?= $s_date_time[0]?>" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Start Time</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="time" name="s_time" class="form-control" value="<?= $s_date_time[1]?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>End Date</label>
                                    </div>
                                    <?php $e_date_time = explode(",",$edit_data['start_date_time']);?>
                                    <div class="form-group">
                                        <input type="date" name="e_date" class="form-control" value="<?= $e_date_time[0]?>" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>End Time</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="time" name="e_time" class="form-control" value="<?= $e_date_time[1] ?>" required>
                                    </div>
                                </div>
                            </div>
                            <?php if($edit_data['workshop_type']== '1'){ ?>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Workshop Trainer Email-Id</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="trainer_email" class="form-control" value="<?= $edit_data['trianer_email'] ?>" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Workshop Live Link</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="workshop_address" class="form-control" value="<?= $edit_data['workshop_address'] ?>" required>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <?php if($edit_data['workshop_type']== '2'){ ?>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Workshop Trainer Email-Id</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="trainer_email" class="form-control" value="<?= $edit_data['trainer_email'] ?>" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Workshop Physical Address</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="workshop_address" class="form-control" value="<?= $edit_data['workshop_address'] ?>" required>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
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