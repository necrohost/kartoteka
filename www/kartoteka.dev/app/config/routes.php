<?php
use \App\Services\Router;

Router::route('/add', 'film', 'add');
Router::route("/edit", 'film', 'edit');
Router::route('/list', 'film', 'roster');
Router::route("/info", 'film', 'info');
Router::route("/del", 'film', 'del');

Router::route("/login", 'user', 'login');
Router::route("/logout", 'user', 'logout');
Router::route("/reg", 'user', 'registration');
Router::enableAction();