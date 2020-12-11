<?php

use Illuminate\Database\Seeder;
use App\Career;

class CareersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Career::create(["name"=>"Agroindustrial","total_creditos"=>450]);
        Career::create(["name"=>"Ambiental","total_creditos"=>450]);
        Career::create(["name"=>"Civil","total_creditos"=>450]);
        Career::create(["name"=>"Computación","total_creditos"=>450]);
        Career::create(["name"=>"Electricidad y Automatización","total_creditos"=>450]);
        Career::create(["name"=>"Geoinformática","total_creditos"=>414]);
        Career::create(["name"=>"Geología","total_creditos"=>407]);
        Career::create(["name"=>"Informática","total_creditos"=>450]);
        Career::create(["name"=>"Mecánica","total_creditos"=>450]);
        Career::create(["name"=>"Mecánica Administrativa","total_creditos"=>450]);
        Career::create(["name"=>"Mecánica Eléctrica","total_creditos"=>450]);
        Career::create(["name"=>"Mecatrónica","total_creditos"=>450]);
        Career::create(["name"=>"Metalúrgica y de Materiales","total_creditos"=>450]);
        Career::create(["name"=>"Sistemas Inteligentes","total_creditos"=>450]);
        Career::create(["name"=>"Topografía y Construcción","total_creditos"=>315]);
        Career::create(["name"=>"default","total_creditos"=>0]);
    }
}