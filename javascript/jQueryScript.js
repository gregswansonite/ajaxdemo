$(document).ready(function(){
	// Load Content
	$('#partials').load('pages/contacts.html');
	displayContacts();
	//Display Content Functions
	function displayOrders(){
		$('#ordersTable').empty();
		$.getJSON('php/order.php', function(response, textStatus) {
			$.each(response, function(i, order){
				$('#ordersTable').append('<tr><td class=delete number='+ order.id +'><img class=deleteButton src=images/minus.png></td><td>' + order.name + ' </td><td> '+ order.description +' </td></tr>');
			});
		});
	}
	function displayContacts(){
		$('#contactsTable').empty();
		$.getJSON('php/contact.php', function(response, textStatus) {
			$.each(response, function(i, contact){
				$('#contactsTable').append('<tr><td class=delete number='+ contact.id +'><img class=deleteButton src=images/minus.png></td><td>' + contact.name + ' </td><td> '+ contact.email +' </td><td> '+ contact.phone +' </td></tr>');
			});
		});
	}
	//NAV FUNCTIONALITY
	$('#ordersButton').on('click', function(){
		$('#ordersButton').addClass("active");
		$('#contactsButton').removeClass("active");
		$('#aboutButton').removeClass("active");
		$('#partials').load('pages/orders.html');
		displayOrders();
	});
	$('#contactsButton').on('click', function(){
		$('#contactsButton').addClass("active");
		$('#ordersButton').removeClass("active");
		$('#aboutButton').removeClass("active");
		$('#partials').load('pages/contacts.html');
		displayContacts();
	});
	$('#aboutButton').on('click', function(){
		$('#contactsButton').removeClass("active");
		$('#ordersButton').removeClass("active");
		$('#aboutButton').addClass("active");
		$('#partials').load('pages/about.html');
	});

	// Contact Insert 
	$('#partials').on('submit', 'form.ajaxContacts',function(){
		var that = $(this),
			url = that.attr('action'),
			type = that.attr('method'),
			data = {};
		that.find('[name]').each(function(index, value){
			var that = $(this),
				name = that.attr('name'),
				value = that.val();
			data[name]  = value;
		});
		$.ajax({
			url: url,
			type: type,
			data: data,
			success: function(response){
				displayContacts();
				$("input[type=text], textarea").val("");
			}
		});
		return false;
	});
	// Contact Delete 
	$('#partials').on('click','#contactsTable td.delete', function() {
		var that = $(this),
			recordToDelete = that.attr('number');
			that.parent().remove();
		$.ajax({
			url: 'php/contact.php',
			type: 'POST',
			data: { recordToDelete: recordToDelete},
			success: function(response){
			}
		});
	});
	// Order Insert
	$('#partials').on('submit','form.ajaxOrders',function(){
		var that = $(this),
			url = that.attr('action'),
			type = that.attr('method'),
			data = {};
		that.find('[name]').each(function(index, value){
			var that = $(this),
				name = that.attr('name'),
				value = that.val();
			data[name]  = value;
		});
		$.ajax({
			url: url,
			type: type,
			data: data,
			success: function(response){
				alert(response);
				displayOrders();
				$("input[type=text], textarea").val("");
			}
		});
		return false;
	});
	// Order Delete 
	$('#partials').on('click', '#ordersTable td.delete', function() {
		var that = $(this),
			recordToDelete = that.attr('number');
			that.parent().remove();
		$.ajax({
			url: 'php/order.php',
			type: 'POST',
			data: { recordToDelete: recordToDelete},
			success: function(response){
			}
		});
	});
});