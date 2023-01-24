<?php
$user_info = $this->session->userdata('user_data');
$access_level = $user_info->access_level;
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
                            <h4 class="card-title">Student List</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if(!empty($present_std_data)){  ?>
                        <table class="table table-hover table-responsive">
                            <caption>List of Students</caption>
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th Class="text-center">Student Name</th>
                                    <th Class="text-center">E-Mail</th>
                                    <th Class="text-center">Ph. NO</th>
                                    <?php if($access_level ==2){ ?>
                                        <th class="text-center">Marks Obtained</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                   $i=1; foreach($present_std_data as $s_d){
                                    ?>
                                <tr>
                                    <td class="text-center"><?= $i++ ; ?></td>
                                    <td class="text-center"><?= $s_d['student_name'] ?></td>
                                    <td class="text-center"><?= $s_d['email'] ?></td>
                                    <td class="text-center"><?= $s_d['phone'] ?></td>
                                    <?php if($access_level ==2){ ?>
                                        <td class="text-center"><?= $s_d['marks_obtained'] ?></td>
                                        <?php if($s_d['status']==0){ ?>
                                        <td class="text-center text-danger">Marks Not Given</td>
                                        <?php } ?>
                                        <?php if($s_d['status']==1){ ?>
                                        <td class="text-center text-success">Marks Given</td>
                                        <?php } ?>
                                        <td class="text-center">
                                        <?php if($s_d['status']==0){ ?>
                                            <form action="Present-Student-List" method="post">
                                                <input type="hidden" name="live_id" value=<?= $_GET['id'] ?>>
                                                <input type="hidden" name="ids" value=<?= $_GET['ids'] ?>>
                                                <input type="hidden" name="pr_m_id" value=<?= $s_d['pr_m_id'] ?>>
                                            <input type="number" name="marks" placeholder="Marks"><br>
                                            <button type="submit" name="submit" class="btn btn-sm btn-success">Submit</button>
                                            </form>
                                        <?php } ?>
                                        </td>
                                    <?php } ?>
                                </tr>
                                <?php } }else { echo "<h1 class='text-center text-warning'>No Data Found</h1>";  } ?>
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