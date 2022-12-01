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
                        <form action="admin/course_edit" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course Name</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                                        <input name="course_name" type="text" class="form-control"
                                            placeholder="Start Writing Here..."
                                            value="<?= $course_data['course_name']; ?>" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course Title</label>
                                    </div>
                                    <div class="form-group">
                                        <input name="course_title" type="text" class="form-control"
                                            placeholder="Start Writing Here..."
                                            value="<?= $course_data['course_title']; ?>" required>
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
                                            placeholder="Start Writing Here..."
                                            value="<?= $course_data['course_abber']; ?>" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course Level</label>
                                    </div>
                                    <div class="form-group">
                                        <select name="course_level" class="form-control">
                                            <option <?php if($course_data['course_level']=='0'){ ?>selected<?php } ?>
                                                value="0">Choose Any One Option</option>
                                            <option <?php if($course_data['course_level']=='1'){ ?>selected<?php } ?>
                                                value="1">Beginner</option>
                                            <option <?php if($course_data['course_level']=='2'){ ?>selected<?php } ?>
                                                value="2">Intermediate</option>
                                            <option <?php if($course_data['course_level']=='3'){ ?>selected<?php } ?>
                                                value="3">Advance</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                
                                <div class="col">
                                    <div class="form-group">
                                        <label>Number of Lessons </label>
                                    </div>
                                    <div class="form-group">
                                        <input name="no_of_lessons" type="number" class="form-control"
                                            placeholder="Start Writing Here..."
                                            value="<?= $course_data['no_of_lessons']; ?>" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Lenguage</label>
                                    </div>
                                    <div class="form-group">
                                        <input name="language" type="text" class="form-control"
                                            placeholder="Start Writing Here..." value="<?= $course_data['language']; ?>"
                                            required>
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
                                            placeholder="Start Writing Here..."
                                            value="<?= $course_data['sec_1_heading']; ?>" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>First Section Image</label>
                                    </div>
                                    <input type="file" name="sec_1_img" class="form-control">
                                    <br>
                                    <div style="padding-left:150px;padding-right:150px">
                                        <img src="assets/images/course/<?= $course_data['sec_1_img']; ?>"
                                            style="width:200px;height:150px">
                                        <input type="hidden" name="h_sec_1_img"
                                            value="<?= $course_data['sec_1_img']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>First Section Description</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="sec_1_desc" value="sec_1_desc" class="form-control"
                                            required>
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
                                            placeholder="Start Writing Here..."
                                            value="<?= $course_data['sec_2_heading']; ?>" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Second Section Sub Heading</label>
                                    </div>
                                    <div class="form-group">
                                        <input name="sec_2_sub_heading" type="text" class="form-control"
                                            placeholder="Start Writing Here..."
                                            value="<?= $course_data['sec_2_sub_heading']; ?>" required>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Second Section Image</label>
                                    </div>
                                    <input type="file" name="sec_2_img" class="form-control">
                                    <input type="hidden" name="h_sec_2_img" value="<?= $course_data['sec_2_img']; ?>">
                                    <br>
                                    <div style="padding-left:150px;padding-right:150px">
                                        <img src="assets/images/course/<?= $course_data['sec_2_img']; ?>"
                                            style="width:200px;height:150px">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Second Section Description</label>
                                    </div>
                                    <div class="form-group">
                                        <?php
                                        $sec_2_desc = $course_data['sec_2_desc'];
                                        $sec_2_desc = json_decode($sec_2_desc,true);
                                        
                                        for($i=0;$i<sizeof($sec_2_desc['heading']); $i++){
                                        ?>
                                        <div id="inputFormRow">
                                            <div class="input-group mb-3">
                                                <input type="text" name="sec_2_desc[heading][]"
                                                    value="<?= $sec_2_desc['heading'][$i] ?>"
                                                    class="form-control m-input" placeholder="Enter Heading"
                                                    autocomplete="off" rquired>
                                            </div>
                                            <div class="input-group mb-3">
                                                <textarea type="text" name="sec_2_desc[desc][]"
                                                    class="form-control m-input" placeholder="Enter Description"
                                                    autocomplete="off"><?= $sec_2_desc['desc'][$i] ?></textarea>
                                            </div>
                                            <div class="input-group-append">
                                                <button id="removeRow" type="button"
                                                    class="btn btn-danger">Remove</button>
                                            </div>
                                        </div>
                                        <?php
                                        }
                                    ?>
                                        <div id="newRow"></div>
                                        <button id="addRow" type="button" class="btn btn-info">Add Row</button>
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
                                            placeholder="Start Writing Here..."
                                            value="<?= $course_data['overview_heading']; ?>" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course Overview Image</label>
                                    </div>
                                    <input type="file" name="overview_img" class="form-control">
                                    <input type="hidden" name="h_overview_img"
                                        value="<?= $course_data['overview_img']; ?>">
                                    <br>
                                    <div style="padding-left:150px;padding-right:150px">
                                        <img src="assets/images/course/<?= $course_data['overview_img']; ?>"
                                            style="width:200px;height:150px">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course Overview Description</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="overview_desc" row="10"
                                            class="form-control"><?= $course_data['overview_desc']; ?></textarea>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course Overview Point</label>
                                    </div>
                                    <div class="form-group">
                                        <?php
                                        $overview_points = $course_data['overview_points'];
                                        $overview_points = json_decode($overview_points,true);
                                        for($i=0;$i<count($overview_points); $i++){
                                        ?>
                                        <div id="overview_pointsinputFormRow">
                                            <div class="input-group mb-3">
                                                <input type="text" name="course_overview_points[]"
                                                    value="<?= $overview_points[$i]; ?>" class="form-control m-input"
                                                    placeholder="Enter Point" autocomplete="off" rquired>
                                                <div class="input-group-append">
                                                    <button id="removeOverview_PointsRow" type="button"
                                                        class="btn btn-danger">Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <div id="OverViewPointsRow"></div>
                                        <button id="addOverViewPointsRow" type="button" class="btn btn-info">Add
                                            Row</button>
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
                                            placeholder="Start Writing Here..."
                                            value="<?= $course_data['keyoutcome_heading']; ?>" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course Keyoutcome Image</label>
                                    </div>
                                    <input type="file" name="keyoutcome_img" class="form-control">
                                    <input type="hidden" name="h_keyoutcome_img"
                                        value="<?= $course_data['keyoutcome_img']; ?>s">
                                    <br>
                                    <div style="padding-left:150px;padding-right:150px">
                                        <img src="assets/images/course/<?= $course_data['keyoutcome_img']; ?>"
                                            style="width:200px;height:150px">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course Keyoutcome Description</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="keyoutcome_desc" row="10"
                                            class="form-control"><?= $course_data['keyoutcome_desc'] ?></textarea>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course Keyoutcome Point</label>
                                    </div>
                                    <div class="form-group">
                                        <?php
                                        $keyoutcome_points = $course_data['keyoutcome_points'];
                                        $keyoutcome_points = json_decode($keyoutcome_points,true);
                                        for($i=0;$i<count($keyoutcome_points); $i++){
                                        ?>
                                        <div id="Keyoutcome_pointsinputFormRow">
                                            <div class="input-group mb-3">
                                                <input type="text" name="course_keyoutcome_points[]"
                                                    value="<?= $keyoutcome_points[$i]; ?>" class="form-control m-input"
                                                    placeholder="Enter Point" autocomplete="off" rquired>
                                                <div class="input-group-append">
                                                    <button id="removeKeyoutcome_PointsRow" type="button"
                                                        class="btn btn-danger">Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <div id="KeyoutcomePointsRow"></div>
                                        <button id="addKeyoutcomePointsRow" type="button" class="btn btn-info">Add
                                            Row</button>
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
                                            placeholder="Start Writing Here..."
                                            value="<?= $course_data['benifits_heading']; ?>" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course Benifits Image</label>
                                    </div>
                                    <input type="file" name="benifits_img" class="form-control">
                                    <input type="hidden" name="h_benifits_img"
                                        value="<?= $course_data['benifits_img']; ?>">
                                    <br>
                                    <div style="padding-left:150px;padding-right:150px">
                                        <img src="assets/images/course/<?= $course_data['benifits_img']; ?>"
                                            style="width:200px;height:150px">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course Benifits Description</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="benifits_desc" row="10"
                                            class="form-control"><?= $course_data['benifits_desc'] ?></textarea>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course Benifits Point</label>
                                    </div>
                                    <div class="form-group">
                                        <?php
                                        $benifits_points = $course_data['benifits_points'];
                                        $benifits_points = json_decode($benifits_points,true);
                                        for($i=0;$i<count($benifits_points); $i++){
                                        ?>
                                        <div id="Benifits_pointsinputFormRow">
                                            <div class="input-group mb-3">
                                                <input type="text" name="course_Benifits_points[]"
                                                    value="<?= $benifits_points[$i]; ?>" class="form-control m-input"
                                                    placeholder="Enter Point" autocomplete="off" rquired>
                                                <div class="input-group-append">
                                                    <button id="removeBenifits_PointsRow" type="button"
                                                        class="btn btn-danger">Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <div id="BenifitsPointsRow"></div>
                                        <button id="addBenifitsPointsRow" type="button" class="btn btn-info">Add
                                            Row</button>
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
<script>
CKEDITOR.replace('overview_desc');
</script>
<script>
CKEDITOR.replace('keyoutcome_desc');
</script>
<script>
CKEDITOR.replace('benifits_desc');
</script>
<script type="text/javascript">
// add row
$("#addRow").click(function() {
    var html = '';
    html += '<div id="inputFormRow">';
    html += '<div class="input-group mb-3">';
    html +=
        '<input type="text" name="sec_2_desc[heading][]" class="form-control m-input" placeholder="Enter Heading" autocomplete="off" rquired>';
    html += '</div>';
    html += '<div class="input-group mb-3">';
    html +=
        '<textarea type="text" name="sec_2_desc[desc][]" class="form-control m-input" placeholder="Enter Description" autocomplete="off"></textarea>';
    html += '</div>';
    html += '<div class="input-group-append">';
    html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
    html += '</div>';

    $('#newRow').append(html);
});

// remove row
$(document).on('click', '#removeRow', function() {
    $(this).closest('#inputFormRow').remove();
});
</script>
<script type="text/javascript">
// add row
$("#addOverViewPointsRow").click(function() {
    var html = '';
    html += '<div id="overview_pointsinputFormRow">';
    html += '<div class="input-group mb-3">';
    html +=
        '<input type="text" name="course_overview_points[]" class="form-control m-input" placeholder="Enter Point" autocomplete="off" rquired>';
    html += '<div class="input-group-append">';
    html += '<button id="removeOverview_PointsRow" type="button" class="btn btn-danger">Remove</button>';
    html += '</div>';
    html += '</div>';

    $('#OverViewPointsRow').append(html);
});

// remove row
$(document).on('click', '#removeOverview_PointsRow', function() {
    $(this).closest('#overview_pointsinputFormRow').remove();
});
</script>
<script type="text/javascript">
// add row
$("#addKeyoutcomePointsRow").click(function() {
    var html = '';
    html += '<div id="Keyoutcome_pointsinputFormRow">';
    html += '<div class="input-group mb-3">';
    html +=
        '<input type="text" name="course_keyoutcome_points[]" class="form-control m-input" placeholder="Enter Point" autocomplete="off" rquired>';
    html += '<div class="input-group-append">';
    html += '<button id="removeKeyoutcome_PointsRow" type="button" class="btn btn-danger">Remove</button>';
    html += '</div>';
    html += '</div>';

    $('#KeyoutcomePointsRow').append(html);
});

// remove row
$(document).on('click', '#removeKeyoutcome_PointsRow', function() {
    $(this).closest('#Keyoutcome_pointsinputFormRow').remove();
});
</script>
<script type="text/javascript">
// add row
$("#addBenifitsPointsRow").click(function() {
    var html = '';
    html += '<div id="Benifits_pointsinputFormRow">';
    html += '<div class="input-group mb-3">';
    html +=
        '<input type="text" name="course_Benifits_points[]" class="form-control m-input" placeholder="Enter Point" autocomplete="off" rquired>';
    html += '<div class="input-group-append">';
    html += '<button id="removeBenifits_PointsRow" type="button" class="btn btn-danger">Remove</button>';
    html += '</div>';
    html += '</div>';

    $('#BenifitsPointsRow').append(html);
});

// remove row
$(document).on('click', '#removeBenifits_PointsRow', function() {
    $(this).closest('#Benifits_pointsinputFormRow').remove();
});
</script>