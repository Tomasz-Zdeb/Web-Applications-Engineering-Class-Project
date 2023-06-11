<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/common.css">
    <link rel="stylesheet" type="text/css" href="public/css/home-dashboard.css">
    <script src="https://kit.fontawesome.com/0c0d4d1ec1.js" crossorigin="anonymous"></script>
    <title>SwimS Login</title>
</head>
<body>
    <div class="home-container">
        <nav>
            <header class="nav-logo-header">

            </header>
            <section>
            <?php
            require_once __DIR__ . '/../../src/repository/Database.php';

            $database = new Database();
            $connection = $database->getConnection();

            // Check if the connection is successful
            if ($connection) {

                // Test the getAllMessages method
                $messages = $database->getAllMessages();
                if (!empty($messages)) {
                    echo "Messages:<br>";
                    foreach ($messages as $message) {
                        echo "ID: " . $message['id'] . ", Message: " . $message['mymsg'] . "<br>";
                    }
                } else {
                    echo "No messages found." . "<br>";
                }
            } else {
                echo "Connection failed.";
            }

            ?>

            </section>
        </nav>
        <main>
            <header class="dashboard-header">

            </header>
            <section class="dashboard-content">
                <header class="dashboard-controls">
                    <i class="fa-solid fa-plus"></i>
                </header>
            </section>
        </main>
    </div>
</body>