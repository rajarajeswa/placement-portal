<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Resume Analyzer</title>
    <style>
        #text-des {
            height: 150px;
            width: 600px;
        }

        .card {
            margin-top: 50px;
            width: 75%;
            margin: auto;
            margin-top: 25px;
        }
    </style>
</head>

<body>
    <div class="card mx-auto w-50 mt-3 p-3">
        <h3 class="card-title text-center">Resume Analyzer</h3>
        <p class="text-muted text-center">Enter a job description and upload your resume to get an AI-generated score.
        </p>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" class="text-center">
                <label>Job Description</label>
                <textarea name="job" class="form-control mt-3 mx-auto" id="text-des"></textarea>

                <label class="mt-3">Upload Resume</label>
                <input type="file" name="resume" class="form-control mx-auto mt-2">

                <input type="submit" value="Analyze" name="analyze" class="btn btn-dark w-50 mt-3">
            </form>

        </div>
        <a href="home.php" class="text-center">Return back</a>
    </div>

    <?php
    require 'vendor/autoload.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['resume'])) {
        if ($_FILES['resume']['error'] === 0) {
            // Save the uploaded file
            $uploadsDir = 'uploads/';
            if (!is_dir($uploadsDir)) {
                mkdir($uploadsDir, 0777, true);
            }
            //filepath
            $filepath = $uploadsDir . basename($_FILES['resume']['name']);
            //move uploaded file
            move_uploaded_file($_FILES['resume']['tmp_name'], $filepath);

            // Extract resume text and compare it
            $resumetext = extractResumeText($filepath);
            $matchpercentage = compareText($_POST['job'], $resumetext);

            // Display result
            echo "<p class='text-center mt-3'>Resume Match: <strong>" . round($matchpercentage, 2) . "%</strong></p>";
        } else {
            echo "<p class='text-center text-danger mt-3'>File upload failed.</p>";
        }
    }


    function extractResumeText($filepath)
    {
        $text = '';
        $extension = pathinfo($filepath, PATHINFO_EXTENSION);

        if ($extension == 'pdf') {
            $parser = new \Smalot\PdfParser\Parser();
            //parse file
            $pdf = $parser->parseFile($filepath);
            //get text from parsed file
            $text = $pdf->getText();
        } elseif ($extension == 'docx') {
            $phpWord = \PhpOffice\PhpWord\IOFactory::load($filepath);
            foreach ($phpWord->getSections() as $section) {
                foreach ($section->getElements() as $element) {
                    if (method_exists($element, 'getText')) {
                        $text .= $element->getText() . "\n";
                    }
                }
            }
        }
        return strtolower(trim($text));
    }

    function compareText($jobDesc, $resumeText)
    {
        similar_text(strtolower($jobDesc), $resumeText, $percent);
        return $percent;
    }
    ?>

</body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</html>