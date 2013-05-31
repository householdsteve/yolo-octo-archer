<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('time_elapsed_string'))
{
function time_elapsed_string($ptime,$now)
{
    $etime = time() - $ptime;

    if ($etime < 1)
    {
        return '0 seconds';
    }

    $a = array( 12 * 30 * 24 * 60 * 60  =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
                );

    foreach ($a as $secs => $str)
    {
        $d = $etime / $secs;
        if ($d >= 1)
        {
            $r = round($d);
            return $r . ' ' . $str . ($r > 1 ? 's' : '') . ' ago';
        }
    }
}

}

/**
 * Generates meta tags from an array of key/values
 *
 * @access  public
 * @param   array
 * @return  string
 */
if ( ! function_exists('meta_property'))
{
    function meta_property($property = '', $content = '', $type = 'property', $newline = "\n")
    {
        // Since we allow the data to be passes as a string, a simple array
        // or a multidimensional one, we need to do a little prepping.
        if ( ! is_array($property))
        {
            $property = array(array('property' => $property, 'content' => $content, 'type' => $type, 'newline' => $newline));
        }
        else
        {
            // Turn single array into multidimensional
            if (isset($property['property']))
            {
                $property = array($property);
            }
        }

        $str = '';
        foreach ($property as $meta)
        {
            $type       = ( ! isset($meta['type']) OR $meta['type'] == 'property') ? 'property' : 'http-equiv';
            $property       = ( ! isset($meta['property']))     ? ''    : $meta['property'];
            $content    = ( ! isset($meta['content']))  ? ''    : $meta['content'];
            $newline    = ( ! isset($meta['newline']))  ? "\n"  : $meta['newline'];

            $str .= '<meta '.$type.'="'.$property.'" content="'.$content.'" />'.$newline;
        }

        return $str;
    }
}