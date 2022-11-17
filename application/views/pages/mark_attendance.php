<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Mark Attendance</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="Classes/mark_attendance" method="post">
                            <input type="hidden" name="live_class_id" value="<?= $_GET['id'] ?>">
                            <input type="hidden" name="class_id" value="<?= $_GET['class_id'] ?>">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Mark Student Who Attendid the class</label>
                                    </div>
                                    <div class="form-group">
                                        <div class="multi_select_box">
                                            <select name="Student_id[]" data-live-search="true"
                                                title="Choose Student From the Following Options..."
                                                data-selected-text-format="count>3" data-actions-box="true"
                                                class="form-control my-select" multiple required>
                                                <?php foreach($student_data as $s_d){ ?>
                                                <option value="<?= $s_d['student_id'] ?>"><?= $s_d['student_name'] ; ?>
                                                </option>
                                                <?php } ?>
                                            </select>
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
<script>
$(document).ready(function(){
    $('.my-select').selectpicker();
});
</script>