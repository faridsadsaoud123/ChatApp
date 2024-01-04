let signinBtn = document.querySelector('.signinbtn');
let signupBtn = document.querySelector('.signupbtn');
let body = document.querySelector('body');

signupBtn.addEventListener('click',()=>{
    body.classList.add('slide');
});
signinBtn.addEventListener('click',()=>{
    body.classList.remove('slide');
});
