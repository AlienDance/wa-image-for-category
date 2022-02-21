<?php

$model = new waModel();

$model->exec("ALTER TABLE shop_category ADD image_reference varchar(255)");
