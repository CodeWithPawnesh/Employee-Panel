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
                            <h4 class="card-title">Employee List</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <a href="<?= base_url('Add-Employee') ?>" class="btn btn-md btn-success">Add Employee</a>
                        <?php if(!empty($emp_data)){ ?>
                        <table class="table table-hover table-responsive">
                            <caption>List of Employee</caption>
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Employee Name</th>
                                    <th class="text-center">E-mail</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Password</th>
                                    <th class="text-center">Education</th>   
                                    <th class="text-center">Designation</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1;
                                    foreach($emp_data as $e_d){
                                    ?>
                                <tr>
                                    <td class="text-center"><?= $i++ ?></td>
                                    <td class="text-center"><?= $e_d['emp_name'];  ?></td>
                                    <td class="text-center"><?= $e_d['email'];  ?></td>
                                    <td class="text-center"><?= $e_d['phone']; ?></td>
                                    <td class="text-center"><?= $e_d['password'];  ?></th>
                                    <td class="text-center"><?= $e_d['education']; ?></td>
                                    <td class="text-center"><?= $e_d['designation']; ?></td>
                                    <?php if($e_d['status']==1){  ?>
                                    <td class="text-center text-success">Active</td>
                                    <?php } ?>
                                    <?php if($e_d['status']==0){  ?>
                                    <td class="text-center text-success">Active</td>
                                    <?php } ?>
                                    <td class="text-center">
                                     <div class="dropdown show">
                                       <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        
                                       </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                       <a class="dropdown-item" href="<?= base_url("Employee-Course?id=").$e_d['emp_id'] ?>">View Course</a>
                                       <a class="dropdown-item" href="<?= base_url("Employee-Edit?id=").$e_d['emp_id'] ?>">Edit</a>
                                       <a class="dropdown-item" href="<?= base_url("Employee-List?delete_emp=").$e_d['emp_id'] ?>">Delete</a>
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
                                        href="<?= base_url('Employee-List?page='); if(isset($_GET['page'])){ echo $_GET['page']-1 ; } ?>"
                                        tabindex="-1">Previous</a>
                                </li>
                                <?php for($i=1; $i<=$total_pages;$i++){ ?>

                                <li class="page-item"><a class="page-link"
                                        href="<?= base_url('Employee-List?page='); echo $i ?>"><?= $i; ?></a></li>
                                <?php } ?>
                                <li class="page-item">
                                    <a class="page-link"
                                        href="<?= base_url('Employee-List?page=');if(isset($_GET['page'])){ echo $_GET['page']+1 ; }else echo "1"; ?>">Next</a>
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