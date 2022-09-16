<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Testimonial List</h4>
                        </div>
                    </div>

                    <div class="card-body">
                    <a href="<?= base_url('Testimonial-Create') ?>" class="btn btn-md btn-success">Create</a>
                        <table class="table table-hover">
                            <caption>List of users</caption>
                            <thead>
                                <tr>

                                    <th class="text-center">Testimonial_id</th>
                                    <th scope="col">Testimonial_desc</th>
                                    <th scope="col">Star rating</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($testimonial_data as $row) { ?>
                                <tr>
                                    <td><?php echo $row['testimonial_id']; ?></td>
                                    <td><?php echo $row['testimonial_desc']; ?></td>
                                    <td><?php echo $row['star_rating']; ?> Stars</td>
                                    <?php  if($row['status']=='1'){ ?>
                                    <td class="text-success">Active</td>
                                    <?php } ?>
                                    <?php  if($row['status']=='0'){ ?>
                                    <td class="text-danger">In Active</td>
                                    <?php } ?>
                                    <td><a href="<?= base_url('Testimonial-Edit?id=');echo $row['testimonial_id']; ?>" class="btn btn-sm btn-success">Edit</a></td>
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