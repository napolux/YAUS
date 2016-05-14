<?php

$app->get('/', function ($request, $response, $args) {
    return $this->view->render($response, 'website/pages/homepage.twig', []);
})->setName('yaus.website.hp');

$app->get('/privacy', function ($request, $response, $args) {

    return $this->view->render($response, 'website/pages/privacy.twig', []);

})->setName('yaus.website.privacy');


// Admin
$app->get('/admin', function ($request, $response, $args) {
    return $this->view->render($response, 'admin/pages/homepage.twig', []);
})->setName('yaus.admin.hp');

$app->post('/admin/urls/add', 'YAUS\Controller\AdminUrlController:addUrl')->setName('yaus.admin.urls.add');
$app->post('/admin/urls/edit', 'YAUS\Controller\AdminUrlController:editUrl')->setName('yaus.admin.urls.edit');
$app->get('/admin/urls[/{page}]', 'YAUS\Controller\AdminUrlController:listUrls')->setName('yaus.admin.urls');
$app->get('/admin/urls/delete/{id}', 'YAUS\Controller\AdminUrlController:deleteUrl')->setName('yaus.admin.urls.delete');

// APIs
$app->get('/api/urls', 'YAUS\Api\UrlApiAction:fetchAll')->setName('yaus.api.fetchall');
$app->get('/api/urls/{searchby}', 'YAUS\Api\UrlApiAction:fetchOne')->setName('yaus.api.fetchone');
$app->get('/api/urls/page/{page}[/{pageSize}]', 'YAUS\Api\UrlApiAction:fetchPaginated')->setName('yaus.api.fetchpaginated');