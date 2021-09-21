/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/player.js ***!
  \********************************/
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _getPrototypeOf(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _getPrototypeOf(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _possibleConstructorReturn(this, result); }; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } else if (call !== void 0) { throw new TypeError("Derived constructors may only return object or undefined"); } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }

function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function _iterableToArrayLimit(arr, i) { var _i = arr == null ? null : typeof Symbol !== "undefined" && arr[Symbol.iterator] || arr["@@iterator"]; if (_i == null) return; var _arr = []; var _n = true; var _d = false; var _s, _e; try { for (_i = _i.call(arr); !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"] != null) _i["return"](); } finally { if (_d) throw _e; } } return _arr; }

function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var players = [null, null, null, null];
var board_id = null;
var currentPlayer = null;
var dices = ['', '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-dice-1" viewBox="0 0 16 16">\n' + '  <circle cx="8" cy="8" r="1.5"/>\n' + '  <path d="M13 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h10zM3 0a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V3a3 3 0 0 0-3-3H3z"/>\n' + '</svg>', '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-dice-2" viewBox="0 0 16 16">\n' + '  <path d="M13 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h10zM3 0a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V3a3 3 0 0 0-3-3H3z"/>\n' + '  <path d="M5.5 4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm8 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>\n' + '</svg>', '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-dice-3" viewBox="0 0 16 16">\n' + '  <path d="M13 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h10zM3 0a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V3a3 3 0 0 0-3-3H3z"/>\n' + '  <path d="M5.5 4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm8 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-4-4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>\n' + '</svg>', '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-dice-4" viewBox="0 0 16 16">\n' + '  <path d="M13 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h10zM3 0a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V3a3 3 0 0 0-3-3H3z"/>\n' + '  <path d="M5.5 4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm8 0a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-8 0a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>\n' + '</svg>', '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-dice-5" viewBox="0 0 16 16">\n' + '  <path d="M13 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h10zM3 0a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V3a3 3 0 0 0-3-3H3z"/>\n' + '  <path d="M5.5 4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm8 0a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-8 0a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm4-4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>\n' + '</svg>', '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-dice-6" viewBox="0 0 16 16">\n' + '  <path d="M13 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h10zM3 0a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V3a3 3 0 0 0-3-3H3z"/>\n' + '  <path d="M5.5 4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm8 0a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-8 4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>\n' + '</svg>'];
var colors = ['black', 'blue', 'red', 'green', 'yellow'];

var Player = /*#__PURE__*/function () {
  function Player(name, id, order, balance) {
    var currentField = arguments.length > 4 && arguments[4] !== undefined ? arguments[4] : 0;

    _classCallCheck(this, Player);

    this.name = name;
    this.id = id;
    this.order = order;
    this.balance = balance;
    this.currentField = currentField;
  }

  _createClass(Player, [{
    key: "move",
    value: function move(steps) {
      this.currentField = (this.currentField + +steps) % 40;
      this.currentField = (this.currentField + +steps) % 40;
      board[this.currentField].action(this);
      $('#player_' + this.getOrder() + '_field').text(this.getCurrentField());
    }
  }, {
    key: "jumpTo",
    value: function jumpTo(field) {
      this.currentField = +field;
    }
  }, {
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
    key: "getOrder",
    value: function getOrder() {
      return this.order;
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
    key: "changeBalance",
    value: function changeBalance(amount) {
      this.balance += +amount;
      $('#player_' + this.getOrder() + '_balance').text('$' + this.balance);
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
    key: "getPlayer1",
    value: function getPlayer1() {
      return this.player1;
    }
  }, {
    key: "getPlayer2",
    value: function getPlayer2() {
      return this.player2;
    }
  }, {
    key: "getPlayer3",
    value: function getPlayer3() {
      return this.player3;
    }
  }, {
    key: "getPlayer4",
    value: function getPlayer4() {
      return this.player4;
    }
  }, {
    key: "nextPlayer",
    value: function nextPlayer() {
      this.currentPlayer++;

      if (this.currentPlayer > this.getPlayersCount()) {
        this.currentPlayer = 1;
      }

      $('#current_player').text(this.currentPlayer);
      console.log('Next player is: ' + this.getCurrentPlayer());

      for (var j = 0; j < this.getPlayersCount(); j++) {
        if (j + 1 === this.getCurrentPlayer()) {
          $("#player_" + (j + 1) + "_active").append('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">\n' + '  <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>\n' + '</svg>');
        }
      }
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
      for (var i = 0; i < this.getPlayersCount(); i++) {
        $('#field_' + this.getPlayer(i + 1).getCurrentField() + '').children('.players_dock').append(drawPlayer(i + 1));
      }

      for (var j = 0; j < this.getPlayersCount(); j++) {
        $("#player_" + (j + 1) + "_active").text('');
      }
    }
  }]);

  return Game;
}();

var theGame = null;

var Field = /*#__PURE__*/function () {
  function Field(field_no) {
    _classCallCheck(this, Field);

    this.field_no = field_no;
  }

  _createClass(Field, [{
    key: "getFieldNo",
    value: function getFieldNo() {
      return this.field_no;
    }
  }, {
    key: "action",
    value: function action(player) {
      console.log("Player " + player.name + " has landed on field no " + this.getFieldNo());
      this.handlePlayer(player);
    }
  }, {
    key: "handlePlayer",
    value: function handlePlayer(player) {}
  }]);

  return Field;
}();

var StartField = /*#__PURE__*/function (_Field) {
  _inherits(StartField, _Field);

  var _super = _createSuper(StartField);

  function StartField() {
    _classCallCheck(this, StartField);

    return _super.apply(this, arguments);
  }

  _createClass(StartField, [{
    key: "handlePlayer",
    value: function handlePlayer(player) {
      console.log("" + player.name + " welcome on START FIELD");
    }
  }]);

  return StartField;
}(Field);

var GoToJailField = /*#__PURE__*/function (_Field2) {
  _inherits(GoToJailField, _Field2);

  var _super2 = _createSuper(GoToJailField);

  function GoToJailField() {
    _classCallCheck(this, GoToJailField);

    return _super2.apply(this, arguments);
  }

  _createClass(GoToJailField, [{
    key: "handlePlayer",
    value: function handlePlayer(player) {
      console.log("" + player.name + " goes to jail!");
      player.jumpTo(10);
    }
  }]);

  return GoToJailField;
}(Field);

var FreeParkingField = /*#__PURE__*/function (_Field3) {
  _inherits(FreeParkingField, _Field3);

  var _super3 = _createSuper(FreeParkingField);

  function FreeParkingField() {
    _classCallCheck(this, FreeParkingField);

    return _super3.apply(this, arguments);
  }

  _createClass(FreeParkingField, [{
    key: "handlePlayer",
    value: function handlePlayer(player) {
      console.log("" + player.name + " is resting on Free Parking!");
    }
  }]);

  return FreeParkingField;
}(Field);

var IncomeTaxField = /*#__PURE__*/function (_Field4) {
  _inherits(IncomeTaxField, _Field4);

  var _super4 = _createSuper(IncomeTaxField);

  function IncomeTaxField() {
    _classCallCheck(this, IncomeTaxField);

    return _super4.apply(this, arguments);
  }

  _createClass(IncomeTaxField, [{
    key: "handlePlayer",
    value: function handlePlayer(player) {
      console.log("" + player.name + " has to pay IncomeTax! 200! ");
      player.changeBalance(-200);
    }
  }]);

  return IncomeTaxField;
}(Field);

var JailField = /*#__PURE__*/function (_Field5) {
  _inherits(JailField, _Field5);

  var _super5 = _createSuper(JailField);

  function JailField() {
    _classCallCheck(this, JailField);

    return _super5.apply(this, arguments);
  }

  _createClass(JailField, [{
    key: "handlePlayer",
    value: function handlePlayer(player) {
      console.log("" + player.name + " Is visiting jail prisoners (better not to stay here for to long).");
    }
  }]);

  return JailField;
}(Field);

var board = [];

for (var k = 0; k < 40; k++) {
  if (k === 0) {
    board[k] = new StartField(k);
  } else if (k === 4) {
    board[k] = new IncomeTaxField(k);
  } else if (k === 10) {
    board[k] = new JailField(k);
  } else if (k === 20) {
    board[k] = new FreeParkingField(k);
  } else if (k === 30) {
    board[k] = new GoToJailField(k);
  } else {
    board[k] = new Field(k);
  }
}

function drawPlayer(color_no) {
  return '<span class="inline"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="' + colors[color_no] + '" class="bi bi-person" viewBox="0 0 16 16">' + '<path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>' + '</svg></span>';
}

function clearFields() {
  for (var i = 0; i < 40; i++) {
    $('#field_' + i + '').children('.players_dock').text('');
  }
}

function rollDice() {
  return Math.floor(Math.random() * 6 + 1);
}

function drawDices() {
  $('#drawn_dice_1').text('');
  $('#drawn_dice_2').text('');
  var totalDrawn = 0;

  for (var i = 0; i < 2; i++) {
    var drawn = rollDice();
    $('#drawn_dice_' + (i + 1) + '').append(dices[drawn]);
    totalDrawn += drawn;
  }

  $('#drawn_total').text('' + totalDrawn);
  return +totalDrawn;
}

function pushGame(game) {
  $.ajax({
    type: 'post',
    url: baseUrl + 'games',
    dataType: 'json',
    data: {
      'game': game
    }
  }).done(function (data) {
    console.log('received message: ' + data.message);
  });
}
/**************************************************************
 ************** Main gameplay function ************************
 *************************************************************/


$(function () {
  retrieveGame();
  $('.move').click(function () {
    pullGame();
  });
});
/**************************************************************
 ************** End of main gameplay function *****************
 *************************************************************/

$(function () {
  $('.field').mouseover(function () {
    $('#infobox_1').text("id = " + $(this).attr("id"));
  }).mouseout(function () {
    $('#infobox_1').text("");
  });
});

function retrieveGame() {
  var gameID = $('#game_id').data("id");
  console.log("Reading game");
  $.ajax({
    url: baseUrl + "games/" + gameID + "/retrieve"
  }).done(function (data) {
    if (data.user_1) {
      players[0] = new Player(data.user_1.name, data.game.player1.id, 1, data.game.player1.balance, data.game.player1.field_no);
    }

    if (data.user_2) {
      players[1] = new Player(data.user_2.name, data.game.player2.id, 2, data.game.player2.balance, data.game.player2.field_no);
    }

    if (data.user_3) {
      players[2] = new Player(data.user_3.name, data.game.player3.id, 3, data.game.player3.balance, data.game.player3.field_no);
    }

    if (data.user_4) {
      players[3] = new Player(data.user_4.name, data.game.player4.id, 4, data.game.player4.balance, data.game.player4.field_no);
    }

    theGame = new Game(data.game.id, data.board_id, data.playersCount, data.game.current_player, players);
  }).then(function () {
    theGame.drawPlayers();
    console.log('data retrieved');
  });
}

function listen(gameID) {
  if (theGame) {
    Echo.channel('game' + gameID).listen('PlayerMoved', function (game) {
      console.log('====================================');
      console.log('=========== listener works!=========');
      console.log('====================================');
      $('#infobox_1').text(game.getPlayersCount());
    });
  } else {
    console.log('====================================');
    console.log('===== the game is not defined! =====');
    console.log('====================================');
  }
}

window.Echo.channel('game.' + $('#game_id').data("id")).listen('PlayerMoved', function (game) {
  console.log('====================================');
  console.log('=========== listener works!=========');
  console.log('====================================');
  $('#infobox_1').text("Game name: " + game.game.name + ", current player: " + game.game.current_player);
});

function pullGame() {
  var gameID = $('#game_id').data("id");
  console.log("Pulling game");
  $.ajax({
    url: baseUrl + "games/" + gameID + "/retrieve"
  }).done(function (data) {
    if (data.user_1) {
      theGame.getPlayer(1).setBalance(data.game.player1.balance);
      theGame.getPlayer(1).setCurrentField(data.game.player1.field_no);
    }

    if (data.user_2) {
      theGame.getPlayer(2).setBalance(data.game.player2.balance);
      theGame.getPlayer(2).setCurrentField(data.game.player2.field_no);
    }

    if (data.user_3) {
      theGame.getPlayer(3).setBalance(data.game.player3.balance);
      theGame.getPlayer(3).setCurrentField(data.game.player3.field_no);
    }

    if (data.user_4) {
      theGame.getPlayer(4).setBalance(data.game.player4.balance);
      theGame.getPlayer(4).setCurrentField(data.game.player4.field_no);
    }

    theGame.setCurrentPlayer(data.game.current_player);
  }).then(function () {
    $.ajax({
      method: 'post',
      url: baseUrl + "api/games/" + gameID + "/" + theGame.getCurrentPlayer()
    }).then(function () {
      theGame.getPlayer(theGame.getCurrentPlayer()).move(drawDices());
      clearFields();
      theGame.drawPlayers();
      theGame.nextPlayer();
      pushGame(theGame);
    });
  });
}
/******/ })()
;