<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Quiz Question Edit</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="Quiz/quiz_question_edit" method="post">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Quiz Question Text</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="question_text" class="form-control"
                                            placeholder="Question Text" value="<?= $question_data['question_text'] ?>"
                                            required>
                                        <input type="hidden" name="q_id" value="<?= $question_data['question_id'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>First Option</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="option_1" value="<?= $question_data['option_1'] ?>"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Second Option</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="option_2" value="<?= $question_data['option_2'] ?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div <?php if($question_data['no_of_options']==2){ ?> style="display:none" <?php } ?>>
                                <div class="row ">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Third Option</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="option_3" value="<?= $question_data['option_3'] ?>"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Fourth Option</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="option_4" value="<?= $question_data['option_4'] ?>"
                                                class="form-control">
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
                                            <option <?php if($question_data['correct_options']==1){ ?>selected
                                                <?php } ?> value="1">Frist Option</option>
                                            <option <?php if($question_data['correct_options']==2){ ?>selected
                                                <?php } ?> value="2">Second Option</option>
                                            <option <?php if($question_data['correct_options']==3){ ?>selected
                                                <?php } ?> value="3">Third Option</option>
                                            <option <?php if($question_data['correct_options']==4){ ?>selected
                                                <?php } ?> value="4">Fourth Option</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Marks</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="marks" value="<?= $question_data['marks'] ?>"
                                            class="form-control" required>
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