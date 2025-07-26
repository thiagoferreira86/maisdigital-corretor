<?php

class Pagseguro extends ActiveRecord {
    
    public function adesaoPlano($url, $json, $email, $token){   
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url.'?email='.$email.'&token='.$token,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($json),
            CURLOPT_HTTPHEADER => array("Content-Type: application/json", "Accept: application/vnd.pagseguro.com.br.v1+json;charset=ISO-8859-1","Content-Type: text/plain"),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $xml = json_decode($response);
        $err = curl_error($curl);
        return $xml;
        $this->erro = $err;
    }
    
    public function cobrancaPlano($url, $xml, $email, $token){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url.'?email='.$email.'&token='.$token,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $xml,
            CURLOPT_HTTPHEADER => array("Content-Type: application/xml","Accept: application/vnd.pagseguro.com.br.v3+json;charset=ISO-8859-1","Content-Type: application/xml"),
        ));

        $response = curl_exec($curl);
        $xm = json_decode($response);
        curl_close($curl);
        return $xm;
    }
    
    public function consultaCobranca($url, $codigo, $email, $token){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url.'/'.$codigo.'?email='.$email.'&token='.$token,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array("Content-Type: application/json", "Accept: application/vnd.pagseguro.com.br.v3+json;charset=ISO-8859-1"),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
    
    public function cancelarAssinatura($url, $codigo, $email, $token){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url.'/'.$codigo.'/cancel?email='.$email.'&token='.$token,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_HTTPHEADER => array("Content-Type: application/json", "Accept: application/vnd.pagseguro.com.br.v3+json;charset=ISO-8859-1"),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
    
    public function descontoAssinatura($url, $codigo, $email, $token, $desconto){
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url.'/'.$codigo.'/discount?email='.$email.'&token='.$token,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_POSTFIELDS =>"{\"type\":\"DISCOUNT_PERCENT\",\"value\":$desconto}",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Accept: application/vnd.pagseguro.com.br.v3+json;charset=ISO-8859-1",
                "Content-Type: text/plain"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }
}
