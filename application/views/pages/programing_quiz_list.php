<?php
$user_info = $this->session->userdata('user_data');
?>
<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
            <?php $usuccMess =  $this->session->flashdata('usuccMess'); 
            if(!empty($usuccMess)){ ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?= $usuccMess; ?></strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
           <?php } ?>
           <?php $isuccMess =  $this->session->flashdata('isuccMess'); 
            if(!empty($isuccMess)){ ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?= $isuccMess; ?></strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
           <?php } ?>
           <?php $dsuccMess =  $this->session->flashdata('dsuccMess'); 
            if(!empty($dsuccMess)){ ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><?= $dsuccMess; ?></strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
           <?php } ?>
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Programing Quiz List</h4>
                        </div>
                    </div>

                    <div class="card-body">
                        <a href="<?= base_url('Programing-Quiz-Create') ?>" class="btn btn-md btn-success">Create</a>
                        <?php  if(!empty($p_quiz_data)){ ?>
                        <table class="table table-hover table-responsive">
                            <caption>List of Programing Quiz</caption>
                            <thead>
                                <tr>

                                    <th class="text-center">#</th>
                                    <th class="text-center">Programing Quiz Name</th>
                                    <th class="text-center">Challenges</th>
                                    <th class="text-center">Course</th>
                                    <th class="text-center">Batch</th>
                                    <?php if($user_info->access_level!=1){ ?>
                                    <th class="text-center">Group</th>
                                    <?php } ?>
                                    <th class="text-center">Created At</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php  $i=1; foreach ($p_quiz_data as $q_d) { ?>
                                <tr>
                                    <td class="text-center"><?= $i++; ?></td>
                                    <td class="text-center"><?php echo $q_d['pq_name']; ?></td>
                                    <td class="text-center"><a href="Challenge-List?id=<?= $q_d['pq_id'] ?>&c=<?= $q_d['course_id'] ?>">View
                                            Challenges</a></td>
                                    <td class="text-center"><?php echo $q_d['course_name']; ?></td>
                                    <td class="text-center">
                                        <?php echo $q_d['batch_name']; ?><br>
                                         (<?= $q_d['batch_number']; ?>)
                                    </td>
                                    <?php if($user_info->access_level!=1){ ?>
                                    <td class="text-center">
                                        <?php  if(!empty($q_d['group_name'])){
                                        echo $q_d['group_name']; ?><br>
                                        (<?= $q_d['group_number']; ?>)
                                      <?php }else { echo "--"; }  ?>
                                    </td>
                                    <?php } ?>
                                    <td class="text-center"><?php echo date('d M, Y',strtotime($q_d['created_at'])); ?></td>
                                    <?php if($q_d['status']=='1'){ ?>
                                    <td class="text-center text-success">Active</td>
                                    <?php } ?>
                                    <?php if($q_d['status']=='0'){ ?>
                                    <td class="text-center text-danger">In-Active</td>
                                    <?php } ?>
                                    <td class="text-center">
                                        <a href="<?= base_url('Programing-Quiz-Edit?id=');echo $q_d['pq_id']; ?>"
                                            class="btn btn-sm btn-success">Edit</a>
                                        <br>
                                        <?php if($q_d['status']=='1'){ ?>
                                        <a href="<?= base_url('Programing-Quiz?id='); echo $q_d['pq_id']; ?>&status=0"
                                            class="btn btn-sm btn-danger">Un-Publish</a>
                                        <?php } ?>
                                        <?php if($q_d['status']=='0'){ ?>
                                        <a href="<?= base_url('Programing-Quiz?id='); echo $q_d['pq_id']; ?>&status=1"
                                            class="btn btn-sm btn-success">Publish</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php } }else{?>
                                <h1 class="text-center text-warning">No Data Found</h1>
                                <?php } ?>
                            </tbody>

                        </table>
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