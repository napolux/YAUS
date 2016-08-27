<?php

$app->get('/api/urls', 'YAUS\Api\UrlApiAction:fetchAll')->setName('yaus.api.fetchall');
$app->get('/api/urls/{searchby}', 'YAUS\Api\UrlApiAction:fetchOne')->setName('yaus.api.fetchone');
$app->get('/api/urls/page/{page}[/{pageSize}]', 'YAUS\Api\UrlApiAction:fetchPaginated')->setName('yaus.api.fetchpaginated');
$app->post('/api/urls/add','YAUS\Api\UrlApiAction:addOne')->setName('yaus.api.addone');