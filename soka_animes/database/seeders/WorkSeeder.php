<?php

namespace Database\Seeders;

use App\Models\Work;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $works = [
            [
                'name' => 'Death Note',
                'synopsis' => 'Light Yagami é um estudante brilhante que descobre um caderno misterioso capaz de matar qualquer pessoa cujo nome é escrito nele. Ele decide usar essa poderosa ferramenta para criar um mundo melhor, sem criminosos, mas logo descobre que há um detetive enigmático em sua cola.',
                'release_date' => '2006-10-03',
                'chapters' => 37,
                'volumes' => 1,
                'producer' => 'Produtora',
                'author' => 'Tsugumi Ohba & Takeshi Obata',
                'image' => 'https://cdn.myanimelist.net/images/anime/9/9453.jpg',
                'type' => 1,
                'status' => 1,
            ],
            [
                'name' => 'Fullmetal Alchemist: Brotherhood',
                'synopsis' => 'Edward e Alphonse Elric são dois irmãos que, após uma tentativa fracassada de trazer sua mãe de volta à vida usando alquimia, perdem parte de seus corpos. Eles agora viajam pelo país em busca de uma pedra filosofal que possa restaurar o que eles perderam.',
                'release_date' => '2009-04-05',
                'chapters' => 64,
                'volumes' => 1,
                'producer' => 'Produtora',
                'author' => 'Hiromu Arakawa',
                'image' => 'https://cdn.myanimelist.net/images/anime/1208/94745.jpg',
                'type' => 1,
                'status' => 1,
            ],
            [
                'name' => 'Naruto',
                'synopsis' => 'Naruto Uzumaki é um jovem ninja com um sonho: se tornar Hokage, o líder de sua aldeia. Mas ele enfrenta muitos desafios e precisa superar a rejeição de seus colegas para realizar seu sonho.',
                'release_date' => '2002-10-03',
                'chapters' => 700,
                'volumes' => 72,
                'producer' => 'Produtora',
                'author' => 'Masashi Kishimoto',
                'image' => 'https://cdn.myanimelist.net/images/anime/13/17405.jpg',
                'type' => 1,
                'status' => 1,
            ],
            [
                'name' => 'One Piece',
                'synopsis' => 'Monkey D. Luffy é um jovem com poderes de borracha que se junta a uma tripulação de piratas em busca do tesouro lendário "One Piece". Eles enfrentam muitos perigos e obstáculos em sua jornada pelo Grand Line.',
                'release_date' => '1999-07-19',
                'chapters' => 1013,
                'volumes' => 95,
                'producer' => 'Produtora',
                'author' => 'Eiichiro Oda',
                'image' => 'https://cdn.myanimelist.net/images/anime/6/73245.jpg',
                'type' => 1,
                'status' => 1,
            ],
            [
                'name' => 'Bleach',
                'synopsis' => 'Ichigo Kurosaki é um jovem com o poder de enxergar espíritos, ele acaba se tornando um substituto shinigami e se une a outros shinigamis para proteger o mundo dos espíritos e dos Hollows, seres malignos que devoram outros espíritos.',
                'release_date' => '2001-08-20',
                'chapters' => 74,
                'volumes' => 74,
                'producer' => 'Produtora',
                'author' => 'Tite Kubo',
                'image' => 'https://cdn.myanimelist.net/images/anime/3/40451.jpg',
                'type' => 1,
                'status' => 1,
            ],
            [
                'name' => 'Attack on Titan',
                'synopsis' => 'Em um mundo onde as pessoas vivem protegidas por muralhas enormes para se defender de Titãs, monstros que devoram seres humanos sem motivo aparente, Eren Yeager se une aos soldados para combater os Titãs e descobrir a verdade por trás de sua existência.',
                'release_date' => '2009-09-09',
                'chapters' => 113,
                'volumes' => 34,
                'producer' => 'Produtora',
                'author' => 'Hajime Isayama',
                'image' => 'https://cdn.myanimelist.net/images/anime/10/47347.jpg',
                'type' => 1,
                'status' => 1,
            ],
            [
                'name' => 'Sword Art Online',
                'synopsis' => 'Kirito é um jogador de um jogo de realidade virtual, Sword Art Online, que se torna preso nele junto com outros jogadores. Eles precisam completar todos os 100 andares do jogo para conseguir escapar e descobrir a verdade por trás desse mundo virtual.',
                'release_date' => '2012-07-07',
                'chapters' => 47,
                'volumes' => 4,
                'producer' => 'Produtora',
                'author' => 'Reki Kawahara',
                'image' => 'https://cdn.myanimelist.net/images/anime/11/39717.jpg',
                'type' => 0,
                'status' => 1,
            ],
            [
                'name' => 'Black Butler',
                'synopsis' => 'Ciel Phantomhive é o jovem chefe da família Phantomhive e um mestre caçador de recompensas. Ele contrata um mordomo demoníaco chamado Sebastian Michaelis para ajudá-lo a resolver seus problemas e vingar a morte de sua família.',
                'release_date' => '2008-10-03',
                'chapters' => 170,
                'volumes' => 27,
                'producer' => 'Produtora',
                'author' => 'Yana Toboso',
                'image' => 'https://cdn.myanimelist.net/images/anime/5/27013.jpg',
                'type' => 1,
                'status' => 1,
            ],
            [
                'name' => 'Hunter x Hunter',
                'synopsis' => 'Gon Freecss descobre que o pai que pensava estar morto na verdade é um caçador, uma profissão que consiste em realizar missões perigosas em busca de tesouros e criaturas raras. Ele decide se tornar um caçador para encontrar seu pai.',
                'release_date' => '1998-03-03',
                'chapters' => 360,
                'volumes' => 40,
                'producer' => 'Produtora',
                'author' => 'Yoshihiro Togashi',
                'image' => 'https://cdn.myanimelist.net/images/anime/1337/99013.jpg',
                'type' => 1,
                'status' => 1,
            ],
            [
                'name' => 'Fate/Zero',
                'synopsis' => 'Sete cavaleiros selecionados, cada um com seu próprio Servant, lutam em uma guerra para conquistar o Holy Grail, um objeto capaz de conceder qualquer desejo. Eles lutam não apenas por seus próprios desejos, mas também pelo destino de seus mestres.',
                'release_date' => '2011-10-01',
                'chapters' => 13,
                'volumes' => 4,
                'producer' => 'Produtora',
                'author' => 'Gen Urobuchi',
                'image' => 'https://cdn.myanimelist.net/images/anime/1887/117644.jpg',
                'type' => 0,
                'status' => 1,
            ],
            [
                'name' => 'Soul Eater',
                'synopsis' => 'Em um mundo onde almas humanas podem se transformar em armas poderosas, os estudantes do Death Weapon Meister Academy precisam capturar almas malignas para se tornarem armas completas. Eles precisam trabalhar juntos com seus mestres para completar sua missão.',
                'release_date' => '2008-04-07',
                'chapters' => 113,
                'volumes' => 25,
                'producer' => 'Produtora',
                'author' => 'Atsushi Ohkubo',
                'image' => 'https://cdn.myanimelist.net/images/anime/9/7804.jpg',
                'type' => 1,
                'status' => 1,
            ],
            [
                'name' => 'Code Geass',
                'synopsis' => 'Lelouch vi Britannia é um jovem que ganha o poder de dar ordens irrevogáveis com a ajuda de uma misteriosa garota chamada C.C. Ele decide usar essa habilidade para derrubar o Império de Britannia e vingar a morte de sua mãe.',
                'release_date' => '2006-10-05',
                'chapters' => 50,
                'volumes' => 5,
                'producer' => 'Sunrise',
                'author' => 'Gorō Taniguchi & Ichirō Ōkouchi',
                'image' => 'https://cdn.myanimelist.net/images/anime/5/50331.jpg',
                'type' => 0,
                'status' => 1,
            ],
            [
                'name' => 'Black Clover',
                'synopsis' => 'Asta é um jovem sem nenhum poder mágico em um mundo onde a maioria das pessoas nasce com habilidades mágicas. Ele sonha em se tornar o próximo rei dos magos, mas para isso precisa superar muitos obstáculos e derrotar inimigos poderosos.',
                'release_date' => '2017-10-03',
                'chapters' => 280,
                'volumes' => 25,
                'producer' => 'Produtora',
                'author' => 'Yūki Tabata',
                'image' => 'https://cdn.myanimelist.net/images/manga/2/166254.jpg',
                'type' => 1,
                'status' => 1,
            ],
            [
                'name' => 'Dragon Ball',
                'synopsis' => 'Goku é um jovem de outro mundo que se une a seus amigos para coletar as sete esferas do dragão e desejar qualquer coisa que quiserem. Eles enfrentam muitos adversários poderosos e desafiantes em sua jornada.',
                'release_date' => '1984-12-08',
                'chapters' => 519,
                'volumes' => 42,
                'producer' => 'Produtora',
                'author' => 'Akira Toriyama',
                'image' => 'https://cdn.myanimelist.net/images/anime/1887/92364.jpg',
                'type' => 1,
                'status' => 1,
            ],
        ];

        foreach ($works as $work){
            Work::factory()->create([
                'name' => $work['name'],
                'synopsis' => $work['synopsis'],
                'release_date' => $work['release_date'],
                'chapters' => $work['chapters'],
                'volumes' => $work['volumes'],
                'producer' => $work['producer'],
                'author' => $work['author'],
                'image' => $work['image'],
                'type' => $work['type'],
                'status' => $work['status'],
            ]);
        }
    }
}
