const listUtilisateurs = document.querySelector(".list_users");
const searchButton  = document.querySelector(".search button");
const searchInput = document.querySelector(".search input");
const incMsg =document.querySelector(".inc_msg");
const chat = document.querySelector('.chat');
const noChat = document.querySelector('.no');
const rec = document.querySelector('.out');
searchInput.addEventListener('keyup',()=>{
    let searchContent = searchInput.value;
    if(searchContent){
        let xhr = new XMLHttpRequest();
        searchInput.classList.add("active");
        xhr.open("POST","php/search.php",true)
        xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status===200){
                    let data = xhr.response;
                    listUtilisateurs.innerHTML=data;

                }else{
                    console.log("object");
                }
            }
        }
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.send("searchContent=" + searchContent);
    }
    else{
        searchInput.classList.remove("active");
    }
});

setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET","php/users.php",true)
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data = xhr.response;

                if(!searchInput.classList.contains("active")){
                    listUtilisateurs.innerHTML=data;
                }
            }
        }
    }
    xhr.send();
},500);
let discussionLinks = document.querySelectorAll('.list_users a');

listUtilisateurs.addEventListener('click',(e)=>{
    e.preventDefault();
    let userid="";
    if(e.target.tagName==='A'){
        noChat.classList.add('hidden');
        chat.classList.remove('hidden');
        userid = e.target.getAttribute("data-userid");
        incMsg.value=userid;
    }


    var xhr = new XMLHttpRequest();

       xhr.open("POST", "php/receiver.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data = xhr.response;
                console.log(data);
                document.querySelector(".receiver span").textContent=data;
            }
        }
    }


    xhr.send("userid="+userid);
    });
