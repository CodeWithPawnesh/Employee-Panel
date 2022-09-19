<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Course Edit</h4>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="admin/course_create" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course Name</label>
                                    </div>
                                    <div class="form-group">
                                        <input name="course_name" type="text" class="form-control"
                                            placeholder="Start Writing Here..." value="<?= $course_data['course_name']; ?>" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course Title</label>
                                    </div>
                                    <div class="form-group">
                                        <input name="course_title" type="text" class="form-control"
                                            placeholder="Start Writing Here..." value="<?= $course_data['course_title']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course Abber</label>
                                    </div>
                                    <div class="form-group">
                                        <input name="course_abber" type="text" class="form-control"
                                            placeholder="Start Writing Here..." value="<?= $course_data['course_abber']; ?>" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course Level</label>
                                    </div>
                                    <div class="form-group">
                                        <select name="course_level" class="form-control">
                                            <option <?php if($course_data['course_level']=='0'){ ?>selected<?php } ?> value="0">Choose Any One Option</option>
                                            <option <?php if($course_data['course_level']=='1'){ ?>selected<?php } ?> value="1">Beginner</option>
                                            <option <?php if($course_data['course_level']=='2'){ ?>selected<?php } ?> value="2">Intermediate</option>
                                            <option <?php if($course_data['course_level']=='3'){ ?>selected<?php } ?> value="3">Advance</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Number Of Seats</label>
                                    </div>
                                    <div class="form-group">
                                        <input name="no_of_seats" type="number" class="form-control"
                                            placeholder="Start Writing Here..." value="<?= $course_data['no_of_seats']; ?>" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Number of Lessons </label>
                                    </div>
                                    <div class="form-group">
                                        <input name="no_of_lessons" type="number" class="form-control"
                                            placeholder="Start Writing Here..." value="<?= $course_data['no_of_lessons']; ?>" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Lenguage</label>
                                    </div>
                                    <div class="form-group">
                                        <input name="language" type="text" class="form-control"
                                            placeholder="Start Writing Here..." value="<?= $course_data['language']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>First Section Heading</label>
                                    </div>
                                    <div class="form-group">
                                        <input name="sec_1_heading" type="text" class="form-control"
                                            placeholder="Start Writing Here..." value="<?= $course_data['sec_1_heading']; ?>" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>First Section Image</label>
                                    </div>
                                    <input type="file" name="sec_1_img" class="form-control" required>
                                    <br>
                                    <div style="padding-left:150px;padding-right:150px" >
                                      <img src="assets/images/course/<?= $course_data['sec_1_img']; ?>" style="width:200px;height:150px">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>First Section Description</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="sec_1_desc" value="sec_1_desc"  class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Second Section Heading</label>
                                    </div>
                                    <div class="form-group">
                                        <input name="sec_2_heading" type="text" class="form-control"
                                            placeholder="Start Writing Here..."value="<?= $course_data['sec_2_heading']; ?>" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Second Section Sub Heading</label>
                                    </div>
                                    <div class="form-group">
                                        <input name="sec_2_sub_heading" type="text" class="form-control"
                                            placeholder="Start Writing Here..."value="<?= $course_data['sec_2_sub_heading']; ?>" required>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Second Section Image</label>
                                    </div>
                                    <input type="file" name="sec_2_img" class="form-control" required>
                                    <br>
                                    <div style="padding-left:150px;padding-right:150px" >
                                      <img src="assets/images/course/<?= $course_data['sec_2_img']; ?>" style="width:200px;height:150px">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Second Section Description</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="sec_2_desc" class="form-control"><?= $course_data['sec_2_desc']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course Overview Heading</label>
                                    </div>
                                    <div class="form-group">
                                        <input name="overview_heading" type="text" class="form-control"
                                            placeholder="Start Writing Here..." value="<?= $course_data['overview_heading']; ?>" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course Overview Image</label>
                                    </div>
                                    <input type="file" name="overview_img" class="form-control" required>
                                    <br>
                                    <div style="padding-left:150px;padding-right:150px" >
                                      <img src="assets/images/course/<?= $course_data['overview_img']; ?>" style="width:200px;height:150px">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course Overview Description</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="overview_desc" row="10" class="form-control"><?= $course_data['overview_desc']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course Keyoutcome Heading</label>
                                    </div>
                                    <div class="form-group">
                                        <input name="keyoutcome_heading" type="text" class="form-control"
                                            placeholder="Start Writing Here..." value="<?= $course_data['keyoutcome_heading']; ?>" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course Keyoutcome Image</label>
                                    </div>
                                    <input type="file" name="keyoutcome_img" class="form-control" required>
                                    <br>
                                    <div style="padding-left:150px;padding-right:150px" >
                                      <img src="assets/images/course/<?= $course_data['keyoutcome_img']; ?>" style="width:200px;height:150px">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course Keyoutcome Description</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="keyoutcome_desc" row="10" class="form-control"><?= $course_data['keyoutcome_desc'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course Benifits Heading</label>
                                    </div>
                                    <div class="form-group">
                                        <input name="benifits_heading" type="text" class="form-control"
                                            placeholder="Start Writing Here..." value="<?= $course_data['benifits_heading']; ?>" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course Benifits Image</label>
                                    </div>
                                    <input type="file" name="benifits_img" class="form-control" required>
                                    <br>
                                    <div style="padding-left:150px;padding-right:150px" >
                                      <img src="assets/images/course/<?= $course_data['benifits_img']; ?>" style="width:200px;height:150px">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course Benifits Description</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="benifits_desc" row="10" class="form-control"><?= $course_data['benifits_desc'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer ">
                        <button type="submit" name="submit" class="btn btn-sm btn-success">Submit</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <!-- End Main Content -->
    </div>
</div>
<script>
     CKEDITOR.replace( 'overview_desc' );
 </script>
 <script>
     CKEDITOR.replace( 'keyoutcome_desc' );
 </script>
 <script>
     CKEDITOR.replace( 'benifits_desc' );
 </script>
