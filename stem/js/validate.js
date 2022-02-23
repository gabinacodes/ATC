


    function validate() {    
        let mail = document.getElementById("email").value;
        let regEx = /^([a-zA-Z0-9\._]+)@([a-zA-Z0-9]+.)([a-z]+)$/;
        let para = document.getElementById("para").value;
    let found = mail.match(regEx);
    if (found) {
        document.getElementById("verified").style.display = 'flex';
        document.getElementById("notRegistered").style.display = 'none';
        return true
    }
    else{
        document.getElementById("notRegistered").style.display = 'flex';
        document.getElementById("verified").style.display = 'none';
        return false
    }
    
}
const students = [
    m 
]
function validateForm() {
    var x = document.forms["myForm"]["fname"].value;
    if (x == "" || x == null) {
      alert("Name must be filled out");
      return false;
    }
  }
















    let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
        console.log(xhttp.text);
           
        }
    };
        xhttp.open("GET", "data.json", true);
        xhttp.send();
         
        let display = '';
            //console.log(verified[0].name[2]);

            for (let i = 0; i < verified.length; i++) {
                const element = verified[i];

                //console.log(verified[0].email)
                display += '<li>'+verified[0].name+'</li>'
            }
            document.getElementById('verified').innerHTML = display
