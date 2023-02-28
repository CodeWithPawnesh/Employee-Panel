<?php
$user_info = $this->session->userdata('user_data');
$access_level = $user_info->access_level;
?><div class="content">
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
                                <?php $i=1; foreach ($batch_data as $b_d) { ?>
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
                                        <div class="dropdown">
                                            <button class="btn btn-success dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="material-icons">list</i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <?php if($access_level == 1){ ?>
                                                <a class="dropdown-item" href="<?= base_url("Student-List?batch_id=").$b_d['batch_id'] ?>">Student List</a>
                                                <?php } ?>
                                                <?php if($access_level == 1){ ?>
                                                <a class="dropdown-item" href="<?= base_url("Class-Video-Requests?batch_id=").$b_d['batch_id'] ?>">Class-Video-Requests</a>
                                                <?php } ?>
                                                <?php if($access_level == 1){ ?>
                                                <a class="dropdown-item" href="<?= base_url("Manual-Class-Recording-List?batch_id=").$b_d['batch_id'] ?>">Manual-Class-Recording-List</a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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