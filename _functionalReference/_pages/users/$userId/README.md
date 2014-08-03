# UserId
shows user profil for {userId}

### Subpages
- Badges (Shows Badges & Achievements for {userId})

### Fields

- userId (INT (auto_increment) - user id)
- firstName
- lastName
- nick
- email
- password
- code (STRING - activation code for account activation or password reset )
- registrationDate (DATETIME)
- referralUserId (INT - user id who referred/invited the user)
- lastloginDate (DATETIME)
- role (INT)
  - 55555: Admin
  - 333: Moderator
  (- 23: Teamleader)
  - 22: Member
  - 1: Trial
  - 0: Guest

## Extra Details

- desc (TEXT - description / about me)
- social
  - facebook
  - twitter
  - steam
  - origin
  - battlenet
  - psn
  - xbox one
  - twitch
    - check if streaming right now and show online status (ajax) + embed stream
  - youtube
  - esl

## Permission
depend on user-privacy-settings:
Public | Member+
