var notifButton = document.getElementById("notif-icon");
var notifSection = document.getElementById("notification-tab");
var notifCloseBtn = document.getElementById("notif_close");
var notifCount = document.getElementById("notification-count");

notifButton.addEventListener("click",function() {
    notifSection.style.display = "flex";
    notifCount.style.display = "none";
    notifButton.classList.remove("notif-icon");

    fetch('fetch_notif.php')
    .then((response) => response.text())
        .then((data) => {
            document.getElementById("scrollable-notif").innerHTML = data;
            var innerDivs= document.querySelectorAll(".dyn-row-id");
            innerDivs.forEach(innerDiv => {
                innerDiv.classList.add('hide-user-id');  // Add the class to hide the elements
              });
        }).catch((error) => {
            console.log("Error fetching data: ", error);
        });
});
notifCloseBtn.addEventListener("click",function(){
    notifSection.style.display = "none";
});

function fetchNotificationCount() {
    fetch('fetch_notif_count.php')
      .then(response => response.text())
      .then(data => {
        const notificationCount = parseInt(data);
        notifCount.style.display = notificationCount > 0 ? "flex" : "none";
        notifButton.classList.toggle('notif-icon', notificationCount > 0);
        notifCount.innerHTML = notificationCount > 0 ? data : "";
      })
      .catch(error => {
        console.error('Error fetching notification count:', error);
      });
  }

// Call the fetchNotificationCount function initially to display the current count
fetchNotificationCount();

// Periodically check for new notifications and update the count every 5 seconds
setInterval(fetchNotificationCount, 5000);