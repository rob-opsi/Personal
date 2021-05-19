<?php
	$category = $_POST['category'];
	$getCategoryName = mysqli_query($con, "SELECT * FROM categories WHERE id='$category'");
	while ($row = mysqli_fetch_array($getCategoryName)) {
		$categoryName = $row['category'];
		$categoryID = $row['id'];
	}
?>
<h1>Add <?php echo $categoryName; ?></h1>

<form action="handlers/addItems/add-game.php" method="POST">
	<input type="hidden" name="item_category" value="<?php echo $categoryID; ?>"/>
	<div class="form-group">
		<label>Game Title:</label>
		<input class="form-control" type="text" name="item_name" required/>
	</div>
	<div class="form-group">
		<label>Genre:</label>
		<select class="form-control" name="genre" required>
			<option value="">Choose A Genre</option>
			<?php 
				$gameGenres = mysqli_query($con, "SELECT * FROM game_genre ORDER BY genre_name");
				//while there is a result, echo this out
				while ($row = mysqli_fetch_array($gameGenres)) {
					echo '<option value="' . $row['id'] . '">' . $row['genre_name'] . '</option>';
				}
			?>
		</select>
	</div>
	<div class="form-group">
		<label>Type:</label>
		<select class="form-control" name="type" required >
			<option value="">Choose A Type</option>
			<?php 
				$gameTypes = mysqli_query($con, "SELECT * FROM game_type");
				//while there is a result, echo this out
				while ($row = mysqli_fetch_array($gameTypes)) {
					echo '<option value="' . $row['id'] . '">' . $row['type_name'] . '</option>';
				}
			?>
		</select>
	</div>
	<div class="form-group">
		<label>Location:</label>
		<input class="form-control" name="location" type="text" />
	</div>
	<button class="btn btn-success" type="submit" name="submit">Add Game <i class="fa fa-plus"></i></button>
</form>