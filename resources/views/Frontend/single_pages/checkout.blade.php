@extends('Frontend.layouts.master')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

            <div class="breadcrumb-area bg-gray">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <ul>
                        <li>
                            <a href="/">Home</a>
                        </li>
                        <li class="active">Checkout </li>
                    </ul>
                </div>

                @php
                $contents=Cart::content();
            @endphp
            <div class="customer-zone mb-20">
              <p class="cart-page-title">Have a coupon? <a class="checkout-click3" href="#">Click here to enter your code</a></p>
              <div class="checkout-login-info3">
                  <form action="{{ route('apply.cuppon') }}" method="POST">
                      @csrf
                      <input type="text" placeholder="Coupon code" name="cupon">
                      <input type="submit" value="Apply Coupon">
                  </form>
              </div>
          </div>

{{-- orderslide --}}
<div  class="container overflow-hidden">
    <div class="multisteps-form  ">
      <div class="row">
        <div class="col-8 col-lg-8 mb-4 ml-auto mr-auto">
          <div class="multisteps-form__progress">
            <button style="color:#6F50A7" class="multisteps-form__progress-btn js-active" type="button" title="User Info">Address</button>
            <button style="color:#6F50A7" class="multisteps-form__progress-btn" type="button" title="Address">Order Info</button>
            <button style="color:#6F50A7" class="multisteps-form__progress-btn" type="button" title="Order Info">Payment</button>
            
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-8 col-lg-8 mb-4 ml-auto mr-auto">
          <form class="multisteps-form__form " action="{{ route('checkout.store') }}" method="POST">
            @csrf
            <div class="multisteps-form__panel shadow p-4 rounded bg-white js-active" data-animation="scaleIn">
              <h3 style="color:#6F50A7" class="multisteps-form__title"><i class="fas fa-user"></i> Personal Information</h3><hr>
              <div class="multisteps-form__content">
                <div class="form-row mt-4">
                  <div class="col-12 col-sm-6">
                    <input class="multisteps-form__input form-control" id="name" name="name"  type="text" placeholder="First Name" value="{{ @$users->name }}"/>
                 <strong><span id="ename" style="color:red;"></strong> 
                  </div>
                  <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                    <input id="lname" name="lname" class="multisteps-form__input form-control" type="text" placeholder="Last Name"/>
                  </div>
                </div>
                <div class="form-row mt-4">
                  <div class="col-12 col-sm-6">
                    <input class="multisteps-form__input form-control" type="text" name="email" id="email"  placeholder="Email" value="{{ @$users->email }}"/>
                  </div>
                  <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                    <input  class="multisteps-form__input form-control" type="number" id="phn" placeholder="phone no" name="phone"  value="{{ @$users->phone }}"/>
                    <strong><span id="ephn" style="color:red;"></strong> 
                  </div><br><br><br>
                  <h3 style="color:#6F50A7" > <i class="fas fa-shipping-fast"></i> Shipping Details</h3> <hr>
                </div>
                <div class="form-row mt-4">
                  <div class="col-12 col-sm-6">
                    <input  class="multisteps-form__input form-control"  placeholder="House number and street name" type="text" name="address"  id="add"  />
                    <strong><span id="eadd" style="color:red;"></strong> 
                  </div><br>
                  <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                    <input class="multisteps-form__input form-control" type="number" id="phone" placeholder="receiver phone no"  name="phone"  value="{{ @$users->phone }}"/>
                    <strong><span id="er" style="color:red;"></strong> <br>
                  </div><br>
                  <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                    <input  class="multisteps-form__input form-control" id="city" type="City" name="city"  value="{{ @$users->city }}" placeholder="city" />
                    <strong><span id="ec" style="color:red;"></strong> <br>
                  </div>
                </div>
                <div class="button-row d-flex mt-4">
                  <input style="width: 60px;background-color:#FF2F2F; color:white;" class="btn ml-auto js-btn-next" type="button" title="Next" value="Next">
                </div>
              </div>
            </div>

            <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
              <h3 style="color:#6F50A7" class="multisteps-form__title">Your order</h3>
              <div class="multisteps-form__content">
            
                    <div class="your-order-area">
                        <div class="your-order-wrap gray-bg-4">
                            <div class="your-order-info-wrap">
                                <div class="your-order-info">
                                    <ul>
                                        <li>Product <span>Total</span></li>
                                    </ul>
                                </div>
                                @if (Auth::user())
                                <div class="your-order-middle">

                                    @foreach ($showCart as $show)
                                    @if ($show['product']['promo_price'])
                                    <li> Product :{{ $show['product']['name'] }} <span> ({{ $show->qty }}x{{ $show['product']['promo_price'] }} )</span></li>
                                    @else
                                    <li> Product :{{ $show['product']['name'] }} <span> ({{ $show->qty }}x{{ $show['product']['price'] }} )</span></li>
                                    @endif


                                    @endforeach
                                </div>
                                @php
                                $subammount=0;
                                    foreach ($showCart as $show) {
                                        if($show->product->promo_price){
                                            $subtotal = $show->product->promo_price * $show->qty;
                                        }
                                        else  
                                            $subtotal = $show->product->price * $show->qty;
                                        $subammount+=$subtotal;
                                    }
                                @endphp
                                <div class="your-order-info order-subtotal">
                                    <ul>
                                        <li>Subtotal <span> {{ $subammount }} tk</span></li>
                                    </ul>
                                </div>

                                <div class="your-order-info order-total">
                                    @if(!empty($showCart['0']->shippingMethod))
                                        @if (Session::has('cartcupon-'.auth()->id()))
                                            <ul>
                                                <li>Total <span>{{ ($subammount + $showCart['0']->shippingMethod->cost) - Session::get('cartcupon-'.auth()->id())[0]}} tk </span></li>
                                            </ul>
                                        @else
                                            <ul>
                                                <li>Total <span>{{ $subammount + $showCart['0']->shippingMethod->cost}} tk </span></li>
                                            </ul>
                                        @endif
                                    @else
                                      @if (Session::has('cartcupon-'.auth()->id()))
                                          <ul>
                                              <li>Total <span>{{ ($subammount) - Session::get('cartcupon-'.auth()->id())[0]}} tk </span></li>
                                          </ul>
                                      @else
                                          <ul>
                                              <li>Total <span>{{ $subammount}} tk </span></li>
                                          </ul>
                                      @endif
                                    @endif

                                </div>
                                @else
                                <div class="your-order-middle">
                                    @foreach ($contents as $content)
                                        <li> Product :{{ $content->name }} <span> ({{ $content->qty }}x{{ $content->price }} )</span></li>
                                    @endforeach
                                    <div class="your-order-info order-subtotal">
                                         <ul>
                                            <li>Subtotal <span> {{ Cart::subtotal() }} tk</span></li>
                                        </ul>
                                    </div>

                                    <div class="your-order-info order-total">
                                        <ul>
                                            {{--  @php
                                                (float)$sum=Cart::subtotal();
                                            @endphp  --}}

                                            <li>Total <span>{{ Cart::subtotal() }} tk </span></li>
                                        </ul>
                                    </div>

                                </div>
                                @endif


                            </div>
                    
                </div>
                        
                 
            
                </div>
                <div class="button-row d-flex mt-4">
                  <button style="background-color:#FF2F2F; color:white;" class="btn  js-btn-prev" type="button" title="Prev">Prev</button>
                  <input style="width: 60px;background-color:#FF2F2F; color:white;" size="4" class="btn ml-auto js-btn-next" type="button" title="Next" value="Next">
                </div>
              </div>
            </div>

            <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">             
              <h3 style="color:#6F50A7">Payment Info</h3> <hr>
              <div class="form-check">
                <input class="form-check-input cash" id="r" type="radio"style="left: 9px;
                width: 15px;
                height: 15px;
                border: solid white;
                border-width: 0 10px 10px 0;
                -webkit-transform: rotate(45deg);
                -ms-transform: rotate(45deg);
                transform: rotate(45deg);
                " name="payment" value="handcash" id="flexRadioDefault1" checked>
                <label class="form-check-label" for="flexRadioDefault1">
                 Cash on delivery                
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input  radio_bk"  type="radio" style="left: 9px;
                width: 15px;
                height: 15px;
                border: solid white;
                border-width: 0 10px 10px 0;
                -webkit-transform: rotate(45deg);
                -ms-transform: rotate(45deg);
                transform: rotate(45deg);
                " name="payment" value="Bkash" id="flexRadioDefault2">
                <label class="form-check-label" for="flexRadioDefault2">
                  Bkash Payment
                  <div>
                <p id="bn">Payment Number<span class="text-danger"> 01546728736</span> Total Amount <strong>{{ Cart::subtotal() }}</strong></p>
              <div id="a"></div>
                </label>

                <input class="form-check-input  radio_rk"  type="radio" style="left: 9px;
                width: 15px;
                height: 15px;
                border: solid white;
                border-width: 0 10px 10px 0;
                -webkit-transform: rotate(45deg);
                -ms-transform: rotate(45deg);
                transform: rotate(45deg);
                " name="payment" value="Rocket" id="flexRadioDefault2">
                <label class="form-check-label" for="flexRadioDefault2">
                  Rocket Payment
                  <div>
                <p id="rn">Payment Number<span class="text-danger"> 01546728736</span> Total Amount <strong>{{ Cart::subtotal() }}</strong></p>
              <div id="ro"></div>
                </label>

                <input class="form-check-input  radio_nk"  type="radio" style="left: 9px;
                width: 15px;
                height: 15px;
                border: solid white;
                border-width: 0 10px 10px 0;
                -webkit-transform: rotate(45deg);
                -ms-transform: rotate(45deg);
                transform: rotate(45deg);
                " name="payment" value="Nagad" id="flexRadioDefault2">
                <label class="form-check-label" for="flexRadioDefault2">
                  Nagad Payment
                  <div>
                <p id="na">Payment Number<span class="text-danger"> 01546728736</span> Total Amount <strong>{{ Cart::subtotal() }}</strong></p>
              <div id="n"></div>
                </label>
 </div>
              </div>
            </div>
          </div>

           
              <div class="button-row d-flex mt-2">
                <button style="background-color:#FF2F2F; color:white;" class="btn  js-btn-prev" type="button" title="Prev">Prev</button>
                <button style="background-color:#FF2F2F; color:white;"   class="btn  ml-auto" type="submit" title="Send">Confirm Order</button>
              </div>                
            </div>        
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
</div>
<script>

 $('#bn').hide();
 $('#rn').hide();
 $('#na').hide();



