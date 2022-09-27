<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Assignment Edit</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="Assignment/assignment_edit" method="post">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Edit Assignment </label>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="assignment" class="form-control" id="" cols="30"
                                            rows="10"><?= $assignment_data['assignment']; ?></textarea>
                                            <input type="hidden" name="assignment_id" value= "<?= $_GET['id']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Assignment Start Date</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="date" name="start_date" value="<?= date('Y-m-d',$assignment_data['start_date']); ?>" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Assignment Deadline</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="date" name="end_date" value="<?= date('Y-m-d',$assignment_data['end_date']); ?>" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button name="submit" type="submit" class="btn btn-sm btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>