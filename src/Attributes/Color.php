<?php

namespace Relaxsd\Stylesheets\Attributes;

class Color
{

    const ALICE_BLUE = 'aliceblue';
    const ANTIQUE_WHITE = 'antiquewhite';
    const AQUAMARINE = 'aquamarine';
    const AZURE = 'azure';
    const BEIGE = 'beige';
    const BISQUE = 'bisque';
    const BLACK = 'black';
    const BLANCHED_ALMOND = 'blanchedalmond';
    const BLUE = 'blue';
    const BLUE_VIOLET = 'blueviolet';
    const BROWN = 'brown';
    const BURLYWOOD = 'burlywood';
    const CADET_BLUE = 'cadetblue';
    const CHARTREUSE = 'chartreuse';
    const CHOCOLATE = 'chocolate';
    const CORAL = 'coral';
    const CORNFLOWER_BLUE = 'cornflowerblue';
    const CORNSILK = 'cornsilk';
    const CRIMSON = 'crimson';
    const CYAN = 'cyan';
    const DARK_BLUE = 'darkblue';
    const DARK_CYAN = 'darkcyan';
    const DARK_GOLDENROD = 'darkgoldenrod';
    const DARK_GRAY = 'darkgray';
    const DARK_GREEN = 'darkgreen';
    const DARK_KHAKI = 'darkkhaki';
    const DARK_MAGENTA = 'darkmagenta';
    const DARK_OLIVE_GREEN = 'darkolivegreen';
    const DARK_ORANGE = 'darkorange';
    const DARK_ORCHID = 'darkorchid';
    const DARK_RED = 'darkred';
    const DARK_SALMON = 'darksalmon';
    const DARK_SEA_GREEN = 'darkseagreen';
    const DARK_SLATE_BLUE = 'darkslateblue';
    const DARK_SLATE_GRAY = 'darkslategray';
    const DARK_TURQUOISE = 'darkturquoise';
    const DARK_VIOLET = 'darkviolet';
    const DEEP_PINK = 'deeppink';
    const DEEP_SKY_BLUE = 'deepskyblue';
    const DIM_GRAY = 'dimgray';
    const DODGER_BLUE = 'dodgerblue';
    const FIRE_BRICK = 'firebrick';
    const FLORAL_WHITE = 'floralwhite';
    const FOREST_GREEN = 'forestgreen';
    const GAINSBORO = 'gainsboro';
    const GHOST_WHITE = 'ghostwhite';
    const GOLD = 'gold';
    const GOLDENROD = 'goldenrod';
    const GRAY = 'gray';
    const GREEN = 'green';
    const GREEN_YELLOW = 'greenyellow';
    const HONEYDEW = 'honeydew';
    const HOT_PINK = 'hotpink';
    const INDIAN_RED = 'indianred';
    const INDIGO = 'indigo';
    const IVORY = 'ivory';
    const KHAKI = 'khaki';
    const LAVENDER = 'lavender';
    const LAVENDER_BLUSH = 'lavenderblush';
    const LAWN_GREEN = 'lawngreen';
    const LEMON_CHIFFON = 'lemonchiffon';
    const LIGHT_BLUE = 'lightblue';
    const LIGHT_CORAL = 'lightcoral';
    const LIGHT_CYAN = 'lightcyan';
    const LIGHT_GOLDENROD_YELLOW = 'lightgoldenrodyellow';
    const LIGHT_GREEN = 'lightgreen';
    const LIGHT_GREY = 'lightgrey';
    const LIGHT_PINK = 'lightpink';
    const LIGHT_SALMON = 'lightsalmon';
    const LIGHT_SEA_GREEN = 'lightseagreen';
    const LIGHT_SLATE_GRAY = 'lightslategray';
    const LIGHT_YELLOW = 'lightyellow';
    const LIGHTSKY_BLUE = 'lightskyblue';
    const LIGHTSTEEL_BLUE = 'lightsteelblue';
    const LIME = 'lime';
    const LIME_GREEN = 'limegreen';
    const LINEN = 'linen';
    const MAGENTA = 'magenta';
    const MAROON = 'maroon';
    const MEDIUM_AQUAMARINE = 'mediumaquamarine';
    const MEDIUM_BLUE = 'mediumblue';
    const MEDIUM_ORCHID = 'mediumorchid';
    const MEDIUM_PURPLE = 'mediumpurple';
    const MEDIUM_SEA_GREEN = 'mediumseagreen';
    const MEDIUM_SLATE_BLUE = 'mediumslateblue';
    const MEDIUM_SPRING_GREEN = 'mediumspringgreen';
    const MEDIUM_TURQUOISE = 'mediumturquoise';
    const MEDIUM_VIOLET_RED = 'mediumvioletred';
    const MIDNIGHT_BLUE = 'midnightblue';
    const MINTCREAM = 'mintcream';
    const MISTY_ROSE = 'mistyrose';
    const MOCCASIN = 'moccasin';
    const NAVAJO_WHITE = 'navajowhite';
    const NAVY = 'navy';
    const OLDLACE = 'oldlace';
    const OLIVE = 'olive';
    const OLIVE_DRAB = 'olivedrab';
    const ORANGE = 'orange';
    const ORANGE_RED = 'orangered';
    const ORCHID = 'orchid';
    const PALE_GOLDENROD = 'palegoldenrod';
    const PALE_GREEN = 'palegreen';
    const PALE_TURQUOISE = 'paleturquoise';
    const PALE_VIOLET_RED = 'palevioletred';
    const PAPAYA_WHIP = 'papayawhip';
    const PEACHPUFF = 'peachpuff';
    const PERU = 'peru';
    const PINK = 'pink';
    const PLUM = 'plum';
    const POWDER_BLUE = 'powderblue';
    const PURPLE = 'purple';
    const RED = 'red';
    const ROSY_BROWN = 'rosybrown';
    const ROYAL_BLUE = 'royalblue';
    const SADDLE_BROWN = 'saddlebrown';
    const SALMON = 'salmon';
    const SANDY_BROWN = 'sandybrown';
    const SEA_GREEN = 'seagreen';
    const SEA_SHELL = 'seashell';
    const SIENNA = 'sienna';
    const SILVER = 'silver';
    const SKY_BLUE = 'skyblue';
    const SLATE_BLUE = 'slateblue';
    const SLATE_GRAY = 'slategray';
    const SNOW = 'snow';
    const SPRING_GREEN = 'springgreen';
    const STEEL_BLUE = 'steelblue';
    const TAN = 'tan';
    const TEAL = 'teal';
    const THISTLE = 'thistle';
    const TOMATO = 'tomato';
    const TURQUOISE = 'turquoise';
    const VIOLET = 'violet';
    const WHEAT = 'wheat';
    const WHITE = 'white';
    const WHITE_SMOKE = 'whitesmoke';
    const YELLOW = 'yellow';
    const YELLOW_GREEN = 'yellowgreen';

