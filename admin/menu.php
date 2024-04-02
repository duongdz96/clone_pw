<ul>
	<li>
		<a href="../test">
			Quản lý kỳ thi
		</a>
	</li>
</ul>
<ul>
	<li>
		<a href="../exam">
			Quản lý bài thi
		</a>
	</li>
</ul>
<?php 
	if(isset($_GET['error'])) {
?>

<span style="color: red;">
	<?php echo $_GET['error']; ?>
</span>

<?php } ?>

<?php 
	if(isset($_GET['success'])) {
?>

<span style="color: green;">
	<?php echo $_GET['success']; ?>
</span>

<?php } ?>