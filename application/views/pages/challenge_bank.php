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
                <?php } if(!isset($_GET['section']) && !isset($_GET['id'])) { ?>

                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Challenge Bank</h4>
                        </div>
                    </div>

                    <div class="card-body">
                        <a href="<?= base_url('Challenge-Create')?>" class="btn btn-md btn-success">Create</a>
                        <table class="table table-hover table-responsive">
                            <?php if(!empty($challenge_bank)){  ?>
                            <caption>List of Challenges</caption>
                            <thead>
                                <tr>

                                    <th class="text-center">#</th>
                                    <th class="text-center">Challenge Name</th>
                                    <th class="text-center">Course Name</th>
                                    <th class="text-center">Challenge Text</th>
                                    <th class="text-center">Code Text</th>
                                    <th class="text-center">Expected Output</th>
                                    <th class="text-center">Marks</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  $i=1; foreach ($challenge_bank as $c_d) { ?>
                                <tr>
                                    <td class="text-center"><?= $i++; ?></td>
                                    <td class="text-center"><?= $c_d['challenge_name'] ?></td>
                                    <td class="text-center"><?= $c_d['course_name'] ?></td>
                                    <td class="text-center"><?= $c_d['challenge_text'] ?></td>
                                    <td class="text-center"><?= $c_d['challenge_prog_text'] ?></td>
                                    <td class="text-center"><?= $c_d['challenge_output'] ?></td>
                                    <td class="text-center"><?= $c_d['marks']; ?></td> 
                                    <td class="text-center">
                                        <div class="dropdown show">
                                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                                id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a href="<?= base_url('Challenge-Edit?ch_id=');echo $c_d['ch_id'] ?>"
                                                    class="dropdown-item">Edit</a>
                                                <a class="dropdown-item"
                                                    href="<?= base_url("Challenge-Bank?delete_id=").$c_d['ch_id'] ?>">Delete</a>
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
                <?php } if(isset($_GET['section']) && $_GET['id']) { ?>
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Add Challenge From Bank</h4>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="Challenge-Bank" method="post">
                            <input type="hidden" name="p_quiz_id" value='<?= $_GET['id'] ?>'>
                            <input type="hidden" name="c_id" value='<?= $_GET['c'] ?>'>
                            <table class="table table-hover table-responsive">
                                <?php if(!empty($challenge_bank)){  ?>
                                <caption>List of Challenges</caption>
                                <thead>
                                    <tr>
                                        <th class="text-center">Check</th>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Course Name</th>
                                        <th class="text-center">Challenge Text</th>
                                        <th class="text-center">Code Text</th>
                                        <th class="text-center">Expected Output</th>
                                        <th class="text-center">Marks</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  $i=1; foreach ($challenge_bank as $c_d) { ?>
                                    <tr>
                                        <td class="text-center"><input type="checkbox" name="ch_ids[]"
                                                value='<?= $c_d['ch_id'] ?>'></td>
                                        <td class="text-center"><?= $i++; ?></td>
                                        <td class="text-center"><?= $c_d['course_name'] ?></td>
                                        <td class="text-center"><?= $c_d['challenge_text'] ?></td>
                                        <td class="text-center"><?= $c_d['challenge_prog_text'] ?></td>
                                        <td class="text-center"><?= $c_d['challenge_output'] ?></td>
                                        <td class="text-center"><?= $c_d['marks']; ?></td>
                                        <td class="text-center">
                                            <div class="dropdown show">
                                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                                    id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a href="<?= base_url('Challenge-Edit?id=');echo $c_d['ch_id'] ?>"
                                                        class="dropdown-item">Edit</a>
                                                    <a class="dropdown-item"
                                                        href="<?= base_url("Challenge-Bank?delete_id=").$c_d['ch_id'] ?>">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } }else{?>
                                    <h1 class="text-center text-warning">No Data Found</h1>
                                    <?php } ?>
                                </tbody>

                            </table>
                            <button type="submit" name="submit" class="btn btn-sm btn-success">Submit</button>
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