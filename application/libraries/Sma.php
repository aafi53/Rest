<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Sma
{
    public function __construct()
    {
    }
    public function __get($var)
    {
        return get_instance()->$var;
    }


public function qrcode($type = 'text', $text = 'www.quetech.info', $size = 2, $level = 'H', $sq = null)
    {
        $file_name = 'assets/uploads/qrcode2.png';
        if ($type == 'link') {
            $text = urldecode($text);
        }
        $this->load->library('tec_qrcode', '', 'qr');
        $config = ['data' => $text, 'size' => $size, 'level' => $level, 'savename' => $file_name];
       $this->qr->generate($config);
        $imagedata = file_get_contents($file_name);
        return "<img src='data:image/png;base64," . base64_encode($imagedata) . "' alt='{$text}' class='qrimg' />";
    }
}
