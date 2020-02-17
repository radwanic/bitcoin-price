<?php

Route::group(['prefix' => 'chartjs'], function () {
    Route::any('/line', 'API\\ChartJSLineChartController');
});