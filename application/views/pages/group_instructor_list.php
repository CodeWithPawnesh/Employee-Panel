<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Group Instructor List</h4>
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
                        <a href="<?= base_url('Add-Instructor?group_id=');echo $_GET['group_id']; ?>" class="btn btn-md btn-success">ADD+</a>
                        <table class="table table-hover">
                            <caption>List of Instructor</caption>
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Intructor Employee</th>
                                    <th class="text-center">E-Mail</th>
                                    <th class="text-center">Action</th>  
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($group_inst_data)){ $i=1; foreach($group_inst_data as $bi_d){ ?>
                                <tr>
                                    <td class="text-center"><?= $i++ ; ?></td>
                                    <td class="text-center"><?= $bi_d['emp_name'] ; ?></td>
                                    <td class="text-center"><?= $bi_d['email'] ; ?></td>
                                    <td class="text-center"><a href="" class="btn btn-sm btn-danger">Remove</a></td>
                                </tr>
                                <?php } }else{ ?>
                                    <h1 class="">No Data Found</h1>
                                <?php } ?>
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                <li class="page-item <?php if(!isset($_GET['page']) || $_GET['page']==1){ ?>disabled <?php } ?>">
                                    <a class="page-link" href="<?= base_url('Course-List?page='); if(isset($_GET['page'])){ echo $_GET['page']-1 ; } ?>" tabindex="-1">Previous</a>
                                </li>
                                <?php for($i=1; $i<=$total_pages;$i++){ ?>
    
                                <li class="page-item"><a class="page-link" href="<?= base_url('Course-List?page='); echo $i ?>"><?= $i; ?></a></li>
                                <?php } ?>
                                <li class="page-item">
                                    <a class="page-link" href="<?= base_url('Course-List?page=');if(isset($_GET['page'])){ echo $_GET['page']+1 ; }else echo "1"; ?>">Next</a>
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