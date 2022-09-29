<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Quiz Question Create</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="Quiz/quiz_question_create" method="post">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Quiz Question Text</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="question_text" class="form-control"
                                            placeholder="Question Text" required>
                                            <input type="hidden" name="quiz_id" value="<?= $_GET['id'] ?>">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Number Of Options</label>
                                    </div>
                                    <div class="form-group">
                                        <select name="no_of_options" onchange="moropt()" id="opts" class="form-control">
                                            <option value="2">Two Options</option>
                                            <option value="4">Four Options</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>First Option</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="option_1" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Second Option</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="option_2" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="opt_row" id="mor_opt">
                                <div class="row ">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Third Option</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="option_3" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Fourth Option</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="option_4" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>
                                            Correct Option
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <select name="correct_option" class="form-control">
                                            <option value="0">Select Any One Option</option>
                                            <option value="1">Frist Option</option>
                                            <option value="2">Second Option</option>
                                            <option value="3">Third Option</option>
                                            <option value="4">Fourth Option</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Marks</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="marks" class="form-control" required>
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