<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\Course\ChapterController;
use App\Http\Controllers\Admin\Course\CourseController;
use App\Http\Controllers\Admin\Course\LessionController;
use App\Http\Controllers\Admin\Ecommerce\ProductController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\Organisation\OrganisationController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\Post\PostController;
use App\Http\Controllers\Admin\ShipController;
use App\Http\Controllers\Admin\StationController;
use App\Http\Controllers\Admin\Ticket\TicketController;
use App\Http\Controllers\Admin\User\BookUploadController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\User\UserController as Users;
use App\Http\Controllers\Admin\WebSettingController;
use App\Http\Controllers\Admin\WidgetController;
use Illuminate\Support\Facades\Route;

Route::prefix("upschool/admin")
    ->name('admin.')
    // ->middleware()
    ->group(function () {


        Route::get("dashboard", function () {
            return view("admin.dashboard");
        })->name('dashboard');

        /**
         * Tickets
         */
        Route::prefix('tickets')
            ->name('ticket.')
            ->controller(TicketController::class)
            ->group(function () {
                Route::get('/new', "create")->name("create");
                Route::get('/print/{ticket:uuid}', "printableTicket")->name("print");
                Route::get("/search", "search")->name('search');
                Route::post("/new", "store")->name("store");
            });

        /**
         * Ships
         */
        Route::prefix("ships")
            // ->middleware(['admin'])
            ->resource("ship", ShipController::class);

        /**
         * Station
         */
        Route::prefix("stations")
            // ->middleware()
            ->resource("stations", StationController::class);

        Route::prefix("website/setting")
            ->name('web.setting.')
            ->controller(WebSettingController::class)
            ->group(function () {
                Route::get("/", "index")->name("list");
                Route::put("/", "update")->name("update");
            });

        /**
         * Users
         */

        Route::prefix("users")
            ->name("users.")
            ->controller(Users::class)
            ->group(function () {
                Route::patch("/ban/{user}", "banUser")->name("user.ban");
                Route::resource("user", Users::class);
            });
    });
