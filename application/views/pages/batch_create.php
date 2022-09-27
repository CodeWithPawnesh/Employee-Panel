<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Batch Create</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="admin/batch_create" method="post">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course</label>
                                    </div>
                                    <div class="form-group">
                                        <select name="course_data" class="form-control" required>
                                            <option value="0">Select Any One Option</option>
                                            <?php foreach($course_data AS $c_d){ ?>
                                            <option value="<?= $c_d['course_id']; ?>,<?= $c_d['course_abber']; ?>"><?= $c_d['course_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                 <div class="form-group">
                                <label>Batch Name</label>
                                 </div>
                                 <div class="form-group">
                                   <input type="text" name="batch_name" class="form-control" placeholder="Start Writing Here..." required>
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
</div>
