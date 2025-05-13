<?php
include('includes/db_connect.inc');
$title = "GamesRUs - Game List";
include('includes/header.inc');
?>
<main id="gamesmain">
    <h2 class="discover-title">Discover GamesRUs</h2>
    <p>
        Located in the heart of the city, ShopRUs is a haven for both casual gamers and dedicated enthusiasts alike.
        Established in 2010, the store has grown into a community hub, offering a wide array of video games, board games,
        consoles, and gaming accessories. From the latest AAA titles to indie gems, ShopRUs prides itself on maintaining a
        diverse and carefully curated selection. Whether you're looking for the hottest new release or a nostalgic classic,
        the knowledgeable staff at ShopRUs is always ready to assist with recommendations or troubleshooting any
        gaming-related queries.
    </p>

    <div class="content-wrapper">
    <div class="image-container">
        <img src="images/games.jpeg" alt="Gaming Accessories" class="game-image">
    </div>

        <div class="table-container">
            <table class="game-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Platforms</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $result = mysqli_query($conn, "SELECT gameid, gamename, type, price, platform FROM games");
                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td><a href='details.php?gameid=" . $row['gameid'] . "'>" . htmlspecialchars($row['gamename']) . "</a></td>";
                            echo "<td>" . htmlspecialchars($row['type']) . "</td>";
                            echo "<td>$" . number_format($row['price'], 2) . "</td>";
                            echo "<td>" . htmlspecialchars($row['platform']) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No games found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php include('includes/footer.inc'); ?>
