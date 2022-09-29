<div class="content">
    <div class="container-fluid">
        <!-- Main content start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">Course Create</h4>
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
                                            placeholder="Start Writing Here..." required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course Title</label>
                                    </div>
                                    <div class="form-group">
                                        <input name="course_title" type="text" class="form-control"
                                            placeholder="Start Writing Here..." required>
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
                                            placeholder="Start Writing Here..." required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course Level</label>
                                    </div>
                                    <div class="form-group">
                                        <select name="course_level" class="form-control">
                                            <option value="0">Choose Any One Option</option>
                                            <option value="1">Beginner</option>
                                            <option value="2">Intermediate</option>
                                            <option value="3">Advance</option>
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
                                            placeholder="Start Writing Here..." required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Number of Lessons </label>
                                    </div>
                                    <div class="form-group">
                                        <input name="no_of_lessons" type="number" class="form-control"
                                            placeholder="Start Writing Here..." required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Lenguage</label>
                                    </div>
                                    <div class="form-group">
                                        <input name="language" type="text" class="form-control"
                                            placeholder="Start Writing Here..." required>
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
                                            placeholder="Start Writing Here..." required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>First Section Image</label>
                                    </div>
                                    <input type="file" name="sec_1_img" class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>First Section Description</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="sec_1_desc" class="form-control" required>
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
                                            placeholder="Start Writing Here..." required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Second Section Sub Heading</label>
                                    </div>
                                    <div class="form-group">
                                        <input name="sec_2_sub_heading" type="text" class="form-control"
                                            placeholder="Start Writing Here..." required>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Second Section Image</label>
                                    </div>
                                    <input type="file" name="sec_2_img" class="form-control" required>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Second Section Description</label>
                                    </div>
                                    <div id="inputFormRow">
                                        <div class="input-group mb-3">
                                            <input type="text" name="sec_2_desc[heading][]" class="form-control m-input"
                                                placeholder="Enter Heading" autocomplete="off" rquired>
                                        </div>
                                        <div class="input-group mb-3">
                                            <textarea type="text" name="sec_2_desc[desc][]" class="form-control m-input"
                                                placeholder="Enter Description" autocomplete="off"></textarea>
                                        </div>
                                        <div class="input-group-append">
                                            <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                                        </div>
                                    </div>
                                    <div id="newRow"></div>
                                    <button id="addRow" type="button" class="btn btn-info">Add Row</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course Overview Heading</label>
                                    </div>
                                    <div class="form-group">
                                        <input name="overview_heading" type="text" class="form-control"
                                            placeholder="Start Writing Here..." required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course Overview Image</label>
                                    </div>
                                    <input type="file" name="overview_img" class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course Overview Description</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="overview_desc" row="5" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course Overview Point</label>
                                    </div>
                                    <div class="form-group">
                                        <div id="overview_pointsinputFormRow">
                                            <div class="input-group mb-3">
                                                <input type="text" name="course_overview_points[]"
                                                    class="form-control m-input" placeholder="Enter Point"
                                                    autocomplete="off" rquired>
                                                <div class="input-group-append">
                                                    <button id="removeOverview_PointsRow" type="button"
                                                        class="btn btn-danger">Remove</button>
                                                </div>
                                            </div>
                                        </div>
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
                                            placeholder="Start Writing Here..." required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course Keyoutcome Image</label>
                                    </div>
                                    <input type="file" name="keyoutcome_img" class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course Keyoutcome Description</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="keyoutcome_desc" row="10" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course Keyoutcome Point</label>
                                    </div>
                                    <div class="form-group">
                                        <div id="Keyoutcome_pointsinputFormRow">
                                            <div class="input-group mb-3">
                                                <input type="text" name="course_keyoutcome_points[]"
                                                    class="form-control m-input" placeholder="Enter Point"
                                                    autocomplete="off" rquired>
                                                <div class="input-group-append">
                                                    <button id="removeKeyoutcome_PointsRow" type="button"
                                                        class="btn btn-danger">Remove</button>
                                                </div>
                                            </div>
                                        </div>
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
                                            placeholder="Start Writing Here..." required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course Benifits Image</label>
                                    </div>
                                    <input type="file" name="benifits_img" class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course Benifits Description</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="benifits_desc" row="10" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Course Benifits Point</label>
                                    </div>
                                    <div class="form-group">
                                        <div id="Benifits_pointsinputFormRow">
                                            <div class="input-group mb-3">
                                                <input type="text" name="course_Benifits_points[]"
                                                    class="form-control m-input" placeholder="Enter Point"
                                                    autocomplete="off" rquired>
                                                <div class="input-group-append">
                                                    <button id="removeBenifits_PointsRow" type="button"
                                                        class="btn btn-danger">Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="BenifitsPointsRow"></div>
                                        <button id="addBenifitsPointsRow" type="button" class="btn btn-info">Add
                                            Row</button>
                                    </div>
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
        '<input type="text" name="course_Keyoutcome_points[]" class="form-control m-input" placeholder="Enter Point" autocomplete="off" rquired>';
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