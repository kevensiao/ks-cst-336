function printPost(contact) {
    var contactList = document.getElementById("ulist");
    // <li>
    var list = document.createElement("li");
    contactList.appendChild(list);
    //     <div class ="postimg>">
    var postimg = document.createElement("div");
    postimg.setAttribute("class", "postimg");
    list.appendChild(postimg);
    //         <div class="picture">
    var picture= document.createElement("div");
    picture.setAttribute("class", "picture");
    postimg.appendChild(picture);
    //             <img class=" mainPic" src="https://edu.showdeo.com/edu/csumb/scd/content/javascript/projects/instagram/assets/parrot-smash.jpg" alt="" > 
    var pictureImg = document.createElement("img");
    pictureImg.setAttribute("class", "mainPic");
    pictureImg.setAttribute("src", contact.photo );
    picture.appendChild(pictureImg);
    //         </div>
    
    //         <div class="likes">
    var likes = document.createElement("div");
    likes.setAttribute("class", "likes");
    list.appendChild(likes);
    //             <img src="img/heartIcon.png"  class="logo" >
    var img1 = document.createElement("img");
    img1.setAttribute("class", "logo");
    img1.setAttribute("src", "img/heartIcon.png");
    likes.appendChild(img1);
    //             <span class="pseudo">1275 likes</span>
    var numlike = document.createElement("span");
    numlike.setAttribute("class", "pseudo");
    numlike.innerHTML = contact.likes;
    likes.appendChild(numlike);
    var a = document.createElement("span");
    a.innerHTML = " Likes" ;
    likes.appendChild(a);
    //         </div>
    
    //         <div class="upload">
    var upload = document.createElement("div");
    upload.setAttribute("class", "upload");
    list.appendChild(upload);
    //             <img src="img/commentIcon.png"  class="logo">
    var img2 = document.createElement("img");
    img2.setAttribute("class", "logo");
    img2.setAttribute("src", "img/commentIcon.png");
    upload.appendChild(img2);
    //             <span class="pseudo" >miekd</span>
    var name = document.createElement("span");
    name.setAttribute("class", "pseudo");
    name.innerHTML = contact.username;
    upload.appendChild(name);
    //             <span> Mr. manager</span>
    var nametxt = document.createElement("span");
    nametxt.innerHTML = contact.text;
    upload.appendChild(nametxt);
    //             
    //         </div>
    //         <br><br>
    
    
    
    // <p id="demo" onclick="myFunction()">Show comments ...</p>
    var button= document.createElement("p");
    button.setAttribute("onclick", "myFunction()");
    button.setAttribute("style", "color:gray");
    button.innerHTML="View all comments";
    list.appendChild(button);
    
    
    
    //         <div class="comments">
    var comments = document.createElement("div");
    comments.setAttribute("class", "comments");
    comments.setAttribute("id", "comments");
    comments.setAttribute("style", "display:none");
    list.appendChild(comments);
    
    
    for (var c in contact.comments) {
                var comment = contact.comments[c];
                            //             <span class="pseudo" >tommy</span>
                var username = document.createElement("span");
                username.setAttribute("class", "pseudo");
                username.innerHTML = comment.username;
                comments.appendChild(username);
                //             <span>@tommy you will NEVER retire! too many spenders in your camp!</span><br>
                var usernametxt = document.createElement("span");
                usernametxt.innerHTML = comment.text;
                comments.appendChild(usernametxt);
                var nameLineBreak = document.createElement("br");
                comments.appendChild(nameLineBreak);
                
            }
            var nameLineBreak = document.createElement("br");
            comments.appendChild(nameLineBreak);

    
}