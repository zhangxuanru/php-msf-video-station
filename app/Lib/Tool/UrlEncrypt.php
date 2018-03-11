<?php
/**
 * URL参数加密类
 */
namespace App\Lib\Tool;

class UrlEncrypt{
        private  $key = 'zxr';
        public function keyED($txt,$encrypt_key){
            $encrypt_key = md5($encrypt_key);
            $ctr=0;
            $tmp = "";
            for($i=0;$i<strlen($txt);$i++)
            {
                if ($ctr==strlen($encrypt_key))
                    $ctr=0;
                $tmp.= substr($txt,$i,1) ^ substr($encrypt_key,$ctr,1);
                $ctr++;
            }
            return $tmp;
        }

        public function encrypt($txt,$key)   {
            $encrypt_key = md5(mt_rand(0,100));
            $ctr=0;
            $tmp = "";
            for ($i=0;$i<strlen($txt);$i++)
            {
                if ($ctr==strlen($encrypt_key))
                    $ctr=0;
                $tmp.=substr($encrypt_key,$ctr,1) . (substr($txt,$i,1) ^ substr($encrypt_key,$ctr,1));
                $ctr++;
            }
            return $this->keyED($tmp,$key);
        }

      public  function decrypt($txt,$key){
            $txt = $this->keyED($txt,$key);
            $tmp = "";
            for($i=0;$i<strlen($txt);$i++)
            {
                $md5 = substr($txt,$i,1);
                $i++;
                $tmp.= (substr($txt,$i,1) ^ $md5);
            }
            return $tmp;
        }


       public   function encrypt_url($url){
            $key = $this->key;
            return rawurlencode(base64_encode($this->encrypt($url,$key)));
        }


        public function decrypt_url($url){
            $key = $this->key;
            return $this->decrypt(base64_decode(rawurldecode($url)),$key);
        }


      public  function geturl($str,$key){
            $str = $this->decrypt_url($str,$key);
            $url_array = explode('&',$str);
            if (is_array($url_array))
            {
                foreach ($url_array as $var)
                {
                    $var_array = explode("=",$var);
                    $vars[$var_array[0]]=$var_array[1];
                }
            }
            return $vars;
        }
}