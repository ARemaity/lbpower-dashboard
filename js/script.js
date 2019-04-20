$(document).ready(function() {
	function validate() {
		var uname = $('#uname'),
				passwd = $('#passwd');
		
		if(uname === "" && passwd === "") {
			alert('Please enter the Username and Password !');
			return false;
		} else {
			alert('Correct !');
			return false;
		}
	}
});