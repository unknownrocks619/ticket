<?php

use App\Http\Controllers\Admin\ShipController;
use App\Http\Controllers\Admin\StationController;
use App\Http\Controllers\Admin\Ticket\SeatController;
use App\Http\Controllers\Admin\Ticket\TicketController;
use App\Http\Controllers\Admin\User\BookUploadController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\WebSettingController;
use App\Http\Controllers\Admin\WidgetController;
use Illuminate\Support\Facades\Route;

Route::prefix("upschool/admin")
    ->name('admin.')
    // ->middleware()
    ->group(function () {


        Route::get("dashboard", function () {

            if (!auth()->check()) {
                return redirect()->route('login');
            }
            if (auth()->user()->role == 2) {
                return redirect()->route('admin.ticket.create');
            } elseif (auth()->user()->role == 3) {
                return redirect()->route('admin.ticket.check_in_ticket');
            } elseif (auth()->user()->role == 1) {
                return redirect()->route('admin.ticket.search', ['departure_date' => date("Y-m-d")]);
            }
            return view("admin.dashboard");
        })->name('dashboard');

        /**
         * Tickets
         */
        Route::prefix('tickets')
            ->name('ticket.')
            ->controller(TicketController::class)
            ->group(function () {
                Route::get("check-in", 'checkInCreate')->name("check_in_ticket");
                Route::post("check-in", 'checkTicket')->name("check_in_ticket");
                Route::get('/new', "create")->name("create");
                Route::get('/print/{ticket}', "printableTicket")->name("print");
                Route::get('/re-print/{ticket}', "ticketDisplay")->name("print_display");
                Route::get("/search", "search")->name('search');
                Route::post("/new", "store")->name("store");
            });

        Route::get("/seat/ticket-price/", [SeatController::class, "ticketPrice"])->name('seat.price');
        Route::resource('seat', SeatController::class);
        /**
         * Ships
         */
        Route::prefix("ships")
            // ->middleware(['admin'])
            ->resource("ship", ShipController::class);

        /**
         * Station
         */
        Route::resource("stations", StationController::class);

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
            ->controller(UserController::class)
            ->group(function () {
                Route::patch("/ban/{user}", "banUser")->name("user.ban");
                Route::resource("user", UserController::class);
            });
    });
