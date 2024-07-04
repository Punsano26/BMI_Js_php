<?php

class BmiIndexer {
    public function calculateBMI($height, $weight) {
        return ($weight / ($height * $height)) * 10000;
    }
}

class HealthAnalyzer {
    public function analyzeBmi($bmi) {
        if ($bmi <= 18.4) {
            return "Underweight";
        } elseif ($bmi <= 24.9) {
            return "Normal weight";
        } elseif ($bmi <= 39.9) {
            return "Overweight";
        } else {
            return "Obesity";
        }
    }
}

class HumanBeing {
    private $height;
    private $weight;
    private $bmi;
    
    private function getHeight() {
        return $this->height;
    }
    
    public function setHeight($height) {
        $this->height = $height;
    }
    
    private function getWeight() {
        return $this->weight;
    }
    
    public function setWeight($weight) {
        $this->weight = $weight;
    }
    
    public function getBmi() {
        return $this->bmi;
    }
    
    public function setBmi($bmi) {
        $this->bmi = $bmi;
    }
    
    public function calculateBMI() {
        $bmiIndexer = new BmiIndexer();
        $this->setBmi($bmiIndexer->calculateBMI($this->getHeight(), $this->getWeight()));
    }
    
    public function analyzeBmi() {
        $healthAnalyzer = new HealthAnalyzer();
        return $healthAnalyzer->analyzeBmi($this->getBmi());
    }
}

// TestDriver equivalent in PHP:
$hb = new HumanBeing();
$hb->setHeight(175);  // Height in centimeters
$hb->setWeight(55);   // Weight in kilograms
$hb->calculateBMI();
echo "BMI: " . $hb->getBmi() . "\n";
echo $hb->analyzeBmi() . "\n";

?>

