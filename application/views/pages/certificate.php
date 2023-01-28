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
                            <h4 class="card-title">Certificate List</h4>
                        </div>
                    </div>

                    <div class="card-body">
                        <a href="<?= base_url('Testimonial-Create') ?>" class="btn btn-md btn-success">Create</a>
                        <?php if(!empty($certificate_data)){ ?>
                        <table class="table table-hover table-responsive">
                            <caption>List of Certificate Template</caption>
                            <thead>
                                <tr>

                                    <th class="text-center">#</th>
                                    <th class="text-center">Certificate Type</th>
                                    <th class="text-center">Line 1</th>
                                    <th class="text-center">Line 2</th>
                                    <th class="text-center">Line 3</th>
                                    <th class="text-center">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($certificate_data as $c_d) { ?>
                                <tr>
                                    <td class="text-center"><?= $i++; ?></td>
                                    <?php if($c_d['certificate_type']==1){ ?>
                                    <td class="text-center">Course Certificate</td>
                                    <?php } ?>
                                    <td class="text-center"><?= $c_d['line1'] ?></td>
                                    <td class="text-center"><?= $c_d['line2'] ?></td>
                                    <td class="text-center"><?= $c_d['line3'] ?></td>
                                    <td class="text-center">
                                        <div class="dropdown show">
                                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                                id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">

                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item"
                                                    href="<?= base_url("Certificate-Edit?id=").$c_d['cer_temp_id'] ?>">Edit</a>
                                                    <a class="dropdown-item"
                                                    href="<?= base_url("Certificate/view?id=").$c_d['cer_temp_id'] ?>">View</a>
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