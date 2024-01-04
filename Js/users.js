const listUtilisateurs = document.querySelector(".list_users");
const searchButton  = document.querySelector(".search button");
const searchInput = document.querySelector(".search input");
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
                    // console.log(data);
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
})
setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET","php/users.php",true)
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data = xhr.response;
                console.log(searchInput);
                if(!searchInput.classList.contains("active")){

                    listUtilisateurs.innerHTML=data;
                }
                // console.log(data);
            }else{
                // console.log("object");
            }
        }
        
    }

    xhr.send();
},500);