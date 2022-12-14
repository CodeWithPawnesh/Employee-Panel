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
                            <h4 class="card-title">Course List</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <a href="<?= base_url('Course-Create') ?>" class="btn btn-md btn-success">Create</a>
                        <?php if(!empty($course_data)){ ?>
                        <table class="table table-hover table-responsive">
                            <caption>List of Course</caption>
                            <thead>
                                <tr>

                                    <th class="text-center">#</th>
                                    <th class="text-center">Course Name</th>
                                    <th class="text-center">Course Title</th>
                                    <th class="text-center">Course Abber</th>
                                    <th class="text-center">Course Level</th>
                                    <th class="text-center">No. of Seats</th>
                                    <th class="text-center">No. of Lessons</th>
                                    <th class="text-center">Language</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach($course_data as $c_d){ ?>
                                <tr>
                                    <td class="text-center"><?= $i++ ; ?></td>
                                    <td class="text-center"><?= $c_d['course_name']; ?></td>
                                    <td class="text-center"><?= $c_d['course_title']; ?></td>
                                    <td class="text-center"><?= $c_d['course_abber']; ?></td>
                                    <?php if($c_d['course_level']=='1'){ ?>
                                    <td class="text-center">Beginner</td>
                                    <?php } ?>
                                    <?php if($c_d['course_level']=='2'){ ?>
                                    <td class="text-center">Intermediate</td>
                                    <?php } ?>
                                    <?php if($c_d['course_level']=='3'){ ?>
                                    <td class="text-center">Advance</td>
                                    <?php } ?>
                                    <td class="text-center"></td>
                                    <td class="text-center"><?= $c_d['no_of_lessons']; ?></td>
                                    <td class="text-center"><?= $c_d['language']; ?></td>
                                    <?php if($c_d['status']=='1'){ ?>
                                    <td class="text-center text-success">Active</td>
                                    <?php } ?>
                                    <?php if($c_d['status']=='0'){ ?>
                                    <td class="text-center text-danger">In-Active</td>
                                    <?php } ?>
                                    <td> 
                                        <div class="dropdown show">
                                       <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        
                                       </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a href="<?= base_url('Course-Edit?id='); echo $c_d['course_id']; ?>"
                                        class="dropdown-item">Edit</a>
                                        <?php if($c_d['status']=='1'){ ?>
                                        <a href="<?= base_url('Course-List?id='); echo $c_d['course_id']; ?>&status=0"
                                        class="dropdown-item">Un-Publish</a>
                                        <?php } ?>
                                        <?php if($c_d['status']=='0'){ ?>
                                        <a href="<?= base_url('Course-List?id='); echo $c_d['course_id']; ?>&status=1"
                                        class="dropdown-item">Publish</a>
                                        <?php } ?>
                                       <a class="dropdown-item" href="<?= base_url('Course-List?delete_id='); echo $c_d['course_id']; ?>">Delete</a>
                                    </div>
                                     </div>
                                    </td>
                                    <?php } ?>
                                </tr>
                                <?php } else { echo "<h1 class='text-warning'>No Data Found</h1>"; } ?>
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