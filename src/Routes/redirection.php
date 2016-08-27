<?php

$app->get('/u/{shortUrl}/json', 'YAUS\Controller\RedirectController:urlWithJSON')->setName('yaus.redirect.json');
$app->get('/u/{shortUrl}', 'YAUS\Controller\RedirectController:url')->setName('yaus.redirect.url');