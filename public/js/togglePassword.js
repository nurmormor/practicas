document.addEventListener('DOMContentLoaded', function () {
    const togglePasswordButton = document.getElementById('toggle-password');
    const passwordInput = document.getElementById('password');
    const eyeOpenIcon = document.getElementById('eye-open');
    const eyeClosedIcon = document.getElementById('eye-closed');

    togglePasswordButton.addEventListener('click', function () {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeOpenIcon.style.display = 'none'; // Oculta el ojo abierto
            eyeClosedIcon.style.display = 'block'; // Muestra el ojo cerrado
        } else {
            passwordInput.type = 'password';
            eyeOpenIcon.style.display = 'block'; // Muestra el ojo abierto
            eyeClosedIcon.style.display = 'none'; // Oculta el ojo cerrado
        }
    });
});
