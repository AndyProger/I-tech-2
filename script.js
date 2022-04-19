function printLocalStorageItems(item, element, header) {
    let myArray = JSON.parse(localStorage.getItem(item));
    let out_arr = document.getElementById(element);
    let str =  header;

    if(myArray !== null) {
        str += '<ol>';
        for (let i = 0; i< myArray.length; i++)
            if (myArray[i] !== undefined) 
                str += '<li>' + myArray[i] + '</li>';

        str += '</ol>';
    }
    else {
        str += '    Empty!<br>';
    }

    out_arr.innerHTML += str;
}

printLocalStorageItems("select3", "out_guarantee", "List of computers with expired guarante:");

if(localStorage['select2_header'] !== undefined)
    printLocalStorageItems("select2", "out_soft", localStorage['select2_header']);
else
    printLocalStorageItems("select2", "out_soft", "List of computers with software:");

if(localStorage['select1_header'] !== undefined)
    printLocalStorageItems("select1", "out_proc", localStorage['select1_header']);
else
    printLocalStorageItems("select1", "out_proc", "<br>List of computers with processor:");


window.addEventListener( "pageshow", function ( event ) {
    var historyTraversal = event.persisted || 
                        (typeof window.performance != "undefined" && 
                        window.performance === 2);
    if (historyTraversal) {
        window.location.reload();
    }
});