$('.radio_bk').on("change", function() {
$('#bn').show();
$('#br').remove();
$('#tr').remove();
$('#rn').hide();
$('#nagad_num').remove();
$('#nagadt').remove();
$('#na').hide();
$('#a').append(`<input id="b" placeholder="Enter Bkash Number" class="multisteps-form__input form-control" name="bkash_mobile" type="number" required>
<input placeholder="enter transaction id" id="t" class="mt-2 multisteps-form__input form-control" name="transaction" type="text" required>`)
});

$('.radio_rk').on("change", function() {
$('#rn').show();
$('#b').remove();
$('#t').remove();
$('#bn').hide();
$('#nagad_num').remove();
$('#nagadt').remove();
$('#na').hide();
$('#ro').append(`<input id="br" placeholder="enter rocket number" class="multisteps-form__input form-control" name="bkash_mobile" type="number" required>
<input placeholder="enter transaction id" id="tr" class="mt-2 multisteps-form__input form-control " name="transaction" type="text" required>`)
});

$('.radio_nk').on("change", function() {
$('#na').show();
$('#b').remove();
$('#t').remove();
$('#bn').hide();
$('#br').remove();
$('#tr').remove();
$('#rn').hide();

$('#n').append(`<input id="nagad_num" placeholder="enter nagad number" class="multisteps-form__input form-control" name="bkash_mobile" type="number" required>
<input placeholder="enter transaction id" id="nagadt" class="mt-2 multisteps-form__input form-control " name="transaction" type="text" required>`)
});


