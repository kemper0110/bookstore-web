<?php require "partials/header.view.php" ?>
<?php require "partials/nav.view.php" ?>
<?php require_once "../functions.php"?>
    <section
            class="mt-5 md:mt-5 w-full grid grid-cols-[repeat(auto-fill,minmax(200px,1fr))] gap-8 place-items-center items-start">
        <?php foreach ($data['books'] as $book): ?>





            <a href="<?= "/book/${book['id']}" ?>">
                <article
                        class=" rounded-xl transition-all motion-reduce:transition-none duration-200 hover:ring-2 ring-slate-200 hover:shadow-2xl p-4 -m-4 max-w-[300px]">
                    <figure class="w-full">
                        <div class="relative after:content-[''] after:absolute after:inset-0 after:bg-[rgba(41,43,83,.03)] after:block">
                            <img class="h-auto max-w-full w-full"
                                 src="<?= image_url($book['image']) ?>"
                                 alt="<?= $book['name'] ?>"
                            />
                        </div>
                        <figcaption class="p-2">
                            <h2 class="text-xl font-semibold">
                                <?= $book['price'] ?> P
                            </h2>
                            <div class="flex justify-between items-start">
                                <h1>
                                    <?= $book['name'] ?>
                                </h1>
                                <p class="flex gap-1 items-center">
                                    <img src="/img/star.svg" class="w-3 h-3" alt=""/>
                                    <?= $book['rating'] ?>
                                </p>
                            </div>
                        </figcaption>
                    </figure>
                </article>
            </a>
        <?php endforeach; ?>
    </section>
<?php require "partials/footer.view.php" ?>