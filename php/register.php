<?php
class Registration
{
    private $conn;

    public function __construct($servername, $username, $password, $dataname)
    {
        $this->conn = new mysqli($servername, $username, $password, $dataname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function register($name, $surname, $email, $password, $accept)
    {
        $check = $this->checkEmail($email);
        if ($check) {
            echo "Istnieje już użytkownik z tym adresem e-mail. Proszę wybrać inny adres e-mail.";
        } else {
            $addToDB = "INSERT INTO dane_urzytkownika (`Imie`, `Nazwisko`, `Email`, `Haslo`, `Akceptacja_warunkow`) VALUES ('$name','$surname','$email','$password','$accept')";
            if ($this->conn->query($addToDB) === TRUE) {
                echo "Rejestracja przebiegła pomyślnie";
            } else {
                echo "Wystąpił błąd podczas rejestracji: " . $this->conn->error;
            }
        }
    }

    private function checkEmail($email)
    {
        $checkEmail = "SELECT * FROM dane_urzytkownika WHERE email = '$email'";
        $result = mysqli_query($this->conn, $checkEmail);
        return mysqli_num_rows($result) > 0;
    }
}

$registration = new Registration("localhost", "root", "", "rejestracja");
$registration->register($_POST['php-name'], $_POST['php-surname'], $_POST['php-email'], $_POST['php-password'], $_POST['php-accept']);
?>