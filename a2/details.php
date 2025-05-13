<?php
include('includes/db_connect.inc');
include('includes/header.inc');

$gameid = isset($_GET['gameid']) ? intval($_GET['gameid']) : 0;

$sql = "SELECT * FROM games WHERE gameid = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $gameid);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $row = $result->fetch_assoc()) {
    $gamename = htmlspecialchars($row['gamename']);
    $type = htmlspecialchars($row['type']);
    $price = number_format($row['price'], 2);
    $platform = htmlspecialchars($row['platform']);
    $description = htmlspecialchars($row['description']);
    $image = htmlspecialchars($row['image']);
}
?>

<main class="details-wrapper">
    <div class="details-container">
        <img src="userimages/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['caption']); ?>" class="details-image">

        <div class="info-wrapper">
            <div class="info-item">
                <span class="material-icons">request_quote</span>
                <p>$<?php echo number_format($row['price'], 2); ?></p>
            </div>

            <div class="info-item">
                <span class="material-icons">category</span>
                <p><?php echo htmlspecialchars($row['type']); ?></p>
            </div>

            <div class="info-item">
                <span class="material-icons">devices</span>
                <p><?php echo htmlspecialchars($row['platform']); ?></p>
            </div>
        </div>

        <h2 class="game-title"><?php echo htmlspecialchars($row['gamename']); ?></h2>
        <p class="game-description"><?php echo htmlspecialchars($row['description']); ?></p>
    </div>
</main>
<?php include('includes/footer.inc'); ?>
