



document.addEventListener('DOMContentLoaded', () => {
    // Select all toggle icons
    const toggleIcons = document.querySelectorAll('.toggle-icon');
    
    toggleIcons.forEach(icon => {
        icon.addEventListener('click', (e) => {
            // Get the corresponding input (previous element sibling)
            const input = e.target.previousElementSibling;

            // Toggle the input type
            if (input.type === 'password') {
                input.type = 'text';
                e.target.classList.remove('fa-eye-slash');
                e.target.classList.add('fa-eye');
            } else {
                input.type = 'password';
                e.target.classList.remove('fa-eye');
                e.target.classList.add('fa-eye-slash');
            }
        });
    });
});
