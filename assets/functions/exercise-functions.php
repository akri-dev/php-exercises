<?php
// Create nth amount of Stacked Hollow Diamond Pattern using two parameters

// Loop Blank Space
function blankSpaceLoop($numBlankSpace)
{
    $blankSpace = '';
    for ($counter = 1; $counter <= $numBlankSpace; $counter++) {
        $blankSpace .= '&nbsp';
    }
    return $blankSpace;
}

// ********************** PART ONE EXERCISE ONE **********************
function exerciseOne($numRows, $diamondCount)
{
    // Initialize Array
    $diamond = [];
    $blankSpace = blankSpaceLoop(15);

    // Passed $diamond by reference and activates the loop
    function activate($numRows, $blankSpace, $diamondCount, &$diamond)
    {

        // Upper Half Template Function
        function upperHalf($partNumber, $numRows, $blankSpace, &$diamond)
        {
            for ($row = $partNumber; $row <= $numRows; $row++) {
                $pattern = '';
                for ($space = 1; $space <= $numRows - $row; $space++) {
                    $pattern .= $blankSpace;
                }
                for ($star = 1; $star <= 2 * $row - 1; $star++) {
                    if ($star === 1 and $row === 1) {
                        $pattern .= '&nbsp;*' . $blankSpace;
                    } elseif ($star === 1) {
                        $pattern .= '*' . $blankSpace;
                    } elseif ($star === 2 * $row - 1) {
                        $pattern .= '*';
                    } else {
                        $pattern .= $blankSpace;
                    }
                }
                $diamond[] = $pattern;
            }
        }

        // Bottom Half Template Function
        function lowerHalf($numRows, $blankSpace, &$diamond)
        {
            for ($row = $numRows - 1; $row >= 1; $row--) {
                $pattern = '';
                for ($space = 1; $space <= $numRows - $row; $space++) {
                    $pattern .= $blankSpace;
                }
                for ($star = 1; $star <= 2 * $row - 1; $star++) {
                    if ($star === 1 and $row === 1) {
                        $pattern .= '&nbsp;*' . $blankSpace;
                    } elseif ($star === 1) {
                        $pattern .= '*' . $blankSpace;
                    } elseif ($star === 2 * $row - 1) {
                        $pattern .= '*';
                    } else {
                        $pattern .= $blankSpace;
                    }
                }
                $diamond[] = $pattern;
            }
        }
        upperHalf(1, $numRows, $blankSpace, $diamond);
        if ($diamondCount >= 2) {
            lowerHalf($numRows, $blankSpace, $diamond);
            for ($counter = 2; $counter <= $diamondCount; $counter++) {
                upperHalf(2, $numRows, $blankSpace, $diamond);
                lowerHalf($numRows, $blankSpace, $diamond);
            }
        } else {
            lowerHalf($numRows, $blankSpace, $diamond);
        }
    }
    activate($numRows, $blankSpace, $diamondCount, $diamond);
    return implode("<br>", $diamond);
}

// ********************** PART ONE EXERCISE TWO **********************
function exerciseTwo()
{
    $blankSpace = blankSpaceLoop(12);
    // Define the size of the pattern.
    $size = 11;

    // Calculate the middle row/column index.
    $middle = floor($size / 2);

    // Outer loop for rows
    for ($row = 0; $row < $size; $row++) {
        // Inner loop for columns
        for ($col = 0; $col < $size; $col++) {
            if ($row == $col || $row + $col == $size - 1) {
                if ($row == $middle && $col == $middle) {
                    echo "1";
                } else if ($row % 2 != 0) {
                    if ($row == 1 || $row == $size - 2) {
                        echo "5";
                    } else if ($row == 3 || $row == $size - 4) {
                        echo "3";
                    } else {
                        echo "*";
                    }
                } else {
                    echo "*";
                }
            } else {
                echo $blankSpace;
            }
        }
        echo "<br>";
    }
}

// ********************** PART ONE EXERCISE THREE **********************
function exerciseThree()
{
    echo "<table>";
    for ($row = 1; $row <= 5; $row++) {
        echo "<tr>";
        for ($col = 1; $col <= $row; $col++) {
            echo "<td>" . $row * $col . "</td>";
        }
        echo "</tr>";
    }
    for ($row = 4; $row >= 1; $row--) {
        echo "<tr>";
        for ($col = 1; $col <= $row; $col++) {
            echo "<td>" . $row * $col . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

// ********************** PART ONE EXERCISE FOUR **********************
function exerciseFour()
{

    echo "<table>";
    for ($row = 1; $row <= 6; $row++) {
        echo "<tr>";
        // All first column values
        echo "<td>" . $row . "</td>";
        $currentValue = $row;
        // Second column to Fifth column
        for ($col = 1; $col <= 4; $col++) {
            echo "<td>" . ($currentValue *= ($row + 1)) . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

// ********************** PART TWO EXERCISE ONE **********************
function exerciseFive()
{
    // Function to randomize and highlight even number
    function randomizeCharacter()
    {
        $semiAlphabet = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j'];
        $arrayKey = array_rand($semiAlphabet, 1);
        if (($arrayKey % 2) == 0) {
            return "<td class='text-uppercase' style='background-color: #b6d7a8;'>" . $semiAlphabet[$arrayKey] . "</td>";
        } else {
            return "<td>" . $semiAlphabet[$arrayKey] . "</td>";
        }
    }

    // Table 
    echo "<table>";
    for ($row = 1; $row <= 4; $row++) {
        echo "<tr>";
        for ($col = 1; $col  <= 5; $col++) {
            echo randomizeCharacter();
        }
        echo "</tr>";
    }
    echo "</table>";
}

// ********************** PART TWO EXERCISE TWO **********************
function exerciseSix()
{
    $columnSum = [0, 0, 0, 0];

    $numbers = range(1, 100);
    shuffle($numbers);
    $randomNumbers = array_slice($numbers, 0, 16);

    // Checking of random numbers in Array
    // print_r(array_values($randomNumbers));

    // Table 
    echo "<table>";
    for ($row = 1; $row <= 4; $row++) {
        $rowSum = 0;
        echo "<tr>";
        for ($col = 1; $col  <= 4; $col++) {
            // Checking of removal of random numbers in Array once used per loop
            // print_r(array_values($randomNumbers));
            // echo "<br>";
            $randomArrayKey = array_rand($randomNumbers);
            echo "<td>" . $randomNumbers[$randomArrayKey] .
                "</td>";
            // add rows
            $rowSum += $randomNumbers[$randomArrayKey];
            // add columns
            $columnSum[$col - 1] = $columnSum[$col - 1] + $randomNumbers[$randomArrayKey];
            unset($randomNumbers[$randomArrayKey]);
        }
        // Output Sum of Each Row
        echo "<td class='border-0 fw-bolder'>" . $rowSum . "</td>";
        echo "</tr>";
    }
    // Output Sum of Each Column
    echo "<tr>";
    for ($row = 1; $row <= 4; $row++) {
        echo "<td class='border-0 fw-bolder'>" . $columnSum[$row - 1] . "</td>";
    }
    echo "</tr>";
    echo "</table>";
    // Checking of Sum of Column numbers in Array
    // print_r(array_values($columnSum));
}
