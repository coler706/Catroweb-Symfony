<?php

namespace Catrobat\AppBundle\CatrobatCode\Statements;

class TurnRightStatement extends Statement
{
    const BEGIN_STRING = "turn right (";
    const END_STRING = ") degrees<br/>";

    public function __construct($statementFactory, $xmlTree, $spaces)
    {
        parent::__construct($statementFactory, $xmlTree, $spaces,
            self::BEGIN_STRING,
            self::END_STRING);
    }

    public function getBrickText()
    {
        $formula_string = $this->getFormulaListChildStatement()->executeChildren();
        $formula_string_without_markup = preg_replace("#<[^>]*>#", '', $formula_string);

        return "Turn right " . $formula_string_without_markup . " degrees";
    }

    public function getBrickColor()
    {
        return "1h_brick_blue.png";
    }

}

?>
