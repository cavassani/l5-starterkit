<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CitiesGoiasSeeder extends Seeder {

    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        DB::table('cities')->insert([
        	['name' => 'Abadia de Goiás', 'state_id' => 9],
            ['name' => 'Abadiânia', 'state_id' => 9],
            ['name' => 'Acreúna', 'state_id' => 9],
            ['name' => 'Adelândia', 'state_id' => 9],
            ['name' => 'Água Fria de Goiás', 'state_id' => 9],
            ['name' => 'Água Limpa', 'state_id' => 9],
            ['name' => 'Águas Lindas de Goiás', 'state_id' => 9],
            ['name' => 'Alexânia', 'state_id' => 9],
            ['name' => 'Aloândia', 'state_id' => 9],
            ['name' => 'Alto Horizonte', 'state_id' => 9],
            ['name' => 'Alto Paraíso de Goiás', 'state_id' => 9],
            ['name' => 'Alvorada do Norte', 'state_id' => 9],
            ['name' => 'Amaralina', 'state_id' => 9],
            ['name' => 'Americano do Brasil', 'state_id' => 9],
            ['name' => 'Amorinópolis', 'state_id' => 9],
            ['name' => 'Anápolis', 'state_id' => 9],
            ['name' => 'Anhanguera', 'state_id' => 9],
            ['name' => 'Anicuns', 'state_id' => 9],
            ['name' => 'Aparecida de Goiânia', 'state_id' => 9],
            ['name' => 'Aparecida do Rio Doce', 'state_id' => 9],
            ['name' => 'Aporé', 'state_id' => 9],
            ['name' => 'Araçu', 'state_id' => 9],
            ['name' => 'Aragarças', 'state_id' => 9],
            ['name' => 'Aragoiânia', 'state_id' => 9],
            ['name' => 'Araguapaz', 'state_id' => 9],
            ['name' => 'Arenópolis', 'state_id' => 9],
            ['name' => 'Aruanã', 'state_id' => 9],
            ['name' => 'Aurilândia', 'state_id' => 9],
            ['name' => 'Avelinópolis', 'state_id' => 9],
            ['name' => 'Baliza', 'state_id' => 9],
            ['name' => 'Barro Alto', 'state_id' => 9],
            ['name' => 'Bela Vista de Goiás', 'state_id' => 9],
            ['name' => 'Bom Jardim de Goiás', 'state_id' => 9],
            ['name' => 'Bom Jesus de Goiás', 'state_id' => 9],
            ['name' => 'Bonfinópolis', 'state_id' => 9],
            ['name' => 'Bonópolis', 'state_id' => 9],
            ['name' => 'Brazabrantes', 'state_id' => 9],
            ['name' => 'Britânia', 'state_id' => 9],
            ['name' => 'Buriti Alegre', 'state_id' => 9],
            ['name' => 'Buriti de Goiás', 'state_id' => 9],
            ['name' => 'Buritinópolis', 'state_id' => 9],
            ['name' => 'Cabeceiras', 'state_id' => 9],
            ['name' => 'Cachoeira Alta', 'state_id' => 9],
            ['name' => 'Cachoeira de Goiás', 'state_id' => 9],
            ['name' => 'Cachoeira Dourada', 'state_id' => 9],
            ['name' => 'Caçu', 'state_id' => 9],
            ['name' => 'Caiapônia', 'state_id' => 9],
            ['name' => 'Caldas Novas', 'state_id' => 9],
            ['name' => 'Caldazinha', 'state_id' => 9],
            ['name' => 'Campestre de Goiás', 'state_id' => 9],
            ['name' => 'Campinaçu', 'state_id' => 9],
            ['name' => 'Campinorte', 'state_id' => 9],
            ['name' => 'Campo Alegre de Goiás', 'state_id' => 9],
            ['name' => 'Campo Limpo de Goiás', 'state_id' => 9],
            ['name' => 'Campos Belos', 'state_id' => 9],
            ['name' => 'Campos Verdes', 'state_id' => 9],
            ['name' => 'Carmo do Rio Verde', 'state_id' => 9],
            ['name' => 'Castelândia', 'state_id' => 9],
            ['name' => 'Catalão', 'state_id' => 9],
            ['name' => 'Caturaí', 'state_id' => 9],
            ['name' => 'Cavalcante', 'state_id' => 9],
            ['name' => 'Ceres', 'state_id' => 9],
            ['name' => 'Cezarina', 'state_id' => 9],
            ['name' => 'Chapadão do Céu', 'state_id' => 9],
            ['name' => 'Cidade Ocidental', 'state_id' => 9],
            ['name' => 'Cocalzinho de Goiás', 'state_id' => 9],
            ['name' => 'Colinas do Sul', 'state_id' => 9],
            ['name' => 'Córrego do Ouro', 'state_id' => 9],
            ['name' => 'Corumbá de Goiás', 'state_id' => 9],
            ['name' => 'Corumbaíba', 'state_id' => 9],
            ['name' => 'Cristalina', 'state_id' => 9],
            ['name' => 'Cristianópolis', 'state_id' => 9],
            ['name' => 'Crixás', 'state_id' => 9],
            ['name' => 'Cromínia', 'state_id' => 9],
            ['name' => 'Cumari', 'state_id' => 9],
            ['name' => 'Damianópolis', 'state_id' => 9],
            ['name' => 'Damolândia', 'state_id' => 9],
            ['name' => 'Davinópolis', 'state_id' => 9],
            ['name' => 'Diorama', 'state_id' => 9],
            ['name' => 'Divinópolis de Goiás', 'state_id' => 9],
            ['name' => 'Doverlândia', 'state_id' => 9],
            ['name' => 'Edealina', 'state_id' => 9],
            ['name' => 'Edéia', 'state_id' => 9],
            ['name' => 'Estrela do Norte', 'state_id' => 9],
            ['name' => 'Faina', 'state_id' => 9],
            ['name' => 'Fazenda Nova', 'state_id' => 9],
            ['name' => 'Firminópolis', 'state_id' => 9],
            ['name' => 'Flores de Goiás', 'state_id' => 9],
            ['name' => 'Formosa', 'state_id' => 9],
            ['name' => 'Formoso', 'state_id' => 9],
            ['name' => 'Gameleira de Goiás', 'state_id' => 9],
            ['name' => 'Goianápolis', 'state_id' => 9],
            ['name' => 'Goiandira', 'state_id' => 9],
            ['name' => 'Goianésia', 'state_id' => 9],
            ['name' => 'Goiânia', 'state_id' => 9],
            ['name' => 'Goianira', 'state_id' => 9],
            ['name' => 'Goiás', 'state_id' => 9],
            ['name' => 'Goiatuba', 'state_id' => 9],
            ['name' => 'Gouvelândia', 'state_id' => 9],
            ['name' => 'Guapó', 'state_id' => 9],
            ['name' => 'Guaraíta', 'state_id' => 9],
            ['name' => 'Guarani de Goiás', 'state_id' => 9],
            ['name' => 'Guarinos', 'state_id' => 9],
            ['name' => 'Heitoraí', 'state_id' => 9],
            ['name' => 'Hidrolândia', 'state_id' => 9],
            ['name' => 'Hidrolina', 'state_id' => 9],
            ['name' => 'Iaciara', 'state_id' => 9],
            ['name' => 'Inaciolândia', 'state_id' => 9],
            ['name' => 'Indiara', 'state_id' => 9],
            ['name' => 'Inhumas', 'state_id' => 9],
            ['name' => 'Ipameri', 'state_id' => 9],
            ['name' => 'Ipiranga de Goiás', 'state_id' => 9],
            ['name' => 'Iporá', 'state_id' => 9],
            ['name' => 'Israelândia', 'state_id' => 9],
            ['name' => 'Itaberaí', 'state_id' => 9],
            ['name' => 'Itaguari', 'state_id' => 9],
            ['name' => 'Itaguaru', 'state_id' => 9],
            ['name' => 'Itajá', 'state_id' => 9],
            ['name' => 'Itapaci', 'state_id' => 9],
            ['name' => 'Itapirapuã', 'state_id' => 9],
            ['name' => 'Itapuranga', 'state_id' => 9],
            ['name' => 'Itarumã', 'state_id' => 9],
            ['name' => 'Itauçu', 'state_id' => 9],
            ['name' => 'Itumbiara', 'state_id' => 9],
            ['name' => 'Ivolândia', 'state_id' => 9],
            ['name' => 'Jandaia', 'state_id' => 9],
            ['name' => 'Jaraguá', 'state_id' => 9],
            ['name' => 'Jataí', 'state_id' => 9],
            ['name' => 'Jaupaci', 'state_id' => 9],
            ['name' => 'Jesúpolis', 'state_id' => 9],
            ['name' => 'Joviânia', 'state_id' => 9],
            ['name' => 'Jussara', 'state_id' => 9],
            ['name' => 'Lagoa Santa', 'state_id' => 9],
            ['name' => 'Leopoldo de Bulhões', 'state_id' => 9],
            ['name' => 'Luziânia', 'state_id' => 9],
            ['name' => 'Mairipotaba', 'state_id' => 9],
            ['name' => 'Mambaí', 'state_id' => 9],
            ['name' => 'Mara Rosa', 'state_id' => 9],
            ['name' => 'Marzagão', 'state_id' => 9],
            ['name' => 'Matrinchã', 'state_id' => 9],
            ['name' => 'Maurilândia', 'state_id' => 9],
            ['name' => 'Mimoso de Goiás', 'state_id' => 9],
            ['name' => 'Minaçu', 'state_id' => 9],
            ['name' => 'Mineiros', 'state_id' => 9],
            ['name' => 'Moiporá', 'state_id' => 9],
            ['name' => 'Monte Alegre de Goiás', 'state_id' => 9],
            ['name' => 'Montes Claros de Goiás', 'state_id' => 9],
            ['name' => 'Montividiu', 'state_id' => 9],
            ['name' => 'Montividiu do Norte', 'state_id' => 9],
            ['name' => 'Morrinhos', 'state_id' => 9],
            ['name' => 'Morro Agudo de Goiás', 'state_id' => 9],
            ['name' => 'Mossâmedes', 'state_id' => 9],
            ['name' => 'Mozarlândia', 'state_id' => 9],
            ['name' => 'Mundo Novo', 'state_id' => 9],
            ['name' => 'Mutunópolis', 'state_id' => 9],
            ['name' => 'Nazário', 'state_id' => 9],
            ['name' => 'Nerópolis', 'state_id' => 9],
            ['name' => 'Niquelândia', 'state_id' => 9],
            ['name' => 'Nova América', 'state_id' => 9],
            ['name' => 'Nova Aurora', 'state_id' => 9],
            ['name' => 'Nova Crixás', 'state_id' => 9],
            ['name' => 'Nova Glória', 'state_id' => 9],
            ['name' => 'Nova Iguaçu de Goiás', 'state_id' => 9],
            ['name' => 'Nova Roma', 'state_id' => 9],
            ['name' => 'Nova Veneza', 'state_id' => 9],
            ['name' => 'Novo Brasil', 'state_id' => 9],
            ['name' => 'Novo Gama', 'state_id' => 9],
            ['name' => 'Novo Planalto', 'state_id' => 9],
            ['name' => 'Orizona', 'state_id' => 9],
            ['name' => 'Ouro Verde de Goiás', 'state_id' => 9],
            ['name' => 'Ouvidor', 'state_id' => 9],
            ['name' => 'Padre Bernardo', 'state_id' => 9],
            ['name' => 'Palestina de Goiás', 'state_id' => 9],
            ['name' => 'Palmeiras de Goiás', 'state_id' => 9],
            ['name' => 'Palmelo', 'state_id' => 9],
            ['name' => 'Palminópolis', 'state_id' => 9],
            ['name' => 'Panamá', 'state_id' => 9],
            ['name' => 'Paranaiguara', 'state_id' => 9],
            ['name' => 'Paraúna', 'state_id' => 9],
            ['name' => 'Perolândia', 'state_id' => 9],
            ['name' => 'Petrolina de Goiás', 'state_id' => 9],
            ['name' => 'Pilar de Goiás', 'state_id' => 9],
            ['name' => 'Piracanjuba', 'state_id' => 9],
            ['name' => 'Piranhas', 'state_id' => 9],
            ['name' => 'Pirenópolis', 'state_id' => 9],
            ['name' => 'Pires do Rio', 'state_id' => 9],
            ['name' => 'Planaltina', 'state_id' => 9],
            ['name' => 'Pontalina', 'state_id' => 9],
            ['name' => 'Porangatu', 'state_id' => 9],
            ['name' => 'Porteirão', 'state_id' => 9],
            ['name' => 'Portelândia', 'state_id' => 9],
            ['name' => 'Posse', 'state_id' => 9],
            ['name' => 'Professor Jamil', 'state_id' => 9],
            ['name' => 'Quirinópolis', 'state_id' => 9],
            ['name' => 'Rialma', 'state_id' => 9],
            ['name' => 'Rianápolis', 'state_id' => 9],
            ['name' => 'Rio Quente', 'state_id' => 9],
            ['name' => 'Rio Verde', 'state_id' => 9],
            ['name' => 'Rubiataba', 'state_id' => 9],
            ['name' => 'Sanclerlândia', 'state_id' => 9],
            ['name' => 'Santa Bárbara de Goiás', 'state_id' => 9],
            ['name' => 'Santa Cruz de Goiás', 'state_id' => 9],
            ['name' => 'Santa Fé de Goiás', 'state_id' => 9],
            ['name' => 'Santa Helena de Goiás', 'state_id' => 9],
            ['name' => 'Santa Isabel', 'state_id' => 9],
            ['name' => 'Santa Rita do Araguaia', 'state_id' => 9],
            ['name' => 'Santa Rita do Novo Destino', 'state_id' => 9],
            ['name' => 'Santa Rosa de Goiás', 'state_id' => 9],
            ['name' => 'Santa Tereza de Goiás', 'state_id' => 9],
            ['name' => 'Santa Terezinha de Goiás', 'state_id' => 9],
            ['name' => 'Santo Antônio da Barra', 'state_id' => 9],
            ['name' => 'Santo Antônio de Goiás', 'state_id' => 9],
            ['name' => 'Santo Antônio do Descoberto', 'state_id' => 9],
            ['name' => 'São Domingos', 'state_id' => 9],
            ['name' => 'São Francisco de Goiás', 'state_id' => 9],
            ['name' => 'São João d`Aliança', 'state_id' => 9],
            ['name' => 'São João da Paraúna', 'state_id' => 9],
            ['name' => 'São Luís de Montes Belos', 'state_id' => 9],
            ['name' => 'São Luíz do Norte', 'state_id' => 9],
            ['name' => 'São Miguel do Araguaia', 'state_id' => 9],
            ['name' => 'São Miguel do Passa Quatro', 'state_id' => 9],
            ['name' => 'São Patrício', 'state_id' => 9],
            ['name' => 'São Simão', 'state_id' => 9],
            ['name' => 'Senador Canedo', 'state_id' => 9],
            ['name' => 'Serranópolis', 'state_id' => 9],
            ['name' => 'Silvânia', 'state_id' => 9],
            ['name' => 'Simolândia', 'state_id' => 9],
            ['name' => 'Sítio d`Abadia', 'state_id' => 9],
            ['name' => 'Taquaral de Goiás', 'state_id' => 9],
            ['name' => 'Teresina de Goiás', 'state_id' => 9],
            ['name' => 'Terezópolis de Goiás', 'state_id' => 9],
            ['name' => 'Três Ranchos', 'state_id' => 9],
            ['name' => 'Trindade', 'state_id' => 9],
            ['name' => 'Trombas', 'state_id' => 9],
            ['name' => 'Turvânia', 'state_id' => 9],
            ['name' => 'Turvelândia', 'state_id' => 9],
            ['name' => 'Uirapuru', 'state_id' => 9],
            ['name' => 'Uruaçu', 'state_id' => 9],
            ['name' => 'Uruana', 'state_id' => 9],
            ['name' => 'Urutaí', 'state_id' => 9],
            ['name' => 'Valparaíso de Goiás', 'state_id' => 9],
            ['name' => 'Varjão', 'state_id' => 9],
            ['name' => 'Vianópolis', 'state_id' => 9],
            ['name' => 'Vicentinópolis', 'state_id' => 9],
            ['name' => 'Vila Boa', 'state_id' => 9],
            ['name' => 'Vila Propício', 'state_id' => 9]
        ]);

    }
}