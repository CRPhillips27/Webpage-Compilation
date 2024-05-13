<?php include("top.html"); ?>
	<div id="main">
		<h2>stepp's To-Do List</h2>

		<ul id="todolist"></ul>

		<div id="buttons">
			<input id="itemtext" type="text" size="30" autofocus="autofocus" />
			<button id="add">Add to Bottom</button>
			<button id="delete">Delete Top Item</button>
		</div>

		<ul>
			<li><a href="logout.php">Log Out</a></li>
		</ul>
	</div>
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	
	<script>
		$(document).ready(function() {
			$.ajax({
				url: 'fetch_todolist.php',
				success: function(data) {
					$("#todolist").html(data);
				}
			});
			$("#add").click(function() {
				var newItem = $("#itemtext").val();
				if (newItem !== "") {
					$.ajax({
						url: 'add_item.php',
						data: { item: newItem },
						type: 'POST',
						success: function(response) {
							$("#todolist").append("<li>" + newItem + "</li>");
							$("#itemtext").val("");
						}
					});
				}
			});
			$("#delete").click(function() {
				$.ajax({
					url: 'delete_item.php',
					type: 'POST',
					success: function(response) {
						$("#todolist li:first").remove();
					}
				});
			});
			$("#todolist").sortable();
		});
	</script>

<?php include("bottom.html"); ?>	
