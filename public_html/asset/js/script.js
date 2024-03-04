const scriptURL = 'https://script.google.com/macros/s/AKfycbzwmBc9jXG1YIwhpA0uds0dOO1anGl83NBekzbyMwuscGVUqbElFrJqCJQi9eGXv0BO/exec'
const form = document.forms['request-form']
form.addEventListener('submit', e => {
    e.preventDefault()
    fetch(scriptURL, { method: 'POST', body: new FormData(form)})
    .then(response => alert("Thank you! your form is submitted successfully.\nSupport me by subscribing youtube.com/c/iewil" ))
    .then(() => { window.location.reload(); })
    .catch(error => console.error('Error!', error.message))
})
function searchTable() {
    var input;
    var saring;
    var status; 
    var tbody; 
    var tr; 
    var td;
    var i; 
    var j;
    input = document.getElementById("input");
    saring = input.value.toUpperCase();
    tbody = document.getElementsByTagName("tbody")[0];
    tr = tbody.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        for (j = 0; j < td.length; j++) {
            if (td[j].innerHTML.toUpperCase().indexOf(saring) > -1) {
                status = true;
            }
        }
        if (status) {
            tr[i].style.display = "";
            status = false;
        } else {
            tr[i].style.display = "none";
        }
    }
}