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
                        <?php if(empty($cl_link['live_link'])){ ?>
                        <!-- Modal -->
                        <div class="modal fade" id="classLink" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static"
                            data-keyboard="false">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-danger" id="exampleModalLabel">Upload Live Class Link</h5>
                                    </div>
                                   
                                    <form action="Teacher/update_link" method="post">
                                        <div class="modal-body">
                                        <p class="text-center">Before you can start taking classes its necessary to upload a google meet link.</p>
                                            <div class="form-group">
                                                <input type="text" name="class_link" class="form-control" placeholder="Live Class Link"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="submit_link" class="btn btn-primary">Save changes</button>
                                            <p class="text-center font-weight-bold">NOTE: While Taking Classes Always Login Your Browser With Same Email By Which You Have Created The Link</p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
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
                                <?php $s_time=""; $e_time=""; foreach($class_data as $c_d){ ?>
                                <tr>
                                    <td class="text-center"><?= $c_d['class_name'] ?></td>
                                    <td class="text-center"><?= $c_d['batch_name'] ?></td>
                                    <td class="text-center" id="ti"><?= date("h:i A", ($c_d['class_ts'])) ?></td>
                                    <td class="text-center"><a id="<?= $c_d['class_id'] ?>"
                                            href="Teacher-Dashboard?id=<?= $c_d['class_id'] ?>&cl_l=<?= $cl_link['live_link'] ?>"
                                            target="_blank" class="btn btn-sm btn-success">Join Room</a></th>
                                </tr>
                                <?php  } ?>
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
<script src="assets/dashboard/js/jquery1-3.4.1.min.js"></script>
<script>
$(document).ready(function() {
    $("#classLink").modal('show');
});
</script>
<script>
function check_class_time() {

    var today = new Date();
    var h = zeros(today.getHours() % 12 || 12);
    var m = today.getMinutes();
    var s = today.getSeconds();
    if (m < 10) {
        m = "0" + m;
    }
    if (s < 10) {
        s = "0" + s;
    }
    var time = h + ':' + m + ':' + s;
    <?php foreach($class_data as $c_d){
         $s_time = date("h:i:s", ($c_d['class_ts']) - (15 * 60));
         $e_time = date("h:i:s", ($c_d['class_ts']) + (15 * 60));
    ?>
    console.log('<?= $s_time ?>');
    console.log('<?= $e_time ?>');
    console.log(time);
    if ('<?=  $s_time ?>' <= time && '<?= $e_time ?>' >= time) {
        document.getElementById("<?= $c_d['class_id'] ?>").style.display = "block";
    } else {
        document.getElementById("<?= $c_d['class_id'] ?>").style.display = "none";
    }
    <?php  }  ?>
}
setInterval(function() {
    check_class_time();
}, 1000);

function zeros(i) {
    if (i < 10) {
        return "0" + i;
    } else {
        return i;
    }
}
</script>