<?php
/**
 * Created by PhpStorm.
 * User: vijay
 * Date: 2017-10-13
 * Time: 1:04 AM
 */

namespace Humber\Validation\Rules;


use Humber\Validation\Rule;

class DateRule extends Rule
{
    const RULETYPE = "date";
    private static $ruleInstance;

    /**
     * DateRule constructor.
     */
    public function __construct()
    {
        $this->ruleType = self::RULETYPE;
    }

    /**
     * @param array $request
     * @param string $field
     * @param array|null $options
     * @return boolean
     */
    function evaluate(array $request, string $field, array $options = null, string $message = null)
    {
        return !filter_var($request[$field], FILTER_VALIDATE_DATE) ? (is_null($message) ? "'$field' is not a valid date" : $message) : null;
    }

    /**
     * @return Rule
     */
    static function getInstance()
    {
        if (!isset(self::$ruleInstance)) {
            self::$ruleInstance = new DateRule();
        }
        return self::$ruleInstance;
    }
}