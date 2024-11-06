const openSidebar = document.getElementById("openSidebar");
const logoSidebar = document.getElementById("logo-sidebar");
const closeSidebarBtn = document.getElementById("closeSidebarBtn");

openSidebar.addEventListener("click", () => {
    logoSidebar.classList.remove("-translate-x-full");
});

closeSidebarBtn.addEventListener("click", () => {
    logoSidebar.classList.add("-translate-x-full");
});

// const navLinks = document.querySelectorAll('[id="navLink"]');
// const navIcons = document.querySelectorAll('[id="navIcon"]');

// navLinks.forEach((navLink, index) => {
//     navLink.addEventListener("click", (event) => {
//         // Remove background color from all links
//         navLinks.forEach(link => {
//             link.classList.remove("bg-red-600");
//         });

//         // Remove text color from all icons
//         navIcons.forEach(icon => {
//             icon.classList.remove("text-white");
//         });

//         // Add background color to the clicked link
//         event.currentTarget.classList.add("bg-red-600");

//         // Find the corresponding icon inside the clicked link and add text color
//         const icon = event.currentTarget.querySelector('.navIcon');
//         if (icon) {
//             icon.classList.add("text-white");
//         }
//     });
// });

const openSidebarMini = document.getElementById("openSidebarMini");
const elementsWithTextSidebarMiniId = document.querySelectorAll('[id="textSidebarMini"]');

openSidebarMini.addEventListener("click", () => {
    logoSidebar.classList.toggle("sm:w-16");
    for (const element of elementsWithTextSidebarMiniId) {
        element.classList.toggle("sm:hidden");
    }
});


