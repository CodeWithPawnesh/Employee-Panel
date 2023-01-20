<?php
$emp_info = $this->session->userdata('emp_data');
$emp_id = $emp_info->emp_id;
$emp_role = $emp_info->role;
?>
<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Class History</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th class="text-center">No of Classes</th>
                                    <th class="text-center">Class Name</th>
                                    <th class="text-center">Class Date</th>
                                    <th class="text-center">Class Time</th>
                                    <?php if(!isset($_GET['student_id'])){ ?>
                                    <th class="text-center">Joining Time</th>
                                    <?php } ?>
                                    <?php if($emp_role ==1){ ?>
                                    <th class="text-center">Batch Name</th>
                                    <?php } ?>
                                    <?php if($emp_role ==2){ ?>
                                    <th class="text-center">Group Name</th>
                                    <?php } ?>
                                    <th class="text-center">No of Present Students</th>
                                    <th class="text-center">View Present Student</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($class_data)){
                                    $i=1; foreach($class_data as $c_d){
                                    ?>
                               <tr>
                                <td class="text-center">Class <?= $i++; ?> </td>
                                <td class="text-center"><?= $c_d['class_name'] ?></td>
                                <td class="text-center"><?= date('d M, Y',strtotime($c_d['class_date'])) ?></td>
                                <td class="text-center"><?= date('h:i A',$c_d['class_ts']) ?></th>
                                <?php if(!isset($_GET['student_id'])){ ?>
                                <td class="text-center"><?= $c_d['class_started_at'] ?></th>
                                <?php } ?>
                                <?php if($emp_role == 1) { ?>
                                <td class="text-center"><?= $c_d['batch_name'] ?></th>
                                <?php } ?>
                                <?php if($emp_role == 2) { ?>
                                <td class="text-center"><?= $c_d['group_name'] ?></th>
                                <?php } ?>
                                <?php if($c_d['status']==0){ ?>
                                <td class="text-center"><a href="<?= base_url('Mark-Attendance?id=').$c_d['live_id']."&class_id=".$c_d['class_id'] ?>" class="btn btn-sm btn-success">Mark Attendance</a></td>
                                <?php } ?>
                                <?php if($c_d['status']==1){ ?>
                                <td class="text-center"><?php $std_n= explode(",",$c_d['student_ids']); echo sizeof($std_n); ?></td>
                                <?php } ?>
                                <?php if($c_d['status']==1){ ?>
                                <td class="text-center"><a href="<?= base_url("Present-Student-List?id=".$c_d['live_id'])."&ids=".$c_d['student_ids'] ?>">View</a></td>
                                <?php } ?>
                                <?php if($c_d['status']==0){ ?>
                                <td class="text-center text-danger">Attendance Pending</td>
                                <?php } ?>
                                <?php if($c_d['status']==1){ ?>
                                <td class="text-center text-success">Attendance Marked</td>
                                <?php } ?>
                               </tr>
                               <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Main Content -->
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