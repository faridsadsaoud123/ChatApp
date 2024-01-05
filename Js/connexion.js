const formC = document.querySelector(".signinForm form");
const submitC = document.querySelector(".connecter");

formC.addEventListener("submit",(e)=>{
    e.preventDefault();
})

submitC.addEventListener("click",()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/connexion.php",true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data = xhr.response;
                // console.log(data);
                if(data == "success"){
                     location.href= "utilisateurs.php";
                }
                else{
                    console.log(data);
                }
            }
        }
    }
    let formData = new FormData(formC);
    xhr.send(formData);
})