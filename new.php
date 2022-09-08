<?php 
$input = '(6*4)+(7+2*5)*3';
$result = evaluate($input);
print_r($result);

function evaluate($input)
{
    if (!preg_match('/^[+\-*\/\(\)\.\d]+$/', $input))
        return array('NaN');

    $steps = array();
    $steps[] = $input;

    $input = preg_replace('/(\d+(?:\.\d+)?[*\/]\d+(?:\.\d+)?)/', '(\1)', $input);

    while (strpos($input, '(') || strpos($input, ')'))
    {
        $input = preg_replace_callback('/\(([^\(\)]+)\)/', 'evaluate_callback', $input);
        $steps[] = $input;
        $input = preg_replace('/(\d+(?:\.\d+)?[*\/]\d+(?:\.\d+)?)/', '(\1)', $input);
    }

    if (preg_match('/(?:\-?\d+(?:\.?\d+)?[\+\-\*\/])+\-?\d+(?:\.?\d+)?/', $input, $match))
    {
        $steps[] = strval(0 + eval('return '.$match[0].';'));
        return $steps;
    }

    return array('NaN');
}

function evaluate_callback($input)
{
    if (is_numeric($input[1]))
        return $input[1];

    if (preg_match('/(?:\-?\d+(?:\.?\d+)?[\+\-\*\/])+\-?\d+(?:\.?\d+)?/', $input[1], $match,))
        return strval(0 + eval('return '.$match[0].';'));

    return '0';
}

?>