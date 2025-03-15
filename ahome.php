<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="ahome.css">
</head>

<body>
    <div class="top-bar">
        <div class="left">
            <h2><i class="fa fa-book" aria-hidden="true"></i>1,2,3 Learn!</h2>
        </div>
        <a href="https://mail.google.com/mail/u/0/#inbox" class="button" target="_blank">
    <div class="right">
        <i class="fa fa-envelope"></i>
    </div>
</a>

    </div>
    <div class="sidebar">
        <ul>
            <li><a href="#courses"><i class="fa fa-table"></i> Courseboard</a></li>
            <li><a href="#reg"><i class="fa fa-check"></i> Enrollments</a></li>
            <li><a href="#users"><i class="fa fa-users"></i> Users</a></li>
        </ul>
    </div>
    <div class="main-content">
        <section id="courses" class="section">
            <div class="container-fluid mt-5">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card shadow-lg rounded">
                            <div class="card-header text-center bg-primary text-white">
                                <h1>Add Course</h1>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="add.php">
                                    <div class="form-group">
                                        <label for="courseName" class="font-weight-bold">Course Name</label>
                                        <input type="text" class="form-control" id="courseName" name="crs"
                                            placeholder="Enter course name" required>
                                    </div>
                                    <div class="form-group textareaa">
    <label for="courseDetails" class="font-weight-bold">Details</label>
    <textarea style="height: 8vh;
    width: 14vw;
    resize: none;" class="form-control" id="courseDetails" name="des" placeholder="Enter course details" required></textarea>
</div>
                                    <div class="form-group text-center">
                                        <button type="submit" name="addCourse" class="btn btn-primary">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="find">
    <form id="del">
        <input type="text" id="deleteQuery" placeholder="Course Name" required>
        <button type="button" class="btn btn-primary" onclick="remove()">Delete</button>
    </form>
    <form id="search">
        <input type="text" id="searchQuery" placeholder="Search courses..." required>
        <button type="button" class="btn btn-primary" onclick="search()">Search</button>
    </form>
    
</div>
<section id="list" class="sec">
    <div class="course-table">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Course Name</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                <?php
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
                        echo '<td>' . $row['crs'] . '</td>';
                        echo '<td>' . $row['des'] . '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="2">No courses available</td></tr>';
                }
                $conn->close();
                ?>
            </tbody>
        </table>
        <p id="noResultsMessage" style="display: none; color: red; text-align: center;">No such course available</p>
</div>
</section>


 </section> 
<section id="reg" class="section">
    <div class="table-container">
        <table class="user-table">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Course</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $host = 'localhost';
                $db = 'book';
                $user = 'root';
                $pass = '';
                $conn = new mysqli($host, $user, $pass, $db);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $query = "SELECT mail, crs FROM booking";
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($row['mail']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['crs']) . '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="2">No bookings available</td></tr>';
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</section>
        <section id="users" class="section">
    <div class="table-container">
        <table class="user-table">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Password</th>
                    <th>Registration Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $host = 'localhost';
                $db = 'book';
                $user = 'root';
                $pass = '';
                $conn = new mysqli($host, $user, $pass, $db);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $query = "SELECT mail, no, pw, dt FROM user";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '
                        <tr>
                            <td>' . $row['mail'] . '</td>
                            <td>' . $row['no'] . '</td>
                            <td>' . $row['pw'] . '</td>
                            <td>' . $row['dt'] . '</td>
                        </tr>';
                    }
                } else {
                    echo '<tr><td colspan="4">No users found.</td></tr>';
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</section>
    <script>
    document.querySelectorAll('.sidebar ul li a').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const targetSection = document.querySelector(this.getAttribute('href'));
            targetSection.scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    function search() {
    const query = document.getElementById('searchQuery').value.toLowerCase();
    const rows = document.querySelectorAll('.course-table tbody tr');

    let courseFound = false;
    rows.forEach(row => {
        const courseName = row.querySelector('td:first-child').textContent.toLowerCase();
        row.style.backgroundColor = '';
        if (courseName.includes(query) && query !== '') {
            row.style.backgroundColor = 'rgb(255, 3, 62)';
            row.scrollIntoView({ behavior: 'smooth', block: 'center' });
            courseFound = true;
        }
    });
    if (!courseFound) {
        document.getElementById('noResultsMessage').style.display = 'block';
    } else {
        document.getElementById('noResultsMessage').style.display = 'none';
    }
}

function remove() {
    const courseName = document.getElementById('deleteQuery').value;
    if (courseName === "") {
        alert("Please enter a course name.");
        return;
    }
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "del.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            alert(xhr.responseText);
            location.reload();
        }
    };
    xhr.send("deleteQuery=" + courseName);
}

    </script>
</body>

</html>
