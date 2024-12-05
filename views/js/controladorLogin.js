
const LOGIN_URL = '/controllers/controladorLogin.php';

const loginForm = document.getElementById('login-form');
const output = document.getElementById('output');  

loginForm.addEventListener('submit', async function (event) {
    event.preventDefault(); 

    const username = document.getElementById('txtusername').value.trim();
    const password = document.getElementById('txtpassword').value.trim();


    if (!username || !password) {
        output.textContent = 'Por favor, completa todos los campos.';
        return;
    }

    try {
        const response = await fetch(LOGIN_URL, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                txtusername: username,
                txtpassword: password
            })
        });

        const result = await response.json(); 

        if (result.success) {
            window.location.href = '/controllers/controladorDashboard.php';
        } else {

            output.textContent = result.message || 'Credenciales incorrectas. Inténtalo nuevamente.';
        }
    } catch (error) {
        console.error(error);
        output.textContent = 'Hubo un problema con las credenciales. Inténtalo nuevamente.';
    }
});
