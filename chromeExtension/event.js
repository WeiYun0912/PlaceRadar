

function checkableClick(info, tab) {
    //checkbox 以及 radio 這兩種類型的項目，除了上面的程式碼提到的資訊外，還會用布林值來告訴你使用者點選前，及點選後的狀態。
    console.log(
        "ID是：" + info.menuItemId + "\n" +
        "選取的文字是：" + (info.selectionText ? info.selectionText : "") + "\n"
    );
    var searchText = info.selectionText ? info.selectionText : "";
    if(searchText != ""){
        chrome.tabs.query({ active: true, currentWindow: true }, function(tabs) {  
            chrome.tabs.sendMessage(tabs[0].id, { content: searchText+",zh-TW" }, function(/*response*/) {
                
            }); 
        });
    }
}

function checkableClickKR(info, tab) {
    //checkbox 以及 radio 這兩種類型的項目，除了上面的程式碼提到的資訊外，還會用布林值來告訴你使用者點選前，及點選後的狀態。
    console.log(
        "ID是：" + info.menuItemId + "\n" +
        "選取的文字是：" + (info.selectionText ? info.selectionText : "") + "\n"
    );
    var searchText = info.selectionText ? info.selectionText : "";
    if(searchText != ""){
        chrome.tabs.query({ active: true, currentWindow: true }, function(tabs) {  
            chrome.tabs.sendMessage(tabs[0].id, { content: searchText+",ko" }, function(/*response*/) {
                
            }); 
        });
    }
}

function checkableClickJP(info, tab) {
    //checkbox 以及 radio 這兩種類型的項目，除了上面的程式碼提到的資訊外，還會用布林值來告訴你使用者點選前，及點選後的狀態。
    console.log(
        "ID是：" + info.menuItemId + "\n" +
        "選取的文字是：" + (info.selectionText ? info.selectionText : "") + "\n"
    );
    var searchText = info.selectionText ? info.selectionText : "";
    if(searchText != ""){
        chrome.tabs.query({ active: true, currentWindow: true }, function(tabs) {  
            chrome.tabs.sendMessage(tabs[0].id, { content: searchText+",ja-JP" }, function(/*response*/) {
                
            }); 
        });
    }
}

function createMenus() {
    var parent = chrome.contextMenus.create({
        "title": "[Taiwan]search the address you choose",
        "contexts": ['all'],    
        "onclick": checkableClick
    });

    var kr = chrome.contextMenus.create({
        "title": "[Korea]search the address you choose",
        "contexts": ['all'],
        "onclick": checkableClickKR
    });

    var jp = chrome.contextMenus.create( {
        "title": "[Japan]search the address you choose",
        "contexts": ['all'],
        "onclick": checkableClickJP
    });

}

createMenus();




