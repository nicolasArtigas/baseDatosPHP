<?php
class Alumno {
    private $cedula;
    private $grupo;
    private $cuotaBase;
    
    public function __construct($cedula,$grupo,$cuotaBase) {
    	  $this->cedula = $cedula;
        $this->grupo = $grupo;
        $this->cuotaBase = $cuotaBase;
    }
 //*************************************************************   
    public function getCedula() {
        return $this->cedula;
    }

    public function getGrupo() {
        return $this->grupo;
    }

    public function getCuotaBase() {
        return $this->cuotaBase;
    }

    public function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    public function setGrupo($grupo) {
        $this->grupo = $grupo;
    }

    public function setCuotaBase($cuotaBase) {
        $this->cuotaBase = $cuotaBase;
    }
//*************************************************************
    public function cuotaNeta(){
        $cuota = $this->cuotaBase;        
        switch ($this->grupo) {
            case 1: case 2:
                $cuota = $cuota * 0.75;
                break;
            case 3: case 4:
                $cuota = $cuota * 0.90;
                break;
            
        }
        return $cuota;
    }
//*************************************************************
    public function __toString() {
        return "<p>Cédula: ".$this->cedula.", "
              ."grupo: ".$this->grupo."°, "
              ."cuota base: ".$this->cuotaBase.", "
              ."cuota neta: ".$this->cuotaNeta()."</p>"; 
    }
//*************************************************************    
}
