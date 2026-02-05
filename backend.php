<?php
    session_start();
    include 'connect.php';

    $error_message = '';

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['signUp'])) {
        $firstName = $_POST['fName'];
        $lastName = $_POST['lName'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error_message = "Email is already taken";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $firstName, $lastName, $email, $hashedPassword);

            if ($stmt->execute()) {
                sleep(7);
                echo "<script>
                    alert('Signup successful!');
                    window.location.href = 'index.php';
                </script>";
                exit();
            } else {
                $error_message = "Something went wrong. Please try again later.";
            }
        }
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['signIn'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT id, first_name, last_name, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashedPassword = $row['password'];

            if (password_verify($password, $hashedPassword)) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['first_name'] = $row['first_name'];
                $_SESSION['last_name'] = $row['last_name'];

                sleep(7);
                header("Location: index.php");
                exit();
            } else {
                $error_message = "Incorrect password!";
            }
        } else {
            $error_message = "Email not found!";
        }
    }

    $conn->close();
?>