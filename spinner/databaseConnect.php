$conn = new mysqli('localhost', 'johnanthonyelett', '', 'triviacrack');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
