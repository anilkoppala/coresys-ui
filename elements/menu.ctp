<nav class="menu">
    <ul class="sf-menu">
        <li class="current">
            <?php print $this->Html->link('Item 1', '/item1'); ?>
            <ul>
                <li>
                    <?php print $this->Html->link('Sub Item 1', '/item1/subitem1'); ?>
                    <ul>
                        <li><?php print $this->Html->link('Sub-Sub Item 1', '/item1/subitem1/subsubitem1'); ?></li>
                        <li><?php print $this->Html->link('Sub-Sub Item 2', '/item1/subitem1/subsubitem2'); ?></li>
                        <li><?php print $this->Html->link('Sub-Sub Item 3', '/item1/subitem1/subsubitem3'); ?></li>
                        <li><?php print $this->Html->link('Sub-Sub Item 4', '/item1/subitem1/subsubitem4'); ?></li>
                        <li><?php print $this->Html->link('Sub-Sub Item 5', '/item1/subitem1/subsubitem5'); ?></li>
                    </ul>
                </li>
                <li class="current">
                    <?php print $this->Html->link('Sub Item 2', '/item1/subitem2'); ?>
                </li>
                <li>
                    <?php print $this->Html->link('Sub Item 3', '/item1/subitem3'); ?>
                </li>
                <li>
                    <?php print $this->Html->link('Sub Item 4', '/item1/subitem4'); ?>
                </li>
            </ul>
        </li>
        <li>
            <?php print $this->Html->link('Item 2', '/item2'); ?>
        </li>
        <li>
            <?php print $this->Html->link('Item 3', '/item3'); ?>
        </li>
        <li>
            <?php print $this->Html->link('Item 4', '/item4'); ?>
        </li>
    </ul>
    <div class="clear_both"></div>
</nav>