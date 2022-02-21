<?php

return array(
    'name' => 'Image For Category',
    'img' => 'img/categoryImage.png',
    'handlers' => array(
        'backend_category_dialog' => 'categoryDialog',
        'category_save' => 'categorySave',
        'category_delete' => 'categoryDelete',
        'frontend_category' => 'frontendCategory',
        'backend_products.title_suffix' => 'backendProducts',
    )
);