$('.cash').on("change", function() {
$('#b').remove();
$('#t').remove();
$('#bn').hide();
$('#br').remove();
$('#tr').remove();
$('#rn').hide();
$('#nagad_num').remove();
$('#nagadt').remove();
$('#na').hide();
});






const DOMstrings = {
  
  stepsBtnClass: 'multisteps-form__progress-btn',
  stepsBtns: document.querySelectorAll(`.multisteps-form__progress-btn`),
  stepsBar: document.querySelector('.multisteps-form__progress'),
  stepsForm: document.querySelector('.multisteps-form__form'),
  stepsFormTextareas: document.querySelectorAll('.multisteps-form__textarea'),
  stepFormPanelClass: 'multisteps-form__panel',
  stepFormPanels: document.querySelectorAll('.multisteps-form__panel'),
  stepPrevBtnClass: 'js-btn-prev',
  stepNextBtnClass: 'js-btn-next' };


const removeClasses = (elemSet, className) => {

  elemSet.forEach(elem => {

    elem.classList.remove(className);

  });

};

const findParent = (elem, parentClass) => {

  let currentNode = elem;

  while (!currentNode.classList.contains(parentClass)) {
    currentNode = currentNode.parentNode;
  }

  return currentNode;

};

const getActiveStep = elem => {
  return Array.from(DOMstrings.stepsBtns).indexOf(elem);
};

const setActiveStep = activeStepNum => {

  removeClasses(DOMstrings.stepsBtns, 'js-active');

  DOMstrings.stepsBtns.forEach((elem, index) => {

    if (index <= activeStepNum) {
      elem.classList.add('js-active');
    }

  });
};

const getActivePanel = () => {

  let activePanel;

  DOMstrings.stepFormPanels.forEach(elem => {

    if (elem.classList.contains('js-active')) {

      activePanel = elem;

    }

  });

  return activePanel;

};

