<?php
$user_info = $this->session->userdata('user_data');
$access_level = $user_info->access_level;
?>
<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Classes List</h4>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-hover table-responsive">
                            <caption>List of Classes</caption>
                            <thead>
                                <tr>

                                    <th class="text-center">#</th>
                                    <th class="text-center">Class Name</th>
                                    <th class="text-center">Class Type</th>
                                    <th class="text-center">Batch</th>
                                    <?php if($user_info->access_level !=1){ ?>
                                    <th class="text-center">Group</th>
                                    <?php } ?>
                                    <th class="text-center">Timing</th>
                                    <th class="text-center">Class Date</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php  if(!empty($classes_data)){ $i=1; foreach ($classes_data as $c_d) { ?>
                                <tr>
                                    <td class="text-center"><?= $i++; ?></td>
                                    <td class="text-center"><?= $c_d['class_name']; ?></td>
                                    <?php if($c_d['type']=='1'){ ?>
                                    <td class="text-center">Live Class</td>
                                    <?php } ?>
                                    <?php if($c_d['type']=='2'){ ?>
                                    <td class="text-center">Doubt Class</td>
                                    <?php } ?>
                                    <td class="text-center">
                                        <?php echo $c_d['batch_name']; ?>
                                        <?php echo "("; echo $c_d['batch_number']; echo ")"; ?></td>
                                    <?php if($user_info->access_level !=1){ ?>
                                    <td class="text-center">
                                        <?php if($c_d['group_id']!='0'){ echo $c_d['group_name'];  ?>
                                        <?php echo "("; echo $c_d['group_number']; echo ")"; }else{ echo "***" ; } ?>
                                    </td>
                                    <?php } ?>
                                    <td class="text-center">
                                        <?php if(!empty($c_d['class_ts'])){ echo date('h:i A',$c_d['class_ts']); }?>
                                    </td>
                                    <td class="text-center"><?php if(!empty($c_d['class_date'])){ echo date('d M, Y',$c_d['class_date']); }
                                    else{ echo "N/A"; }?></td>
                                    <?php if($c_d['status']=='1'){ ?>
                                    <td class="text-center text-success">Active</td>
                                    <?php } ?>
                                    <?php if($c_d['status']=='0'){ ?>
                                    <td class="text-center text-danger">In-Active</td>
                                    <?php } ?>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button class="btn btn-success dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="material-icons">list</i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item"
                                                    href="<?= base_url("Class-History?class_id=").$c_d['class_id'] ?>">Class History</a>
                                                <a href="<?= base_url('Class-Edit?id=');echo $c_d['class_id']; ?>"
                                                class="dropdown-item" >Edit</a>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                                <?php } }else{?>
                                <h1 class="text-center text-warning">No Data Found</h1>
                                <?php } ?>
                            </tbody>

                        </table>
                        <?php  if(!empty($classes_data)){ ?>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                <li
                                    class="page-item <?php if(!isset($_GET['page']) || $_GET['page']==1){ ?>disabled <?php } ?>">
                                    <a class="page-link"
                                        href="<?= base_url('Classes?page='); if(isset($_GET['page'])){ echo $_GET['page']-1 ; } ?>"
                                        tabindex="-1">Previous</a>
                                </li>
                                <?php for($i=1; $i<=$total_pages;$i++){ ?>

                                <li class="page-item"><a class="page-link"
                                        href="<?= base_url('Classes?page='); echo $i ?>"><?= $i; ?></a></li>
                                <?php } ?>
                                <li class="page-item <?php if($total_pages <= 1){?> disabled <?php } ?>">
                                    <a class="page-link"
                                        href="<?= base_url('Classes?page=');if(isset($_GET['page'])){ echo $_GET['page']+1 ; }else echo "1"; ?>">Next</a>
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