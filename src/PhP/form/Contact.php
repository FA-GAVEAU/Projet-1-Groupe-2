<!Doctype html>

<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates" rel="stylesheet">
    <title>Pleasures of Wild !</title>
</head>

<body>
<!-- Part Navbar here -->

<?php include('header.inc.php'); ?>

<!-- form -->

<section id="contact">
    <div class="container jumbotron">
        <div class="row">
            <h2>Contact Us or Not</h2>
        </div><!-- .container-fluid -->
        <div class="row">
            <div class="col">
                <form method="POST" action="email.php" id="contact_form">
                    <div class="form-group">
                        <label for="name">Your name or your Girlfriend's</label>
                        <input type="text" id="name" class="form-control" name="name" placeholder="Enter your name here" minlength="2" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Your email to send you a thousand advertisements</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter a valid email here" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Your subject (not a verb, please)</label>
                        <input type="text" id="subject" name="subject" class="form-control" placeholder="Enter your subject here" minlength="8" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Need something to say?</label>
                        <textarea class="form-control" id="message" name="message" rows="7" placeholder="Write a little message...where a little joke example :


                        « Le manuel disait “Nécessite Windows XP ou mieux”. J’ai donc installé Linux. »" minlength="32"></textarea>
                    </div>
                    <br>
                    <?php
                    session_start();
                    if (!empty($_SESSION["success"])) { ?>
                        <div class='alert alert-success'>
                            <?php echo $_SESSION["success"];
                            unset($_SESSION["success"]);
                            ?>
                        </div>
                        <?php
                    }
                    if (!empty($_SESSION["error"])) { ?>
                        <div class='alert alert-danger'>
                            <?php echo $_SESSION["error"];
                            unset($_SESSION["error"]);
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="text-center">
                        <input type="submit" title="Send your email in clinking on this button." value="Send It !" class="btn btn-sm btn-info">
                    </div>
                </form>
            </div>
        </div><!-- .row -->
    </div>
</section>
    
<!-- Guest Book -->    
    
  <div class="container">
    <form>
      <label>Guestbook</label>
      <div class="form-group">
        <input type="text" class="form-control name" rows="1" placeholder="First & last name">
        <input type="text" class="form-control location" rows="1" placeholder="Location">
        <textarea type="text" class="form-control message" rows="4" placeholder="Leave a message here"></textarea>
      </div>
    </form>
    <div class="button-group pull-right">
      <p class="counter">140</p>
      <a href="#" class="btn btn-primary">Sign Guestbook</a>
    </div>

    <ul class="messages">
    </ul>
  </div>    

<!-- Footer -->

<?php include('footer.inc.php'); ?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="app.js"></script>
</body>

</html>
