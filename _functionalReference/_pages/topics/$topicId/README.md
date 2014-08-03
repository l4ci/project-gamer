# TopicId
Shows single Topic by ID

### Subpages
- reply (to write a reply to the topic)
- edit (edit the topic)

### Fields

- topicId (INT (auto_increment)- topic id)
- topicCatId (INT - topic categorie id)
- gameId (INT - game id)
- teamId (INT - team id)
- userId (INT - user id/author)
- status (INT)
  - 0: inactive/PendingDelete (not visible)
  - 1: Active (visible)
  - 2: Locked (visible but requires MOD)
- permission (INT - required role to view the topic)

- title (STRING - fulltitle of topic)
- text (TEXT - fulltext of topic)
- date (DATETIME)
- sticky (INT - is topic sticky)
- archiv (INT - is archived)
  - 0: not archived
  - 1: archived (only visible in archiv)
- lastEdit (String - {"DATETIME","userId"} - Saves the last user and date of the edit)

- upVotes (INT)
- downVotes (INT)

## Permission
depends on topic:
Public | Member+ | Team
