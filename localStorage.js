// home.php

const favoritArray = [];
console.log(favoritArray);



function saveFavorit(clicked_id) {
    var heartFavorit = document.getElementById(clicked_id);
    console.log(heartFavorit);

    // var test = document.querySelector("img");
    // console.log(test);

        if(heartFavorit.classList.contains('fa-heart-o')) {
                heartFavorit.classList.remove('fa-heart-o');
                heartFavorit.classList.add('fa-heart');
            
                some = favoritArray.push(clicked_id);
                console.log(some);

            }else {
            heartFavorit.classList.remove('fa-heart');
            heartFavorit.classList.add('fa-heart-o');

            const index = favoritArray.indexOf(clicked_id);
            favoritArray.splice(index, 1);
            console.log(index);

        
            }

    }


    function getBase64ArrayOfImg() {
    var favoritList = favoritArray;
    console.log(favoritList);

    var canvas= document.getElementById("myCanvas");
    imgContext = canvas.getContext("2d");

    var xb=0, yb=0;

    var imgs = [];   

    for(var i = 0; i < favoritList.length; i++){
        imgs[i] = new Image();
        imgs[i].src =favoritList[i];

        imgs[i].onload = function(){
            console.log(imgs[i]);
            something = imgContext.drawImage(this, xb, yb);
            xb += 200;
            yb += 0;

            // this works
            imgAsDataURL = canvas.toDataURL("data:image/jpg;base64,");
            console.log(imgAsDataURL);

            // this works
            localStorage.setItem("myImg", imgAsDataURL);
            console.log(localStorage);
            
            // this works 
            var dataImage = localStorage.getItem("myImg");
            console.log(dataImage);
            

            
        }
    }
   
    
    }


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







