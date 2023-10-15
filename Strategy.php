<?php

interface CarCouponGenerator {
    public function generateCoupon($currentStock);
}
class BmwCouponGenerator implements CarCouponGenerator {
    private $discount = 0;
    
    public function generateCoupon($currentStock){
        $this->addSeasonDiscount();
        $this->addStockDiscount($currentStock);
        
        return "Get {$this->discount}% off the price of your new BMW.";
    }
    
    private function addSeasonDiscount() {
        $isHighSeason = $this->checkHighSeason(); 
        if (!$isHighSeason) {
            $this->discount += 5;
        }
    }
    
    private function addStockDiscount($currentStock) {
        if ($currentStock > 100) {
            $this->discount += 10;
        }
    }

    private function checkHighSeason() {
        date_default_timezone_set('Europe/Madrid'); 
        $currentMonth = date('n');
        return ($currentMonth >= 6 && $currentMonth <= 8);
    }
}

class MercedesCouponGenerator implements CarCouponGenerator {
    private $discount = 0;
    
    public function generateCoupon($currentStock) {
        $this->addSeasonDiscount();
        $this->addStockDiscount($currentStock);
        
        return "Get {$this->discount}% off the price of your new Mercedes.";
    }
    
    private function addSeasonDiscount() {
        $isHighSeason = $this->checkHighSeason(); 
        if (!$isHighSeason) {
            $this->discount += 2;
        }
    }
    private function addStockDiscount($currentStock) {
        if ($currentStock > 100) {
            $this->discount += 15;
        }
    }
    private function checkHighSeason() {
        date_default_timezone_set('Europe/Madrid'); 
        $currentMonth = date('n');
        return ($currentMonth >= 6 && $currentMonth <= 8);
    }  
}

$bmwCouponGenerator = new BmwCouponGenerator();
$mercedesCouponGenerator = new MercedesCouponGenerator();
$currentStockBMW = 160; 
$currentStockMercedes = 70;
echo $bmwCouponGenerator->generateCoupon($currentStockBMW);
echo '<br>';
echo $mercedesCouponGenerator->generateCoupon($currentStockMercedes);

?>