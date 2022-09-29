<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <?php if(isset($_GET['batch_id'])){ ?>
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Add Instructor In Batch</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="admin/add_instructor" method="post">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Select Instructors for The Batch</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="batch_id" value="<?= $_GET['batch_id']; ?>">
                                        <div class="multi_select_box">
                                            <select name="instructor_id[]" data-live-search="true"
                                                title="Choose Instructors From the Following Options..."
                                                data-selected-text-format="count>3" data-actions-box="true"
                                                class="form-control my-select" multiple required>
                                                <?php foreach($batch_inst_data as $b_i_d){ ?>
                                                <option value="<?= $b_i_d['emp_id'] ?>"><?= $b_i_d['emp_name'] ; ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit" name="submit" class="btn btn-sm btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php } ?>
                <?php if(isset($_GET['group_id'])){ ?>
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Add Instructor In Group</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="admin/add_instructor" method="post">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Select Instructors for The Group</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="group_id" value="<?= $_GET['group_id']; ?>">
                                        <div class="multi_select_box">
                                            <select name="instructor_id[]" data-live-search="true"
                                                title="Choose Instructors From the Following Options..."
                                                data-selected-text-format="count>3" data-actions-box="true"
                                                class="form-control my-select" multiple required>
                                                <?php foreach($group_inst_data as $b_i_d){ ?>
                                                <option value="<?= $b_i_d['emp_id'] ?>"><?= $b_i_d['emp_name'] ; ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit" name="inst_add_submit"
                                    class="btn btn-sm btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php } ?>
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
$(document).ready(function() {
    $('.my-select').selectpicker();
});
</script>