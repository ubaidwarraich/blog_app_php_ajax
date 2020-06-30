const edit=document.querySelectorAll('.edit-btn');
// getting the id of the post edit and save it back in database through ajax request in php

edit.forEach(btn => {
    btn.addEventListener('click',()=>{
        let id_edit=btn.getAttribute('name').split('-').pop();
        let post_number='.post-'+id_edit;
        let heading=document.querySelector(post_number+' .heading h1').innerText;
        let text=document.querySelector(post_number+' .text').innerText;
        let image=document.querySelector(post_number+' .body img').src.split('/');
        image='./'+image[4]+'/'+image[5];
        document.querySelector(post_number).innerHTML='';
        // console.log(heading);
        document.querySelector(post_number).innerHTML=`
        <div class="heading">
           <input type="text" class="input-heading"value="${heading}" style="font-size:18px;">
        </div>
        <div class="body">
                <textarea class="text" rows="3.5" cols="110">
                   ${text}
                </textarea>
                <div class="image">
                   <img src="${image}" height="430" width="300" alt="">
                   <input type="file" id="choose-profile">
                </div>
        </div>
        <button type="submit" class="edit-btn save-btn-${id_edit}">Save Changes</button>
        `;
         saveChanges(id_edit,post_number);   
    });
});


function saveChanges(id,post_number) {
    const btn_save=document.querySelector('.save-btn-'+id);
    btn_save.addEventListener('click',()=>{

        let heading=document.querySelector(post_number+' .input-heading').value;
        let text=document.querySelector(post_number+' .text').value;
        let file = document.getElementById("choose-profile").files[0];
        let formdata=file;
        if(!file){
            // console.log('no file');
            file=document.querySelector(post_number+' .body img').src.split('/');
            file='./'+file[4]+'/'+file[5];
        }
        else{
            let form_data=new FormData();
            form_data.append("file",formdata);
            // console.log(form_data);
            let xhr=new XMLHttpRequest();
        xhr.open('POST','upload_image.php',true);

        xhr.onload=function(){
            if(this.status==200){
                console.log(this.responseText);
            }
        }
        xhr.send(form_data);
            file='./images/'+file.name;
            let post_img=document.querySelector(post_number+' .body img');
            post_img.src=file;
        }
        let xhr=new XMLHttpRequest();
        xhr.open('POST','edit.php?id='+id+'&heading='+heading+'&text='+text+'&image='+file,true);

        xhr.onload=function(){
            if(this.status==200){
                console.log(this.responseText);
            }
        }
        xhr.send();
        document.querySelector(post_number).innerHTML=`
        <div class="post post-${post_number}">
                <div class="heading"><h1>${heading}</h1></div>
                <div class="body">
                    <div class="text"><p>${text}
                    </p></div>
                    <div class="image"><img src="${file}" height="400" width="300" alt=""></div>
                </div>
                <button type="submit" class="edit-btn" name="edit-btn">EDIT POST</button>
            </div>
        `;
        location.reload();
    })

}


// delete post ajax logic

const del_btns=document.querySelectorAll('.delete-btn');

del_btns.forEach(btn => {
    btn.addEventListener('click',()=>{
        let id_del=btn.getAttribute('name').split('-').pop();
        let xhr=new XMLHttpRequest();
        xhr.open('POST','delete.php?id='+id_del,true);
        
        xhr.onload=function(){
            if(this.status==200){
                console.log(this.responseText);
            }
        }
        xhr.send();
        location.reload();
    })
});

