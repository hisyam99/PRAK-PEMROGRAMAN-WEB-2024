<?php

namespace LibrarySystem;

trait DiscountTrait
{
    public function calculateDiscount($membershipType)
    {
        switch ($membershipType) {
            case "Gold":
                return 20;
            case "Silver":
                return 10;
            default:
                return 0;
        }
    }
}
