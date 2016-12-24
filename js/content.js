var arrayDeleteChar = [];
var arrayKeydownInputChar = [];
var arrayKeyupInputChar = [];
var inputKeypressCount = 0;
var inputKeyupCount = 0;
var deleteCount = 0;
var panel, inputKeydownJsonData, inputKeyupJsonData, deleteJsonData, keydownTimeStamp;

$(function() {
	panel = $("#typingResult");
	inputKeydownJsonData = $("#inputKeydownJsonData");
	inputKeyupJsonData = $("#inputKeyupJsonData");
	deleteJsonData = $("#deleteJsonData");

	$("body").keydown(function( event ) {
		keydownTimeStamp = new Date().getTime();
	});

	$("body").keypress(function( event ) {
		inputKeypressCount++;
		var keypressTimeStamp = new Date().getTime();
    	var currentCharacter = String.fromCharCode(event.which);
    	paintData(currentCharacter);
    	keydownCollector(currentCharacter, keypressTimeStamp);
	});

    $("body").keyup(function( event ) {
		var keyupTimeStamp = new Date().getTime();
		var keyupChar = String.fromCharCode(event.keyCode);

		if(event.keyCode > 47 && event.keyCode < 102 || event.keyCode == 32 || event.keyCode > 185){
			inputKeyupCount++;
			keyupCollector(keyupChar, keyupTimeStamp);
		}else if(event.keyCode == 8){
			deleteCount++;
			deleteLastChar(keyupTimeStamp);
		}else if(event.keyCode == 121){
			paintJsonResult();
		}
	});

	$("#submitJson").click(function( event ) {
		$("#hiddenKeydownJsonData").val(JSON.stringify(arrayKeydownInputChar));
		$("#hiddenKeyupJsonData").val(JSON.stringify(arrayKeyupInputChar));
		$("#hiddenDeleteJsonData").val(JSON.stringify(arrayDeleteChar));
		$("#enter-code").val(panel.html());
		var form = $("#typingForm");
		form.submit();
	});
});

var paintData = function(currentCharacter){
	setPanelData(panel.html().concat(currentCharacter));
}

function keydownCollector(charVal, keydownTimeStamp){
	var dataObj = {
		input : charVal,
		keydown_timestamp : keydownTimeStamp,
		position : inputKeypressCount
	}
	arrayKeydownInputChar.push(dataObj)
}

function keyupCollector(keyupChar, keyupTimeStamp){
	var panelData = panel.html();
	var panelLength = panelData.length;
	var dataObj = {
		input : keyupChar,
		keyup_timestamp : keyupTimeStamp,
		position : inputKeyupCount
	}
	arrayKeyupInputChar.push(dataObj)
}

function deleteLastChar(keyupTimeStamp){
	var panelData = panel.html();
	var panelLength = panelData.length;

	setPanelData(panelData.substring(0, panelLength - 1));
	deleteCollector(keyupTimeStamp, panelData.substring(panelLength - 1, panelLength), panelLength);
}


function deleteCollector(keyupTimeStamp, charVal, pos){
	var dataObj = {
		input : charVal,
		keydown_timestamp : keydownTimeStamp,
		keyup_timestamp : keyupTimeStamp,
		position : pos,
		reference_position : inputKeypressCount,
		delete_count : deleteCount
	}
	arrayDeleteChar.push(dataObj)
}

function setPanelData(data){
	panel.html(data);
}

function paintJsonResult(){
	inputKeydownJsonData.html(JSON.stringify(arrayKeydownInputChar));
	inputKeyupJsonData.html(JSON.stringify(arrayKeyupInputChar));
	deleteJsonData.html(JSON.stringify(arrayDeleteChar));
}

