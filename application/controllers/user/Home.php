<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()

    {
        $data['tittle'] = "CAPS - Candra Apple Solution | Apple Service Center Purwokerto";

        $this->load->model('Landing_model');
        $data['device']     = $this->Landing_model->getDevice();

        $data['combo'] = array(
            array(1, "lcd_batre.png", "Servis LCD + Battery Original Part 100%"),
            array(1, "ic_charger_batre.png", "Servis IC Charging + Battery Original Part 100%"),
            array(1, "ic_touch_lcd.png", "Servis IC Touch + LCD Original Part 100%"),
            array(1, "konektor_charger_battery.png", "Servis Konektor Charger + Battery Original Part 100%"),
        );

        $data['acc'] = array(
            array(1, "lightingcharger.png", "Lighting Cable Chaarger Original Part 100%"),
            array(0, "charger18wat.png", "USB Tipe C 18 Watt Original Part 100%"),
            array(0, "chargeriwatch.png", "Cable Charger Apple Watch Original Part 100%"),
            array(1, "adaptorcharger.png", "Adapter Charger Original Part 100%"),
            array(0, "adapter18watt.png", "Adapter 18 Watt Original Part 100%"),
            array(0, "magsafe.png", "Magsafe Original Part 100%"),
            array(1, "earphone.png", "Earphone Original Part 100%"),
            array(1, "airpodspro.png", "Airpods Pro Original Part 100%"),
            array(0, "airpods.png", "Airposd Original Part 100%"),
            array(1, "applepencil.png", "Apple Pencil Pro Original Part 100%"),
            array(0, "applemouse.png", "Apple Mouse Original Part 100%"),
            array(0, "applekeyboard.png", "Apple Keyboard Original Part 100%"),
            array(1, "converteraudio.png", "Converter Audio 3.5mm Original Part 100%"),
            array(1, "softcase.png", "iPhone Case Premium Quality"),
            array(0, "temperedglass.png", "Tempred Glass Premium Quality")
        );

        $this->load->view('pengunjung/header', $data);
        $this->load->view('pengunjung/index', $data);
        $this->load->view('pengunjung/footer', $data);
    }
}
