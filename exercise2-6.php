<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Part 2 - Exercise 6</title>
    <!-- CSS Link -->
    <link rel="stylesheet" href="assets/styles/style.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <main class="container">
        <h1 class="text-center">6. Fix the code function to output the correct result. Explain your answer</h1>
        <div class="exercise-section part-two mt-4">
            <?php
            $listArray = [22, 24, 1, 8, 39, 33, 94];

            function bubbleSort($lists)
            {
                $length = count($lists);
                for ($parent = 0; $parent < $length; $parent++) {
                    for ($child = 0; $child < $length - $parent - 1; $child++) {
                        if ($lists[$child] > $lists[$child + 1]) {
                            // Next array value stored to the temporary variable to move it safely
                            $temp = $lists[$child + 1];
                            // The variable being assigned(left-hand side) should be in the right-hand side, and vice verse

                            // $lists[$child] = $lists[$child + 1]; //ancestor code

                            // $lists[$child + 1] should be the variable to be assigned to
                            // The if statement asks if $lists[$child] is the greater value
                            // For ascending order to the right, this statement would be used to check the current array value if it's the largest
                            // Therefore, moving the current array value to the next array key
                            $lists[$child + 1] = $lists[$child]; // modified code

                            // $lists[$child + 1] = $temp; //ancestor code

                            // the temporary variable will be moved to the left, therefore, the current array key
                            $lists[$child] = $temp;
                        }
                    }
                }
                return $lists; // function does not have return statement
            }
            echo "<div class='text-center display-6 mt-4'>";
            print_r(bubbleSort($listArray));
            echo "</div>";
            ?>

            <div class="statement mt-5">
                <h2>Explanation</h2>
                <ul>
                    <li>
                        <p>Bubble sort places the largest element first at its correct position and then proceeds to the next largest element and does the loop again</p>
                    </li>
                    <li>
                        <p>The variable <span class="text-danger">(code: $lists[$child] = $lists[$child + 1];)</span> being assigned(left-hand side) should be in the right-hand side, and vice verse</p>
                    </li>
                    <li>
                        <p><span class="text-danger">$lists[$child + 1]</span> should be the variable to be assigned to</p>
                    </li>
                    <li>
                        <p>The if statement asks if <span class="text-danger">$lists[$child]</span> is the greater value</p>
                    </li>
                    <li>
                        <p>For ascending order to the right, this if statement would be used to check the current array value if it's the largest</p>
                    </li>
                    <li>
                        <p>This if statement would allow moving the current array value to the next array key</p>
                    </li>
                    <li>
                        <p>The temporary variable will be moved to the left which will be stored in the current array key</p>
                    </li>
                    <li>
                        <p>Function does not have return statement</p>
                    </li>
                </ul>
            </div>
        </div>
        <a href="index.php" type="button" class="btn btn-success mt-4" role="home button"><i class="fa-solid fa-house"></i> Table of Contents</a>
    </main>
</body>

</html>