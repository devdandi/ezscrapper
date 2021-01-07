<?php
namespace core;
use Exception;
class cURL
{
    public $output = [];

    public function setup(array $setup = [])
    {
        // SETUP THE CURL 
        try{
            if($setup['url'] === null || $setup['return_transfer'] === null)
            {
                throw new Exception('Please check your configuration !');
            }

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $setup['url']);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, $setup['return_transfer']);
            $output = curl_exec($curl);
            curl_close($curl);

            if($output !== false)
            {
                $this->output['status'] = true;
                $this->output['data'] = $output;
            }else{
                $this->output['status'] = false;
            }

        } catch(Exception $e) {
            echo $e->getMessage();
        }
        // END SETUP

    }
    public function connect()
    {
       try {
           if(is_null($this->output))
           {
                throw new Exception('Domain not found or url is error !');
           }
       } catch (\Exception $e) {
         echo $e->getMessage();
       }
    }
}