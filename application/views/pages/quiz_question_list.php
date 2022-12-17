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
                            <h4 class="card-title">Question Quiz List</h4>
                        </div>
                    </div>

                    <div class="card-body">
                        <a href="<?= base_url('Quiz-Questions-Create?id=').$_GET['id'] ?>"
                            class="btn btn-md btn-success">Create</a>
                        <table class="table table-hover table-responsive">
                            <caption>List of Questions</caption>
                            <thead>
                                <tr>

                                    <th class="text-center">#</th>
                                    <th class="text-center">Question</th>
                                    <th class="text-center">Quiz</th>
                                    <th class="text-center">Option 1</th>
                                    <th class="text-center">Option 2</th>
                                    <th class="text-center">Option 3</th>
                                    <th class="text-center">Option 4</th>
                                    <th class="text-center">Correct Option</th>
                                    <th class="text-center">Marks</th>
                                    <th class="text-center">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php  if(!empty($quiz_question)){ $i=1; foreach ($quiz_question as $q_d) { ?>
                                <tr>
                                    <td class="text-center"><?= $i++; ?></td>
                                    <td class="text-center"><?php echo $q_d['question_text']; ?></td>
                                    <td class="text-center"><?php echo $q_d['quiz_id']; ?></td>
                                    <td class="text-center"><?php echo $q_d['option_1']; ?></td>
                                    <td class="text-center"><?php echo $q_d['option_2']; ?></td>
                                    <td class="text-center">
                                        <?php if(empty($q_d['option_3'])){ echo "Nill"; }else{  echo $q_d['option_3']; }?>
                                    </td>
                                    <td class="text-center">
                                        <?php if(empty($q_d['option_4'])){ echo "Nill"; }else{  echo $q_d['option_4']; }?>
                                    </td>
                                    <td class="text-center"><?php echo $q_d['correct_options']; ?></td>
                                    <td class="text-center"><?php echo $q_d['marks']; ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('Quiz-Questions-Edit?id=');echo $q_d['question_id']; ?>"
                                            class="btn btn-sm btn-success">Edit</a>
                                    </td>
                                </tr>
                                <?php } }else{?>
                                <h1 class="text-center text-warning">No Data Found</h1>
                                <?php } ?>
                            </tbody>

                        </table>
                        <?php  if(!empty($quiz_question)){ ?>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                <li
                                    class="page-item <?php if(!isset($_GET['page']) || $_GET['page']==1){ ?>disabled <?php } ?>">
                                    <a class="page-link"
                                        href="<?= base_url('Quiz-Questions-List?id='.$_GET['id'].'&page='); if(isset($_GET['page'])){ echo $_GET['page']-1 ; } ?>"
                                        tabindex="-1">Previous</a>
                                </li>
                                <?php for($i=1; $i<=$total_pages;$i++){ ?>

                                <li class="page-item"><a class="page-link"
                                        href="<?= base_url('Quiz-Questions-List?id='.$_GET['id'].'&page='); echo $i ?>"><?= $i; ?></a>
                                </li>
                                <?php } ?>
                                <li class="page-item <?php if($total_pages <= 1){?> disabled <?php } ?>">
                                    <a class="page-link"
                                        href="<?= base_url('Quiz-Questions-List?id='.$_GET['id'].'&page=');if(isset($_GET['page'])){ echo $_GET['page']+1 ; }else echo "1"; ?>">Next</a>
                                </li>
                            </ul>
                        </nav>
                        <?php } ?>
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