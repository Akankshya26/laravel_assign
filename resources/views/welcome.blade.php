<html>
<style>
    * {
        margin: 0px;
        padding: 0px;
    }

    body {
        font-family: Ariel, Helvetica, sans-serif;
        background-color: rgb(60, 176, 199);
        color: white;
        line-height: 1.6;
        text-align: center;
    }

    .container {
        max-width: 960px;
        margin: auto;
        padding: 0 30px;
    }

    #showcase {
        height: 300px;
    }

    #showcase h1 {
        font-size: 50px;
        line-height: 1.3;
        position: relative;
        animation: heading;
        animation-duration: 3s;
        animation-fill-mode: forwards;
    }

    @keyframes heading {
        0% {
            top: -50px;
        }

        100% {
            top: 200px;
        }
    }

    #content {
        position: relative;
        animation-name: content;
        animation-duration: 3s;
        animation-fill-mode: forwards;
    }

    @keyframes content {
        0% {
            left: -1000px;
        }

        100% {
            left: 0px;
        }
    }

    .btn {
        display: inline-block;
        color: white;
        text-decoration: none;
        padding: 1rem 2rem;
        border: white 1px solid;
        border-radius: 30%;
        margin-top: 40px;
        opacity: 0;
        animation-name: btn;
        animation-duration: 3s;
        animation-delay: 3s;
        animation-fill-mode: forwards;
        transition-property: transform;
        transition-duration: 1s;
    }

    .btn:hover {
        transform: rotateY(360deg);
    }

    @keyframes btn {
        0% {
            opacity: 0
        }

        100% {
            opacity: 1
        }
    }
</style>

<head>
    <title>Landing Page</title>
</head>

<body>
    <header id="showcase">
        <h1>Welcome To Expense Manager <img src="logo.jpeg" alt="Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8" height="50px" widht="100px"></h1>
    </header>
    <div id="content" class="container">
        You can organize your Expense With Expense Manager.
    </div>
    <a href="register" class="btn">Register Here-></a>
    <br><br>
    <div id="content" class="container">
        If You Are a member.
    </div>
    <a href="login" class="btn">Continue With LogIn-></a>
</body>

</html>
