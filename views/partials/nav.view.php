<?php
$links = [
    'О магазине' => '/about-store.php',
    'Об авторе' => '/about-me.php',
    'Главная' => [
        'url' => '/',
        'items' => [
            'Художественная литература' => '/fiction.php',
            'Комиксы' => '/comic.php',
            'Образовательная литература' => '/education.php'
        ]
    ]
];
?>

<aside class="md:w-[260px] w-full">
    <nav>
        <ul class="flex md:block m-0 list-none px-[0.2rem] overflow-x-scroll md:overflow-auto">
            <?php foreach ($links as $heading => $url): ?>
                <?php if (gettype($url) === 'array'): ?>
                    <li class="flex md:block">
                        <a class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-600 outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none motion-reduce:transition-none"
                            href=<?= $url['url'] ?>
                        >
                            <span
                                    class="me-4">
                                <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24"
                                        fill="currentColor"
                                        class="h-4 w-4">
                                  <path
                                          fill-rule="evenodd"
                                          d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-2.625 6c-.54 0-.828.419-.936.634a1.96 1.96 0 00-.189.866c0 .298.059.605.189.866.108.215.395.634.936.634.54 0 .828-.419.936-.634.13-.26.189-.568.189-.866 0-.298-.059-.605-.189-.866-.108-.215-.395-.634-.936-.634zm4.314.634c.108-.215.395-.634.936-.634.54 0 .828.419.936.634.13.26.189.568.189.866 0 .298-.059.605-.189.866-.108.215-.395.634-.936.634-.54 0-.828-.419-.936-.634a1.96 1.96 0 01-.189-.866c0-.298.059-.605.189-.866zm2.023 6.828a.75.75 0 10-1.06-1.06 3.75 3.75 0 01-5.304 0 .75.75 0 00-1.06 1.06 5.25 5.25 0 007.424 0z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </span>
                            <span>
                                    <?= $heading ?>
                            </span>
                        </a>
                        <ul class="flex m-0 list-none p-0 md:block">
                            <?php foreach ($url['items'] as $heading => $url): ?>
                                <li>
                                    <a class="flex h-12 md:h-6 cursor-pointer items-center truncate rounded-[5px] py-4 md:pl-[3.4rem] pl-6 pr-6 text-[0.78rem] text-gray-600 outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none motion-reduce:transition-none"
                                       href=<?= $url ?>
                                    >
                                        <?= $heading ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php else: ?>
                    <li>
                        <a class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-600 outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none motion-reduce:transition-none"
                           href=<?= $url ?>
                        >
                            <span class="me-4">
                                <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="h-4 w-4">
                                  <path
                                          stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M15.182 15.182a4.5 4.5 0 01-6.364 0M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z"/>
                                </svg>
                            </span>
                            <span>
                                    <?= $heading ?>
                            </span>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </nav>
</aside>
