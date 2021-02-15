
function validate() {
    var valid= true;
    if($("#discountCode").val() === "") {
        valid = false;
    }

    if(valid == false) {
        $('#error-msg-span').text("Discount Coupon Required");
    }
    return valid;
}
