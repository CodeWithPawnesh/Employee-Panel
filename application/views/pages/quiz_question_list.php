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
                            <h4 class="card-title">Quiz Question List</h4>
                        </div>
                    </div>

                    <div class="card-body">
                        <a href="<?= base_url('Quiz-Questions-Create?id=').$_GET['id'] ?>"
                            class="btn btn-md btn-success">Create</a>
                            <a href="<?= base_url('Quiz-Question-Bank?section=add&id=').$_GET['id'] ?>"
                            class="btn btn-md btn-success">Add From QB</a>
                        <table class="table table-hover table-responsive">
                            <?php if(!empty($quiz_question)){  ?>
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
                                <?php  $i=1; foreach ($quiz_question as $q_d) { ?>
                                <tr>
                                    <td class="text-center"><?= $i++; ?></td>
                                    <td class="text-center"><?php echo $q_d['question_text']; ?></td>
                                    <td class="text-center"><?php echo $q_d['quiz_title']; ?></td>
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
                                    <div class="dropdown show">
                                       <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        
                                       </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                       <a href="<?= base_url('Quiz-Questions-Edit?id=');echo $q_d['question_id']; ?>&quiz_id=<?= $_GET['id'] ?>"
                                            class="dropdown-item">Edit</a>
                                       <a class="dropdown-item" href="<?= base_url("Quiz-Questions-List?delete_id=").$q_d['qq_id'] ?>&quiz_id=<?= $_GET['id'] ?>">Delete</a>
                                    </div>
                                     </div>
                                   </td>
                                </tr>
                                <?php } }else{?>
                                <h1 class="text-center text-warning">No Data Found</h1>
                                <?php } ?>
                            </tbody>

                        </table>
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