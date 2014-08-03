# Teams
Shows all visible teams with their game

### Fields

- teamId (INT (auto_increment)- team id)
- gameId (INT - game id)
- shorttitle (STRING - short title of team)
- title (STRING - fulltitle of team)
- description (TEXT - short description of team)
- status (INT)
  - 0: inactive/PendingDelete (not visible)
  - 1: Active (visible)
- permission (INT)
  - 1: Public (anyone can join)
  - 2: Closed (Members must apply)
  - 3: Secret (Members must apply - not listed anywhere / must join via url)
- Ranks (STRING - array of ranks)
  -DEFAULT: {'Officer','Recruiter','Member','Trials'}

## Permission
Public
