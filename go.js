function SubmitFormData() {
    var inputdate = $("#inputdate").val();
    var inputmonth = $("#inputmonth").val();
    $.post("go.php", { inputdate: inputdate, inputmonth: inputmonth },
    function(data) {
	 $('#results').html(data);
	 $('#myForm')[0].reset();
    });
}
