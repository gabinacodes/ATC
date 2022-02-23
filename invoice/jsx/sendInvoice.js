let emailInput = document.querySelector('.emailInput').value
let regEx = /^^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9})$/
let amountRegEx = /^[0-9]{8}/
let name = /^[A-Z][a-z]{5,}/
let validMail = emailInput.match(regEx)
let payerForm = document.forms.payerform
let submitForm = document.forms.form2
/*
let nextPage = (event) => {
    event.preventDefault()
    let form1 = document.querySelector('.payerform');
    let form2 = document.querySelector('.form2');
    if (validMail) {
        emailInput.style.bordercolor = "green"
        form2.style.display = "flex"
    } else {
        let invalidMail = document.createElement('p')
        invalidMail.innerHTML = "email not valid"
        let emailMom = document.querySelector('.emailGroup')
        emailMom.appendChild(invalidMail)
        form1.style.display = "flex"
        form2.style.display = "none"
    }

}
*/

let nextPage = (event) => {
    event.preventDefault()
    event.stopPropagation()
    payerForm.style.display = 'none'
    submitForm.style.display = 'flex'
    return false
}



let sendInfo = (event) => {
    event.preventDefault()
    event.stopPropagation()
    let details = []

    document.querySelectorAll('div.payDesc').forEach(detail => {
        let [description, amount] = detail.getElementsByTagName('input')
        try {
            description = description.value
            amount = amount.value
            details.push({description, amount})
        } catch (error) {
            amount = description = null

        }
    })
    let body = {
        details: JSON.stringify(details),
        email: payerForm.email.value,
        payer: payerForm.name.value,
        address: payerForm.address.value,
        paymentDate: payerForm.paymentDate.value,
        paymentTime: payerForm.paymentTime.value,
        paymentType: payerForm.paymentType.value,
        dueDate: payerForm.dueDate.value,
        dueTime: payerForm.dueTime.value,
        upfrontPayment: payerForm.upfrontPayment.value,
        unclearedBalance: payerForm.balancepayment.value,
        mailSubject: submitForm.mailSubject.value,
        CcEmail: submitForm.CcEmail.value,
        adminPassword: submitForm.adminPassword.value,
    }
    let URL = `${window.location.protocol}//${window.location.hostname}/invoice/php/sendInvoice`
    fetch(URL, {
        method: "POST",
        body: JSON.stringify(body),
        headers: {
            "Content-Type": "application/json",
        },
    }).then(res => res.json())
    .then(data => {
        alert(data.message)
    }).catch((err) => {
        alert('error occurred, please try again')
    })
return false
}

payerForm.addEventListener('submit', nextPage)
submitForm.addEventListener('submit', sendInfo)