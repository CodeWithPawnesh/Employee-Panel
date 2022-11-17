<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Employee List</h4>
                        </div>
                    </div>
                    <?php if($this->session->Flashdata('message')){ ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <?= $this->$session->Flashdata('message'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php } ?>
                    <div class="card-body">
                        <a href="<?= base_url('Add-Employee') ?>" class="btn btn-md btn-success">Add Employee</a>
                        <table class="table table-hover table-responsive">
                            <caption>List of Employee</caption>
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Employee Name</th>
                                    <th class="text-center">E-mail</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Password</th>
                                    <th class="text-center">course_id</th>
                                    <th class="text-center">Education</th>   
                                    <th class="text-center">Designation</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($emp_data)){  $i=1;
                                    foreach($emp_data as $e_d){
                                    ?>
                                <tr>
                                    <td class="text-center"><?= $i++ ?></td>
                                    <td class="text-center"><?= $e_d['emp_name'];  ?></td>
                                    <td class="text-center"><?= $e_d['email'];  ?></td>
                                    <td class="text-center"><?= $e_d['phone']; ?></td>
                                    <td class="text-center"><?= $e_d['password'];  ?></th>
                                    <td class="text-center"><?= $e_d['course_name'];  ?></td>
                                    <td class="text-center"><?= $e_d['education']; ?></td>
                                    <td class="text-center"><?= $e_d['designation']; ?></td>
                                    <?php if($e_d['status']==1){  ?>
                                    <td class="text-center text-success">Active</td>
                                    <?php } ?>
                                    <?php if($e_d['status']==0){  ?>
                                    <td class="text-center text-success">Active</td>
                                    <?php } ?>
                                </tr>
                                <?php } } ?>
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