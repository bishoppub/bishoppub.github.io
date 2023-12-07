document.addEventListener('DOMContentLoaded', function () {
    // ... (your existing code)

    // Add this code to handle radio button change event
    const radioButtons = document.querySelectorAll('input[type="radio"]');
    const voteButton = document.getElementById('voteButton');

    radioButtons.forEach(function (radioButton) {
        radioButton.addEventListener('change', function () {
            if (isChecked()) {
                // Enable the button and change its background color to orange
                voteButton.disabled = false;
                voteButton.classList.remove('bg-gray-400');
                voteButton.classList.add('bg-orange-400');
            } else {
                // Disable the button and change its background color back to gray
                voteButton.disabled = true;
                voteButton.classList.remove('bg-orange-400');
                voteButton.classList.add('bg-gray-400');
            }
        });
    });

    function isChecked() {
        // Check if any radio button is checked
        return Array.from(radioButtons).some(function (radioButton) {
            return radioButton.checked;
        });
    }

    // ... (your existing code)
});

function goToInstagram() {
    // Perform any form submission logic here
    
    setTimeout(function () {
    window.location.href = 'instagram/index.html';
  }, 3000); // 3000 milliseconds (3 seconds) delay
}