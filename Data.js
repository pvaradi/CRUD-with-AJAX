$(function() {
	(function readData() {
		$.ajax({
			url: 'CRUD_read.php',
			dataType: 'JSON',	
			success:  function(response_get) {

				$('#table-display').html('');			
				var table_data ='';
				
				for(var i = 0; i <= response_get.length-1; i++){

					table_data += '<tr>';
					table_data += '<td>' + response_get[i].id + '</td>';
					table_data += '<td>' + response_get[i].user_name + '</td>';
					table_data += '<td>' + response_get[i].user_password + '</td>';
					table_data += '<td>' + response_get[i].user_email + '</td>';
					table_data += '<td><button type="button" class="btn btn-success edit" data-value="' + response_get[i].id + '")">Edit</button></td>';
					table_data += '<td><button type="button" class="btn btn-danger delete" data-value="' + response_get[i].id + '">Delete</button></td>';
					table_data += '</tr>';
	
				}
				$('#table-display').append(table_data);
				$('#table').DataTable();
			},
		});
	//setTimeout(readData, 10000);
	}());
});


$("#addNew").on('click',function(){
	$("#addNewRecord").modal('show');
	}	
)

$(document).on('click', '.delete', function (e) {      
	 
	 rowID = $(this).data("value");
	 
		$.ajax({
			url: 'CRUD_delete.php',
			method: 'POST',
			dataType: 'text',	
			data: {
					id: rowID
			},
			success:  function(response_get) {
				alert(response_get);
			},
		});	 
});  

$(document).on('click', '.create', function (e) {
	 event.preventDefault();
	 
	 name = $('#user_name').val();
	 pass = $('#user_password').val();
	 email = $('#user_email').val();
	 
	 valid = true;
	 
	 if (name == null || name == ''){
		alert("Name field is empty!");
		valid = false;
	 }
	 else if (pass == null || pass == ''){
		alert("Password field is empty!");
		valid = false;
	 }
	 else if (email == null || email == ''){
		alert("Email field is empty!");
		valid = false;
	 }
	 
	 
	 if(valid){
	 	$.ajax({
			url: 'CRUD_create.php',
			method: 'POST',
			dataType: 'text',	
			data: {
					user_name: name,
					user_password: pass,
					user_email: email
			},
			success:  function(response_get) {
				alert(response_get);
			},
		});
	 }
});  

$(document).on('click', '.edit', function (e) {
     
	 rowID = $(this).data("value");
	 
	 $('.update').data('value', rowID);
	 
	 $("#modifyRecord").modal('show');
		
		$.ajax({
			url: 'CRUD_readone.php',
			method: 'POST',
			dataType: 'JSON',	
			data: {
					id: rowID
			},
			success:  function(response_get) {
					$('#modify_user_name').val(response_get[0].user_name);
					$('#modify_user_password').val(response_get[0].user_password);
					$('#modify_user_email').val(response_get[0].user_email);
			},
		});
	 
});  

$(document).on('click', '.update', function (e) {
     
	 event.preventDefault();
	 
	 rowID = $(this).data("value");
	 name = $('#modify_user_name').val();
	 pass = $('#modify_user_password').val();
	 email = $('#modify_user_email').val();
	 
	 valid = true;
	 
	 if (name == null || name == ''){
		alert("Name field is empty!");
		valid = false;
	 }
	 else if (pass == null || pass == ''){
		alert("Password field is empty!");
		valid = false;
	 }
	 else if (email == null || email == ''){
		alert("Email field is empty!");
		valid = false;
	 }
	 
	 
	 if(valid){
	 	$.ajax({
			url: 'CRUD_update.php',
			method: 'POST',
			dataType: 'text',	
			data: {
					id: rowID,
					user_name: name,
					user_password: pass,
					user_email: email
			},
			success:  function(response_get) {
				alert(response_get);
			},
		});
	 }
	 
});  



