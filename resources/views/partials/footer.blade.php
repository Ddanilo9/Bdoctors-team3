@php

    $listMenu = 
    [
        'Chi siamo',
        'Dicono di noi',
        'Condizioni d\'uso',
        'Privacy',
        'Cookie Policy',
        'Contatti',
        'Blog'
    
    ];             

$listSocials = 
    [
        'facebook.jpg',
        'instagram.jpg',
        'twitter.jpg',
        'youtube.png'
    
    ];
    
$devGits = 
    [
        'Alberto Dore' => 'https://github.com/Albiddd',
        'Alessio Petrullo' => 'https://github.com/manyblake',
        'Danilo Annunziata' => 'https://github.com/Ddanilo9',
        'Mirco Sansone' => 'https://github.com/Sansone11',
        'Michele Porcaro' => 'https://github.com/jamiromic'
        
    ]

@endphp

<footer>
    <div class="container">
        <ul class="linkfooter d-flex justify-content-center align-items-center list-unstyled m-0 flex-wrap">
            @foreach ($listMenu as $item)
            <li>
                <a href="#">{{ $item }}</a> 
            </li>   
            @endforeach
        </ul>
        <div class="certifications d-flex justify-content-between align-items-center">
            <div class="standard d-flex">
                <img src="{{asset('img/cod.gif')}}" alt="Hon Cod">
                <div class="hon_cod d-flex flex-column">
                    <span>Aderiamo allo standard HONcode per<br>l'affidabilità dell'informazione medica.</span>
                    <a href="#">Verifica qui</a>
                </div>
            </div>
            <a href="{{ route('register') }}" class="rec_form d-flex ">
                <img class="rec_doctor" src="{{asset('img/contatti_dottori.png')}}" alt="Doctors">
                <div class="d-flex flex-column justify-content-center">
                    <div>Sei un medico?</div>
                    <div class="font-weight-bold">Iscriviti ora!</div>
                </div> 
            </a>  
        </div>
        <div class="socials_credits d-flex flex-column justify-content-center align-items-center">
            <span>Created by:</span>
            <ul class="d-flex justify-content-center align-items-center list-unstyled m-0 flex-wrap">
                @foreach ($devGits as $key => $value)
                <li>
                    <a href="{{$value}}">{{$key}}</a>
                </li>
                    
                @endforeach
            </ul>
            <span class="update">Ultimo aggiornamento: 28/11/2022</span>
            <ul class="d-flex list-unstyled justify-content-center align-items-center flex-wrap m-0">
                @foreach ($listSocials as $item)
                <li class="icons d-flex justify-content-center align-items-center">
                    <img class="rounded" src="{{asset('img/').'/'.$item}}" alt="Photo's Social"> 
                </li>
                @endforeach
                
            </ul>
            
            
        </div>
    </div>

</footer>
    


