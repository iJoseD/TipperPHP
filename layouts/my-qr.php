<?php session_start(); ?>

<section class="container">
    <div class="row mt-5">
        <div class="col-12 text-center">
            <img src="https://thankyoutipper.com/wp-content/uploads/2021/08/newLogo-W.svg" width="60%" alt="Logo ThankYou Tipper">
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12 text-center">
            <p class="text-white" style="font-weight: 800;">I'm <?php echo $_SESSION['firstName']; ?> and my super power is:</p>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12 text-center">
            <span class="superPower">To <?php echo $_SESSION['superPower']; ?></span>
        </div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="card col-10">
            <div class="card-body text-center">
                <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=https://myapp.thankyoutipper.com/payments/?id=<?php echo $_SESSION['phone']; ?>&choe=UTF-8" alt="Generate QR Code">
                <h5 class="card-title text--orange" style="font-weight: 800;"><?php echo $_SESSION['firstName']; ?></h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
</section>