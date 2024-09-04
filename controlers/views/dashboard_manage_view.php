<?php require_once "components/header_view.php"; ?>
<?php require_once "components/dash_top_view.php" ?>
<!-- pages -->
<section class="managing-panel">
    <div class="w-full">
        <div class="relative right-0">
            <ul class="relative flex list-none flex-wrap rounded-xl bg-blue-gray-50/60 p-1" data-tabs="tabs" role="list">
                <li class="z-30 flex-auto text-center">
                    <a class="text-slate-700 z-30 mb-0 flex w-full cursor-pointer items-center justify-center rounded-lg border-0 bg-inherit px-0 py-1 transition-all ease-in-out" data-tab-target="" active="" role="tab" aria-selected="true" aria-controls="appointments">
                        <span class="ml-1">Appointments</span>
                    </a>
                </li>
                <li class="z-30 flex-auto text-center">
                    <a class="text-slate-700 z-30 mb-0 flex w-full cursor-pointer items-center justify-center rounded-lg border-0 bg-inherit px-0 py-1 transition-all ease-in-out" data-tab-target="" role="tab" aria-selected="false" aria-controls="users">
                        <span class="ml-1">Users</span>
                    </a>
                </li>
                <li class="z-30 flex-auto text-center">
                    <a class="text-slate-700 z-30 mb-0 flex w-full cursor-pointer items-center justify-center rounded-lg border-0 bg-inherit px-0 py-1 transition-all ease-in-out" data-tab-target="" role="tab" aria-selected="false" aria-controls="medicines">
                        <span class="ml-1">Medicines</span>
                    </a>
                </li>
                <li class="z-30 flex-auto text-center">
                    <a class="text-slate-700 z-30 mb-0 flex w-full cursor-pointer items-center justify-center rounded-lg border-0 bg-inherit px-0 py-1 transition-all ease-in-out" data-tab-target="" role="tab" aria-selected="false" aria-controls="sales">
                        <span class="ml-1">Orders</span>
                    </a>
                </li>
                <li class="z-30 flex-auto text-center">
                    <a class="text-slate-700 z-30 mb-0 flex w-full cursor-pointer items-center justify-center rounded-lg border-0 bg-inherit px-0 py-1 transition-all ease-in-out" data-tab-target="" role="tab" aria-selected="false" aria-controls="hospitals">
                        <span class="ml-1">Hospitals</span>
                    </a>
                </li>
            </ul>
            <div data-tab-content="" class="p-5">
                <div class="block opacity-100" id="appointments" role="tabpanel">
                    <!-- Table Started -->
                    <section class="appointment-table">
                        <div class=" container mx-auto">
                            <div class=" -mx-4 flex flex-wrap">
                                <div class="w-full px-4">
                                    <div class="rounded-lg max-w-full overflow-x-auto">
                                        <table class=" w-full table-auto">
                                            <thead>
                                                <tr class="bg-gradient-to-tr from-blue-600 to-blue-400 text-center">
                                                    <th class="w-1/6 min-w-[160px] border-l border-transparent py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4">
                                                        doctor
                                                    </th>
                                                    <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4">
                                                        patient
                                                    </th>
                                                    <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4">
                                                        Time Left
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($appointments as $appointment) : ?>
                                                    <tr>
                                                        <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">
                                                            <?= $appointment['doctor_id'] ?>
                                                        </td>
                                                        <td class="text-dark border-b border-[#E8E8E8] bg-white py-5 px-2 text-center text-base font-medium">
                                                            <?= $appointment['patient_id'] ?>
                                                        </td>
                                                        <td class="text-dark border-b border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">
                                                            <?php if ($appointment['start_time'] >= $appointment['end_time']) : ?>
                                                                <span class="text-red-500">Finished</span>
                                                            <?php else : ?>
                                                                <?= $appointment['time_left'] . " left" ?>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Table Started -->
                </div>
                <div class="hidden opacity-0" id="users" role="tabpanel">
                    <!-- Table Started -->
                    <section class="users-table">
                        <div class=" container mx-auto">
                            <div class=" -mx-4 flex flex-wrap">
                                <div class="w-full px-4">
                                    <div class="rounded-lg max-w-full overflow-x-auto">
                                        <table class=" w-full table-auto">
                                            <thead>
                                                <!-- pic_url,created_at , -->
                                                <tr class="bg-gradient-to-tr from-blue-600 to-blue-400 text-center">
                                                    <th class="w-1/6 min-w-[160px] border-l border-transparent py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4">
                                                        username
                                                    </th>
                                                    <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4">
                                                        full_name
                                                    </th>
                                                    <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4">
                                                        user_role
                                                    </th>
                                                    <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4">
                                                        pic_url
                                                    </th>
                                                    <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4">
                                                        license_url
                                                    </th>
                                                    <th class="w-1/6 min-w-[160px] border-r border-transparent py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4">
                                                        medical_url
                                                    </th>
                                                    <th class="w-1/6 min-w-[160px] border-r border-transparent py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4">
                                                        created_at
                                                    </th>
                                                    <th class="w-1/6 min-w-[160px] border-r border-transparent py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4">
                                                        Edit
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($users as $user) : ?>
                                                    <tr>
                                                        <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">
                                                            <?= $user['username'] ?>
                                                        </td>
                                                        <td class="text-dark border-b border-[#E8E8E8] bg-white py-5 px-2 text-center text-base font-medium">
                                                            <?= $user['full_name'] ?>
                                                        </td>
                                                        <td class="text-dark border-b border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">
                                                            <?= $user['user_role'] ?>
                                                        </td>
                                                        <td class="text-dark border-b border-[#E8E8E8] bg-white py-5 px-2 text-center text-base font-medium">
                                                            <?php if ($user['pic_url']) : ?>
                                                                <a href="<?= ($user['pic_url']) ?>">pic_url</a>
                                                            <?php else : ?>
                                                                NULL
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="text-dark  border-b border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">
                                                            <?php if ($user['license_url']) : ?>
                                                                <a href="<?= ($user['license_url']) ?>">license_url</a>
                                                            <?php else : ?>
                                                                NULL
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="text-dark border-b border-[#E8E8E8] bg-white py-5 px-2 text-center text-base font-medium">
                                                            <?php if ($user['medical_url']) : ?>
                                                                <a href="<?= ($user['medical_url']) ?>">medical_url</a>
                                                            <?php else : ?>
                                                                NULL
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="text-dark border-b border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">
                                                            <?= $user['created_at'] ?>
                                                        </td>
                                                        <td class="text-dark border-b justify-center flex gap-3 border-r border-[#E8E8E8] bg-white py-5 px-2 text-center text-base font-medium">
                                                            <button type="button" id="promote-<?= $user['username'] ?>" class="PromoteBtn h-8 border-0 outline-0 px-2 flex text-white items-center cursor-pointer bg-gradient-to-tr from-blue-600 to-blue-400 rounded-lg">
                                                                Promote
                                                            </button>
                                                            <button type="button" id="<?= $user['username'] ?>" class="delete-user h-8 border-0 outline-0 px-2 flex text-white items-center cursor-pointer bg-gradient-to-tr from-red-600 to-red-400 rounded-lg">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Table Started -->
                </div>
                <div class="hidden opacity-0" id="medicines" role="tabpanel">
                    <!-- Table Started -->
                    <section class="medicines-table">
                        <div class=" container mx-auto">
                            <div class=" -mx-4 flex flex-wrap">
                                <div class="w-full px-4">
                                    <div class="rounded-lg max-w-full overflow-x-auto">
                                        <table class=" w-full table-auto">
                                            <thead>
                                                <tr class="bg-gradient-to-tr from-blue-600 to-blue-400 text-center">
                                                    <th class="w-1/6 min-w-[160px] border-l border-transparent py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4">
                                                        name
                                                    </th>
                                                    <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4">
                                                        manufacturer
                                                    </th>
                                                    <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4">
                                                        price
                                                    </th>
                                                    <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4">
                                                        quantity
                                                    </th>
                                                    <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4">
                                                        created_at
                                                    </th>
                                                    <th class="w-1/6 min-w-[160px] border-r border-transparent py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4">
                                                        Modify
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($medicines as $medicine) : ?>
                                                    <tr>
                                                        <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">
                                                            <?= $medicine['name'] ?>
                                                        </td>
                                                        <td class="text-dark border-b border-[#E8E8E8] bg-white py-5 px-2 text-center text-base font-medium">
                                                            <?= $medicine['manufacturer'] ?>
                                                        </td>
                                                        <td class="text-dark border-b border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">
                                                            <?= '$' . $medicine['price'] ?>
                                                        </td>
                                                        <td class="text-dark border-b border-[#E8E8E8] bg-white py-5 px-2 text-center text-base font-medium">
                                                            <?= $medicine['quantity'] ?>
                                                        </td>
                                                        <td class="text-dark border-b border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">
                                                            <?= $medicine['created_at'] ?>
                                                        </td>
                                                        <td class="text-dark border-b justify-center flex gap-3 border-r border-[#E8E8E8] bg-white py-5 px-2 text-center text-base font-medium">
                                                            <button type="button" id="edit-<?= $medicine['id'] ?>" data-name='<?= $medicine['name'] ?>' 
                                                            data-price='<?= $medicine['price'] ?>' 
                                                            data-quantity='<?= $medicine['quantity'] ?>' 
                                                            data-manufacturer='<?= $medicine['manufacturer'] ?>' 
                                                            data-pic='<?= $medicine['pic_url'] ?>' class="editMedicines h-8 border-0 outline-0 px-2 flex text-white items-center cursor-pointer bg-gradient-to-tr from-blue-600 to-blue-400 rounded-lg">
                                                                <i class="fa-solid fa-edit"></i>
                                                            </button>
                                                            <button type="button" id="<?= $medicine['id'] ?>" class="
                                                            delete-medicine h-8 border-0 outline-0 px-2 flex text-white items-center cursor-pointer bg-gradient-to-tr from-red-600 to-red-400 rounded-lg">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Table Ended -->
                    <form id="add_medicine_form" class="flex flex-col my-10 gap-5">
                        <h1 class="font-bold text-xl">Add New Medicine</h1>
                        <div class="relative h-10 w-full max-w-[400px] ">
                            <input  class="peer h-full w-full rounded-[7px] border border-blue-gray-200  bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-blue-500 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50" placeholder=" " required type="text" name="name" id="medicine-name" />
                            <label class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-blue-500 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-blue-500 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-blue-500 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                Name
                            </label>
                        </div>
                        <div class="relative h-10 w-full max-w-[400px] ">
                            <input  class="peer h-full w-full rounded-[7px] border border-blue-gray-200  bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-blue-500 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50" placeholder=" " required type="text" name="manufacturer" id="medicine-manufacturer" />
                            <label class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-blue-500 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-blue-500 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-blue-500 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                Manufacturer
                            </label>
                        </div>
                        <div class="relative h-10 w-full max-w-[400px] ">
                            <input  class="peer h-full w-full rounded-[7px] border border-blue-gray-200  bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-blue-500 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50" placeholder=" " required min="0" step="0.01" pattern="[0-9]+(\.[0-9]{1,2})?" type="number" name="price" id="medicine-price" />
                            <label class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-blue-500 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-blue-500 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-blue-500 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                Price(USD)
                            </label>
                        </div>
                        <div class="relative h-10 w-full max-w-[400px] ">
                            <input required class="peer h-full w-full rounded-[7px] border border-blue-gray-200  bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-blue-500 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50" placeholder=" " min="0" max="1000" type="number" name="quantity" id="medicine-quantity" />
                            <label class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-blue-500 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-blue-500 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-blue-500 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                Quantity
                            </label>
                        </div>
                        <div class="relative h-10 w-full max-w-[400px] ">
                            <input required class="peer h-full w-full rounded-[7px] border border-blue-gray-200  bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-blue-500 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50" placeholder=" " type="text" name="img-link" id="medicine-link" />
                            <label class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-blue-500 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-blue-500 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-blue-500 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                Image link
                            </label>
                        </div>
                        <button type=submit id="medicine-form-submit" class="h-10 disabled:bg-gray-200 font-bold border-0 max-w-[200px] text-center outline-0 px-5 py-3 flex text-white items-center   shadow-md shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40  justify-center text-white cursor-pointer bg-gradient-to-tr from-blue-600 to-blue-400 rounded-lg">Add New Medicine</button>
                    </form>
                </div>
                <div class="hidden opacity-0" id="sales" role="tabpanel">
                    <!-- Table Started -->
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
                                                        Username
                                                    </th>
                                                    <th class="w-1/6 min-w-[160px] border-r border-transparent py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4">
                                                        delivery_loc
                                                    </th>
                                                    <th class="w-1/6 min-w-[160px] border-r border-transparent py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4">
                                                        status
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($orders as $order) : ?>
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
                                                            <?= $order['username'] ?></td>
                                                        <td class="text-dark border-b border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">
                                                            <?= $order['delivery_loc'] ?></td>
                                                        <td class="text-dark border-b border-[#E8E8E8] bg-white py-5 px-2 text-center text-base font-medium">
                                                            <div class="inline-flex items-center">
                                                                <?php if ($order['status'] === 'pending') : ?>
                                                                    <label class="relative flex cursor-pointer items-center rounded-full p-3" for="check-<?= $order['order_id'] ?>">
                                                                        <input id="check-<?= $order['order_id'] ?>" type="checkbox" class="orderChecks before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-blue-gray-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-blue-500 checked:bg-blue-500 checked:before:bg-blue-500 hover:before:opacity-10" />
                                                                        <div class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 text-white opacity-0 transition-opacity peer-checked:opacity-100">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor" stroke="currentColor" stroke-width="1">
                                                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                                                            </svg>
                                                                        </div>
                                                                    </label>
                                                                <?php endif; ?>
                                                                <label id="status-<?= $order['order_id'] ?>" class="mt-px cursor-pointer select-none font-light text-gray-700" for="check-<?= $order['order_id'] ?>">
                                                                    <?= $order['status'] ?>
                                                                </label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Table Started -->
                </div>
                <div class="hidden opacity-0" id="hospitals" role="tabpanel">
                    <!-- Table Started -->

                    <section class="orders-table">
                        <div class=" container mx-auto">
                            <div class=" -mx-4 flex flex-wrap">
                                <div class="w-full px-4">
                                    <div class="rounded-lg max-w-full overflow-x-auto">
                                        <table class=" w-full table-auto">
                                            <thead>
                                                <tr class="bg-gradient-to-tr from-blue-600 to-blue-400 text-center">
                                                    <th class="w-1/6 min-w-[160px] border-l border-transparent py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4">
                                                        name
                                                    </th>
                                                    <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4">
                                                        emergency_number
                                                    </th>
                                                    <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4">
                                                        location
                                                    </th>
                                                    <th class="w-1/6 min-w-[160px] py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4">
                                                        created_at
                                                    </th>
                                                    <th class="w-1/6 min-w-[160px] border-r border-transparent py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4">
                                                        Modify
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($hospitals as $hospital) : ?>
                                                    <tr>
                                                        <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">
                                                            <?= $hospital['name'] ?>
                                                        </td>
                                                        <td class="text-dark border-b border-[#E8E8E8] bg-white py-5 px-2 text-center text-base font-medium">
                                                            <?= $hospital['emergency_number'] ?>
                                                        </td>
                                                        <td class="text-dark border-b border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">
                                                            <?= $hospital['loc'] ?>
                                                        </td>
                                                        <td class="text-dark border-b border-[#E8E8E8] bg-white py-5 px-2 text-center text-base font-medium">
                                                            <?= $hospital['created_at'] ?>
                                                        </td>
                                                        <td class="text-dark border-b justify-center flex gap-3 border-r border-[#E8E8E8] bg-[#F3F6FF] py-5 px-2 text-center text-base font-medium">
                                                            <button type="button" id="<?= $hospital['hospital_id'] ?>" class="delete-hospital h-8 border-0 outline-0 px-2 flex text-white items-center cursor-pointer bg-gradient-to-tr from-red-600 to-red-400 rounded-lg">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Table Ended -->
                    <form id="add_hospital_form" class="flex flex-col my-10 gap-5">
                        <h1 class="font-bold text-xl">Add New Hospital</h1>
                        <div class="relative h-10 w-full max-w-[400px] ">
                            <input required class="peer h-full w-full rounded-[7px] border border-blue-gray-200  bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-blue-500 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50" placeholder=" " type="text" name="name" id="hospital-name" />
                            <label class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-blue-500 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-blue-500 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-blue-500 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                Name
                            </label>
                        </div>
                        <div class="relative h-10 w-full max-w-[400px] ">
                            <input required class="peer h-full w-full rounded-[7px] border border-blue-gray-200  bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-blue-500 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50" placeholder=" " type="text" pattern="[0-9()+\- ]*" name="emergency_number" id="emergency_number" />
                            <label class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-blue-500 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-blue-500 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-blue-500 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                Emergency Number
                            </label>
                        </div>
                        <div class="relative h-10 w-full max-w-[400px] ">
                            <input required class="peer h-full w-full rounded-[7px] border border-blue-gray-200  bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-blue-500 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50" placeholder=" " type="text" name="loc" id="hospital-loc" />
                            <label class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-blue-500 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-blue-500 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-blue-500 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                Location
                            </label>
                        </div>
                        <button type=submit id="hospital-form-submit" class="h-10 disabled:bg-gray-200 font-bold border-0 max-w-[200px] text-center outline-0 px-5 py-3 flex text-white items-center  shadow-md shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40  justify-center text-white cursor-pointer bg-gradient-to-tr from-blue-600 to-blue-400 rounded-lg">Add New Hospital</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script defer>
    // System Test Passed For Editing Medicines
    $('.editMedicines').click(function() {
        let medicine = {
            id: $(this).attr('id').split('-')[1],
            name: $(this).attr('data-name'),
            price: $(this).attr('data-price'),
            quantity: $(this).attr('data-quantity'),
            manufacturer: $(this).attr('data-manufacturer'),
            pic_url: $(this).attr('data-pic'),
        }
        
        let htmlFormForEdit = `<form id="edit-medicine-form" class="flex py-2 items-center flex-col gap-4">
            <div class="relative h-10 w-full max-w-[400px] ">
            <input required class="peer h-full w-full rounded-[7px] border border-blue-gray-200  bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-blue-500 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50" placeholder=" " type="text" name="name" id="edit-medicine-name" value="${medicine.name}" />
        <label class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-blue-500 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-blue-500 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-blue-500 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
            Name
        </label>
    </div>
    <div class="relative h-10 w-full max-w-[400px] ">
        <input required min="0" step="0.01" pattern="[0-9]+(\\.[0-9]{1,2})?" class="peer h-full w-full rounded-[7px] border border-blue-gray-200  bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-blue-500 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50" placeholder=" " type="number" name="price" id="edit-medicine-price" value="${medicine.price}" />
        <label class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-blue-500 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-blue-500 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-blue-500 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
            Price
        </label>
    </div>
    <div class="relative h-10 w-full max-w-[400px] ">
        <input required class="peer h-full w-full rounded-[7px] border border-blue-gray-200  bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-blue-500 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50" placeholder=" " min="0" max="1000" type="number" name="quantity" id="edit-medicine-quantity" value="${medicine.quantity}" />
        <label class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-blue-500 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-blue-500 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-blue-500 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
            Quantity
        </label>
    </div>
    <div class="relative h-10 w-full max-w-[400px] ">
        <input required class="peer h-full w-full rounded-[7px] border border-blue-gray-200  bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-blue-500 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50" placeholder=" " type="text" name="manufacturer" id="edit-medicine-manufacturer" value="${medicine.manufacturer}" />
        <label class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-blue-500 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-blue-500 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-blue-500 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
            Manufacturer
        </label>
    </div>
    <div class="relative h-10 w-full max-w-[400px] ">
        <input required class="peer h-full w-full rounded-[7px] border border-blue-gray-200  bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-blue-500 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50" placeholder=" " type="text" name="pic_url" id="edit-medicine-pic_url" value="${medicine.pic_url}" />
        <label class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-blue-500 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-blue-500 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-blue-500 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
            Picture URL
        </label>
    </div>
</form>`;
        Swal.fire({
            title: 'Edit Medicine',
            html: htmlFormForEdit,
            showCancelButton: true,
            confirmButtonColor: '#3C79F1',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Edit',
            preConfirm: () => {
                if(!(isValidUrl($('#edit-medicine-pic_url').val()) || $('#edit-medicine-pic_url').val()=='')) {
                    Swal.showValidationMessage("Please enter a valid URL");
                }else{

                    let data = new URLSearchParams();
                    data.append('id', medicine.id);
                    data.append('name', $('#edit-medicine-name').val());
                    data.append('price', $('#edit-medicine-price').val());
                    data.append('quantity', $('#edit-medicine-quantity').val());
                    data.append('manufacturer', $('#edit-medicine-manufacturer').val());
                    data.append('pic_url', $('#edit-medicine-pic_url').val());
                    return fetch('/api/medicines/edit.php', {
                        method: 'POST',
                        body: data
                    }).then(res => {
                        if (!res.ok) {
                            throw new Error("Error editing");
                        }
                        return res.json();
                    }).catch(err => Swal.showValidationMessage(err.message));
                }
            },
            showLoaderOnConfirm: true,
            allowOutsideClick: () => !Swal.isLoading(),
        }).then((result) => {
            if (result.isConfirmed) {
                showSuccessMessage(`${medicine.name} Edited`)
            }
        })
    })







    // System Test Passed For Promoting User To Doctor
    $('.PromoteBtn').click(function() {
        let user_id = $(this).attr('id').split('-')[1];
        Swal.fire({
            icon: 'warning',
            title: 'Are you sure?',
            text: `${user_id} will be promoted to doctor`,
            showCancelButton: true,
            confirmButtonColor: '#3C79F1',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Promote',
            preConfirm: () => {
                let data = new URLSearchParams();
                data.append('id', user_id);
                return fetch('/api/user/promote_to_doctor.php', {
                    method: 'POST',
                    body: data
                }).then(res => {
                    if (!res.ok) {
                        throw new Error("Error promoting");
                    }
                    return res.json();
                }).catch(err => Swal.showValidationMessage(err.message));
            },
            showLoaderOnConfirm: true,
            allowOutsideClick: () => !Swal.isLoading(),
        }).then((result) => {
            if (result.isConfirmed) {
                showSuccessMessage(`${user_id} Promoted`)
            }
        })
    })
    // System Test Passed For Deleting all stuff
    function deleteEntity(del_id, req_url, ename = null) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3C79F1',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            preConfirm: () => {
                let data = new URLSearchParams();
                data.append('id', del_id);
                return fetch(req_url, {
                    method: 'POST',
                    body: data
                }).then(res => {
                    if (!res.ok) {
                        throw new Error("Error deleting");
                    }
                    return res.json();
                }).catch(err => Swal.showValidationMessage(err.message));
            },
            showLoaderOnConfirm: true,
            allowOutsideClick: () => !Swal.isLoading(),
        }).then(async (result) => {
            if (result.isConfirmed) {
                showSuccessMessage(ename ? `${ename} Deleted` : "Deleted");
            }
        })
    }

    $('.delete-user').click(function() {
        deleteEntity($(this).attr('id'), '/api/user/delete_user.php', 'User');
    })

    $('.delete-medicine').click(function() {
        deleteEntity($(this).attr('id'), '/api/medicines/delete_medicine.php', 'Medicine');
    })

    $('.delete-hospital').click(function() {
        deleteEntity($(this).attr('id'), '/api/hospital/delete_hospital.php', 'Hospital');
    })

    // Test Passed Delieverd System
    $('.orderChecks').click(function() {
        if ($(this).is(':checked')) {
            $(this).attr('disabled', true);
            let order_id = $(this).attr('id').split('-')[1];
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to mark this order as completed?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3C79F1',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, mark it!',
                preConfirm: () => {
                    let data = new URLSearchParams();
                    data.append('id', order_id);
                    return fetch('/api/medicines/complete_order.php', {
                        method: 'POST',
                        body: data
                    }).then(res => {
                        if (!res.ok)
                            throw new Error("Error in completing order");
                        return res.json();
                    }).catch(err => Swal.showValidationMessage(`Request failed: ${err.message}`))
                },
                showLoaderOnConfirm: true,
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#status-' + order_id).text('Delivered');
                    showSuccessMessage("Order Delivered")
                } else {
                    $(this).attr('disabled', false);
                }
            })
        }
    })


    // Test Passed Add Medicines System
    $('#add_medicine_form').submit(async e => {
        e.preventDefault();
        document.querySelector("#medicine-form-submit").disabled = true;
        if (!isValidUrl($('#medicine-link').val())) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Not Valid Image URL'
            })
            return false;
        }
        let data = new URLSearchParams();

        data.append('name', $('#medicine-name').val());
        data.append('manufacturer', $('#medicine-manufacturer').val());
        data.append('quantity', $('#medicine-quantity').val());
        data.append('price', $('#medicine-price').val());
        data.append('pic_url', $('#medicine-link').val());
        try {

            let res = await fetch('/api/medicines/add_medicine.php', {
                method: 'POST',
                body: data
            })
            if (!res.ok) throw new Error('Error in Uploading Data');
            Swal.fire({
                icon: "success",
                title: 'Medicine Uploaded',
                showConfirmButton: true,
                confirmButtonText: 'Ok',
                confirmButtonColor: '#3C79F1',
                footer: "refresh page to see"
            })
        } catch (err) {
            showErrorMessage(err.message);
        }
        document.querySelector("#medicine-form-submit").disabled = false;

    })
    // Test Passed Add Hospital System
    $('#add_hospital_form').submit(async e => {
        e.preventDefault();
        document.querySelector("#hospital-form-submit").disabled = true;
        let data = new URLSearchParams();
        data.append('name', $('#hospital-name').val());
        data.append('emergency_number', $('#emergency_number').val());
        data.append('loc', $('#hospital-loc').val());
        try {

            let res = await fetch('/api/hospital/add_hospital.php', {
                method: 'POST',
                body: data
            })
            if (!res.ok) throw new Error('Error in Uploading Data');
            Swal.fire({
                icon: "success",
                title: 'Hospital Data Uploaded',
                showConfirmButton: true,
                confirmButtonText: 'Ok',
                confirmButtonColor: '#3C79F1',
                footer: "refresh page to see"
            })
        } catch (err) {
            showErrorMessage(err.message);
        }
        document.querySelector("#hospital-form-submit").disabled = false;

    })
</script>
<?php require_once "components/dash_bottom_view.php"; ?>
<?php require_once "components/footer_view.php"; ?>