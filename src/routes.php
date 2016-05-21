<?php

// Frontend
$app->get('/', 'YAUS\Controller\HomepageController:hp')->setName('yaus.website.hp');
$app->post('/urls/add', 'YAUS\Controller\HomepageController:addUrl')->setName('yaus.homepage.urls.add');

// Admin
$app->get('/admin', 'YAUS\Controller\AdminHpController:homepage')->setName('yaus.admin.hp');
$app->post('/admin/urls/add', 'YAUS\Controller\AdminUrlController:addUrl')->setName('yaus.admin.urls.add');
$app->post('/admin/urls/edit', 'YAUS\Controller\AdminUrlController:editUrl')->setName('yaus.admin.urls.edit');
$app->get('/admin/urls[/{page}]', 'YAUS\Controller\AdminUrlController:listUrls')->setName('yaus.admin.urls');
$app->get('/admin/urls/delete/{id}', 'YAUS\Controller\AdminUrlController:deleteUrl')->setName('yaus.admin.urls.delete');

// APIs
$app->get('/api/urls', 'YAUS\Api\UrlApiAction:fetchAll')->setName('yaus.api.fetchall');
$app->get('/api/urls/{searchby}', 'YAUS\Api\UrlApiAction:fetchOne')->setName('yaus.api.fetchone');
$app->get('/api/urls/page/{page}[/{pageSize}]', 'YAUS\Api\UrlApiAction:fetchPaginated')->setName('yaus.api.fetchpaginated');

// Redirection
$app->get('/u/{shortUrl}/json', 'YAUS\Controller\RedirectController:urlWithJSON')->setName('yaus.redirect.json');
$app->get('/u/{shortUrl}', 'YAUS\Controller\RedirectController:url')->setName('yaus.redirect.url');
