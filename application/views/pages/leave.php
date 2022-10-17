<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Add Leave</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if(!isset($_POST['leave_type'])){ ?>
                        <form action="" method="post">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>
                                            Choose Leave Type
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <select name="leave_type" class="form-control">
                                            <option value="" disabled selected>Choose Any One Type...</option>
                                            <option value="1">One Day Leave</option>
                                            <option value="2">More Then One Day Leave</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit" name="Next" class="btn btn-sm btn-success">Next</button>
                            </div>
                        </form>
                        <?php } if(isset($_POST['leave_type'])){ ?>
                        <form action="" method="post">
                            <?php if($_POST['leave_type']==2){ ?>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>
                                            Leave Start Date
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <input type="date" name="start_date"
                                            min="<?= date('Y-m-d', strtotime(' +1 day')) ?>" class="form-control"
                                            required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>
                                            Leave End Date
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <input type="date" name="end_date" class="form-control"
                                            min="<?= date('Y-m-d', strtotime(' +1 day')) ?>"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <?php } if($_POST['leave_type']==1){ ?>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>
                                            Choose Leave Day
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <input type="date" name="start_date"
                                            min="<?= date('Y-m-d', strtotime(' +1 day')) ?>" class="form-control"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Leave's Reason</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="reason" class="form-control" required></textarea>
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