<?php


if (!function_exists('FixPayPal')){
    /**
     * @return \Illuminate\Foundation\Application|mixed
     */
    function FixPayPal(){
        return app('FixPayPal');
    }
}