$(document).ready(function () {
	$('#car_brend').change(function () {
		$.post(
				'/ajax/elements_list.php',
				{
					'BREND_ID': $('#car_brend').val()
				},
				function (data) {

					$('#car_id').html(data);
				}
		);
	})
})
