<?php require_once "components/header_view.php"; ?>
<?php require_once "components/dash_top_view.php" ?>
<!-- pages -->
<section class="doctors flex flex-col w-full gap-5 py-7 ">
    <?php foreach ($hospitals as $hospital) : ?>
        <div id="hospital-<?= $hospital['hospital_id'] ?>" class="flex px-5 gap-4 items-center justify-between">
            <span class="flex h-16 gap-5">
                <div class="rounded-lg h-full bg-gradient-to-tr from-blue-600 to-blue-400 w-16">
                </div>
                <div class="flex flex-col justify-center">
                    <h3 class="text-xl capitalize"><?= $hospital['name'] ?></h3>
                    <p class="text-sm opacity-60">
                        <?= $hospital['loc'] ?? "" ?>
                    </p>
                </div>
            </span>
            <span class="flex gap-5">
                <a href="tel:<?= removeFirstPlusCharacter($hospital['emergency_number']) ?>">
                    <button type="button" class="h-8 border-0 outline-0 px-4 py-2 flex text-white items-center cursor-pointer bg-gradient-to-tr from-red-600 to-red-400 rounded-lg">
                        Emergency Call
                    </button>
                </a>
            </span>
        </div>
    <?php endforeach; ?>
</section>
<?php require_once "components/dash_bottom_view.php" ?>
<?php require_once "components/footer_view.php"; ?>