const form = document.querySelector(".signupForm form");
const submit = document.querySelector(".inscrire");
// console.log(submit);
form.addEventListener("submit",(e)=>{
    e.preventDefault();
})

submit.addEventListener("click",()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/signup.php",true)
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data = xhr.response;
                if(data == "success"){
                     location.href= "utilisateurs.php";
                }
                else{
                    console.log(data);
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
})