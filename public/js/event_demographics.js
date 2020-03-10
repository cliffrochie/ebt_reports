var w;
// var strWindowFeatures = "toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=900,height=600,top="+(screen.height-750)+",left="+(screen.width-1150);
var strWindowFeatures = "scrollbars=yes,resizable=yes,width=900,height=600,top="+(screen.height-750)+",left="+(screen.width-1150);

var openNewWindow = function(pdf) {
    w = window.open(pdf.output('bloburl'), "new_window", strWindowFeatures);
}

window.onclick = function(event) {
    if (!event.target.matches('#search_employee')) {
        var dropdown = document.getElementsByClassName("dropdown-content")[0];

        if (dropdown.classList.contains('show')) {
            dropdown.classList.remove('show');
            while(dropdown.firstChild) {
                dropdown.removeChild(dropdown.firstChild);
            }
        }
    }
    if(event.target.matches('.dropdown-item')) {
        document.getElementById('code').value = event.target.id;
    }
}
