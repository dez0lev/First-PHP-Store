setTimeout(function() {
    var messages = document.querySelectorAll('.message');
    messages.forEach(function(message) {
        message.classList.add('fade-out');
        setTimeout(function() {
            message.remove();
        }, 500); 
    });
}, 4500);