<?php
include 'assets/functions/exercise-functions.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Part 2 - Exercise 5</title>
    <!-- CSS Link -->
    <link rel="stylesheet" href="assets/styles/style.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <main class="container">
        <h1 class="text-center">5. Using a PHP POST method, ask the user to input 2 numbers</h1>
        <div class="exercise-section part-two mt-4">
            <form method="post">
                <div class="form-group d-flex align-items-center justify-content-evenly flex-column">
                    <input type="number" name="lengthValue" class="form-control form-control-lg" placeholder="Enter Length">
                    <input type="number" name="widthValue" class="form-control mt-2 form-control-lg" placeholder="Enter Width">
                    <button type='submit' name="btn_generate" value="enqueue" class="btn btn-info ps-3 pe-3 mt-2">Generate Grid</button>
                </div>
            </form>
            <?php
            if (isset($_POST['btn_generate'])) {
                $length = $_POST['lengthValue'];
                $width = $_POST['widthValue'];

                exerciseSeven($length, $width);
            }
            ?>
        </div>
        <a href="index.php" type="button" class="btn btn-success mt-4" role="home button"><i class="fa-solid fa-house"></i> Table of Contents</a>
    </main>
</body>

</html>