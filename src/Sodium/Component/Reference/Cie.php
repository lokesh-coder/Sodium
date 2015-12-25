<?php

namespace Sodium\Component\Reference;

use Sodium\Concrete\Component\Reference\ReferenceConcrete;
use Sodium\Contract\Component\ReferenceInterface;

class Cie extends ReferenceConcrete implements ReferenceInterface
{
    public static function get()
    {
        $reference = array(
            'Cie1936' => array(
                '2' => array(
                    'A' => array(
                        'x' => 109.850,
                        'y' => 100,
                        'z' => 35.585
                    ),
                    'C' => array(
                        'x' => 98.074,
                        'y' => 100,
                        'z' => 118.232
                    ),
                    'D50' => array(
                        'x' => 96.422,
                        'y' => 100,
                        'z' => 82.521
                    ),
                    'D55' => array(
                        'x' => 95.682,
                        'y' => 100,
                        'z' => 92.149
                    ),
                    'D65' => array(
                        'x' => 95.047,
                        'y' => 100,
                        'z' => 108.883
                    ),
                    'D75' => array(
                        'x' => 94.972,
                        'y' => 100,
                        'z' => 122.638
                    ),
                    'F2' => array(
                        'x' => 99.187,
                        'y' => 100,
                        'z' => 67.395
                    ),
                    'F7' => array(
                        'x' => 95.044,
                        'y' => 100,
                        'z' => 108.755
                    ),
                    'F11' => array(
                        'x' => 100.966,
                        'y' => 100,
                        'z' => 64.370
                    ))
            ),
            'Cie1964' => array(
                '10' => array(
                    'A' => array(
                        'x' => 111.144,
                        'y' => 100,
                        'z' => 35.200
                    ),
                    'C' => array(
                        'x' => 97.285,
                        'y' => 100,
                        'z' => 116.145
                    ),
                    'D50' => array(
                        'x' => 96.720,
                        'y' => 100,
                        'z' => 81.427
                    ),
                    'D55' => array(
                        'x' => 95.799,
                        'y' => 100,
                        'z' => 90.926
                    ),
                    'D65' => array(
                        'x' => 94.811,
                        'y' => 100,
                        'z' => 107.304
                    ),
                    'D75' => array(
                        'x' => 94.416,
                        'y' => 100,
                        'z' => 120.641
                    ),
                    'F2' => array(
                        'x' => 103.280,
                        'y' => 100,
                        'z' => 69.026
                    ),
                    'F7' => array(
                        'x' => 95.792,
                        'y' => 100,
                        'z' => 107.687
                    ),
                    'F11' => array(
                        'x' => 103.866,
                        'y' => 100,
                        'z' => 65.627
                    )
                ))
        );

        return $reference;
    }
}
