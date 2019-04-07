<?php

class TestValidation extends Validation
{

    public function __construct(array $form, array $rules = [])
    {
        parent::__construct($form, $rules);
    }

    protected function validateRule($field, $rule)
    {
        $tmp = explode(':', $rule);
        $value = null;
        if (count($tmp) > 1) {
            $rule = $tmp[0];
            $value = array_slice($tmp, 1, count($tmp) - 1);
        }
        switch ($rule) {
            case 'required':
                return $this->isNotEmpty($field);
            case 'int':
            case 'integer':
                return $this->isInt($field);
            case 'email':
                return $this->isEmail($field);
            case 'less':
                return $this->isLess($field, $value);
            case 'greater':
                return $this->isGreater($field, $value);
            case 'float':
                return $this->isFloat($field);
            case 'fio':
                return $this->isFio($field);
        }

        return true;
    }

    protected function isFloat($field)
    {
        return is_numeric($this->_form[$field]);
    }

    protected function isFio($field)
    {
        return (count(explode(" ", $this->_form[$field])) == 3);
    }

    protected function isLogin($field)
    {
        return UserModel::loginNotExist($this->_form[$field]);
    }

    protected function describeError($error)
    {
        switch ($error) {
            case 'required':
                return 'Поле не может быть пустым. ';
            case 'int':
                return 'Значение поля должно быть целочисленным числом. ';
            case 'email':
                return 'Значение поля не соответсвует формату email. ';
            case 'less':
                return 'Значение поля должно быть меньше заданного числа. ';
            case 'greater':
                return 'Значение поля должно быть больше заданного числа. ';
            case 'float':
                return 'Значение поля должно быть вещественным числом. ';
            case 'fio':
                return 'Ф.И.О. должно содержать три слова. ';
            default:
                return '';
        }
    }
}