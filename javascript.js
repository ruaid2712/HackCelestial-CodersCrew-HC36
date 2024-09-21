document.querySelectorAll('.details-btn').forEach(button => {
    button.addEventListener('click', function() {
        const projectItem = button.parentElement;
        const description = projectItem.querySelector('.project-description');
        
        if (description.classList.contains('hidden')) {
            description.classList.remove('hidden');
            button.textContent = "Hide Details";
        } else {
            description.classList.add('hidden');
            button.textContent = "View Details";
        }
    });
});
