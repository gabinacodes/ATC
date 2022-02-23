let svg = document.querySelector('svg')
let paymentButton = document.querySelector('.pay')
let modal = document.querySelector('.modal')
let email = document.querySelector('input[type="email"]')
let button = document.querySelector('input[type="submit"]')
let notRegistered = document.querySelector('[id="notRegistered"]')
let verified = document.getElementById("verified")
let errMessage = 'email not found'
let payNote = 'Proceed to payment'
let username, phone, amount, paymentPurpose
try{
  email.addEventListener('keydown', () => {
    notRegistered.innerHTML = ''
    button.value = 'Submit'
    verified.innerHTML = ''
    notRegistered.innerHTML = ''
  })
  paymentButton.onclick = (e) => {
    e.preventDefault()
    modal.style.display = 'flex' || '-webkit-box' || '-ms-flexbox';
  }
  
  svg.addEventListener('click', () => {
    modal.style.display = 'none'
    
  })
}
catch(err){
  //do nothing
}

const getPrice = (course) => {
  switch (course) {
    case 'discovery':
      price = 5000
      break
    case 'discovery-lite':
      price = 7500
      break
    case 'innovators':
      price = 10000
  }
  return price
}

const getKids = () => {
  let body = { email: email.value }
  let URL = "php/getkids"
  if (button.value === payNote) {
    payWithPaylink()
    return false;
  }
  //['change', 'keyup', 'cut'].forEach(event => el.addEventListener(event, handler));
  /**
   * window.onload = window.onresize = (event) => {
    //Your Code Here
}

Node.prototype.addEventListeners = function(eventNames, eventFunction){
    for (eventName of eventNames.split(' '))
        this.addEventListener(eventName, eventFunction);
}
document.body.addEventListeners("mousedown touchdown", myFunction)


ES6 helper function
function addMultipleEventListener(element, events, handler) {
  events.forEach(e => element.addEventListener(e, handler))
}
   */

  fetch(URL, {
    method: "POST",
    body: JSON.stringify(body),
    headers: {
      "Content-Type": "application/json",
    },
  }).then(res => res.json())
    .then(data => {
      username = data[0].guardName
      phone = data[0].guardTel
      verified.innerHTML =
        data.map((student) => (
          `  <li>
            <input type="checkbox" value=${getPrice(student.course)} checked />
            <b>${student.fullName}</b> <strong>-</strong> <em> ${student.course}</em>
            </li>`))
      notRegistered.innerHTML = ''
      button.value = payNote
    }
    ).catch((err) => {
      verified.innerHTML = ''
      notRegistered.innerHTML = errMessage
    })

  return false
}
function payWithPaylink() {
  updateAmount()
  if (amount === 0) {
    notRegistered.innerHTML = 'None selected'
    return false
  }
  Paylink.checkout('atchub', {
    email: email.value,
    name: username,
    phone: phone,
    amount: amount,
    reference: paymentPurpose
  })
}

const updateAmount = () => {
  amount = 0
  paymentPurpose = `STEM Payment for: `
  document.querySelectorAll('input:checked').forEach(checked => {
    amount = amount + Number(checked.value)
    student = checked.nextElementSibling.innerHTML
    paymentPurpose = `${paymentPurpose} ${student}, `
  })
  paymentPurpose = `${paymentPurpose.slice(0, -2)}.`
}


