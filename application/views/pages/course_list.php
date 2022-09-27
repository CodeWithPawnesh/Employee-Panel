<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Course List</h4>
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
                        <a href="<?= base_url('Course-Create') ?>" class="btn btn-md btn-success">Create</a>
                        <table class="table table-hover">
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
                                    <td class="text-center"><?= $c_d['no_of_seats']; ?></td>
                                    <td class="text-center"><?= $c_d['no_of_lessons']; ?></td>
                                    <td class="text-center"><?= $c_d['language']; ?></td>
                                    <?php if($c_d['status']=='1'){ ?>
                                    <td class="text-center text-success">Active</td>
                                    <?php } ?>
                                    <?php if($c_d['status']=='0'){ ?>
                                    <td class="text-center text-danger">In-Active</td>
                                    <?php } ?>
                                    <td>
                                        <a href="<?= base_url('Course-Edit?id='); echo $c_d['course_id']; ?>" class="btn btn-sm btn-success">Edit</a>
                                        <br>
                                        <?php if($c_d['status']=='1'){ ?>
                                            <a href="<?= base_url('Course-List?id='); echo $c_d['course_id']; ?>&status=0" class="btn btn-sm btn-danger">Un-Publish</a>
                                         <?php } ?>
                                         <?php if($c_d['status']=='0'){ ?>
                                            <a href="<?= base_url('Course-List?id='); echo $c_d['course_id']; ?>&status=1" class="btn btn-sm btn-success">Publish</a>
                                         <?php } ?>
                                    </td>
                                </tr>
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