<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/common.css">
    <script src="https://kit.fontawesome.com/0c0d4d1ec1.js" crossorigin="anonymous"></script>
    <style>
        .home-container{
            width: 100vw;
            height: 100vh;
            background: #666;
            margin: 0px
        }

        .home-logo-img{
            width: 3em;
        }

        .home-logo-text{
            font-size: 20px;
            font-weight: bold;
            font-family: 'Courier New', Courier, monospace;
        }

        @media only screen and (max-device-width: 780px){

        }
    </style>
    <title>SwimS User Dashboard</title>
</head>
<body>
    <div class="home-container">
        <nav>
            <header class="nav-logo-header">
                <img src="../images/box-s.png" class="home-logo-img">
                <span class="home-logo-text">SWIMS</span>
            </header>

            <section class="nav-logo-buttons">
                <ul>
                    <li>
                        <a href="#" class="nav-button">
                            <span>Home</span>
                            <i class="fa-solid fa-building"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-button">
                            <span>Raports</span>
                            <i class="fa-solid fa-chart-simple"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-button">
                            <span>Settings</span>
                            <i class="fa-solid fa-gear"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-button">
                            <span>Help</span>
                        </a>
                    </li>
                </ul>
                <i class="fa-solid fa-house-building"></i>
            </section>

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
                    <form>
                        <input placeholder="Search storage spaces">
                    </form>
                </header>
            </section>
        </main>
    </div>
</body>