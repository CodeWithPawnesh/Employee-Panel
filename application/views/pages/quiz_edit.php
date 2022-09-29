<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Quiz Edit</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="quiz/quiz_edit" method="post">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Quiz Title</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="quiz_id" value="<?= $_GET['id'] ?>"
                                            class="form-control">
                                        <input type="text" name="quiz_title" class="form-control"
                                            value="<?= $quiz_data['quiz_title'] ?>" placeholder="Quiz List" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Quiz Duration in Minutes</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="duration" class="form-control"
                                            value="<?= $quiz_data['quiz_duration'] ?>"
                                            placeholder="Quiz Duration in Minutes" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Start Date</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="date" name="start_date" class="form-control"
                                            value="<?= date('Y-m-d',$quiz_data['quiz_start_date']) ?>" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>End Date</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="date" name="end_date" class="form-control"
                                            value="<?= date('Y-m-d',$quiz_data['quiz_end_date']) ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button name="submit" type="submit" class="btn btn-sm btn-success">Submit</button>
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