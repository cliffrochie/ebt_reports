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

var submit = document.getElementById('generate_personnel_profile');
submit.addEventListener('click', function() {

    var code = document.getElementById('code').value;
    
    if(code == undefined || code == '' || code == null) {
        code = "none";
    }
    
    var url = "employee.php";
    var params = "?code="+code;
    
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url+params);
    xhr.onload = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            data = JSON.parse(xhr.responseText);
            if(data.status != "500") {
                openNewWindow(generatePDF(data));
                console.log(data);
            }
            else {
                alert("Code not found!");
            }
        }
        else {
            console.log(xhr.status);
        }
    }
    xhr.send();
});