--CRIANDO O USUARIO
CREATE USER 'sportnews'@'localhost' IDENTIFIED BY 'sportnews';

--GARANTINDO PRIVILÉGIOS AO USUARIO RECEM CRIADO
GRANT ALL PRIVILEGES ON * . * TO 'sportnews'@'localhost';

--CRIANDO A BASE DE DADOS sportnews
CREATE DATABASE sportnews;

--USANDO A BASE DE DADOS sportnews
USE sportnews;

--CRIANDO A TABELA redator
CREATE TABLE IF NOT EXISTS `redator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--INSERINDO DADOS NA TABELA redator
INSERT INTO `redator` (`id`, `username`, `password`) VALUES
(1, 'Swan', 'e8d95a51f3af4a3b134bf6bb680a213a'),
(2, 'Douglas', 'e8d95a51f3af4a3b134bf6bb680a213a'),
(3, 'Heitor', 'e8d95a51f3af4a3b134bf6bb680a213a'),
(4, 'Manoel', 'e8d95a51f3af4a3b134bf6bb680a213a'),
(5, 'Yan', 'e8d95a51f3af4a3b134bf6bb680a213a'),
(6, 'Francieric', 'e8d95a51f3af4a3b134bf6bb680a213a');

--CRIANDO A TABELA articles
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `editor` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `main_image` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--INSERINDO DADOS NA TABELA ARTICLES
INSERT INTO `articles` (`id`, `category`, `editor`, `time`, `main_image`, `title`, `subtitle`, `content`) VALUES
(1, 'futebol', 'Pedro', '2020-12-28 16:24:34', 'https://s2.glbimg.com/dC9fGl9ZvOQk4RFahMBXE9dL2tI=/0x0:1280x960/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_bc8228b6673f488aa253bbcb03c80ec5/internal_photos/bs/2020/c/A/fsNFMcRDePCgHVMWANXg/equ2b1cwmaibbmf.jpg', 'Camisas do Sport em homenagem ao vencedor do Fifa Fan Award esgotam em uma semana', 'Renda dos uniformes, utilizado pelo elenco contra o Grêmio e vendido a R$ 300 cada, será revertida para Marivaldo, torcedor que caminha 60 quilômetros para assistir aos jogos do clube', '<p>A venda das camisas do Sport em homenagem a Marivaldo, vencedor do prêmio Fifa Fan Award 2020, precisaram de uma semana para esgotar. Nesta segunda-feira, o clube anunciou o fim da comercialização - que havia começado dia 21 de dezembro, em uma ação promovida pelo Rubro-negro. De acordo com a assessoria de imprensa, a renda arrecadada será doada para o torcedor, que sofre com problemas financeiros. </p><p>As camisas - que estavam no valor de R$ 300 - foram utilizadas pelo elenco no empate com o Grêmio, no dia 19 de dezembro. A quantidade de peças vendidas ainda não foi detalhada. Na ocasião da ação, Marivaldo havia recém-conquistado o prêmio da Fifa e - também por esse motivo - ganhou o plano de sócio Ouro (mais alto que existe na Ilha do Retiro). </p>'),
(2, 'futebol', 'Pedro', '2020-12-28 16:30:42', 'https://s2.glbimg.com/QXzKV6K5uv2ai482Xrl87Tud1Xk=/0x0:1736x977/1008x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_bc8228b6673f488aa253bbcb03c80ec5/internal_photos/bs/2020/F/3/HVIHDqQGW6DKNmB6eyoQ/134432155-2237110286437945-8366339451310114159-o.jpg', 'Bolsonaro publica foto com a camisa do Santos e vai à Vila Belmiro em jogo beneficente', 'Presidente deve passar Réveillon no litoral e participará de evento promovido por Narciso', '<p>O presidente Jair Bolsonaro (sem partido) postou uma foto com a camisa do Santos nesta segunda-feira. Ele irá à Vila Belmiro nesta tarde no jogo beneficente \"Natal Sem Fome\", promovido pelo ex-jogador Narciso. </p><p>O evento arrecada alimentos e brinquedos que serão doados para entidades assistenciais da Baixada Santista. O jogo contará com a presença de ex-jogadores e outras personalidades. </p><p><span class=\"image right\"><img src=\"https://s2.glbimg.com/QXzKV6K5uv2ai482Xrl87Tud1Xk=/0x0:1736x977/1008x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_bc8228b6673f488aa253bbcb03c80ec5/internal_photos/bs/2020/F/3/HVIHDqQGW6DKNmB6eyoQ/134432155-2237110286437945-8366339451310114159-o.jpg\" alt=\"Bolsonaro com a camisa do Santos — Foto: Reprodução/Facebook \"></span>Bolsonaro já esteve na Vila Belmiro em novembro do ano passado, num clássico entre Santos e São Paulo, que terminou empatado em 1 a 1. Na ocasião, a torcida do Peixe se dividiu entre vaias e aplausos. </p><p>O presidente deve passar o Réveillon em Guarujá, cidade vizinha a Santos. A programação inicial prevê o retorno dele a Brasília no dia 4 de janeiro. </p>'),
(3, 'futebol', 'Pedro', '2020-12-28 16:34:28', 'https://s2.glbimg.com/hMkpS5OpTSQ0-OCgh5vIbmvLCtk=/0x0:1200x600/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_bc8228b6673f488aa253bbcb03c80ec5/internal_photos/bs/2020/c/e/vxhAm4RWakFSr7fKkCcQ/ceara-1.jpg', 'Ceará vende sete mil camisas \"Sertão Alvinegro\" e fatura mais de R$ 1,5 milhão em seis dias', 'Clube lançou camisa na última terça-feira (22) ', '<p>Depois de quase uma semana do lançamento do último uniforme, o \"Sertão Alvinegro\", o Ceará já vendeu sete mil unidades. No mercado desde a terça-feira (22), o faturamento médio com o novo produto superou R$ 1,5 milhão. </p><p><span class=\"image left\"><img src=\"https://s2.glbimg.com/hMkpS5OpTSQ0-OCgh5vIbmvLCtk=/0x0:1200x600/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_bc8228b6673f488aa253bbcb03c80ec5/internal_photos/bs/2020/c/e/vxhAm4RWakFSr7fKkCcQ/ceara-1.jpg\" alt=\"Camisa Ceará, \"Sertão Alvinegro\" — Foto: Divulgação\"></span>A camisa estava no calendário estratégico planejado para 2020 e, apesar da pandemia de Covid-19, seguiu como aposta de vendas. A “Sertão Alvinegro” é uma edição especial em homenagem à conquista invicta recente da segunda taça da Copa do Nordeste. Foi a primeira vez que o clube lançou uma camisa exclusiva para uma competição. </p><p>Com demanda em alta, a confecção foi acelerada, ampliando a distribuição de novas peças em estoques de lojas físicas e também e-commerce. Vale ressaltar que o Ceará controla todo o processo da marca própria, em movimento de internacionalização dos mecanismos no fim de 2019. </p>'),
(4, 'futebol', 'Heitor', '2020-12-28 16:40:07', 'https://canalportugal.pt/wp-content/uploads/2019/01/foto2732-1.jpg', 'Cristiano Ronaldo dá bronca no filho \"robozinho\" em entrevista: \"Bebe refrigerante e come batata frita\" ', 'Astro da Juventus comenta possível futuro de Cristiano Jr. no futebol e revela incômodo por hábitos do herdeiro: \"Tem potencial, é rápido e dribla bem, mas isso não é suficiente\"', '<p>Vencedor do prêmio de melhor jogador do século, dado pelo Globe Soccer Awards, Cristiano Ronaldo participou de uma entrevista na cerimônia realizada em Dubai, no último domingo, e aproveitou a oportunidade para dar uma \"bronca\" no filho Cristiano Jr. Questionado sobre o possível futuro do herdeiro mais velho como jogador de futebol, o astro da Juventus não escondeu seu incômodo pelos hábitos do \"robozinho\", que estava na plateia acompanhando o pai. </p><blockquote>- Vamos ver se vai ser grande jogador. Ainda não é. Ele às vezes bebe refrigerante e come batatas fritas, e sabe que eu fico irritado. Digo a ele às vezes que depois da esteira deve mergulhar em água fria, para recuperar, e ele diz \"Pai, mas está tão frio...\". É normal, tem 10 anos - disse Cristiano Ronaldo. </blockquote><p><span class=\"image right\"><img src=\"https://s2.glbimg.com/uLJkzw4a9W0GNglRibU15FVwPos=/0x0:1080x1350/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_bc8228b6673f488aa253bbcb03c80ec5/internal_photos/bs/2020/3/f/zdAhWyQFaBzX35URSs7w/133381314-866287760867914-5159529826752512613-n.jpg\" alt=\"Cristiano Ronaldo ao lado do filho e da esposa Georgina, na cerimônia do Globe Soccer — Foto: Reprodução/Instagram \"></span>Cristiano Jr. é o primeiro filho de Cristiano Ronaldo, de mãe nunca revelada pelo craque português. Hoje com 10 anos, ele se tornou uma espécie de xodó dos seguidores do atacante por estar sempre junto ao pai e também por sua habilidade com a bola, exibida pelo camisa 7 nas redes sociais desde os primeiros passos do herdeiro. </p><p>- Ele tem potencial. É rápido, dribla bem. Mas isso não é nada, não basta. É preciso muito trabalho e dedicação, estou sempre dizendo a ele. Não vou pressionar para ser jogador de futebol, mas se me perguntarem se quero, claro que quero. No entanto, quero que ele seja o melhor, seja jogador ou médico - completou CR7. </p><p>O primogênito de Cristiano Ronaldo hoje integra as categorias de base da Juventus, onde impressionou ao fazer 12 gols em dois jogos de placar elástico a favor da Velha Senhora. Na mesma época, o pequeno ganhou o apelido de \"robozinho\" por parte dos fãs brasileiros, em uma live do craque, que leu uma mensagem na qual era chamada de \"robozão\". </p>'),
(5, 'futebol', 'Douglas', '2020-12-28 16:48:38', 'https://s2.glbimg.com/KdD13LAKBhTJo5sGryaS9v-qeNc=/0x0:1224x816/924x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_bc8228b6673f488aa253bbcb03c80ec5/internal_photos/bs/2020/u/1/JCp8qZRvWRfXyv2KCeNg/rafaelmoura.jpg', 'Rafael Moura anuncia renovação de contrato com o Goiás', 'Atacante prorroga vínculo com o Esmeraldino até o fim do Brasileirão', '<p>Goiás e Rafael Moura chegaram a um acordo e renovaram contrato até o fim do Campeonato Brasileiro. O anúncio foi feito pelo próprio atacante em seu perfil oficial no Instagram. </p><p>Artilheiro esmeraldino na temporada com oito gols, Rafael tinha contrato com o Goiás até o fim de dezembro. Agora o vínculo do centroavante de 37 anos foi estendido até o término de fevereiro - o último jogo na Série A está marcado para 24 de fevereiro. </p><p>Até o momento, o He-Man e o atacante Kaio, que se recupera de uma cirurgia na coxa, foram os únicos a renovar. Os demais atletas que ficam ou ficaram sem vínculo em dezembro deixam o clube. </p>'),
(7, 'esports', 'Pedro Manoel', '05/01/2021 11:51', 'https://s2.glbimg.com/XrHm0U-v6td4ePxFlGkZwCzcIZo=/0x0:1024x682/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_bc8228b6673f488aa253bbcb03c80ec5/internal_photos/bs/2020/L/Z/FdBJBgTxmmw5BA9LK0CQ/whatsapp-image-2020-12-30-at-13.37.44.jpeg', 'Gestora do Cruzeiro nos eSports anuncia gaming office em espaço de coworking em São Paulo', 'Jogadores de Free Fire, League of Legends e FIFA 21 da Raposa, da CBF e da NSE terão estrutura para treinos e competição em prédio no Morumbi', '<p><span class=\"image left\"><img src=\"https://s2.glbimg.com/XrHm0U-v6td4ePxFlGkZwCzcIZo=/0x0:1024x682/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_bc8228b6673f488aa253bbcb03c80ec5/internal_photos/bs/2020/L/Z/FdBJBgTxmmw5BA9LK0CQ/whatsapp-image-2020-12-30-at-13.37.44.jpeg\" alt=\"Cruzeiro terá gaming office em espaço de coworking — Foto: Divulgação \"></span>O Cruzeiro tem uma casa nova nos eSports. E não é em Belo Horizonte, mas sim em São Paulo. Gestora do clube mineiro - e também da Confederação Brasileira de Futebol (CBF) e da Netshoes - no esporte eletrônico, a E-Flix eSports anunciou, nesta quarta-feira, a montagem de um gaming office dentro de um espaço de coworking num prédio no Morumbi, bairro da Zona Sul da capital paulista. Lá haverá uma estrutura para receber os times de Free Fire e de League of Legends da Raposa e os jogadores de FIFA 21 do clube, da eSeleção e da NSE, como Wendell Lira, além de streamers, staff e corpo diretivo ligados à organização. </p><p>- O foco está em aprimorar o desempenho técnico e cognitivo dos atletas que estarão conosco nesta jornada. Acreditamos que, nesse ambiente, todos poderão se beneficiar de um viés corporativo e profissional que, recentemente, vem transformando os eSports em um grande negócio. Diferentemente de uma gaming house, ambiente com o qual muitos deles estão acostumados, vemos no gaming office uma oportunidade relevante para o aprimoramento de todos - declarou o CEO da E-Flix, Marcelo Fadul. </p><p>Especialmente pelo Free Fire e pelo League of Legends, o Cruzeiro tem compromissos que justificam o gaming office em São Paulo. O clube participa da Série A da Liga Brasileira de Free Fire (LBFF) e vai estrear no Campeonato Brasileiro de League of Legends (CBLoL) em 2021 pelo sistema de franquias. Ambas as competições têm como sede, respectivamente, os estúdios da Garena e da Riot Games localizados na Vila Leopoldina, na Zona Oeste da capital paulista - embora os torneios tenham sido realizados online durante a pandemia de Covid-19, doença provocada pelo novo coronavírus. </p>'),
(8, 'vôlei', 'Pedro Manoel', '05/01/2021 11:55', 'https://s2.glbimg.com/wDrYEebmaEbPpGUxPk9uJKXrClg=/0x0:1375x923/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_bc8228b6673f488aa253bbcb03c80ec5/internal_photos/bs/2020/N/C/rKvM4BR4auKreuUpA9Pg/127639880-736848833595964-2290070937289089878-o.jpg', 'Vôlei Ribeirão tem recesso curto e intensifica treinos visando 2º turno da Superliga', 'Equipe do técnico Marcos Pacheco trabalha desde o dia 2 e se prepara para enfrentar o Campinas, dia 9', '<p><span class=\"image left\"><img src=\"https://s2.glbimg.com/wDrYEebmaEbPpGUxPk9uJKXrClg=/0x0:1375x923/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_bc8228b6673f488aa253bbcb03c80ec5/internal_photos/bs/2020/N/C/rKvM4BR4auKreuUpA9Pg/127639880-736848833595964-2290070937289089878-o.jpg\" alt=\" Vôlei Ribeirão em ação na Superliga — Foto: Luan Porto \"></span>O ano começou com muito trabalho para o elenco do Vôlei Ribeirão, que retomou os treinos desde o último dia 2, sem folga, para aprimorar detalhes e melhorar a classificação na tabela da Superliga. </p><p>O Cavalo ocupa a lanterna da competição, com um ponto somado e volta à quadra no próximo sábado, às 17h, contra o Campinas, na Cava do Bosque. O time campineiro é o terceiro colocado, com 29 pontos. </p><p>O técnico Marcos Pacheco disse que a equipe está intensificando as atividades na parte física, para compensar o período de folga por causa das festas de fim de ano. Contudo, quer enfatizar correções técnicas e táticas. </p><p>- Neste momento estamos fazendo uma retomada, principalmente na questão física por causa da parada das festas. Mas, claro, também trabalharemos as questões técnicas, evoluir, melhorar, conhecemos o adversário, o tamanho que é a Superliga, o que precisamos fazer para evoluir, tentar chegar – disse o técnico. </p><p>Pacheco contou que a equipe, com média de 22 anos, apresentou uma evolução nas últimas partidas e espera que tenha mais efetividade no segundo turno da competição. </p><p>- Identificar os problemas é uma coisa, resolver é outra. A busca é essa, evoluir para o segundo turno – frisou o comandante. </p>'),
(9, 'vôlei', 'Pedro Manoel', '05/01/2021 13:33', 'https://s2.glbimg.com/zRHEpN5qZLbLCi01qHXPqAam5kg=/540x304/top/smart/https://i.s3.glbimg.com/v1/AUTH_bc8228b6673f488aa253bbcb03c80ec5/internal_photos/bs/2020/i/C/rfxpuOSUCFx3QlPQORhw/134351435-816284232550961-4754066444126308133-n.jpg', 'Times masculinos de vôlei de Uberlândia realizam seletivas para atletas nascidos entre 2001 e 2010', 'Academia do Vôlei e Uberlândia Vôlei farão primeira fase da avaliação de forma on-line. Veja como se inscrever', '<p><span class=\"image left\"><img src=\"https://s2.glbimg.com/WzRk24KPQu2RdAoysgiXU-8bIaM=/0x0:1152x532/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_bc8228b6673f488aa253bbcb03c80ec5/internal_photos/bs/2020/i/C/rfxpuOSUCFx3QlPQORhw/134351435-816284232550961-4754066444126308133-n.jpg\" alt=\" Uberlândia Vôlei confirmou participação na Superliga C de 2021 — Foto: Uberlândia Vôlei/Divulgação \"></span>A Academia do Vôlei e o Uberlândia Vôlei, dois times masculinos de Uberlândia, realizam seletivas para atletas nascidos entre 2001 e 2010 visando a temporada de 2021. A primeira fase da seleção será on-line, com envio de vídeos, e a segunda será presencial. Veja abaixo como participar. </p><h2>Uberlândia Vôlei</h2><p>O Uberlândia Vôlei, projeto de base que disputou a Superliga C em 2020 e confirmou a participação na edição de 2021, abriu o processo seletivo virtual para atletas nascidos entre 2001 e 2010 no dia 22 de dezembro e receberá vídeos até o dia 8 de janeiro. Os interessados devem enviar os vídeos de no mínimo 30 segundos e de no máximo 90 segundos para o telefone: (34) 991217-6447, aos cuidados de Fernando. </p><p>Em 2021, os atletas aprovados serão convocados para testes presenciais em Uberlândia nos dias 23 e 24 de janeiro. </p><h2>Academia do Vôlei</h2><p>A Academia do Vôlei, projeto social de base que deu origem ao Vôlei Uberlândia – atual quinto colocado da Superliga Masculina –, abrirá a seletiva a partir do dia 2 de janeiro. Os interessados devem enviar os vídeos de no mínimo 30 segundos e de no máximo 90 segundos para os telefones: (38) 99179-1115 – Norberto; (34) 99179-0143 – Boaz; e (34) 98430-9636 – Anderson. </p><p>O material poderá ser enviado até o dia 8 de janeiro. Em 2021, os aprovados serão convocados para testes presenciais na Academia do Vôlei, em Uberlândia, de 20 a 23 de janeiro. </p>'),
(10, 'nba', 'Pedro Manoel', '05/01/2021 13:44', 'https://s2.glbimg.com/y7un6N5jZEyY1aRxAbeOjQO0qnk=/0x190:807x977/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_bc8228b6673f488aa253bbcb03c80ec5/internal_photos/bs/2021/D/X/g8PK8LTBeWZoBuG5f3Lw/gettyimages-1294372099.jpg', 'Quebra tudo! Curry marca 62 pontos, bate recorde e conduz Warriors à vitória sobre os Blazers', 'Com atuação espetacular, astro alcança sua melhor marca na carreira e desequilibra no triunfo do Golden State por 137 a 122 ', '<p><span class=\"image left\"><img src=\"https://s2.glbimg.com/y7un6N5jZEyY1aRxAbeOjQO0qnk=/0x190:807x977/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_bc8228b6673f488aa253bbcb03c80ec5/internal_photos/bs/2021/D/X/g8PK8LTBeWZoBuG5f3Lw/gettyimages-1294372099.jpg\" alt=\" O Super Curry \"voa\" após chegar a impressionante marca em San Francisco — Foto: Getty Image \"></span>A noite foi de Stephen Curry. Registrando nada menos que 62 pontos, o armador sobrou em quadra e regeu a vitória do Golden State Warriors sobre o Portland Trail Blazers por 137 a 122, no embate que encerrou a rodada deste domingo na NBA. A sensacional marca representou o recorde pessoal de Curry em sua vitoriosa trajetória na mais importante liga de basquete do planeta. De quebra, ultrapassou o \"splash brother\" Klay Thompson (que chegou a 60) e igualou Rick Barry (1974) na franquia. </p><p>Além de anotar quase metade da pontuação de sua equipe (com 8 tiros certos de 3 em 16 tentados), o astro produziu ainda 4 assistências e apanhou 5 rebotes. Andrew Wiggins marcou 21 pontos e pegou 7 rebotes, tornando-se um eficiente coadjuvante no show da fera. Com um duplo-duplo (12 pontos e 11 rebotes), James Wiseman também esteve bem pelos locais, que agora somam 3 vitórias em 6 jogos e se igualam ao rival desta noite. </p><p>Nem mesmo os 60 pontos combinados por Damian Lillard (32) e CJ McCollum (28) foram capazes de superar Steph Curry. Contando mais 6 bolas certas (em 15), Lillard desbancou Klay Thompson e se tornou o 18º em tiros de 3 na NBA. McCollum ainda conseguiu 9 rebotes, ficando a somente um de chegar a dois dígitos em dois fundamentos. Quem também mostrou serviço pela equipe do Oregon e cravou seu duplo-duplo foi Enes Kanter, dono de 24 pontos e 12 rebotes. </p><p>Curry já havia chegado a 50 ou mais pontos na carreira pela sétima vez e, faltando 2m24 para o fim, bateu seu recorde anterior (54 pontos) ao converter dois lances livres e fazer o placar pular para 123 a 113. A espetacular contagem de 62 veio a 42s7 do estouro, quando o craque, todo desequilibrado, desferiu um chute quase da linha lateral. </p><p>E, desta forma, o dono da noite encerrou seu show em San Francisco. </p>'),
(11, 'nba', 'Pedro Manoel', '05/01/2021 13:50', 'https://s2.glbimg.com/WX2NWjZfhVSnmP_KUatXjirJRfU=/0x0:1024x683/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_bc8228b6673f488aa253bbcb03c80ec5/internal_photos/bs/2020/C/t/kCjBL0RtAc8aL6izYz9A/gettyimages-1292326189.jpg', 'Protocolo de segurança da NBA contra a Covid-19 veta Kevin Durant, e astro fica fora por 7 dias', 'Embora ainda não tenha apresentado testagem positiva, craque, que foi infectado em maio de 2020, é afastado por potencialmente ter sido exposto ao vírus', '<p><span class=\"image left\"><img src=\"https://s2.glbimg.com/WX2NWjZfhVSnmP_KUatXjirJRfU=/0x0:1024x683/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_bc8228b6673f488aa253bbcb03c80ec5/internal_photos/bs/2020/C/t/kCjBL0RtAc8aL6izYz9A/gettyimages-1292326189.jpg\" alt=\" Kevin Durant em jogo da pré-temporada da NBA — Foto: Maddie Meyer/Getty Images \"></span>O astro Kevin Durant, do Brooklyn Nets, foi preventivamente vetado de jogos de sua equipe pelo período de 7 dias, em função do protocolo de segurança da NBA contra a Covid-19. Embora não haja registro de que o jogador tenha testado positivo para o vírus, ele não poderá atuar nos jogos contra Jazz, 76ers, Grizzlies e Thunder, em função da política de rastreamento de contato criado pela NBA.</p><p>O artifício dá à liga a liberdade de afastar e estipular cronogramas para o retorno de jogadores que estiveram em contato com uma pessoa infectada ou que foram expostos ao coronavírus. Kevin Durant teve coronavírus em maio de 2020 e apresentou resultados negativos em suas últimas testagens. A liga, no entanto, não distingue jogadores que já tiveram dos que não tiveram a Covid-19. </p><p>De acordo com os protocolos de saúde e segurança, o descumprimento ou recusa em cumprir as diretrizes pode sujeitar o jogador a ações disciplinares por parte da NBA ou de sua equipe, incluindo advertência, multa e/ou suspensão. O jogador pode também ser obrigado a participar de atividades reeducacionais. Os infratores reincidentes podem estar sujeitos a punições disciplinares. </p><p><span class=\"image right\"><img src=\"https://s2.glbimg.com/hsqmUmPZvGJYWBT9bmpTEaBzNKQ=/0x0:4198x2799/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_bc8228b6673f488aa253bbcb03c80ec5/internal_photos/bs/2021/N/W/QKoPi3RGyn0pKqGeomhQ/gettyimages-1294070630.jpg\" alt=\" Kevin Durant, Brooklyn Nets x Atlanta Hawks, NBA — Foto: Sarah Stier/Getty Images \"></span>Ainda segundo os protocolos, qualquer membro da equipe que apresentar um teste positivo é forçado a isolar-se até que seja liberado pelas regras estabelecidas pela NBA e NBPA (Associação dos Jogadores) de acordo com as orientações do CDC (Centro de Controle e Prevenção de Doenças). </p><p>Em caso de testagem positiva, após o cumprimento do período mínimo de 10 dias, o jogador liberado deverá passar dois dias treinando sozinho, sem interagir com ninguém, adotando o usa de máscara e com acompanhamento médico. Ou seja, qualquer jogador que teste positivo, desfalcará sua equipe por no mínimo 12 dias. </p><p>Como esperado, Durant tem sido, ao lado de Kyrie Irving, a espinha dorsal do ataque dos Nets, com médias de 28.2 pontos, 7.0 rebotes, 4.8 assistências e 1.2 roubadas por partida na temporada. Joe Harris, Caris LeVert, Landry Shamet, Jeff Green e Taurean Prince terão mais tempo de quadra na ausência de Durant. </p>');