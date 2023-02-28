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
                            <h4 class="card-title">Add Class Video Manually</h4>
                        </div>
                    </div>
                    <form action="Classes/manual_class_video" method="post">
                        <?php if(isset($_GET['id'])){ ?>
                            <input type="hidden" name="batch_id" value="<?= $_GET['id'] ?>">
                        <?php } ?>
                        <?php if(isset($_GET['g_id'])){ ?>
                            <input type="hidden" name="group_id" value="<?= $_GET['g_id'] ?>">
                        <?php } ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Video Title</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="video_title" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Video Link</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="video_link" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Video Access</label>
                                    </div>
                                    <div class="form-group">
                                        <select name="video_access" id="acc" onchange="videoAccess()" class="form-control">
                                            <option value="1">Everyone</option>
                                            <option value="2">Choose Manually</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col" style="display:none" id="std_col">
                                    <div class="form-group">
                                        <label>Select Students</label>
                                    </div>
                                    <div class="form-group">
                                        <div class="row d-flex justify-content-center mt-100">
                                            <div class="col-md-12"> <select name="std_ids[]" id="choices-multiple-remove-button"
                                                    placeholder="Select Students" multiple required>
                                                    <?php foreach($student_list AS $sl){ ?>
                                                    <option value="<?= $sl['student_id'] ?>"><?= $sl['student_name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <button type="submit" name="submit" class="btn btn-sm btn-success">Submit</button>
                        </div>
                    </form>
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
<script src="assets/assets/assets-for-demo/js/jquery.sharrre.js"></script>
<script>
$(document).ready(function() {

    var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
        removeItemButton: true
    });


});

function populate_batch_id(i, a) {
    console.log(a);
    document.getElementById("batch_id").value = i;
    document.getElementById("class_video_id").value = a;
}
function videoAccess(){
var acc = document.getElementById("acc").value;
if(acc == 2){
document.getElementById("std_col").style.display = "block";
}else{
    document.getElementById("std_col").style.display = "none";
}
}
</script>