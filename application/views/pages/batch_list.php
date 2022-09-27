<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Batch List</h4>
                        </div>
                    </div>

                    <div class="card-body">
                    <a href="<?= base_url('Batch-Create') ?>" class="btn btn-md btn-success">Create</a>
                        <table class="table table-hover">
                            <caption>List of Batches</caption>
                            <thead>
                                <tr>

                                    <th class="text-center">#</th>
                                    <th class="text-center">Batch Name</th>
                                    <th class="text-center">Batch Number</th>
                                    <th class="text-center">Instructor</th>
                                    <th class="text-center">Course</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach ($batch_data as $b_d) { ?>
                                <tr>
                                    <td class="text-center"><?= $i++; ?></td>
                                    <td class="text-center"><?php echo $b_d['batch_name']; ?></td>
                                    <td class="text-center"><?php echo $b_d['batch_number']; ?></td>
                                    <td class="text-center"><a href="<?= base_url('Batch-Instructor-List?page=1&batch_id='); echo $b_d['batch_id']?>" class="">View Instructors</a></td>
                                    <td class="text-center"><?php echo $b_d['course_name']; ?></td>
                                    <?php if($b_d['status']=='1'){ ?>
                                    <td class="text-center text-success">Active</td>
                                    <?php } ?>
                                    <?php if($b_d['status']=='0'){ ?>
                                    <td class="text-center text-danger">In-Active</td>
                                    <?php } ?>
                                    <td class="text-center">
                                        <a href="<?= base_url('Batch-Edit?id=');echo $b_d['batch_id']; ?>" class="btn btn-sm btn-success">Edit</a>
                                        <br>
                                        <?php if($b_d['status']=='1'){ ?>
                                            <a href="<?= base_url('Batch-List?id='); echo $b_d['batch_id']; ?>&status=0" class="btn btn-sm btn-danger">Un-Publish</a>
                                         <?php } ?>
                                         <?php if($b_d['status']=='0'){ ?>
                                            <a href="<?= base_url('Batch-List?id='); echo $b_d['batch_id']; ?>&status=1" class="btn btn-sm btn-success">Publish</a>
                                         <?php } ?>
                                    </td>
                                </tr>
                                <?php } ?>
                                
                                
                            </tbody>

                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                <li class="page-item <?php if(!isset($_GET['page']) || $_GET['page']==1){ ?>disabled <?php } ?>">
                                    <a class="page-link" href="<?= base_url('Batch-List?page='); if(isset($_GET['page'])){ echo $_GET['page']-1 ; } ?>" tabindex="-1">Previous</a>
                                </li>
                                <?php for($i=1; $i<=$total_pages;$i++){ ?>
    
                                <li class="page-item"><a class="page-link" href="<?= base_url('Batch-List?page='); echo $i ?>"><?= $i; ?></a></li>
                                <?php } ?>
                                <li class="page-item <?php if($total_pages <= 1){?> disabled <?php } ?>" >
                                    <a class="page-link" href="<?= base_url('Batch-List?page=');if(isset($_GET['page'])){ echo $_GET['page']+1 ; }else echo "1"; ?>">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>