<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <link rel="stylesheet" href="dist/bootstrap.min.css" type="text/css" media="all">
    <link href="dist/jquery.bootgrid.css" rel="stylesheet" />
    <script src="dist/jquery-1.11.1.min.js"></script>
    <script src="dist/bootstrap.min.js"></script>
    <script src="dist/jquery.bootgrid.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="">
            <h1></h1>
            <div class="col-sm-14">
                <div class="well clearfix">
                    <div class="pull-right">
                        <button type="button" class="btn btn-xs btn-primary" id="command-add" data-row-id="0">
                            <span class="glyphicon glyphicon-plus"></span> Student</button>
                    </div>
                </div>
                <table id="employee_grid" class="table table-condensed table-hover table-striped" width="60%" cellspacing="0" data-toggle="bootgrid">
                    <thead>
                        <tr>
                            <th data-column-id="std_id" data-type="numeric" data-identifier="true">Student ID</th>
                            <th data-column-id="std_name">Name</th>
                            <th data-column-id="std_dep">Department</th>
                            <th data-column-id="lvl">Level</th>
                            <th data-column-id="term">Term</th>
                            <th data-column-id="std_email">Email</th>
                            <th data-column-id="commands" data-formatter="commands" data-sortable="false">Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div id="add_model" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add Student</h4>
                </div>
                <div class="modal-body">
                    <form method="post" id="frm_add">
                        <input type="hidden" value="add" name="action" id="action">
                        <div class="form-group">
                            <label for="sid" class="control-label">Student ID:</label>
                            <input type="text" class="form-control" id="name" name="sid" />
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" />
                        </div>
                        <div class="form-group">
                            <label for="dep" class="control-label">Department:</label>
                            <input type="text" class="form-control" id="salary" name="dep" />
                        </div>
                        <div class="form-group">
                            <label for="lvl" class="control-label">Level:</label>
                            <input type="text" class="form-control" id="age" name="lvl" />
                        </div>
                        <div class="form-group">
                            <label for="term" class="control-label">Term:</label>
                            <input type="text" class="form-control" id="name" name="term" />
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label">Email:</label>
                            <input type="text" class="form-control" id="name" name="email" />
                        </div>
                        <div class="form-group">
                            <label for="pass" class="control-label">Password:</label>
                            <input type="text" class="form-control" id="name" name="pass" />
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" id="btn_add" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div id="edit_model" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit Student</h4>
                </div>
                <div class="modal-body">
                    <form method="post" id="frm_edit">
                        <input type="hidden" value="edit" name="action" id="action">
                        <input type="hidden" value="0" name="edit_id" id="edit_id">
                        <div class="form-group">
                            <label for="sid" class="control-label">Student ID:</label>
                            <input type="text" class="form-control" id="edit_sid" name="edit_sid" readonly />
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Name:</label>
                            <input type="text" class="form-control" id="edit_name" name="edit_name" />
                        </div>
                        <div class="form-group">
                            <label for="dep" class="control-label">Department:</label>
                            <input type="text" class="form-control" id="edit_dep" name="edit_dep" />
                        </div>
                        <div class="form-group">
                            <label for="lvl" class="control-label">Level:</label>
                            <input type="text" class="form-control" id="edit_lvl" name="edit_lvl" />
                        </div>
                        <div class="form-group">
                            <label for="term" class="control-label">Term:</label>
                            <input type="text" class="form-control" id="edit_term" name="edit_term" />
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label">Email:</label>
                            <input type="text" class="form-control" id="edit_email" name="edit_email" />
                        </div>
                        <div style="display:none" class="form-group">
                            <label for="pass" class="control-label">Password:</label>
                            <input type="text" class="form-control" id="edit_pass" name="edit_pass" />
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" id="btn_edit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<script type="text/javascript">
    $(document).ready(function () {
        var grid = $("#employee_grid").bootgrid({
            ajax: true,
            rowSelect: true,
            post: function () {
                /* To accumulate custom parameter with the request object */
                return {
                    id: "b0df282a-0d67-40e5-8558-c9e93b7befed"
                };
            },

            url: "response.php",
            formatters: {
                "commands": function (column, row) {
                    return "<button type=\"button\" class=\"btn btn-xs btn-default command-edit\" data-row-id=\"" +
                        row.std_id +
                        "\"><span class=\"glyphicon glyphicon-edit\"></span></button> " +
                        "<button type=\"button\" class=\"btn btn-xs btn-default command-delete\" data-row-id=\"" +
                        row.std_id +
                        "\"><span class=\"glyphicon glyphicon-trash\"></span></button>";
                }
            }
        }).on("loaded.rs.jquery.bootgrid", function () {
            /* Executes after data is loaded and rendered */
            grid.find(".command-edit").on("click", function (e) {
                //alert("You pressed edit on row: " + $(this).data("row-id"));
                var ele = $(this).parent();
                var g_id = $(this).parent().siblings(':first').html();
                var g_name = $(this).parent().siblings(':nth-of-type(2)').html();
                console.log(g_id);
                console.log(g_name);

                //console.log(grid.data());//
                $('#edit_model').modal('show');
                if ($(this).data("row-id") > 0) {

                    // collect the data
                    $('#edit_sid').val(ele.siblings(':first').html()); // in case we're changing the key
                    $('#edit_name').val(ele.siblings(':nth-of-type(2)').html());
                    $('#edit_dep').val(ele.siblings(':nth-of-type(3)').html());
                    $('#edit_lvl').val(ele.siblings(':nth-of-type(4)').html());
                    $('#edit_term').val(ele.siblings(':nth-of-type(5)').html());
                    $('#edit_email').val(ele.siblings(':nth-of-type(6)').html());
                    $('#edit_pass').val(ele.siblings(':nth-of-type(7)').html());
                } else {
                    alert('No row selected! First select row, then click edit button');
                }
            }).end().find(".command-delete").on("click", function (e) {

                var conf = confirm('Delete,'+ 'Student ID: ' + $(this).data("row-id")+ ' ?');
                alert(conf);
                if (conf) {
                    $.post('response.php', {
                        id: $(this).data("row-id"),
                        action: 'delete'
                    }, function () {
                        // when ajax returns (callback), 
                        $("#employee_grid").bootgrid('reload');
                    });
                    //$(this).parent('tr').remove();
                    //$("#employee_grid").bootgrid('remove', $(this).data("row-id"))
                }
            });
        });

        function ajaxAction(action) {
            data = $("#frm_" + action).serializeArray();
            $.ajax({
                type: "POST",
                url: "response.php",
                data: data,
                dataType: "json",
                success: function (response) {
                    $('#' + action + '_model').modal('hide');
                    $("#employee_grid").bootgrid('reload');
                }
            });
        }

        $("#command-add").click(function () {
            $('#add_model').modal('show');
        });
        $("#btn_add").click(function () {
            ajaxAction('add');
        });
        $("#btn_edit").click(function () {
            ajaxAction('edit');
        });
    });
</script>