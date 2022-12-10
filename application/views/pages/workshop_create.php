<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Workshop Create</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if(!isset($_POST['type'])){ ?>
                        <form method="post">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Choose Type OF Workshop</label>
                                    </div>
                                    <div class="form-group">
                                        <select name="type" class="form-control">
                                            <option value="1">Online</option>
                                            <option value="2">Offline</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit" class="btn btn-sm btn-success">Next</button>
                            </div>
                        </form>
                        <?php } if(isset($_POST['type'])){ ?>
                        <form action="Workshop/create" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="type" value="<?= $_POST['type'] ?>">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Workshop Name</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Workshop Title</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="title" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Workshop Description</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="description" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Workshop Image</label>
                                    </div>
                                        <input type="file" name="file" class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Start Date</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="date" name="s_date" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Start Time</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="time" name="s_time" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>End Date</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="date" name="e_date" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>End Time</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="time" name="e_time" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <?php if($_POST['type']== '1'){ ?>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Workshop Trainer Email-Id</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="trainer_email" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Workshop Live Link</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="workshop_address" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <?php if($_POST['type']== '2'){ ?>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Workshop Trainer Email-Id</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="trainer_email" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Workshop Physical Address</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="workshop_address" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
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