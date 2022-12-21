An implementation of an Customer Support Chat System in Laravel.

This project will continue to grow and will be maintained. Your support is highly appreciated and will motivate the author to improve the package. If you've found this library helpful and want to support the author, please, consider any donation by clicking the button below or following the link to [buymeacoffee.com](https://www.buymeacoffee.com/kerimdeveloper). 

<a href="https://www.buymeacoffee.com/kerimdeveloper" target="_blank"><img align="center" src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" height="55px" width= "200px"></a>

## Table of Contents
1. [Features](#features)
2. [Requirements](#requirements)
3. [Installation](#installation)
4. [What's next?](#todo)
4. [License](#license)

## <a name="features"></a> Features 🤩

- Customer support chatbox in every single page of your web app
- Admin panel for chatting with customers (available at: http://your-domain/chat-admin)
- Self-hosted pusher replacement by beyondecode laravel websockets

## <a name="requirements"></a> Requirements

- Laravel 9 or higher
- PHP 8.1 or higher

## Branches
- currently the project has only master branch for v1

## <a name="installation"></a> Installation

Default installation is via [Composer](https://getcomposer.org/).

```bash
composer require ilmedova/chattle
```

The service provider will automatically get registered. Or you could add the Service Provider manually to your
`config/app` file in the `providers` section.

```php
'providers' => [
    //...
    Ilmedova\Chattle\ChatServiceProvider::class,
]
```

Run the migrations in order to setup the required tables on the database.

```bash
php artisan migrate
```

Include the customer support chatbox on your layout blade file's body section

```php
@include('chattle::chat')
```

## <a name="todo"></a> What's next 🚀

- Realtime typing effect in chatboxes for users to let know that user or admin is typing
- Marking messages as read when they are read by user or admin
- Middleware and chat-admin roles control
- Multiple color themes configured in configs

## <a name="license"></a> License

Laravel Customer Support Chat - is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
