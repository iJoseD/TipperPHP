<?php session_start();

$phone = $_SESSION['phone'];

// MySQLi
$servername = "localhost";
$username   = "app_tipper_user";
$password   = "Ma3h!h57";
$dbname     = "app_tipper";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

$sql = "SELECT * FROM userProfile WHERE phone = '$phone'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $dni = $row['dni'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $email = $row['email'];
        $address = $row['address'];
        $superPower = $row['superPower'];
    }
}

?>

<section class="container">
    <div class="row text-center">
        <div class="col-12">
            <h2 class="text--blue">Create your profile</h2>
        </div>
    </div>
    <div class="row mt-5 hide">
        <div class="col-12">
            <label for="img--profile" class="form-label">Select your profile picture</label>
            <input class="form-control" type="file" id="img--profile">
        </div>
    </div>
    <div class="row mt-4">
        <div class="form-floating col-12">
            <input type="text" class="form-control" id="dni" value="<?php echo $phone; ?>">
            <label for="dni">DNI</label>
        </div>
    </div>
    <div class="row mt-4">
        <div class="form-floating col-6">
            <input type="text" class="form-control" id="fitst--name" value="<?php echo $phone; ?>">
            <label for="fitst--name">First Name</label>
        </div>
        <div class="form-floating col-6">
            <input type="text" class="form-control" id="last--name" value="<?php echo $phone; ?>">
            <label for="last--name">Last Name</label>
        </div>
    </div>
    <div class="row mt-4">
        <div class="form-floating col-12">
            <input type="text" class="form-control" id="email" value="<?php echo $phone; ?>">
            <label for="email">Email</label>
        </div>
    </div>
    <div class="row mt-4">
        <div class="form-floating col-12">
            <input type="tel" class="form-control" id="phone" value="<?php echo $phone; ?>" readonly>
            <label for="phone">Phone</label>
        </div>
    </div>
    <div class="row mt-4">
        <div class="form-floating col-12">
            <input type="text" class="form-control" id="address" value="<?php echo $phone; ?>">
            <label for="address">Address</label>
        </div>
    </div>
    <div class="row text-center mt-5">
        <div class="col-12">
            <h4 class="text--orange">Which is your super power?</h4>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-4 d-grid">
            <span class="super-power artist" data-superPower="Artist">Artist</span>
        </div>
        <div class="col-4 d-grid">
            <span class="super-power creator" data-superPower="Creator">Creator</span>
        </div>
        <div class="col-4 d-grid">
            <span class="super-power server" data-superPower="Server">Server</span>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-4 d-grid">
            <span class="super-power tour-guide" data-superPower="Tour-guide">Tour-guide</span>
        </div>
        <div class="col-4 d-grid">
            <span class="super-power influencer" data-superPower="Influencer">Influencer</span>
        </div>
        <div class="col-4 d-grid">
            <span class="super-power speaker" data-superPower="Speaker">Speaker</span>
        </div>
    </div>
    <div class="row hide">
        <div class="form-floating col-12">
            <input type="text" class="form-control" id="superPower">
            <label for="superPower">Super Power</label>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <a href="#" class="link-danger">You have not connected your Stripe account, connect now!</a>
        </div>
    </div>

    <!-- Alert -->
    <div class="row mt-5 hide" id="alert">
        <div class="col-12">
            <div class="alert alert-success" role="alert">
                Profile created successfully! Please wait...
            </div>
        </div>
    </div>

    <!-- Button -->
    <div class="row mt-5">
        <div class="col-12 d-grid">
            <button type="button" id="btn--updateProfile" class="btn btn-primary">Update profile</button>
        </div>
    </div>
</section>