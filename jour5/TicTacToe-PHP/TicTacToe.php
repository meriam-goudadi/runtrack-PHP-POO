<?php
session_start();

class TicTacToe {
    private $board;
    private $currentPlayer;

    public function __construct() {
        if (!isset($_SESSION['board']) || isset($_POST['reset'])) {
            $this->resetGame();
        } else {
            $this->board = $_SESSION['board'];
            $this->currentPlayer = $_SESSION['currentPlayer'];
        }

        // Si un choix de joueur est fait, l'enregistrer
        if (isset($_POST['playerChoice'])) {
            $this->currentPlayer = $_POST['playerChoice'];
            $_SESSION['currentPlayer'] = $this->currentPlayer;
        }
    }

    public function resetGame() {
        $this->board = array_fill(0, 3, array_fill(0, 3, ''));
        $this->currentPlayer = $_SESSION['currentPlayer'] ?? 'X'; // Si le joueur a choisi un signe, on le garde
        $_SESSION['board'] = $this->board;
        $_SESSION['currentPlayer'] = $this->currentPlayer;
    }

    public function playMove($row, $col) {
        if ($this->board[$row][$col] == '') {
            $this->board[$row][$col] = $this->currentPlayer;
            $_SESSION['board'] = $this->board;
            if (!$this->checkWinner()) {
                $this->switchPlayer();
            }
        }
    }

    private function switchPlayer() {
        $this->currentPlayer = ($this->currentPlayer == 'X') ? 'O' : 'X';
        $_SESSION['currentPlayer'] = $this->currentPlayer;
    }

    public function checkWinner() {
        for ($i = 0; $i < 3; $i++) {
            if ($this->board[$i][0] && $this->board[$i][0] == $this->board[$i][1] && $this->board[$i][1] == $this->board[$i][2]) {
                return $this->board[$i][0];
            }
            if ($this->board[0][$i] && $this->board[0][$i] == $this->board[1][$i] && $this->board[1][$i] == $this->board[2][$i]) {
                return $this->board[0][$i];
            }
        }
        if ($this->board[0][0] && $this->board[0][0] == $this->board[1][1] && $this->board[1][1] == $this->board[2][2]) {
            return $this->board[0][0];
        }
        if ($this->board[0][2] && $this->board[0][2] == $this->board[1][1] && $this->board[1][1] == $this->board[2][0]) {
            return $this->board[0][2];
        }
        return false;
    }

    public function isBoardFull() {
        foreach ($this->board as $row) {
            if (in_array('', $row)) {
                return false;
            }
        }
        return true;
    }

    public function getBoard() {
        return $this->board;
    }

    public function getCurrentPlayer() {
        return $this->currentPlayer;
    }
}

$game = new TicTacToe();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['reset'])) {
        $game->resetGame();
    } elseif (isset($_POST['row']) && isset($_POST['col'])) {
        $game->playMove($_POST['row'], $_POST['col']);
    }
}

$board = $game->getBoard();
$winner = $game->checkWinner();
$isFull = $game->isBoardFull();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Tic Tac Toe</title>
    <style>
        /* Ajout d'un fond attrayant pour le jeu */
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #667eea, #764ba2);
            margin: 0;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }
        h1 {
            margin-bottom: 10px;
            font-size: 28px;
            color: #333;
        }
        /* Ajout du choix du signe pour le joueur qui commence */
        .selection {
            margin-bottom: 15px;
        }
        .selection label {
            font-size: 18px;
            margin-right: 10px;
        }
        .selection select {
            font-size: 16px;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(3, 100px);
            gap: 5px;
            justify-content: center;
            grid-template-rows: repeat(3, 100px);
            margin-top: 20px;
            margin-bottom: 20px; /* Ajout d’un espace en bas de la grille */
        }
        .cell {
            width: 100px;
            height: 100px;
            font-size: 2em;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid black;
            cursor: pointer;
            font-size: 24px;
            font-weight: bold;
            background: white;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .cell:hover {
            background: #f4f4f4;
        }
        .cell.disabled {
            cursor: not-allowed;
            background-color: #ddd;
        }
        button {
            margin-top: 20px;
            padding: 10px;
            font-size: 1em;
        }
        .message {
            font-size: 20px;
            margin-bottom: 15px;
            color: #333;
        }
        .restart {
            margin-top: 15px;
            padding: 10px 15px;
            font-size: 16px;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .restart:hover {
            background: #764ba2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tic Tac Toe</h1>
        <p class="message">Joueur actuel : <?= $game->getCurrentPlayer(); ?></p>
        
        <!-- Formulaire de sélection du signe du joueur -->
        <form method="POST">
            <div class="selection">
                <label for="playerChoice">Choisissez votre signe :</label>
                <select name="playerChoice" id="playerChoice">
                    <option value="X" <?= ($_SESSION['currentPlayer'] ?? 'X') == 'X' ? 'selected' : ''; ?>>X</option>
                    <option value="O" <?= ($_SESSION['currentPlayer'] ?? 'X') == 'O' ? 'selected' : ''; ?>>O</option>
                </select>
                <button type="submit">Valider</button>
            </div>
        </form>

        <!-- Grille du jeu -->
        <div class="grid">
            <?php for ($i = 0; $i < 3; $i++): ?>
                <?php for ($j = 0; $j < 3; $j++): ?>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="row" value="<?= $i; ?>">
                        <input type="hidden" name="col" value="<?= $j; ?>">
                        <button class="cell <?= $board[$i][$j] ? 'disabled' : ''; ?>" 
                                type="submit" 
                                <?= $board[$i][$j] ? 'disabled' : ''; ?>>
                            <?= $board[$i][$j]; ?>
                        </button>
                    </form>
                <?php endfor; ?>
            <?php endfor; ?>
        </div>

        <!-- Bouton pour recommencer -->
        <form method="POST">
            <input type="hidden" name="reset" value="1">
            <button class="restart" type="submit">Recommencer</button>
        </form>

        <!-- Affichage du gagnant ou match nul -->
        <?php if ($winner): ?>
            <h2>Le joueur "<?= $winner; ?>" a gagné !</h2>
        <?php elseif ($isFull): ?>
            <h2>Match nul !</h2>
        <?php endif; ?>
    </div>
</body>
</html>
