<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Add Student Course</h4>
                        </div>
                    </div>
                    <?php if(!isset($_POST['course_id'])){ ?>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Select A Course</label>
                                    </div>
                                    <div class="form-group">
                                        <select name="course_id" class="form-control">
                                            <option value="0" selected disable>Select Any One Option</option>
                                            <?php if(!empty($course_data)){
                                                foreach($course_data as $c_d){
                                            ?>
                                            <option value="<?= $c_d['course_id'] ?>"><?= $c_d['course_name'] ?></option>
                                            <?php } } ?>
                                        </select>   
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer ">
                        <button type="submit" name="next" class="btn btn-sm btn-success">Next</button>
                    </div>
                    </form>
                    <?php } ?>
                    <?php if(isset($_POST['course_id']) && !isset($_POST['batch_id'])){ ?>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Select A Batch</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="course_id" value="<?= $_POST['course_id'] ?>">
                                        <select name="batch_id" class="form-control">
                                            <option value="0" selected disable>Select Any One Option</option>
                                            <?php if(!empty($batch_data)){
                                                foreach($batch_data as $b_d){
                                             ?>
                                            <option value="<?= $b_d['batch_id'] ?>"><?= $b_d['batch_name'] ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer ">
                        <button type="submit" name="next" class="btn btn-sm btn-success">Next</button>
                    </div>
                    </form>
                    <?php } ?>
                    <?php if(isset($_POST['batch_id'])){ ?>
                    <div class="card-body">
                        <form action="" method="post">
                        <input type="hidden" name="s_id" value="<?= $_GET['id'] ?>">
                        <input type="hidden" name="course_id" value="<?= $_POST['course_id'] ?>">
                        <input type="hidden" name="batch_id" value="<?= $_POST['batch_id'] ?>">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Select A Group</label>
                                    </div>
                                    <div class="form-group">
                                        <select name="group_id" class="form-control">
                                            <option value="0" selected disable>Select Any One Option</option>
                                            <?php if(!empty($group_data)){
                                                foreach($group_data as $g_d){
                                            } ?>
                                            <option value="<?= $g_d['group_id'] ?>"><?= $g_d['group_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Payment Type</label>
                                    </div>
                                    <div class="form-group">
                                        <select name="pay_type" id="pay_type" onchange="price_change()" class="form-control">
                                            <option value="1">Full Payment</option>
                                            <option value="2">2 Installments</option>
                                            <option value="3">3 Installments</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Amount Paid</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="amount_paid" id="amount_paid" class="form-control" value="<?= $course_price['price'];  ?>" readonly>
                                        <input type="hidden" name="t_price" class="form-control" value="<?= $course_price['price'];  ?>">
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer ">
                        <button type="submit" name="submit" class="btn btn-sm btn-success">Submit</button>
                    </div>
                    </form>
                    <?php } ?>
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
<script>
    function price_change(){
        let tPrice = <?= $course_price['price'] ?>;
        let payType = document.getElementById("pay_type").value;
        if(payType == 2){
            let val = Math.round(tPrice/2);
            document.getElementById("amount_paid").value=val;
        }
        if(payType == 3){
            let val = Math.round(tPrice/3);
            document.getElementById("amount_paid").value=val;
        }
        if(payType == 1){
            document.getElementById("amount_paid").value=tPrice;
        }
    }
</script>