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
                        <?php if(!empty($batch_data)){ ?>
                        <table class="table table-hover table-responsive">
                            <caption>List of Batches</caption>
                            <thead>
                                <tr>

                                    <th class="text-center">#</th>
                                    <th class="text-center">Batch Name</th>
                                    <th class="text-center">Batch Number</th>
                                    <th class="text-center">Slots</th>
                                    <th class="text-center">Trainer</th>
                                    <th class="text-center">Group & Instructor</th>
                                    <th class="text-center">Course</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>

                                </tr>
                            </thead>
                            <tbody> 
                                <?php  $i=1; foreach ($batch_data as $b_d) { ?>
                                <tr>
                                    <td class="text-center"><?= $i++; ?></td>
                                    <td class="text-center"><?php echo $b_d['batch_name']; ?></td>
                                    <td class="text-center"><?php echo $b_d['batch_number']; ?></td>
                                    <td class="text-center"><?php echo $b_d['slots']; ?></td>
                                    <td class="text-center"><?= $b_d['emp_name'] ?></td>
                                    <td class="text-center"><a
                                            href="<?= base_url('Batch-Instructor-List?page=1&batch_id='); echo $b_d['batch_id']?>"
                                            class="">View</a></td>
                                    <td class="text-center"><?php echo $b_d['course_name']; ?></td>
                                    <?php if($b_d['status']=='1'){ ?>
                                    <td class="text-center text-success">Active</td>
                                    <?php } ?>
                                    <?php if($b_d['status']=='0'){ ?>
                                    <td class="text-center text-danger">In-Active</td>
                                    <?php } ?>
                                    <td class="text-center">
                                <div class="dropdown show">
                                       <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a href="<?= base_url('Batch-Edit?id=');echo $b_d['batch_id']; ?>"
                                            class="dropdown-item">Edit</a>
                                        <a href="<?= base_url('Batch-List?delete_id=');echo $b_d['batch_id']; ?>"
                                            class="dropdown-item">Delete</a>
                                        <?php if($b_d['status']=='1'){ ?>
                                        <a href="<?= base_url('Batch-List?id='); echo $b_d['batch_id']; ?>&status=0"
                                            class="dropdown-item">Un-Publish</a>
                                        <?php } ?>
                                        <?php if($b_d['status']=='0'){ ?>
                                        <a href="<?= base_url('Batch-List?id='); echo $b_d['batch_id']; ?>&status=1"
                                            class="dropdown-item">Publish</a>
                                        <?php } ?>
                                    </div>
                                </div>
                                    </td>
                                </tr>
                                <?php } }else{ echo "<h1 class='text-center text-warning'>No Data Found</h1>"; } ?>


                            </tbody>

                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                <li
                                    class="page-item <?php if(!isset($_GET['page']) || $_GET['page']==1){ ?>disabled <?php } ?>">
                                    <a class="page-link"
                                        href="<?= base_url('Batch-List?page='); if(isset($_GET['page'])){ echo $_GET['page']-1 ; } ?>"
                                        tabindex="-1">Previous</a>
                                </li>
                                <?php for($i=1; $i<=$total_pages;$i++){ ?>

                                <li class="page-item"><a class="page-link"
                                        href="<?= base_url('Batch-List?page='); echo $i ?>"><?= $i; ?></a></li>
                                <?php } ?>
                                <li class="page-item <?php if($total_pages <= 1){?> disabled <?php } ?>">
                                    <a class="page-link"
                                        href="<?= base_url('Batch-List?page=');if(isset($_GET['page'])){ echo $_GET['page']+1 ; }else echo "1"; ?>">Next</a>
                                </li>
                            </ul>
                        </nav>
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