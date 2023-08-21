const toggleButton = document.getElementById('toggleButton');
const doggelSection = document.querySelector('.hidden');

function handleButtonClick() {
    doggelSection.classList.toggle('doggel');
}

toggleButton.addEventListener('click', handleButtonClick);