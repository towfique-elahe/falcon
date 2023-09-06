function mobileNav() {
    document.getElementById("dropList").classList.toggle("show");
}
window.onclick = function (event) {
    if (!event.target.matches('.drop_btn')) {
        var dropdowns = document.getElementsByClassName("drop_list");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}