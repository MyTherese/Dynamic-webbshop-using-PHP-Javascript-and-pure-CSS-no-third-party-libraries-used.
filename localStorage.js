// home.php

const favoritArray = [];
console.log(favoritArray);

function saveFavorit(clicked_id) {
 

    var heartFavorit = document.getElementById(clicked_id);
    console.log(clicked_id);

  
        if(heartFavorit.classList.contains('fa-heart-o')) {
                heartFavorit.classList.remove('fa-heart-o');
                heartFavorit.classList.add('fa-heart');
                
// consoles how many in array
                favoritArray.push(clicked_id);
              

            }else {
            heartFavorit.classList.remove('fa-heart');
            heartFavorit.classList.add('fa-heart-o');

            const index = favoritArray.indexOf(clicked_id);
            favoritArray.splice(index, 1);
            console.log(index);
            }
    }



    function displayArray() {

      var favoritList = favoritArray;
      var container= document.getElementById("demo");
   
      for(let i = 0; i < favoritList.length; i++){
           // constructor
        var img = new Image();
        img.src = favoritList[i];
        container.appendChild(img);

        const deseriazedObj = JSON.parse(localStorage.getItem("myImg"));
        console.log(deseriazedObj);
      }

      
      // var remove = document.getElementsByTagName.remove(img);
      // console.log(remove);

// object convert to string
        const serializedObj = JSON.stringify(favoritArray);
        localStorage.setItem("myImg", serializedObj);
        console.log(localStorage);


    }




    
    

    


    
   












    

      


















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







