<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Course List</h4>
                        </div>
                    </div>
                <?php if($this->session->Flashdata('message')){ ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <?= $this->$session->Flashdata('message'); ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <?php } ?>
                    <div class="card-body">
                    <a href="<?= base_url('Course-Create') ?>" class="btn btn-md btn-success">Create</a>
                        <table class="table table-hover">
                            <caption>List of users</caption>
                            <thead>
                                <tr>

                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                    <th scope="col">Handle</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                    <td><a href="<?= base_url('Course-Edit') ?>" class="btn btn-sm btn-success">Edit</a></td>
                                </tr>
                                <tr>

                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                    <td><a href="<?= base_url('Course-Edit') ?>" class="btn btn-sm btn-success">Edit</a></td>
                                </tr>
                                <tr>

                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                    <td><a href="<?= base_url('Course-Edit') ?>" class="btn btn-sm btn-success">Edit</a></td>
                                </tr>
                                <tr>

                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                    <td><a href="<?= base_url('Course-Edit') ?>" class="btn btn-sm btn-success">Edit</a></td>
                                </tr>

                            </tbody>

                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Main Content -->
    </div>
</div>