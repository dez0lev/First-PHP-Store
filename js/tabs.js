const tabsBtn = document.querySelectorAll('.tab-btn');
const tabsItems = document.querySelectorAll('.tab-item');


tabsBtn.forEach(function(item) {
    item.addEventListener("click", function() {
        let currentBtn = item;
        let tabId = currentBtn.getAttribute("data-tab");
        let currentTab = document.querySelector(tabId);

        tabsBtn.forEach(function(item) {
            item.classList.remove('active');
        });

        tabsItems.forEach(function(item) {
            item.classList.remove('active');
        });

        currentBtn.classList.add('active');
        currentTab.classList.add('active');
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const editBtns = document.querySelectorAll('.editBtn');
    const editEmailForm = document.getElementById('editEmailForm');
    const editPasswordForm = document.getElementById('editPasswordForm');

    editBtns.forEach(function(btn) {
        btn.addEventListener("click", function() {
            if (btn.classList.contains('changepass')) {

                if (editPasswordForm.style.display === 'block') {
                    editPasswordForm.style.display = 'none';
                } else {
                    editPasswordForm.style.display = 'block';
                    editEmailForm.style.display = 'none'; 
                }
            } else {

                if (editEmailForm.style.display === 'block') {
                    editEmailForm.style.display = 'none';
                } else {
                    editEmailForm.style.display = 'block';
                    editPasswordForm.style.display = 'none'; 
                }
            }
        });
    });
});








