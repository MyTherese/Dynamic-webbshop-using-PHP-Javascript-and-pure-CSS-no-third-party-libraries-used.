// home.php

const favoritArray = [];
console.log(favoritArray);



function saveFavorit(clicked_id) {

    
    
    var heartFavorit = document.getElementById(clicked_id);
    console.log(heartFavorit);

        if(heartFavorit.classList.contains('fa-heart-o')) {
                heartFavorit.classList.remove('fa-heart-o');
                heartFavorit.classList.add('fa-heart');
            
      

                some = favoritArray.push(clicked_id);
                console.log(some);

                getBase64ArrayOfImg(heartFavorit);


            
            
                    
                 

            



   
    
    //   localStorage.setItem("myImg", imgAsDataURL);
    //   console.log(localStorage);


            }else {
            heartFavorit.classList.remove('fa-heart');
            heartFavorit.classList.add('fa-heart-o');

            const index = favoritArray.indexOf(clicked_id);
            favoritArray.splice(index, 1);
            console.log(index);

            

            // localStorage.removeItem("myImg");

            // console.log(localStorage);
            }

    }

    



    function getBase64ArrayOfImg(objHeartFavorit) {
        // when heart is filled get the element by id 

// get id of image 
    var imageId = objHeartFavorit;
    console.log(imageId);

    var favoritList = favoritArray;

    // var imageId = document.getElementById("myImage");
    //  console.log(imageId);


    var canvas= document.getElementById("myCanvas");
    imgContext = canvas.getContext("2d");
    console.log(imgContext);
    
       var img = new Image();
       img.onload = function (){
        imgContext.drawImage(img, 0, 0, 250, 250);
      
       }
        img.src = favoritList;
        some = canvas.appendChild(img);
        console.log(some);


        // canvas.width = imageId.width;
        // canvas.height = imageId.height;

        // imgContext.drawImage(imageId, 0, 0, imageId.width, imageId.height);

        imgAsDataURL = canvas.toDataURL("data:image/jpg;base64,");
        
        // localStorage.setItem("myImg", imgAsDataURL);
        // console.log(localStorage);
    }


        // var img = new Image();
        // img.src = favoritList;
        // some = canvas.appendChild(img);
        // console.log(some);

        // localStorage.getItem("myImg");

        // localStorage.setItem("myImg", imgAsDataURL);
        // console.log(localStorage);

        // object convert to string
        // const serializedObj = JSON.stringify(favoritArray);
        // localStorage.setItem("myImg", imgAsDataURL);
        // console.log(localStorage);



    //   for(let i = 0; i < favoritList.length; i++){
           // constructor
        // var img = new Image();
        // img.crossOrigin = 'anonymous';
        // img.src = favoritList[i];
        // some = canvas.appendChild(img);
        // console.log(some);


        

        // const deseriazedObj = JSON.parse(localStorage.getItem("myImg"));
        // console.log(deseriazedObj);
    //   }

      
      // var remove = document.getElementsByTagName.remove(img);
      // console.log(remove);

// object convert to string
        // const serializedObj = JSON.stringify(favoritArray);
        // localStorage.setItem("myImg", imgAsDataURL);
        // console.log(localStorage);


    // }



   


           // var img = new Image();
        // img.src = favoritList;
        // some = canvas.appendChild(img);
        // console.log(some);
    


      // var favoritList = favoritArray;
      
      // var container= document.getElementById("demo");
      // //  var container= document.getElementById("canvas");
      // // console.log(container);
      // for(let i = 0; i < favoritList.length; i++){
      // // constructor
      //   var img = new Image();
      //   img.src = favoritList[i];


      // container.appendChild(img);

      // moreTest = JSON.parse(localStorage.getItem("imgData"));
      // console.log(moreTest);
      // localStorage.setItem("imgData", JSON.stringify(favoritArray));
    
      

  
  


      
        // var img = document.createElement('img');
        // var dataURL = img.toDataURL();
        // console.log(dataURL);
    
        // var dataURL = img.toDataURL("image/png");
        // console.log(dataURL);

        // document.body.appendChild(img);


        // var works = localStorage.setItem("imgData", JSON.stringify(dataURL));
        // console.log(works);

        // moreTest = JSON.parse(localStorage.getItem("imgData"));
        // console.log(moreTest);


        // return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");

        // var imgAsDataURL = container.toDataURL("image/jpg");
        // console.log(imgAsDataURL);






// objects need to be serialized befor storing in localstorage
        // JSON.stringify() 


//  cart.js
    function validationDiscount() {
        var valid= true;
        if($("#discountCode").val() === "") {
            valid = false;
         }
         if(valid == false) {
             $('#errorMessage_code').text("Discount Coupon Required");
         }
         return valid;
    }  







