<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
            <?php if(isset($_GET['id']) && isset($_GET['c'])){ ?>
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Challenge Create</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="Programing_module/challenge_create" method="post">
                            <input type="hidden" name="p_quiz_id" value="<?= $_GET['id'] ?>">
                            <input type="hidden" name="course_id" value="<?= $_GET['c'] ?>">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Challenge Name</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="challenge_name" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Challenge Text</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="challenge_text" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Code Text</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="code_text" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Challenge Output</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="challenge_output" placeholder="Challenge Output"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Marks</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="marks" placeholder="Marks" class="form-control"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit" name="submit" class="btn btn-sm btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php } ?>
                <!-- Challenge Bank Create -->
                <?php if(!isset($_GET['id']) && !isset($_GET['course_id'])){ ?>
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Challenge Create</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="Programing_module/challenge_create" method="post">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course</label>
                                    </div>
                                    <div class="form-group">
                                        <select name="course_id" class="form-control" required>
                                            <option value="0" selected disabled>
                                                Select Any One Option...
                                            </option>
                                            <?php foreach($course_data AS $cd){ ?>
                                                <option value="<?= $cd['course_id'] ?>"><?= $cd['course_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Challenge Name</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="challenge_name" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Challenge Text</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="challenge_text" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Code Text</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="code_text" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Challenge Output</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="challenge_output" placeholder="Challenge Output"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Marks</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="marks" placeholder="Marks" class="form-control"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit" name="b_submit" class="btn btn-sm btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php } ?>
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
function moropt() {
    var no_opts = document.getElementById("opts").value;
    if (no_opts == 4) {
        console.log(no_opts);
        document.getElementById("mor_opt").style.display = "block";
    } else {
        document.getElementById("mor_opt").style.display = "none";
    }
}
</script>
<script>
CKEDITOR.replace('challenge_text');
</script>