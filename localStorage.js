
// export {favoritArray};


const favoritArray = [];

 const saveFavorit = (clicked_id) => {

    const heartFavorit = document.getElementById(clicked_id);
    const index = favoritArray.indexOf(clicked_id);

        if(heartFavorit.classList.contains('fa-heart-o')) {
                heartFavorit.classList.remove('fa-heart-o');
                heartFavorit.classList.add('fa-heart');

                let newArray = favoritArray.push(clicked_id);
                // newArray
                localStorage.setItem("imgData", JSON.stringify(newArray));
                
            }else {
            heartFavorit.classList.remove('fa-heart');
            heartFavorit.classList.add('fa-heart-o');
            
            const newArray = favoritArray.splice(index, 1);
            console.log(newArray);
            // const newArray = JSON.parse(localStorage.getItem("imgData"));
            // console.log(newArray);
            }
            localStorage.setItem("imgData", JSON.stringify(favoritArray));
            console.log(favoritArray);
    }
    
    

    // function getBase64Image(img){  

    //     const canvas = document.createElement("canvas");
    //     const ctx = canvas.getContext("2d");

    //     canvas.width = img.width;
    //     canvas.height = img.height;

    //     ctx.drawImage(img, 0, 0, img.width, img.height);

    //     const dataURL = canvas.toDataURL("image/jpg");
    //     console.log(dataURL);
    
    //     return dataURL.replace(/^data:image\/(png|jpg);base64,/,"");
    // }








