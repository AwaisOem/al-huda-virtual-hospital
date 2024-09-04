<?php require_once "components/header_view.php"; ?>
<?php require_once "components/dash_top_view.php" ?>
<!-- pages -->
<?php //dd($_SESSION['user']); 
?>
<section class="profile">
    <div class="container rounded-lg mx-auto md:mx-0 shadow-md">
        <div class="p-4 rounded-lg bg-gray-100">
            <div class="flex items-center justify-between w-full ">
                <div class="inline-flex items-center space-x-4">
                    <a href="#" class="relative block">
                        <div class="rounded-full bg-blue-300 w-16 h-16 flex bg-gradient-to-tr from-blue-600 to-blue-400 items-center justify-center ">
                            <?php if (isset($_SESSION["user"]['pic_url']) && $_SESSION["user"]['pic_url']) :  ?>
                                <img src="<?= $_SESSION["user"]['pic_url'] ?>" class="rounded-full w-full h-full" alt="">
                                <?php  //endif; 
                                ?>
                            <?php else : ?>
                                <?php //if(!(isset($_SESSION["user"]['pic_url']) && $_SESSION["user"]['pic_url'])): 
                                ?>
                                <i class="fa-solid h-7 fa-user "></i>
                            <?php endif; ?>
                        </div>
                    </a>
                    <div>
                        <h4 style="text-transform: capitalize;">
                            <?= $_SESSION["user"]['full_name'] ?? "Guest" ?>
                        </h4>
                        <span class="opacity-60 text-gray-600"> <?= $_SESSION["user"]['username'] ?? "username" ?></span>
                    </div>
                </div>
                <div class="center relative capitlize inline-block select-none 
                                bg-gradient-to-tr from-red-600 to-red-400
                                whitespace-nowrap rounded-lg py-2 h-7 px-3.5 align-baseline font-sans text-xs font-bold uppercase leading-none text-white">

                    <?= $_SESSION["user"]['user_role'] ?? "Patient" ?>
                </div>

            </div>
        </div>
        <div class="space-y-6">
            <div class="max-w-full m-3">
                <div class="relative right-0">
                    <ul class="relative flex list-none flex-wrap rounded-xl bg-blue-gray-50/60 p-1" data-tabs="tabs" role="list">
                        <li class="z-30 flex-auto text-center">
                            <a class="text-slate-700 z-30 mb-0 flex w-full cursor-pointer items-center justify-center rounded-lg border-0 bg-inherit px-0 py-1 transition-all ease-in-out" data-tab-target="" active="" role="tab" aria-selected="true" aria-controls="records">
                                <i class="fa-solid fa-table-list"></i>
                                <span class="ml-2">Records</span>
                            </a>
                        </li>
                        <li class="z-30 flex-auto text-center">
                            <a class="text-slate-700 z-30 mb-0 flex w-full cursor-pointer items-center justify-center rounded-lg border-0 bg-inherit px-0 py-1 transition-all ease-in-out" data-tab-target="" role="tab" aria-selected="false" aria-controls="message">
                                <i class="fa-solid fa-message"></i>
                                <span class="ml-2">Appointments</span>
                                <?php if (count($user_appointments) > 0) : ?>
                                    <span class="ml-2 rounded-full h-2 w-2 bg-red-600"></span>
                                <?php endif; ?>
                            </a>
                        </li>
                        <li class="z-30 flex-auto text-center">
                            <a class="text-slate-700 z-30 mb-0 flex w-full cursor-pointer items-center justify-center rounded-lg border-0 bg-inherit px-0 py-1 transition-all ease-in-out" data-tab-target="" role="tab" aria-selected="false" aria-controls="settings">
                                <i class="fa-solid fa-gear"></i>
                                <span class="ml-2">Settings</span>
                            </a>
                        </li>
                    </ul>
                    <div data-tab-content="" class="p-5">
                        <div class="block opacity-100" id="records" role="tabpanel">
                            <?php if (count($user_orders) == 0) : ?>
                                <p class="opacity-40 text-center">No Records</p>
                            <?php else : ?>
                                <!-- ====== Table Section Start -->
                                <section class="orders-table">
                                    <div class=" container mx-auto">
                                        <div class=" -mx-4 flex flex-wrap">
                                            <div class="w-full px-4">
                                                <div class="rounded-lg max-w-full overflow-x-auto">
                                                    <table class=" w-full table-auto">
                                                        <thead>
                                                            <tr class="bg-gradient-to-tr from-blue-600 to-blue-400 text-center">
                                                                <th class="w-1/6 min-w-[160px] border-l border-transparent py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4">
                                                                    Medicine
                                                                </th>
                                                                <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4">
                                                                    Price
                                                                </th>
                                                                <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4">
                                                                    Quantity
                                                                </th>
                                                                <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4">
                                                                    Discount
                                                                </th>
                                                                <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4">
                                                                    Total
                                                                </th>
                                                                <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4">
                                                                    Status
                                                                </th>
                                                                <th class="w-1/6 min-w-[160px] border-r border-transparent py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4">
                                                                    delivery_loc
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($user_orders as $order) : ?>
                                                                <tr>
                                                                    <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">
                                                                        <?= $order['name'] ?>
                                                                    </td>
                                                                    <td class="text-dark border-b border-[#E8E8E8] bg-white py-5 px-2 text-center text-base font-medium">
                                                                        <?= '$' . $order['price'] ?>
                                                                    </td>
                                                                    <td class="text-dark border-b border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">
                                                                        <?= $order['quantity'] ?>
                                                                    </td>
                                                                    <td class="text-dark border-b border-[#E8E8E8] bg-white py-5 px-2 text-center text-base font-medium">
                                                                        <?= $order['discount'] . '%' ?>
                                                                    </td>
                                                                    <td class="text-dark border-b border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">
                                                                        <?= '$' . $order['total'] ?>
                                                                    </td>
                                                                    <td class="text-dark border-b border-[#E8E8E8] bg-white py-5 px-2 text-center text-base font-medium">
                                                                        <?= $order['status'] ?></td>
                                                                    <td class="text-dark border-b border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">
                                                                        <?= $order['delivery_loc'] ?></td>

                                                                </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!-- ====== Table Section End -->
                            <?php endif; ?>
                        </div>
                        <div class="hidden opacity-0" id="message" role="tabpanel">
                            <?php if (count($user_appointments) == 0) : ?>
                                <p class="opacity-40 text-center">No Appointments</p>
                            <?php else : ?>
                                <?php foreach ($user_appointments as $ap) : ?>
                                    <div id="doctor-<?= $ap['doctor_id'] ?>" class="flex px-5 gap-4 items-center justify-between">
                                        <span class="flex h-16 gap-5">
                                            <div class="rounded-lg h-full bg-gradient-to-tr from-blue-600 to-blue-400 w-16">
                                                <?php if (isset($ap['pic_url']) &&  $ap['pic_url']) : ?>
                                                    <img src="<?= $ap['pic_url'] ?>" class="rounded-lg w-full h-full" alt="">
                                                <?php endif; ?>
                                            </div>
                                            <div class="flex flex-col justify-center">
                                                <h3 class="text-xl"><?= $ap['full_name'] ?></h3>
                                                <p class="text-sm opacity-60"><?= $ap['time_left'] . " left" ?></p>
                                            </div>
                                        </span>
                                        <span class="flex gap-5">
                                            <a href="/vidcall">
                                            <button id="Call-<?= $ap['doctor_id'] ?>" type="button" class="CallDocs h-8 border-0 outline-0 px-4 py-2 flex gap-2 text-white items-center cursor-pointer bg-gradient-to-tr from-violet-600 to-violet-400 rounded-lg">
                                                <i class="fa-solid fa-video"></i>
                                                Call
                                            </button>
                                            </a>
                                        </span>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <div class="hidden flex lg:flex-row flex-col opacity-0" id="settings" role="tabpanel">
                            <form id="changePassForm" class="w-full lg:w-[50%] py-4 px-5 border-b lg:border-b-0 lg:border-r border-gray-500 border-opacity-30 space-y-5">
                                <div class=" relative flex justify-center items-center gap-5 flex-col w-full">
                                    <div class="relative h-10 w-full max-w-[400px] ">
                                        <input class="peer h-full w-full rounded-[7px] border border-blue-gray-200  bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-blue-500 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50" placeholder=" " required maxlength="20" minlength="6" type="password" id="passchange-oldpass" />
                                        <label class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-blue-500 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-blue-500 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-blue-500 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                            Old Password
                                        </label>
                                    </div>
                                    <div class="relative h-10 w-full max-w-[400px] ">
                                        <input class="peer h-full w-full rounded-[7px] border border-blue-gray-200  bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-blue-500 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50" placeholder=" " required maxlength="20" minlength="6" type="password" id="passchange-pass" />
                                        <label class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-blue-500 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-blue-500 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-blue-500 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                            New Password
                                        </label>
                                    </div>
                                    <div class="relative h-10 w-full max-w-[400px] ">
                                        <input class="peer h-full w-full rounded-[7px] border border-blue-gray-200  bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-blue-500 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50" placeholder=" " required maxlength="20" minlength="6" type="password" id="passchange-confirm" />
                                        <label class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-blue-500 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-blue-500 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-blue-500 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                            Confirm Password
                                        </label>
                                    </div>
                                    <div class="w-full text-gray-500 max-w-[400px]">
                                        <button type="submit" class="py-2 px-4
                                                        bg-gradient-to-tr from-blue-600 to-blue-400
                                                        text-white w-full shadow-blue-500/20
                                                        hover:shadow-lg hover:shadow-blue-500/40 transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none rounded-lg">
                                            Change password
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <div class="flex py-4 gap-5 w-full lg:w-[50%] flex-col justify-center items-center">
                                <button id="add-pic-btn" class="text-white
                                py-2 max-w-[400px]
                                bg-gradient-to-tr from-blue-600 to-blue-400
                                text-white w-full   shadow-blue-500/20
                                hover:shadow-lg hover:shadow-blue-500/40 transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none rounded-lg 
                                ">
                                    <?= $_SESSION['user']['pic_url'] ? "Update Profile Picture" : "Add Profile Picture" ?>
                                </button>
                                <button id="add-medlink-btn" class="text-white
                                py-2 max-w-[400px]
                                bg-gradient-to-tr from-blue-600 to-blue-400
                                text-white w-full   shadow-blue-500/20
                                hover:shadow-lg hover:shadow-blue-500/40 transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none rounded-lg 
                                ">
                                    <?= $_SESSION['user']['medical_url'] ? "Update Medical Docs Link" : "Add Medical Docs Link" ?>
                                </button>
                                <?php if ($_SESSION['user']['user_role'] && $_SESSION['user']['user_role'] != 'doctor') : ?>
                                    <button id="add-doclink-btn" class="text-white
                                py-2 max-w-[400px]
                                bg-gradient-to-tr from-blue-600 to-blue-400
                                text-white w-full   shadow-blue-500/20
                                hover:shadow-lg hover:shadow-blue-500/40 transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none rounded-lg 
                                ">
                                        Approval for Doctor
                                    </button>
                                <?php endif; ?>
                                <button id="logout-btn" class="text-white
                                py-2 max-w-[400px]
                                bg-gradient-to-tr from-red-600 to-red-400
                                text-white w-full   shadow-red-500/20
                                hover:shadow-lg hover:shadow-red-500/40 transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none rounded-lg 
                                ">
                                    Log out
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr />

        </div>
    </div>
