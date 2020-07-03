<?require($_SERVER['DOCUMENT_ROOT']."/bitrix/header.php");?>
	<form id="testForm">
		<input name="email" value="test@test.ru">
		<input name="name[]" value="Иван">
		<input name="lastName[]" value="Иванов">
		<input name="secondName[]" value="Иванович">
		<input type="submit" value="отправить">
	</form>

	<script>
		$(document).ready(function() {
			let formID = "#testForm";

			$(formID).on("submit", function (event) {
				event.preventDefault();
				console.log("click form");

				let formData = new FormData($(formID)[0]);
				console.log(formData.get('email'));
				console.log(formData.getAll('name[]'));
				console.log(formData.getAll('lastName[]'));
				console.log(formData.getAll('secondName[]'));

				BX.ajax.runAction('optiwork:project.api.updater.apply',{
					data: formData
				})
					.then(function(answer) {
						// Код после выполнения экшена
						console.log('BX.ajax.runAction complete');
						console.log(answer);
					});
			});
		});
	</script>

<?require($_SERVER['DOCUMENT_ROOT']."/bitrix/footer.php");?>