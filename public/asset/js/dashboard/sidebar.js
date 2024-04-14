


let sidebar = document.querySelector(".sidebar_menu");
    let closeBtn = document.querySelector("#Button");
    let searchBtn = document.querySelector(".bx-search");
    closeBtn.addEventListener("click", ()=>{
      sidebar.classList.toggle("open");
      menuBtnChange();
    });
    searchBtn.addEventListener("click", ()=>{ 
      sidebar.classList.toggle("open");
      menuBtnChange(); 
    });
    function menuBtnChange() {
    if(sidebar.classList.contains("open")){
    closeBtn.classList.replace("bx-menu", "bxs-x-circle");
    }else {
    closeBtn.classList.replace("bxs-x-circle","bx-menu");
    }
    }




const dropdownButton = document.getElementById("dropdown-button");
const buttonBoundingClientRect = dropdownButton.getBoundingClientRect();
const chevron = document.getElementById("chevron");
const chevronBoudingClientRect = chevron.getBoundingClientRect();
const rightMenu =
  buttonBoundingClientRect.right - chevronBoudingClientRect.right;
const topMenu = chevronBoudingClientRect.top - buttonBoundingClientRect.top;

const mainMenu = document.getElementById("main-menu");
mainMenu.style.top = `${topMenu}px`;
mainMenu.style.right = `${rightMenu}px`;

const toggleDropdownMenu = () => {
  const dropdownMenu = document.getElementById("dropdown-menu");
  if (dropdownMenu.classList.contains("open")) {
    mainMenu.style.top = `${topMenu}px`;
    mainMenu.style.right = `${rightMenu}px`;
  } else {
    mainMenu.style.top = `${dropdownButton.clientHeight + 10}px`;
    mainMenu.style.right = 0;
  }

  dropdownMenu.classList.toggle("open");
};





const notificationButton = document.getElementById("notification-button");
const notificationDropdown = document.querySelector(".notification-dropdown");

notificationButton.addEventListener("click", () => {
  notificationDropdown.classList.toggle("active");
});

// Function to add a new notification
function addNotification(message) {
  const notificationList = document.getElementById("notification-list");
  const notificationItem = document.createElement("li");
  notificationItem.classList.add("notification-item");
  notificationItem.innerText = message;
  notificationList.appendChild(notificationItem);
}

// // Example: Add a notification when the page loads
// document.addEventListener("DOMContentLoaded", () => {
//   addNotification("New message received");
// });




document.addEventListener("DOMContentLoaded", function () {
  const openModalBtn = document.getElementById("openModalBtn");
  const modal = document.getElementById("myModal");
  const closeBtn = document.querySelector(".close");

  openModalBtn.addEventListener("click", function () {
    modal.style.display = "block";
  });

  closeBtn.addEventListener("click", function () {
    modal.style.display = "none";
  });

  window.addEventListener("click", function (event) {
    if (event.target === modal) {
      modal.style.display = "none";
    }
  });
});








