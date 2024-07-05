<?php
// Array com as 3 chaves de API
$apiKeys = [
    'f75fb637bbfa487db52e28c0e5d3f937',
    'dddf5195b2e74f0c90d5d80d2d62a660',
    '1090a6f0cb12408ba0be61216bdf5d73'
];
// Seleciona uma chave aleatoriamente
$apiKey = $apiKeys[array_rand($apiKeys)];
// Consulta de busca
$query = 'jiu-jitsu OR UFC OR boxe OR judô OR grapping OR bjj';
// Define a data inicial
$dateFrom = date('Y-m-d', strtotime('-7 days'));
// Define a data final como a data atual
$dateTo = date('Y-m-d');
// URL da News API com a consulta, o parâmetro de idioma e o período
$url = "https://newsapi.org/v2/everything?q=" . urlencode($query) . "&language=pt&from=" . $dateFrom . "&to=" . $dateTo . "&apiKey=" . $apiKey;

// Inicializa o cURL
$ch = curl_init();

// Configurações do cURL
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'User-Agent: bjj_app/1.0'
]);

// Executa a requisição e obtém a resposta
$response = curl_exec($ch);

// Fecha a conexão cURL
curl_close($ch);

// Decodifica a resposta JSON
$newsData = json_decode($response);

// Verifica se a requisição foi bem-sucedida
if ($newsData->status === 'ok') {
    foreach ($newsData->articles as $article) {
        // Exibe apenas artigos que mencionam explicitamente "jiu-jitsu", "UFC", "boxe" ou "judô" no título ou descrição
        if (
            (preg_match('/\bjiu-jitsu\b/i', $article->title) || preg_match('/\bjiu-jitsu\b/i', $article->description)) ||
            (preg_match('/\bUFC\b/i', $article->title) || preg_match('/\bUFC\b/i', $article->description)) ||
            (preg_match('/\bboxe\b/i', $article->title) || preg_match('/\bboxe\b/i', $article->description)) ||
            (preg_match('/\bjudô\b/i', $article->title) || preg_match('/\bjudô\b/i', $article->description))
        ) {
            if(!$article->title == ''){
                $noticias[] = [
                    'titulo' => $article->title,
                    'descricao' => $article->description,
                    'url' => $article->url,
                    'imagem' => $article->urlToImage
                ];
            }
        }
    }
} else {
    echo 'Erro ao buscar notícias: ' . htmlspecialchars($newsData->message);
}
?>
