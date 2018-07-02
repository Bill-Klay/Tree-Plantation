document.addEventListener('OnClick', deleteAccount, false);

function deleteAccount(name) {
	var msg = "Are you sure you want to delete this account: " + name + "?";
	var verify = confirm(msg);
	if (verify) {
		window.location.href = "login.php?username=" + name;
	}
	else {
		return false;
	}
}

function showAdmin() {
	document.getElementById("admin").style.visibility = "visible";
}

function hideAdmin() {
	document.getElementById("admin").style.visibility = "hidden";
}

function logout() {
	window.location.href = "logout.php";
}