<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Internship Edit</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="admin/edit_internship" method="post">
                            <input type="hidden" name="internship_id" value="<?= $_GET['id'] ?>">
                            <input type="hidden" name="stu_id" value="<?= $_GET['stu_id'] ?>">
                        <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Internship Type</label>
                                    </div>
                                    <div class="form-group">
                                        <select name="type" class="form-control" >
                                            <option value="0">Select Any One Option...</option>
                                            <option <?php if($internship_data['paid_or_unpaid']==1){ ?> Selected <?php } ?> value="1">Paid</option>
                                            <option <?php if($internship_data['paid_or_unpaid']==2){ ?> Selected <?php } ?>  value="2">Un-Paid</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Internship Stipend (In Rupees)</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="stipend" class="form-control" value="<?= $internship_data['stipend'] ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Internship Description</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="internship_desc" class="form-control"><?= $internship_data['description'] ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Start Date</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="date" name="start_date" value="<?= $internship_data['start_date'] ?>" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>End Date</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="date" name="end_date" value="<?= $internship_data['end_date'] ?>" class="form-control" required>
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
<script>
CKEDITOR.replace('internship_desc');
</script>