</section>
<script defer>
    $('#add-doclink-btn').click(() => {
        Swal.fire({
                title: 'Enter Link to Your Doctor License',
                input: 'text',
                confirmButtonColor: '#3C79F1',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Upload',
                showLoaderOnConfirm: true,
                preConfirm: text => {
                    if (!(text && isValidUrl(text))) {
                        Swal.showValidationMessage(
                            `Not VAlid URL`
                        )
                        return;
                    }
                    let data = new URLSearchParams();
                    data.append('action', 'license_url');
                    data.append('license_url', text);
                    return fetch(`/api/user/upload.php`, {
                            method: 'POST',
                            body: data
                        })
                        .then(d => {
                            if (!d.ok) throw Error("Not Uploaded");
                            return d.text()
                        })
                        .catch(error => {
                            Swal.showValidationMessage(
                                `Request failed: ${error}`
                            )
                        })
                },
                allowOutsideClick: () => !Swal.isLoading()
            })
            .then(d => {
                console.log(d);
                if (d.isConfirmed) {
                    Swal.fire({
                        icon: "success",
                        title: 'License Uploaded',
                        showConfirmButton: true,
                        confirmButtonText: 'Ok',
                        confirmButtonColor: '#3C79F1',
                        footer: "Wait for approval"
                    })
                }
            })
    })
    $('#add-medlink-btn').click(() => {
        Swal.fire({
                title: 'Enter Link to Your Medical Records',
                input: 'text',
                confirmButtonColor: '#3C79F1',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Upload',
                showLoaderOnConfirm: true,
                preConfirm: text => {
                    if (!(text && isValidUrl(text))) {
                        Swal.showValidationMessage(
                            `Not VAlid URL`
                        )
                        return;
                    }
                    let data = new URLSearchParams();
                    data.append('action', 'medical_url');
                    data.append('med-url', text);
                    return fetch(`/api/user/upload.php`, {
                            method: 'POST',
                            body: data
                        })
                        .then(d => {
                            if (!d.ok) throw Error("Not Uploaded");
                            return d.text()
                        })
                        .catch(error => {
                            Swal.showValidationMessage(
                                `Request failed: ${error}`
                            )
                        })
                },
                allowOutsideClick: () => !Swal.isLoading()
            })
            .then(d => {
                console.log(d);
                if (d.isConfirmed) {
                    Swal.fire({
                        icon: "success",
                        title: 'Medical Record Uploaded',
                        showConfirmButton: true,
                        confirmButtonText: 'Ok',
                        confirmButtonColor: '#3C79F1',
                    })
                }
            })
    })
    $('#add-pic-btn').click(async () => {
        const {
            value: file
        } = await Swal.fire({
            title: 'Select image',
            input: 'file',
            inputAttributes: {
                'accept': 'image/*',
                'aria-label': 'Upload your profile picture'
            },
            showConfirmButton: true,
            showLoaderOnConfirm: true,
            confirmButtonText: 'Upload',
            confirmButtonColor: '#3C79F1'
        })
        if (file) {
            const reader = new FileReader()
            reader.onload = e => {
                // 1270573
                if (e.total > 2042880) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Size Limit Exceeded',
                        footer: 'Should be less than 2 MB'
                    })
                    return;
                }
                let data = new URLSearchParams();
                data.append('action', 'upload-image');
                data.append('image', e.target.result);
                fetch('/api/user/upload.php', {
                        method: 'POST',
                        body: data
                    }).then(d => {
                        if (!d.ok) throw Error("Image Not Uploaded");
                        return d.text()
                    })
                    .then(d => {
                        console.log(d);
                        Swal.fire({
                            title: 'Your uploaded picture',
                            imageUrl: e.target.result,
                            imageAlt: 'The uploaded picture',
                            showConfirmButton: true,
                            confirmButtonText: 'Ok',
                            confirmButtonColor: '#3C79F1',
                        }).then(() => {
                            location.reload();
                        })
                    }).catch(err => {
                        showErrorMessage(err.message);
                    })

            }
            reader.readAsDataURL(file)
        }

    })
    $('#changePassForm').submit(async e => {
        e.preventDefault();
        if ($('#passchange-pass').val() != $('#passchange-confirm').val()) {
            Swal.fire({
                icon: 'error',
                title: 'Password Mismatch',
                showConfirmButton: false,
                timer: 2000
            })
            return;
        }
        if ($('#passchange-pass').val() == $('#passchange-oldpass').val()) {
            Swal.fire({
                icon: 'error',
                title: 'New Password cannot be same as old password',
                showConfirmButton: false,
                timer: 2000
            })
            return;
        }
        let formData = new URLSearchParams();
        formData.append('oldpass', $('#passchange-oldpass').val());
        formData.append('newpass', $('#passchange-pass').val());
        try {
            const res = await fetch('/api/user/change_password.php', {
                method: 'POST',
                body: formData
            });
            if (!res.ok)
                throw new Error(await res.json().then(data => data.message));
            Swal.fire({
                icon: 'success',
                title: 'Password Changed',
                showConfirmButton: false,
                timer: 2000
            })
            $('#passchange-oldpass').val('');
            $('#passchange-pass').val('');
            $('#passchange-confirm').val('');
        } catch (err) {
            showErrorMessage(err.message);

        }


    })
    $('#logout-btn').click(async () => {
        try {
            const res = await fetch('/api/user/logout.php', {
                method: 'POST',
            });
            if (!res.ok)
                throw new Error('Something Went Wrong');
            Swal.fire({
                icon: 'success',
                title: 'Logout Successfull',
                showConfirmButton: false,
                timer: 2000
            })
            setTimeout(() => {
                window.location.href = '/auth';
            }, 1800);
        } catch (err) {
            showErrorMessage(err.message);
        }
    })
</script>

<?php require_once "components/dash_bottom_view.php"; ?>
<?php require_once "components/footer_view.php"; ?>