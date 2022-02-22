<!DOCTYPE html>
<html>

<head>
    <title>
        Products
    </title>
    <link type="text/css" rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <?php
    include "header.php";
    ?>
    <div id="main">
        <div id="contact-form">
            <form action="" method="">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control">
                <label for="email">Email:</label>
                <input type="text" name="email" class="form-control">
                <label for="message">Message:</label>
                <textarea name="message" cols="45" rows="6" class="form-control"></textarea>
                <p class="submit">
                    <input type="submit" name="submit" value="Submit">
                </p>
            </form>
        </div>

    </div>
    <?php include "footer.php" ?>
    <script src="script.js"></script>
</body>

</html>