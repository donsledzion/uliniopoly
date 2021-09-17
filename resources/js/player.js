let players = [null,null,null,null];
let board_id = null;
let currentPlayer = null;

const dices = [
    '',
    '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-dice-1" viewBox="0 0 16 16">\n' +
    '  <circle cx="8" cy="8" r="1.5"/>\n' +
    '  <path d="M13 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h10zM3 0a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V3a3 3 0 0 0-3-3H3z"/>\n' +
    '</svg>',
    '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-dice-2" viewBox="0 0 16 16">\n' +
    '  <path d="M13 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h10zM3 0a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V3a3 3 0 0 0-3-3H3z"/>\n' +
    '  <path d="M5.5 4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm8 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>\n' +
    '</svg>',
    '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-dice-3" viewBox="0 0 16 16">\n' +
    '  <path d="M13 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h10zM3 0a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V3a3 3 0 0 0-3-3H3z"/>\n' +
    '  <path d="M5.5 4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm8 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-4-4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>\n' +
    '</svg>',
    '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-dice-4" viewBox="0 0 16 16">\n' +
    '  <path d="M13 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h10zM3 0a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V3a3 3 0 0 0-3-3H3z"/>\n' +
    '  <path d="M5.5 4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm8 0a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-8 0a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>\n' +
    '</svg>',
    '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-dice-5" viewBox="0 0 16 16">\n' +
    '  <path d="M13 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h10zM3 0a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V3a3 3 0 0 0-3-3H3z"/>\n' +
    '  <path d="M5.5 4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm8 0a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-8 0a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm4-4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>\n' +
    '</svg>',
    '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-dice-6" viewBox="0 0 16 16">\n' +
    '  <path d="M13 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h10zM3 0a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V3a3 3 0 0 0-3-3H3z"/>\n' +
    '  <path d="M5.5 4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm8 0a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-8 4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>\n' +
    '</svg>',
];

const colors = [
    'black',
    'blue',
    'red',
    'green',
    'yellow'
];

class Player {
    constructor(name,id, order, balance,currentField=0) {
        this.name = name;
        this.id = id;
        this.order = order;
        this.balance = balance;
        this.currentField = currentField;
    }

    move(steps){
        this.currentField = (this.currentField + +steps) % 40;
        $('#player_'+this.getOrder()+'_field').text(this.getCurrentField());
    }

    jumpTo(field){ this.currentField = +field; }

    account(amount){ this.balance += +amount;}

    getName(){ return this.name;}

    getId(){ return this.id; }

    getOrder(){ return this.order;}

    getBalance(){ return this.balance; }

    getCurrentField(){ return this.currentField; }
}

class Game{
    constructor(id,boardId,playersCount = 0, currentPlayer=1,[player1=null,player2=null,player3=null,player4=null]){
        this.id = id;
        this.boardId = boardId;
        this.playersCount = playersCount;
        this.currentPlayer = currentPlayer;
        this.player1 = player1;
        this.player2 = player2;
        this.player3 = player3;
        this.player4 = player4;
    }

    getId(){ return this.id;}
    getBoardId(){ return this.boardId;}
    getPlayersCount(){ return this.playersCount; }
    getCurrentPlayer(){ return this.currentPlayer;}
    getPlayer1(){ return this.player1;}
    getPlayer2(){ return this.player2;}
    getPlayer3(){ return this.player3;}
    getPlayer4(){ return this.player4;}
    nextPlayer(){
        this.currentPlayer++ ;
        if(this.currentPlayer > this.getPlayersCount()){
            this.currentPlayer = 1 ;
        }
        $('#current_player').text(this.currentPlayer);
        console.log('Next player is: '+this.getCurrentPlayer());
    }
    getPlayer(player){
        if(player === 1){ return this.player1;}
        else if(player === 2){ return this.player2;}
        else if(player === 3){ return this.player3;}
        else if(player === 4){ return this.player4;}
        else {
            alert('error! Wrong player no: '+player);
        }
    }

