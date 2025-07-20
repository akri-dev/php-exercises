<?php
session_start();

if (!isset($_SESSION['stack'])) {
    $_SESSION['stack'] = [];
}

// Variables to hold messages for user feedback
$message = '';
$messageType = '';

// --- Handle Push Operation ---
// Check if the form was submitted with the 'push' action
if (isset($_POST['btn_new']) && $_POST['btn_new'] === 'push') {
    $value = filter_input(INPUT_POST, 'inputValue', FILTER_VALIDATE_INT);
    if ($value === false || $value === null) {
        $message = 'Please enter a valid integer to push.';
        $messageType = 'error';
    } else {
        $_SESSION['stack'][] = $value;

        $message = "Pushed {$value} onto the stack.";
        $messageType = 'success';
    }
}

// --- Handle Pop Operation ---
// Check if the form was submitted with the 'pop' action
if (isset($_POST['btn_pop']) && $_POST['btn_pop'] === 'pop') {
    // Determine stack size and check if empty without using count() or empty()
    $stackSize = 0;
    foreach ($_SESSION['stack'] as $item) {
        $stackSize++;
    }

    if ($stackSize === 0) {
        $message = 'Stack is empty. Cannot pop.';
        $messageType = 'warning';
    } else {
        $poppedValue = null;
        $newStack = [];
        $newStackIndex = 0;

        // Iterate through the current stack to find the last element
        // and build a new array without the last element.
        $currentIndex = 0;
        foreach ($_SESSION['stack'] as $item) {
            if ($currentIndex === $stackSize - 1) { // This is the last element
                $poppedValue = $item;
            } else {
                $newStack[$newStackIndex++] = $item; // Copy to new stack
            }
            $currentIndex++;
        }

        $_SESSION['stack'] = $newStack; // Replace the old stack with the new one

        $message = "Popped {$poppedValue} from the stack.";
        $messageType = 'success';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Part 2 - Exercise 3</title>
    <!-- CSS Link -->
    <link rel="stylesheet" href="assets/styles/style.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <main class="container">
        <h1 class="text-center">3. Create a stack of integers using arrays( First in last out )</h1>
        <div class="exercise-section part-two mt-4">
            <!-- Message Display Area: Only show if there's a message -->
            <?php if (!empty($message)): ?>
                <div id="messageBox" class="message-box <?php echo htmlspecialchars($messageType); ?>">
                    <?php echo htmlspecialchars($message); // Display the message, safely escaped 
                    ?>
                </div>
            <?php endif; ?>
            <!-- Input Field for Stack -->
            <form method="post">
                <input type="number" name="inputValue" class="form-control form-control-lg" placeholder="Enter Integer">
                <div class="form-group mt-2 d-flex justify-content-evenly">
                    <button type='submit' name="btn_new" value="push" class="btn btn-warning m-1">Insert New Value</button>
                    <button type='submit' name="btn_pop" value="pop" class="btn btn-danger m-1">Remove Top Value</button>
                </div>
            </form>

            <!-- Stack Display Area -->
            <h2 class="text-xl font-semibold text-gray-700 mb-3 mt-3 text-center">Current Stack:</h2>
            <div id="stackDisplay" class="stack-container">
                <?php
                // Manually determine stack size for display logic
                $currentStackSize = 0;
                foreach ($_SESSION['stack'] as $item) {
                    $currentStackSize++;
                }

                // Check if the stack is empty and display a message accordingly
                if ($currentStackSize === 0): ?>
                    <p id="emptyStackMessage" class="text-gray-500 text-center w-full">Stack is empty.</p>
                    <?php else:
                    // Iterate through the stack and create HTML div elements for each item.
                    foreach ($_SESSION['stack'] as $item):
                    ?>
                        <div class="stack-item">
                            <?php echo htmlspecialchars($item); // Display stack item, safely escaped
                            ?>
                        </div>
                <?php endforeach;
                endif; ?>
            </div>
        </div>
        <a href="index.php" type="button" class="btn btn-success mt-4" role="home button"><i class="fa-solid fa-house"></i> Table of Contents</a>
    </main>
</body>

</html>