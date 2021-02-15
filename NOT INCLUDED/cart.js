


// create a function to loop throgh the favoritArray and display
// const localStorageJs.favoritArray = [];
//     for(let i = 0; i<localStorageJs.favoritArray.length; i++){
//         console.log(localStorageJs.favoritArray[i]);
// }
// document.getElementById("demo").innerHTML=localStorageJs.favoritArray.length;




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

    







 // validation of disount code recived when new user
// function validationDiscount() {
//     var valid= true;
//     if($("#discountCode").val() === "") {
//         valid = false;
//      }
//      if(valid == false) {
//          $('#errorMessage_code').text("Discount Coupon Required");
//      }
//      return valid;
// }

