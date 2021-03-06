 <?php
    require_once('formCustomer.php');
    
    class SundayForm extends CustomerForm {
        protected $adultTix;
        protected $studentTix;
        protected $compTix;
        
        public function display($adultPrice, $studentPrice) {
            ?>
            <fieldset>
                <legend>Tickets for Sunday's Concert</legend>
                <?php echo 'Pricing: Adults- $' . $adultPrice . ' Students- $' . $studentPrice . '<br />';  ?>    
                <input type="hidden" name="p3" value="<?php echo $adultPrice; ?>" />
                <input type="hidden" name="p4" value="<?php echo $studentPrice; ?>" />
                <label for="adultS">Number of Adult Tickets</label>
                <input type="number" name="adultS" defaultValue="0" min="0" /><br />
                <label for="studentS">Number of Student Tickets</label>
                <input type="number" name="studentS" defaultValue="0" min="0" /><br />
            
            
            <?php
        }
        
        public function setAdultTix($adultTix)
        {
            $this->adultTix = $adultTix ?: 0;
        }
        
        public function getAdultTix() 
        {
            return $this->adultTix;
        }
        
         public function setStudentTix($studentTix)
        {
            $this->studentTix = $studentTix ?: 0;
        }
        
        public function getStudentTix() 
        {
            return $this->studentTix;
        }
        
         public function setCompTix($compTix)
        {
            $this->compTix = $compTix ?: 0;
        }
        
        public function getCompTix() 
        {
            return $this->compTix;
        }
        
        public function query($concertId) {
           $query = "insert into sunday" . $concertId . " (firstName, lastName, address, " . 
                    "city, state, zip, email, payment, numAdSun, numStuSun) values ('" . 
                    $this->getFirstName() . "', '" .
                    $this->getLastName() . "', '" . $this->getAddress() . "', '" . 
                    $this->getCity() . "', '" . $this->getState() .
                    "', " . $this->getZip() . ", '" . $this->getEmail() . "', 'credit card', " . 
                    $this->adultTix . ", " . $this->studentTix . ")";
            return $query;
        }
        
        public function compQuery($id) {
            $query = "insert into friday" . $concertId . " (firstName, lastName, address, " . 
                    "city, state, zip, email, payment, numAdFri, numStuFri, numComFri) values ('" . 
                    $this->getFirstName() . "', '" .
                    $this->getLastName() . "', '" . $this->getAddress() . "', '" . 
                    $this->getCity() . "', '" . $this->getState() .
                    "', " . $this->getZip() . ", '" . $this->getEmail() . "', 'credit card', " . 
                    $this->adultTix . ", " . $this->studentTix . ", " . $this->compTix . ")";
            return $query;
        }
    }
?>