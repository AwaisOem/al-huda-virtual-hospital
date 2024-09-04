<?php require_once "components/header_view.php"; ?>
<?php require_once "components/dash_top_view.php" ?>
<!-- pages -->
<section class="doctors flex flex-col w-full gap-5 py-7 ">
    <?php foreach ($doctors as $doctor) : ?>
        <div id="doctor-<?= $doctor['username'] ?>" class="flex px-5 gap-4 items-center justify-between">
            <span class="flex h-16 gap-5">
                <div class="rounded-lg h-full bg-gradient-to-tr from-blue-600 to-blue-400 w-16">
                    <?php if (isset($doctor['pic_url']) &&  $doctor['pic_url']) : ?>
                        <img src="<?= $doctor['pic_url'] ?>" class="rounded-lg w-full h-full" alt="">
                    <?php endif; ?>
                </div>
                <div class="flex flex-col justify-center">
                    <h3 class="text-xl capitalize"><?= $doctor['full_name'] ?></h3>
                    <a href="<?= $doctor['license_url'] ?? "#" ?>" class="text-sm opacity-60 hover:underline cursor-pointer"><?= $doctor['license_url'] ? "lincense" : "This Doctor is suspicious" ?></a>
                </div>
            </span>
            <span class="flex gap-5">
                <button id="bookDoc-<?= $doctor['username'] ?>" type="button" class="bookDocs h-8 border-0 outline-0 px-4 py-2 flex text-white items-center cursor-pointer bg-gradient-to-tr from-red-600 to-red-400 rounded-lg">
                    Book<span class="hidden sm:block">&nbsp;Appoinment</span>
                </button>
            </span>
        </div>
    <?php endforeach; ?>
</section>
<script defer>
    $('.bookDocs').click(async function() {
        let Docusername = $(this).attr('id').split('-')[1];
        let res = await Swal.fire({
            title: 'How many days you want?',
            input: 'number',
            showCancelButton: true,
            inputAttributes: {
                max: 30,
                min: 1,
                autocapitalize: 'off',
            },
            confirmButtonText: 'Book',
            confirmButtonColor: '#3c79f1',
            showLoaderOnConfirm: true,
            preConfirm: val => {
                if (val && !isNaN(val)) return val;
                Swal.showValidationMessage('Please enter no of days');
            },
            footer: "You will be charged $100 per day (max days 30)",
            allowOutsideClick: () => !Swal.isLoading()
        })
        if (res.isConfirmed) {
            let days = Number(res.value);
            let res2 = await Swal.fire({
                title: 'Are you sure?',
                text: `You want to book ${days} days with ${Docusername}`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: `Yes, Book it! ($${days*100})`,
                confirmButtonColor: '#3c79f1',
                showLoaderOnConfirm: true,
                preConfirm: async () => {
                    let data = new URLSearchParams();
                    data.append('doctor_id', Docusername);
                    data.append('days', days);
                    let res3 = await fetch('/api/doctors/bookAP.php', {
                        method: "POST",
                        body: data,
                    })
                    if (!res3.ok) {
                        // debugger
                        console.log(await res3.text());
                        Swal.showValidationMessage('Something went wrong');
                    } else {

                        let res4 = await res3.json();
                        if (res4.status == "success") {
                            return res4;
                        } else {
                            Swal.showValidationMessage(res4.message);
                        }
                    }
                },
                allowOutsideClick: () => !Swal.isLoading()
            })
            if (res2.isConfirmed) {
                Swal.fire({
                    title: "Success",
                    confirmButtonColor: '#3c79f1',
                    text: "Your appoinment has been booked",
                    icon: "success",
                    footer: `You can contact the doctor through <a href="/profile" class="px-2 underline">message</a> section`
                })
            }
        }

    })
</script>

<?php require_once "components/dash_bottom_view.php" ?>
<?php require_once "components/footer_view.php"; ?>