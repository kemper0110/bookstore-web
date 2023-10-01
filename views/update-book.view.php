<?php require "partials/header.view.php" ?>
<section class="h-full w-full">
    <form class="mt-4 mx-auto max-w-[400px]" action="" method="post" enctype="multipart/form-data">
        <h1 class="text-3xl text-center font-semibold">
            <?php if($book['id']): ?>
                Обновление книги
            <?php else: ?>
                Добавление книги
            <?php endif; ?>
        </h1>
        <label class="mt-4 block text-xl" for="name">
            Название
        </label>
        <input value="<?= $book['name'] ?>"
                class="py-1 px-1.5 w-full rounded-md border border-solid border-slate-600" id="name" name="name" type="text">

        <label class="mt-4 block text-xl" for="price">
            Цена
        </label>
        <input value="<?= $book['price'] ?>"
                class="py-1 px-1.5 w-full rounded-md border border-solid border-slate-600" id="price" name="price" type="number">

        <label class="mt-4 block text-xl" for="rating">
            Рейтинг
        </label>
        <input value="<?= $book['rating'] ?>"
                class="py-1 px-1.5 w-full rounded-md border border-solid border-slate-600" id="rating" name="rating" type="number">

        <label class="mt-4 block text-xl" for="image">
            Изображение
        </label>
        <input value="<?= $book['image'] ?>"
               class="py-1 px-1.5 w-full rounded-md border border-solid border-slate-600" id="image" name="image" type="file"
               accept="image/*"
        >
        <img id="preview" class="mx-auto mt-4 max-h-[200px] w-auto" src="<?= $book['image'] ?>" alt="<?= $book['name'] ?>"/>

        <?php if ($book['image']): ?>
            <input name="image" value="<?= $book['image'] ?>" type="hidden">
        <?php endif; ?>

        <label class="mt-4 block text-xl" for="book_type">
            Тип книги
        </label>
        <select
                class="w-full px-2 py-1.5 rounded-md border border-solid border-slate-600" id="book_type" name="book_type">
            <?php foreach ($book_types as $book_type): ?>
                <option value="<?= $book_type['id'] ?>"
                    <?= $book['type_id'] == $book_type['id'] ? 'selected' : '' ?>
                >
                    <?= $book_type['name'] ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button class="w-full mt-4 px-2 py-2 bg-blue-500 hover:bg-blue-600 text-slate-100 font-semibold rounded-xl"
                type="submit">
            Сохранить
        </button>
        <?php if($book['id']): ?>
        <button name="delete"
                class="w-full mt-1 px-2 py-2 bg-red-500 hover:bg-red-600 text-white font-semibold rounded-xl"
        >
            Удалить
        </button>
        <?php endif; ?>
    </form>
</section>

<script>
    function onimagechange(evt) {
        console.log(evt)
        const file = evt.target.files[0]
        const reader = new FileReader;
        reader.onload = () => {
            preview.src = reader.result
        }
        reader.readAsDataURL(file)
    }
    image.onchange = onimagechange;
</script>

<?php require "partials/footer.view.php" ?>

