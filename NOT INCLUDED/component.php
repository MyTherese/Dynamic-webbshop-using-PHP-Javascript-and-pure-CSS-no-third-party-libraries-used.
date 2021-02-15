<?php
 
function component($image, $title, $description, $price, $id){
    $element = "
    
    <div class='main-card'>

                <form action='product.php?action=add&id=$id' method='post'>
                 
                      
                        <div class=\"card-body\">
                            <img src='$image' alt='image' class='img-card'>
                            <h5 class=\"card-title\">$title</h5>
                            <h2 class=\"card-title\">$description</h2>Sek
                            <h2 class=\"card-title\">$price</h2>

                            <input type='text' name='quantity' class='form-control' value='1'/>

                            <input type= 'hidden' name= 'title' value=$title/>
                        
                            <input type='submit' class='btn btn-warning my-3' name='add' value='Add to Cart'>
                        </div>
    
                </form>
            </div>
    ";
    echo $element;
}

function cartElement($title, $price, $image, $id){
    $element = "
    
    <form action=\"cart.php?action=remove&id=$id\" method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                            <img src='$image' alt='Images' class='img-card'>
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\">$title</h5>
                                <small class=\"text-secondary\">Seller: dailytuition</small>
                                <h5 class=\"pt-2\">$price</h5>
                                <button type=\"submit\" class=\"btn btn-warning\">Save for Later</button>
                                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                            </div>
                            
                            <div class=\"col-md-3 py-5\">
                                <div>
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-minus\"></i></button>
                                    <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-plus\"></i></button>


                                </div>
                            </div>
                        </div>
                    </div>
                </form>
    
    ";
    echo  $element;
}

// TRASH
