<?php
require __DIR__.'/../config/bootstrap.php';
use Repositories\VideoRepository;

// Chave da API do YouTube
$apiKey = $_ENV['KEY_YOUTUBE_API'];

// Termos de busca
$queries = ["jiu jitsu", "jiu jitsu tecnicas", "boxe", "ufc", "judo"];

// Data de início
$dataAtual = new DateTime();

// Subtrair 7 dias para obter a data de uma semana atrás
$dataAtual->sub(new DateInterval('P14D'));

// Formatar a data para o formato ISO 8601
$publishedAfter = $dataAtual->format('Y-m-d\TH:i:s\Z');

// Número máximo de resultados por termo
$maxResults = 20;

// Função para fazer requisições à API do YouTube
function fetchVideos($query, $apiKey, $publishedAfter, $maxResults) {
    $url = "https://www.googleapis.com/youtube/v3/search?part=snippet&q=" . urlencode($query) . "&type=video&publishedAfter=" . $publishedAfter . "&maxResults=" . $maxResults . "&relevanceLanguage=pt&key=" . $apiKey;
    
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $url
    ]);
    $response = curl_exec($curl);
    curl_close($curl);
    return json_decode($response, true);
}

// Armazena todos os vídeos buscados
$allVideos = [];

// Busca vídeos para cada termo de busca
foreach ($queries as $query) {
    $data = fetchVideos($query, $apiKey, $publishedAfter, $maxResults);
    if (!empty($data['items'])) {
        $allVideos = array_merge($allVideos, $data['items']);
    }
}

// recebe os videos
$videos = [];

// Verifica se houve resultados
if (!empty($allVideos)) {

    // remover todos os videos do banco de dados
    VideoRepository::resetVideos();

    foreach ($allVideos as $item) {
        // Obtém detalhes do vídeo
        $videoId = $item['id']['videoId'];
        $title = $item['snippet']['title'];

        $videos[] = [
            'iframe' => 'https://www.youtube.com/embed/'.$videoId,
            'titulo' => $title
        ];
    }

    // salvar vídeos no banco de dados
    foreach ($videos as $video) {
        $res = VideoRepository::createVideo($video);
        if(!$res){
            echo 'Erro ao criar Vídeo: ';
            exit;
        }
    }

    // RESPOSTA
    echo 'Vídeos atualizados!';

} else {
    echo "Nenhum vídeo encontrado.";
}
?>