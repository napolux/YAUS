<?php
// Application middleware

// Authentication...
// Please change your credentials to something more secure...
$app->add(new \Slim\Middleware\HttpBasicAuthentication([
    "path" => ["/admin"],
    "realm" => "Administration Panel for YAUS",
    "users" => [
        "admin" => "password" // CHANGE ME!
    ],
    "error" => function ($request, $response, $arguments) {
        $data = [];
        $data["status"] = "error";
        $data["message"] = $arguments["message"];
        return $response->write(json_encode($data, JSON_UNESCAPED_SLASHES));
    }
]));