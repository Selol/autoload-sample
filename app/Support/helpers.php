<?php
/**
 *       Filename:  helpers.php
 *    Description:
 *         Author:  Selol
 *        Created:  十月 24, 下午5:27
 */


if (!function_exists('value')) {
    /**
     * Return the default value of the given value.
     *
     * @param  mixed $value
     * @return mixed
     */
    function value($value)
    {
        return $value instanceof Closure ? $value() : $value;
    }
}