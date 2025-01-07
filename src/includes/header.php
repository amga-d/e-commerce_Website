<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My PHP Project</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>
    <header id="header">
        <a class="logo" href="#"><img src="/assets/img/logo.png" alt="" /></a>
        <div>
            <ul id="navbar">
                <div class="mobile-nav-logo">
                    <img class="ver-logo" src="/assets/img/Ver-Logo.png" alt="" />
                    <a  id="close"><i class="bi bi-x"></i> </a>
                    <hr>
                </div>
                <li><a href="index.html" class="home">Home</a></li>
                <li><a href="shop.html" class="shop">Shop</a></li>
                <li><a href="blog.html" class="blog">Blog</a></li>
                <li><a href="about.html" class="about">About</a></li>
                <li><a href="contact.html" class="contact">Contact</a></li>
                <li class="cart">
                    <a href="cart.html"><i class="bi bi-bag"></i></a>
                </li>
            </ul>
        </div>
        <div id="mobile">
            <a href="cart.html"><i class="bi bi-bag"></i></a>
            <i id="bar" class="bi bi-list"></i>
        </div>
    </header>