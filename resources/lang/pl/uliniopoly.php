<?php

return [
    'uliniopoly' => 'Uliniopoly',


    'field_types' => [
        'field_types' => 'Rodzaje pól',
        'field_type' => 'Rodzaj pola',
        'name' => 'Nazwa',
        'description' => 'Opis',
        'unique' => 'Unikalne',
        'create' => 'Stwórz nowy typ pola',
        'names' => [
            'default' => 'Pole domyślne',
            'start' => 'Start',
            'jail' => 'Więzienie',
            'go_to_jail' => 'Idziesz do więzienia',
            'parking' => 'Parking',
            'tax' => 'Podatek',
            'risk' => 'Ryzyko',
            'chance' => 'Szansa',
            'property' => 'Nieruchomość',
            'carrier' => 'Przewoźnik',
            'service' => 'Usługa',
        ],
        'descriptions' => [
            'default' => 'Pole dołączane do planszy warunkowo - jeśli użytkownik nie podał żadnego innego pola.
            Pole nie ma żadnych opłat ani akcji => tak samo jak (powinien mieć) darmowy parking.',
            'start' => 'Pole startowe. Na każdej planszy powinno się takie znajdować. W końcu gracze muszą gdzieś
            zacząć grę, prawda? Najczęściej przy przejściu przez pole Start gracze otrzymują pensję.',
            'jail' => 'Idziesz do ciupy. Nie ma Monopoly bez pola, na które trafia się za karę i w którym czeka się
            na lepsze jutro. Trafia się tu najczęściej z pola "Idziesz do Więzienia" lub np. za wyrzucenie 3 dubli.',
            'go_to_jail' => 'Pole wysyła gracza na "wczasy na koszt podatników". Życzymy miłego pobytu ;)',
            'parking' => 'Pole jest to najczęściej wolne od opłat... Ale czy musi tak być zawsze?',
            'tax' => 'Płacisz pieniążek na utrzymanie tych co w ciupie. Płać i płacz.',
            'risk' => 'Pobierz kartę i sprawdź co Cię czeka. Może coś miłego, a może wręcz odwrotnie.',
            'chance' => 'Nie mam pojęcia jaka jest różnica między kartami Szansa i Ryzyko, ale zawsze były
            te dwa rodzaje, co nie?.',
            'property' => 'Nieruchomość na sprzedaż. Wykup całą dzielnicę i kasuj nieszczęśników za pobyt!
             Stawiaj domki a potem hotele! O to właśnie chodzi!',
            'carrier' => 'Przewoźnicy, a może coś innego wymyślisz? Najczęściej są to pola zlokalizowane
            na środku "ściany" planszy. Im więcej zbiezesz ich w posiadanie tym więcej zainkasujesz za postój na nich.',
            'service' => 'Różne usługi. Jeśli będziesz ich monopolistą to będziesz ustanawiał ceny wg. własnego uznania.'
        ],
    ],

    'fields' => [
        'fields' => 'Pola',
        'field' => 'Pole',
        'name' => 'Nazwa',
        'type' => 'Rodzaj pola',
        'group' => 'Grupa',
        'description' => 'Opis',
        'pricing' => 'Cennik',
        'create' => 'Stwórz nowe pole',
        'edit' => 'Edytuj pole',
        'pick' => 'Wybierz pole',
        'names' => [
            'default' => 'Pole domyślne',
            'start' => 'Start!',
            'jail' => 'Ciupa!',
            'go_to_jail' => 'Idziesz do Ciupy',
            'free_parking' => 'Darmowy Parking',
        ],

        'descriptions' => [
            'default' => 'Domyślne pole na którym absolutnie nic się nie dzieje.',
            'start' => 'Pole startowe - pobierasz pensję i odpoczywasz.',
            'jail' => 'Więzienie - albo odwiedzasz albo to Ciebie odwiedzają. Ostrożnie.',
            'go_to_jail' => 'I to Ciebie będą odwiedzać - sorry!',
            'free_parking' => 'Darmowy parking. Odpocznij przed dalszą podróżą.',
        ],

    ],

    'boards' => [
        'board' => 'Plansza',
        'boards' => 'Plansze',
        'new_board' => 'Nowa plansza',
        'edit_board' => 'Edycja planszy',
        'name' => 'Nazwa',
        'description' => 'Opis',
        'create' => 'Stwórz nową planszę',
        'names' => [
            'default' => 'Uliniopoly!'
        ],
        'descriptions' => [
            'default' => 'Pierwsza, domyślna plansza zainicjowana przez aplikację - miłej zabawy.'
        ],
    ],

    'games' => [
        'games' => 'Gry',
        'game' => 'Gra',
        'name' => 'Nazwa gry',
        'create' => 'Stwórz grę',
        'edit' => 'Edytuj grę',
        'board_name' => 'Nazwa planszy',
        'balance' => 'Konto',
        'default_name' => 'Uliniopoly!',
        'start_balance' => 'Początkowa kasa',
        'players' => 'Gracze',
    ],

    'players' => [
        'players' => 'Gracze',
        'player' => 'Gracz',
        'list' => 'Lista graczy',
        'pick' => 'Wybierz gracza',
        'name' => 'Imię',
        'balance' => 'Konto',
    ],

];
