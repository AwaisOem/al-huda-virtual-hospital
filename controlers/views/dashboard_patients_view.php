<?php require_once "components/header_view.php"; ?>
<?php require_once "components/dash_top_view.php" ?>
<!-- pages -->
<section class="doctors flex flex-col w-full gap-5 py-7 ">
    <?php foreach ($patients as $patient) : ?>
        <div id="patient-<?= $patient['patient_id'] ?>" class="flex px-5 gap-4 items-center justify-between">
            <span class="flex h-16 gap-5">
                <div class="rounded-lg h-full bg-gradient-to-tr from-blue-600 to-blue-400 w-16">
                    <?php if(isset($patient['pic_url']) &&  $patient['pic_url']): ?>
                        <img src="<?= $patient['pic_url'] ?>" class="rounded-lg w-full h-full" alt="">
                    <?php endif;?>
                </div>
                <div class="flex flex-col justify-center">
                    <h3 class="capitalize text-xl"><?= $patient['full_name'] ?></h3>
                    <p class="text-sm opacity-60">
                        <?= $patient['time_left']." left" ?>
                    </p>
                </div>
            </span>
            <span class="flex gap-5">
                <a href="/vidcall">
                    <button type="button" id="CallP-<?=$patient['patient_id']?>" class="CallP h-8 border-0 outline-0 px-4 py-2 flex gap-2 text-white items-center cursor-pointer bg-gradient-to-tr from-violet-600 to-violet-400 rounded-lg">
                        <i class="fa-solid fa-video"></i>
                        Call
                    </button>
                </a>
                <a href="<?=$patient['medical_url'] ?? "#" ?>">
                    <button type="button" class="h-8 border-0 outline-0 px-4 py-2 flex text-white items-center cursor-pointer bg-gradient-to-tr from-blue-600 to-blue-400 rounded-lg">
                        Medical File
                    </button>
                </a>
            </span>
        </div>
    <?php endforeach; ?>
</section>
<?php require_once "components/dash_bottom_view.php" ?>
<?php require_once "components/footer_view.php"; ?>