Верхнее меню
<ul id="<?= $menuId ?>" class="clear-fix">
    <?php foreach ($items as $item) : ?>
        <li>
            <?php
            echo $item->name;
            $subItems = $item->getChildren();
            ?>
            <?php if (count($subItems) > 0) : ?>
                <ul>
                    <?php foreach ($subItems as $subItem) : ?>
                        <li><?= $subItem->name ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>