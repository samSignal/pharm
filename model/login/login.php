<?php
session_start();
require_once '../../inc/config.php'; // Include database configuration

$errors = [];

if (isset($_POST['m-submit'])) {
    // Sanitize input
    $username = htmlentities($_POST['username']);
    $password = htmlentities($_POST['password']);

    try {
        // Fetch user details from the `users` table
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username LIMIT 1");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_OBJ); // Fetch as an object

        if ($user) {
            // Check if the password is stored using MD5
            if (md5($password) === $user->password) {
                // MD5 match, rehash password using password_hash
                $newHashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Update password in the database
                $updateStmt = $pdo->prepare("UPDATE users SET password = :newPassword WHERE id = :id");
                $updateStmt->execute(['newPassword' => $newHashedPassword, 'id' => $user->id]);

                // Set session variables as this user has successfully logged in
                session_regenerate_id(true);
                $_SESSION['user_id'] = $user->id;
                $_SESSION['username'] = $user->username;
                $_SESSION['first_name'] = $user->first_name;
                $_SESSION['last_name'] = $user->last_name;

                // Fetch dynamic roles for the user
                $stmt = $pdo->prepare("
                    SELECT roles.role_name 
                    FROM roles 
                    JOIN user_roles ON roles.id = user_roles.role_id 
                    WHERE user_roles.user_id = :user_id
                ");
                $stmt->execute(['user_id' => $user->id]);
                $roles = $stmt->fetchAll(PDO::FETCH_COLUMN); // Fetch role names as an array

                // Store roles in session
                $_SESSION['roles'] = $roles;

                // Redirect based on roles dynamically
                if (in_array('admin', $roles)) {
                    $_SESSION['success'] = 'Welcome' . $_SESSION['first_name'] . '!';
                    header('Location: ../dashboard/dashboard.php'); // Redirect to admin dashboard
                } elseif (in_array('user', $roles)) {
                    $_SESSION['success'] = 'Welcome' . $_SESSION['first_name'] . '!';
                    header('location: ../../views/purchase/purchase.php'); // Redirect to editor dashboard
                } else {
                    $_SESSION['success'] = 'Welcome ' . $_SESSION['first_name'] . '!';
                    header('Location: ../dashboard/dashboard.php'); // Redirect to regular user dashboard
                }
                exit;
            } elseif (password_verify($password, $user->password)) {
                // Password is already hashed
                // Set session variables
                session_regenerate_id(true);
                $_SESSION['user_id'] = $user->id;
                $_SESSION['username'] = $user->username;
                $_SESSION['first_name'] = $user->first_name;
                $_SESSION['last_name'] = $user->last_name;

                // Fetch dynamic roles for the user
                $stmt = $pdo->prepare("
                    SELECT roles.role_name 
                    FROM roles 
                    JOIN user_roles ON roles.id = user_roles.role_id 
                    WHERE user_roles.user_id = :user_id
                ");
                $stmt->execute(['user_id' => $user->id]);
                $roles = $stmt->fetchAll(PDO::FETCH_COLUMN); // Fetch role names as an array

                // Store roles in session
                $_SESSION['roles'] = $roles;

                // Redirect based on roles dynamically
                if (in_array('admin', $roles)) {
                    $_SESSION['success'] = 'Welcome' . $_SESSION['first_name'] . '!';
                    header('Location: ../dashboard/dashboard.php'); // Redirect to admin dashboard
                } elseif (in_array('user', $roles)) {
                    $_SESSION['success'] = 'Welcome' . $_SESSION['first_name'] . '!';
                    header('location: ../../views/purchase/purchase.php'); // Redirect to editor dashboard
                } else {
                    $_SESSION['success'] = 'Welcome ' . $_SESSION['first_name'] . '!';
                    header('Location: ../dashboard/dashboard.php'); // Redirect to regular user dashboard
                }
                exit;
            } else {
                // Incorrect password
                $_SESSION['error'] = "Incorrect password";
                header('Location: ../../index.php');
                exit;
            }
        } else {
            // No user found with that username
            $_SESSION['error'] = "Wrong username or password";
            header('Location: ../../index.php');
            exit;
        }
    } catch (Exception $e) {
        // Handle any errors or exceptions
        $_SESSION['error'] = "An error occurred. Please try again.";
        header('Location: ../../index.php');
        exit;
    }
}
?>
