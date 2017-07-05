<?php
/**
 * @copyright Copyright (c) 2013-2017 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace dosamigos\arrayquery\conditions;


/**
 * Condition abstract base class where all conditions extend from
 *
 * @author Antonio Ramirez <hola@2amigos.us>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\arrayquery\conditions
 */
abstract class Condition
{
    /**
     * @var mixed the value to match against
     */
    protected $value;

    /**
     * @var bool whether to reverse or not
     */
    protected $negate = false;

    /**
     * @param mixed $value the value to match against
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * Reverses the condition
     * @return $this
     */
    public function reverse()
    {
        $this->negate = !$this->negate;
        return $this;
    }

    /**
     * Checks whether the value passes condition
     *
     * @param mixed $data the data to match
     *
     * @return mixed
     */
    abstract public function matches($data);

    /**
     * Checks whether the value and the data are of same type
     *
     * @param mixed $value
     * @param mixed $against
     *
     * @return bool true if both are of same type
     */
    protected function checkType($value, $against)
    {
        if (is_numeric($value) && is_numeric($against)) {
            $value = filter_var($value, FILTER_SANITIZE_NUMBER_FLOAT);
            $against = filter_var($against, FILTER_SANITIZE_NUMBER_FLOAT);
        }

        if (gettype($value) != gettype($against)) {
            return false;
        }
        return true;
    }
}
