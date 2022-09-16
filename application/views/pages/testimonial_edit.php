<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Testimonial Edit</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="admin/testimonial_edit" method="post">
                            <input type="hidden" name="id" value = "<?= $_GET['id']; ?>">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>student id</label>
                                    </div>
                                    <div class="form-group">
                                        <select name="student_id" class="form-control">
                                            <option value="0"></option>
                                            <option <?php  if($testimonial_edit_data['student_id']=="1"){?> Selected<?php } ?> value="1">demo2</option>
                                            <option <?php  if($testimonial_edit_data['student_id']=="2"){?> Selected<?php } ?> value="2">demo3</option>
                                            <option <?php  if($testimonial_edit_data['student_id']=="3"){?> Selected<?php } ?> value="3">demo4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Testimonial Description</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="testimonial_desc"  class="form-control"><?= $testimonial_edit_data['testimonial_desc'] ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>star rating</label>
                                    </div>
                                    <div class="form-group">
                                    <select name="star_rating" class="form-control">
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- <div class="col">
                                    <div class="form-group">
                                        <label>status</label>
                                    </div>
                                    <div class="form-group">
                                        <input name="status" type="radio" value="0">active
                                        <input name="status" type="radio" value="1">inactive
                                    </div>
                                </div> -->

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