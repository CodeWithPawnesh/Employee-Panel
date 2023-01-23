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
                            <h4 class="card-title">Order List</h4>
                        </div>
                    </div>

                    <div class="card-body">
                        <?php if(!empty($order_data)){ ?>
                        <table class="table table-hover table-responsive">
                            <caption>List of Order</caption>
                            <thead>
                                <tr>

                                    <th class="text-center">#</th>
                                    <th class="text-center">Student Name</th>
                                    <th class="text-center">Course Name</th>
                                    <th class="text-center">Batch Name</th>
                                    <th class="text-center">Main Order Id</th>
                                    <th class="text-center">Order Id</th>
                                    <th class="text-center">Payment Id</th>
                                    <th class="text-center">Mode</th>
                                    <th class="text-center">Payment Type</th>
                                    <th class="text-center">Payment No.</th>
                                    <th class="text-center">Amount Paid</th>
                                    <th class="text-center">Method</th>
                                    <th class="text-center">Order Date</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($order_data as $o_d) { ?>
                                <tr>
                                    <td class="text-center"><?= $i++; ?></td>
                                    <td class="text-center"><?= $o_d['student_name'] ?></td>
                                    <td class="text-center"><?= $o_d['course_name'] ?></td>
                                    <td class="text-center"><?= $o_d['batch_name'] ?></td>
                                    <td class="text-center"><?= $o_d['main_order_id'] ?></td>
                                    <td class="text-center"><?= $o_d['pay_order_id'] ?></td>
                                    <td class="text-center"><?= $o_d['payment_id'] ?></td>
                                    <!-- MODE -->
                                    <?php if($o_d['mode']==1){ ?>
                                    <td class="text-center">Online</td>
                                    <?php } ?>
                                    <?php if($o_d['mode']==2){ ?>
                                    <td class="text-center">Offline</td>
                                    <?php } ?>
                                    <!-- END MODE
                                         PAY TYPE
                                    -->
                                    <?php if($o_d['pay_type']==1){ ?>
                                    <td class="text-center">Full Payment</td>
                                    <?php } ?>
                                    <?php if($o_d['pay_type']==2){ ?>
                                    <td class="text-center">2 Inst.</td>
                                    <?php } ?>
                                    <?php if($o_d['pay_type']==3){ ?>
                                    <td class="text-center">3 Inst.</td>
                                    <?php } ?>
                                    <!-- END PAY TYPE -->
                                    <td class="text-center"><?= $o_d['pay_no'] ?></td>
                                    <td class="text-center"><?= $o_d['fee_paid'] ?></td>
                                    <td class="text-center"><?= $o_d['method'] ?></td>
                                    <td class="text-center"><?= date('d M, Y h:i A',$o_d['order_tc']) ?></td>
                                    <?php if($o_d['status']==1){ ?>
                                    <td class="text-center text-success">Active</td>
                                    <?php } ?>
                                </tr>
                                <?php } }else{ ?>
                                    <h1 class='text-center text-warning'>No Data Found</h1>
                                    <?php } ?>


                            </tbody>

                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                <li
                                    class="page-item <?php if(!isset($_GET['page']) || $_GET['page']==1){ ?>disabled <?php } ?>">
                                    <a class="page-link"
                                        href="<?= base_url('Order?page='); if(isset($_GET['page'])){ echo $_GET['page']-1 ; } ?>"
                                        tabindex="-1">Previous</a>
                                </li>
                                <?php for($i=1; $i<=$total_pages;$i++){ ?>

                                <li class="page-item"><a class="page-link"
                                        href="<?= base_url('Order?page='); echo $i ?>"><?= $i; ?></a></li>
                                <?php } ?>
                                <li class="page-item">
                                    <a class="page-link"
                                        href="<?= base_url('Order?page=');if(isset($_GET['page'])){ echo $_GET['page']+1 ; }else echo "1"; ?>">Next</a>
                                </li>
                            </ul>
                        </nav>
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