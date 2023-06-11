<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/common.css">
    <link rel="stylesheet" type="text/css" href="public/css/login.css">
    <title>SwimS Login</title>
</head>
<body>
    <div class="container">
        <div class="logo">
            <div class="logo-header">
                Unleash Your Productivity with:
            </div>
            <div class="logo-text">
                SWIMS
            </div>
            <img src="public/images/box-s.png" class="logo-img">
            <div class="logo-footer">
                Ultimate minimalistic Inventory Management System for your storage needs!
            </div>
        </div>
        <div class="login-container">
            <div class="login-header">
                Please log&nbsp;in
            </div>
            <div>
                <?php if(isset($messages)){
                    foreach ($messages as $message){
                        echo '<span style="color: red; font-size: 1em;">'.$message.'</span>';
                    }
                }?>
            </div>
            <form class="login-form" action="login" method="POST">
                <input name="email" type="text" placeholder="email@example.com">
                <input name="password" type="password" placeholder="password">
                <button type="submit">Log In</button>
            </form>
            <div class="login-text">
                <span>Don't have an account yet?</span>
                <a>Sign&nbsp;Up</a>
            </div>
            <div class="login-footer">
                I've&nbsp;forgot my&nbsp;password!
            </div>
        </div>
    </div>
</body>