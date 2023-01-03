<?php
$user_info = $this->session->userdata('user_data');
?>
<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Classes Edit</h4>
                        </div>
                    </div>
                    <form action="Classes/class_edit" method="post">
                    <div class="card-body">
                        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Class Timing</label>
                                </div>
                                <div class="form-group">
                                    <input type="time" name="class_ts" class="form-control"  value="<?php if(!empty($class_data['class_ts'])){ echo date("H:i", $class_data['class_ts']); } ?>">
                                </div>
                            </div>
                            <?php if($class_data['type']=='2' || $class_data['type']=='3'){ ?>
                            <div class="col">
                                <div class="form-group">
                                    <label>Class Date</label>
                                </div>
                                <div class="form-group">
                                    <input type="date" name="class_date" class="form-control" value="<?php if(!empty($class_data['class_ts'])){ echo  date("Y-m-d",$class_data['class_date']);}?>">
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="card-footer">
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