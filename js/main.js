/*ПОДДЕРЖКА. ПРОВЕРКА КОРРЕКТНОСТИ ВВОДА ДАННЫХ*/

function checkTopic(inputField, helpText) {
	var topic = inputField.value;
	if (topic.length > 100) {
		helpText.innerHTML = "Длина темы вопроса не должна превышать 100 символов. Пожалуйста, сократите";
		return false;
	}
	else if (topic.length == 0) {
		helpText.innerHTML = "Пожалуйста, укажите тему вопроса";
		return false;
	}
	else {
		helpText.innerHTML = "";
		return true;
	}
}

function checkQuestion(inputField, helpText) {
	var question = inputField.value;
	if (question.length > 500) {
		helpText.innerHTML = "Длина вопроса не должна превышать 500 символов. Пожалуйста, сократите";
		return false;
	}
	else if (question.length == 0) {
		helpText.innerHTML = "Пожалуйста, расскажите нам подробнее о вашей проблеме";
		return false;
	}
	else {
		helpText.innerHTML = "";
		return true;
	}
}

function checkRegister(form) {
	if (checkTopic(form.topic, document.getElementById('topic_help')) && checkQuestion(form.subj, document.getElementById('question_help')))
		form.submit();
	else
		alert("Проверьте, пожалуйста, еще раз все поля.");
}
/*--------------------------------------------*/

/*ГАЛЕРЕЯ*/
function showTooltip(div) {
    var myDiv = document.getElementById(div);
    if(myDiv.style.display == 'none')
    	myDiv.style.display = 'block';
    else
		myDiv.style.display = 'none';
    return false;
}
/*--------------------------------------------*/