<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gym Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Full height layout */
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Sidebar styling */
        .sidebar {
            background-color: #f8f9fa;
            height: 100vh;
            padding-top: 20px;
            position: fixed;
            width: 250px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            text-decoration: none;
            font-size: 16px;
            color: #333;
            transition: background 0.3s;
        }

        .sidebar a:hover {
            background-color: #e9ecef;
        }

        .sidebar a .icon {
            margin-right: 10px;
        }

        /* Main content styling */
        .main-content {
            margin-left: 250px;
            padding: 20px;
            background-color: #f1f3f5;
            min-height: 100vh;
        }

        /* Navbar styling */
        .navbar-custom {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            padding: 15px;
        }
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin-top: 20px;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #f8f9fa;
            position: fixed;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" class="navbar-brand mx-3 mb-4">
            <strong>Gym Management System</strong>
        </a>
        <a href="#">
            <span class="icon">📊</span> Dashboard
        </a>
        <a href="#">
            <span class="icon">👤</span> Members
        </a>
        <a href="#">
            <span class="icon">📅</span> Classes
        </a>
        <a href="#">
            <span class="icon">💳</span> Payments
        </a>
        <div class="sidebar">
    <h4 class="p-3">Gym Management</h4>
    <nav class="nav flex-column">
        <a class="nav-link" href="/user/add" >Add Members</a>
        <a class="nav-link" href="#" onclick="showSection('membership')">Apply for Membership</a>
        <a class="nav-link" href="#" onclick="showSection('class-booking')">Book a Class</a>
        <a class="nav-link" href="#" onclick="showSection('member-management')">Member Management</a>
        <a class="nav-link" href="#" onclick="showSection('payment-processing')">Payment Processing</a>
    </nav>
</div>
        <a href="#">
            <span class="icon">⚙️</span> Settings
        </a>
        <a href="#" class="mt-auto">
            <span class="icon">↩️</span> Logout
        </a>
    </div>

    <!-- Main content -->
    <body>

<div class="main-content">
    <!-- Login & Authentication -->
    <div id="login" class="container section">
        <h2>Login</h2>
        <form>
            <div class="mb-3">
                <label for="loginEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="loginEmail" required>
            </div>
            <div class="mb-3">
                <label for="loginPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="loginPassword" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <a href="#" class="btn btn-link">Forgot Password?</a>
        </form>
    </div>

    <!-- Gym Membership Application -->
    <div id="membership" class="container section" style="display: none;">
        <h2>Apply for Gym Membership</h2>
        <form>
            <div class="mb-3">
                <label for="membershipName" class="form-label">Name</label>
                <input type="text" class="form-control" id="membershipName" required>
            </div>
            <div class="mb-3">
                <label for="membershipEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="membershipEmail" required>
            </div>
            <div class="mb-3">
                <label for="membershipType" class="form-label">Membership Type</label>
                <select class="form-select" id="membershipType">
                    <option value="Monthly">Monthly</option>
                    <option value="Yearly">Yearly</option>
                    <option value="Premium">Premium</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Apply</button>
        </form>
    </div>

    <!-- Class Booking -->
    <div id="class-booking" class="container section" style="display: none;">
        <h2>Class Booking</h2>
        <div class="mb-3">
            <label for="classSelect" class="form-label">Available Classes</label>
            <select class="form-select" id="classSelect">
                <option value="1">Yoga - 10:00 AM</option>
                <option value="2">Pilates - 12:00 PM</option>
                <option value="3">HIIT - 2:00 PM</option>
            </select>
        </div>
        <button class="btn btn-primary">Book Class</button>
    </div>

    <!-- Admin Interface - Member Management -->
    <div id="member-management" class="container section" style="display: none;">
        <h2>Member Management</h2>
        <button class="btn btn-primary mb-3" onclick="addMember()">Add Member</button>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Membership Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="memberList">
                <tr>
                    <td>John Doe</td>
                    <td>johndoe@example.com</td>
                    <td>Monthly</td>
                    <td>
                        <button class="btn btn-sm btn-warning">Edit</button>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Payment Processing -->
    <div id="payment-processing" class="container section" style="display: none;">
        <h2>Payment Processing</h2>
        <form>
            <div class="mb-3">
                <label for="paymentMember" class="form-label">Member Name</label>
                <input type="text" class="form-control" id="paymentMember" required>
            </div>
            <div class="mb-3">
                <label for="paymentAmount" class="form-label">Amount</label>
                <input type="number" class="form-control" id="paymentAmount" required>
            </div>
            <div class="mb-3">
                <label for="paymentReceipt" class="form-label">Upload Receipt</label>
                <input type="file" class="form-control" id="paymentReceipt" required>
            </div>
            <button type="submit" class="btn btn-success">Submit Payment</button>
        </form>
    </div>
</div>

<script>
    function showSection(sectionId) {
        $('.section').hide();
        $('#' + sectionId).show();
    }

    function addMember() {
        const name = prompt("Enter member name:");
        const email = prompt("Enter member email:");
        const type = prompt("Enter membership type:");
        
        if (name && email && type) {
            $('#memberList').append(`<tr>
                <td>${name}</td>
                <td>${email}</td>
                <td>${type}</td>
                <td>
                    <button class="btn btn-sm btn-warning">Edit</button>
                    <button class="btn btn-sm btn-danger">Delete</button>
                </td>
            </tr>`);
        }
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
