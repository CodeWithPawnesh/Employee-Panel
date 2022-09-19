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
                                        <select name="course_id" class="form-control">
                                            <option value="0">course1</option>
                                            <option value="1">course2</option>
                                            <option value="2">course3</option>
                                            <option value="3">course4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                 <div class="form-group">
                                <label>Batch Name</label>
                                 </div>
                                 <div class="form-group">
                                   <input type="text" name="batch_name">
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