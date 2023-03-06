<header>
<h2><?= esc($title) ?></h2>

<?php echo link_tag('css/main.css'); ?>

<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>
	
<form action="<?= base_url() . "/guest/create" ?>" method="post">
    <?= csrf_field() ?>

    <label for="name">Name</label>
    <input type="input" name="name" value="<?= set_value('name') ?>">
    <br>

    <label for="email">Email</label>
    <input type="input" name="email" value="<?= set_value('email') ?>">
    <br>

    <label for="website">Website</label>
    <input type="input" name="website" value="<?= set_value('website') ?>">
    <br>

    <label for="comment">Comment</label>
    <textarea name="comment" cols="45" rows="4"><?= set_value('comment') ?></textarea>
    <br>

    <label for="gender">Gender</label>
    <input type="input" name="gender" value="<?= set_value('gender') ?>">
    <br>

    <input type="submit" name="submit" value="Create guest entry">
</form>
</header>
				
				<?php
				
				if ($_SERVER["REQUEST_METHOD"] == "POST"){
				$mysqli = new mysqli("192.168.150.213", "webprogss211", "fancyR!ce36", "webprogss211");

				// Check connection
				if ($mysqli -> connect_errno) {
				  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
				  exit();
				}

				$sql = "INSERT INTO sgricafort_myguests (name, email, website, comment, gender)
				VALUES ('name', 'email', 'website', 'comment', 'gender')";

				if ($mysqli->query($sql) === TRUE) {
				  echo "New record created successfully";
				} else {
				  echo "Error: " . $sql . "<br>" . $mysqli->error;
				}

				$mysqli->close();
				}
				
				?>