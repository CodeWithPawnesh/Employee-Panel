<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Assignment List</h4>
                        </div>
                    </div>

                    <div class="card-body">
                    <a href="<?= base_url('Assignment-Create') ?>" class="btn btn-md btn-success">Create</a>
                        <table class="table table-hover">
                            <caption>List of Assignment</caption>
                            <thead>
                                <tr>

                                    <th class="text-center">#</th>
                                    <th class="text-center">Assignment</th>
                                    <th class="text-center">Course</th>
                                    <th class="text-center">Batch</th>
                                    <th class="text-center">Group</th>
                                    <th class="text-center">Assignment Start</th>
                                    <th class="text-center">Assignment Deadline</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                            <?php  if(!empty($assignment_data)){ $i=1; foreach ($assignment_data as $a_d) { ?>
                                <tr>
                                    <td class="text-center"><?= $i++; ?></td>
                                    <td class="text-center"><?php echo $a_d['assignment']; ?></td>
                                    <td class="text-center"><?php echo $a_d['course_name']; ?></td>
                                    <td class="text-center"><?php echo $a_d['batch_name']; ?> ( <?php echo $a_d['batch_number']; ?> )</td>
                                    <td class="text-center"><?php echo $a_d['group_name']; ?> ( <?php echo $a_d['group_number']; ?> )</td>
                                    <td class="text-center"><?php echo date('d M, Y',$a_d['start_date']); ?></td>
                                    <td class="text-center"><?php echo date('d M, Y',$a_d['end_date']); ?></td>
                                    <?php if($a_d['status']=='1'){ ?>
                                    <td class="text-center text-success">Active</td>
                                    <?php } ?>
                                    <?php if($a_d['status']=='0'){ ?>
                                    <td class="text-center text-danger">In-Active</td>
                                    <?php } ?>
                                    <td class="text-center">
                                        <a href="<?= base_url('Assignment-Edit?id=');echo $a_d['assignment_id']; ?>" class="btn btn-sm btn-success">Edit</a>
                                        <br>
                                        <?php if($a_d['status']=='1'){ ?>
                                            <a href="<?= base_url('Assignment?id='); echo $a_d['assignment_id']; ?>&status=0" class="btn btn-sm btn-danger">Un-Publish</a>
                                         <?php } ?>
                                         <?php if($a_d['status']=='0'){ ?>
                                            <a href="<?= base_url('Assignment?id='); echo $a_d['assignment_id']; ?>&status=1" class="btn btn-sm btn-success">Publish</a>
                                         <?php } ?>
                                    </td>
                                </tr>
                                <?php } }else{?>
                                <h1 class="text-center text-warning" >No Data Found</h1>
                                <?php } ?>
                            </tbody>

                        </table>
                        <?php  if(!empty($assignment_data)){ ?>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                <li class="page-item <?php if(!isset($_GET['page']) || $_GET['page']==1){ ?>disabled <?php } ?>">
                                    <a class="page-link" href="<?= base_url('Assignment?page='); if(isset($_GET['page'])){ echo $_GET['page']-1 ; } ?>" tabindex="-1">Previous</a>
                                </li>
                                <?php for($i=1; $i<=$total_pages;$i++){ ?>
    
                                <li class="page-item"><a class="page-link" href="<?= base_url('Assignment?page='); echo $i ?>"><?= $i; ?></a></li>
                                <?php } ?>
                                <li class="page-item <?php if($total_pages <= 1){?> disabled <?php } ?>" >
                                    <a class="page-link" href="<?= base_url('Assignment?page=');if(isset($_GET['page'])){ echo $_GET['page']+1 ; }else echo "1"; ?>">Next</a>
                                </li>
                            </ul>
                        </nav>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>