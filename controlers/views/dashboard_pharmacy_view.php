<?php require_once "components/header_view.php"; ?>
<?php require_once "components/dash_top_view.php" ?>
<!-- pages -->
<section class="pharmacy w-full flex flex-col gap-3">
    <form class="w-full  py-2 flex  h-[80px]">
        <input type="text" class="outline-0 px-4 text-sm shadow-md w-full h-full rounded-l-lg bg-gray-100">
        <span type="submit" class="cursor-pointer w-[80px]  shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 
            active:opacity-[0.85] bg-gradient-to-tr from-blue-600 to-blue-400  flex justify-center items-center text-white bg-blue-600 rounded-r-lg  h-full"><i class="fa-solid fa-magnifying-glass"></i></span>
    </form>
    <div class=" flex gap-4 flex-wrap  justify-center items-center">
        <?php foreach ($medicines as $medicine) : ?>
            <div class="w-[250px] shadow-md h-[300px] p-4 flex gap-2 justify-between flex-col rounded-lg bg-gray-100">
                <div class="w-full h-[150px] shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 
            active:opacity-[0.85] bg-gradient-to-tr from-blue-600 to-blue-400 rounded-lg"></div>
                <div>
                    <span class="flex justify-between items-center">
                        <h1 id='<?= "medicineName-" . $medicine['id'] ?>' class="font-bold text-lg"><?= $medicine['name'] ?></h1>
                        <div>
                            <span class="line-through opacity-40 text-xs"><?= '$' . (floatval($medicine['price']) + 1.00) ?></span>
                            <span id='<?= "mediprice-" . $medicine['id'] ?>' class="font-bold"><?= '$' . $medicine['price'] ?>
                            </span>
                        </div>
                    </span>
                    <p id='<?= "mediManu-" . $medicine['id'] ?>' class="text-xs opacity-40"><?= $medicine['manufacturer'] ?></p>
                </div>
                <span class="flex justify-between gap-5">
                    <button id="<?= "minusbtn-" . $medicine['id'] ?>" class="minus-icon w-[30px] flex justify-center shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 
            active:opacity-[0.85] bg-gradient-to-tr from-blue-600 to-blue-400 items-center text-white h-[30px] rounded-lg">-</button>
                    <div class="font-bold">
                        <span id='<?= "quantity-" . $medicine['id'] ?>'>0</span>
                        <span class="opacity-30 text-sm">/</span>
                        <span id='<?= "stock-" . $medicine['id'] ?>' class="opacity-30 text-sm"><?= $medicine['quantity'] ?></span>
                    </div>
                    <button id="<?= "plusbtn-" . $medicine['id'] ?>" class="plus-icon w-[30px] h-[30px] text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 
            active:opacity-[0.85] bg-gradient-to-tr from-blue-600 to-blue-400 rounded-lg flex justify-center items-center">+</button>
                </span>
                <button id="<?= "addToCart-" . $medicine['id'] ?>" class="cart-btn shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 
            active:opacity-[0.85] bg-gradient-to-tr from-blue-600 to-blue-400 px-5 py-2 rounded-lg text-white">Add To Cart</button>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<script defer>
    $('.cart-btn').click(function(){
        let reqid = $(this).attr('id').split('-')[1];
        let q = parseInt($('#quantity-' + reqid).text());
        if (q < 1) return;
        let pri =  $('#mediprice-' + reqid).text();
        let medicine = {
            id: reqid,
            name: $('#medicineName-' + reqid).text(),
            manufacturer: $('#mediManu-' + reqid).text(),
            price: parseFloat(pri.split('$')[1]),
            quantity: q,
            stock : parseInt($(`#stock-${reqid}`).text()),
        }
        let cart = JSON.parse(localStorage.getItem('cart'));
        if(cart == null) cart = [];
        let index = cart.findIndex(med => med.id == medicine.id);
        if(index == -1) cart.push(medicine);
        localStorage.setItem('cart', JSON.stringify(cart));
        $('#quantity-' + reqid).text(0);
        Swal.fire({
            icon: 'success',
            title: 'Added to cart',
            showConfirmButton: false,
            timer: 1500
        })
    })
    $('.plus-icon').click(function() {
        let reqid = $(this).attr('id').split('-')[1];
        let quantity = parseInt($('#quantity-' + reqid).text());
        if (quantity >= parseInt($(`#stock-${reqid}`).text())) return;
        $('#quantity-' + reqid).text(quantity + 1);
    })
    $('.minus-icon').click(function() {
        let reqid = $(this).attr('id').split('-')[1];
        let quantity = parseInt($('#quantity-' + reqid).text());
        if (quantity <= 0) return;
        $('#quantity-' + reqid).text(quantity - 1);
    })
</script>
<?php require_once "components/dash_bottom_view.php" ?>
<?php require_once "components/footer_view.php"; ?>