    drawPlayers(){
        for(let i = 0 ; i < this.getPlayersCount() ; i++){
            $('#field_'+this.getPlayer(i+1).getCurrentField()+'').children('.players_dock').append(drawPlayer(i+1));
        }
        for(let j = 0 ; j < this.getPlayersCount() ; j++){
            $("#player_"+(j+1)+"_active").text('');
            if((j+1)===this.getCurrentPlayer()){
                $("#player_"+(j+1)+"_active").append('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">\n' +
                    '  <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>\n' +
                    '</svg>');
            }
        }
    }
}

let theGame = null;

function drawPlayer(color_no){
    return '<span class="inline"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="'+colors[color_no]+'" class="bi bi-person" viewBox="0 0 16 16">'
        +'<path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>'
        +'</svg></span>';
}

function clearFields(){
    for(let i = 0 ; i < 40 ; i++){
        $('#field_'+i+'').children('.players_dock').text('');
    }
}

function drawPlayers(){
    let players_count = $('#players_count').text();
    for(let i = 0 ; i < players_count ; i++){
        let player_field = $('#player_'+(i+1)+'_field').text();
        $('#field_'+player_field+'').children('.players_dock').append(drawPlayer(i+1));
    }
}

function rollDice(){
    return Math.floor((Math.random() * 6 ) + 1 );
}

function drawDices(){
    $('#drawn_dice_1').text('');
    $('#drawn_dice_2').text('');
    var totalDrawn = 0 ;
    for(let i = 0 ; i < 2 ; i++){
        var drawn = rollDice();
        $('#drawn_dice_'+(i+1)+'').append(dices[drawn]);
        totalDrawn+=drawn;
    }
    $('#drawn_total').text(''+totalDrawn);
    return +totalDrawn;
}

function updateGame(game){
    $.ajax({
        type: 'post',
        url: baseUrl + 'games',
        dataType: 'json',
        data: { 'game': game}
    }).done(function(data){
        console.log('received message: '+ data.message);
    });
}
/**************************************************************
 ************** Main gameplay function ************************
 *************************************************************/
$(function(){
    retrieveGame();

    $('.move').click(function() {

        /*retrieveGame();*/

        theGame.getPlayer(theGame.getCurrentPlayer()).move(drawDices());

        clearFields();

        theGame.drawPlayers();

        theGame.nextPlayer();

        updateGame(theGame);

    });
})
/**************************************************************
 ************** End of main gameplay function *****************
 *************************************************************/

$(function(){
    $('.field').mouseover(function(){
        $('#infobox_1').text("id = "+$(this).attr("id"));
    }).mouseout(function(){
        $('#infobox_1').text("");
    });
})

function retrieveGame(){

    let gameID = $('#game_id').data("id");
    console.log("Reading game");
    $.ajax({
        url: baseUrl + "games/" + gameID + "/retrieve",
    }).done(function(data)
    {
        if(data.user_1){
            players[0] = new Player(data.user_1.name,data.game.player1.id, 1, data.game.player1.cash, data.game.player1.field_no) ;
            console.log("Player1->cash:" + players[0].getBalance() + ", currentField: " + players[0].getCurrentField());
        }
        if(data.user_2){
            players[1] = new Player(data.user_2.name,data.game.player2.id, 2, data.game.player2.cash, data.game.player2.field_no) ;
        }
        if(data.user_3){
            players[2] = new Player(data.user_3.name,data.game.player3.id, 3, data.game.player3.cash, data.game.player3.field_no) ;
        }
        if(data.user_4){
            players[3] = new Player(data.user_4.name,data.game.player4.id, 4, data.game.player4.cash, data.game.player4.field_no) ;
        }
        theGame = new Game(data.game.id,data.board_id,data.playersCount,data.game.current_player,players);

    }).then(function(){
        theGame.drawPlayers();
        console.log('data retrieved');

    });
}
