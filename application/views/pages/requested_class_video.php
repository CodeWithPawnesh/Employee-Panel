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
                            <h4 class="card-title">Video Request List</h4>
                        </div>
                    </div>

                    <div class="card-body">
                        <?php if(!empty($requested_data)){ ?>
                        <table class="table table-hover table-responsive">
                            <caption>List of Requests</caption>
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Class</th>
                                    <th class="text-center">Class Name</th>
                                    <th class="text-center">Class Date</th>
                                    <th class="text-center">No of Requests</th>
                                    <th class="text-center">Requested At</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($requested_data as $r_d) { ?>
                                <tr>
                                    <td class="text-center"><?= $i; ?></td>
                                    <td class="text-center">Class <?= $r_d['class_no'] ?></td>
                                    <td class="text-center"><?= $r_d['class_name'] ?></td>
                                    <td class="text-center"><?= date("d M, Y", strtotime($r_d['class_date'])) ?></td>
                                    <?php 
                                    $requested_by = explode(",",$r_d['requested_by']);
                                    $count = sizeof($requested_by);
                                     ?>
                                    <td class="text-center"><?= $count; ?></td>
                                    <td class="text-center"><?= date("d M, Y h:i A",strtotime($r_d['requested_at'])) ?>
                                    </td>
                                    <?php if($r_d['status']==0){ ?>
                                    <td class="text-center text-danger">Requested</td>
                                    <?php } ?>
                                    <?php if($r_d['status']==1){ ?>
                                    <td class="text-center text-success">Given</td>
                                    <?php } ?>
                                    <?php if($r_d['status']==0){ ?>
                                    <td class="text-center ">
                                        <!-- Button trigger modal -->
                                        <button type="button" onclick="populate_batch_id(<?= $_GET['batch_id'] ?>,<?= $r_d['class_video_id'] ?>)" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModal">
                                            Give Video
                                        </button>
                                    </td>
                                    <?php } ?>
                                    <?php if($r_d['status']==1){ ?>
                                    <td class="text-center text-success">Given</td>
                                    <?php } ?>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Give Video</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url("Classes/give_class_video") ?>" method="post">
            <div class="modal-body">
                <input type="hidden" name="batch_id" id="batch_id">
                <input type="hidden" name="class_video_id" id="class_video_id">
                <input type="text" name="you_tube_url" class="form-control" placeholder="You Tube URL" required>
            </div>
            <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
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
<script>
    function populate_batch_id(i,a){
        console.log(a);
        document.getElementById("batch_id").value=i;
        document.getElementById("class_video_id").value=a;
    }
</script>