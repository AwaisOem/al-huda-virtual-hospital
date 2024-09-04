<?php require_once "components/header_view.php"; ?>
<?php require_once "components/dash_top_view.php" ?>
<!-- pages -->
<section>
    <div class="flex py-7 w-full flex-col gap-5">
        <div id="cart" class="w-full flex-col gap-5 flex"></div>
        <hr />
        <div class="flex w-full">
            <div class="w-[50%] px-4  border-r flex flex-col gap-4 border-gray-200">
                <div class="flex justify-between">
                    <span>Tax:</span>
                    <span>0%</span>
                </div>
                <div class="flex justify-between">
                    <span>Discount:</span>
                    <span id="discount-percent">0%</span>
                </div>
                <div class="font-bold text-xl flex justify-between">
                    <span>Total:</span>
                    <span id="cartTotal">$0</span>
                </div>
            </div>
            <form id="couponForm" class="p-4 flex flex-col gap-5 w-[50%]">
                <div class="w-full md:w-72">
                    <div class="relative h-10 w-full min-w-[200px] ">
                        <input id="coupon-input" required type="text" class="peer h-full w-full rounded-[7px] border border-blue-gray-200  bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-blue-500 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50" placeholder=" " />
                        <label class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-blue-500 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-blue-500 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-blue-500 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                            Coupon Code
                        </label>
                    </div>
                </div>
                <button type="submit" class="w-full font-bold md:w-72 h-12 shadow-mdj shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 rounded-lg bg-gradient-to-tr from-blue-600 to-blue-400 text-white">Apply</button>
            </form>
        </div>
        <hr />
        <div class="w-72 mx-auto">
            <div class="flex gap-4 w-full">
                <input type="radio" name="Payment" id="paypal">
                <label for="paypal" class="flex-1">Paypal</label>
                <input type="radio" name="Payment" id="card">
                <label for="card" class="flex-1">Card</label>
                <input type="radio" checked name="Payment" id="testing">
                <label for="testing" class="flex-1">Testing</label>
            </div>
            <button id="cartBuy" class=" my-4 w-full font-bold h-12 rounded-lg bg-gradient-to-tr shadow-md shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 from-blue-600 to-blue-400 text-white">Buy</button>
        </div>
    </div>
