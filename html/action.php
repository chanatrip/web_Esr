<?php
    if (isset($_POST['input_text'])) {
        $inputText = $_POST['input_text'];
        echo "<p>Received input_text: $inputText</p>";
    } else {
        echo "<p>No data received</p>";
    }
?>