<?php
$user_info = $this->session->userdata('user_data');
?>
<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Workshop List</h4>
                        </div>
                    </div>

                    <div class="card-body">
                        <a href="<?= base_url('Workshop-Create') ?>" class="btn btn-md btn-success">Create</a>
                        <?php if(!empty($workshop_data)){ ?>
                        <table class="table table-hover table-responsive">
                            <caption>List of Workshops</caption>
                            <thead>
                                <tr>

                                    <th class="text-center">#</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Title</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Start Date-Time</th>
                                    <th class="text-center">End Date-Time</th>
                                    <th class="text-center">Workshop Type</th>
                                    <th class="text-center">Workshop Address</th>
                                    <th class="text-center">Statu</th>
                                    <th class="text-center">Action</th>
                                  

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($workshop_data as $s_d) { ?>
                                <tr>
                                    <td class="text-center"><?= $i++; ?></td>
                                    <td class="text-center"><?= $s_d['workshop_name'] ?></td>
                                    <td class="text-center"><?= $s_d['workshop_title'] ?></td>
                                    <td class="text-center"><?= $s_d['workshop_description'] ?></td>
                                    <td class="text-center"><?= date('d M, Y h:i A',strtotime($s_d['start_date_time'])) ?></td>
                                    <td class="text-center"><?= date('d M, Y h:i A',strtotime($s_d['end_date_time'])) ?></td>
                                    <?php if($s_d['workshop_type']=='1'){ ?>
                                    <td class="text-center text-success">Online</td>
                                    <?php } ?>
                                    <?php if($s_d['workshop_type']=='2'){ ?>
                                    <td class="text-center text-success">Offline</td>
                                    <?php } ?>
                                    <td class="text-center"><a href="<?= $s_d['workshop_address'] ?>"class="btn btn-success btn-sm">Join Class</a></td>
                                    <?php if($s_d['workshop_status']=='1'){ ?>
                                    <td class="text-center text-success">Active</td>
                                    <?php } ?>
                                    <?php if($s_d['workshop_status']=='0'){ ?>
                                    <td class="text-center text-danger">In-Active</td>
                                    <?php } ?>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button class="btn btn-success dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="material-icons">list</i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            
                                            <a href="<?= base_url('Workshop-Enrollment?id=').$s_d['workshop_id'] ?>" class="dropdown-item">Student Enrolled</a>

                                            <a href="<?= base_url('Workshop-Edit?id=');echo $s_d['workshop_id']; ?>"
                                            class="dropdown-item">Edit</a>

                                        <?php if($s_d['workshop_status']=='1'){ ?>

                                        <a href="<?= base_url('Workshop?id='); echo $s_d['workshop_id']; ?>&status=0"
                                            class="dropdown-item">Un-Publish</a>

                                        <?php } ?>
                                        <?php if($s_d['workshop_status']=='0'){ ?>

                                        <a href="<?= base_url('Workshop?id='); echo $s_d['workshop_id']; ?>&status=1"
                                            class="dropdown-item">Publish</a>

                                        <?php } ?>
                                        <a href="<?= base_url('Workshop?delete_id=');echo $s_d['workshop_id']; ?>"
                                            class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php } }else{?>
                                <h1 class="text-center text-warning">No Data Found</h1>
                                <?php } ?>
                            </tbody>

                        </table>
                        <?php  if(!empty($workshop_data)){ ?>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                <li
                                    class="page-item <?php if(!isset($_GET['page']) || $_GET['page']==1){ ?>disabled <?php } ?>">
                                    <a class="page-link"
                                        href="<?= base_url('Workshop-List?page='); if(isset($_GET['page'])){ echo $_GET['page']-1 ; } ?>"
                                        tabindex="-1">Previous</a>
                                </li>
                                <?php for($i=1; $i<=$total_pages;$i++){ ?>

                                <li class="page-item"><a class="page-link"
                                        href="<?= base_url('Workshop-List?page='); echo $i ?>"><?= $i; ?></a></li>
                                <?php } ?>
                                <li class="page-item <?php if($total_pages <= 1){?> disabled <?php } ?>">
                                    <a class="page-link"
                                        href="<?= base_url('Workshop-List?page=');if(isset($_GET['page'])){ echo $_GET['page']+1 ; }else echo "1"; ?>">Next</a>
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