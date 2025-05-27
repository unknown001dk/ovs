<?php
include('session.php');
include('header.php');
include('dbcon.php');
?>
</head>
<body>
<?php include('nav_top.php'); ?>
<div class="wrapper">
    <div class="home_body">
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <ul class="nav nav-pills">
                        <li><a href="home.php"><i class="icon-home icon-large"></i> Home</a></li>
                        <li class="active"><a href="candidate_list.php"><i class="icon-align-justify icon-large"></i> Candidates List</a></li>
                        <li><a href="voter_list.php"><i class="icon-align-justify icon-large"></i> Voters List</a></li>
                        <li><a href="canvassing_report.php"><i class="icon-book icon-large"></i> Canvassing Report</a></li>
                        <li><a href="History.php"><i class="icon-table icon-large"></i> History Log</a></li>
                        <li><a data-toggle="modal" href="#about"><i class="icon-exclamation-sign icon-large"></i> About</a></li>
                    </ul>
                    <form class="navbar-form pull-right">
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM users WHERE User_id='$id_session'");
                        $row = mysqli_fetch_array($result);
                        ?>
                        <font color="white">Welcome: <i class="icon-user-md"></i> <?php echo $row['User_Type']; ?></font>
                        <a class="btn btn-danger" data-toggle="modal" href="#logoutModal"><i class="icon-off"></i> Logout</a>
                    </form>
                </div>
            </div>
        </div>

        <!-- Logout Modal -->
        <div class="modal hide fade" id="logoutModal">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Confirm Logout</h3>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to logout?</p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn" data-dismiss="modal">No</a>
                <a href="logout.php" class="btn btn-primary">Yes</a>
            </div>
        </div>

        <!-- About Modal -->
        <div class="modal hide fade" id="about">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>About</h3>
            </div>
            <div class="modal-body">
                <?php include('about.php') ?>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn" data-dismiss="modal">Close</a>
            </div>
        </div>

        <!-- Countdown Overlay -->
        <div id="countdownOverlay" style="position: fixed; z-index: 9999; background: rgba(0,0,0,0.9); color: white; width: 100%; height: 100%; top: 0; left: 0; text-align: center; display: flex; flex-direction: column; justify-content: center; align-items: center;">
            <h1>Please wait before proceeding</h1>
            <div id="timer" style="font-size: 2rem;">02:00</div>
        </div>

        <div class="pagination">
            <ul>
                <li><a href="new_candidate.php"><i class="icon-plus icon-large"></i> Add Candidates</a></li>
            </ul>
        </div>

        <table class="users-table display" id="log">
            <thead>
                <tr>
                    <th class="hide">ID</th>
                    <th>Position</th>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>Year</th>
                    <th>Photo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $candidate_query = mysqli_query($conn, "SELECT * FROM candidate");
            while ($candidate_rows = mysqli_fetch_array($candidate_query)) {
                $id = $candidate_rows['CandidateID'];
            ?>
                <tr class="del<?php echo $id; ?>">
                    <td class="hide"><?php echo $id; ?></td>
                    <td><?php echo $candidate_rows['Position']; ?></td>
                    <td><?php echo $candidate_rows['FirstName']; ?></td>
                    <td><?php echo $candidate_rows['LastName']; ?></td>
                    <td><?php echo $candidate_rows['Year']; ?></td>
                    <td><img src="<?php echo $candidate_rows['Photo']; ?>" width="40" height="30"></td>
                    <td>
                        <a class="btn btn-success" href="edit_candidate.php?id=<?php echo $id; ?>"><i class="icon-edit icon-large"></i> Edit</a>
                        <a class="btn btn-info" data-toggle="modal" href="#view<?php echo $id; ?>"><i class="icon-list icon-large"></i> View</a>
                        <a class="btn btn-danger1" id="<?php echo $id; ?>"><i class="icon-trash icon-large"></i> Delete</a>
                    </td>
                </tr>

                <!-- View Modal -->
                <div class="modal hide fade" id="view<?php echo $id; ?>">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h3>Candidate Information</h3>
                    </div>
                    <div class="modal-body">
                        <img src="<?php echo $candidate_rows['Photo']; ?>" width="200" height="200">
                        <p>FirstName: <?php echo $candidate_rows['FirstName']; ?></p>
                        <p>LastName: <?php echo $candidate_rows['LastName']; ?></p>
                        <p>MiddleName: <?php echo $candidate_rows['MiddleName']; ?></p>
                        <p>Gender: <?php echo $candidate_rows['Gender']; ?></p>
                        <p>Position: <?php echo $candidate_rows['Position']; ?></p>
                        <p>Party: <?php echo $candidate_rows['Party']; ?></p>
                        <p>Year: <?php echo $candidate_rows['Year']; ?></p>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn" data-dismiss="modal">Close</a>
                    </div>
                </div>

                <input type="hidden" class="data_name<?php echo $id; ?>" value="<?php echo $candidate_rows['FirstName'] . ' ' . $candidate_rows['LastName']; ?>">
                <input type="hidden" class="user_name" value="<?php echo $_SESSION['User_Type']; ?>">
            <?php } ?>
            </tbody>
        </table>

        <?php include('footer.php'); ?>
        <input type="hidden" class="pc_date" name="pc_date">
        <input type="hidden" class="pc_time" name="pc_time">
    </div>
</div>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    const myDate = new Date();
    const pc_date = (myDate.getMonth() + 1) + '/' + myDate.getDate() + '/' + myDate.getFullYear();
    const pc_time = myDate.getHours() + ':' + myDate.getMinutes() + ':' + myDate.getSeconds();

    $(".pc_date").val(pc_date);
    $(".pc_time").val(pc_time);

    $('.btn-danger1').click(function () {
        const id = $(this).attr("id");
        const pc_date = $('.pc_date').val();
        const pc_time = $('.pc_time').val();
        const data_name = $('.data_name' + id).val();
        const user_name = $('.user_name').val();

        if (confirm("Are you sure you want to delete this Candidate?")) {
            $.ajax({
                type: "POST",
                url: "delete_candidate.php",
                data: { id, pc_time, pc_date, data_name, user_name },
                cache: false,
                success: function (html) {
                    $(".del" + id).fadeOut('slow');
                }
            });
        }
    });

    // Countdown
    let countdownTime = 120;
    const countdownOverlay = document.getElementById("countdownOverlay");
    const timerElement = document.getElementById("timer");

    const countdownInterval = setInterval(() => {
        let minutes = Math.floor(countdownTime / 60);
        let seconds = countdownTime % 60;

        timerElement.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;

        if (countdownTime <= 0) {
            clearInterval(countdownInterval);
            countdownOverlay.style.display = "none";
        }

        countdownTime--;
    }, 1000);
});
</script>
