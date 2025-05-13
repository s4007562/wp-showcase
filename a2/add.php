<?php
$title = 'Add More';
include('includes/header.inc');
include('includes/db_connect.inc');
?>

<main id="add">
    <div class="form-container">
        <h2 class="form-title">Add a Game</h2>
        <p class="form-subtitle">You can add a new game here</p>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['gameName'] ?? '';
            $type = $_POST['gameType'] ?? '';
            $description = $_POST['gameDescription'] ?? '';
            $caption = $_POST['imageCaption'] ?? '';
            $price = $_POST['price'] ?? 0.00;
            $platform = $_POST['platform'] ?? '';

            $imageName = '';
            $uploadDir = 'userimages/';

            if (isset($_FILES['gameImage']) && $_FILES['gameImage']['error'] === UPLOAD_ERR_OK) {
                $imageName = basename($_FILES['gameImage']['name']);
                $targetPath = $uploadDir . $imageName;
                move_uploaded_file($_FILES['gameImage']['tmp_name'], $targetPath);
            }

            $stmt = $conn->prepare("INSERT INTO games (gamename, type, image, caption, description, price, platform) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssss", $name, $type, $imageName, $caption, $description, $price, $platform);

            if ($stmt->execute()) {
                echo "<p>Game added successfully!</p>";
            } else {
                echo "<p>Error adding game: " . htmlspecialchars($stmt->error) . "</p>";
            }

            $stmt->close();
        }
        ?>

        <form action="#" method="post" enctype="multipart/form-data">
            <label for="gameName">Game Name: <span>*</span></label>
            <input type="text" id="gameName" name="gameName" placeholder="Provide a name for the game" required>

            <label for="gameType">Type: <span>*</span></label>
            <input type="text" id="gameType" name="gameType" placeholder="Provide a type for the game" required>

            <label for="gameDescription">Description: <span>*</span></label>
            <textarea id="gameDescription" name="gameDescription" placeholder="Describe the game briefly" required></textarea>

            <div class="file-upload-container">
                <label for="gameImage">Select an Image: <span>*</span></label>
                <input type="file" id="gameImage" name="gameImage" accept="image/*" required>
                <small class="image-size-text">Max image size: 500px</small>
            </div>

            <label for="imageCaption">Image Caption: <span>*</span></label>
            <input type="text" id="imageCaption" name="imageCaption" placeholder="Describe the image in one word" required>

            <label for="price">Price: <span>*</span></label>
            <input type="number" id="price" name="price" step="0.01" placeholder="Enter the price of the game" required>

            <label for="platform">Platform: <span>*</span></label>
            <input type="text" id="platform" name="platform" placeholder="Platform of the game" required>

            <div class="button-container">
                <button type="submit" class="submit-btn">Submit</button>
                <button type="reset" class="clear-btn">Clear</button>
            </div>
        </form>
    </div>
</main>

<?php include('includes/footer.inc'); ?>
