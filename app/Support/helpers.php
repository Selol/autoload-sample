<?php
/**
 *       Filename:  helpers.php
 *    Description:
 *         Author:  Selol
 *        Created:  十月 24, 下午5:27
 */

use MyApp\Support\Grouper;

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

if (!function_exists('retry')) {
    /**
     * Generate a new func with retry base on func
     *
     * @param callable $func
     * @param int $retries
     * @param int $interval
     * @param string $exception
     * @param callable $fail_callback
     * @return Closure
     */
    function retry(callable $func, $retries = 2, $interval = 1, $exception = 'Exception', callable $fail_callback = null)
    {
        return function () use ($func, $retries, $interval, $exception, $fail_callback) {
            beginning:
            try {
                return call_user_func_array($func, func_get_args());
            } catch (Exception $e) {
                if (!($e instanceof $exception) || $retries <= 0) {
                    throw $e;
                }
                $retries--;
                if (!is_null($fail_callback)) {
                    $fail_callback();
                }
                if ($interval >= 0) {
                    sleep($interval);
                }
                goto beginning;
            }
        };
    }
}

if (!function_exists('array_grouper')) {
    /**
     * Group by array, so that you can deal multiple elements at a time
     *
     * @param array $arr
     * @param $once
     * @param bool $fillvalue
     * @return Generator
     */
    function array_grouper(array $arr, $once, $fillvalue = false)
    {
        return Grouper::array_grouper($arr, $once, $fillvalue);
    }
}

if (!function_exists('file_grouper')) {
    /**
     * Group by file, so that you can deal multiple elements at a time
     *
     * @param
     * @param $once
     * @param bool $fillvalue
     * @return Generator
     */
    function file_grouper($fd, $once, $fillvalue = false)
    {
        return Grouper::file_grouper($fd, $once, $fillvalue);
    }
}
