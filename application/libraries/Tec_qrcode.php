<?php

defined('BASEPATH') or exit('No direct script access allowed');



use Endroid\QrCode\QrCode;

class Tec_qrcode
{
    public function generate($params = [])
    {
        $data   = $params['data'] ?? 'quetech.info';
        $qrCode = new QrCode($data);
        $qrCode->setSize(170);
        $qrCode->setMargin(2);
        $qrCode->setEncoding('UTF-8');
        $qrCode->setWriterByName('png');
        //$qrCode->setRoundBlockSize(true);
        $qrCode->writeFile($params['savename']);
        // QRcode::png($params['data'], $params['savename'], 'H', 2, 0);
        return $params['savename'];
    }
}