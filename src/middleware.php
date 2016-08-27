<?php
// Application middleware

// Authentication...
// Please change your credentials to something more secure...
$app->add(new \Slim\Middleware\HttpBasicAuthentication([
    "path" => ["/admin", "/api/urls/add"],
    "realm" => "Protected",
    "users" => $app->getContainer()->get('settings')['admin_users'],
    "error" => function ($request, $response, $arguments) {
        $data = [];
        $data["status"] = "error";
        $data["message"] = $arguments["message"];
        return $response->write(json_encode($data, JSON_UNESCAPED_SLASHES));
    }
]));

// Register CSRF check for all POST routes
$app->add(new \Slim\Csrf\Guard());