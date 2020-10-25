document.getElementById("btn").onclick = function ()
{

    var username = document.getElementById("username");
    var username1 = username.value.trim();

    if (username1 === '')
    {
        username.parentElement.className = 'form-control error';

    }
    else
    {
        username.parentElement.className = 'form-control success';
    };


    var email = document.getElementById("email");
    var emailValue = email.value.trim();

    if (emailValue === '')
    {
        email.parentElement.className = 'form-control error';
        email.parentElement.querySelector('small').innerHTML = 'Введите email';
    }
    else if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(emailValue))
    {
        email.parentElement.className = 'form-control error';
        email.parentElement.querySelector('small').innerHTML = 'Неправильный email';
    }
    else
    {
        email.parentElement.className = 'form-control success';
    };


    var password = document.getElementById("password");
    var passwordValue = password.value.trim();

    if( passwordValue === '')
    {
        password.parentElement.className = 'form-control error';
    }
    else
    {
        password.parentElement.className = 'form-control success';
    };


    var password2 = document.getElementById("password2");
    var password2Value = password2.value.trim();

    if(password2Value === '')
    {
        password2.parentElement.className = 'form-control error';
        password2.parentElement.querySelector('small').innerHTML = 'Введите пароль';

    }
    else if(passwordValue != password2Value)
    {
        password2.parentElement.className = 'form-control error';
        password2.parentElement.querySelector('small').innerHTML = 'Пароли не совпадают';
    }
    else
    {
        password2.parentElement.className = 'form-control success';
    };


};




