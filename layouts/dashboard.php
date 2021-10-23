<?php session_start();
    if ( empty( $_SESSION['avatar'] ) ) { $avatar = '../dist/img/user.png'; } else { $avatar = $_SESSION['avatar']; }
    $dni        = $_SESSION['dni'];
    $firstName  = $_SESSION['firstName'];
    $lastName   = $_SESSION['lastName'];
    $email      = $_SESSION['email'];
    $phone      = $_SESSION['phone'];
    $address    = $_SESSION['address'];
    $superPower = $_SESSION['superPower'];
?>

<section class="container">
    <div class="row mt-5">
        <div class="col-1"></div>
        <div class="card col-10">
            <div class="row">
                <div class="col-4">
                    <img src="<?php echo $avatar; ?>" class="img-fluid rounded-start" alt="Profile Avatar">
                </div>
                <div class="col-8">
                    <div class="card-body">
                        <h5 class="card-title">Good day, <?php echo $firstName; ?>!</h5>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-1"></div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <h2>Balance of the last 7 days</h2>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <canvas id="balanceDashboard" width="100%"></canvas>
        </div>
    </div>
</section>

<script>
    var ctx = document.getElementById('balanceDashboard');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                // label: 'Income',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>