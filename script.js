
document.addEventListener("DOMContentLoaded", function() {
    const signUpButton = document.getElementById("signUpButton");
    const signInButton = document.getElementById("signInButton");
    const signUpContainer = document.getElementById("signupContainer");
    const signInContainer = document.getElementById("signinContainer");

    // Show the Sign-In container and hide the Sign-Up container
    signInButton.addEventListener("click", function() {
        signUpContainer.style.display = "none";
        signInContainer.style.display = "block";
    });

    // Show the Sign-Up container and hide the Sign-In container
    signUpButton.addEventListener("click", function() {
        signInContainer.style.display = "none";
        signUpContainer.style.display = "block";
    });
});

    function validateForm() {
        let firstName = document.getElementById('fName').value;
        let lastName = document.getElementById('lName').value;
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;
        let errorMessage = document.getElementById('email-error');

        if (firstName === '' || lastName === '' || email === '' || password === '') {
            errorMessage.innerText = "All fields are required.";
            return false; 
        }

        const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        if (!emailPattern.test(email)) {
            errorMessage.innerText = "Please enter a valid email.";
            return false; 
        }
        
        return true;
    }

    function displayLoader() {
        document.querySelector('.loader').style.display = 'inline-block';
        document.querySelector('.changeText').innerText = 'Please wait...'; 
    
        setTimeout(function() {
            document.querySelector('.loader').style.display = 'none'; 
            document.querySelector('.changeText').innerText = 'Try again'; 
        }, 8000);
    }

    


