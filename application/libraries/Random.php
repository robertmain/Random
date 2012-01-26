<?php

class CI_Random {

    /**
     *
     * @param Integer $minWidth
     * @param Integer $maxWidth
     * @param Integer $minHeight
     * @param Integer $maxHeight
     * @return Array 
     */
    public function randomSizes($minWidth=0, $maxWidth=400, $minHeight=0, $maxHeight=400) {
        $dimensions = array('width' => mt_rand($minWidth, $maxWidth), 'height' => mt_rand($minHeight, $maxHeight));
        return $dimensions;
    }

    /**
     *
     * @return Array
     */
    public function randomColours() {
        $colourDigits = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F');
        $colourCode = NUlL;
        for ($i = 1; $i <= 6; $i++) {
            $colourCode .= array_rand($colourDigits);
        }

        return '#' . substr($colourCode, 0, 6);
    }

    /**
     *
     * <p>This method doesnt work right now :(</p>
     * @param Integer$numberOfColours
     * @return Array
     */
    private function uniqueColours($numberOfColours) {
        $uniqueColorList = array();
        for ($i = 0; $i <= $numberOfColours; $i++) {
            for ($i = 0; $i < $i; $j++) {
                if ($i != $j[$i]) {
                    $uniqueColorList[] = $this->randomColours();
                }
            }
        }

        return $uniqueColorList;
    }

}