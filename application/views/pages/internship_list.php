<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Internship List</h4>
                        </div>
                    </div>

                    <div class="card-body">
                        <a href="<?= base_url('Internship-Create?id=').$_GET['id']?>" class="btn btn-md btn-success">Create</a>
                        <?php if(!empty($internship_data)){ ?>
                        <table class="table table-hover table-responsive">
                            <caption>List of Internship</caption>
                            <thead>
                                <tr>

                                    <th class="text-center">#</th>
                                    <th class="text-center">Start Date</th>
                                    <th class="text-center">End Date</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Type</th>
                                    <th class="text-center">Stipend</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                    

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($internship_data as $i_d) { ?>
                                <tr>
                                    <td class="text-center"><?= $i++; ?></td>
                                    <td class="text-center"><?= date('d M, Y',strtotime($i_d['start_date'])) ?></td>
                                    <td class="text-center"><?= date('d M, Y',strtotime($i_d['end_date'])) ?></td>
                                    <td class="text-center"><?= $i_d['description'] ?></td>
                                    <?php  if($i_d['paid_or_unpaid']=='1'){ ?>
                                    <td class="text-success text-center">Paid</td>
                                    <?php } ?>
                                    <?php  if($i_d['paid_or_unpaid']=='2'){ ?>
                                    <td class="text-success text-center">Un-Paid</td>
                                    <?php } ?>
                                    <td class="text-center"><?= $i_d['stipend'] ?></td>
                                    <?php  if($i_d['status']=='1'){ ?>
                                    <td class="text-warning text-center">Under-Review</td>
                                    <?php } ?>
                                    <?php  if($i_d['status']=='0'){ ?>
                                    <td class="text-danger text-center">In-Active</td>
                                    <?php } ?>
                                    <?php  if($i_d['status']=='2'){ ?>
                                    <td class="text-danger text-center">Accepted</td>
                                    <?php } ?>
                                    <td class="text-center">
                                    <div class="dropdown show">
                                       <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a href="<?= base_url('Internship-Edit?id=');echo $i_d['internship_id']; ?>&stu_id=<?= $i_d['student_id'] ?>"
                                            class="dropdown-item">Edit</a>
                                        <a href="<?= base_url('Internship-List?delete_id=');echo $i_d['internship_id']; ?>"
                                            class="dropdown-item">Delete</a>
                                        <?php if($i_d['status']=='1'){ ?>
                                        <a href="<?= base_url('Internship-List?in_id='); echo $i_d['internship_id']; ?>&status=0&stu_id=<?= $i_d['student_id'] ?>"
                                            class="dropdown-item">Un-Publish</a>
                                        <?php } ?>
                                        <?php if($i_d['status']=='0'){ ?>
                                        <a href="<?= base_url('Internship-List?in_id='); echo $i_d['internship_id']; ?>&status=1&stu_id=<?= $i_d['student_id'] ?>"
                                            class="dropdown-item">Publish</a>
                                        <?php } ?>
                                    </div>
                                </div>
                                    </td>

                                </tr>
                                <?php } }else{ ?>
                                    <h1 class='text-center text-warning'>No Data Found</h1>
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