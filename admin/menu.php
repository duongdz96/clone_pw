<ul>
	<li>
		<a href="../students">
			Quản lí học sinh
		</a>
	</li>
</ul>

<ul>
	<li>
		<a href="../exams">
			Quản lý bài thi
		</a>
	</li>
</ul>


<?php
if (isset($_GET['error'])) {
	?>

	<span style="color: red;">
		<?php echo $_GET['error']; ?>
	</span>

<?php } ?>

<?php
if (isset($_GET['sucess'])) {
	?>

	<span style="color: green;">
		<?php echo $_GET['sucess']; ?>
	</span>

<?php } ?>