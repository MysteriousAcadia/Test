$(document).ready(function() {
	$("#stockInputForm").validate({
		rules: {
     		vehicle_no: "required",
     		regular: "required",
     		damaged: "required",
     		transport_damaged: "required",

     	}	
	});

	$("#regulareggsform").validate({
		rules: {
     		vehicle_no_in_regular: "required",
     		buyer_in_regular: "required",
     		regular_in_regular: "required",
     		damaged_in_regular: "required",
     		destroyed_in_regular: "required",

     	}	
	});

	$("#damagedeggsform").validate({
		rules: {
     		vehicle_no_in_damaged: "required",
     		buyer_in_damaged: "required",
     		damaged_in_damaged: "required",
     	}	
	});

	$("#expenseform").validate({
		rules: {
			details: "required",
     		expense_amount: "required",
     	}	
	});


	$("#regular_no").keyup(function() {
  		$("#amount_total").val($("#regular_no").val() * $("#rate_regular").val())
	});

	$("#damaged_no").keyup(function() {
  		$("#amount_total_damaged").val($("#damaged_no").val() * $("#rate_damaged").val())
	});

	$('.select').select2({
		 ajax: {
		    url: "/search/users",
		    dataType: 'json',
		    delay: 250,
		    data: function (params) {
		      return {
		        q: params.term, // search term
		        page: params.page
		      };
		    },
		    processResults: function (data, params) {
		      // parse the results into the format expected by Select2
		      // since we are using custom formatting functions we do not need to
		      // alter the remote JSON data, except to indicate that infinite
		      // scrolling can be used

		      return {
		        results: data,
		      };
		    },
		    cache: true
		  },
		  escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
		  minimumInputLength: 1,
		});
	});