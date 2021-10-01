/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/game.js ***!
  \******************************/
function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }

function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function _iterableToArrayLimit(arr, i) { var _i = arr == null ? null : typeof Symbol !== "undefined" && arr[Symbol.iterator] || arr["@@iterator"]; if (_i == null) return; var _arr = []; var _n = true; var _d = false; var _s, _e; try { for (_i = _i.call(arr); !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"] != null) _i["return"](); } finally { if (_d) throw _e; } } return _arr; }

function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var Player = /*#__PURE__*/function () {
  function Player(name, id, seat, balance) {
    var currentField = arguments.length > 4 && arguments[4] !== undefined ? arguments[4] : 0;
    var movesLeft = arguments.length > 5 && arguments[5] !== undefined ? arguments[5] : 0;

    _classCallCheck(this, Player);

    this.name = name;
    this.id = id;
    this.seat = seat;
    this.balance = balance;
    this.currentField = currentField;
    this.movesLeft = movesLeft;
  }

  _createClass(Player, [{
    key: "getName",
    value: function getName() {
      return this.name;
    }
  }, {
    key: "getId",
    value: function getId() {
      return this.id;
    }
  }, {
    key: "getSeat",
    value: function getSeat() {
      return this.seat;
    }
  }, {
    key: "getBalance",
    value: function getBalance() {
      return this.balance;
    }
  }, {
    key: "setBalance",
    value: function setBalance(balance) {
      this.balance = +balance;
    }
  }, {
    key: "getCurrentField",
    value: function getCurrentField() {
      return this.currentField;
    }
  }, {
    key: "setCurrentField",
    value: function setCurrentField(currentField) {
      this.currentField = +currentField;
    }
  }]);

  return Player;
}();

var Game = /*#__PURE__*/function () {
  function Game(id, boardId) {
    var playersCount = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 0;
    var currentPlayer = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : 1;

    var _ref = arguments.length > 4 ? arguments[4] : undefined,
        _ref2 = _slicedToArray(_ref, 4),
        _ref2$ = _ref2[0],
        player1 = _ref2$ === void 0 ? null : _ref2$,
        _ref2$2 = _ref2[1],
        player2 = _ref2$2 === void 0 ? null : _ref2$2,
        _ref2$3 = _ref2[2],
        player3 = _ref2$3 === void 0 ? null : _ref2$3,
        _ref2$4 = _ref2[3],
        player4 = _ref2$4 === void 0 ? null : _ref2$4;

    _classCallCheck(this, Game);

    this.id = id;
    this.boardId = boardId;
    this.playersCount = playersCount;
    this.currentPlayer = currentPlayer;
    this.player1 = player1;
    this.player2 = player2;
    this.player3 = player3;
    this.player4 = player4;
  }

  _createClass(Game, [{
    key: "getId",
    value: function getId() {
      return this.id;
    }
  }, {
    key: "getBoardId",
    value: function getBoardId() {
      return this.boardId;
    }
  }, {
    key: "getPlayersCount",
    value: function getPlayersCount() {
      return this.playersCount;
    }
  }, {
    key: "getCurrentPlayer",
    value: function getCurrentPlayer() {
      return this.currentPlayer;
    }
  }, {
    key: "setCurrentPlayer",
    value: function setCurrentPlayer(currentPlayer) {
      this.currentPlayer = +currentPlayer;
    }
  }, {
    key: "getPlayer",
    value: function getPlayer(player) {
      if (player === 1) {
        return this.player1;
      } else if (player === 2) {
        return this.player2;
      } else if (player === 3) {
        return this.player3;
      } else if (player === 4) {
        return this.player4;
      } else {
        alert('error! Wrong player no: ' + player);
      }
    }
  }, {
    key: "drawPlayers",
    value: function drawPlayers() {
      $('#current_player').text(this.currentPlayer);

      for (var i = 0; i < this.getPlayersCount(); i++) {
        $('#field_' + this.getPlayer(i + 1).getCurrentField() + '').children('.players_dock').append(drawPlayer(i + 1));
        $('#player_' + (i + 1) + '_field').text(this.getPlayer(i + 1).getCurrentField());
        $('#player_' + (i + 1) + '_balance').text(this.getPlayer(i + 1).getBalance());
        $("#player_" + (i + 1) + "_active").text('');
      }

      for (var j = 0; j < this.getPlayersCount(); j++) {
        if (j + 1 === this.getCurrentPlayer()) {
          $("#player_" + (j + 1) + "_active").append('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="' + colors[j + 1] + '" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">\n' + '  <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>\n' + '</svg>');
        } else {
          $("#player_" + (j + 1) + "_active").text('');
        }
      }
    }
  }]);

  return Game;
}();

var players = [null, null, null, null];
var board_id = null;
var lastDraw = [null, null];
var dices = ['', '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-dice-1" viewBox="0 0 16 16">\n' + '  <circle cx="8" cy="8" r="1.5"/>\n' + '  <path d="M13 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h10zM3 0a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V3a3 3 0 0 0-3-3H3z"/>\n' + '</svg>', '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-dice-2" viewBox="0 0 16 16">\n' + '  <path d="M13 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h10zM3 0a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V3a3 3 0 0 0-3-3H3z"/>\n' + '  <path d="M5.5 4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm8 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>\n' + '</svg>', '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-dice-3" viewBox="0 0 16 16">\n' + '  <path d="M13 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h10zM3 0a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V3a3 3 0 0 0-3-3H3z"/>\n' + '  <path d="M5.5 4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm8 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-4-4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>\n' + '</svg>', '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-dice-4" viewBox="0 0 16 16">\n' + '  <path d="M13 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h10zM3 0a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V3a3 3 0 0 0-3-3H3z"/>\n' + '  <path d="M5.5 4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm8 0a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-8 0a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>\n' + '</svg>', '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-dice-5" viewBox="0 0 16 16">\n' + '  <path d="M13 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h10zM3 0a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V3a3 3 0 0 0-3-3H3z"/>\n' + '  <path d="M5.5 4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm8 0a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-8 0a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm4-4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>\n' + '</svg>', '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-dice-6" viewBox="0 0 16 16">\n' + '  <path d="M13 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h10zM3 0a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V3a3 3 0 0 0-3-3H3z"/>\n' + '  <path d="M5.5 4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm8 0a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-8 4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>\n' + '</svg>'];
var colors = ['black', 'blue', 'red', 'green', 'yellow'];

function retrieveGame() {
  var gameID = $('#game_id').data("id");
  $.ajax({
    url: baseUrl + "games/" + gameID + "/retrieve"
  }).done(function (data) {
    $.each(data.game.players, function (index, value) {
      players[index] = new Player(value.name, value.id, index + 1, value.balance, value.field_no);
    });
    theGame = new Game(data.game.id, data.game.board.id, data.players_count, data.game.current_player, players);
    updateButtons(data.game.moves_left);
  }).then(function () {
    theGame.drawPlayers();
  });
}

function drawPlayer(color_no) {
  return '<span class="inline"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="' + colors[color_no] + '" class="bi bi-person" viewBox="0 0 16 16">' + '<path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>' + '</svg></span>';
}

function clearFields() {
  for (var i = 1; i < 41; i++) {
    $('#field_' + i + '').children('.players_dock').text('');
  }
}

window.Echo.channel('game.' + $('#game_id').data("id")).listen('EndOfTurn', function (game) {
  console.log("Next player!");
  theGame.setCurrentPlayer(game.game.current_player);
  clearFields();
  theGame.drawPlayers();
  updateButtons(game.movesLeft);
});
window.Echo.channel('game.' + $('#game_id').data("id")).listen('PlayerThrown', function (game) {
  console.log("Echo engaged!");
  $.each(game.game.players, function (index, value) {
    theGame.getPlayer(index + 1).setBalance(value.balance);
    theGame.getPlayer(index + 1).setCurrentField(value.field_no);
  });
  lastDraw = game.lastDraw;
  theGame.setCurrentPlayer(game.game.current_player);
  clearFields();
  theGame.drawPlayers();
  drawDices();
  var gameTable = $('#infobox_1');
  gameTable.find('#current_player').text(game.game.currentPlayer);
  gameTable.find('#result').text(lastDraw[0] + ' + ' + lastDraw[1] + ' = ' + (lastDraw[0] + lastDraw[1]));
  gameTable.find('#actions').text(game.game.round_log);
  updateButtons(game.movesLeft);
});

function updateButtons(movesLeft) {
  console.log("updating buttons...");
  console.log("Moves left: " + movesLeft + " <==");

  if (movesLeft > 0) {
    $('.end-turn').attr("disabled", "disabled");
    $('.move').removeAttr("disabled");
  } else {
    $('.end-turn').removeAttr("disabled");
    $('.move').attr("disabled", "disabled");
  }
}

function drawDices() {
  $('#drawn_dice_1').text('');
  $('#drawn_dice_2').text('');
  var totalDrawn = 0;

  for (var i = 0; i < 2; i++) {
    var drawn = +lastDraw[i];
    $('#drawn_dice_' + (i + 1) + '').append(dices[drawn]);
    totalDrawn += drawn;
  }

  $('#drawn_total').text('' + totalDrawn);
  return +totalDrawn;
}
/**
 * ======== GAME LOOP STARTS HERE ==========
 * */


$(function () {
  console.log("Board is loaded...");
  retrieveGame();
  $('.move').click(function () {
    $.ajax({
      method: 'post',
      url: baseUrl + "api/games/" + $('#game_id').data("id") + "/throw"
    });
  });
});
$(function () {
  $('.end-turn').click(function () {
    $.ajax({
      method: 'post',
      url: baseUrl + 'api/games/' + $('#game_id').data("id") + "/end-turn"
    });
  });
});
/******/ })()
;