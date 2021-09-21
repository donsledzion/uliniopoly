class Player {
    constructor(name,id, seat, balance,currentField=0) {
        this.name = name;
        this.id = id;
        this.seat = seat;
        this.balance = balance;
        this.currentField = currentField;
    }

    getName(){ return this.name;}

    getId(){ return this.id; }

    getSeat(){ return this.seat;}

    getBalance(){ return this.balance; }
    setBalance(balance){ this.balance = +balance;}

    getCurrentField(){ return this.currentField; }
    setCurrentField(currentField){ this.currentField = +currentField;}
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
    setCurrentPlayer(currentPlayer){ this.currentPlayer = +currentPlayer; }

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
        $('#current_player').text(this.currentPlayer);
        for(let i = 0 ; i < this.getPlayersCount() ; i++){
            $('#field_'+this.getPlayer(i+1).getCurrentField()+'').children('.players_dock').append(drawPlayer(i+1));
            $('#player_'+(i+1)+'_field').text(this.getPlayer(i+1).getCurrentField());
            $('#player_'+(i+1)+'_balance').text(this.getPlayer(i+1).getBalance());
        }
        for(let j = 0 ; j < this.getPlayersCount() ; j++){
            if ((j + 1) === this.getCurrentPlayer()) {
                $("#player_" + (j + 1) + "_active").append('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="'+colors[j+1]+'" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">\n' +
                    '  <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>\n' +
                    '</svg>');
            } else {
                $("#player_" + (j + 1) + "_active").text('');
            }
        }
    }
}

let players = [null,null,null,null];
let board_id = null;
let lastDraw = [null,null];

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


function retrieveGame(){

    let gameID = $('#game_id').data("id");
    $.ajax({
        url: baseUrl + "games/" + gameID + "/retrieve",
    }).done(function(data)
    {
        $.each(data.game.players,function(index,value){
            players[index] = new Player(value.user.name,value.id, (index+1), value.balance, value.field_no) ;
        });

        theGame = new Game(data.game.id,data.game.board.id,data.players_count,data.game.current_player,players);

    }).then(function(){
        theGame.drawPlayers();
    });
}

function drawPlayer(color_no){
    return '<span class="inline"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="'+colors[color_no]+'" class="bi bi-person" viewBox="0 0 16 16">'
        +'<path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>'
        +'</svg></span>';
}

function clearFields(){
    for(let i = 1 ; i < 41 ; i++){
        $('#field_'+i+'').children('.players_dock').text('');
    }
}

window.Echo.channel('game.' + $('#game_id').data("id"))
    .listen('PlayerMoved', function(game){
        console.log("Echo engaged!");
        $.each(game.game.players,function(index,value){
            theGame.getPlayer(index+1).setBalance(value.balance);
            theGame.getPlayer(index+1).setCurrentField(value.field_no);
        });
        lastDraw = game.lastDraw;

        theGame.setCurrentPlayer(game.game.current_player);
        clearFields();
        theGame.drawPlayers();
        drawDices();
        $('#infobox_1')
            .text("Game name: "+game.game.name+", current player: "+game.game.current_player);
    });

function drawDices(){
    $('#drawn_dice_1').text('');
    $('#drawn_dice_2').text('');
    var totalDrawn = 0 ;
    for(let i = 0 ; i < 2 ; i++){
        var drawn = +lastDraw[i];
        $('#drawn_dice_'+(i+1)+'').append(dices[drawn]);
        totalDrawn+=drawn;
    }
    $('#drawn_total').text(''+totalDrawn);
    return +totalDrawn;
}
/**
 * ======== GAME LOOP STARTS HERE ==========
 * */
$(function(){
    console.log("Board is loaded...");
    retrieveGame();
    $('.move').click(function() {
        $.ajax({
            method: 'post',
            url: baseUrl + "api/games/"+$('#game_id').data("id")
        })
    });
});
