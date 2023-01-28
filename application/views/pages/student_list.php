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
                    <?php if($access_level==0){ ?>
                    <div class="card-body">
                    <a href="<?= base_url('Add-Student') ?>" class="btn btn-md btn-success">Add Student</a>
                        <?php if(!empty($student_data)){  ?>
                        <table class="table table-hover table-responsive">
                            <caption>List of Students</caption>
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th Class="text-center">Student Name</th>
                                    <th Class="text-center">Course Name</th>
                                    <th Class="text-center">Batch Name</th>
                                    <th Class="text-center">Group Name</th>
                                    <th Class="text-center">E-Mail</th>
                                    <th Class="text-center">Ph. NO</th>
                                    <th Class="text-center">Status</th>
                                    <?php if($access_level ==0 ) { ?>
                                    <th class="text-center">Action</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                   $i=1; foreach($student_data as $s_d){
                                    ?>
                                <tr>
                                    <td class="text-center"><?= $i++ ; ?></td>
                                    <td class="text-center"><?= $s_d['student_name'] ?></td>
                                    <td class="text-center"><?= $s_d['course_name'] ?></td>
                                    <td class="text-center"><?= $s_d['batch_name'] ?></td>
                                    <td class="text-center"><?= $s_d['group_name'] ?></td>
                                    <td class="text-center"><?= $s_d['email'] ?></td>
                                    <td class="text-center"><?= $s_d['phone'] ?></td>
                                    <?php if($s_d['status']==1){ ?>
                                    <td class="text-center text-success">Active</td>
                                    <?php } ?>
                                    <?php if($s_d['status']==0){ ?>
                                    <td class="text-center text-danger">In-Active</td>
                                    <?php } ?>
                                    <?php if($access_level ==0 ) { ?>
                                    <td class="text-center">
                                        <div class="dropdown show">
                                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                                id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">

                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item"
                                                    href="<?= base_url("Student-Edit?id=").$s_d['student_id'] ?>">Edit</a>
                                                <a class="dropdown-item"
                                                    href="<?= base_url("Student-List?delete_student=").$s_d['student_id'] ?>">Delete</a>
                                                <a class="dropdown-item"
                                                    href="<?= base_url("Internship-List?id=").$s_d['student_id'] ?>">Internship</a>
                                                    <?php if(empty($s_d['certificate_id'])){ ?>
                                                <a class="dropdown-item"
                                                    href="<?= base_url("Student-List?id=").$s_d['student_id'] ?>&course_id=<?= $s_d['course_id'] ?>&batch_id=<?= $s_d['batch_id'] ?>&mode=certificate_generate">Generate Certificate</a>
                                                    <?php } ?>
                                                    <?php if(!empty($s_d['certificate_id'])){ ?>
                                                <a class="dropdown-item"
                                                    href="<?= base_url("Certificate/student_certificate?id=").$s_d['student_id'] ?>&course_id=<?= $s_d['course_id'] ?>&batch_id=<?= $s_d['batch_id'] ?>&mode=certificate_generate">View Certificate</a>
                                                    <?php } ?>
                                            </div>
                                        </div>
                                    </td>
                                    <?php }  ?>

                                </tr>
                                <?php } }else { echo "<h1 class='text-center text-warning'>No Data Found</h1>";  } ?>
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                <li
                                    class="page-item <?php if(!isset($_GET['page']) || $_GET['page']==1){ ?>disabled <?php } ?>">
                                    <a class="page-link"
                                        href="<?= base_url('Student-List?page='); if(isset($_GET['page'])){ echo $_GET['page']-1 ; } ?>"
                                        tabindex="-1">Previous</a>
                                </li>
                                <?php for($i=1; $i<=$total_pages;$i++){ ?>

                                <li class="page-item"><a class="page-link"
                                        href="<?= base_url('Student-List?page='); echo $i ?>"><?= $i; ?></a></li>
                                <?php } ?>
                                <li class="page-item">
                                    <a class="page-link"
                                        href="<?= base_url('Student-List?page=');if(isset($_GET['page'])){ echo $_GET['page']+1 ; }else echo "1"; ?>">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <?php } ?>
                    <?php if($access_level!=0){ ?>
                    <div class="card-body">
                        <?php if(!empty($student_data)){  ?>
                        <table class="table table-hover table-responsive">
                            <caption>List of Students</caption>
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th Class="text-center">Student Name</th>
                                    <th Class="text-center">E-Mail</th>
                                    <th Class="text-center">Ph. NO</th>
                                    <th Class="text-center">Status</th>
                                    <?php if($access_level ==0 ) { ?>
                                    <th class="text-center">Action</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                   $i=1; foreach($student_data as $s_d){
                                    ?>
                                <tr>
                                    <td class="text-center"><?= $i++ ; ?></td>
                                    <td class="text-center"><?= $s_d['student_name'] ?></td>
                                    <td class="text-center"><?= $s_d['email'] ?></td>
                                    <td class="text-center"><?= $s_d['phone'] ?></td>
                                    <?php if($s_d['status']==1){ ?>
                                    <td class="text-center text-success">Active</td>
                                    <?php } ?>
                                    <?php if($s_d['status']==0){ ?>
                                    <td class="text-center text-danger">In-Active</td>
                                    <?php } ?>
                                    <?php if($access_level ==0 ) { ?>
                                    <td class="text-center">
                                        <div class="dropdown show">
                                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                                id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">

                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item"
                                                    href="<?= base_url("Student-Course-List?id=").$s_d['student_id'] ?>">View
                                                    Course</a>
                                                <a class="dropdown-item"
                                                    href="<?= base_url("Student-Edit?id=").$s_d['student_id'] ?>">Edit</a>
                                                <a class="dropdown-item"
                                                    href="<?= base_url("Student-List?delete_student=").$s_d['student_id'] ?>">Delete</a>
                                                <a class="dropdown-item"
                                                    href="<?= base_url("Internship-List?id=").$s_d['student_id'] ?>">Internship</a>

                                            </div>
                                        </div>
                                    </td>
                                    <?php }  ?>

                                </tr>
                                <?php } }else { echo "<h1 class='text-center text-warning'>No Data Found</h1>";  } ?>
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                <li
                                    class="page-item <?php if(!isset($_GET['page']) || $_GET['page']==1){ ?>disabled <?php } ?>">
                                    <a class="page-link"
                                        href="<?= base_url('Course-List?page='); if(isset($_GET['page'])){ echo $_GET['page']-1 ; } ?>"
                                        tabindex="-1">Previous</a>
                                </li>
                                <?php for($i=1; $i<=$total_pages;$i++){ ?>

                                <li class="page-item"><a class="page-link"
                                        href="<?= base_url('Course-List?page='); echo $i ?>"><?= $i; ?></a></li>
                                <?php } ?>
                                <li class="page-item">
                                    <a class="page-link"
                                        href="<?= base_url('Course-List?page=');if(isset($_GET['page'])){ echo $_GET['page']+1 ; }else echo "1"; ?>">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <?php } ?>
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