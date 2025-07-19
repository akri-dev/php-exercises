<?php
// Print Hollow Diamond Pattern in PHP
function printHollowDiamond($numRows) {
    $diamond = [];
    for ($row = 1; $row <= $numRows; $row++) {
        $pattern = '';
        for ($space = 1; $space <= $numRows - $row; $space++) {
            $pattern .= '&nbsp;';
        }
        for ($star = 1; $star <= 2 * $row - 1; $star++) {
            if ($star === 1 || $star === 2 * $row - 1) {
                $pattern .= '*';
            } else {
                $pattern .= '&nbsp;';
            }
        }
        $diamond[] = $pattern;
    }

    for ($row = $numRows - 1; $row >= 1; $row--) {
        $pattern = '';
        for ($space = 1; $space <= $numRows - $row; $space++) {
            $pattern .= '&nbsp;';
        }
        for ($star = 1; $star <= 2 * $row - 1; $star++) {
            if ($star === 1 || $star === 2 * $row - 1) {
                $pattern .= '*';
            } else {
                $pattern .= '&nbsp;';
            }
        }
        $diamond[] = $pattern;
    }

    return implode("<br>", $diamond);
}

echo printHollowDiamond(5);
?>