let create_btn=document.getElementById('create');
create_btn.addEventListener('click',()=>{
    let heading=document.querySelector('.post .input-heading').value;
    let text=document.querySelector('.post .text').value;
    let file = document.getElementById("choose-profile").files[0];
    let formdata=file;
    let image_path;
    if(!file){
        file='';
    }
    else{
        let form_data=new FormData();
        form_data.append("file",formdata);
        let xhr=new XMLHttpRequest();
    xhr.open('POST','upload_image.php',true);

    xhr.onload=function(){
        if(this.status==200){
            console.log(this.responseText);
        }
    }
    xhr.send(form_data);
        image_path='./images/'+file.name;
    }
    let xhr=new XMLHttpRequest();
        xhr.open('POST','createpost.php?heading='+heading+'&text='+text+'&image='+image_path,true);

        xhr.onload=function(){
            if(this.status==200){
                console.log(this.responseText);
            }
        }
        xhr.send();
        window.location.replace("http://localhost/blog_app_php_ajax/index.php");
        location.reload();
});
