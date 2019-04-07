<?php

class TestVerification extends TestValidation
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
        }
        switch ($rule) {
            case 'answer-one':
                return $this->isTrueAnswerOne($field);
            case 'answer-two':
                return $this->isTrueAnswerTwo($field);
            case 'answer-three':
                return $this->isTrueAnswerThree($field);
        }

        return true;
    }

    public static function showErrors($errors)
    {
        if (!empty($_POST)) {
            if (!empty($errors)) {
                foreach ($errors as $key => $value) {
                    echo '<p class="validate-message">';
                    echo self::describeField($key);
                    foreach ($value as $error) {
                        echo $error . ' ';
                    }
                    echo '<button type="button" class="close" aria-label="Close">' .
                        '<span aria-hidden="true">&times;</span></button></p>';
                }
            } else {
                echo '<p class="bg-success correct-responses">Вы ответили правильно на все вопросы' .
                    '<button type="button" class="close" aria-label="Close">'.
                    '<span aria-hidden="true">&times;</span></button></p>';
            }
        }
    }

    protected function isTrueAnswerOne($field)
    {
        if (count(explode(" ", $this->_form[$field])) >= 3) {
            return true;
        }
        return false;
    }

    protected function isTrueAnswerTwo($field)
    {
        if (!empty($this->_form[$field])) {
            return strcmp($this->_form[$field], 'до 600 чел') == 0;
        }
        return false;
    }

    protected function isTrueAnswerThree($field)
    {
        if (!empty($this->_form[$field])) {
            return strcmp($this->_form[$field], 'Слабость, тошнота, рвота, головокружение, покраснение кожных покровов') == 0;
        }
        return false;
    }

    protected function describeError($error)
    {
        switch ($error) {
            case 'answer-one':
                return 'Ответ должен быть не менее, чем на 30 слов!';
            case 'answer-two':
            case 'answer-three':
                return 'Неправильный ответ на вопрос. ';
            default:
                return '';
        }
    }
}