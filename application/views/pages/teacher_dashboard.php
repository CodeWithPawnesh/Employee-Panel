<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Dashboard</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th class="text-center">Class</th>
                                    <th class="text-center">Batch</th>
                                    <th class="text-center">Class Timing</th>
                                    <th class="text-center">Join Room</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($class_data as $c_d){ ?>
                                <tr>
                                    <td class="text-center"><?= $c_d['class_name'] ?></td>
                                    <td class="text-center"><?= $c_d['batch_name'] ?></td>
                                    <td class="text-center"><?= date("h:i A",$c_d['class_ts']) ?></td>
                                    <td class="text-center"><a href="Teacher-Dashboard?id=<?= $c_d['class_id'] ?>&cl_l=<?= $cl_link['live_link'] ?>" target="_blank"  class="btn btn-sm btn-success">Join Room</a></th>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title"> Student's On Leave Today </h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Student Name</th>
                                    <th class="text-center">Batchs</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($student_leave)){
                                    $i=1;
                                    foreach($student_leave as $s_l){
                                    ?>
                               <tr>
                                <td Class="text-center"><?= $i++; ?></td>
                                <td Class="text-center"><?= $s_l['student_name'] ?></td>
                                <td Class="text-center"><?= $s_l['batch_name'] ?></td>
                                </tr>
                                <?php } } ?>
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
<script>
   function ins_class(id){
    $.ajax({
        type:"POST",
        url:"teacher/teacher_dashboard",
        data:{id:id},
        success:function(res){

        }
    });
   }
</script>