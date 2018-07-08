<?php

use Illuminate\Support\Facades\Input;

function input_generate($wrap_class = null, $label = null, $type, $input_value = null, $input_class = null, $placeholder = null, $name = null)
{
    $input = '';

    if (isset($label))
    {
        $input .= '<label>' . $label . '</label>';
    }

    if (isset($type))
    {
        switch ($type)
        {
            case 'text':
                $input .= '<input type="' .$type. '" class="' . $input_class . '" placeholder="' . $placeholder . '" name="filter[' . $name . ']" value="' . Input::get('filter.' . $name) . '">';
                break;
            case 'date':
                $input .= '<input data-toggle="datepicker" type="text" class="' . $input_class . '" placeholder="' . $placeholder . '" name="filter[' . $name . ']" value="' . Input::get('filter.' . $name) . '">';
                break;
            case 'select':
                $val = '<option selected disabled>--</option>';
                foreach ($input_value as $key => $v) {

                    ++$key;

                    if (Input::get($name) == $key)
                    {
                        $val .= '<option value="' .$key. '" selected>' . $v . '</option>';
                    } else {
                        $val .= '<option value="' .$key. '">' . $v . '</option>';
                    }

                }
                $input .= '<select class="' . $input_class . '" name="filter[' . $name . ']">' . $val . '</select>';
                break;
            default:
                return null;
                break;
        }
    }

    if (isset($wrap_class))
    {
        $input = '<div class="' . $wrap_class . '">' . $input . '</div>';
    }

    return $input;
}

