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

// ********************** EXERCISE ONE **********************
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
                    }
                    elseif ($star === 1) {
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
                    }
                    elseif ($star === 1) {
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

// ********************** EXERCISE TWO **********************
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
                }
                else if ($row % 2 != 0) {
                    if ($row == 1 || $row == $size - 2) { 
                        echo "5";
                    } else if ($row == 3 || $row == $size - 4) { 
                        echo "3";
                    } else {
                        echo "*";
                    }
                }
                else {
                    echo "*";
                }
            } else {
                echo $blankSpace;
            }
        }
        echo "<br>";
    }
}
