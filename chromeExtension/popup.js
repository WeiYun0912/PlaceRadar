document.addEventListener('DOMContentLoaded', function(dcle) {
    var dButton = document.getElementById("button");
    dButton.addEventListener('click', function(ce) {
        chrome.tabs.query({ active: true, currentWindow: true }, function(tabs) {  
            chrome.tabs.sendMessage(tabs[0].id, { content: "視窗腳本呼叫" }, function(/*response*/) {
            	
            }); 
        });
    });
});
