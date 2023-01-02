<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Employee Course List</h4>
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
                        <a href="<?= base_url('Add-Employee-Course?id='.$_GET['id']) ?>" class="btn btn-md btn-success">Add Courses</a>
                        <?php if(!empty($course_data)){ ?>
                        <table class="table table-hover table-responsive">
                            <caption>List of Courses</caption>
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Course Name</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  $i=1; foreach($course_data as $c_d){ ?>
                                    <tr>
                                    <td class="text-center"><?= $i++ ?></td>
                                    <td class="text-center"><?= $c_d['course_name'] ?></td>
                                    <td class="text-center"></td>
                                    <tr>
                                <?php } }else{ echo "<h1 class='text-center text-warning'>No Data Found</h1>"; } ?>
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