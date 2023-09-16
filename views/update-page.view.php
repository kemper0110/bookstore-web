<?php require "partials/header.view.php" ?>

<section class="w-full mt-8">
    <form method="post">
        <div class="flex justify-between">
            <label for="code" class="text-xl font-medium">
                "<?= $editor['filename'] ?>"
            </label>
            <div class="flex gap-2">
                <button type="reset" class="px-3 py-2 text-white font-semibold bg-red-400 hover:bg-red-500 rounded-md border-2 border-solid border-red-500">
                    Отменить изменения
                </button>
                <button type="submit" class="px-3 py-2 text-white font-semibold bg-green-400 hover:bg-green-500 rounded-md border-2 border-solid border-green-500">
                    Коммит
                </button>
            </div>
        </div>
        <textarea id="code" class="mt-4 block w-full h-[70vh] border border-gray-400 rounded-md">
            <?= $editor['code'] ?>
        </textarea>
    </form>
</section>

<?php require "partials/footer.view.php" ?>
