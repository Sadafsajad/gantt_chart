<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toggle View</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" />
   	<style>
	body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 0;
}

.main {
    width: 90%;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.tabs {
	
	display:flex;
	justify-content:center;
	align-items:center;
    margin-bottom: 20px;
}

.tab-button {
    padding: 10px 20px;
    margin-right: 5px;
    cursor: pointer;
    background-color: #f0f0f0;
    border: none;
    border-radius: 3px;
    transition: background-color 0.3s;
}

.tab-button:hover {
    background-color: #ddd;
}

.view {
    border: 1px solid #ccc;
    padding: 20px;
    border-radius: 3px;
}

.table-container {
    display: flex;
}

.left-table {
    width: 30%;
	padding-right: 5px;
}
.right-table {
    width: 70%;
}
table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 10px;
    border: 1px solid #ccc;
    text-align: left;
}

.right-table th, .right-table td {
    text-align: center;
}

.avatar {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    margin-right: 5px;
}

.task-bar {
    background-color: #007bff;
    height: 20px;
    border-radius: 3px;
}
  .color-box {
            width: 20px;
            height: 20px;
            display: inline-block;
            margin-right: 5px;
            border: 1px solid #ccc;
            cursor: pointer;
        }

        .pR0 {
            padding-right: 0% !important;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1050;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 0 auto;
            /* padding: 20px; */
            border: 1px solid #888;
            max-width: 100vw;
            /* Set max-width to 100% of the viewport width */
        }

        .modal-header .close {
            margin: -1rem -1rem -1rem auto;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-group label i {
            margin-right: 5px;
        }

        @media (min-width: 576px) {
            .modal-dialog {
                max-width: 1000px;
                margin: 1.75rem auto;
            }
        }

</style>
</head>
<body>
    <div class="main">
        <div class="tabs">
            <button class="tab-button" onclick="showView('resource')">Resource view</button>
            <button class="tab-button" onclick="showView('task')">Task view</button>
        </div>
        <div id="resource-view" class="view">
            <div class="table-container">
                <div class="left-table">
                    <table id="tasks-table"> 
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Start date</th>
                                <th>Assigned</th>
                                <th><i class="fas text-black fa-plus mr-2" id="addtask" onclick="openAddTaskModal()"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Rows will be populated by JavaScript -->
                        </tbody>
                    </table>
                </div>
                <div class="right-table">
                    <table id="date-table">
                        <thead>
                            <tr>
                                <!-- Fill in the dates as needed -->
                                <th>10</th>
                                <th>11</th>
                                <th>12</th>
								<th>13</th>
                                <th>14</th>
                                <th>15</th>
                                <th>16</th>
                                <th>17</th>
                                <th>18</th>
                                <th>19</th>
                                <th>20</th>
                                <th>21</th>
                                <th>22</th>
                                <th>23</th>                            </tr>
                        </thead>
                        <tbody id="date-table-body">
                            <!-- Rows will be populated by JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="task-view" class="view" style="display:none;">
            <p>Task view content</p>
        </div>
    </div>

    <!-- Add Task Modal -->
    <div class="modal" id="assignModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Task</h5>
                    <button type="button" class="close" data-dismiss="modal" id="dismissAssignModalIcon" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="taskForm" method="post" action="submit_task.php">
                        <input type="hidden" name="addChecklist" value="true">
                        <div class="form-group">
                            <label for="eventTitle"><i class="fas fa-calendar-alt"></i> Task Title</label>
                            <input type="text" class="form-control" id="taskTitle" name="taskTitle" placeholder="Event title" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="startDate"><i class="fas fa-calendar-alt"></i> Start Date</label>
                                <input type="date" class="form-control" id="startDate" name="startDate" value="2024-05-20">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="endDate"><i class="fas fa-calendar-alt"></i> End Date</label>
                                <input type="date" class="form-control" id="endDate" name="endDate" value="2024-05-20">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="AssignOption"><i class="fas fa-sync"></i> Assign</label>
                            <select class="form-control" id="AssignOption" name="AssignOption"></select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="dismissAssignModal" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Task Modal -->
    <div class="modal" id="editModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Task</h5>
                    <button type="button" class="close" data-dismiss="modal" id="dismissEditModalIcon" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editTaskForm" method="post" action="update_task.php">
                        <input type="hidden" id="editTaskId" name="taskId">
                        <div class="form-group">
                            <label for="editTaskTitle"><i class="fas fa-calendar-alt"></i> Task Title</label>
                            <input type="text" class="form-control" id="editTaskTitle" name="taskTitle" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="editStartDate"><i class="fas fa-calendar-alt"></i> Start Date</label>
                                <input type="date" class="form-control" id="editStartDate" name="startDate">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="editEndDate"><i class="fas fa-calendar-alt"></i> End Date</label>
                                <input type="date" class="form-control" id="editEndDate" name="endDate">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="editAssignOption"><i class="fas fa-sync"></i> Assign</label>
                            <select class="form-control" id="editAssignOption" name="AssignOption"></select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="dismissEditModal" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/your-font-awesome-kit.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        function showView(view) {
            var resourceView = document.getElementById('resource-view');
            var taskView = document.getElementById('task-view');
            
            if (view === 'resource') {
                resourceView.style.display = 'block';
                taskView.style.display = 'none';
            } else if (view === 'task') {
                resourceView.style.display = 'none';
                taskView.style.display = 'block';
            }
        }
        
        // When the user clicks the icon, open the modal
        function openAddTaskModal() {
            $("#assignModal").show();
        }

        // Function to open the edit modal
        function openEditTaskModal(taskId) {
            // Fetch task details using AJAX
            $.ajax({
                url: 'fetch_task_details.php', // This PHP script should return the task details
                method: 'GET',
                data: { taskId: taskId },
                dataType: 'json',
                success: function(task) {
                    // Populate the modal fields with task details
                    $('#editTaskId').val(task.id);
                    $('#editTaskTitle').val(task.task_name);
                    $('#editStartDate').val(task.start_date);
                    $('#editEndDate').val(task.end_date);
                    $('#editAssignOption').val(task.assigned); // Assuming this is the correct field
                    // Show the edit modal
                    $("#editModal").show();
                }
            });
        }

        $(document).ready(function() {
            // Populate the select tag with assignees for both add and edit modals
            $.ajax({
                url: 'fetch_assignees.php',
                method: 'GET',
                success: function(data) {
                    $('#AssignOption').html(data);
                    $('#editAssignOption').html(data);
                }
            });
            
            // Fetch and display tasks in the left table
                // Fetch and display tasks in the left table
            $.ajax({
                url: 'fetch_tasks.php',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    var tasksTableBody = $('#tasks-table tbody');
                    var dateTableBody = $('#date-table-body');
                    tasksTableBody.empty(); // Clear the table
                    dateTableBody.empty(); // Clear the date table

                    $.each(data, function(index, task) {
                        var taskRow = '<tr>'+
                            '<td>' + task.task_name + '</td>'+
                            '<td>' + task.start_date + '</td>'+
                            '<td><img src="' + task.image + '" class="avatar">' + task.name + '</td>'+
                            '<td><i class="fas fa-edit" onclick="openEditTaskModal(' + task.id + ')"></i></td>'+
                        '</tr>';
                        tasksTableBody.append(taskRow);

                        var startDate = new Date(task.start_date);
                        var endDate = new Date(task.end_date);
                        var dateRow = '<tr>';

                        for (var d = new Date("2024-05-10"); d <= new Date("2024-05-23"); d.setDate(d.getDate() + 1)) {
                            var dateCell = '<td></td>';
                            if (d >= startDate && d <= endDate) {
                                var color = index % 3 === 0 ? 'red' : index % 3 === 1 ? 'green' : 'yellow';
                                dateCell = '<td class="task-bar" style="background-color: ' + color + '"><span class="task-name">' + task.task_name + '</span></td>';
                            }
                            dateRow += dateCell;
                        }

                        dateRow += '</tr>';
                        dateTableBody.append(dateRow);
                    });
                }
            });
        });

        // Function to close modals
        $(document).on('click', '#dismissAssignModal, #dismissAssignModalIcon', function() {
            $("#assignModal").hide();
        });

        $(document).on('click', '#dismissEditModal, #dismissEditModalIcon', function() {
            $("#editModal").hide();
        });
    </script>
</body>
</html>
