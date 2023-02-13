<?php

namespace Database\Seeders;

use App\Models\Character;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $characters = [
            [
                "name" => "Light Yagami",
                "description" => "Light Yagami é o protagonista de Death Note e é retratado como um jovem inteligente e ambicioso que usa o Death Note para mudar o mundo e torná-lo um lugar melhor. Embora ele tenha boas intenções no início, sua obssessão pelo poder acaba o levando a um caminho sombrio. Light é conhecido por sua habilidade de pensar estrategicamente e fazer planos complexos, mas ele também tem um lado sombrio que se revela à medida que sua jornada avança.",
                "image" => "https://cdn.myanimelist.net/images/characters/6/63870.jpg"
            ],
            [
                "name" => "L Lawliet",
                "description" => "L Lawliet é um detetive internacional conhecido por sua habilidade de solucionar casos complicados. Ele é designado para investigar os assassinatos misteriosos que estão ocorrendo devido ao uso do Death Note e acaba se tornando o principal adversário de Light. Apesar de sua aparência jovem e descontraída, L é incrivelmente inteligente e dedicado a sua profissão. Ele é conhecido por sua postura única, seu estilo de comida e sua habilidade de pensar fora da caixa.",
                "image" => "https://cdn.myanimelist.net/images/characters/10/249647.jpg"  ],
            [
                "name" => "Misa Amane",
                "description" => "Misa Amane é uma modelo e atriz popular conhecida por sua beleza e personalidade extrovertida. Ela também é uma portadora de um Death Note e acaba se tornando um alvo de Light. Embora Misa possa ser descrita como superficial e egocêntrica, ela também é mostrada como uma jovem vulnerável que está presa em um jogo mortal. Misa é conhecida por sua aparência extravagante e sua personalidade excêntrica, bem como por sua habilidade de se sair bem em situações difíceis.",
                "image" => "https://cdn.myanimelist.net/images/characters/5/30971.jpg"
            ],
            [
                "name" => "Soichiro Yagami",
                "description" => "Soichiro Yagami é o pai de Light Yagami e o chefe da equipe de investigação encarregada de solucionar os assassinatos misteriosos. Ele é retratado como um homem justo e dedicado a sua profissão, mas também é mostrado como um pai amoroso que luta para proteger sua família. Soichiro é conhecido por sua forte ética e sua habilidade de liderar a equipe, mas também é retratado como alguém que enfrenta desafios quando é confrontado com a verdade sobre as ações de seu filho.",
                "image" => "https://cdn.myanimelist.net/images/characters/2/470067.jpg"
            ],
            [
                "name" => "Teru Mikami",
                "description" => "Teru Mikami é um advogado que se torna o sucessor de Light como o usuário do Death Note. Ele é retratado como alguém que acredita fielmente nas ideias de Light e está disposto a fazer qualquer coisa para ajudá-lo em sua missão. Mikami é conhecido por sua devoção absoluta a Light, mas também é mostrado como alguém que tem um lado sombrio e é capaz de cometer atos violentos sem hesitação. Ele é descrito como alguém que é inteligente e calculista, mas também é retratado como alguém que é facilmente manipulável.",
                "image" => "https://cdn.myanimelist.net/images/characters/14/36951.jpg"
            ],
            [
                "name" => "Edward Elric",
                "description" => "Edward Elric é o protagonista de Fullmetal Alchemist Brotherhood e é um alquimista de Estado jovem e determinado. Ele foi motivado a se tornar um alquimista depois que sua mãe morreu e ele tentou trazê-la de volta à vida com alquimia, resultando em uma perda trágica. Edward é conhecido por sua determinação, coragem e habilidade de combate, bem como por sua personalidade teimosa e orgulhosa. Ele está em uma jornada para encontrar a Philosopher's Stone e corrigir suas ações passadas.",
                "image" => "https://cdn.myanimelist.net/images/characters/9/72533.jpg"
            ],
            [
                "name" => "Alphonse Elric",
                "description" => "Alphonse Elric é o irmão mais novo de Edward e também um alquimista de Estado. Ele perdeu seu corpo na tentativa de trazer sua mãe de volta à vida e agora está preso em uma armadura. Embora Alphonse seja calmo e compasivo, ele também é corajoso e protege seu irmão a todo custo. Ele é conhecido por sua forte ética e lealdade, bem como por sua habilidade de pensar de forma lógica e racional. Alphonse é um dos personagens mais queridos de Fullmetal Alchemist Brotherhood e é um parceiro inseparável de Edward em sua jornada.",
                "image" => "https://cdn.myanimelist.net/images/characters/5/54265.jpg"
            ],
            [
                "name" => "Winry Rockbell",
                "description" => "Winry Rockbell é uma mecânica de automóveis e uma amiga próxima dos irmãos Elric. Ela cresceu com eles em Resembool e é conhecida por sua habilidade de consertar e melhorar a automação de combate. Winry também é uma jovem forte e corajosa, pronta para defender seus amigos a todo custo. Ela é conhecida por sua personalidade animada e amigável, bem como por sua habilidade de manter a calma em situações difíceis. Winry é um dos personagens mais importantes de Fullmetal Alchemist Brotherhood e é um grande apoio para os irmãos Elric em sua jornada.",
                "image" => "https://cdn.myanimelist.net/images/characters/15/84336.jpg"
            ],
        ];

        foreach ($characters as $character){
            Character::factory()->create([
                'name' => $character['name'],
                'description' => $character['description'],
                'image' => $character['image'],
            ]);
        }
    }
}
