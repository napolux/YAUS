<?php

$app->get('/admin', 'YAUS\Controller\AdminHpController:homepage')->setName('yaus.admin.hp');
$app->post('/admin/urls/add', 'YAUS\Controller\AdminUrlController:addUrl')->setName('yaus.admin.urls.add');
$app->post('/admin/urls/edit', 'YAUS\Controller\AdminUrlController:editUrl')->setName('yaus.admin.urls.edit');
$app->get('/admin/urls[/{page}]', 'YAUS\Controller\AdminUrlController:listUrls')->setName('yaus.admin.urls');
$app->get('/admin/urls/delete/{id}', 'YAUS\Controller\AdminUrlController:deleteUrl')->setName('yaus.admin.urls.delete');
