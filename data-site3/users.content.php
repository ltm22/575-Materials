<?php
$db = new Database();

$session = new Session();
$loggedIn = $session->checkLoginStatus();

// $loggedIn = 1;

$caption = 'Users';
$headers = array('ID', 'First Name', 'Last Name', 'Email', 'Approved');
if ($loggedIn) {
		array_push($headers, 'Actions');
}

$users = $db->object('User');
// $sql = 'SELECT `id` FROM `users`;';

$tableRows = array();
$counter = 0;

	foreach ($users as $user) {
		// $tableRows .= "<tr>\n";
		/* $tableRows[] = "<tr><td>{$user->id}</td>\n";
		$tableRows[] .= "<td>{$user->firstname}</td>\n";
		$tableRows[] .= "<td>{$user->lastname}</td>\n";
		$tableRows[] .= "<td>{$user->email}</td>\n";
		$tableRows[] .= "<td>{$user->approved}</td>\n";
		if ($loggedIn) {
			$tableRows[] .= "<td><a href=\"user-edit.php?id={$user->id}\" class=\"icon-button\"><i class=\"fas fa-pencil-alt\" role=\"img\" aria-label=\"Edit\"></i></a> ";
			$tableRows[] .= "<a href=\"user-delete.php?id={$user->id}\" class=\"icon-button\"><i class=\"far fa-trash-alt\" id=\"delete-user\" role=\"img\" aria-label=\"Delete\"></i></a></td>\n";
		}
		$tableRows[] .= "</tr>\n"; */

		$tableRows[$counter][] = $user->id;
		$tableRows[$counter][] = $user->firstname;
		$tableRows[$counter][] = $user->lastname;
		$tableRows[$counter][] = $user->email;
		$tableRows[$counter][] = $user->approved;
		if ($loggedIn) {
			$loggedInRow = "<a href=\"user-edit.php?id={$user->id}\" class=\"icon-button\"><i class=\"fas fa-pencil-alt\" role=\"img\" aria-label=\"Edit\"></i></a>";
			$loggedInRow .= "<a href=\"user-delete.php?id={$user->id}\" class=\"icon-button delete-user\" data-user-id=\"{$user->id}\" data-firstname=\"{$user->firstname}\" data-lastname=\"{$user->lastname}\" data-email=\"{$user->email}\" data-idrow=\"$counter\"><i class=\"far fa-trash-alt\" role=\"img\" aria-label=\"Delete\"></i></a>\n";
			$tableRows[$counter][] = $loggedInRow;
		}
		$counter++;
	}

$data = $tableRows;

$attributes = array('id' => 'userTable_id', 'class' => 'userTable_class');

include CLASS_PATH . 'UI.class.php'; // if the UI file has not been included yet
$ui = new UI(); // if the UI class has not been called yet;


// $postFirstname = $_POST['firstname'];
// $postLastname = $_POST['lastname'];
// $postEmail = $_POST['email'];

echo '
<div id="deque-dialog" class="deque-dialog" data-id="first-deque-dialog">
  <div class="deque-dialog-screen-wrapper"></div>
  <div class="deque-dialog-screen">
    <h1 id="dialogHeading" class="deque-dialog-heading">Delete User?</h1>
    <p class="deque-dialog-description" id="dialogDescription">Please confirm whether you wish to delete this user.</p>
    <p>First Name: <span id= "firstname"></span></p>
    <p>Last Name: <span id= "lastname"></span></p>
    <p>Email: <span id= "email"></span></p>
    <div class="deque-dialog-buttons">
      <button class="deque-button deque-dialog-button-submit">Delete</button>
      <button class="deque-button deque-dialog-button-cancel">Cancel</span><span aria-hidden="true"></button>
			<button class="deque-dialog-button-close" aria-label="Close dialog"><span aria-hidden="true"></span></button>
    </div>
  </div>
</div>
';

echo '<div id="dynamicContentWrapper" tabindex="-1"></div>';

$table = $ui->simpleTable($caption, $headers, $data, $attributes);
echo $table; // this would render a fully complete table

$addUser = '';
if ($loggedIn) {
	$addUser = "<p><a href=\"user-add.php\" class=\"icon-button\"><i class=\"fas fa-plus-circle\"></i> Add user</a></p>";
}
echo $addUser;


echo '
<script>

$( document ).ready(function() {
console.log(\'ready\')

	var userID;

	$("a.delete-user").click(function(event) {
		event.preventDefault()
		userID = $(this).data("user-id")
		var firstname = $(this).data("firstname")
		var lastname = $(this).data("lastname")
		var email = $(this).data("email")
		console.log(userID)
		console.log(firstname)
		$(\'#deque-dialog\').removeClass(\'deque-hidden\')
		$(\'#deque-dialog\').addClass(\'deque-show-block\')
		$(\'button.deque-dialog-button-submit\').focus()
		$(\'button.deque-dialog-button-submit\').attr("data-user-id",userID)
		console.log(userID)
		$(\'#firstname\').html(firstname)
		$(\'#lastname\').html(lastname)
		$(\'#email\').html(email)



//How can I pass a unique id through to the point of removing the row upon closing the dialogue box?
		var IDTagStart = "idrow_"
		var idrow = $(this).data("idrow")
		FullIDTag = IDTagStart.concat(idrow)
		console.log(FullIDTag)
		$(\'button.deque-dialog-button-submit\').attr("data-idtag",FullIDTag)
		$(\'button.deque-dialog-button-close\').attr("data-user-id",userID)
		$(\'button.deque-dialog-button-cancel\').attr("data-user-id",userID)


	})
	$("button.deque-dialog-button-submit").click(function() {
		// var userID = $(this).data("user-id");
		var FullIDTag = $(this).data("idtag");
		console.log(userID);
		console.log(FullIDTag);

		var dynamicUrl = "' . URL_ROOT . 'dynamic/deleteuser-dynamic.php?user_id=" + userID;
		console.log(dynamicUrl);

		$.ajax({
			url: dynamicUrl,
			cache: true
		})
		.done(function( html ) {
			var wrapper = $( "#dynamicContentWrapper" );

			// Close dialogue
			$(\'#deque-dialog\').hide();

			//display message (in dynamic content wrapper)
			wrapper.html( html );

			//Hide or Remove row from table dynamically?
			console.log("FullIDTag",FullIDTag)
			var idreal = "#" + FullIDTag
			$(idreal).remove();

			//delay for 1.5 seconds and set focus to message returned.
			console.log(\'start\')
			window.setTimeout(function() {
				console.log(\'start timeout\');
				wrapper.focus();
			}, 2000)

			console.log(\'stop\')
			// set focus to message returned

		});

	});

		$("button.deque-dialog-button-cancel").click(function() {
		$(\'#deque-dialog\').removeClass(\'deque-show-block\')
		$(\'#deque-dialog\').addClass(\'deque-hidden\')


		var stringforfocus = "a[href=\"user-delete.php?id=" + userID + "\"]"
		console.log(stringforfocus)
		$(stringforfocus).focus()

	});

		$("button.deque-dialog-button-close").click(function() {
		$(\'#deque-dialog\').removeClass(\'deque-show-block\')
		$(\'#deque-dialog\').addClass(\'deque-hidden\')

		var stringforfocus = "a[href=\"user-delete.php?id=" + userID + "\"]"
		console.log(stringforfocus)
		$(stringforfocus).focus()

});
});

</script>
';