</section>
<script defer>
    let UI_UPDATE_TOTAL = (cart_arr = JSON.parse(localStorage.getItem('cart'))) => {
        if (!cart_arr) return false;
        let cartTotal = cart_arr.reduce((acc, el) => acc + el.price * el.quantity, 0);
        let discount = localStorage.getItem('disc');
        if (discount && isFinite(discount) && discount >= 0 && discount <= 100) {
            cartTotal -= (cartTotal * discount / 100);
            $('#couponForm [type=submit]').attr('disabled', true);
            $('#coupon-input').attr('disabled', true);
            $('#couponForm [type=submit]').text('Coupon Applied');
        }
        cartTotal = cartTotal.toFixed(2);
        $('#discount-percent').text(`${discount ?? 0}%`);
        $('#cartTotal').text(`$${cartTotal}`);
        $('#cartBuy').text(`Buy ($${cartTotal})`);

    }
    $('#couponForm').submit(function(e) {
        e.preventDefault();
        let data = new URLSearchParams();
        let coupon = $('#coupon-input').val();
        data.append('coupon', coupon);
        fetch('/api/medicines/coupons.php', {
            method: 'POST',
            body: data
        }).then(res => {
            if (!res.ok) throw new Error('Coupon not found');
            return res.json();
        }).then(j => {
            localStorage.setItem('disc', j.discount);
            localStorage.setItem('coupon', coupon);
            UI_UPDATE_TOTAL();
            Swal.fire({
                icon: 'success',
                title: 'Coupon applied',
                showConfirmButton: false,
                timer: 1500
            })
        }).catch(e => showErrorMessage(e.message));
    })



    $('#cartBuy').click(async function() {
        if (!localStorage.getItem('cart')) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Your cart is empty!',
                footer: '<a href="/medicines">Go to Medicines</a>',
                confirmButtonColor: '#3c79f1'
            })
            return;
        }
        let res = await Swal.fire({
            title: 'Enter your Deliever Address',
            input: 'text',
            showCancelButton: true,
            confirmButtonText: 'Proceed',
            confirmButtonColor: '#3c79f1',
            showLoaderOnConfirm: true,
            preConfirm: val=>{
                if(val) return val;
                Swal.showValidationMessage('Please enter your address');
            },
            allowOutsideClick: () => !Swal.isLoading()
        })
        if (!res.isConfirmed || !res.value )return;
        Swal.fire({
            'icon': 'warning',
            'title': 'Are you sure?',
            'text': 'You will not be able to revert this!',
            'showCancelButton': true,
            'confirmButtonText': 'Yes, buy it!',
            'cancelButtonText': 'No, cancel!',
            'confirmButtonColor': '#3c79f1',
            'footer': 'For testing propose only! (No real payment will be made)'
        }).then((result) => {
            if (result.isConfirmed) {
                let cartItems = JSON.parse(localStorage.getItem('cart'));
                let coupon = localStorage.getItem('coupon');
                let data = new URLSearchParams();
                data.append('coupon', coupon);
                data.append('address', res.value);
                let items = cartItems.map(el => ({
                    id: el.id,
                    quantity: el.quantity
                }))
                data.append('items', JSON.stringify(items));
                fetch('/api/medicines/buy_medicines.php', {
                    method: 'POST',
                    body: data
                }).then(async res => {
                    if (!res.ok) {
                        // debugger
                        // let m = await res.text();
                        // console.log(m);
                        throw new Error("Something went wrong");
                    }
                    return res.json();
                }).then(j => {
                    console.log(j);
                    if (j.status === 'success') {
                        localStorage.removeItem('cart');
                        localStorage.removeItem('disc');
                        localStorage.removeItem('coupon');
                    }
                    Swal.fire({
                        icon: "success",
                        title: "Purchase successful",
                        showConfirmButton: false,
                        timerProgressBar: true,
                        timer: 1500
                    })
                    .then(() => window.location.reload())
                }).catch(e => showErrorMessage(e.message)); // showErrorMessage is a custom function
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Order Cancelled',
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: true,
                })
            }
        })
    })


    let cartFill = () => {
        let cartItems = JSON.parse(localStorage.getItem('cart'));
        let cart = document.getElementById('cart');
        cart.innerHTML = '';
        cartItems && cartItems.forEach(el => {
            cart.innerHTML += `
            <div  id="productCart-${el.id}" class="flex px-5 gap-4 items-center justify-between">
            <span class="flex h-16 gap-5">
                <div class="rounded-lg h-full bg-gradient-to-tr from-blue-600 to-blue-400 w-16">
                </div>
                <div class="flex flex-col justify-center">
                    <h3 class="text-xl">${el.name}</h3>
                    <p class="text-sm opacity-60">Company: ${el.manufacturer}</p>
                    <p class="text-sm opacity-60">Price: $${el.price}</p>
                </div>
            </span>
            <span class="flex gap-5">
                <div class="flex justify-between items-center text-lg w-24 h-8 bg-gray-100 rounded-lg">
                    <button id="incCart-${el.id}" class="incCartBtn cursor-pointer w-8 rounded-lg hover:bg-gray-200 text-2xl">+</button>
                    <span>${el.quantity}</span>
                    <button id="decCart-${el.id}" class="decCartBtn cursor-pointer w-8 rounded-lg hover:bg-gray-200 text-2xl">-</button>
                </div>
                <button id="deleteFromCart-${el.id}" type="button" class="deleteFromCartBtn h-8 border-0 outline-0 px-2 flex text-white items-center cursor-pointer bg-gradient-to-tr from-red-600 to-red-400 rounded-lg">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </span>
            </div>`;
        })
        UI_UPDATE_TOTAL(cartItems);
    }
    cartFill();


    $('.incCartBtn').click(function() {
        let id = $(this).attr('id').split('-')[1];
        let cart = JSON.parse(localStorage.getItem('cart'));
        cart.forEach(el => {
            if (el.id == id) {
                el.quantity < el.stock ? el.quantity++ : el.quantity = el.stock;
            }
        })
        localStorage.setItem('cart', JSON.stringify(cart));

        //UI update
        $(this).parent().find('span').text(cart.find(el => el.id == id).quantity);
        UI_UPDATE_TOTAL(cart);
    })
    $('.decCartBtn').click(function() {
        let id = $(this).attr('id').split('-')[1];
        let cart = JSON.parse(localStorage.getItem('cart'));
        cart.forEach(el => {
            if (el.id == id) {
                el.quantity > 1 ? el.quantity-- : el.quantity = 1;
            }
        })
        localStorage.setItem('cart', JSON.stringify(cart));
        //UI update
        $(this).parent().find('span').text(cart.find(el => el.id == id).quantity);
        UI_UPDATE_TOTAL(cart);
    })

    $('.deleteFromCartBtn').click(function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to delete this item from cart!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33'
        }).then((result) => {
            if (result.isConfirmed) {
                let id = $(this).attr('id').split('-')[1];
                let cart = JSON.parse(localStorage.getItem('cart'));
                cart = cart.filter(el => el.id != id);
                localStorage.setItem('cart', JSON.stringify(cart));
                // UI update
                $('#productCart-' + id).remove();

                Swal.fire(
                    'Deleted!',
                    'item has been deleted.',
                    'success'
                ).then(() => {
                    UI_UPDATE_TOTAL(cart);
                })
            }
        })
    })
</script>


<?php require_once "components/dash_bottom_view.php" ?>
<?php require_once "components/footer_view.php"; ?>