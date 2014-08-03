# Topics
Shows all topics from `topicCategories` as well as `gameId` and `teamId`

### Sorting Algorythm
Topics have internal `rating` number - so they automatically get sorted in the right way.
**Factors:**
- Date (the topic was posted)
- Date (the last reply was added)
- Reply Count
- View Count
- Author Role
- upvotes/downvotes


### Fields topicCategories

- topicCatId (INT (auto_increment)- topic categorie id)
- status (INT)
  - 0: inactive/PendingDelete (not visible)
  - 1: Active (visible)
- permission (INT - required role to view the topic categorie)

- title (STRING - fulltitle of topic categorie)
- description (text - short description of categorie)
- date (DATETIME)


### Ideas for Categories

- News (Public)
- What is? (Public)
- Help/Support (LoggedIn)
- Bugs (LoggedIn)

## Permission
Public
