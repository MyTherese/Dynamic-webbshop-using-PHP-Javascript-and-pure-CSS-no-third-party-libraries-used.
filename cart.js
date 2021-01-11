

function displayFavolist(){
    dataImage = document.getElementById('tableBanner');
    console.log(dataImage);
}









 // validation of disount code recived when new user
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
