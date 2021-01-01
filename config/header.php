<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>SportNews</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://localhost/SportNews/assets/css/main_modified.css" />
    <link rel="shortcut icon" href="http://localhost/SportNews/img/logo/favicon.png">

    <style>
        /* Centralize a imagem */
        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
            position: relative;
        }

        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        /* Botão Fechar (x) */
        .close {
            color: #7f888f;
            position: absolute;
            right: 25px;
            top: 0;
            font-size: 35px;
            font-weight: bold;
        }

        .container input[type=text],
        .container input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        label[for=uname],
        label[for=psw] {
            font-weight: bolder;
            margin-bottom: 0px;
            margin-top: 5px;
        }

        .container {
            padding: 16px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* Modal (background) */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto 15% auto;
            border: 1px solid #888;
            width: 40%;
        }

        @media screen and (max-width: 768px) {
            .modal-content {
                width: 80%;
            }
        }

        .modal-content,
        .container {
            border-radius: 5px;
        }

        .close:hover,
        .close:focus {
            color: #6cc5af;
            cursor: pointer;
        }

        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }
        }
    </style>
</head>

<body class="is-preload">
    <!-- PÁGINA -->
    <div id="wrapper">

        <!-- TOPO -->
        <div id="main">
            <div class="inner">
                <header id="header" style="padding-top:50px;"><a href="http://localhost/SportNews/" class="logo" style="padding-left:20px;"><img src="http://localhost/SportNews/img/logo/logo.png" alt="logo" style="width:6rem;"></a>
                    <ul class="icons">
                        <li><a class="icon brands fa-twitter" style="cursor: pointer;" href="https://twitter.com/br_sportnews"><span class="label">Twitter</span></a></li>
                        <li><a class="icon brands fa-facebook-f" style="cursor: pointer;"><span class="label">Facebook</span></a></li>
                        <li><a class="icon brands fa-instagram" style="cursor: pointer;"><span class="label">Instagram</span></a></li>
                        <li><a class="icon brands fa-github" style="cursor: pointer;" href="https://github.com/heitor-am/SportNews" target="_blank"><span class="label">GitHub</span></a></li>
                        <li><a class="icon brands fa-bitcoin" style="cursor: pointer;" href="https://tippin.me/@br_sportnews" target="_blank"><span class="label">Apoie</span></a></li>
                    </ul>
                </header>