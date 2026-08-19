# The Crossroads Exchange

The Crossroads Exchange is a browser-based trading game built with PHP, JavaScript, CSS, and MariaDB. Choose a character, trade with visitors, manage your goods, and see how your reputation shapes the ending.

## Requirements

- XAMPP
- Apache
- MySQL/MariaDB
- A modern web browser

## Run the Game

1. Start **Apache** and **MySQL** in the XAMPP Control Panel.
2. Open the game at:

   `http://localhost/The%20Crossroads%20Exchange/Test/index.php`

3. Choose a character to begin.

## Database Setup

The database dump is located at:

`crossroads_exchange.sql`

You can import it through phpMyAdmin or from the XAMPP terminal:

```powershell
Get-Content -Raw crossroads_exchange.sql | C:\xampp\mysql\bin\mysql.exe -u root
```

The dump creates the `crossroads_exchange` database and populates these tables:

- `characters`
- `items`
- `starting_stock`
- `visitors`
- `ending_tiers`
- `game_sessions`
- `trade_responses`

The current game uses browser `sessionStorage` for gameplay state. The session tables are included for future database-backed game sessions.

## Project Files

- `index.php` - Character selection screen
- `witch.php` - Witch game page
- `blacksmith.php` - Blacksmith game page
- `alchemist.php` - Alchemist game page
- `rogue.php` - Rogue game page
- `endScreen.php` - Final reputation and trade summary
- `game.js` - Game data, trading logic, inventory, reputation, and endings
- `index.css` - Page styling and responsive layouts
- `crossroads_exchange.sql` - Database schema and populated seed data
- `crossroads_exchange_erd.md` - Entity relationship diagram

## Gameplay

Each visitor requests one item and offers another item in return. You can accept or decline the trade. Your reputation changes based on each decision, and your final reputation determines your ending.
