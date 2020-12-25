<div id="staplesbmincart">
           <form method="get" class="" action="{{route('checkout')}}" target="">
              <a type="button" class="sbmincart-closer" id="close-cart">×</a>    
              <ul id=ul-carts>
                <?php
                    foreach(Cart::content() as $cart) {
                ?>

                 <li id="row-id{{$cart->rowId}}" class="sbmincart-item">
                    <div class="sbmincart-details-img">
                        <img src="{{asset($cart->options->image)}}" class="img-fluid" alt="">
                    </div>
                    <div class="sbmincart-details-name">
                       <a class="sbmincart-name" href="">{{$cart->name}}</a>                
                       <ul class="sbmincart-attributes">                                                                           
                        </ul>
                    </div>
                    <div class="sbmincart-details-quantity">
                        <input class="sbmincart-quantity" disabled="" data-sbmincart-idx="0" name="{{$cart->qty}}" type="text" pattern="[0-9]*" value="{{$cart->qty}}" autocomplete="off">            
                    </div>
                    <div class="sbmincart-details-remove">
                                    <button  type="button" class="sbmincart-remove" data-rowid="{{$cart->rowId}}" data-sbmincart-idx="0">×</button>
                    </div>
                    <div class="sbmincart-details-price">
                                    <span class="sbmincart-price">{{ number_format($cart->qty * $cart->price, 0, "", ".")}} VND</span>            
                    </div>
                 </li>
             <?php 
                }
              
             ?>
              </ul>
              <div class="sbmincart-footer">
                <?php
                     $total = str_replace( ',' , '.', substr(Cart::subtotal(), 0, strrpos(Cart::subtotal(), '.')));
                ?>
                 <div class="sbmincart-subtotal"> Tổng tiền: <span id="total-cart">{{ $total }} VND</span></div>
                 <button class="sbmincart-submit" type="submit" data-sbmincart-alt="undefined">Thanh toán</button>            
              </div>
           </form>
        </div>