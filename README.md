#### Sandbox API

https://sanbox-api-app-vqxn3.ondigitalocean.app/

Sandbox API is a collection of APIs endpoint similar to any social media or news application like Facebook, Instagram, BBC etc. That have ability to post, comment, like and share with Authentication and Authorization.

> This APIs is only use for testing, education, and demonstration only.
> Author: Phat Panhareach

#### Getting started

You can get started with the Sanbox API by forking the Sanbox API collection to your workspace. You can forking and cloning the [GitHub Repository](https://github.com/Re4ch-Jay/Sandbox-APIs).

#### Overview

1. The API does not use rate and usage limits.
1. The API returns requests responses in JSON format. When an API request returns an error, it is sent in the JSON response as an error key.
1. For all requests, API calls respond with their corresponding HTTP status codes.
1. The API build with Laravel.

#### API Documentation

[Sandbox API Document with Postman](https://documenter.getpostman.com/view/23427692/2s9Y5ZvN4E#f877fc58-4d34-4ab5-b487-d37d2c7da621)

#### Local Development Guide

```bash

$ git clone https://github.com/Re4ch-Jay/Sandbox-APIs.git
$ composer install
$ cp .env.example .env

// copy .env.example to .env change your configuration

$ php artisan migrate
$ php artisan serve

// The base url should be http://127.0.0.1:8000/api/v1/

```

#### Support

For help regarding accessing the Sanbox API, you can:
Visit [Phat Panhareach](https://github.com/Re4ch-Jay).
