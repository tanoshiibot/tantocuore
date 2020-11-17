let allowToggle = document.getElementById("allowAttacks").checked;
let requireToggle = document.getElementById("requireAttack").checked;

allowToggle ? document.getElementById("requireAttack").removeAttribute("disabled") : document.getElementById("requireAttack").setAttributeNode(document.createAttribute("disabled"))
!requireToggle ? document.getElementById("allowAttacks").removeAttribute("disabled") : document.getElementById("allowAttacks").setAttributeNode(document.createAttribute("disabled"))


document.getElementById("allowAttacks").addEventListener("click", () => {
    allowToggle = document.getElementById("allowAttacks").checked;
    allowToggle ? document.getElementById("requireAttack").removeAttribute("disabled") : document.getElementById("requireAttack").setAttributeNode(document.createAttribute("disabled"))

})

document.getElementById("requireAttack").addEventListener("click", () => {
    requireToggle = document.getElementById("requireAttack").checked;
    !requireToggle ? document.getElementById("allowAttacks").removeAttribute("disabled") : document.getElementById("allowAttacks").setAttributeNode(document.createAttribute("disabled"))

})