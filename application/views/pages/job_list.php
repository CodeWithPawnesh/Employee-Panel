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
                            <h4 class="card-title">Job Updates List</h4>
                        </div>
                    </div>

                    <div class="card-body">
                        <a href="<?= base_url('Job-Updates-Create?id=').$_GET['id']?>" class="btn btn-md btn-success">Create</a>
                        <?php if(!empty($job_data)){ ?>
                        <table class="table table-hover table-responsive">
                            <caption>List of Internship</caption>
                            <thead>
                                <tr>

                                    <th class="text-center">#</th>
                                    <th class="text-center">Job Title</th>
                                    <th class="text-center">Job Description</th>
                                    <th class="text-center">Batch</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                    

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($job_data as $j_d) { ?>
                                <tr>
                                    <td class="text-center"><?= $i++; ?></td>
                                    <td class="class"><?= $j_d['job_title'] ?></td>
                                    <td class="class"><?= $j_d['job_description'] ?></td>
                                    <td class="class"><?= $j_d['batch_name'] ?></td>
                                    <?php  if($j_d['status']=='1'){ ?>
                                    <td class="text-success text-center">Active</td>
                                    <?php } ?>
                                    <?php  if($j_d['status']=='0'){ ?>
                                    <td class="text-danger text-center">In-Active</td>
                                    <?php } ?>
                                    <td class="text-center">
                                    <div class="dropdown show">
                                       <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a href="<?= base_url('Job-Updates-Edit?id=');echo $j_d['job_id']; ?>"
                                            class="dropdown-item">Edit</a>
                                        <a href="<?= base_url('Job-Updates-List?delete_id=');echo $j_d['job_id']; ?>&batch_id=<?= $j_d['batch_id'] ?>"
                                            class="dropdown-item">Delete</a>
                                        <?php if($j_d['status']=='1'){ ?>
                                        <a href="<?= base_url('Job-Updates-List?job_id='); echo $j_d['job_id']; ?>&status=0&batch_id=<?= $j_d['batch_id'] ?>"
                                            class="dropdown-item">Un-Publish</a>
                                        <?php } ?>
                                        <?php if($j_d['status']=='0'){ ?>
                                        <a href="<?= base_url('Job-Updates-List?job_id='); echo $j_d['job_id']; ?>&status=1&batch_id=<?= $j_d['batch_id'] ?>"
                                            class="dropdown-item">Publish</a>
                                        <?php } ?>
                                    </div>
                                </div>
                                    </td>

                                </tr>
                                <?php } }else{ ?>
                                    <h1 class='text-center text-warning'>No Data Found</h1>
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