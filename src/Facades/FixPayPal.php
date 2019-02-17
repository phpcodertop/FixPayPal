<?php
/**
 * Created by Ahmed Maher Halima.
 * Email: phpcodertop@gmail.com
 * github: https://github.com/phpcodertop
 * Date: 18/02/2019
 * Time: 12:25 ص
 */

namespace phpcodertop\FixPayPal\Facades;


use Illuminate\Support\Facades\Facade;
use phpcodertop\FixPayPal\PayPalFixer;

/**
 * Class FixPayPal
 * @package phpcodertop\FixPayPal\Facades
 */
class FixPayPal extends Facade
{

    /**
     * @return FixPayPal|string
     */
    protected static function getFacadeAccessor()
    {
        return new PayPalFixer();
    }

}