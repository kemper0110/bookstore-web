<?php require "partials/header.view.php" ?>

<section class="w-full">
    <a href="/admin" class="text-blue-600 underline underline-offset-4 hover:no-underline text-lg">
        Назад
    </a>
    <div class="mt-8 flex gap-2">
        <div class="w-1/2">
            <form method="post">
                <div class="flex justify-between">
                    <label for="code" class="text-xl font-medium">
                        "<?= $editor['filename'] ?>"
                    </label>
                    <div class="flex gap-2">
                        <button type="submit" name="apply"
                                class="px-3 py-2 text-white font-semibold bg-blue-400 hover:bg-blue-500 rounded-md border-2 border-solid border-blue-500"
                                onclick="onReloadPreview()">
                            Применить
                        </button>
                        <button type="submit" name="restore"
                                class="px-3 py-2 text-white font-semibold bg-red-400 hover:bg-red-500 rounded-md border-2 border-solid border-red-500">
                            Отменить изменения
                        </button>
                        <button type="submit" name="commit"
                                class="px-3 py-2 text-white font-semibold bg-green-400 hover:bg-green-500 rounded-md border-2 border-solid border-green-500">
                            Коммит
                        </button>
                    </div>
                </div>
                <textarea name="code" id="code" class="px-2 py-1 mt-4 block w-full h-[70vh] border border-gray-400 rounded-md"
                ><?=$editor['code']?></textarea>
            </form>
        </div>
        <div class="w-1/2">
            <div class="flex flex-col h-full">
                <div class="flex justify-end gap-2">
                    <button class="px-3 py-2 text-white font-semibold bg-blue-400 hover:bg-blue-500 rounded-md border-2 border-solid border-blue-500"
                            onclick="onReloadPreview()">
                        Обновить
                    </button>
                    <!--                <button class="px-3 py-2 text-white font-semibold bg-blue-400 hover:bg-blue-500 rounded-md border-2 border-solid border-blue-500"-->
                    <!--                        onclick="onOpenFullScreen()"-->
                    <!--                >-->
                    <!--                    Полный экран-->
                    <!--                </button>-->
                </div>
                <div class="mt-4 h-full">
                    <iframe class="bg-white w-full h-full border border-gray-400 rounded-md" id="preview"
                            allowfullscreen="allowfullscreen"
                            src="<?= $editor['href'] ?>"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    const preview = document.getElementById('preview')

    function onReloadPreview() {
        preview.src = preview.src
    }

    // const styles = ['fixed', 'inset-4', 'w-full', 'h-full', 'overflow-hidden', 'z-50', 'p-0', 'm-0',
    //     "before:content-['']", 'before:fixed', 'before:left-0', 'before:top-0', 'before:w-6', 'before:h-6',
    //     'before:bg-white', 'before:z-50'
    // ]

    // function onOpenFullScreen() {
    //     preview.classList.add(...styles)
    // }
    //
    // function onExitFullScreen(e) {
    //     if (e.keyCode === 27) {
    //         preview.classList.remove(...styles)
    //     } else {
    //         console.log('bad key');
    //     }
    // }
</script>

<?php require "partials/footer.view.php" ?>
