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
<!--<a class="text-white shadow" href="?page=teacher_chat" style="z-index:9999; position:fixed; bottom:40px; right:100px; height:34px; border-radius:1000px; background: #e91e63; padding:5px 10px 0; text-align:center">
                Chat With Thai Admin
            </a>-->
<a class="text-white shadow" href="?page=student_chat"
    style="z-index:9999; position:fixed; bottom:30px; right:20px; height:60px; width:60px; border-radius:1000px; background: #e91e63; padding-top:15px; text-align:center">
    <i class="material-icons" style="font-size:35px">forum</i>
</a>
<!--<a class="text-white shadow" href="https://houseofsoftskills.whereby.com/hossadmin" target="_blank" style="z-index:9999; position:fixed; bottom:30px; right:100px; height:60px; width:60px; border-radius:1000px; background: #e91e63; padding-top:15px; text-align:center">
                <i class="material-icons" style="font-size:35px">ondemand_video</i>
            </a>-->

</div>
</div>
</body>
<!--   Core JS Files   -->
<script src="assets/assets/js/core/jquery.min.js"></script>
<script src="assets/assets/js/core/popper.min.js"></script>
<script src="assets/assets/js/bootstrap-material-design.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin  -->
<script src="assets/assets/js/plugins/moment.min.js"></script>
<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="assets/assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select 
<script src="./assets/js/plugins/jquery.select-bootstrap.js"></script>-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<!--	Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/  -->
<script src="assets/assets/js/plugins/bootstrap-tagsinput.js"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="assets/assets/js/plugins/jasny-bootstrap.min.js"></script>
<!-- Plugins for presentation and navigation  -->
<script src="assets/assets/assets-for-demo/js/modernizr.js"></script>
<!-- Material Kit Core initialisations of plugins and Bootstrap Material Design Library -->
<script src="assets/assets/js/material-dashboard.js?v=2.0.1"></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<!-- Library for adding dinamically elements -->
<script src="assets/assets/js/plugins/arrive.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="assets/assets/js/plugins/jquery.validate.min.js"></script>
<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="assets/assets/js/plugins/chartist.min.js"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="assets/assets/js/plugins/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="assets/assets/js/plugins/bootstrap-notify.js"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="assets/assets/js/plugins/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
<script src="assets/assets/js/plugins/sweetalert2.js"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="assets/assets/js/plugins/fullcalendar.min.js"></script>
<script>
function logout() {
    $.post("scripts/logout.php", "logout", function(data) {
        if (data = 1) {
            window.location = "index.php";
        }
    })
}
</script>
<script type="text/javascript">
$(document).ready(function() {
    //init DateTimePickers
    md.initFormExtendedDatetimepickers();
    // Sliders Init
    //md.initSliders();
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $(function() {
        $('[data-toggle="popover"]').popover()
    })
    $('#datatables').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records",
        }

    });
    var table = $('#datatables').DataTable();

    // Edit record
    table.on('click', '.edit', function() {
        $tr = $(this).closest('tr');

        var data = table.row($tr).data();
        alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
    });

    // Delete a record
    table.on('click', '.remove', function(e) {
        $tr = $(this).closest('tr');
        table.row($tr).remove().draw();
        e.preventDefault();
    });

    //Like record
    table.on('click', '.like', function() {
        alert('You clicked on Like button');
    });

    $('.card .material-datatables label').addClass('form-group');
});
</script>

<!-- Sharrre libray -->
<script src="assets/assets/assets-for-demo/js/jquery.sharrre.js">
</script>
</script>
<script>
function add_event() {
    datasend = $("#EventForm").serialize();
    $.post(
        "scripts/add_event.php",
        datasend,
        function(data) {
            if (data == 1) {
                location.reload();
            } else {
                $.notify({
                    message: data
                }, {
                    type: "warning",
                    timer: 4000,
                    placement: {
                        from: 'bottom',
                        align: 'center'
                    }
                });
            }
        }
    );
}
$(document).ready(function() {
    $('#datatables1 tfoot th').each(function() {
        var title = $(this).text();
        if (title == '##') {
            $(this).html('');
        } else {
            $(this).html('<input type="text" class="form-control" placeholder="Search " />');
        }
    });
    var table1 = $('#datatables1').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records",
        }
    });
    table1.columns().every(function() {
        var that = this;
        $('input', this.footer()).on('keyup change', function() {
            if (that.search() !== this.value) {
                that
                    .search(this.value)
                    .draw();
            }
        });
    });
});
</script>

</html>