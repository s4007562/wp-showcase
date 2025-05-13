<?php
include('includes/db_connect.inc');
include('includes/header.inc');

$sql = "SELECT gameid, gamename, image FROM games";
$result = $conn->query($sql);
?>

<main id="gallerymain">
    <h2 class="gallery-h1">GamesRUs has a lot to offer!</h2>
    <p class="gallery-description">Click on any game to view details</p>
    <p class="gallery-description">
            To cater to the rapidly changing gaming landscape, ShopRUs also provides trade-in services and pre-owned game sales,
            allowing gamers to exchange old titles for store credit or discounted purchases.
            Additionally, the store has a strong online presence, with a user-friendly website offering nationwide shipping,
            making it a go-to for customers who can't visit in person.
        </p>

    <div class="gallery-container">
    <?php
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $gameid = $row['gameid'];
            $gamename = htmlspecialchars($row['gamename']);  
            $image = htmlspecialchars($row['image']);        
            $imgPath = "userimages/" . $image;                

            echo "<div class='gallery-item'>
                    <a href='details.php?gameid=$gameid'>
                        <img src='$imgPath' alt='Game: $gamename'>
                        
                    </a>
                    <p class='caption'>$gamename</p>
                  </div>";
        }
    } else {
        echo "<p>No games found.</p>";
    }
    ?>
    </div>
</main>

<?php include('includes/footer.inc'); ?>
