<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/common.css">
    <style>
        * {
            box-sizing: border-box;
        }

        .container{
            width: 100vw;
            height: 100vh;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        .logo{
            background: #888;
            /* width: 20em; */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            /* margin-right: 1em;
            margin-left: 1em; */
            border-radius: 0.3cm;
            color: #333;
            padding: 0.5em;
        }

        .logo-img{
            width: 5em;
        }

        .login-container{
            background: #888;
            width: 20em;
            display: flex;
            align-items: center;
            flex-direction: column;
            padding-top: 1em;
            padding-bottom: 1em;
            margin-left: 1em;
            margin-right: 1em;
            border-radius: 0.5em;
            color: #333;
        }

        .logo-header{
            text-align: center;
            font-weight: bold;
            font-size: 2em;
        }

        .logo-text{
            text-align: center;
            font-weight: bold;
            font-size: 4em;
            font-family: 'Courier New', Courier, monospace;
        }

        .logo-footer{
            text-align: center;
            padding-bottom: 0.5em;
            padding-top: 0.5em;
        }

        .login-form{
            display: flex;
            flex-direction: column;
            width: 70%;
            margin-top: 1em;
            align-items: center;
        }

        .login-header{
            text-align: center;
        }

        .login-form>button,.login-form>input{
            background-color: #bbb  ;
            border: none;
            border-radius: 0.2cm;
            padding: 0.2em;
            margin: 0.2em;
            width: 100%;
        }

        .login-form>button:hover{
            background-color: #ccc;
        }

        .login-header{
            margin-bottom: 0.5em;
            font-weight: bold;
            font-size: 2em;
        }
        .login-text{
            margin-top: 0.5em;
            text-align: center;
        }
        .login-footer{
            margin-top: 0.5em;
            font-size: 0.7em;
        }

        .login-error-message{
            font-size: 0.5em;
            font-weight: normal;
            font-family: 'Courier New', Courier, monospace;
        }

        @media (max-device-width: 820px){    
            .container{
                width: auto;
                height: auto;
                display: flex;
                flex-direction: column;
                overflow: scroll;
                font-size: 2em;
            }
            .login-container{
                width: 90vw;
                margin:auto;
                margin:0em 1em 1em 1em;
            }
            .logo{
                width: 90vw;
                margin:auto;
                padding-left: 0px;
                padding-right: 0px;
                margin:1em 1em;
            }
            .login-form input{
                height: 2em;
                font-size: 2em;
                border-radius: 0.5em;
                border: none;
                margin-bottom: 1em;
            }
            .login-form button{
                height: 2em;
                font-size: 2em;
                border-radius: 0.5em;
                padding: 0.5em;
                justify-content: center;
            }

            .login-form{
                width: 90%;
                margin-top: 1em;
            }
        }
    </style>
    <title>SwimS Register</title>
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
                Please fill&nbsp;in the registration form
            </div>
            <form class="login-form" action="login" method="POST">
                <input name="email" type="text" placeholder="email@example.com">
                <input name="password" type="password" placeholder="password">
                <button type="register">Register</button>
            </form>
        </div>
    </div>
</body>