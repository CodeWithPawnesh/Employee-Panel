<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">batch Edit</h4>
                        </div>
                    </div>
                    <div class="card-body">
                    <form action="admin/batch_edit" method="post">
                            <input type="hidden" name="id" value = "<?= $_GET['id']; ?>">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course</label>
                                    </div>
                                    <div class="form-group">
                                        <select name="course_id" class="form-control">
                                            <option value="0">Select Any One Option</option>
                                            <option <?php  if($batch_edit_data['course_id']=="1"){?> Selected<?php } ?> value="1">course1</option>
                                            <option <?php  if($batch_edit_data['course_id']=="2"){?> Selected<?php } ?> value="2">course2</option>
                                            <option <?php  if($batch_edit_data['course_id']=="3"){?> Selected<?php } ?> value="3">course3</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                 <div class="form-group">
                                <label>Batch Name</label>
                                 </div>
                                 <div class="form-group">
                                   <input type="text" value="<?php echo $batch_edit_data['batch_name']; ?>" class="form-control" name="batch_name">
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