    /**
     * @var array
     */
    protected static $COLORS = [
        self::ALICE_BLUE             => [240, 248, 255],
        self::ANTIQUE_WHITE          => [250, 235, 215],
        self::AQUAMARINE             => [127, 255, 212],
        self::AZURE                  => [240, 255, 255],
        self::BEIGE                  => [245, 245, 220],
        self::BISQUE                 => [255, 228, 196],
        self::BLACK                  => [0, 0, 0],
        self::BLANCHED_ALMOND        => [255, 235, 205],
        self::BLUE                   => [0, 0, 255],
        self::BLUE_VIOLET            => [138, 43, 226],
        self::BROWN                  => [165, 42, 42],
        self::BURLYWOOD              => [222, 184, 135],
        self::CADET_BLUE             => [95, 158, 160],
        self::CHARTREUSE             => [127, 255, 0],
        self::CHOCOLATE              => [210, 105, 30],
        self::CORAL                  => [255, 127, 80],
        self::CORNFLOWER_BLUE        => [100, 149, 237],
        self::CORNSILK               => [255, 248, 220],
        self::CRIMSON                => [220, 20, 60],
        self::CYAN                   => [0, 255, 255],
        self::DARK_BLUE              => [0, 0, 139],
        self::DARK_CYAN              => [0, 139, 139],
        self::DARK_GOLDENROD         => [184, 134, 11],
        self::DARK_GRAY              => [169, 169, 169],
        self::DARK_GREEN             => [0, 100, 0],
        self::DARK_KHAKI             => [189, 183, 107],
        self::DARK_MAGENTA           => [139, 0, 139],
        self::DARK_OLIVE_GREEN       => [85, 107, 47],
        self::DARK_ORANGE            => [255, 140, 0],
        self::DARK_ORCHID            => [153, 50, 204],
        self::DARK_RED               => [139, 0, 0],
        self::DARK_SALMON            => [233, 150, 122],
        self::DARK_SEA_GREEN         => [143, 188, 143],
        self::DARK_SLATE_BLUE        => [72, 61, 139],
        self::DARK_SLATE_GRAY        => [47, 79, 79],
        self::DARK_TURQUOISE         => [0, 206, 209],
        self::DARK_VIOLET            => [148, 0, 211],
        self::DEEP_PINK              => [255, 20, 147],
        self::DEEP_SKY_BLUE          => [0, 191, 255],
        self::DIM_GRAY               => [105, 105, 105],
        self::DODGER_BLUE            => [30, 144, 255],
        self::FIRE_BRICK             => [178, 34, 34],
        self::FLORAL_WHITE           => [255, 250, 240],
        self::FOREST_GREEN           => [34, 139, 34],
        self::GAINSBORO              => [220, 220, 220],
        self::GHOST_WHITE            => [248, 248, 255],
        self::GOLD                   => [255, 215, 0],
        self::GOLDENROD              => [218, 165, 32],
        self::GRAY                   => [128, 128, 128],
        self::GREEN                  => [0, 128, 0],
        self::GREEN_YELLOW           => [173, 255, 47],
        self::HONEYDEW               => [240, 255, 240],
        self::HOT_PINK               => [255, 105, 180],
        self::INDIAN_RED             => [205, 92, 92],
        self::INDIGO                 => [75, 0, 130],
        self::IVORY                  => [255, 255, 240],
        self::KHAKI                  => [240, 230, 140],
        self::LAVENDER               => [230, 230, 250],
        self::LAVENDER_BLUSH         => [255, 240, 245],
        self::LAWN_GREEN             => [124, 252, 0],
        self::LEMON_CHIFFON          => [255, 250, 205],
        self::LIGHT_BLUE             => [173, 216, 230],
        self::LIGHT_CORAL            => [240, 128, 128],
        self::LIGHT_CYAN             => [224, 255, 255],
        self::LIGHT_GOLDENROD_YELLOW => [250, 250, 210],
        self::LIGHT_GREEN            => [144, 238, 144],
        self::LIGHT_GREY             => [211, 211, 211],
        self::LIGHT_PINK             => [255, 182, 193],
        self::LIGHT_SALMON           => [255, 160, 122],
        self::LIGHT_SEA_GREEN        => [32, 178, 170],
        self::LIGHT_SLATE_GRAY       => [119, 136, 153],
        self::LIGHT_YELLOW           => [255, 255, 224],
        self::LIGHTSKY_BLUE          => [135, 206, 250],
        self::LIGHTSTEEL_BLUE        => [176, 196, 222],
        self::LIME                   => [0, 255, 0],
        self::LIME_GREEN             => [50, 205, 50],
        self::LINEN                  => [250, 240, 230],
        self::MAGENTA                => [255, 0, 255],
        self::MAROON                 => [128, 0, 0],
        self::MEDIUM_AQUAMARINE      => [102, 205, 170],
        self::MEDIUM_BLUE            => [0, 0, 205],
        self::MEDIUM_ORCHID          => [186, 85, 211],
        self::MEDIUM_PURPLE          => [147, 112, 219],
        self::MEDIUM_SEA_GREEN       => [60, 179, 113],
        self::MEDIUM_SLATE_BLUE      => [123, 104, 238],
        self::MEDIUM_SPRING_GREEN    => [0, 250, 154],
        self::MEDIUM_TURQUOISE       => [72, 209, 204],
        self::MEDIUM_VIOLET_RED      => [199, 21, 133],
        self::MIDNIGHT_BLUE          => [25, 25, 112],
        self::MINTCREAM              => [245, 255, 250],
        self::MISTY_ROSE             => [255, 228, 225],
        self::MOCCASIN               => [255, 228, 181],
        self::NAVAJO_WHITE           => [255, 222, 173],
        self::NAVY                   => [0, 0, 128],
        self::OLDLACE                => [253, 245, 230],
        self::OLIVE                  => [128, 128, 0],
        self::OLIVE_DRAB             => [107, 142, 35],
        self::ORANGE                 => [255, 165, 0],
        self::ORANGE_RED             => [255, 69, 0],
        self::ORCHID                 => [218, 112, 214],
        self::PALE_GOLDENROD         => [238, 232, 170],
        self::PALE_GREEN             => [152, 251, 152],
        self::PALE_TURQUOISE         => [175, 238, 238],
        self::PALE_VIOLET_RED        => [219, 112, 147],
        self::PAPAYA_WHIP            => [255, 239, 213],
        self::PEACHPUFF              => [255, 218, 185],
        self::PERU                   => [205, 133, 63],
        self::PINK                   => [255, 192, 203],
        self::PLUM                   => [221, 160, 221],
        self::POWDER_BLUE            => [176, 224, 230],
        self::PURPLE                 => [128, 0, 128],
        self::RED                    => [255, 0, 0],
        self::ROSY_BROWN             => [188, 143, 143],
        self::ROYAL_BLUE             => [65, 105, 225],
        self::SADDLE_BROWN           => [139, 69, 19],
        self::SALMON                 => [250, 128, 114],
        self::SANDY_BROWN            => [244, 164, 96],
        self::SEA_GREEN              => [46, 139, 87],
        self::SEA_SHELL              => [255, 245, 238],
        self::SIENNA                 => [160, 82, 45],
        self::SILVER                 => [192, 192, 192],
        self::SKY_BLUE               => [135, 206, 235],
        self::SLATE_BLUE             => [106, 90, 205],
        self::SLATE_GRAY             => [112, 128, 144],
        self::SNOW                   => [255, 250, 250],
        self::SPRING_GREEN           => [0, 255, 127],
        self::STEEL_BLUE             => [70, 130, 180],
        self::TAN                    => [210, 180, 140],
        self::TEAL                   => [0, 128, 128],
        self::THISTLE                => [216, 191, 216],
        self::TOMATO                 => [255, 99, 71],
        self::TURQUOISE              => [64, 224, 208],
        self::VIOLET                 => [238, 130, 238],
        self::WHEAT                  => [245, 222, 179],
        self::WHITE                  => [255, 255, 255],
        self::WHITE_SMOKE            => [245, 245, 245],
        self::YELLOW                 => [255, 255, 0],
        self::YELLOW_GREEN           => [154, 205, 50],
    ];

    /**
     * @param string|int|array $r Red value (with $g and $b) or greyscale value ($g and $b null) or color name or [r,g,b] array
     * @param int|null         $g Green value
     * @param int|null         $b Blue value
     *
     * @return mixed
     */
    public static function toRGB($r, $g = null, $b = null)
    {

        if (is_array($r)) {
            // Does not work for less than 3 elements
            //list($r, $g, $b) = $r;
            return call_user_func_array(['Relaxsd\Stylesheets\Attributes\Color', 'toRGB'], $r);
        } else if (is_string($r)) {
            return self::getColorFromTable($r);
        } else if (is_int($r)) {
            return isset($g)
                ? [$r, $g, $b]
                : [$r, $r, $r];
        }

        return null;
    }

    /**
     * @param $color
     *
     * @return array|null
     */
    public static function getColorFromTable($color)
    {
        return (array_key_exists($color, self::$COLORS))
            ? self::$COLORS[$color]
            : null;
    }

}
