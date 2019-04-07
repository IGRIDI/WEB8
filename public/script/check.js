	var fullName = document.getElementById("fullName");
	var telephone = document.getElementById("telephone");
	var emailValid = document.getElementById("email");
	var dateOfBirth = document.getElementById('dateOfBirth');
	var questionValidate = document.getElementById('question');
	// var sexSelection = document.getElementById('sexSelection');
	// var ageSelection = document.getElementById('ageSelection');
	// var ageSelectOption = document.getElementById('ageSelectOption');
	var divError = document.createElement('div');
	var getTestForm = document.contactsForm;
	var re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
	var validPattern = /^(\+7|\+3)[0-9]{9,11}$/;
	divError.id = "error";

	function createDivError(firstNode) {
		firstNode.style.border = '2px solid red';
		firstNode.parentNode.insertBefore(divError, firstNode.nextSibling);
		divError.innerHTML = 'Неправильно заполнено поле!'
	}

	function clearDivError(firstNode) {
		divError.innerHTML = '';
		firstNode.style.border = '1px solid green'
	}

	// ageSelection.onmouseover = function () {
	// 	if (getTestForm.age.selectedIndex === 0) {
	// 		createDivError(ageSelection);
	// 		ageSelection.style.border = 'none';
	// 		ageSelectOption.style.border = '2px solid red';
	// 		divError.style.marginLeft = '20px';
	// 	} else {
	// 		clearDivError(ageSelectOption);
	// 		ageSelectOption.style.border = '1px solid green';
	// 	}
	// };


	// sexSelection.onmouseover = function () {
	// 	if ((getTestForm.pol[0].checked === false) && (getTestForm.pol[1].checked === false)) {
	// 		sexSelection.style.width = '100px';
	// 		createDivError(sexSelection);
	// 		divError.style.marginLeft = '20px';
	// 	} else {
	// 		clearDivError(sexSelection)
	// 	}
	// };


	questionValidate.onblur = function () {
		if (questionValidate.value === '') {
			questionValidate.focus();
			createDivError(questionValidate);
		} else {
			clearDivError(questionValidate)
		}
	};


	fullName.onblur = function () {
		var wordCounter = fullName.value.split(" ").length;
		if ((wordCounter < 3) || fullName.value === '') {
			fullName.focus();
			createDivError(fullName);
		} else {
			clearDivError(fullName)
		}
	};

	telephone.onblur = function () {
		// alert(telephone.value.match(validPattern));
		if (telephone.value === '' || telephone.value.match(validPattern) === null) {
			telephone.focus();
			createDivError(telephone);
		} else {
			clearDivError(telephone)
		}
	};

	emailValid.onblur = function () {
		if (emailValid.value === '' || emailValid.value.match(re) === null) {
			emailValid.focus();
			createDivError(emailValid);
		} else {
			clearDivError(emailValid)
		}
	};

	dateOfBirth.onblur = function () {
		if (dateOfBirth.value === '') {
			dateOfBirth.focus();
			createDivError(dateOfBirth);
		} else {
			clearDivError(dateOfBirth)
		}
	};

function checkedForm() {
	var wordCounter = fullName.value.split(" ").length;
	if (((getTestForm.pol[0].checked !== false) || (getTestForm.pol[1].checked !== false)) &&
		(dateOfBirth.value !== '') &&
		(emailValid.value !== '' || emailValid.value.match(re) !== null) &&
		(telephone.value !== '' || telephone.value.match(validPattern) !== null) &&
		((wordCounter >= 3) || fullName.value !== '') &&
		(questionValidate.value !== '') &&
		(getTestForm.age.selectedIndex !== 0)
	) {
		return true;
	} else {
		return false
	}
}
