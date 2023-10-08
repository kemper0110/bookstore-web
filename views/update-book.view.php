<?php
$form_errors = $_SESSION['form_errors'] ?? [];
$form_data = array_map(fn($value) => $value === "" ? null : $value,
    $_SESSION['form_data'] ?? []);

unset($_SESSION['form_errors']);
unset($_SESSION['form_data']);
?>

<?php require "partials/header.view.php" ?>
<section class="h-full w-full">
    <form class="mt-4 mx-auto max-w-[400px]" action="" method="post" enctype="multipart/form-data">
        <h1 class="text-3xl text-center font-semibold">
            <?php if ($book['id']): ?>
                Обновление книги
            <?php else: ?>
                Добавление книги
            <?php endif; ?>
        </h1>
        <label class="mt-4 block text-xl" for="name">
            Название
        </label>
        <input value="<?= $form_data['name'] ?? $book['name'] ?? null ?>"
               class="py-1 px-1.5 w-full rounded-md border border-solid border-slate-600" id="name" name="name"
               type="text">
        <span class="text-red-600 font-medium text-sm">
            <?= $form_errors['name'] ?? null ?>
        </span>

        <label class="mt-4 block text-xl" for="price">
            Цена
        </label>
        <input value="<?= $form_data['price'] ?? $book['price'] ?? null ?>"
               class="py-1 px-1.5 w-full rounded-md border border-solid border-slate-600" id="price" name="price"
               type="number">
        <span class="text-red-600 font-medium text-sm">
            <?= $form_errors['price'] ?? null ?>
        </span>

        <label class="mt-4 block text-xl" for="rating">
            Рейтинг
        </label>
        <input value="<?= $form_data['rating'] ?? $book['rating'] ?? null ?>"
               class="py-1 px-1.5 w-full rounded-md border border-solid border-slate-600" id="rating" name="rating"
               type="number">
        <span class="text-red-600 font-medium text-sm">
            <?= $form_errors['rating'] ?? null ?>
        </span>

        <label class="mt-4 block text-xl" for="image">
            Изображение
        </label>
        <input
                class="py-1 px-1.5 w-full rounded-md border border-solid border-slate-600" id="image" name="image"
                type="file"
                accept="image/*"
        >
        <img id="preview" class="mx-auto mt-4 max-h-[200px] w-auto" alt="<?= $book['name'] ?>"
            <?php if ($book['image']): ?>
                src="<?= image_url($book['image']) ?>"
            <?php endif; ?>
        />

        <?php if ($book['image']): ?>
            <input name="image" value="<?= $book['image'] ?>" type="hidden">
        <?php endif; ?>

        <label class="mt-4 block text-xl" for="book_type">
            Тип книги
        </label>
        <select
                class="w-full px-2 py-1.5 rounded-md border border-solid border-slate-600" id="book_type"
                name="book_type">
            <?php foreach ($book_types as $book_type): ?>
                <option value="<?= $book_type['id'] ?>"
                    <?= ($form_data['book_type'] ?? $book['type_id'] ?? null) == $book_type['id'] ? 'selected' : '' ?>
                >
                    <?= $book_type['name'] ?>
                </option>
            <?php endforeach; ?>
        </select>
        <span class="text-red-600 font-medium text-sm">
            <?= $form_errors['book_type'] ?? null ?>
        </span>

        <button class="w-full mt-4 px-2 py-2 bg-blue-500 hover:bg-blue-600 text-slate-100 font-semibold rounded-xl"
                type="submit">
            Сохранить
        </button>
        <?php if ($book['id']): ?>
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

