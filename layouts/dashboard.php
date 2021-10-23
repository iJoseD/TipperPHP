<?php session_start();
    $dni        = $_SESSION['dni'];
    $firstName  = $_SESSION['firstName'];
    $lastName   = $_SESSION['lastName'];
    $email      = $_SESSION['email'];
    $phone      = $_SESSION['phone'];
    $address    = $_SESSION['address'];
    $superPower = $_SESSION['superPower'];
?>

<section class="container">
    <div class="row">
        <div class="card col-12">
            <div class="row">
                <div class="col-md-4">
                    <img src="https://thankyoutipper.com/wp-content/uploads/2021/09/240410371_546518386495802_3184932399260879223_n.jpg" class="img-fluid rounded-start" alt="Profile Avatar">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Good day, <?php echo $firstName; ?>!</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>