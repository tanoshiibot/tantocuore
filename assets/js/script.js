let allowToggle = document.getElementById("allowAttacks").checked;

allowToggle ? document.getElementById("requireAttack").removeAttribute("disabled") : document.getElementById("requireAttack").setAttributeNode(document.createAttribute("disabled"))


document.getElementById("allowAttacks").addEventListener("click", () => {
    allowToggle = document.getElementById("allowAttacks").checked;
    allowToggle ? document.getElementById("requireAttack").removeAttribute("disabled") : document.getElementById("requireAttack").setAttributeNode(document.createAttribute("disabled"))

})
