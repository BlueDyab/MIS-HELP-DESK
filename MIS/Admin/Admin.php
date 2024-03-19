<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Sidebar in Header</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Custom CSS for sidebar */
        .sidebar {
            background-color: #333;
            color: white;
            transition: 0.3s;
        }

        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 20px;
            color: white;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: #555;
        }

        @media screen and (max-width: 768px) {
            .sidebar {
                position: fixed;
                z-index: 1000;
                width: 250px;
                height: 100%;
                top: 0;
                left: -250px;
                overflow-y: auto;
            }

            .sidebar.show {
                left: 0;
            }

            .content {
                margin-left: 250px;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarNav" aria-controls="sidebarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">Your Logo</a>
            <div class="collapse navbar-collapse" id="sidebarNav">
                <div class="sidebar">
                    <h2>My Sidebar</h2>
                    <a href="#"><i class="bi bi-house-door"></i> Home</a>
                    <a href="#"><i class="bi bi-person"></i> Profile</a>
                    <a href="#"><i class="bi bi-gear"></i> Settings</a>
                    <a href="#"><i class="bi bi-envelope"></i> Contact</a>
                    <a href="#" class="btn btn-danger mt-3"><i class="bi bi-box-arrow-right"></i> Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page content -->
    <div class="content">
        <h2>Page Content</h2>
        <p>This is the main content of the page.</p>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
