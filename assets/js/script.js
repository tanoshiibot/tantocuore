let toggle = document.getElementById("allowAttacks").checked;
document.getElementById("attackRequire").setAttribute("class", toggle ? "d-flex justify-content-between col-2 offset-10" : "d-none ")

document.getElementById("allowAttacks").addEventListener("click", () => {
    toggle = document.getElementById("allowAttacks").checked;
    console.log(toggle);
    document.getElementById("attackRequire").setAttribute("class", toggle ? "d-flex justify-content-between col-2 offset-10" : "d-none ")
})
