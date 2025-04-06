<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career Status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .option-card {
            transition: transform 0.3s ease-in-out;
        }

        .option-card:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <div class="container text-center mt-5">
        <h2 class="fw-bold text-primary mb-4">What is Your Current Career Status?</h2>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card option-card shadow-lg border-0 rounded-4 p-4">
                    <img src="https://img.freepik.com/free-vector/job-search-concept-illustration_114360-1114.jpg"
                        alt="Looking for Job" class="card-img-top p-3 rounded-4" height="250">
                    <div class="card-body">
                        <h4 class="card-title fw-bold text-success">Looking for a Job</h4>
                        <p class="text-muted">Update your profile </p>
                        <a href="resume.php" class="btn btn-outline-success w-100 fw-bold">Update profile</a>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card option-card shadow-lg border-0 rounded-4 p-4">
                    <img src="https://img.freepik.com/free-vector/career-success-concept-illustration_114360-1652.jpg"
                        alt="Placed" class="card-img-top p-3 rounded-4" height="250">
                    <div class="card-body">
                        <h4 class="card-title fw-bold text-primary">Already Placed?</h4>
                        <p class="text-muted">Update your placement details.</p>
                        <a href="inst_update.php" class="btn btn-outline-primary w-100 fw-bold">Update placed
                            company</a>
                    </div>
                </div>
            </div>
        </div>
        <h3 class="text-center mt-4"><a href="home.php" class="text-decoration-none">Return to Home</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>