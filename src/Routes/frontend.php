<?php

$app->get('/', 'YAUS\Controller\HomepageController:hp')->setName('yaus.website.hp');
$app->post('/urls/add', 'YAUS\Controller\HomepageController:addUrl')->setName('yaus.homepage.urls.add');