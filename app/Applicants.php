<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicants extends Model
{

    protected $primaryKey = 'id';
    protected $table = 'applicants';

    protected $fillable = [
        'userid','relationship', 'age', 'education', 'speaking', 'listening', 'reading', 'writing', 'experience',

    ];



    public function getScoreAttribute()
    {
        if ($this->relationship == 'alone') {
            $alone = true;
        } else {
            $alone = false;
        }

        $ageScore = $this->ageCRS($this->age, $alone);
        $educationScore = $this->educationCRS($this->education, $alone);
        $ieltsCRSScore = $this->calcualteCLBtoCRS(
            [$this->speaking, $this->reading, $this->writing, $this->listening],
            $alone
        );
        $totalCLBScore = $this->speaking + $this->reading + $this->writing + $this->listening;
        $skillCRS = False;

        if($totalCLBScore >= 36){
            $skillCRS = TRUE;
        }

        $skillExpClbScore = $this->experienceCRS($this->experience, $skillCRS);

        if($this->relationship == "alone"){
            //Total CRS Score.
            $totalCRSScore = $ageScore + $educationScore + $ieltsCRSScore + $skillExpClbScore;
        } else {
            $totalCRSScore = '';
//            $totalCRSScore = $spouseEduCRS+$spouseExpCRS+$ageScore+$educationScore+$ieltsCRSScore+$SkillExpClbScore+$siblingScore;
        }

        return $totalCRSScore;
    }


    public function ageCRS($age, $alone){
        if($alone){
            switch($age){
                case $age<18:
                    $score = 0;
                    break;
                case $age==18:
                    $score = 99;
                    break;
                case $age==19:
                    $score = 105;
                    break;
                case $age>19 && $age<30:
                    $score = 110;
                    break;
                case $age==30:
                    $score = 105;
                    break;
                case $age==31:
                    $score = 99;
                    break;
                case $age==32:
                    $score = 94;
                    break;
                case $age==33:
                    $score = 88;
                    break;
                case $age==34:
                    $score = 83;
                    break;
                case $age==35:
                    $score = 77;
                    break;
                case $age==36:
                    $score = 72;
                    break;
                case $age==37:
                    $score = 66;
                    break;
                case $age==38:
                    $score = 61;
                    break;
                case $age==39:
                    $score = 55;
                    break;
                case $age==40:
                    $score = 50;
                    break;
                case $age==41:
                    $score = 39;
                    break;
                case $age==42:
                    $score = 28;
                    break;
                case $age==43:
                    $score = 17;
                    break;
                case $age==44:
                    $score = 6;
                    break;
                case $age>44:
                    $score = 0;
                    break;
            }
            return $score;
        } else {
            switch($age){
                case $age<18:
                    $score = 0;
                    break;
                case $age==18:
                    $score = 90;
                    break;
                case $age==19:
                    $score = 95;
                    break;
                case $age>19 && $age<30:
                    $score = 100;
                    break;
                case $age==30:
                    $score = 95;
                    break;
                case $age==31:
                    $score = 90;
                    break;
                case $age==32:
                    $score = 85;
                    break;
                case $age==33:
                    $score = 80;
                    break;
                case $age==34:
                    $score = 75;
                    break;
                case $age==35:
                    $score = 70;
                    break;
                case $age==36:
                    $score = 65;
                    break;
                case $age==37:
                    $score = 60;
                    break;
                case $age==38:
                    $score = 55;
                    break;
                case $age==39:
                    $score = 50;
                    break;
                case $age==40:
                    $score = 45;
                    break;
                case $age==41:
                    $score = 35;
                    break;
                case $age==42:
                    $score = 25;
                    break;
                case $age==43:
                    $score = 15;
                    break;
                case $age==44:
                    $score = 5;
                    break;
                case $age>44:
                    $score = 0;
                    break;
            }
            return $score;
        }
    }

    public function educationCRS($level, $alone){
        if($alone){
            switch($level){
                case "a":
                    $score = 120;
                    break;
                case "b":
                    $score = 128;
                    break;
                case "c":
                    $score = 135;
                    break;
                case "d":
                    $score = 150;
                    break;
            }
            return $score;
        } else {
            switch($level){
                case "a":
                    $score = 112;
                    break;
                case "b":
                    $score = 119;
                    break;
                case "c":
                    $score = 126;
                    break;
                case "d":
                    $score = 140;
                    break;
            }
            return $score;
        }
    }

    public function calcualteCLBtoCRS($clbScores, $alone){
        $crsScore = 0;
        if($alone){
            foreach($clbScores as $clbscore){
                $nextCRSScore = $this->aloneCLBtoCRS($clbscore);
                $crsScore = $crsScore + $nextCRSScore;
            }
        } else {
            foreach($clbScores as $clbscore){
                $nextCRSScore = $this->spouseCLBtoCRS($clbscore);
                $crsScore = $crsScore + $nextCRSScore;
            }
        }

        return $crsScore;
    }

    public function aloneCLBtoCRS($clb){
        switch($clb){
            case 10:
                $score = 34;
                break;
            case 9:
                $score = 31;
                break;
            case 8:
                $score = 23;
                break;
            default:
                $score = 17;
        }

        return $score;
    }

    public function spouseCLBtoCRS($clb){
        switch($clb){
            case 10:
                $score = 32;
                break;
            case 9:
                $score = 29;
                break;
            case 8:
                $score = 22;
                break;
            default:
                $score = 16;
        }

        return $score;
    }

    public function experienceCRS($exp,$flag){
        if($flag){
            switch($exp){
                case "c":
                    $score = 50;
                    break;
                default:
                    $score = 25;
            }
            return $score;
        } else {
            switch($exp){
                case "c":
                    $score = 25;
                    break;
                default:
                    $score = 13;
            }
            return $score;
        }
    }

}
