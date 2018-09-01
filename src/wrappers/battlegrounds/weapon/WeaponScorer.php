<?php

namespace Plancke\HypixelPHP\wrappers\battlegrounds\weapon;

class WeaponScorer {

    /**
     * @param Weapon $weapon
     * @return float
     */
    public static function getScore($weapon) {
        $percentages = [];

        foreach (WeaponStats::values() as $id) {
            $weaponStat = WeaponStats::fromID($id);
            array_push($percentages, $weapon->getBaseStat($weaponStat) / ($weaponStat->getMax() - $weaponStat->getMin()));
        }

        return array_sum($percentages) / sizeof($percentages);
    }

}