<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Group List</h4>
                        </div>
                    </div>

                    <div class="card-body">
                    <a href="<?= base_url('Group-Create') ?>" class="btn btn-md btn-success">Create</a>
                        <table class="table table-hover">
                            <caption>List of users</caption>
                            <thead>
                                <tr>

                                    <th class="text-center">Group_Id</th>
                                    <th scope="col">Group Name</th>
                                    <th scope="col">Course</th>
                                    <th scope="col">Batch</th>

                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($group_data as $row) { ?>
                                <tr>
                                    <td><?php echo $row['group_id']; ?></td>
                                    <td><?php echo $row['group_name']; ?></td>
                                    <td><?php echo $row['course_id']; ?></td>
                                    <td><?php echo $row['batch_id']; ?></td>
                                    <td><a href="<?= base_url('Group-Edit?id=');echo $row['group_id']; ?>" class="btn btn-sm btn-success">Edit</a></td>
                                </tr>
                                <?php } ?>
                                
                                
                            </tbody>

                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>