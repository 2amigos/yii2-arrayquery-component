<?php
/**
 * @copyright Copyright (c) 2013-2017 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace dosamigos\arrayquery\conditions;


/**
 * LessThan checks if value is less than to the data searched.
 *
 * @author Antonio Ramirez <hola@2amigos.us>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\arrayquery\conditions
 */
class LessThan extends Condition
{

    /**
     * Returns [[GreaterThan]] condition
     * @return GreaterThan
     */
    public function reverse()
    {
        return new GreaterThan($this->value);
    }


    /**
     * @inheritdoc
     */
    public function matches($data)
    {
        return ($this->checkType($data, $this->value) && $data < $this->value);
    }

}
