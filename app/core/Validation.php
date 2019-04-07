<?php

class Validation
{

    protected $_rules = [];
    protected $_errors = [];
    protected $_form = [];

    public function __construct(array $form, array $rules = [])
    {
        $this->_form = $form;
        $this->_rules = $this->parseRules($rules);
    }

    protected function parseRules($rules)
    {
        $parsed = [];
        foreach ($rules as $field => $field_rules) {
            if (!is_array($field_rules)) {
                $field_rules = explode(',', $field_rules);
            }
            $parsed[$field] = $field_rules;
        }

        return $parsed;
    }

    public static function run($rules)
    {
        return (new static($_REQUEST, $rules))->validate()->errors();
    }

    public static function showErrors($errors)
    {
        if (!empty($_POST)) {
            foreach ($errors as $key => $value) {
                echo '<p class="validate-message">';
                echo self::describeField($key);
                foreach ($value as $error) {
                    echo $error . ' ';
                }
                echo '<button type="button" class="close" aria-label="Close">' .
                    '<span aria-hidden="true">&times;</span></button></p>';
            }
        }
    }

    public function errors()
    {
        return $this->_errors;
    }

    public function validate()
    {
        foreach ($this->_rules as $field => $field_rules) {
            foreach ($field_rules as $rule) {
                if (!$this->validateRule($field, $rule)) {
                    if (empty($this->_errors[$field])) {
                        $this->_errors[$field] = [];
                    }
                    $this->_errors[$field][] = $this->errorMessage($rule);
                }
            }
        }

        return $this;
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
                return $this->isInt($field);
            case 'email':
                return $this->isEmail($field);
            case 'tel':
                return $this->isTelephone($field);
            case 'less':
                return $this->isLess($field, $value);
            case 'greater':
                return $this->isGreater($field, $value);
        }

        return true;
    }

    public function isNotEmpty($field)
    {
        return !empty($this->_form[$field]);
    }

    public function isInt($field)
    {
        $value = intval($this->_form[$field]);
        return is_int($value);
    }

    public function isEmail($field)
    {
        return preg_match('/.+@.+\..+/i', $this->_form[$field]);
    }

    public function isTelephone($field)
    {
        return preg_match('/^(\+7|\+3)[0-9]{9,11}$/', $this->_form[$field]);
    }

    public function isLess($field, $value)
    {
        $formValue = intval($this->_form[$field]);
        return $this->isInt($field) && $formValue < $value;
    }

    public function isGreater($field, $value)
    {
        $formValue = intval($this->_form[$field]);
        return $this->isInt($field) && $formValue < $value;
    }

    protected function errorMessage($rule)
    {
        return $this->describeError($rule);
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
            case 'tel':
                return 'Значение поля не соответсвует формату мобильного номера. ';
            case 'less':
                return 'Значение поля должно быть меньше заданного числа. ';
            case 'greater':
                return 'Значение поля должно быть больше заданного числа. ';
            default:
                return '';
        }
    }

    protected static function describeField($field)
    {
        switch ($field) {
            case 'FIO':
                return 'Ф.И.О: ';
            case 'group':
                return 'Группа: ';
            case 'answer1':
                return 'Вопрос 1: ';
            case 'answer2':
                return 'Вопрос 2: ';
            case 'answer3':
                return 'Вопрос 3: ';
            case 'email':
                return 'Email: ';
            case 'dateOfBirth':
                return 'Дата рождения: ';
            case 'tel':
                return 'Номер телефона: ';
            case 'pol':
                return 'Пол: ';
            default:
                return '';
        }
    }

    public function setRule($field, $rule)
    {
        if (empty($this->_rules[$field])) {
            $this->_rules[$field] = [];
        }
        $this->_rules[$field][] = $rule;

        return $this;
    }
}