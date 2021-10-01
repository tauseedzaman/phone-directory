
function RowChecked() {
    let x = document.querySelectorAll("#check");
    let list = Array();
    let i=0;
    x.forEach(element => {
        
        if(element.checked){
            list[i] = element.getAttribute("data-id");
            i++;
        }
    });
}