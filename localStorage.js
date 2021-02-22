// home.php
    const favoritArray = [];

    function saveFavorit(clicked_id) {

        var heartFavorit = document.getElementById(clicked_id);

        if(heartFavorit.classList.contains('fa-heart-o')) {
            heartFavorit.classList.remove('fa-heart-o');
            heartFavorit.classList.add('fa-heart');
            
            favoritArray.push(clicked_id);
        }else{
            heartFavorit.classList.remove('fa-heart');
            heartFavorit.classList.add('fa-heart-o');

                var index = favoritArray.indexOf(clicked_id);
                favoritArray.splice(index, 1);

                localStorage.removeItem("yourFavorits");

            }
            localStorage.setItem("yourFavorits", JSON.stringify(favoritArray));
    }


// cart.js
    function getSome(){

        container =  document.getElementById("oFavoritList");
        var dataImage = JSON.parse(localStorage.getItem('yourFavorits') );

        dataImage.forEach(function(image) {    
            var img = document.createElement('img'); 
            img.src = image;                       
            document.body.appendChild(img);         
        });
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