<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Assignment Submission List</h4>
                        </div>
                    </div>

                    <div class="card-body">
                        <?php if(!empty($assignment_check_data)){ ?>
                        <table class="table table-hover table-responsive">
                            <caption>List of Submited Assignment</caption>
                            <thead>
                                <tr>

                                    <th class="text-center">#</th>
                                    <th class="text-center">Submited By</th>
                                    <th class="text-center">Submited At</th>
                                    <th class="text-center">Assignment File</th>
                                    <th class="text-center">Marks</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($assignment_check_data as $a_d) { ?>
                                <tr>
                                    <td class="text-center"><?= $i++; ?></td>
                                    <td class="text-center"><?= $a_d['student_name'] ?></td>
                                    <td class="text-center"><?= date('d M, Y H:i A',$a_d['submited_at']) ?></td>
                                    <td class="text-center">
                                        <a href="https://erp-panel.think-champ.com/assets/assignment_data/<?=$a_d['file']?>"
                                            download>
                                            File
                                        </a>
                                    </td>
                                    <td class="text-center"><?= $a_d['marks'] ?></td>
                                    <?php  if($a_d['status']=='1'){ ?>
                                    <td class="text-danger text-center">Need to Check </td>
                                    <?php } ?>
                                    <?php  if($a_d['status']=='2'){ ?>
                                    <td class="text-success text-center">Checked</td>
                                    <?php } ?>
                                    <td class="text-center">
                                        <!-- Button trigger modal -->
                                        <button type="button" onclick="myFunction(<?= $a_d['id'] ?>)" class="btn btn-success" data-toggle="modal"
                                            data-target="#exampleModal">
                                            Check
                                        </button>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <?php }else{ echo "<h2 class='text-center text-warning'>No Data Found</h2>"; } ?>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Check Assignment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="Assignment/check_assignment" method="post">
            <div class="modal-body">
                <input type="hidden" id="id" name="id">
                <input type="hidden" value="<?= $_GET['id'] ?>" name="ass_id">
                <div class="form-group">
                    <label>Give Marks</label>
                </div>
                <input type="number"  name="marks" class="form-control" required>
            </div>
            <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
</body>
<script>
    function myFunction(id){
        document.getElementById("id").value=id;
    }
</script>