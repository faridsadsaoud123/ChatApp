const form = document.querySelector(".chat form");
const submitBtn = document.querySelector(".chat .subBtn");
const inputField = document.querySelector(".message");
const chatBox = document.querySelector(".chatbox");
form.addEventListener('submit',(e)=>{
    e.preventDefault();
});

submitBtn.addEventListener('click',()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/chat.php",true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status===200){
                inputField.value="";
                
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);

});

setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/get-chat.php",true)
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data = xhr.response;
                chatBox.innerHTML=data;
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
},500);