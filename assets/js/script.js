let banToggle = document.getElementById("banAttacks").checked;

!banToggle ? document.getElementById("requireAttack").removeAttribute("disabled") : document.getElementById("requireAttack").setAttributeNode(document.createAttribute("disabled"))


document.getElementById("banAttacks").addEventListener("click", () => {
    banToggle = document.getElementById("banAttacks").checked;
    !banToggle ? document.getElementById("requireAttack").removeAttribute("disabled") : document.getElementById("requireAttack").setAttributeNode(document.createAttribute("disabled"))

})