const setActivePanel = activePanelNum => {

  removeClasses(DOMstrings.stepFormPanels, 'js-active');

  DOMstrings.stepFormPanels.forEach((elem, index) => {
    if (index === activePanelNum) {

      elem.classList.add('js-active');

      setFormHeight(elem);

    }
  });

};

const formHeight = activePanel => {

  const activePanelHeight = activePanel.offsetHeight;

  DOMstrings.stepsForm.style.height = `${activePanelHeight}px`;

};

const setFormHeight = () => {
  const activePanel = getActivePanel();

  formHeight(activePanel);
};

DOMstrings.stepsBar.addEventListener('click', e => {

  const eventTarget = e.target;

  if (!eventTarget.classList.contains(`${DOMstrings.stepsBtnClass}`)) {
    return;
  }
  if($('#city').val()=="" ||$('#add').val()==""||$('#phone').val()==""||$('#name').val()==""||$('#phn').val()==""){
      addCaseValidation();
}else{

  const activeStep = getActiveStep(eventTarget);

  setActiveStep(activeStep);

  setActivePanel(activeStep);
}
});

DOMstrings.stepsForm.addEventListener('click', e => {
  const eventTarget = e.target;

  if (!(eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`) || eventTarget.classList.contains(`${DOMstrings.stepNextBtnClass}`)))
  {
 

    return;

  }

  const activePanel = findParent(eventTarget, `${DOMstrings.stepFormPanelClass}`);

  let activePanelNum = Array.from(DOMstrings.stepFormPanels).indexOf(activePanel);

  if (eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`)) {
    activePanelNum--;
    $('#eadd').hide();
    $('#ename').hide(); $('#ephn').hide(); $('#er').hide(); $('#ec').hide();
  } else {
  
    if($('#city').val()=="" ||$('#add').val()==""||$('#phone').val()==""||$('#name').val()==""||$('#phn').val()==""){
      addCaseValidation();

}
else{ 
  activePanelNum++;

}
  }

  setActiveStep(activePanelNum);
  setActivePanel(activePanelNum);


});

window.addEventListener('load', setFormHeight, false);

window.addEventListener('resize', setFormHeight, false);


const setAnimationType = newType => {
  DOMstrings.stepFormPanels.forEach(elem => {
    elem.dataset.animation = newType;
  });
};

//changing animation
const animationSelect = document.querySelector('.pick-animation__select');

animationSelect.addEventListener('change', () => {
  const newAnimationType = animationSelect.value;

  setAnimationType(newAnimationType);
});

function getElement(id){
    return document.getElementById(id);
}
function addCaseValidation(){
    refreshCase();
    var hasError=false;
    var name=getElement("name");
    var ename=getElement("ename");    
    var phn=getElement("phn");
    var ephn=getElement("ephn");    
    var add=getElement("add");
    var eadd=getElement("eadd");   
    var rphn=getElement("phone");
    var erphn=getElement("er");   
    var c=getElement("city");
    var ec=getElement("ec");   
    
    
    if(name.value==""){
        hasError=true;
        ename.innerHTML="* name required.";
        name.focus();
        ename.border="2px solid red";
    }
    if(phn.value==""){
        hasError=true;
        ephn.innerHTML="* phone number required.";
        phn.focus();
        ephn.border="2px solid red";
    }
    if(add.value==""){
        hasError=true;
        eadd.innerHTML="* address required.";
        add.focus();
        eadd.border="2px solid red";
    }

    if(rphn.value==""){
        hasError=true;
        erphn.innerHTML="* receiver phone required.";
        rphn.focus();
        erphn.border="2px solid red";
    }

    if(c.value==""){
        hasError=true;
        ec.innerHTML="* city required.";
        c.focus();
        ec.border="2px solid red";
    }
   
    
    return !hasError;
}
function refreshCase(){
    var name=getElement("name");
    name.style.border="2px solid #6f50a7";
    var ename=getElement("ename");
    ename.innerHTML="";

    var phn=getElement("phn");
    phn.style.border="2px solid #6f50a7";
    var ephn=getElement("ephn");
    ephn.innerHTML="";
    
    var add=getElement("add");
    add.style.border="2px solid #6f50a7";
    var eadd=getElement("eadd");
    eadd.innerHTML="";

    var rphn=getElement("phone");
    rphn.style.border="2px solid #6f50a7";
    var erphn=getElement("er");
    erphn.innerHTML="";

    var ci=getElement("city");
    ci.style.border="2px solid #6f50a7";
    var eci=getElement("ec");
    eci.innerHTML="";    
    
}
</script>

@endsection
