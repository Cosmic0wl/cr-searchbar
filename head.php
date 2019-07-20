<?php require_once 'actions/db_connect.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <!-- bootstrap overrides -->
    <link rel="stylesheet" href="resources/css/style.css">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- bootstrap js -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-pearl fixed-top">
            <a class="navbar-brand font-weight-bold" href="index.php">Big Library</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link"  href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="library.php">Library</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="formCd.php">Submit CD</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="formBook.php">Submit Book</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="formDvd.php">Submit Dvd</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="row mt-5 py-4 px-4 d-flex justify-content-center">
            <form class="form-inline">  
                <i class="fa fa-search-plus text-darkerblue" aria-hidden="true"></i>
                <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search"
                    aria-label="Search" id="search" name="title">
            </form>

        </div>
    <div class="row m-0 py-2 px-4" id="result">
