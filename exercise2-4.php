<?php
session_start();

if (!isset($_SESSION['queue'])) {
    $_SESSION['queue'] = [];
}

// Variables to hold messages for user feedback
$message = '';
$messageType = '';

// --- Handle Enqueue Operation ---
// Check if the form was submitted with the 'push' action
if (isset($_POST['btn_enqueue']) && $_POST['btn_enqueue'] === 'enqueue') {
    $value = filter_input(INPUT_POST, 'inputValue', FILTER_VALIDATE_INT);
    if ($value === false || $value === null) {
        $message = 'Please enter a valid integer to enqueue.';
        $messageType = 'error';
    } else {
        $_SESSION['queue'][] = $value;

        $message = "Enqueued {$value} onto the queue.";
        $messageType = 'success';
    }
}

// --- Handle Dequeue Operation ---
// Check if the form was submitted with the 'dequeue' action
if (isset($_POST['btn_dequeue']) && $_POST['btn_dequeue'] === 'dequeue') {
    // Manually determine queue size and check if empty without using count() or empty()
    $queueSize = 0;
    foreach ($_SESSION['queue'] as $item) {
        $queueSize++;
    }

    if ($queueSize === 0) { // Queue is empty
        $message = 'Queue is empty. Cannot dequeue.';
        $messageType = 'warning';
    } else {
        $dequeuedValue = null;
        $newQueue = [];
        $newQueueIndex = 0;
        $currentIndex = 0;

        // The first element (at index 0) is the one to be dequeued.
        // We will skip it and copy the rest to a new array.
        foreach ($_SESSION['queue'] as $item) {
            if ($currentIndex === 0) { // This is the element to dequeue
                $dequeuedValue = $item;
            } else {
                // Copy all subsequent elements to the new queue
                $newQueue[$newQueueIndex++] = $item;
            }
            $currentIndex++;
        }

        $_SESSION['queue'] = $newQueue; // Replace the old queue with the new one

        $message = "Dequeued {$dequeuedValue} from the queue.";
        $messageType = 'success';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Part 2 - Exercise 4</title>
    <!-- CSS Link -->
    <link rel="stylesheet" href="assets/styles/style.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <main class="container">
        <h1 class="text-center">4. Create a queue of integers using arrays (First In First Out)</h1>
        <div class="exercise-section part-two mt-4">
            <!-- Message Display Area: Only show if there's a message -->
            <?php if (!empty($message)): ?>
                <div id="messageBox" class="message-box <?php echo htmlspecialchars($messageType); ?>">
                    <?php echo htmlspecialchars($message); // Display the message, safely escaped
                    ?>
                </div>
            <?php endif; ?>
            <!-- Input Field for Queue -->
            <form method="post">
                <input type="number" name="inputValue" class="form-control form-control-lg" placeholder="Enter Integer">
                <div class="form-group mt-2 d-flex justify-content-evenly">
                    <button type='submit' name="btn_enqueue" value="enqueue" class="btn btn-warning m-1">Enqueue Value</button>
                    <button type='submit' name="btn_dequeue" value="dequeue" class="btn btn-danger m-1">Dequeue Value</button>
                </div>
            </form>

            <!-- Queue Display Area -->
            <h2 class="text-xl font-semibold text-gray-700 mb-3 mt-3 text-center">Current Queue:</h2>
            <div id="queueDisplay" class="stack-container"> 
                <?php
                // Manually determine queue size for display logic
                $currentQueueSize = 0;
                foreach ($_SESSION['queue'] as $item) {
                    $currentQueueSize++;
                }

                // Check if the queue is empty and display a message accordingly
                if ($currentQueueSize === 0): ?>
                    <p id="emptyQueueMessage" class="text-gray-500 text-center w-full">Queue is empty.</p>
                    <?php else:
                    // Iterate through the queue and create HTML div elements for each item.
                    foreach ($_SESSION['queue'] as $item):
                    ?>
                        <div class="stack-item">
                            <?php echo htmlspecialchars($item); // Display queue item, safely escaped
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