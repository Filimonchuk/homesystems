 <script type="text/javascript">
   function submitForm (form) {
if (document.getElementsByName("name")[0].value == "") {
		customAlert("Пожалуйста, введите ваше имя!");
		return;
	}
    if (document.getElementsByName("tel")[0].value == "") {
		customAlert("Пожалуйста, введите номер телефона!");
		return;
	}
    var ret = /^[0-9]*$/i;
    if (!ret.test(document.getElementsByName("tel")[0].value)) {
        customAlert("Пожалуйста, введите корректный номер телефона!");
        return;
    }
   	if (document.getElementsByName("email")[0].value == "") {
		customAlert("Пожалуйста, введите адрес вашей электронной почты!");
		return;
	}	  
    var re = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    if (!re.test(document.getElementsByName("email")[0].value)) {
        customAlert("Пожалуйста, введите корректный адрес электронной почты!");
        return;
    }
	jQuery.ajax({
			type: "POST",
			url: '../../wp-admin/admin-ajax.php',
			data: jQuery("#mainform").serialize()
		}).done(function() {
			customAlert("Спасибо за Ваш запрос, наш менеджер свяжется с вами в ближайшее время.");
    document.getElementById('mainform').reset();
		});
		return false;
      form.submit();
}
function customAlert(txt) {
	document.getElementById('custom-alert-text').innerHTML = txt;
	jQuery('#custom-alert-modal').modal('show');
}
</script>