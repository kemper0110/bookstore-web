<?php require "partials/header.view.php" ?>
<?php require_once "../functions.php" ?>

<?php
$slider = [
    $book['image'], $book['image'], $book['image'],
    $book['image'], $book['image']
];
$slider_col = [
    $book['image'], $book['image'], $book['image'],
    $book['image'], $book['image']
];
?>


<section class="w-full">
    <!--   anchor to book type all books page     -->
    <a class="ms-2 text-blue-600 hover:text-blue-700 text-lg underline underline-offset-2 hover:no-underline"
       href="/<?= $book['type_id'] . '.php' ?>">
        <?= $book['book_type_name'] ?>
    </a>

    <div class="mt-12 flex flex-wrap gap-4 justify-between">
        <div class="flex gap-4">
            <ul class="mt-4 flex flex-col gap-2">
                <?php foreach ($slider_col as $image): ?>
                    <li class="hover:border-purple-600 border-2 border-transparent rounded-lg">
                        <img class="w-[70px] h-[90px] rounded-lg" src="<?= image_url($book['image']) ?>"
                             alt="<?= $book['name'] ?>"/>
                    </li>
                <?php endforeach; ?>
            </ul>
            <img class="max-w-[400px] h-auto rounded-xl"
                 src="<?= image_url($book['image']) ?>" alt="<?= $book['name'] ?>"/>
        </div>

        <!--        <div class="flex flex-row flex-wrap gap-6">-->
        <div class="flex flex-col gap-6">
            <div class="flex gap-3">
                <?php foreach ($slider as $image): ?>
                    <div>
                        <div class="relative group max-h-min">
                            <img src="<?= image_url($book['image']) ?>" alt="<?= $book['name'] ?>"
                                 class="max-w-[50px] h-auto"/>
                            <div class="bg-white absolute top-[110%] rounded-lg shadow-2xl p-1.5 invisible opacity-0 scale-0 group-hover:visible group-hover:opacity-100 group-hover:scale-100 transition-all duration-400">
                                <figure>
                                    <img src="<?= image_url($book['image']) ?>" alt="<?= $book['name'] ?>"
                                         class="max-w-[150px] h-auto"/>
                                    <figcaption class="font-semibold">
                                        <?= $book['price'] ?> P
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div>
                <figure>
                    <figcaption class="font-semibold">
                        Дополнительная информация
                    </figcaption>
                    <ul>
                        <?php foreach ($book_props as $key => $value): ?>
                            <li class="flex text-sm my-1">
                                <div class="w-3/4 shrink whitespace-nowrap text-gray-500">
                                    <?= $key ?>
                                </div>
                                <div class="w-1/4">
                                    <?= $value ?>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </figure>
            </div>
        </div>

        <div class="max-w-[340px] w-full flex flex-col gap-8">
            <div class="p-6 shadow-xl max-h-[300px] rounded-xl">
                <p class="flex items-end gap-2">
                    <span class="font-semibold text-3xl">
                        <?= $book['price'] ?> ₽
                    </span>
                    <del class="line-through text-sm text-gray-500">
                        1&nbsp;404&nbsp;₽
                    </del>
                </p>
                <p class="mt-4 flex gap-1 px-4 py-1.5 items-center justify-start bg-gray-100 rounded-lg text-green-600">
                    <span class="text-2xl font-extrabold">↓</span>
                    <span class="font-semibold">
                    67&nbsp;₽
                </span>
                </p>
                <p class="mt-4 text-sm">
                    15 сентября
                    <span class="text-gray-400">доставка со склада</span>
                </p>
                <p class="text-gray-400 text-sm">
                    Главный склад
                </p>
            </div>
            <div class="p-6 flex gap-4 shadow-xl rounded-xl">
                <div class="aspect-square w-10 h-10">
                    <img src="/img/house.jpg" alt="" class="rounded-xl"/>
                </div>
                <div class="text-sm">
                    <p class="font-semibold">
                        Много книг
                    </p>
                    <p class="flex gap-1 items-center">
                        <img class="w-4 h-4" src="/img/star.svg" alt="">
                        <span class="">
                            4.9
                        </span>
                        <span class="text-gray-400">
                             • 469 392 оценки
                        </span>
                    </p>
                </div>
            </div>
        </div>
        <!--        </div>-->
    </div>

</section>

<?php require "partials/footer.view.php" ?>

