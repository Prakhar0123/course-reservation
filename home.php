<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="ahome.css">
</head>

<body>
    <div class="top-bar">
        <div class="left">
            <h2>1,2,3 Learn!</h2>
        </div>
        <div class="find">
            <form id="search">
                <input type="text" id="searchQuery" placeholder="Search courses..." required>
                <button type="button" class="btn btn-primary" onclick="search()">Search</button>
            </form>
        </div>
        <a href="https://mail.google.com/mail/u/0/#inbox" class="button" target="_blank">
            <div class="right">
                <i class="fa fa-envelope"></i>
            </div>
        </a>
    </div>

    <div class="courses-table" style="margin:10vh 0 0 5vw; width:90vw">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Course Name</th>
                    <th>Details</th>
                    <th>Reserve</th>
                </tr>
            </thead>
            <tbody id="courseList">
                <?php
                session_start();
                $host = 'localhost';
                $db = 'book';
                $user = 'root';
                $pass = '';
                $conn = new mysqli($host, $user, $pass, $db);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $query = "SELECT crs, des FROM course";
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td class="course-name">' . htmlspecialchars($row['crs']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['des']) . '</td>';
                        echo '<td><button class="btn btn-primary" onclick="reserve(\'' . addslashes($row['crs']) . '\')">Enroll</button></td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="3">No courses available</td></tr>';
                }
                $conn->close();
                ?>
            </tbody>
        </table>
        <p id="noResultsMessage" style="display: none;  text-align: center;">No such course available</p>
    </div>

    <script>
        function reserve(courseName) {
            const email = '<?php echo isset($_SESSION['user_email']) ? $_SESSION['user_email'] : ''; ?>';
            if (email) {
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "enroll.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        alert(xhr.responseText); // Displays server response
                    }
                };
                xhr.send("mail=" + encodeURIComponent(email) + "&course=" + encodeURIComponent(courseName));
            } else {
                alert("You need to log in first.");
            }
        }

        function search() {
            var input = document.getElementById("searchQuery").value.toLowerCase();
            var table = document.getElementById("courseList");
            var rows = table.getElementsByTagName("tr");
            var noResults = true;

            for (var i = 0; i < rows.length; i++) {
                var courseNameCell = rows[i].getElementsByClassName("course-name")[0];
                if (courseNameCell) {
                    var courseName = courseNameCell.textContent || courseNameCell.innerText;
                    if (courseName.toLowerCase().indexOf(input) > -1) {
                        rows[i].style.display = ""; // Show row
                        noResults = false;
                    } else {
                        rows[i].style.display = "none"; // Hide row
                    }
                }
            }
            document.getElementById("noResultsMessage").style.display = noResults ? "block" : "none";
        }
    </script>
</body>
</html>
