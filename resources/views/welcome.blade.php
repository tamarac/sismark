<?php 
use Illuminate\Support\Facades\Storage;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tamara Cavachioli</title>
    <link rel="stylesheet" type="text/css" href="/css/style.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <link rel="shortcut icon" href="/img/fav.png" />
    <link rel="icon" href="/img/fav.png" />
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>
    <div class="main">
        <div class="header">
            <div class="container">
                <div class="col-d-6 primeiro">
                    <h2 class="no-margin">Tamara Cavachioli</h2>
                    <div class="social"><a href="https://www.facebook.com/tcavachioli"><i class="ico-facebook" width="24"></i></a><a href="https://br.linkedin.com/in/tamara-cavachioli-56354043"><i class="ico-linkedin" width="24"></i></a></div>
                </div>
                <div class="col-d-6 primeiro">
                    <button type="button" class="menu-toggle ico-menu"></button>
                    <ul class="menu aux" id="toggle">
                        <li class="item"><a href="index.php">HOME</a></li>
                        <li class="item"><a href="#sobre">SOBRE MIM</a></li>
                        <li class="item"><a href="#portfolio">PORTIFÓLIO</a></li>
                        <li class="item"><a href="#contato">CONTATO</a></li>
                    </ul>   
                </div>
            </div>
            <div class="clr"></div>
        </div>
    </div>
    <div class="main">
        <div class="container">
            <div class="col-d-3 primeiro">
                <img class="img-person" src="/img/tamara.jpg">
            </div>

            <div class="col-d-9 skill-info primeiro">
                <a name="sobre" style="display:none"></a>
                <h1 class="text-center">Formação e Cursos</h1>
                <ul class="formacao">
                  @foreach ($formacao as $item)
                      <li class="linhaf"> 
                     <p> <span id="item-formacao">&raquo;  {{$item->curso}}</span>
                      @if ($item->cursando === 1)
                        (em andamento)
                      @else
                         ({{$item->ano_entrada}} - {{$item->ano_saida}}) 
                      @endif
                      </p>
                      <h4>{{$item->nome_instituicao}}</h4>
                  </li>
                 @endforeach
                </ul>
            </div>
            <div class="col-d-12 portifolio primeiro">
                <a name="portfolio"></a>
                <h1 class="text-center">Meu Portfólio</h1>
                <ul class="item">
                @foreach ($portfolio as $item)
                   @php $pasta = 'public/imagens/portfolio/'. $item->id .'/';
                    $files = Storage::files($pasta);
                   @endphp 
                   <li>
                        @foreach ($files as $file)
                            <figure><a href="{{$item->linksite}}" target="_blank"><img class="slideanim" src="{{asset(str_replace('public','storage', $file)) }}" alt="img" width="250"/></a></figure>
                        @endforeach  
                        <h4>{{$item->name}}</h4>

                    </li>
                @endforeach
                </ul>
            </div>
            <div class="col-d-12 contato primeiro">
                <a name="contato"></a>
                <div class="col-d-6">
                    <h1 class="text-center">Envie uma mensagem</h1>
                    <Form class="contato" action="envia.php" method="post">
                        <div class="col-d-12">
                            <label for="Nome"> Nome</label>
                            <input type="text" class="input" id="Nome" name="nome"/>
                        </div>
                        <div class="col-d-12">
                            <label for="Email"> E-mail</label>
                            <input type="text" class="input" id="Email" name="email"/>
                        </div>
                        <div class="col-d-12">
                            <label for="mensagem"> Informações</label>
                            <textarea name="mensagem" id="mensagem" cols="30" rows="3"></textarea>
                        </div>
                        <div class="col-d-12">
                            <div class="g-recaptcha" data-sitekey="6Lc3Vg4UAAAAAOQqj2VW20P1mEMiJV3q2CaGkNq4"></div>
                        </div>
                        <div class="col-d-12">
                            <button class="btn-enviar" name="enviar" type="submit">Enviar</button>
                        </div>
                        
                    </Form>
                </div>
                <div class="col-d-5">
                    <h1 class="text-center">Contato</h1>
                    <address>
                        <h3><i class="ico-localizacao"></i>Leme - SP<Br/>
                            <i class="ico-email"></i> contato@tamaracavachioli.com.br
                        </h3>
                    </address>
                </div>
            </div>
        </div>
        <div class="clr"></div>
    </div>
    <div class="main">
        <div class="footer">
            <div class="container">
                <p>Todos os direitos reservados.</p>
            </div>
        </div>  
    </div>
    <script type="text/javascript">
        $(".menu-toggle").click(function() {
          $("#toggle").toggleClass("aux");
          event.preventDefault();
        });
    </script>
</body>
</html>