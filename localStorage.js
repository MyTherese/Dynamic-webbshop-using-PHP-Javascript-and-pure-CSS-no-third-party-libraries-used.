// home.php
const favoritArray = [];
// console.log(favoritArray);

function saveFavorit(clicked_id) {

    const heartFavorit = document.getElementById(clicked_id);
    const index = favoritArray.indexOf(clicked_id);

        if(heartFavorit.classList.contains('fa-heart-o')) {
                heartFavorit.classList.remove('fa-heart-o');
                heartFavorit.classList.add('fa-heart');

                const something = favoritArray.push(clicked_id);
                console.log(something);
                // newArray
                // localStorage.setItem("imgData", JSON.stringify(newArray));
                
            }else {
            heartFavorit.classList.remove('fa-heart');
            heartFavorit.classList.add('fa-heart-o');
            
            favoritArray.splice(index, 1);
           
            const newArray = JSON.parse(localStorage.getItem("imgData"));
            console.log(newArray);
            }

            localStorage.setItem("imgData", JSON.stringify(favoritArray));
           
    }


// 
// display localstorage favoritList in cart.js
    function displayFavoritList() {
        // works
        let testing = favoritArray;
        moretest = JSON.parse(localStorage.getItem("imgData"));
        console.log(moretest);


        
        let text = "";
        for(let i = 0; i < moretest.length; i++){
        text += moretest[i]+ "<br>";
        }
     
        let working = document.getElementById("demo").innerHTML = text;
        console.log(working);
        localStorage.setItem("imgData", JSON.stringify(testing));
       
        }
   

        // create a canvas 
        // let ctx = document.getElementById('myCanvas').getContext('2d');

        // for(let i = 0; i < favoritArray.length; i++){
        //     let images = favoritArray[i];
        //     console.log(images);
          
        //     ctx.fillStyle = images.style;
        //     ctx.fillRect = (images.height, images.width, images.id);
          
//    let some = document.getElementById("demo").innerHTML = JSON.stringify(favoritArray);
//    console.log(some);

    // }



 

    

   
  
 
    
 

    
    

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






