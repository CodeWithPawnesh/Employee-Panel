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
                            <h4 class="card-title">Testimonial List</h4>
                        </div>
                    </div>

                    <div class="card-body">
                        <a href="<?= base_url('Testimonial-Create') ?>" class="btn btn-md btn-success">Create</a>
                        <?php if(!empty($testimonial_data)){ ?>
                        <table class="table table-hover table-responsive">
                            <caption>List of Testimonial</caption>
                            <thead>
                                <tr>

                                    <th class="text-center">#</th>
                                    <th class="text-center">Testimonial</th>
                                    <th class="text-center">Star rating</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($testimonial_data as $t_d) { ?>
                                <tr>
                                    <td class="text-center"><?= $i++; ?></td>
                                    <td class="text-center"><?php echo $t_d['testimonial_desc']; ?></td>
                                    <td class="text-center"><?php echo $t_d['star_rating']; ?> Stars</td>
                                    <?php  if($t_d['status']=='1'){ ?>
                                    <td class="text-success text-center">Active</td>
                                    <?php } ?>
                                    <?php  if($t_d['status']=='0'){ ?>
                                    <td class="text-danger text-center">In Active</td>
                                    <?php } ?>
                                    <td class="text-center">
                                        <a href="<?= base_url('Testimonial-Edit?id=');echo $t_d['testimonial_id']; ?>"
                                            class="btn btn-sm btn-success">Edit</a>
                                        <br>
                                        <?php if($t_d['status']=='1'){ ?>
                                        <a href="<?= base_url('Testimonial-List?id='); echo $t_d['testimonial_id']; ?>&status=0"
                                            class="btn btn-sm btn-danger">Un-Publish</a>
                                        <?php } ?>
                                        <?php if($t_d['status']=='0'){ ?>
                                        <a href="<?= base_url('Testimonial-List?id='); echo $t_d['testimonial_id']; ?>&status=1"
                                            class="btn btn-sm btn-success">Publish</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php } }else{ ?>
                                    <h1 class='text-center text-warning'>No Data Found</h1>
                                    <?php } ?>


                            </tbody>

                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                <li
                                    class="page-item <?php if(!isset($_GET['page']) || $_GET['page']==1){ ?>disabled <?php } ?>">
                                    <a class="page-link"
                                        href="<?= base_url('Testimonial-List?page='); if(isset($_GET['page'])){ echo $_GET['page']-1 ; } ?>"
                                        tabindex="-1">Previous</a>
                                </li>
                                <?php for($i=1; $i<=$total_pages;$i++){ ?>

                                <li class="page-item"><a class="page-link"
                                        href="<?= base_url('Testimonial-List?page='); echo $i ?>"><?= $i; ?></a></li>
                                <?php } ?>
                                <li class="page-item">
                                    <a class="page-link"
                                        href="<?= base_url('Testimonial-List?page=');if(isset($_GET['page'])){ echo $_GET['page']+1 ; }else echo "1"; ?>">Next</a>
                                </li>
                            </ul>
                        </nav>
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