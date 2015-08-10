# teed-php
TeedPHP Framework!

----

#### IMPORTANTE

O `TeedPHP` utiliza o gerenciador de pacotes [composer](https://getcomposer.org/) para facilitar a inclusão de bibliotecas de terceiros e até mesmo o [TeedPHP Framework](https://github.com/tadeubarbosa/teed-php-frame) (que é o responsável por fazer tudo isso funcionar), então antes de qualquer coisa vá até o site e instale o composer. Depois rode no `cmd`: composer install e o composer instalará as dependências.

----

#### Framework

- Facilita a criação de arquivos PHP, HTML, SCSS, AngularJs.

- Criação de Template para o PHP, exemplo:

    ````php
    // src/routes.php
    Route::group('profile', 'Profile',
    [

        ['/:user', 'getProfile', 'profile'],

        ['/profile-not-found', 'getProfileNotFound', 'profile-not-found']

    ]);
    ````

    ````php
    // src/controller/Profile.php
    static $base = 'profile';

    static function getProfile( $id )
    {
        $profile = UserService::find($id);

        if( !count( $profile ) ):

            self::$data['title'] = "Profile not found";

            self::$data['profile'] = $id;

            self::getView('not-found');

        else:

            self::$data['title'] = "{$user->name}'s Profile";

            $user = String::getData( $user );

            self::$data['user'] = $user;

            self::getView();

        endif;
    }
    ````

    ````html
    // src/views/profile/index.php

    {{ Html::h1( "Olá {$user->name}!" ) }}

    <button ng-click="ConfigThisProfile()">

        <i class="fa fa-cog"></i> &nbsp;

        Configurar perfil

    </button>
    ````

    ````html
    // src/views/profile/not-found.php

    <h1> OPS! </h1>

    <h2> O perfil {{ Html::strong($profile) }} não foi encontrado </h2>

    <a href="/">

        <i class="fa fa-home"></i> &nbsp;

        home

    </a>
    ````