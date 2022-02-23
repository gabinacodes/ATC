let addMoreItems = document.getElementById("outer")
let cancelModal = document.getElementsByClassName("cancelButton")[0]
let deleteItems = document.getElementsByClassName("deleteBtn")[0];
let more = `<div class="form-group payDesc">
<span class="paymentDescription">
<input type="text" placeholder="enter item description"  class="itemDesc"/>
</span>
<span class="addon">
<input type="text" placeholder="enter amount" class="addonInput"  />
<span class="inner"> <img src="images/dustbin.svg" alt=""> <strong> Remove item
</strong>
</span>
</span>
</div>`;

addMoreItems.addEventListener("click", addItems);
function addItems() {
    let moreContainer = document.getElementsByClassName("itemMom")[0];
    let addItem = document.createElement('div')
    addItem.innerHTML = more
    moreContainer.appendChild(addItem)
    let removeItems = document.querySelectorAll(".inner")
    removeItems.forEach(removeItem => {
        removeItem.style.display = 'inline';
        removeItem.addEventListener("click", getModals);
    })
    function getModals(event) {
        let modal = document.getElementsByClassName("modalContainer")[0];
        modal.style.display = "flex"
        cancelModal.addEventListener("click", removeModal)
        function removeModal() {
            modal.style.display = "none"
        }
        deleteItems.addEventListener("click", deleteItem)
        function deleteItem() {
            let firstModal = document.getElementsByClassName("modal")[0]
            let secondModal = document.getElementsByClassName("deletedModal")[0]
            firstModal.style.display = "none"
            secondModal.style.display = "flex";
            setTimeout(function () { modal.style.display = "none";
            firstModal.style.display = "inline"
            secondModal.style.display = "none";
            if(document.getElementsByClassName('payDesc').length <=2){
                document.querySelector(".inner").style.display='none'

            }
         }, 1000);
         event.target.closest('div.payDesc').remove()
        }
    }
}