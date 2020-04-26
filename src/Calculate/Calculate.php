<?php

class Calculate
{
    
    public static function run($param, $symbol)
    {
        $len = count($param);

        $allow=true;
        $total=$param[0];
        $textLayout = $param[0] ."{$symbol}";

        for($i=1; $i<$len; $i++){
            if(!is_numeric($param[$i])){
                $allow=false;
                break;
            } else {
                $textLayout .= $param[$i] ."{$symbol}";
                switch($symbol){
                    case "+":
                        $total += floatval($param[$i]);
                    break;
                    case "-":
                        $total -= floatval($param[$i]);
                    break;
                    case "*":
                        $total *= floatval($param[$i]);
                    break;
                    case "/":
                        $total /= floatval($param[$i]);
                    break;
                    case "^":
                        $total **= floatval($param[$i]);
                    break;
                }
            }
        }

        $result=null;

        if($allow){

            $result[0]=1;
            $result[1]="".substr($textLayout, 0, strlen($textLayout)-1). " = ".$total."\n";

        } else {

            $result[0]=0;
            $result[1]="Please check your input, it should contain only number\n";;
        }

        return $result;
    }
}