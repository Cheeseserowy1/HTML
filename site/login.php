<?php
// Ustawienia bazy danych
$servername = "localhost";  // Adres serwera
$username = "root";         // Nazwa użytkownika bazy danych
$password = "";             // Hasło bazy danych
$dbname = "registration";  // Nazwa bazy danych

// Tworzymy połączenie z bazą danych
$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzamy, czy połączenie się powiodło
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sprawdzamy, czy formularz został wysłany
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Pobieramy dane z formularza
    $email = $_POST['username'];
    $pass = $_POST['password'];

    // Wykonujemy zapytanie do bazy danych, aby sprawdzić dane użytkownika
    $sql = "SELECT * FROM registration WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $pass);  // 'ss' oznacza dwa parametry typu string
    $stmt->execute();
    $result = $stmt->get_result();

    // Sprawdzamy, czy użytkownik został znaleziony
    if ($result->num_rows > 0) {
        // Jeśli użytkownik istnieje, logujemy go
        echo "Login successful!";
        // Możesz dodać kod przekierowujący na inną stronę lub ustawiający sesję
    } else {
        // Jeśli użytkownik nie istnieje
        echo "Invalid username or password.";
    }

    // Zamykamy połączenie
    $stmt->close();
    $conn->close();
}
?>
